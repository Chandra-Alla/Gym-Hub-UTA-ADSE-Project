<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Establishing connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the form
$username = $_POST['uname'];
$password = $_POST['pwd'];

// Insert into login table
$sql = "INSERT INTO login (uname, pwd) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Admin account created successfully.";
    // Redirect to login page
    header("Location: admin_login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
