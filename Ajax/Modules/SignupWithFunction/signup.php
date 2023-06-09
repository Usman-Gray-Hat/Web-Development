<?php
include('dbConfig.php');
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = MD5($_POST['password']); // Encrypts a password
    $query = "insert into users (fname,lname,gender,age,email,password) values ('$fname','$lname','$gender','$age','$email','$password')";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo 1; //registration successfull
    }
    else
    {
        echo 0; //registration failed
    }
}
?>