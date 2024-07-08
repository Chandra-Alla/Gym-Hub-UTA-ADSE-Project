<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Gym</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url('https://media.istockphoto.com/id/1271752802/photo/phone-and-e-mail-icons-on-wooden-cubes-with-contact-us-text-on-blue-background-web-page.jpg?s=612x612&w=0&k=20&c=dk9oPaDy_L9mv_icOMgsFGzEDrX0NUI3I8xBQ-DAxQM=') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .contact-info {
            background-color: rgba(255, 255, 255, 0.8); /* Optional: to make the text more readable */
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
        }
        h1, h2, p {
            margin: 0 0 10px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .contact-info h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Contact Us</h1>
    <div class="contact-info">
        <h2>Our Address:</h2>
        <p>
            <?php echo "GymHub"; ?>
        </p>

        <h2>Branches:</h2>
        <p>
            <?php echo "Euless, Arlington, Bedford, Hurst, Frisco, Plano, Dallas, Irving"; ?>
        </p>

        <h2>Phone Number:</h2>
        <p>
            <?php echo "(123) 456-7890"; ?>
        </p>

        <h2>Email</h2>
        <p>
            <?php echo "contact@yourgym.com"; ?>
        </p>

        <h2>Working Hours</h2>
        <p>
            <?php echo "Monday - Friday: 6:00 AM - 10:00 PM<br>Saturday - Sunday: 8:00 AM - 8:00 PM"; ?>
        </p>
    </div>
</body>
</html>
