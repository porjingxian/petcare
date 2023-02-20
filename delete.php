<?php
include('config.php');
$appt_id=$_REQUEST['appt_id'];
$query = "DELETE FROM appointment WHERE appt_id=$appt_id"; 

if(mysqli_query($conn,$query)){
    echo"
        <script>
        alert('Your appointment is canceled');
        document.location.href = 'appointment.php';
        </script>
        ";
}else{
    mysqli_error($conn);
}
?>