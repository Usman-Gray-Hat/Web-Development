<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['id1']))
{
    $id = $_POST['id1'];
    $query = "select * from students where id='$id'";
    $result = mysqli_query($conn,$query);
    $response = array();

    if(!$result)
    {
        exit(mysqli_error());
    }

    if(mysqli_num_rows($result)>0)
    {
        while($data = mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
    }
    else
    {
        $response['status']=200;
        $response['message']='No data found';
    }

    echo json_encode($response);

}
else
{
    $response['status']=200;
    $response['message']='No data found';
}
?>