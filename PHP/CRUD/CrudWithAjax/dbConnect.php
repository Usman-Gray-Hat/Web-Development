<?php
$conn = mysqli_connect('localhost','root','','COMPANY');
if($conn!=true)
{
    echo "<script> alert('Database connection failed..!'); </script>";
}
?>