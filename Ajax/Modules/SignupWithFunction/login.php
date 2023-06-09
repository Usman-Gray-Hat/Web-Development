<?php
include('dbConfig.php');
if(isset($_POST['email_login']) && isset($_POST['password_login']))
{
    $email_login = $_POST['email_login'];
    $password_login = MD5($_POST['password_login']);
    $query = "select * from users where email='$email_login' and password='$password_login'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);

    if($row==1)
    {
        $_SESSION['login-token'] = MD5(rand());
        $_SESSION['name'] = $data['fname'];
        echo 1; //login success
    }
    else
    {
        echo 0; //login failed
    }
}

?>