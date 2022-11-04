<?php
$con = new mysqli("localhost","root","","oun");

$q = "INSERT INTO parent (`name`,`password`,`email`) VALUES ('Sarah', '111', 'suhd@gmail.com')";

$result= mysqli_query($con , $q);

if ( $con -> query($q) )
echo"new record created successfully";
else
echo "ERROR".$query."<br>".$con->error;


$con->close()
?>