<?php 
    session_start();

    if(!isset($_SESSION['email']))
	   header("Location: index.php?error=Please Sign In again!");

    else
    {}

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/logo.png" >
<!--import google fonts & stars-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styleB.css" >
<link rel="stylesheet" href="footer.css" >
<link rel="stylesheet" href="currentBabycss.css">
<link rel="stylesheet" href="preCards.css">
<link rel="stylesheet" href="mytitles.css">

<title>Home</title>

</head>

<body class="curbody">
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
<!--welocme page-->
<div class="welcome glow" >
    <h1 style="color: rgb(41, 33, 78);" >Welcome Back, Nouf!</h1>
    </div>

<h1 class="mytitlew"> Your upcoming jobs </h1>



<!--profile card -->
 <!-- #########################################-->
 <div class="card"> 
    <img src="images/kid3girl.jpg" alt="Baby SItter's profile picture">
    <h1 class="name" > Sara Omar </h1>
    <p class="title">
        <span>No. of Kids:</span>
        <span>1</span><br>
        <span>Kid's Name:</span>
        <span>Deena</span><br>
        <span>Age:</span>
        <span>10 years old</span><br>
        <span>Type of service:</span> 
        <span>baby sitting</span>
      
    </p>
    <br>
    <div class="desc">
    <div class="info">
    <h2><span>Date</span><small>14-02-2022</small></h2>
    <h2><span>50</span><small>SR/hour</small></h2>
    <h2><!--<a href="#"> --><span>Time</span><small>02:00pm-04:00pm</small></h2>
    </div>
    </div> <!-- dec card-->
    <!-- -->
    </div> <!-- end card-->
    

    <!--################################third card##################-->
    
    <div class="card"> 
        <img src="images/kid1.jpg" alt="Baby SItter's profile picture">
        <h1 class="name" > hamad bandar </h1>
        <p class="title">
            <span>No. of Kids:</span>
        <span>1</span><br>
            <span>Kid's Name:</span>
            <span>Badr</span><br>
            <span>Age:</span>
            <span>10 years old</span><br>
            <span>Type of service:</span> 
            <span>baby sitting</span>
          
        </p>
        <br>
        <div class="desc">
        <div class="info">
        <h2><span>Date</span><small>14-02-2022</small></h2>
        <h2><span>50</span><small>SR/hour</small></h2>
        <h2><!--<a href="#"> --><span>Time</span><small>02:00pm-04:00pm</small></h2>
        </div>
        </div> <!-- dec card-->
        <!-- -->
        </div> <!-- end card-->
        <!--###############################4 CARD-->

        <div class="card"> 
            <img src="images/kid7girl.jpg" alt="Baby SItter's profile picture">
            <h1 class="name" > Nora Majed </h1>
            <p class="title">
                <span>No. of Kids:</span>
        <span>1</span><br>
                <span>Kid's Name:</span>
                <span>Tala</span><br>
                <span>Age:</span>
                <span>10 years old</span><br>
                <span>Type of service:</span> 
                <span>baby sitting</span>
              
            </p>
            <br>
            <div class="desc">
            <div class="info">
            <h2><span>Date</span><small>14-02-2022</small></h2>
            <h2><span>50</span><small>SR/hour</small></h2>
            <h2><!--<a href="#"> --><span>Time</span><small>02:00pm-04:00pm</small></h2>
            </div>
            </div> <!-- dec card-->
            <!-- -->
            </div> <!-- end card-->
            
<!-- <div class="nheader"><p>customer1 <br>
Kid name:huda Age:8 y.o Type of service: babySitting duration:8-1 am</p></div>
<div class="nheader"><p>customer2 <br>
Kid name:huda Age:8 y.o Type of service: babySitting duration:8-1 am</p></div> -->


<!--links-->
<div class="link">
<a href="previous.html">view previous jobs</a> <!-- styl.css-->
</div>

<!-- button <a class="button" href="#">Job Requests</a> -->






<!-- Fotter-->
<footer class="footer-distributed">

<div class="footer-left">
<div>
<img class="logo" src="./images/logo.png" alt="Ouun">
</div>

<p class="footer-links">
<a href="#" class="link-1">Home</a>
<!--<a href="index.html/aboutus">About</a>-->
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


</body>

</html>