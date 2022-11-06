
<?php
include 'connection.php';
include 'functions.php';
session_start();

$review=""; 

if (! isset($_POST['rate']))
$rate = 0;
else {

if($_POST['rate'] == "rate-5") {
    $rate =5;
}if($_POST['rate'] == "rate-4") {
    $rate =4;
} else if($_POST['rate'] == "rate-3") {
    $rate = 3;
} else if($_POST['rate'] == "rate-2") {
    $rate  = 2;
} else if($_POST['rate'] == "rate-1") {
    $rate = 1;
}
}

if (isset($_POST['review']))
$review = $_POST['review'];

//booking_id = $_GET['booking_id'];

$query = "INSERT INTO bookings ( 'review' , 'rating' ) VALUES ( '$review' , '$rate') where booking_id= '$booking_id' ";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {

}

header("location: mprofile.php");
exit();

mysqli_close($con);



/*switch $answer {
                case "add":
                //Check if guess is right and echo
                break;
                case "substract":
                //Check if guess is right and echo
                break;
                case "multiply":
                //Check if guess is right and echo
                break; 
                case "divide":
                //Check if guess is right and echo
                break;
              };
              */

?>