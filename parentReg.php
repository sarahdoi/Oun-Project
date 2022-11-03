<?php
session_start();

if (isset($_POST['register-submit']))
    require_once("CONFIG-DB.php");
  
//database connection
$con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());

$username = $_POST['Parent_name'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];
$password2 = $_POST['re_password'];

$phone = $_POST['phone'];

$city = $_POST['City'];
$district = $_POST['district'];
$street = $_POST['street'];
$buildingNo = $_POST['buildingNo'];

$parentImage = $_POST['image'];

if ($password !== $password2) {
header("Location: RegisterParent.php?error=password doesn't match");
exit;
}

//check if the email exits 
$query = "SELECT * FROM parent WHERE email = '$email' ";

$result=mysqli_query($con,$query);
if (mysqli_num_rows($result)>0)
{
    header("Location: RegisterParent.php ?error=EMAIL exist");
    mysqli_close();
    exit;
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
header("Location: RegisterParent.php?error=EMAIL syntax is wrong");
exit; 
}

$query="INSERT INTO `parent` (`parent_image`,`name`,`password`,`email`,`city`,`district`,`street`,`buildingNo` ,`phoneNo`) VALUES ('$parentImage', '$name', '$password', '$email','$city','$district','$street', '$buildingNo',`$phone`)";

if (mysqli_query($con, $query)) 
{
    echo "New record created successfully !";
    $_SESSION['name'] = $username;
    //check the name of parent's home page
    header("Location: index.html");
    mysqli_close();
    exit;
} 
else {
    echo "Error: ".mysqli_error($con);
}
?>
