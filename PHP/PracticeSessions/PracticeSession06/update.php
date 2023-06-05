<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['hidden_id']))
{
    $id = $_POST['hidden_id'];
    $name = $_POST['update_name'];
    $fname = $_POST['update_fname'];
    $age = $_POST['update_age'];
    $fees = $_POST['update_fees'];

    $query = "update STUDENTS set name='$name',father_name='$fname',age='$age',fee='$fees' where id='$id'";
    mysqli_query($conn,$query);
}
?>