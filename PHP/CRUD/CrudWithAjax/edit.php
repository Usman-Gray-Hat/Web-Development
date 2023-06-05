<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id1']) && isset($_POST['id1'])!="")
{
    $id = $_POST['id1'];
    $query = "select * from EMPLOYEES where ID='$id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    $response = array();

    if($row>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
    }
    else
    {
        $response['status']=200;
        $response['message']='error';
    }
    echo json_encode($response);
}
else
{
    $response['status']=200;
    $response['message']="Data not found";
}
?>