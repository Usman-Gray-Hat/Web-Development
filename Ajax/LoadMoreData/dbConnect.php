<?php
$conn = mysqli_connect("localhost","root","","demo2");
if(!$conn)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>