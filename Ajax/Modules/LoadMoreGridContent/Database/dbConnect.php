<?php
$conn = mysqli_connect('localhost','root','','load_more');
if(!$conn)
{
    echo "<script> alert('Database not connected!'); </script>";
}
?>