<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['hidden_id']) && isset($_POST['hidden_id'])!="")
{
    $id = $_POST['hidden_id'];
    $name = $_POST['update_name'];
    $age = $_POST['update_age'];
    $email = $_POST['update_email'];
    $designation = $_POST['update_designation'];

    $query = "update EMPLOYEES set NAME='$name', AGE='$age', EMAIL='$email', DESIGNATION='$designation' where ID='$id'";
    mysqli_query($conn,$query);

}
?>