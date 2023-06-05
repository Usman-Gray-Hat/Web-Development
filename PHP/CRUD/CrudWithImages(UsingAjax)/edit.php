<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id1']) && isset($_POST['id1'])!="")
{
    $id = $_POST['id1'];
    $query = "select * from student where id='$id'";
    $result = mysqli_query($conn,$query);
    $response = array();
    $rows = mysqli_num_rows($result);

    if(!$result)
    {
        exit(mysqli_error());
    }

    if($rows>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
    }
    else
    {
        $response['status']=200;
        $response['message']="Data not found";
    }
    echo json_encode($response);
}
else
{
    $response['status']=200;
    $response['message'] = "Data not found";
}
?>