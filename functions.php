<?php
//include("connection");

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
    if(isset($_SESSION['email']))
    {
        $nat_id = $_SESSION['email'];
        $query = "select * from babysitter where email = '$nat_id' limit 1";
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

function getRequests(){
    global $con;
    $query = "SELECT *
    FROM request
    INNER JOIN parent ON request.parent_id=parent.parent_id;";
    return mysqli_query( $con  , $query);
}

function getBookings(){
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id
     INNER JOIN offer ON request.request_id = offer.request_id";
    return mysqli_query( $con  , $query);
}

function getoffers(){
    global $con;
    $query = "SELECT offer.*, babysitter.* , request.* 
    FROM offer
     INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
     INNER JOIN request ON offer.request_id = request.request_id;";
    return mysqli_query( $con  , $query);
}

function getCurrentoffers(){ //
    global $con;
    $query = "SELECT offer.*, babysitter.* , request.* 
    FROM offer
     INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
     INNER JOIN request ON offer.request_id = request.request_id && request.date > (CAST(CURRENT_TIMESTAMP AS DATE)) ;";
    return mysqli_query( $con  , $query);
}
?>