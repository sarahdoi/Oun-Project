<?php 
    session_start();

    include("connection.php");
    include("functions.php");
    
    /*if(!isset($_SESSION['email']))
	   header("Location: index.php?error=Please Sign In again!");
    else
    <?php 
        echo "<img src='images/".$parentpic."' alt='Baby Sitter's profile picture'>"
        ?> //getting imgs! works fine
    {*/
$user_data = check_loginParent($con);
$parentId= $user_data['parent_id'];
$parentName= $user_data['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>parent home page</title>
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="styleB.css">
<link rel="stylesheet" href="stylePages.css">
<link rel="stylesheet" href="HomepageP.css">
<link rel="stylesheet" href="mytitels.css">
<meta name="viewport" content="width=device-width , initial-scale=1">
<link rel="icon" type="images/png"  href="images/logo.png">
<meta name="viewport" content="width=device-width , intial-scale=1">
</head>
<body class="curbody">
    <header>
        <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
        <nav class="navbar">
        <ul> 
        <li><a href="mprofile.html"> Home </a></li>

        <li> <a href="ViewOffer.html"> Offers </a>

        <li> <a href="#"> Settings </a>
        <ul class="inner">
            
        <li class="first"><a href="parentprofile.html"> view profile</a></li>
            
        <li><a href="signout.php"> Sign out </a></li>
            
        </ul>
        
        </li>
        
        </ul>
        </nav>

    </header>
   

    <div class="welcome glow">
       <?php 
       echo "<h1  class= mytitlew>Welcome Back, ".$parentName." </h1>"
       ?>
    </div>

    <h1 class="mytitlew"> Your upcoming Bookings</h1> <!-- styl Pages.css-->

    <!--profile card -->
  
    <div class="card"> 
        
        <img src="images/cBabysitter.jpg" alt="Baby SItter's profile picture">
        <h1 class="name" > mona </h1>
        <p class="title">Riyadh , Saudi Arabia</p>
        <div class="desc">
            <div class="info">
                <h2><a href="#"><span>50</span><small>SR per hour</small></a></h2>
                <h2><a href="#"><span>Time</span><small>2:00pm-4:00pm</small></a></h2>
            </div>
        </div> <!-- dec card-->
        
        </div> <!-- end first card-->
 

        <div class="card"> 
        
            <img src="images/cBabysitter2.jpg" alt="Baby SItter's profile picture">
            <h1 class="name" > Layla </h1>
            <p class="title">Riyadh , Saudi Arabia</p>
            <div class="desc">
                <div class="info">
                    <h2><a href="#"><span>80</span><small>SR per hour</small></a></h2>
                    <h2><a href="#"><span>Time</span><small>5:00pm-7:00pm</small></a></h2>
                </div>
            </div>
           <!-- put it as link to chage info in form
           <a class="edit" href="jobreqform.html">Edit</a>
           --> 
           
             <!-- dec card-->
            <!--   -->
            </div> <!-- end second card-->

            <div class="card"> 
        
                <img src="images/cBabysitter3.jpg" alt="Baby SItter's profile picture">
                <h1 class="name" > Madison </h1>
                <p class="title">Riyadh , Saudi Arabia</p>
                <div class="desc">
                    <div class="info">
                        <h2><a href="#"><span>100</span><small>SR per hour</small></a></h2>
                        <h2><a href="#"><span>Time</span><small>4:00pm-11:00pm</small></a></h2> <!--change-->
                    </div>
                </div> <!-- dec card-->

                </div> <!-- end third card-->
                

           

        <!--welocme page-->
       
     

        <!--links-->
        <div class="link">
  
            <a href="PreReq.html">view prievious booking</a>  <!-- styl.css-->
        </div>

       

        
    
        <!-- button-->
        <a class="button" href="jobreqform.php">Job Request</a>  <!-- styl.css-->
       
   <footer class="footer-distributed">

    <div class="footer-left">
        <div>
            <img class="logo" src="./images/logo.png" alt="Ouun">
        </div>

        <p class="footer-links">
            <a href="mprofile.php" class="link-1">Home</a>
           <!-- <a href="#">About</a>  -->
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
 <!-- Fotter-->

</html>
<?php

?> 