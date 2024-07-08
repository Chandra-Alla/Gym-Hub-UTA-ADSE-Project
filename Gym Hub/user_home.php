<?php
session_start();
require('db.php');

$username = $_SESSION['username'];
if (!$username) {
    header('Location: user_login.php');
    exit();
}

// Get user details
$query = "SELECT * FROM users WHERE username=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Get subscription details
$query = "SELECT * FROM subscriptions WHERE username=? ORDER BY end_date DESC LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$subscription_result = mysqli_stmt_get_result($stmt);
$subscription = mysqli_fetch_assoc($subscription_result);

// Check if the subscription is nearing its end date
$show_renew_popup = false;
if ($subscription) {
    $end_date = strtotime($subscription['end_date']);
    $current_date = time();
    $days_left = ($end_date - $current_date) / (60 * 60 * 24);
    if ($days_left <= 7) { // Show popup if 7 days or less are remaining
        $show_renew_popup = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #1E4B8B;
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
        }
        .navbar img {
            height: 40px;
            margin-right: 1rem;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1E4B8B;
            padding-top: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar a {
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: white;
            display: block;
            width: 100%;
        }
        .sidebar a:hover {
            background-color: #163A69;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card h3 {
            margin-bottom: 20px;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: rem;
            object-fit: cover;
        }
        .statistics {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .stat-item {
            text-align: center;
            flex: 1;
        }
        .stat-item h4 {
            margin-bottom: 10px;
        }
        .personal-training {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 40px;
        }
        .personal-training .text {
            flex: 1;
            padding: 20px;
            background-color: #1E4B8B;
            color: white;
            border-radius: 10px;
            margin-right: 10px;
            font-size: 18px;
            animation: fadeInLeft 2s;
        }
        .personal-training .image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeInRight 2s;
        }
        .personal-training .image img {
            width: 50%;
            border-radius: 10px;
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
        .modal-content {
            border-radius: 10px;
            padding: 20px;
        }
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="https://resources.uta.edu/mme/identity/_images/new-logos/a-mark-logo.png" alt="Logo">
        <h3>Gym Hub</h3>
    </div>

    <div class="sidebar">
        <img src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture" class="profile-pic">
        <h4><?php echo htmlspecialchars($user['username']); ?></h4>
        <a href="user_home.php">Dashboard</a>
        <a href="view_gym.php">Exercises</a>
        <a href="update_profile.php">Update Profile</a>
        <a href="myplan.php">My Plan</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <div class="dashboard-card">
            <h3>Welcome to Fitness, <?php echo htmlspecialchars($user['username']); ?>!</h3>
            <div class="statistics">
                <div class="stat-item">
                    <h4>Heart Rate</h4>
                    <p>72 Bpm</p>
                </div>
                <div class="stat-item">
                    <h4>Calories Burned</h4>
                    <p>120 Kcal</p>
                </div>
                <div class="stat-item">
                    <h4>Cardio Full Training</h4>
                    <p>01 hrs</p>
                </div>
            </div>
        </div>

        <?php if ($subscription): ?>
        <div class="dashboard-card">
            <h3>My Subscription</h3>
            <p>Plan: <?php echo htmlspecialchars(ucfirst($subscription['plan'])); ?></p>
            <p>Start Date: <?php echo htmlspecialchars($subscription['start_date']); ?></p>
            <p>End Date: <?php echo htmlspecialchars($subscription['end_date']); ?></p>
        </div>
        <?php endif; ?>

        <div class="personal-training dashboard-card">
            <div class="text animate__animated animate__fadeInLeft">
                <h3>Personal Training</h3>
                <p>Personal Trainers create safe, effective, and efficient exercise programs. Each session consists of approximately one hour of exercise prescription/programming based on each client's individual needs and goals. We have experts to guide you in the fields of General Health and Wellbeing, Cardiovascular Fitness, Hypertrophy, and much more.</p>
            </div>
            <div class="image animate__animated animate__fadeInRight">
                <img src="https://static.vecteezy.com/system/resources/previews/026/842/131/non_2x/teacher-icon-symbol-image-illustration-of-the-training-business-school-classroom-icon-design-image-vector.jpg" alt="Personal Training">
            </div>
        </div>

        <div class="personal-training dashboard-card">
            <div class="text animate__animated animate__fadeInLeft">
                <h3>MASSAGE THERAPY</h3>
                <p>Campus Recreation offers therapeutic bodywork and massage services to all MAC members and UTA faculty/staff. Make your appointment today!</p>
            </div>
            <div class="image animate__animated animate__fadeInRight">
                <img src="https://assets.clevelandclinic.org/transform/b9396844-4b15-42a0-953f-ce757b786a8e/massageTherapy-636218646-770x553-1_jpg" alt="MASSAGE THERAPY">
            </div>
        </div>

        <div class="personal-training dashboard-card">
            <div class="text animate__animated animate__fadeInLeft">
                <h3>FOOD FOR THOUGHT</h3>
                <p>Food For Thought is a series of talks that help you lead a healthier life style. Topics range from nutrition, hydration, fitness, and health.</p>
            </div>
            <div class="image animate__animated animate__fadeInRight">
                <img src="https://mb.cision.com/Public/361/9659154/84a200ddc5189795_800x800ar.png" alt="FOOD FOR THOUGHT">
            </div>
        </div>

        <div class="personal-training dashboard-card">
            <div class="text animate__animated animate__fadeInLeft">
                <h3>GROUP FITNESS</h3>
                <p>With a variety of class options including Yoga, Zumba, Cycling, Kickboxing, Strength and more. UTA Group Fitness has the perfect class to meet your schedule and style! Purchase your pass today!</p>
            </div>
            <div class="image animate__animated animate__fadeInRight">
                <img src="https://pbs.twimg.com/media/GHbwDYKWkAAL4-U.jpg" alt="GROUP FITNESS">
            </div>
        </div>

        <div class="personal-training dashboard-card">
            <div class="text animate__animated animate__fadeInLeft">
                <h3>ABOUT US</h3>
                <p>Campus Recreation has something for everyone. We provide recreational and leisure opportunities for everyone, young and elderly through several areas: Informal Recreation, Intramural Sports, Fitness & Wellness, Sport Clubs, Adaptive Recreation, Aquatics and Spirit Groups.</p>
            </div>
            <div class="image animate__animated animate__fadeInRight">
                <img src="https://hips.hearstapps.com/hmg-prod/images/muscular-shirtless-man-exercising-with-dumbbells-royalty-free-image-1711991944.jpg?crop=0.668xw:1.00xh;0.296xw,0&resize=640:*" alt="ABOUT US">
            </div>
        </div>
    </div>

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
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="column">
            </div>
            <div class="column">
                <div class="app-links">
                    <a href="#"><img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="UTA Logo"></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        <?php if ($show_renew_popup): ?>
        $(document).ready(function() {
            $('#renewModal').modal('show');
        });
        <?php endif; ?>
    </script>

    <div class="modal fade" id="renewModal" tabindex="-1" aria-labelledby="renewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="renewModalLabel">Renew Your Subscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your subscription is about to end. Please renew your subscription to continue enjoying our services.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="myplan.php" class="btn btn-primary">Renew Now</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>