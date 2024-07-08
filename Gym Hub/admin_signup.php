<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymHub Admin Sign Up</title>
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/thumbnails/026/781/389/small_2x/gym-interior-background-of-dumbbells-on-rack-in-fitness-and-workout-room-photo.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-box {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            text-align: center;
        }
        .signup-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .signup-box input[type="text"], 
        .signup-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .signup-box input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .signup-box input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="signup-box">
        <h2>Admin Sign Up</h2>
        <form action="admin_signup_process.php" method="post">
            <input type="text" name="uname" placeholder="Username" required><br><br>
            <input type="password" name="pwd" placeholder="Password" required><br><br>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
