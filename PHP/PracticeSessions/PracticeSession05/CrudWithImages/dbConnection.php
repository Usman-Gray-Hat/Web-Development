<?php
$con = mysqli_connect('localhost','root','','USMAN');
if($con!=true)
{
    echo "<script>alert('Database not connected')</script>";
}
?>