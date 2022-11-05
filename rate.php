
<?php
include 'connection.php';
session_start();


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


$rate_query = "SELECT * FROM bookings WHERE request_id = '$_POST['']'";
$result = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Email already exists");
    header("location: RegisterParent.php?error=Email already existed, please try again!");
}





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