<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GymHub</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url('https://www.shutterstock.com/image-photo/businessman-using-smartphone-display-contact-600nw-2216499427.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .about-info {
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
        .about-info h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>About Us</h1>
    <div class="about-info">
        <h2>Our Mission</h2>
        <p>
            <?php echo "At YourGym, our mission is to provide a supportive and inspiring environment where everyone can achieve their fitness goals. We believe in the power of fitness to transform lives and are dedicated to helping our members lead healthier, happier lives."; ?>
        </p>

        <h2>Our History</h2>
        <p>
            <?php echo "Founded in 2010, YourGym has grown from a small neighborhood gym to a state-of-the-art fitness center. Over the years, we have expanded our facilities, added new classes, and continuously improved our services to meet the needs of our community."; ?>
        </p>

        <h2>Our Team</h2>
        <p>
            <?php echo "Our team of certified trainers and friendly staff are here to support you every step of the way. Whether you're just starting your fitness journey or looking to take your workouts to the next level, we're here to help."; ?>
        </p>

        <h2>Our Facilities</h2>
        <p>
            <?php echo "YourGym offers a wide range of facilities, including a fully-equipped weight room, cardio machines, group fitness classes, a swimming pool, and more. We pride ourselves on maintaining a clean and welcoming environment for all our members."; ?>
        </p>
    </div>
</body>
</html>
