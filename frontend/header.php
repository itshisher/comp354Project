<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Project</title>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css" />
    
</head>

<body>
    

    <nav>
        <div class="wrapper">       
            <a href=""><img src="../IMG/1.png" alt="bookProject logo"></a>
            <ul>
                
                <?php
                    // check if useruid is exist in the website to make sure users are logged in
                    //userid is stored in the session
                    if(isset($_SESSION["username"])) {
                        echo "<li><a href='home.php'>Home</a></li>";
                        echo "<li><a href='reading.php'>Reading</a></li>";
                        echo "<li><a href='toRead.php'>To Read</a></li>";
                        echo "<li><a href='read.php'>Read</a></li>";
                        echo "<li><a href='didNotFinish.php'>Did Not Finish</a></li>";
                        echo "<li><a href='favorites.php'>Favorites</a></li>";
                        echo "<li><a href='recommendations.php'>Recommendations</a></li>";
                        echo "<li><a href='logout.php'>Log out</a></li>"; 
                    }
                    else {
                        //showing this if users not logged in
                        echo "<li><a href='signup.php'>Sign up</a></li>";
                        echo "<li><a href='login.php'>Log in</a></li>";
                    }
                ?>

            </ul>
        </div>

    </nav>

    

    <div class="wrapper">