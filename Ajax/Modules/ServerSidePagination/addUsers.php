<?php
include("dbConnect.php");
if(isset($_POST['name']) && isset($_POST['name'])!="")
{
    $name = $_POST['name'];
    $query = "INSERT INTO users (name) VALUES ('$name')";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "User added";
    }
    else
    {
        echo "User not added";
    }
}
?>