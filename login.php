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
            <h2>LOGIN</h2><br>
            <form action="login.php" method="post">
            <div class="inputBx"><span>Username: </span><input type="text" name="uname" placeholder="Example : bob88@gmail.com" required=""></div><br>
            <div class="inputBx"><span>Password: </span><input type="password" name="pword" placeholder="Password" required=""></div><br>
            <?php

            if (isset($_POST['uname']) && isset($_POST['pword'])) {
            $uname = $_POST['uname'];
            $pword = $_POST['pword'];
            $sql = "SELECT * FROM users WHERE uname='$uname' AND pword='$pword';";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['uname'] === $uname && $row['pword'] === $pword) {
                    $_SESSION['uname'] = $row['uname'];
                    foreach($result as $data){
                        $id = $data['id'];
                        $user_type = $data['user_type'];
                    }
                    $_SESSION['auth'] = true;
                    $_SESSION['auth_role'] = "$user_type";
                    $_SESSION['auth_user'] = [
                        'id' => $id
                    ];
                    if($_SESSION['auth_role'] == "user"){
                        header("Location: user_home.php");
                        exit(0);
                    }elseif($_SESSION['auth_role'] == "admin"){
                        header("Location: admin_home.php");
                        exit(0);
                    }elseif($_SESSION['auth_role'] == "doctor"){
                        header("Location: doctor_home.php");
                        exit(0);
                    }
                }else{
                    echo '<p style="color:red; padding-bottom:1.7rem;">Incorrect username or password</p>';
                }
            }else{
                echo '<p style="color:red; padding-bottom:1.7rem;">Incorrect username or password</p>';
            }
        }
            ?>
            <div class="inputBx"><input type="submit" name="login" value="Login"></div><br>
            <div class="inputBx"><p>Don't have an account? <a href="signup.php">Sign Up</a></p></div>
            </form>
            </div>
        </div>
    </section>
</body>
</html>

