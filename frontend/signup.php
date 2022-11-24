<?php
    include_once 'header.php';
?>
    
    <section class="signup-form">
        <h2>Sign up</h2>
        <form action="../backend/signup_inc.php" method="post">
            <div class="signup-form-style">
                
                <input type="text" name="username" placeholder="Username..."> <br>
                <input type="password" name="password" placeholder="Password..."> <br>
                <input type="password" name="passwordRepeat" placeholder="Repeat your password..."> <br>
                <button type="sumbit" name="submit">Sign up</button>
            </div>
        </form>
        <!--error messages or sign up messages are included here  -->
        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p>Please fill all blanks!</p>";
                }

                else if($_GET["error"] == "pwdnotmatch") {
                    echo "<p>Password does not match, please enter again</p>";
                }

                else if($_GET["error"] == "usernametaken") {
                    echo "<p>Username exists already, please try again</p>";
                }

                else if($_GET["error"] == "none") {
                    echo "<p>Thanks! You are successfully signed up!</p>";
                }
            }
        ?>
    </section>

    


<?php
    include_once 'footer.php';
?>