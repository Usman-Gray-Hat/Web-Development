<?php
include('dbConnect.php');
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