<?php
session_start();
$conn = mysqli_connect('localhost','root','','demo');
if($conn!=true)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>