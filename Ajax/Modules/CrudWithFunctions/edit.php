<?php
include('dbConfig.php');
if(isset($_POST['id']) && isset($_POST['id'])!='')
{
    $id = $_POST['id'];
    $query = "select * from users where id='$id'";
    $result = mysqli_query($conn,$query);
    $response = array();
    $row = mysqli_num_rows($result);
    if($row>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
    }
    echo json_encode($response);
}
?>