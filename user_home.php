<?php
session_start();
include('config.php');
if (isset($_SESSION['uname'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8f88296405.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Pet Care</title>
</head>
<body>
    <header>
        <nav>
            <a href="#" class="logo"><i class="fas fa-paw"></i> Pet Care</a>
            <ul>
                <li><a href="user_home.php">Home</a></li>
                <li><a href="schedule.php">Schedule Appointment</a></li>
                <li><a href="appointment.php">My Appointments</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        <div class="icon">
            <div class="fas fa-user" id="login-btn"><span style="margin-left:1rem; font-size:1.3rem; font-weight:600;"><?php echo $_SESSION['uname']?></span></div>
        </div>
        <div class="sub-menu-wrap">
            <div class="sub-menu">
                    <a href="login.php" class="menu-link">
                        <i class="fas fa-user"></i>
                        <p>Log Out</p>
                        <span>></span>
                    </a>
            </div>
        </div>
        </nav>
    </header>

    <section class="home" id="home">
        <div class="content">
            <h1>Welcome to <span>Pet Care</span></h1>
            <h2>Where pets are treated like family</h2>
            <a href="schedule.php" class="btn">Make Appointment</a>
        </div>
        <img src="bottom_wave.png" class="wave" alt="">
    </section>

    <section class="service" id="service">
        <div class="content">
            <div class="logo"><i class="fas fa-stethoscope"></i></div>
            <h2>Our medical services</h2>
            <p>At Pet Care, we offer medical services for </p><p> animals in the Balik Pulau area, including:</p>
        </div>
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="slide first">
                    <img src="img1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img3.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img4.jpg" alt="">
                </div>
                <div class="navigation-auto">
                   <div class="auto-btn1"></div> 
                   <div class="auto-btn2"></div> 
                   <div class="auto-btn3"></div> 
                   <div class="auto-btn4"></div> 
                </div>

            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
        <script type="text/javascript">
            var counter = 1;
            setInterval(function(){
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if(counter > 4){
                    counter=1;
                }
            }, 5000);
        </script>
    </section>

<script type="text/javascript">
    $(document).ready(function(){
        var form = $(".sub-menu-wrap");
        var status = false;
        $("#login-btn").click(function(event){
            event.preventDefault();
            if(status==false){
                form.fadeIn();
                status=true;
            }else{
                form.fadeOut();
                status=false;
            }
        })
    })

    window.addEventListener("scroll",function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>
</body>
</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>