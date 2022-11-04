<?php
session_start();

//initiaising 
$email = "";
$errors = array();

//database connection
$con = mysqli_connect("127.0.0.1","root","","oun");

if(mysqli_connect_errno())
    die("Fail to connect to database: " . mysqli_connect_error());
    
$username = $_POST['Parent_name'];
$email = $_POST['user_email'];

$password1 = mysqli_real_escape_string($con , $_POST['user_password']);
$password2 = mysqli_real_escape_string($con ,$_POST['re_password']);

$phone = $_POST['phone'];
$city = $_POST['City'];
$district = $_POST['district'];
$street = $_POST['street'];
$buildingNo = $_POST['buildingNo'];

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
$emailcheck_query = "SELECT * FROM parent WHERE email = '$email'";
$result = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Email already exists");
}


//Start Registering 
$password = md5($password1);

 //encrypting password by using md5()
$query = "INSERT INTO parent (`name`,`password`,`email`) VALUES ('$username', '$password', '$email') ";

if (mysqli_query($con, $query)) 
{
    echo "New record created successfully !";
    $_SESSION['email'] = $email;
    header("Location: mprofile.php");
    mysqli_close($con);
    exit;
} 
else {
    echo "Error: ".mysqli_error($con);
}


// Start Registering 
if (count($errors) == 0) {
    $password = md5($password1); //encrypting password by using md5()
    $query = "INSERT INTO parent (`name`,`password`,`email`) VALUES ('$username', '$password', '$email') ";
    mysqli_query($con , $query);

    $_SESSION['email'] = $email;
    $_SESSION['success'] = "YOU LOGGED IN SUCCESSFULLY";

    header("Location: mprofile.php");
    exit();
    
} else {
    header('location: login.php');
    exit();
}
?>