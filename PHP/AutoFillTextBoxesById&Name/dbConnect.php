<?php
$con = mysqli_connect('localhost','root','','DEMO1');
if($con!=true)
{
    echo "<script>alert('Database not connected');</script>";
}
?>