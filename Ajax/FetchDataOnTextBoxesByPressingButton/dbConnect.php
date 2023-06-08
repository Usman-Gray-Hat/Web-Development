<?php
$conn = mysqli_connect('localhost','root','','TEST');
if($conn!=true)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>