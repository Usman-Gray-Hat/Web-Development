<?php
session_start();
$conn = mysqli_connect('localhost','root','','practice');
if(!$conn)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>