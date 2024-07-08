<?php
session_start();
require('db.php');
$username = "";
$errors = array(); 

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE username='$username' AND password='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header("location: user_home.php");
    } else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style type="text/css">
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      overflow: hidden;
    }
    .navbar {
      background-color: #343a40 !important;
      width: 100%;
      position: absolute;
      top: 0;
      z-index: 10;
    }
    .navbar-brand h3 {
      color: #fff;
    }
    .login-container {
      background: url('https://img.freepik.com/free-photo/blurred-bikes_1203-102.jpg?t=st=1719854789~exp=1719858389~hmac=205c436953b9fa13fb69c63132d23497a108eb8bf0da1856aacd1588636c11c9&w=996') no-repeat center center;
      background-size: cover;
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-form {
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 1s;
      z-index: 1;
    }
    .login-form h2 {
      margin-bottom: 20px;
      font-size: 1.5rem;
      text-align: center;
      animation: fadeInDown 1s;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><h3>GymHub</h3></a>
    </div>
  </nav>
  <div class="login-container">
    <div class="login-form animate__animated animate__fadeInUp">
      <h2>User Login</h2>
      <?php if (count($errors) > 0): ?>
        <div class="alert alert-warning"><?php echo implode('<br>', $errors); ?></div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="USERNAME" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="pwd" placeholder="PASSWORD" required>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-block" name="login_user">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
