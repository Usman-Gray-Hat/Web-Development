<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id2']))
{
    $id = $_POST['id2'];

    // For deleting image from the folder
    $query1 = "select * from students where id='$id'";
    $result = mysqli_query($conn,$query1);
    $data = mysqli_fetch_assoc($result);
    $old_image = $data['image_path'];

    // For deleting record from the table
    $query2 = "delete from students where id='$id'";
    mysqli_query($conn,$query2);
    unlink($old_image); //Deleting image from the folder
}
?>