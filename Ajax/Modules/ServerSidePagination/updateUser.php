<?php
include("dbConnect.php");
if(isset($_POST['id']) && isset($_POST['name']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $query = "UPDATE users SET name='$name' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "User updated";
    }
    else
    {
        echo "User not updated";
    }
}
?>