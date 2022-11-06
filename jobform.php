<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);
//initiaising 
$errors = array();

$parentID = $user_data['parent_id'] ;


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

    mysqli_close($con);
    Header( 'Location: mprofile.php' );
 


?>