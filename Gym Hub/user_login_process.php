<?php
session_start();
require('db.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$pwd'";
$results = mysqli_query($conn, $query);

if (mysqli_num_rows($results) == 1) {
  $_SESSION['username'] = $username;
  header("location:user_home.php");
} else {
  header("location:user_login.php?error=Wrong username/password combination");
}
?>

