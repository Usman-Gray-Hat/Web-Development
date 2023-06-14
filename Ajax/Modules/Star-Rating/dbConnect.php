<?php
$conn = mysqli_connect("localhost","root","","STAR_RATINGS");
if(!$conn)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>