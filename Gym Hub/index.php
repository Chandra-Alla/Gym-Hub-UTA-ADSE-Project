<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMHUB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
        }
        .navbar {
            background-color: #1E4B8B;
        }
        .navbar-brand {
            font-size: 1.5rem;
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .header {
            /*background: url('https://scontent-atl3-1.xx.fbcdn.net/v/t1.6435-9/92457170_10158131760019361_2818645697581023232_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=a74216&_nc_ohc=3z1qO8wT3NAQ7kNvgHTMrUJ&_nc_ht=scontent-atl3-1.xx&oh=00_AYDdgerMQejssPEOFaESvUG0pgnwJO4GgUL5vt6g8Hs-Qg&oe=66A7CE27') no-repeat center center;*/
            background: url('https://static.vecteezy.com/system/resources/previews/037/170/421/non_2x/ai-generated-a-gym-with-dark-exercise-equipment-free-photo.jpg') no-repeat center center;
            background-size: contain;
            height: 100vh;
            color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .header h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: fadeInDown 2s;
        }
        .header p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 2s;
        }
        .header .btn {
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
            margin: 0.5rem;
            animation: bounceIn 2s;
        }
        .features {
            padding: 4rem 0;
            text-align: center;
        }
        .features h2 {
            margin-bottom: 3rem;
            animation: fadeInUp 2s;
        }
        .features .feature-item {
            margin-bottom: 2rem;
            animation: zoomIn 2s;
        }
        .features .feature-item img {
            width: 100px;
            margin-bottom: 1rem;
        }
        .details-section {
            padding: 4rem 0;
            background-color: #1E4B8B;
            color: #fff;
        }
        .details-section h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            animation: fadeInUp 2s;
        }
        .details-section .row {
            display: flex;
            justify-content: space-between;
        }
        .details-section .details, .details-section .hours {
            flex: 1;
            margin: 1rem;
            animation: fadeInUp 2s;
        }
        .details-section .details ul, .details-section .hours ul {
            list-style: none;
            padding: 0;
        }
        .details-section .details li, .details-section .hours li {
            margin-bottom: 0.5rem;
        }
        .details-section .details .social-icons {
            margin-top: 1rem;
            display: flex;
            gap: 1rem;
        }
        .details-section .details .social-icons img {
            width: 30px;
        }
        .pricing-section {
            padding: 4rem 0;
            background-color: #fff;
        }
        .pricing-section h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            animation: fadeInUp 2s;
        }
        .pricing-table {
            max-width: 1200px;
            margin: 0 auto;
            animation: fadeInUp 2s;
        }
        .pricing-table .table {
            margin-bottom: 2rem;
            text-align: left;
        }
        .pricing-table th, .pricing-table td {
            vertical-align: middle;
        }
        .pricing-table .btn {
            width: 100%;
            margin-top: 1rem;
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
        .help-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
            z-index: 1000;
        }
        .help-button:hover {
            background-color: #0056b3;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes bounceIn {
            from { opacity: 0; transform: scale(0.3); }
            to { opacity: 1; transform: scale(1); }
        }
        .pricing-row {
            cursor: pointer;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">GymHub</a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="#pricing-section">Membership</a> 
                <a class="nav-item nav-link" href="signup.php">Sign Up</a>
                <!--<a class="nav-item nav-link" href="user_login.php">User Login</a> -->
                <a class="nav-item nav-link" href="contact_us.php">Contact Us</a> <!-- Added Contact Us -->
            </div>
        </div>
    </nav>

    <header class="header">
        <h1>Welcome to Our Gym</h1>
        <p>Join us to stay fit and healthy</p>
        <a href="signup.php" class="btn btn-primary animate__animated animate__bounceIn">Join Us</a>
        <a href="user_login.php" class="btn btn-secondary animate__animated animate__bounceIn">Login</a>
    </header>

    <section class="features">
        <div class="container">
            <h2 class="animate__animated animate__fadeInUp">Our Amenities</h2>
            <div class="row">
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn-icons-png.freepik.com/512/50/50004.png" alt="Indoor Lap Pool">
                    <h5>Indoor Lap Pool</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-hot-tub_89916.png" alt="Whirlpool">
                    <h5>Whirlpool</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn-icons-png.flaticon.com/512/8979/8979376.png" alt="Steam Room">
                    <h5>Steam Room</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://www.svgrepo.com/show/194914/sauna.svg" alt="Sauna">
                    <h5>Sauna</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn-icons-png.freepik.com/512/10/10608.png" alt="Practice Basketball Court">
                    <h5>Practice Basketball Court</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://t3.ftcdn.net/jpg/05/26/67/50/360_F_526675098_TFIt7s9P5NJgYotK2UY5OR6MhWrTYvfQ.jpg" alt="Group Exercise">
                    <h5>Group Exercise</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://media.istockphoto.com/id/1359290192/vector/road-cycling-racers.jpg?s=612x612&w=0&k=20&c=jiq3e4S_WY6YTEXXHAxvzjKAdFXtwiVlFq6zgaiXpUY=" alt="Group Cycling">
                    <h5>Group Cycling</h5>
                </div>
                <div class="col-md-3 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn.imgbin.com/20/9/25/imgbin-fitness-centre-exercise-physical-fitness-personal-trainer-computer-icons-gym-fitness-knBw5EDzi7udvSy3pq1YMqMQy.jpg" alt="Personal Training Area">
                    <h5>Personal Training Area</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="details-section">
        <div class="container">
            <div class="row">
                <div class="details">
                    <h2>GymHub DETAILS</h2>
                    <p>Whatever your goals, let's get there together. With exciting fitness classes, friendly coaches, and plenty of space to help you get into your zone, our gym is like a home away from home for everyone in different locations – with the power of community to keep you setting the bar higher.</p>
                    <p>Come find your strength with us at GymHub.</p>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> GymHub</li>
                    </ul>
                </div>
                <div class="hours">
                    <h2>Gym HOURS</h2>
                    <ul>
                        <li>Monday: 05:00 AM - 11:59 PM</li>
                        <li>Tuesday - Thursday: 12:00 AM - 11:59 PM</li>
                        <li>Friday: 12:00 AM - 09:00 PM</li>
                        <li>Saturday - Sunday: 05:00 AM - 09:00 PM</li>
                        <li><a href="#">*Holiday Hours</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing-section" class="pricing-section"> <!-- Added id to this section -->
        <div class="container">
            <div class="pricing-table">
                <h2>Membership Pricing</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Monthly</th>
                            <th>Monthly Commitment</th>
                            <th>Yearly</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="pricing-row" onclick="redirectToSignup()">
                            <td>Platinum</td>
                            <td>$36.99 per month</td>
                            <td>$31.99 per month</td>
                            <td>$23.99 per month</td>
                        </tr>
                        <tr class="pricing-row" onclick="redirectToSignup()">
                            <td>National</td>
                            <td>$31.99 per month</td>
                            <td>-</td>
                            <td>$19.99 per month</td>
                        </tr>
                        <tr class="pricing-row" onclick="redirectToSignup()">
                            <td>Silver</td>
                            <td>$14.99 per month</td>
                            <td>$9.99 per month</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2 class="animate__animated animate__fadeInUp">Why Choose GymHub?</h2>
            <div class="row">
                <div class="col-md-4 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn-icons-png.freepik.com/512/50/50004.png" alt="Indoor Lap Pool">
                    <h5>State-of-the-art Facilities</h5>
                </div>
                <div class="col-md-4 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-hot-tub_89916.png" alt="Whirlpool">
                    <h5>Personalized Training Programs</h5>
                </div>
                <div class="col-md-4 feature-item animate__animated animate__zoomIn">
                    <img src="https://cdn-icons-png.flaticon.com/512/8979/8979376.png" alt="Steam Room">
                    <h5>Community Atmosphere</h5>
                </div>
            </div>
        </div>
    </section>

    <section id="advantages-section" class="details-section">
        <div class="container">
            <h2>Advantages Joining GymHub</h2>
            <p>Discover the benefits that make GymHub the right choice for your fitness journey:</p>
            <div class="row">
                <div class="details col-md-6">
                    <ul>
                        <li>State-of-the-art equipment</li>
                        <li>Professional trainers</li>
                        <li>Wide range of fitness classes</li>
                    </ul>
                </div>
                <div class="advantages col-md-6">
                    <ul>
                        <li>Personalized fitness plans</li>
                        <li>Community-driven environment</li>
                        <li>Flexible membership options</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="column">
                <h5>COMPANY</h5>
                <ul>
                    <li><a href="about_us.php">About Us</a></li>
                </ul>
            </div>
            <div class="column">
                <h5>RESOURCES</h5>
                <ul>
                    <li><a href="contact_us.php">Contact Us</a></li> <!-- Updated Contact Us -->
                </ul>
            </div>
            <div class="column">
            </div>
            <div class="column">
                <div class="app-links">
                    <!--<a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/d/da/UTA_logomark.png" alt="Google Play"></a> -->
                </div>
            </div>
        </div>
    </footer>

    <a href="mailto:abc@mavs.uta.edu" class="help-button">Help</a> <!-- Updated Help button -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function redirectToSignup() {
            window.location.href = "signup.php";
        }
    </script>
</body>
</html>
