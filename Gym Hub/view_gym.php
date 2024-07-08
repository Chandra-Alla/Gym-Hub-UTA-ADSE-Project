<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Hub</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
        }
        .header {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .header img {
            width: 50px;
            height: auto;
        }
        .header h1 {
            font-size: 2rem;
            font-weight: bold;
        }
        .header h2 {
            font-size: 1.5rem;
            color: #333;
        }
        .header p {
            font-size: 1.2rem;
            color: #666;
        }
        .card {
            margin: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.2s;
        }
        .card:hover img {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
            color: #666;
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
    </style>
</head>
<body>

<div class="navbar">
        <img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="Logo"> <!-- Replace with the path to your logo -->
        <h3> Gym Hub Centre</h3>
    </div>
    <div class="container">
        <div class="header">
            <img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="Maverick Center Logo">
            <h1>GymHub Centre</h1>
            <h2>WORKOUT ROUTINES</h2>
            <p>30 EXERCISES THAT SHOULD BE IN YOUR WORKOUT ROUTINE</p>
            <p>Though there's no definitive list of exercises, these moves should get consideration.</p>
        </div>
        
        <div class="row">
            <?php
            // Array of gym features for demonstration
            $gym_features = [
                [
                    'title' => 'Back: T-Bar Row',
                    'description' => 'As the favorite back exercise of Arnold Schwarzenegger himself, the T-bar row transcends all mere mortal workouts simply because of the Austrian Oak’s blessing. Here’s how to do it.',
                    'image' => 'https://static1.squarespace.com/static/5e9f8e841520b34d121c63f2/6100b659f4d09d4ead11d54f/61417a516a1c803f6137426b/1709015157887/t-bar+row-1.jpg?format=1500w',
                    'url' => 'https://www.youtube.com/watch?v=5foJiIVhs8Q&ab_channel=MindPumpTV' 
                ],


                [
                    'title' => 'Back: Deadlift',
                    'description' => 'The bread and butter of countless gym routines, this move, if done properly, will predominantly engage your back and legs, while building overall strength for you entire body. If you want to master the deadlift, check out this article.

2 OF 30
',
                    'image' => 'https://themusclephd.com/wp-content/uploads/2020/03/Deadlift-2.jpg',
                    'url' => 'https://www.youtube.com/watch?v=r4MzxtBKyNE&ab_channel=Men%27sHealth' 
                ],


                [
                    'title' => 'Back: “The Bird-Dog” aka One-Arm, One-Leg Plank',
                    'description' => 'Sure, you may look a little funny doing it, but this variation on the plank challenges you to keep your back flat and stable. It goes to show that not all essential exercises are about clanging plates and bending bars.',
                    'image' => 'https://www.shutterstock.com/image-photo/young-sporty-woman-practicing-yoga-260nw-1175121727.jpg',
                    'url' => 'https://www.youtube.com/watch?v=wiFNA3sqjCA&ab_channel=Howcast'
                ],


                [
                    'title' => 'Arms: Seated Incline Dumbbell Curl',
                    'description' => 'Staying seated while curling may seem like just a slight adjustment to standing, but you won’t be able to deny how hard your arms are working with this move. Sit on an adjustable bench between 45 and 60 degrees for the ideal effect. ',
                    'image' => 'https://i0.wp.com/www.muscleandfitness.com/wp-content/uploads/2018/02/square-exercise-biceps-curl-incline.jpg?quality=86&strip=all',
                    'url' => 'https://www.youtube.com/watch?v=HhHHBj3qTJ4&ab_channel=MaxEuceda' 
                ],


                [
                    'title' => 'Shoulders: Presses',
                    'description' => 'The overhead press is the best way to move large amounts of weight and build some serious shoulder strength. There are also multiple ways to do it, all with their own distinct advantages, including with barbells or dumbbells, standing or seated. To see how to do each, and what benefits they have, check out this article.

',
                    'image' => 'https://media.gq.com/photos/59fcc879196d3f6684ae0620/16:9/w_2560%2Cc_limit/gq-shoulder-press.jpg',
                    'url' => 'https://www.youtube.com/watch?v=0JfYxMRsUCQ&ab_channel=Bodybuilding.com' 
                ],


                [
                    'title' => 'Chest: BOSU, Puncher’s, and TRX Pushups',
                    'description' => 'We went over the diamond pushups earlier for triceps, but if you’re looking to really increase the strength and size of your chest, then you should be dabbling in all sorts of different variations. Work on your core and stability with some BOSU ball pushups, or up your power and mobility with some puncher’s pushups. You can also switch things up with TRX suspension pushups that work on balance and stability. Put it this way: If it’s a pushup variation, you should be doing it. 

',
                    'image' => 'https://www.trxtraining.com/cdn/shop/articles/TRX-BOSU-Saw--FW-position-.1975.jpg?v=1645114885',
                    'url' => 'https://www.youtube.com/watch?v=2LMaa8bo6-Y&ab_channel=BrianSchiff' 
                ],
                
            ];

            foreach ($gym_features as $feature) {
                echo '<div class="col-md-4">';
                echo '  <div class="card">';
                echo '    <img src="' . $feature['image'] . '" class="card-img-top" alt="' . $feature['title'] . '">';
                echo '    <div class="card-body">';
                echo '      <h5 class="card-title">' . $feature['title'] . '</h5>';
                echo '      <p class="card-text">' . $feature['description'] . '</p>';
                echo '      <button class="btn btn-primary" onclick="location.href=\'' . $feature['url'] . '\'">Show More</button>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    <a href="#"><img src="https://web-back.perfectgym.com/sites/default/files/styles/460x/public/equipment%20%286%29.jpg?itok=bC0T32-K" alt="Google Play"></a>
                </div>
            </div>
        </div>
    </footer>

    <button class="help-button" onclick="openHelp()">Help</button>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function openHelp() {
            alert('How can we help you?');
            // You can add more functionality here, like opening a modal or redirecting to a help page.
        }
    </script>

</body>
</html>
