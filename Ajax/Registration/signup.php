<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['pass']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "insert into users (fname,lname,gender,age,email,password) values('$fname','$lname','$gender','$age','$email',MD5('$pass'))";
    mysqli_query($conn,$query);
}
?>
<!-- Note: We're using MD5(); function for password, therefore password will be stored in a database as in encrypted form. -->