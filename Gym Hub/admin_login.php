<?php
session_start();
require('db.php');
$username = "";
$errors = array(); 

if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $username;
      header("location:home.php?info=add_gym");
    } else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>GymHub Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
    .background {
      position: fixed;
      z-index: -1000;
      width: 100%;
      height: 100%;
      overflow: hidden;
      top: 0;
      left: 0;
    }
    .form {
      width: 30%;
      margin-left: 35%;
      margin-top: 7%;
    }
    hr {
      background-color: #1E4B8B;
    }
    .navbar {
      background-color: transparent !important;
    }
    .text-primary {
        color: #1E4B8B !important;
    }
    .btn-outline-primary {
        color: #1E4B8B;
        border-color: #1E4B8B;
    }
    .btn-outline-primary:hover {
        background-color: #1E4B8B;
        color: white;
    }
    .form input {
        color: #1E4B8B;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-primary" href="index.php"><h3>GymHub Admin</h3></a>
    </div>
  </nav>
  <hr>
  <h2 class="text-primary" style="text-align:center;">Admin Login</h2>
  <hr>
  
  <form class="form" action="" method="post">
    <input type="text" class="form-control mb-2 mr-sm-2" name="username" placeholder="USERNAME" required> <br/>
    <input type="password" class="form-control mb-2 mr-sm-2" name="pwd" placeholder="PASSWORD" required> <br/>
    <button type="submit" class="btn btn-outline-primary mb-2" name="login_admin">Login</button>
  </form>
  
  <div class="form" style="text-align:center;">
  <a href="user_login.php" class="btn btn-outline-primary mb-2">User Login</a>
  <a href="admin_signup.php" class="btn btn-outline-primary mb-2">Admin Sign Up</a>
</div>
  
  <div class="background">
    <img src="https://media.istockphoto.com/id/995753126/photo/blur-gym-background-fitness-center-or-health-club-with-blurry-sports-exercise-equipment-for.jpg?s=2048x2048&w=is&k=20&c=j3mxhKNrEWsIqx3sH5JZcrIWuR-y0FjXzrRxHPaJWkc=">
  </div>
</body>
</html>
