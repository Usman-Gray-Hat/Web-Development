<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id1']) && isset($_POST['id1'])!="")
{
    $id = $_POST['id1'];
    $query = "select * from STUDENTS where id='$id'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $response = array();

    if($rows>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
    }
    else
    {
        exit(mysqli_error());
    }
    echo json_encode($response);
}
?>