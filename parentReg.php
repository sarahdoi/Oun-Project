<?php
session_start();

//if (isset($_POST['register-submit']))
   // require_once("CONFIG-DB.php");
  
//initiaising 
$email ="";
$errors = array();

//database connection
$con = mysqli_connect("localhost","root","","oun");

if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());

$username = mysqli_real_escape_string($con , $_POST['Parent_name']);
$email = mysqli_real_escape_string($con , $_POST['user_email']);

$password1 = mysqli_real_escape_string($con , $_POST['user_password']);
$password2 = mysqli_real_escape_string($con ,$_POST['re_password'] );

$phone = $_POST['phone'];
$city = $_POST['City'];
$district = $_POST['district'];
$street = $_POST['street'];
$buildingNo = $_POST['buildingNo'];
$parentImage = $_POST['image'];

if ($password !== $password2) {
//header("Location: RegisterParent.php?error=password doesn't match");
//exit;
array_push($errors , "Passwords do not match")
}

//check db for existing parent with the same email 
$emailcheck_query = "SELECT * FROM parent WHERE email = '$email' ";
$result=mysqli_query($con,$emailcheck_query);

$emailexist = mysqli_fetch_assoc($result );

if ( $emailexist ) {
    if ( $emailexist['email'] === $email )
    array_push($errors , "Email already exists")
}

//Start Registering 
if ( count($errors)==0) {
$password = md5($password1); //encrypting password by using md5()
$query = "INSERT INTO parent (`name`,`password`,`email`) VALUES ('$name', '$password', '$email') ";
mysqli_query($con , $query);

$_SESSION['email']=$email;
$_SESSION['success']="YOU LOGGED IN SUCCESSFULLY"
header('location : mprofile.php');
}


?>