<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    require_once("CONFIG-DB.php");


    echo "im in checklogin page";
//intialising variables

    $email =$ $_POST['user_email'];
    $password = $_POST['user_password'];

    $query = "SELECT * FROM 'parent' WHERE email='$email' AND password='$password'";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['email'] = $email;
        mysqli_close($con);
        //do not forger change the location 
        header("Location: ParentReg.php");
    }
    else {
        mysqli_close($con);
        header("Location:login.php?error=Wrong Email/Password");
    }
?>