<?php
session_start() ;
include("connection.php");

include("functions.php");
$user_data = check_loginParent($con);

$errors = array() ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="images/png" href="images/logo.png" >
<link rel="stylesheet" href="Registerforms.css">
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="styleB.css">
<link rel="stylesheet" href="BabyProfile.css">



<title>My Profile</title>
<style>
          .error {
            background : #F2DEDE;
            color : #A94442;
            padding:10px;
            width : 95%;
            border-radius:5px;
                  }
        </style>
<!--import google fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 
  <header>
    <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
    <nav class="navbar">
    <ul> 
    <li><a href="mprofile.php"> Home </a></li>

    <li> <a href="ViewOffers.php"> Offers </a>

    <li> <a href="#"> Settings </a>
    <ul class="inner">
        
    <li class="first"><a href="parentprofile.php"> view profile</a></li>
        
    <li><a href="index.php"> Sign out </a></li>
        
    </ul>
    
    </li>
    
    </ul>
    </nav>

</header>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<form action="phandleview.php?parent_id=<?php echo $user_data['parent_id'] ?>" method="post"> <!-- handleview.php is not ready, did not push it yet -->
                <h1>My Profile </h1>
                <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?> 
        <fieldset>
          <legend><span class="number">1</span>Personal Info</legend>
          

          <label for="pname">Parent FullName *</label>
          <input type="text" id="pname" name="parentname" value="<?php echo $user_data['name'] ?> " required>
          <label for="phone" >Phone number *</label>
          <input type="tel" id="phone" name="phone" value="<?php echo $user_data['phoneNo'] ?> "  required >
          
          <label for="mail" >Email *</label>
          <input type="email" id="mail" name="userEmail" value="<?php echo $user_data['email'] ?> "  required>
          
          <label for="password" >Password *</label>
          <input type="password" id="password" name="userPassword" value="<?php echo ($user_data['password']) ?> "  required >
        

            <label for="image" >Profile image </label>
           <img src="images/<?php echo $user_data['parent_image'] ?>" >
          <input type="file" name="image" id="image" value="<?php echo $user_data['parent_image'] ?> "  >

        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Address Info</legend>
          <label for="city" >City *</label>
          <input type="text" id="city" name="city" value="<?php echo $user_data['city'] ?> " required >
          <label>district*</label>
          <input type="text" id="district" name="district" value="<?php echo $user_data['district'] ?> " required >
          <label>street*</label>
          <input type="text" id="street" name="street" value="<?php echo $user_data['street'] ?> " required >
          <label>buildingNo*</label>
          <input type="text" id="buildingNo" name="BuildingNo" value="<?php echo $user_data['buildingNo'] ?> " required >


        </fieldset>
    <button type="submit" name="save">Save Changes</button>
    <div class="danger" style="width:100%; height:70%;">
    <button type="submit" name="delete">Delete Account</button> </div>
 </form>

 <footer class="footer-distributed">

  <div class="footer-left">

      <img class="logo" src="images/logo.png" alt="Ouun">

      <p class="footer-links">
          <a href="mprofile.php" class="link-1">Home</a>
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