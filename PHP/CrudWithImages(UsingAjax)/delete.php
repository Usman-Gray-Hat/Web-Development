<?php
include('dbConnect.php');
extract($_POST['id2']);
if(isset($_POST['id2']))
{
    $id = $_POST['id2'];

    // query1 for delting an image from the folder.
    // query2 for deleting a row from table


    $query1 = "select * from student where id='$id'";
    $result = mysqli_query($conn,$query1);
    $data = mysqli_fetch_assoc($result);
    $img = $data['image_path'];

    $query2 = "delete from student where id='$id'";
    mysqli_query($conn,$query2);
    unlink($img); //For deleting an image from the folder.
}
?>