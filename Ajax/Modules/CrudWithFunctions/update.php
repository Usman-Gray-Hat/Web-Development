<?php
include("dbConfig.php");
if(isset($_POST['hidden_id']) && isset($_POST['hidden_id'])!='')
{
    $id = $_POST['hidden_id'];
    $name = $_POST['update_name'];
    $age = $_POST['update_age'];
    $gender = $_POST['update_gender'];
    $query = "update users set name='$name', age='$age', gender='$gender' where id='$id'";
    mysqli_query($conn,$query);
}
?>