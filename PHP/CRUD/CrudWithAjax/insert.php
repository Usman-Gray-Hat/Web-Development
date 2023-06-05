<?php
include('dbConnect.php');

extract($_POST); //For extracting the value of Ajax Data
if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['designation']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];

    $query = "insert into employees (NAME,AGE,EMAIL,DESIGNATION) values('$name','$age','$email','$designation')";
    mysqli_query($conn,$query);
}
?>