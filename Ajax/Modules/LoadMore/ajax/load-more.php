<?php
include("../Database/dbConnect.php");
if(isset($_POST['id']))
{
    function getMaxId()
    {
        global $conn;
        $query = "SELECT MAX(id) AS max_id FROM users";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        return $data['max_id'];
    }
    $id = $_POST['id'];
    $query = "select * from users where id > '$id' order by id limit 2";
    $result = mysqli_query($conn,$query);
    $content = '';
    while($data=mysqli_fetch_assoc($result))
    {
        $content.= "<tr>
        <td>".$data['id']."</td>
        <td>".$data['name']."</td>
        <td>".$data['age']."</td>
        </tr>";
        $id = $data['id'];
    }
    if($id < getMaxId())
    {
        $content.= "<tr id='remove_row'>
        <td colspan='3'>
        <button type='button' class='btn btn-outline-primary' id='load-more' data-id='$id'>Load more</button>
        </td>
        </tr>";
    }
    echo $content;
}
?>