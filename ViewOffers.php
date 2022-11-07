<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);
$myID = $user_data['parent_id'];
?>
<!DOCTYPE html>
<html lang = "en">
    <style>
        body{
  
  text-align: center;

}

.footer-distributed{top: 800px; }
.footer-distributed .footer-icons a{ margin-bottom: 2px;}

.card{
  background-color:white;
  border-radius: 12px;
  overflow: hidden;
  position: relative;
  overflow: hidden;
  text-align: center;
  height:650px;
  width:320px;
  margin-top:150px  ;
  box-shadow:0 12px 13px rgba(0,0,0,0.16), 0 12px 13px rgba(0,0,0,0.16);
  margin-left: 5%;
  margin-right: 5%;


}

.card img {
  border-radius:100%;
  margin-top:60px;
  width:132px;
  height:128px;
}

.name{
  color:#404040; 
}

.reviews , .title{
  font-size :1rem;
  color: #707070;
}
/*more details*/
.desc{
  font-size:20px;
  /*margin-left:65px;*/
  margin-right:65px;
  
  margin-top:20px;
   color:#404040; 
}
/*  button    */

.desc .btn1 {
  outline:none;
  background :rgb(25, 148, 74);
  /* 20px */
  margin-top:5px;
  border:none;
  height:40px;
  width:60%;
  font-size:16px;
   /* 30px */
  border-radius:12px;
  margin-left: 70px;
  }

.desc .btn2{
  outline:none;
  background : rgb(152, 33, 33);
  /* 20px */
  margin-top:5px;
  border:none;
  height:40px;
  width:60%;
  color:white;
  font-size:16px;
   /* 30px */
  border-radius:12px; 
  left: 40px;
  margin-left: 70px;
  


 
}

/*more details*/
.card .desc
{
    font-size: 19px; 
    
}
a{
    color: white; /*text button color*/
}

/* button hover*/
.card .desc .btn2 a:hover
{
    color: rgb(133, 56, 56);
}
.card .desc  .btn1 a:hover
{
    color:#3ca349; 
}
.desc .btn1
{
    color: white;
}

.dts{
    text-align: center;
}


.card .desc .info  {
padding: 0 0 1rem;
display: flex;

}
.card .desc .info h2 {
text-align: center;
width: 50%;
margin: 0;
box-sizing: border-box;
padding: 0.8rem;
display: flex;
flex-direction: column;
border-radius: 0.8rem;
transition: background-color 100ms ease-in-out;

}
/*.card .desc .info h2 {
text-decoration: none;
padding: 0.8rem;
display: flex;
flex-direction: column;
border-radius: 0.8rem;
transition: background-color 100ms ease-in-out;
}*/
.card .desc .info h2 span {
color:#404040;;
font-weight: bold;
transform-origin: bottom;
transform: scaleY(1.3);
transition: color 100ms ease-in-out;
margin-left: 40px;

}
.card .desc .info h2 small {
color: #707070;
font-size: 1rem;
font-weight: normal;
margin-left: 40px;
}
.lin{
color:#404040;
font-size:20px;
margin-top: 15px;
padding-bottom: 10px;
text-decoration: underline;
margin-left: 50px;
margin-top: 10px;
                
}
        </style>
<head>
  
<meta charset="UTF-8">
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="styleB.css">
<link rel="stylesheet" href="stylePages.css">
<!--<link rel="stylesheet" href="offerpage.css">-->
<link rel="stylesheet" href="mytitels.css">
<meta name="viewport" content="width=device-width , initial-scale=1">
<link rel="icon" type="images/png"  href="images/logo.png">
<meta name="viewport" content="width=device-width , intial-scale=1">
<title> Babysitter price offers</title>


</head>
<!--header-->
<body>
<header>
       
    <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
    <nav class="navbar">
    <ul> 
    <li><a href="mprofile.php"> Home </a></li>

    <li> <a href="ViewOffers.php"> Babysitter Offers </a>

    <li> <a href="#"> Settings </a>
    <ul class="inner">
        
    <li class="first"><a href="parentprofile.php"> view profile</a></li>
       
    <li><a href="index.php"> Sign out </a></li>
        
    </ul>
    
    </li>
    
    </ul>
    </nav>
</header>
<!--header-->



    <!-- body -->

<div><h1 class="mytitler" > <br> <br> <br> <br> Babysitter price offers:</h1> </div>
<?php 

 $query = "SELECT offer.*, babysitter.* , request.* 
 FROM offer
  INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
  INNER JOIN request ON offer.request_id = request.request_id
  WHERE request.parent_id = $myID; ";

  $myOffers = mysqli_query( $con , $query);
  $no=0;

if( mysqli_num_rows($myOffers) > 0)
{
    $no=1;
    while ($row = mysqli_fetch_assoc($myOffers)) 
    if( $row['status'] == 'p')
        {
    $no=2;
        ?>
    <div class="card" style="display:inline-block;"> 
          <?php echo "<img src='images/".$row['sitter_image']."'alt='Baby Sitter's profile picture'>" ;?> 
        <?php echo "<h1 class='name' >". $row['name'] ."</h1> ";?>
        <?php echo "<p class='title'>". $row['city']."</p>"; ?>
        <div class="desc">
            <div class="info">
       <?php echo "<h2><span>".$row['price']."</span><small>SR per hour</small></h2>"; ?>
        <?php echo "<h2><span>Time</span> <small>".$row['start_time']."-".$row['end_time']."</small></h2>"; ?>
     </div>
     <a  class="lin" href="bsprofileP.php">View Profile</a>

     

     <div class="btns">
           <?php $_GET['request_id'] = $row['request_id'];
           $_GET['offer_id'] = $row['offer_id'];
           ?>
           <a href="Accept.php?request_id=<?php echo $_GET['request_id'];?>&offer_id=<?php echo $_GET['offer_id'];?>">
           <input class="btn1" type="button" value="Accept" style = "text-align:center;"> </a>

           <a href="Reject.php?request_id=<?php echo $_GET['request_id'];?>&offer_id=<?php echo $_GET['offer_id'];?>">
           <input class="btn2" type="button" value="Reject" style = "text-align:center;"> </a>
     </div>

     <br>
     <?php echo
       "<div class= 'dts'>
            <div>Offer Details:</div>
            <p>
            Date: ".$row['date']."<br>
            Type of service: ".$row['service_type']." <br>
            Kid's name: ".$row['kid_name']."<br>
            </p>
        </div>";
        ?>    
   
        </div> <!-- dec card-->
        <!--   -->
        </div> <!-- end card-->
<?php
} }
else{
    echo "<h2> You haven't recieved any offers </h2>";
}
if($no == 1){
    echo "<h2> You haven't recieved any offers </h2>";
}
?>
        

<footer class="footer-distributed">

    <div class="footer-left">
        <div>
            <img class="logo" src="./images/logo.png" alt="Ouun">
        </div>

        <p class="footer-links">
            <a href="mprofile.php" class="link-1">Home</a>
           <!--  <a href="#">About</a> -->
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

<!--Fotter-->
    </body>

</html>
