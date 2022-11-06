<?php

session_start();

include("connection.php");
include("functions.php");
$user_data = check_loginBabysitter($con);

//initiaising 
$errors = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="images/png" href="images/logo.png" >
    <!--import google fonts & stars-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styleB.css" >
    <link rel="stylesheet" href="footer.css" >
    <link rel="stylesheet" href="JobRequest.css">
    <title>Job requests </title>
</head>

<body>

<!-- HEADER CODE -->

<header>
    <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
    <nav class="navbar">
    <ul> 
    <li><a href="currentBaby.html"> Home </a></li>

    <li> <a href="#"> Menu </a>
        <ul class="inner"> <!-- your menu here\\\\\\-->
     <li class="first"><a href="JobRequest.html"> Job Requests </a></li>
     <li><a href="OfferList.html"> Offers </a></li>
     <li><a href="myReviews.html"> rate & reviews </a></li>
</ul>

    <li> <a href="#"> Settings </a>
    <ul class="inner">
    <li class="first"><a href="BabysitterProfile.html"> view profile</a></li>
    <li><a href="index.html"> Sign out </a></li>
        
    </ul>
    
    </li>
    
    </ul>
    </nav>
    </header>

 <!-- FOOTER CODE -->

    <footer class="footer-distributed">

        <div class="footer-left">
    
            <img class="logo" src="images/logo.png" alt="Oun">
    
            <p class="footer-links">
                <a href="currentBaby.html" class="link-1">Home</a>
                <!--<a href="#">About</a>-->
                <a href="mailto:support@Ouun.com">Contact</a>
            </p>
    
            <p class="footer-company-name">Oun © 2022</p>
        </div>
    
        <div class="footer-center">
    
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>12534 AlOlaya st.</span> Riyadh , Saudi Arabia</p>
            </div>
    
            <div>
                <i class="fa fa-phone"></i>
                <p>+9669200000834</p>
            </div>
    
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@Ouun.com">support@Oun.com</a></p>
            </div>
    
        </div>
    
        <div class="footer-right">
    
            <p class="footer-company-about">
                <span>About us</span>
               Oun is an online platform that helps mothers find babysitters anytime and anywhere.
    </p>
    
        </div>
    
    </footer>

    <!-- JOB REQUEST CODE-->
 
<h1 class="mytitle"> Job Requests </h1> 

<?php 
$requests = getRequests();

if( mysqli_num_rows($requests) > 0)
{
    
    foreach( $requests as $element )
{
?>  
<div class="container" style = "display: inline-block;;">
  <div class= "card" >
   <?php echo "<img src='images/".$element['parent_image']."' alt='parent profile picture' class =img>" ;?> 
    <p class ="name" > <?php echo $element['name']; ?></p>

    <div class="desc">
     <p class="num"> Number of kids: <?php echo $element['numOfKids']; ?> </p>
      <br>
      <p class="age"> Age: <?php echo $element['kid_age']; ?> </p>
      <br>
      <p class="service">Type of service: <?php echo $element['service_type']; ?></p>
    
      <?php $_GET['request_id'] = $element['request_id']; ?>
    <a href="JobDetails.php?request_id=<?php echo $_GET['request_id']; ?>"><input class="btn" type="get" value="View job details" style = "text-align:center;"></a>
 
</div>
</div>
<?php
}
}
else {
    echo "<h2> There are no requests </h2>";
}
?>

</body>

</html>



     


    