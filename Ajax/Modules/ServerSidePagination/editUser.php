<?php
include("dbConnect.php");
if(isset($_POST['id']) && isset($_POST['id'])!="")
{
    $id = $_POST['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $response = array();
    if($rows>0)
    {
        while($data = mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
        echo json_encode($response);
    }
}
?>