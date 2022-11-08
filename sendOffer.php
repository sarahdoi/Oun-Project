<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginBabysitter($con);

$sitterId= $user_data['national_ID'];

$reqId = $_GET['id'];


if( isset($_GET["sent"]) && $_GET["price"]!="" )
$price= $_GET["price"];
$start = $_GET["start_time"];
$end = $_GET["end_time"];
$date = $_GET["date"];
$query = "INSERT INTO offer (babysitter_id, request_id, price, status)
VALUES ($sitterId , $reqId , $price ,'p') 
WHERE request_id NOT IN 
( SELECT request_id FROM request WHERE start_time='$start' AND end_time='$end' AND date='$date'"  ;

$q=mysqli_query($con , $query);
mysqli_close($con);
Header( 'Location: JobRequest.php' );

?>