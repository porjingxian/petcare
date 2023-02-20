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
<body>
<?php

$appt_id = $_GET['appt_id']; 

$sql = mysqli_query($conn,"select * from appointment where appt_id='$appt_id'"); 

$data = mysqli_fetch_array($sql); 

if(isset($_POST['update']))
{
    
    $uname=$_POST['uname'];
    $fullname=$_POST['fullname'];
    $servis=$_POST['servis'];
    $apptdate=date('Y-m-d', strtotime($_POST['apptdate']));
    $appttime=$_POST['appttime'];
    $time_created=$_POST['time_created'];
	
    $update = "UPDATE appointment set fullname='$fullname', servis='$servis', apptdate='$apptdate', 
    appttime='$appttime', time_created='$time_created' where appt_id='$appt_id'";
	
    if(mysqli_query($conn,$update))
    {
        echo"
        <script>
        alert('Your appointment is updated');
        document.location.href = 'appointment.php';
        </script>
        ";
    }
    else
    {
        echo mysqli_error($conn);
    }    	
}
?>
<section>
    <div class="updatecontainer">
        <form method="POST">
            <input type="hidden" id="uname" name="uname" value="<?php echo $_SESSION['uname']?>">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo $data['fullname'] ?>"><br><br>
            <label for="servis">Service: </label>
            <select id="servis" name="servis">
                <option value="<?php echo $data['servis'] ?>"><?php echo $data['servis'] ?></option>
                <option value="General Health Checkup">General Health Checkup</option>
                <option value="Treatment and Surgery">Treatment and Surgery</option>
                <option value="Vaccinations and Parasite Control">Vaccinations and Parasite Control</option>
                <option value="Basic Grooming">Basic Grooming</option>
            </select><br><br>
            <label for="apptdate">Date: </label>
            <input type="date" name="apptdate" value="<?php  echo $data['apptdate'] ?>"><br><br>
            <label for="appttime">Time: </label>
            <select id="appttime" name="appttime">
                <option value="<?php echo $data['appttime'] ?>"><?php echo $data['appttime'] ?></option>
                <option value="Morning (8:00AM - 12:00PM)">Morning (8:00AM - 12:00PM)</option>
                <option value="Afternoon (1:00PM - 5:00PM)">Afternoon (1:00PM - 5:00PM)</option>
            </select>
            <br><br>
            <input type="hidden" name="time_created" value="<?php echo(date('Y-m-d')); ?>">
            <input type="submit" name="update" value="Update">
            <button><a href="appointment.php">Back</a></button>
        </form>
</div>
<img src="border.png" class="catborder" alt="">
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