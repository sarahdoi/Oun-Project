<?php
session_start();

//initiaising 
// $email = "";
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
$BabySitterimage = $_POST['image'];
$academicqual = $_POST['qualification'];
$major = $_POST['major'];
$skills = $_POST['skills'];
$languages = $_POST['lang'];
$exp = $_POST['exp'];

$add_info = $_POST['addinfo'];

if (isset($_POST['image'])) {
    $parentImage = $_POST['image'];
} else {
    $parentImage = "";
}

if ($password1 !== $password2) {
    //header("Location: RegisterParent.php?error=password doesn't match");
    //exit;
    array_push($errors , "Passwords do not match");
}

//check db for existing parent with the same email 
$emailcheck_query = "SELECT * FROM babysitter WHERE email = '$email'";
$result = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Email already exists");
}

// Start Registering
if (count($errors) == 0) {
    $password = md5($password1); //encrypting password by using md5()
    $query = "INSERT INTO babysitter (`name`, `national_ID`,`password`,`email`,`city`,`major`,`academic_qual`,`gender`,`phoneNo`,`experience_years`, `age` , `skills` , `languages` , `extra_info` ) VALUES ('$username', '$nationalid', '$password', '$email', '$city', '$major', '$academicqual', '$gender', '$phone' , '$exp' , '$age' , '$skills' , '$languages' , '$add_info')";
    $result = mysqli_query($con, $query);
    $affected = mysqli_affected_rows($con);

    if ($affected == -1) {
        header("location: login.php?error=Wrong Email/Password$username?$password");
        exit();
    } else {
        $_SESSION['sitter_name'] = $username;
        $_SESSION['user_email'] = $email;
        $_SESSION['success'] = "YOU REGISTERED IN SUCCESSFULLY";

        header("Location: currentBaby.php");
        exit();
    }
} 
?>