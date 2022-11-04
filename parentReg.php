<?php
session_start();

(isset($_POST['register-submit']))
require_once("CONFIG-DB.php");
  
//initiaising 
$email ="";

//database connection
//$con = mysqli_connect("localhost","root","","oun");

$con = mysqli_connect( DBHOST , DBUSER , DBPWD , DBNAME );
if (!$con )
die("Fail to connect to database :" . mysqli_connect_error());
else
echo('connection to db is successful');

if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());

//$username = mysqli_real_escape_string($con , $_POST['Parent_name']);
$username = ($con , $_POST['Parent_name']);
$email = ($con , $_POST['user_email']);

$password1 = ($con , $_POST['user_password']);
$password2 = ($con ,$_POST['re_password'] );

$phone = $_POST['phone'];
$city = $_POST['City'];
$district = $_POST['district'];
$street = $_POST['street'];
$buildingNo = $_POST['buildingNo'];
$parentImage = $_POST['image'];

if ($password !== $password2) {
header("Location: RegisterParent.php?error=password doesn't match");
exit;
//array_push($errors , "Passwords do not match")
}

//check db for existing parent with the same email 
$emailcheck_query = "SELECT * FROM parent WHERE email = '$email' ";
$result=mysqli_query($con,$emailcheck_query);

//$emailexist = mysqli_fetch_assoc($result );

if (mysqli_num_rows($result)>0)
{
    header("Location: RegisterParent.php?error=EMAIL exists");
    mysqli_close();
    exit;
}
/*
   //else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //header("Location: signup.php?error=EMAIL syntax is wrong");
    //exit; -->
    //}

if ( $emailexist ) {
    if ( $emailexist['email'] === $email )
    array_push($errors , "Email already exists")
} 


if ( count($errors)==0) {
$password = md5($password1);
 //encrypting password by using md5()
$query = "INSERT INTO parent (`name`,`password`,`email`) VALUES ('$name', '$password', '$email') ";
mysqli_query($con , $query);

$_SESSION['email']=$email;
$_SESSION['success']="YOU LOGGED IN SUCCESSFULLY"
header('location : mprofile.php');
}
*/

//Start Registering 
$password = md5($password1);

 //encrypting password by using md5()
$query = "INSERT INTO parent (`name`,`password`,`email`) VALUES ('$name', '$password', '$email') ";

if (mysqli_query($con, $query)) 
{
    echo "New record created successfully !";
    $_SESSION['email'] = $email;
    header("Location: mprofile.php");
    mysqli_close();
    exit;
} 
else {
    echo "Error: ".mysqli_error($con);
}



?>