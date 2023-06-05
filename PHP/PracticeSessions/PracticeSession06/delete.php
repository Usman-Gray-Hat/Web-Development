<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id2']))
{
    $id = $_POST['id2'];
    $query = "delete from STUDENTS where id='$id'";
    mysqli_query($conn,$query);
}
?>