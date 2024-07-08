<?php
session_start();
include('db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $uta_id = $_POST['uta_id'];
    $user_id = $_SESSION['user_id']; // Assuming you have a user session with user_id

    $query = "UPDATE users SET name=?, password=?, age=?, weight=?, height=?, uta_id=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiiiis', $name, $password, $age, $weight, $height, $uta_id, $user_id);

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
