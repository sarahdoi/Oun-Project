<?php 
session_start();

include("connection.php");
include("functions.php");
$user_data = check_loginBabysitter($con);
$sitterId= $user_data['national_ID'];

if( isset($_POST["sent"]) && $_POST["price"]!="" )
$price= $_POST("price");

$q=mysqli_query("INSERT INTO offer (babysitter_id, request_id, price, status)
VALUES ($sitterId ,$???? ,$price,'p')");

?>