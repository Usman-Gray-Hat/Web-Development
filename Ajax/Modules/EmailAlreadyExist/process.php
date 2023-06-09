<?php
include('dbConnect.php');
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['password']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Checking if email is already exist.
    $query1 = "select * from users where email='$email'";
    $result = mysqli_query($conn,$query1);
    $row = mysqli_num_rows($result);

    if($row>0)
    {
        // Email is already exist
        echo $row;
    }
    else
    {
        $query2 = "insert into users (fname,lname,gender,age,email,password) values('$fname','$lname','$gender','$age','$email',MD5('$password'))";
        $exec = mysqli_query($conn,$query2);
    }
}
?>