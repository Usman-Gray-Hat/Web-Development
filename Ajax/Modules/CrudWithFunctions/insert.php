<?php
include('dbConfig.php');
if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['gender']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $query = "insert into users (name,age,gender) values ('$name','$age','$gender')";
    mysqli_query($conn,$query);
}
?>