<?php
$conn = mysqli_connect('localhost','root','','SCHOOL');
if($conn!=true)
{
    echo "<script> alert('Database not connected..!'); </script>";
}
?>