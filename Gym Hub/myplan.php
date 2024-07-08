<?php
session_start();
require('db.php');

$username = $_SESSION['username'];
if (!$username) {
    header('Location: user_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
        }
        .navbar {
            background-color: #1E4B8B; /* Deep blue color */
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
        }
        .navbar img {
            height: 40px;
            margin-right: 1rem;
        }
        .content {
            padding: 20px;
        }
        .plan-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .plan-card h3 {
            margin-bottom: 20px;
        }
        .plan-card p {
            margin-bottom: 20px;
        }
        .plan-card a {
            text-decoration: none;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            text-align: center;
        }
        .footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .footer .column {
            flex: 1;
            min-width: 150px;
            margin: 1rem 0;
        }
        .footer .column h5 {
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .footer .column ul {
            list-style-type: none;
            padding: 0;
        }
        .footer .column ul li {
            margin: 0.5rem 0;
        }
        .footer .column ul li a {
            text-decoration: none;
            color: #343a40;
        }
        .footer .social {
            margin-top: 1rem;
        }
        .footer .social img {
            width: 30px;
            margin: 0 10px;
        }
        .footer .app-links img {
            width: 120px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="Logo"> <!-- Replace with the path to your logo -->
        <h3> Gym Hub</h3>
    </div>

    <div class="content">
        <div class="plan-card">
            <h3>Platinum Plan</h3>
            <p>$36.99 per month</p>
            <a href="payment.php?plan=platinum" class="btn btn-primary">Subscribe</a>
        </div>
        <div class="plan-card">
            <h3>National Plan</h3>
            <p>$31.99 per month</p>
            <a href="payment.php?plan=national" class="btn btn-primary">Subscribe</a>
        </div>
        <div class="plan-card">
            <h3>Silver Plan</h3>
            <p>$14.99 per month</p>
            <a href="payment.php?plan=silver" class="btn btn-primary">Subscribe</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="column">
                <h5>COMPANY</h5>
                <ul>
                    <li><a href="about_us.php#">About Us</a></li>
                </ul>
            </div>
            <div class="column">
                <h5>RESOURCES</h5>
                <ul>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="column">
            </div>
            <div class="column">
                <div class="app-links">
                    <a href="#"><img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="Google Play"></a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
