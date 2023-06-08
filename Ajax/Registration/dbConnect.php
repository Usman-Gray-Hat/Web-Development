<?php
$conn = mysqli_connect('localhost','root','','REGISTRATION');
if($conn!=true)
{
    echo "<script>alert('Database not connected');</script>";
}
?>