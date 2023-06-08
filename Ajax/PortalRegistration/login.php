<?php
include('dbConnect.php');
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * from users where email='$email' and password=MD5('$password')";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    if($row>0)
    {
        $_SESSION['login-token'] = MD5(rand());
        echo $row;
    }
}
?>