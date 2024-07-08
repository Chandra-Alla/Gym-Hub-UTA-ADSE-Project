<?php
session_start();
require('db.php');

$username = $_SESSION['username'];
if (!$username) {
    header('Location: user_login.php');
    exit();
}

$errors = array();
$success = "";

if (isset($_POST['update_profile'])) {
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);

    $profile_pic = $_FILES['profile_pic']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);

    if ($profile_pic) {
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check === false) {
            array_push($errors, "File is not an image.");
        }

        // Check file size (5MB maximum)
        if ($_FILES["profile_pic"]["size"] > 5000000) {
            array_push($errors, "Sorry, your file is too large.");
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        // Check if $errors is empty
        if (count($errors) == 0) {
            if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                array_push($errors, "Sorry, there was an error uploading your file.");
                array_push($errors, "Error details: " . $_FILES["profile_pic"]["error"]);
            }
        }
    }

    if (count($errors) == 0) {
        $query = "UPDATE users SET 
                    gender='$gender', 
                    age='$age', 
                    weight='$weight', 
                    height='$height'";
        if ($profile_pic) {
            $query .= ", profile_pic='$target_file'";
        }
        $query .= " WHERE username='$username'";

        if (mysqli_query($conn, $query)) {
            $success = "Profile updated successfully";
        } else {
            array_push($errors, "Error updating profile: " . mysqli_error($conn));
        }
    }
}

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            padding: 2rem;
        }
        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .profile-container h2 {
            margin-bottom: 1.5rem;
        }
        .profile-container .form-group {
            margin-bottom: 1.5rem;
        }
        .profile-container .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .profile-container .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .profile-container .btn-dashboard {
            background-color: #28a745;
            border-color: #28a745;
        }


        .navbar {
            background-color: #1E4B8B; /* Deep blue color */
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
        }
        .navbar img {
            height: 40px;
            margin-right: 1rem;
        }
    </style>
</head>
<body>

<div class="navbar">
    <img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="Logo">
    <h3>GymHub </h3>
</div>
<div class="profile-container">
    <h2>Edit your Profile</h2>
    <?php if (count($errors) > 0): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success">
            <p><?php echo $success; ?></p>
        </div>
    <?php endif; ?>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="profile_pic">Profile Picture:</label><br>
            <img src="<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="img-thumbnail" style="width: 150px; height: 150px;">
            <input type="file" name="profile_pic" id="profile_pic" class="form-control-file mt-2">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo isset($user['gender']) ? htmlspecialchars($user['gender']) : ''; ?>" <?php echo isset($user['gender']) && !empty($user['gender']) ? 'required' : ''; ?>>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo isset($user['age']) ? htmlspecialchars($user['age']) : ''; ?>" <?php echo isset($user['age']) && !empty($user['age']) ? 'required' : ''; ?>>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" class="form-control" id="weight" name="weight" value="<?php echo isset($user['weight']) ? htmlspecialchars($user['weight']) : ''; ?>" <?php echo isset($user['weight']) && !empty($user['weight']) ? 'required' : ''; ?>>
        </div>
        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" class="form-control" id="height" name="height" value="<?php echo isset($user['height']) ? htmlspecialchars($user['height']) : ''; ?>" <?php echo isset($user['height']) && !empty($user['height']) ? 'required' : ''; ?>>
        </div>
        <button type="submit" name="update_profile" class="btn btn-primary">Save</button>
        <a href="user_home.php" class="btn btn-secondary">Cancel</a>
        <a href="user_home.php" class="btn btn-dashboard">Dashboard</a> <!-- Added Dashboard button -->
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
