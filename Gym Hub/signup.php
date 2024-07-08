<?php
require('db.php');
$errors = array(); 

if (isset($_POST['register_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $pwd_confirm = mysqli_real_escape_string($conn, $_POST['pwd_confirm']);
  
  if ($pwd != $pwd_confirm) {
    array_push($errors, "<div class='alert alert-warning'><b>Passwords do not match</b></div>");
  }
  
  if (count($errors) == 0) {
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pwd')";
    if (mysqli_query($conn, $query)) {
      $_SESSION['username'] = $username;
      header("location:user_home.php");
    } else {
      array_push($errors, "<div class='alert alert-warning'><b>Error: Could not register user</b></div>");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Signup</title>
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
      background-color: white;
    }
    .navbar {
      background-color: transparent !important;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><h3>Welcome Gym Hub</h3></a>
    </div>
  </nav>
  <hr>
  <h2 style="color:white; text-align:center;">User Signup</h2>
  <hr>
  
  <form class="form" action="" method="post">
    <input type="text" class="form-control mb-2 mr-sm-2" name="username" placeholder="USERNAME" required> <br/>
    <input type="email" class="form-control mb-2 mr-sm-2" name="email" placeholder="EMAIL" required> <br/>
    <input type="password" class="form-control mb-2 mr-sm-2" name="pwd" placeholder="PASSWORD" required> <br/>
    <input type="password" class="form-control mb-2 mr-sm-2" name="pwd_confirm" placeholder="CONFIRM PASSWORD" required> <br/>
    <button type="submit" class="btn btn-outline-light mb-2" name="register_user">Sign Up</button>
  </form>
  
  <div class="background">
    <img src="gym_bg.jpg">
  </div>
</body>
</html>
