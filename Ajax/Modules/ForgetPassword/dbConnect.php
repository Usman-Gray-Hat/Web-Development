<?php
session_start();
$conn = mysqli_connect('localhost','root','','FORGET_PASSWORD');
if($conn!=true)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>