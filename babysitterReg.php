<?php
session_start();


$errors = array();

//database connection
$con = mysqli_connect("127.0.0.1","root","","oun");

if(mysqli_connect_errno())
    die("Fail to connect to database: " . mysqli_connect_error());
    
$username = $_POST['sitter_name'];
$nationalid = $_POST['ID'];
$phone = $_POST['phone'];
$city = $_POST['City'];
$email = $_POST['user_email'];

$password1 = mysqli_real_escape_string($con , $_POST['user_password']);
$password2 = mysqli_real_escape_string($con ,$_POST['repeatedPassword']);


$gender = $_POST['user_gender'];
$age = $_POST['age'];
//$BabySitterimage = $_POST['image'];
$bio = $_POST['bio'];

if (isset($_POST['image'])) {
    $parentImage = $_POST['image'];
} else {
    $parentImage = "";
}


if ($password1 !== $password2) {
    header("Location: RegisterBabysitter.php?error=Passwords do not match");
    exit();
    array_push($errors , "Passwords do not match");
}

//check db for existing parent with the same email 
$idcheck_query = "SELECT * FROM babysitter WHERE national_ID = '$nationalid'";
$result1 = mysqli_query($con, $idcheck_query);

$emailcheck_query = "SELECT * FROM babysitter WHERE email = '$email'";
$result2 = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result1) > 0) {
    array_push($errors , "National ID already existed");
    header("location: RegisterBabysitter.php?error=National ID already existed, please try again!");
}
if (mysqli_num_rows($result2) > 0) {
    array_push($errors , "Email already existed");
    header("location: RegisterBabysitter.php?error=Email already existed, please try again!");
}
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("RegisterBabysitter.php?error=EMAIL syntax is wrong");
    exit();
}
*/

//check db for existing parent with the same phone 
$phonecheck_query = "SELECT * FROM babysitter WHERE phoneNo = '$phone'";
$result = mysqli_query($con, $phonecheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Phone number already existed");
    header("location: RegisterBabysitter.php?error=Phone number already existed, please try again!");
}

// Start Registering
if (count($errors) == 0) {
    $password = md5($password1); //encrypting password by using md5()
    $query = "INSERT INTO babysitter (`name`, `national_ID`,`password`,`email`,`city`,`bio`,`gender`,`phoneNo`, `age` ) VALUES ('$username', '$nationalid', '$password', '$email', '$city', '$bio', '$gender', '$phone' , '$age' )";
    $result = mysqli_query($con, $query);
    $affected = mysqli_affected_rows($con);

    if ($affected == -1) {
        header("location: RegisterBabysitter.php?error=Wrong Email/Password");
        exit();
    } else {
        $_SESSION['sitter_name'] = $username;
        $_SESSION['ID'] = $nationalid;
        $_SESSION['success'] = "YOU REGISTERED IN SUCCESSFULLY";

        header("Location: currentBaby.php");
        exit();
    }
} 
?>