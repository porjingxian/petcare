<?php
session_start();
include('config.php');
if (isset($_SESSION['uname'])) {
if(isset($_POST['submit'])){

$uname=$_POST['uname'];
$fullname=$_POST['fullname'];
$servis=$_POST['servis'];
$apptdate=date('Y-m-d', strtotime($_POST['apptdate']));
$appttime=$_POST['appttime'];
$time_created=$_POST['time_created'];

    $sql="INSERT into appointment (username, fullname, servis, apptdate, appttime, time_created, status) values 
    ('$uname','$fullname','$servis','$apptdate','$appttime','$time_created', 'Pending')";
    if(mysqli_query($conn, $sql)){
        echo"
        <script>
        alert('Your appointment is scheduled');
        document.location.href = 'schedule.php';
        </script>
        "; 
    }else{
        echo "Error: " . mysqli_error($conn);
        header("Location: schedule.php");
    } 
}
}
?>