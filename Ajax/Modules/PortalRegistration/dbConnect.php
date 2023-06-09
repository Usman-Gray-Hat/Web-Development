<?php
session_start();
$conn = mysqli_connect('localhost','root','','REGISTRATION');
if($conn!=true)
{
    echo "<script> alert('Database not cconnected'); </script>";
}
?>