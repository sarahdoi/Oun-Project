<?php
session_start();

//initiaising 
$errors = array();

//database connection
$con = mysqli_connect("127.0.0.1","root","","oun");

if(mysqli_connect_errno())
    die("Fail to connect to database: " . mysqli_connect_error());
    
$parentID = $_SESSION['parent_id'];
//$USER->id;
//$parentID = mysqli_query($con,"SELECT SUSER_ID()");


$numOfKids = $_POST['numOfKids'];
$kid_name = $_POST['kid_name'];
$kid_age = $_POST['kid_age'];
$service = $_POST['service'];
$date = $_POST['date'];
$startTime = $_POST['duration1'];
$endTime = $_POST['duration2'];



// Start Registering
    $query = "INSERT INTO request (`parent_id`,`numOfKids`,`kid_name`,`kid_age`,`service_type`,`date`,`start_time`,`end_time`) 
    VALUES ('$parentID', '$numOfKids', '$kid_name', '$kid_age', '$service', '$date', '$startTime', '$endTime')";
    $result = mysqli_query($con, $query);

?>