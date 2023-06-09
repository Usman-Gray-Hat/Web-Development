<?php
session_start();
$conn = mysqli_connect('localhost','root','','VERIFICATION_CODE');
if($conn!=true)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>