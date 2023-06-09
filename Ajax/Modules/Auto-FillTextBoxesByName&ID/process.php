<?php
include('dbConnect.php');
// For ID Options (Through Keyup).
if(isset($_POST['std_id']) && isset($_POST['std_id'])!='')
{
    $id = $_POST['std_id'];
    $query = "select * from students where id like '%$id%'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    $id_list = "<ul class='list-unstyled'>";

    if($row>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $id_list .= "<li>".$data['id']."</li>";
        }
    }
    $id_list .= "</ul>";
    echo $id_list;
}


// For Auto-Fill Text Boxes With The respect Of ID (Through Keyup).
if(isset($_POST['std_id1']) && isset($_POST['std_id1'])!='')
{
    $id = $_POST['std_id1'];
    $query = "select * from students where id='$id'";
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
    echo json_encode($response);
}


// For Auto-Fill Text Boxes With The respect Of ID (Through Item Selected).
if(isset($_POST['id_list_item']) && isset($_POST['id_list_item'])!='')
{
    $id_list_item = $_POST['id_list_item'];
    $query = "select * from students where id='$id_list_item'";
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
    echo json_encode($response);
}


// For Name Options (Through Keyup).
if(isset($_POST['name']) && isset($_POST['name'])!='')
{
    $name = $_POST['name'];
    $query = "select * from students where name like '$name%'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    $name_list = "<ul class='list-unstyled'>";
    if($row>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $name_list .= "<li>".$data['name']."</li>";
        }
    }
    $name_list .= "</ul>";
    echo $name_list;
}


// For Auto-Fill Text Boxes With The respect Of Name (Through Keyup).
if(isset($_POST['name1']) && isset($_POST['name1'])!='')
{
    $name = $_POST['name1'];
    $query = "select * from students where name='$name'";
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
    echo json_encode($response);
    
}


// For Auto-Fill Text Boxes With The respect Of Name (Through Item Selected).
if(isset($_POST['name_list_item']) && isset($_POST['name_list_item'])!='')
{
    $name = $_POST['name_list_item'];
    $query = "select * from students where name='$name'";
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
    echo json_encode($response);
}
?>