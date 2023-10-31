<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>music fest</title>
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <img src="../assets/image/logo.png" alt="logo">
        <ul>
            <li><a href="#home">home</a></li>
            <li><a href="#nav1">d-day</a></li>
            <li><a href="#nav3">about</a></li>
            <?php
            if (isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn'] === true) {
                echo '<li><a href="../user-admin/logout.php">sign out</a></li>';
            } else {
                echo '<li><a href="../user-admin/login.php">sign in</a></li>';
            }
            ?>
        </ul>
        <div>
            <input type="checkbox" class="checkbox" id="checkbox">
            <label for="checkbox" class="label">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <div class="ball"></div>
            </label>
        </div>
    </nav>
    <!-- navbar -->

    <!-- main content -->
    <div class="banner" id="home">
        <div class="main">
            <h1>euphoria music festival</h1>
            <p>as the sun sets and the music fills the air, you'll be transported to a world where beats are your
                heartbeat and melodies are your pulse.
                dance under the stars, connect with fellow music lovers, and immerse yourself in a sonic journey that
                will leave you craving for more.</p><br>
            <?php
            if (isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn'] === true) {
                echo '<button onclick="window.location.href = \'ticket.php\';" id="show">get ticket</button>';
            } else {
                echo '<button onclick="window.location.href = \'../user-admin/login.php\';" id="show">get ticket</button>';
            }
            ?>

        </div>
    </div>
    <!-- main content -->

    <!-- line up -->
    <div class="container" id="nav2">
        <div class="lineup">
            <h1>line up</h1>
        </div>

        <div class="card">
            <div class="img">
                <img src="../assets/image/niki.jpg" alt="Niki Zefanya">
            </div>
            <div class="content">
                <h3>Niki Zefanya</h3>
                <p>Get ready to be enchanted by Niki Zefanya's soulful voice and captivating performances.
                    She's all set to mesmerize all of you.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="../assets/image/neighbourhood.jpeg" alt="The Neighbourhood">
            </div>
            <div class="content">
                <h3>The Neighbourhood</h3>
                <p>Prepare to rock out with The Neighbourhood as they gear up to deliver their indie-rock hits.
                    It's going to be an unforgettable night.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="../assets/image/frank-ocean.webp" alt="Frank Ocean">
            </div>
            <div class="content">
                <h3>Frank Ocean</h3>
                <p>Immerse yourself in the anticipation of Frank Ocean's soulful melodies and poetic lyrics.
                    Get ready for a night to remember, everyone.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="../assets/image/sza.jpg" alt="SZA">
            </div>
            <div class="content">
                <h3>SZA</h3>
                <p>Join us in creating an electric atmosphere with SZA's enchanting R&B tunes and powerful stage
                    presence.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="../assets/image/bryson.webp" alt="SZA">
            </div>
            <div class="content">
                <h3>Bryson Tiller</h3>
                <p>Get ready for an unforgettable night with Bryson Tiller's smooth R&B vocals and soulful tunes.
                    He's here to serenade you and create lasting memories.</p>
            </div>
        </div>

    </div>
    <!-- line up -->

    <!-- date -->
    <div class="container" id="nav2">
        <div class="ticket">
            <h1>don't miss your chance to have fun!</h1>
            <i class="fa-solid fa-calendar-week"></i>
            <p> 1 october 2024 <br></p>
            <i class="fa-solid fa-location-dot"></i>
            <p>asier valley, los angeles <br></p>
            <i class="fa-solid fa-ticket"></i>
            <p>vip : $300 <br>general : $150 <br></p>
            <p>all price excluded tax</p>
        </div>
    </div>
    <!-- date -->

    <!-- count down -->
    <div class="container" id="nav1">
        <h1 class="countdown">countdown</h1>
        <div class="date">
            <div class="box">
                <span id="days">0</span>
                <p>days</p>
            </div>
            <div class="box">
                <span id="hours">0</span>
                <p>hours</p>
            </div>
            <div class="box">
                <span id="minutes">0</span>
                <p>minutes</p>
            </div>
            <div class="box">
                <span id="seconds">0</span>
                <p>seconds</p>
            </div>
        </div>
    </div>
    <!-- count down -->

    <!-- about me -->
    <div class="container" id="nav3">
        <div class="profile">
            <h1>profile</h1>
            <img src="../assets/image/profile.jpg" alt="reisa">
            <h1>Reisa Maulidya Rohman</h1>
            <hr>
            <br>
            <p>
                I'm currently pursuing my degree at Mulawarman University, majoring in Informatics.
            </p>
            <h2>Personal Info</h2>
            <ul>
                <li><b>Age :</b> 19</li>
                <li><b>Date of Birth :</b> May 3, 2004</li>
                <li><b>Gender :</b> Female</li>
                <li><b>Nationality :</b> Indonesia</li>
                <li><b>Location :</b> Samarinda, Kalimantan Timur</li>
                <li><b>Interests :</b> Art, Photography, Music, Travel, Fashion</li>
            </ul>

        </div>
    </div>
    <!-- about me -->

    <!-- footer -->
    <div class="footer" id="contact">
        <div>
            <div class="row">
                <div class="col">
                    <h3>the 90's vinyl</h3>
                    <ul>
                        <li>221b baker street</li>
                        <li>london, united kingdom</li>
                        <li>+22 0910 6036</li>
                    </ul>
                </div>
                <div class="col">
                    <h3>contact us</h3>
                    <ul>
                        <li><a href="https://twitter.com/Drake">twitter</a></li>
                        <li><a href="https://instagram.com/jennierubyjane">instagram</a></li>
                        <li><a href="https://www.youtube.com/@jennierubyjane">youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <script src="../assets/js/jQuery.js"></script>
    <script type="text/javascript" src="../assets/js/javascript.js"></script>
</body>

</html>