<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="login_bg.jpg">
        </div>
        <div class="contentBx">
            <div class="formBx">
            <h2>Sign Up</h2><br>
            
            <form action="signup.php" method="post">
            <div class="inputBx"><span>Email Address: </span><input type="text" name="uname" placeholder="Example : bob88@gmail.com" required=""></div><br>
            <div class="inputBx"><span>Password: </span><input type="password" name="pword" placeholder="Password" required=""></div><br>
            <div class="inputBx"><span>Confirm Password: </span><input type="password" name="pwordrepeat" placeholder="Password" required=""></div><br>
            <div class="inputBx"><span>Full Name: </span><input type="text" name="fullname" placeholder="Example: Siti Cempaka" required=""></div><br>
            <div class="inputBx"><span>Upload a Profile Picture: </span><input type="file" name="pfp" required=""></div><br>
            <div class="inputBx"><input type="submit" name="signup" value="Sign Up"></div><br>
            <div class="inputBx"><p>Already have an account? <a href="login.php">Log In</a></p></div>
            </form>
            <?php

            if (isset($_POST['uname']) && isset($_POST['pword'])) {
                if($_POST['pword'] === $_POST['pwordrepeat']){
                    $uname = $_POST['uname'];
                    $pword = $_POST['pword'];
                    $fullname = $_POST['fullname'];
                    $pfp = $_POST['pfp'];
                    $sql = "INSERT into users (uname, pword, fullname, pfp, user_type) values ('$uname','$pword','$fullname','$pfp','user')";
                    if(mysqli_query($conn, $sql)){
                        header("Location: login.php");
                    }else{
                        echo "Error: " . mysqli_error($conn);
                    }
                }else{
                    echo '<p style="color:red; padding-bottom:1.7rem;">Check if Password and Confirm Password is Matched</p>';
                        exit(0);
                }
            }
            ?>
            
            </div>
        </div>
        
    </section>
</body>
</html>

