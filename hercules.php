<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  $msg = "You are already logged in";
  header("location:../dashboard.php?message=$msg");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hercules | Home</title>
    <link rel="icon" href="images/heracules.png">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.2.95/css/materialdesignicons.min.css">
    <link rel='shortcut icon' href='' type='image/x-icon' />
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Montserrat|Playfair+Display|Raleway|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- NOTE: IF YOU WANT TO ADD ANY CONTRIBUTION PLEASE MAKE SURE IT IS WITHIN THE COMMENTS SO THAT WE CAN KEEP TRACK OF THE CHANGES MADE -->

    <!-- Home page code starts here -->
    <div class="first-section">
        <header>
            <nav>
                <img src="images/heracules.png" alt="Hercules-logo" class="logo">
                <ul id="nav-items">
                    <li><a href="signin.php" id="active">Log In</a></li>
                    <li><a href="Signup.php">Sign Up</a></li>


                </ul>
                <a href="javascript:void(0);" class="icon" onclick="displayNavItems()">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
        </header>
        <!-- <br><br><br><br><br><br> -->
        <!-- <h1>Know your worth with Hercules App!</h1><br> -->

        <section>

                <div class="title">Know your worth with Hercules App!</div>
                <div class="sub_title">If you sold all your asset and paid all your debt, what would be left over?</div>
                <div class="sub_title">That's your net worth. Calculate it here</div>
        </section>

    </div>

    <hr>
    <div class="socials">
        <i class="mdi mdi-facebook"></i>
        <i class="mdi mdi-twitter"></i>
        <i class="mdi mdi-instagram"></i>
        <i class="mdi mdi-github"></i>
        <i class="mdi mdi-youtube"></i>
    </div>

    </div>

    </footer>


</body>


</html>