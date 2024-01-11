<?php
$conn = mysqli_connect("localhost","root","","server_side_pagination");
if($conn != true)
{
    echo "<script> alert('Database not connected'); </script>";
}
?>