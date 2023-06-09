<?php
include("dbConnect.php");
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = MD5($_POST['password']);

    $query = "select * from users where email='$email' and password='$password'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    $response = array();
    if($row>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $_SESSION['user'] = $data['id'];
            $response = $data;
        }
        echo json_encode($response);
    }
    else
    {
        echo 0;
    }
}
?>