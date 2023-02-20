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
    <link rel="stylesheet" href="doctor_style.css">
    <title>Medical Record</title>
</head>
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
<body>
<section>
    <form action="sendemail.php" method="POST">
        Recipient: <input type="email" name="recipientemail" value=""><br><br>
        Subject: <input type="text" name="subject" value=""><br><br>
        Message: <textarea id="selectedmessage" name="selectedmessage" rows="4" cols="50"></textarea><br><br>

        <input type='checkbox' class='chkbx' value='Hi dear customer, This is <?php echo $_SESSION['uname']?>
        calling from Pet Care Veterinary Clinic to remind you of your upcoming appointment
        on [day, month] at [Morning (8:00AM - 12:00PM)/Afternoon (1:00PM - 5:00PM)]. If you have any 
        questions or concerns, please do not hesitate to get in touch with us at 
        petcarebalikpulau@gmail.com or 04-866 8231. Thank you!'>Hi dear customer, This is <?php echo $_SESSION['uname']?>
        calling from Pet Care Veterinary Clinic to remind you of your upcoming appointment
        on [day, month] at [Morning (8:00AM - 12:00PM)/Afternoon (1:00PM - 5:00PM)]. If you have any 
        questions or concerns, please do not hesitate to get in touch with us at 
        petcarebalikpulau@gmail.com or 04-866 8231. Thank you!<br><br>

        <input type='checkbox' class='chkbx' value='Hi dear customer, This is <?php echo $_SESSION['uname']?>
        calling from Pet Care Veterinary Clinic to remind you of your clinician bill. You owe [RM] for 
        your last visit on [date]. Please make a direct bank transfer to Maybank at 157130184870.
        If you need assistance or have any questions, please do not hesitate to get in touch with us 
        at petcarebalikpulau@gmail.com or 04-866 8231. Thank you!'>Hi dear customer, This is <?php echo $_SESSION['uname']?>
        calling from Pet Care Veterinary Clinic to remind you of your clinician bill. You owe [RM] for 
        your last visit on [date]. Please make a direct bank transfer to Maybank at 157130184870.
        If you need assistance or have any questions, please do not hesitate to get in touch with us 
        at petcarebalikpulau@gmail.com or 04-866 8231. Thank you!<br><br>

        <button type="submit" name="send">Send</button>
    </form>
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
        });
    });

    window.addEventListener("scroll",function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

    $(document).ready(function(){
        $('.chkbx').click(function(){
            var text = "";
            $('.chkbx:checked').each(function(){
                text+=$(this).val();
            });
            text=text.substring(0,text.length-1);
            $('#selectedmessage').val(text);
        });
    });
</script>
</body>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>