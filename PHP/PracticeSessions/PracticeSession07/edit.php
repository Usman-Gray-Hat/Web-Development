<?php
include('dbConnect.php');
extract($_POST);
if($_POST['id1'])
{
    $id = $_POST['id1'];
    $query = "select * from STUDENTS where ID='$id'";
    $result = mysqli_query($conn,$query);
    $response = array();

    while($data = mysqli_fetch_assoc($result))
    {
        $response = $data;
    }
    echo json_encode($response);
}
?>