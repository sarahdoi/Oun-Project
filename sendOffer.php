<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginBabysitter($con);

$sitterId= $user_data['national_ID'];

$reqId = $_GET['id'];


if( isset($_GET["sent"]) && $_GET["price"]!="" )
$price= $_GET["price"];
$query = "INSERT INTO offer (babysitter_id, request_id, price, status)
VALUES ($sitterId , $reqId , $price ,'p')" ;

$q=mysqli_query($con , $query);
mysqli_close($con);
Header( 'Location: JobRequest.php' );

?>