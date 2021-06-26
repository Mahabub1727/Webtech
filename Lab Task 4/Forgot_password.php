<?php

    session_start(); 

    if(isset($_POST['submit'])){
        $fEmail = $_POST['email'];

        if($fEmail === $_COOKIE["email"]){
            echo "Please wait while we send you an OTP";
        }
    }
    else{
        echo "Error occured";
    }


?>