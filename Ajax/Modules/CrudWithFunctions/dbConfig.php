<?php
$conn = mysqli_connect('localhost','root','','DEMO');
if($conn!=true)
{
    echo "<script> alert('Database not connected..!'); </script>";
}
?>