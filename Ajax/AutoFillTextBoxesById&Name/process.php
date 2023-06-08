<?php
include('dbConnect.php');
// Fetch By ID
if(isset($_POST['id']) && isset($_POST['id'])!='')
{
    $id = $_POST['id'];
    $query = "select * from students where id='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    $response = array();

    if($row>0)
    {
        $response = $data;
    }
    echo json_encode($response);
}

// Fetch By Name
if(isset($_POST['name']) && isset($_POST['name'])!='')
{
    $name = $_POST['name'];
    $query = "select * from students where name='$name'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    $response = array();

    if($row>0)
    {
        $response = $data;
    }
    echo json_encode($response);
}
?>