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

    <section class="appointment" id="appointment">
    <div class="calendar">
        <center>
        <h2 style="text-align:center;">February 2023</h2><br><br>
        <table cellspacing="40" cellpadding="40" class="calendarstyle">
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
          
        <tbody>
            <tr>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>
            <tr>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
            </tr>
            <tr>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
            </tr>
            <tr>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
            </tr>
            <tr>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>
            <tr>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
            </tr>
        </tbody>
    </table>
</div>
    </div>

    <?php 
    $sql = mysqli_query($conn,"select fullname from appointment where username ='{$_SESSION['uname']}'"); 

    $data = mysqli_fetch_array($sql);  
    ?>

    <img src="border.png" class="catborder2" alt="">
    <div class="apptcontainer">
    <div class="formstyle">
        <div class="formmargin">
        <form action="create.php" method="POST">
            <input type="hidden" id="uname" name="uname" value="<?php echo $_SESSION['uname']?>">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo $data['fullname'] ?>"><br><br>
            <label for="servis">Service: </label>
            <select id="servis" name="servis">
                <option value="General Health Checkup">General Health Checkup</option>
                <option value="Treatment and Surgery">Treatment and Surgery</option>
                <option value="Vaccinations and Parasite Control">Vaccinations and Parasite Control</option>
                <option value="Basic Grooming">Basic Grooming</option>
            </select><br><br>
            <label for="apptdate">Date: </label>
            <input type="date" name="apptdate"><br><br>
            <label for="appttime">Time: </label>
            <select id="appttime" name="appttime">
                <option value="Morning (8:00AM - 12:00PM)">Morning (8:00AM - 12:00PM)</option>
                <option value="Afternoon (1:00PM - 5:00PM)">Afternoon (1:00PM - 5:00PM)</option>
            </select>
            <br><br>
            <input type="hidden" name="time_created" value="<?php echo(date('Y-m-d')); ?>">
            <input type="submit" name="submit" value="Submit">
        </form>
</div>
        </div>
    </div>
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