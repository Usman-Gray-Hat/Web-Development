<?php
$conn = mysqli_connect('localhost','root','','DB_ROUGH');
if($conn!=true)
{
    echo "<script> alert('Database not connected'); </script>";
}
?>