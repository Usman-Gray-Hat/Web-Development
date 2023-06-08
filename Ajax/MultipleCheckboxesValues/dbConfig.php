<?php
$conn = mysqli_connect('localhost','root','','FRUITS');
if($conn!=true)
{
    echo "<script> alert('Database not conected!'); </script>";
}
?>