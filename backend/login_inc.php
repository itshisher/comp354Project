<?php

if(isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputLogin($username, $password) !== false) {
        header("location: ../frontend/login.php?error=emptyinput");
        exit();
    }
    //login function in functions.php
    loginUser($connection, $username, $password);

}

else {
    // if users input username and password incorrectly, send back to login page
    header("location: ../frontend/login.php");
    exit();
}