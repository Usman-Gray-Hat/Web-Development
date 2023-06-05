<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id2']))
{
    $id = $_POST['id2'];

    $query1 = "select * from STUDENTS where ID='$id'";
    $result = mysqli_query($conn,$query1);
    $data = mysqli_fetch_assoc($result);
    $old_img = $data['IMAGE_PATH'];

    $query2 = "delete from STUDENTS where ID='$id'";
    mysqli_query($conn,$query2);
    unlink($old_img);
}

?>