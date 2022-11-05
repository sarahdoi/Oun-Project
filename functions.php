<?php

function check_loginParent($con){
    if(isset($_SESSION['email']))
    {
        $em = $_SESSION['email'];
        $query = "select * from parent where email = '$em' limit 1";
        $result = mysqli_query( $con , $query);
        if( $result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;

}

function check_loginBabysitter($con){
    if(isset($_SESSION['national_id']))
    {
        $nat_id = $_SESSION['national_id'];
        $query = "select * from babysitter where national_id = '$nat_id' limit 1";
        $result = mysqli_query( $con , $query);
        if( $result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;

}

?>