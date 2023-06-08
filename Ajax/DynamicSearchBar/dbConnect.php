<?php
$conn = mysqli_connect('localhost','root','','PRACTICE2');
if($conn!=true)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>