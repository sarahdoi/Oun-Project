<?php 
    session_start();

    if(!isset($_SESSION['email']))
	   header("Location: index.php?error=Please Sign In again!");

    else
    {

?>



<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/png" href="images/logo.png" >

 <!--import google fonts & stars-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="style.css" >-->
<link rel="stylesheet" href="bsreview.css" > 


<title> Review Babysitter </title>
</head>

<body>

<!--review and rate card-->
<form action="rate.php">
<div class="container" >
    <div class="star-widget">
       <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fa fa-star checked"></label>
       <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fa fa-star checked"></label> 
       <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fa fa-star"></label>
       <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fa fa-star"></label>
      <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fa fa-star"></label>
       
     
            <header> </header>
            <div class="textarea">
                <textarea style="font-size:medium;" cols="30" placeholder="Describe your experiance.."></textarea>
            </div>

            <div class="btn">
 
                <button type="submit"> Post</button>
          </div>
       
    </div>
  
  </div>
</form>
</body>



</html>



<?php
    }
?> 