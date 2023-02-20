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
    <section>
    <h2>My Appointments</h2><br>
        <center>
        <table class="apptstyle">
        <thead>
        <tr>
        <th><strong>Status</strong></th>
        <th><strong>Appointment ID</strong></th>
        <th><strong>Full Name</strong></th>
        <th><strong>Service</strong></th>
        <th><strong>Date</strong></th>
        <th><strong>Time</strong></th>
        <th><strong>Created On</strong></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <?php
        $count=1;
        $sql="SELECT * FROM appointment WHERE username ='{$_SESSION['uname']}'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <td align="center" style="color:blue  ;"><?php echo $row["status"]; ?></td>
        <td align="center"><?php echo $row["appt_id"]; ?></td>
        <td align="center"><?php echo $row["fullname"]; ?></td>
        <td align="center"><?php echo $row["servis"]; ?></td>
        <td align="center"><?php echo $row["apptdate"]; ?></td>
        <td align="center"><?php echo $row["appttime"]; ?></td>
        <td align="center"><?php echo $row["time_created"]; ?></td>
        <td align="center">
            <a href="update.php?appt_id=<?php echo $row['appt_id']; ?>"style="color:green  ;">edit</a>
            <a href="delete.php?appt_id=<?php echo $row['appt_id']; ?>"style="color:red ;">delete</a>
        </td>

        </td>
        </tr>
        <?php $count++; } ?>
        </tbody>
        </table>
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