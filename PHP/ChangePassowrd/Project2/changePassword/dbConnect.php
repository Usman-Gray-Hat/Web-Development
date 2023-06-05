<?php
$conn = mysqli_connect('localhost','root','','CHANGE_PASSWORD');
if($conn!=true)
{
    echo "<script> alert('Database not connected') </script>";
}
?>