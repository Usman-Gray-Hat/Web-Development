<?php
include('dbConnect.php');
extract($_POST);
$name = $_POST['name'];
$fname = $_POST['fname'];
$age = $_POST['age'];
$fees = $_POST['fees'];

$query = "insert into STUDENTS (name,father_name,age,fee) values('$name','$fname','$age','$fees')";
mysqli_query($conn,$query);
?>