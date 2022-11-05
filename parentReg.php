<?php
session_start();
//if(isset($_POST['submit'])) must add i think?
//initiaising 

include("connection.php");
include("functions.php");
$errors = array();

   
//retriving info from the form
$username = $_POST['parentname'];
$email = $_POST['userEmail'];

$password1 = mysqli_real_escape_string($con , $_POST['userPassword']);
$password2 = mysqli_real_escape_string($con ,$_POST['repeatedPassword']);

$phone = $_POST['phone'];
$city = $_POST['city'];
$district = $_POST['district'];
$street = $_POST['street'];
$buildingNo = $_POST['buildingNo'];
// all img info ------
if( isset($_FILES['image'])){ 
$image=$_FILES['image'];
$imgName=$_FILES['image']['name'];
$imgTmpName=$_FILES['image']['tmp_name'];

$upload_directory="images/"; //to move ir to this file
$TargetPath=time().$imgName;

if(move_uploaded_file($imgTmpName, $upload_directory.$TargetPath)){    
 $QueryInsertFile="INSERT INTO parent (`parent_image`) VALUES ('$TargetPath')"; //but didnt sent.
 //$result = mysqli_query($con, $QueryInsertFile);
  }

}// is set


if ($password1 !== $password2) {
    header("Location: RegisterParent.php?error=password doesn't match, please try again!");
    exit;
    array_push($errors , "Passwords do not match");
}

//check db for existing parent with the same email 
$emailcheck_query = "SELECT * FROM parent WHERE email = '$email'";
$result = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Email already exists");
    header("location: RegisterParent.php?error=Email already existed, please try again!");
}

//check db for existing parent with the same phone 
$phonecheck_query = "SELECT * FROM parent WHERE phoneNo = '$phone'";
$result = mysqli_query($con, $phonecheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Phone number already exists");
    header("location: RegisterParent.php?error=The phone number already existed, please try again!");
}

if( ! isset($_FILES['image']['name']) || empty($_FILES['image']['name']) ){ 
    $TargetPath="prpic.png";
}

// Start Registering
if (count($errors) == 0) {
    $password = md5($password1); //encrypting password by using md5()
    
    $query = "INSERT INTO parent (`parent_image`,`name`,`password`,`email`,`city`,`district`,`street`,`buildingNo`,`phoneNo`) VALUES ('$TargetPath','$username', '$password', '$email', '$city', '$district', '$street', '$buildingNo', '$phone')";
    $result = mysqli_query($con, $query);
    $affected = mysqli_affected_rows($con);

    if ($affected == -1) {
        header("location: RegisterParent.php?error=There was a problem in your regesteration , please try again");
        exit();
    } else {
        $_SESSION['parentname'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "YOU REGISTERED IN SUCCESSFULLY";
        $_SESSION['parent_image'] = $TargetPath;


        header("Location: mprofile.php");
        exit();
    }
} 
?>