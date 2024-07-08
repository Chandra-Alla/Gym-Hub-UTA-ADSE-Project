<?php
session_start();
if (session_destroy()) {
    if (isset($_GET['source']) && $_GET['source'] == 'admin') {
        header("location:admin_login.php");
    } else {
        header("location:index.php");
    }
}
exit();
?>
