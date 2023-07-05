<?php
include("../dbConnect.php");
if(isset($_POST['key']) && $_POST['key']==="AddUser")
{
    if(isset($_SESSION['admin-id']))
    {
        $admin_id = $_SESSION['admin-id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $qualification = $_POST['qualification'];
        $query = "INSERT INTO users (name,gender,age,qualification,admin_id)
        VALUES ('$name','$gender','$age','$qualification','$admin_id')";
        $exec = mysqli_query($conn,$query);
        if($exec==true)
        {
            echo "New user has been added!";
        }
        else
        {
            echo "User not added!";
        }
    }
}