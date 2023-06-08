<?php
include('dbConnect.php');
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['email2']) && isset($_POST['password2']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email2'];
    $password = $_POST['password2'];

    $query = "insert into users (fname,lname,gender,age,email,password)
    values ('$fname','$lname','$gender','$age','$email',MD5('$password'))";
    mysqli_query($conn,$query);
}
?>