<?php
session_start();
//if(isset($_POST['submit'])) must add i think?
//initiaising 
// $email = "";
$errors = array();

//database connection
$con = mysqli_connect("127.0.0.1","root","","oun");

if(mysqli_connect_errno())
    die("Fail to connect to database: " . mysqli_connect_error());
    
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
$image=$_FILES['image'];
$imgName=$_FILES['image']['name'];
$imgTmpName=$_FILES['image']['tmp_name'];
$imgSize=$_FILES['image']['size'];
$imgError=$_FILES['image']['error'];
$imgType=$_FILES['image']['type'];
$upload_directory="images/";
$TargetPath=time().$imgName;
//$imgExt= explode('.', $imgName ); // file extention must be img..
if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory.$TargetPath)){    
    $QueryInsertFile="INSERT INTO parent SET parent_image='$TargetPath'"; //but didnt sent.
    // Write Mysql Query Here to insert this $QueryInsertFile   .                   
  }
//$imgActulExt= strtolower(end($imgExt)); // to get the seconed data from imgext, using end for the secnd part

$allowed=array('jpg','jpeg','png','pdf');

if(in_array($imgActulExt,$allowed) ){
if($imgError=== 0){
if($imgSize < 1000000){
$imgNameNew= uniqid('', true).".".$imgActulExt; //to prevent over writning another user's photo if they had same name! and to add the extention back
/*$imgDestination='C:\Users\awaxh\Downloads\New folder\htdocs\Oun-Project\images';//.$imgNameNew;
move_uploaded_file($imgTmpName,$imgDestination); //from , to
//header("Location: RegisterParent.php? uploadsucess");*/
}else{
    echo "Your file is too big!";  
}
}else{
    echo "there was an error uploading your file!";
}
}else{
    echo "you can not upload this type of files! try to upload only(jpg, jpeg, png, pdf)";
}


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

// Start Registering
if (count($errors) == 0) {
    $password = md5($password1); //encrypting password by using md5()
    $query = "INSERT INTO parent (`parent_image`,`name`,`password`,`email`,`city`,`district`,`street`,`buildingNo`,`phoneNo`) VALUES ('$TargetPath','$username', '$password', '$email', '$city', '$district', '$street', '$buildingNo', '$phone')";
    $result = mysqli_query($con, $query);
    $affected = mysqli_affected_rows($con);

    if ($affected == -1) {
        header("location: login.php?error=Wrong Email/Password$username?$password");
        exit();
    } else {
        $_SESSION['parentname'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "YOU REGISTERED IN SUCCESSFULLY";

        header("Location: mprofile.php");
        exit();
    }
} 
?>