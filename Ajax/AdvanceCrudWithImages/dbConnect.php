<?php
$conn = mysqli_connect('localhost','root','','school');
if($conn!=true)
{
    echo "<script> alert('Database not connected'); </script>";
}
?>