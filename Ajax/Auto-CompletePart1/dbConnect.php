<?php
$conn = mysqli_connect('localhost','root','','PRACTICE');
if($conn!=true)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>