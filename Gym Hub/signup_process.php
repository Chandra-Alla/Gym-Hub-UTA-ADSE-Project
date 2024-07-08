<?php
session_start();
require('db.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$pwd_confirm = mysqli_real_escape_string($conn, $_POST['pwd_confirm']);

if ($pwd != $pwd_confirm) {
  header("location:signup.php?error=Passwords do not match");
} else {
  $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pwd')";
  if (mysqli_query($conn, $query)) {
    $_SESSION['username'] = $username;
    header("location:user_home.php");
  } else {
    header("location:signup.php?error=Error: Could not register user");
  }
}
?>
