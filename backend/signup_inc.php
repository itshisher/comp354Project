<?php

// unless users click on sumbit button to sign up, otherwise they will be send back to the sign up web page
if(isset($_POST["submit"])) {   

    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    

    //include error handlers to catch potential problems users made
    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputSignup($username, $password, $passwordRepeat) !== false) {
        header("location: ../frontend/signup.php?error=emptyinput");
        exit();
    }


    if(pwdMatch($password, $passwordRepeat) !== false) {
        header("location: ../frontend/signup.php?error=pwdnotmatch");
        exit();
    }

    if(uidExists($connection, $username) !== false) {
        header("location: ../frontend/signup.php?error=usernametaken");
        exit();
    }

    createUser($connection, $username, $password);

}
else {
    header("location: ../frontend/signup.php");
    exit();
}