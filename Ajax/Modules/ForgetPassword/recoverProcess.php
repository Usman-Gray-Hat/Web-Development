<?php
include("dbConnect.php");
if(isset($_POST['password']) && isset($_POST['cpassword']) && isset($_SESSION['RecoverEmail']) && isset($_SESSION['token']))
{
    $password = MD5($_POST['password']);
    $cpassword = MD5($_POST['cpassword']);
    $recoverEmail = $_SESSION['RecoverEmail'];
    $token = $_SESSION['token'];

    $query = "select * from tokens where token='$token'";
    $result = mysqli_query($conn,$query); 
    $data = mysqli_fetch_assoc($result);
    $status = $data['status'];

    if($status==1)
    {
        $query1 = "update users set password='$password' where email='$recoverEmail'";
        $exec1 = mysqli_query($conn,$query1);
        if($exec1==true)
        {
            $query2 = "update tokens set status='0' where token='$token'";
            $exec2 = mysqli_query($conn,$query2);
            if($exec2==true)
            {
                echo 1;
                unset($_SESSION['RecoverEmail']);
                unset($_SESSION['token']);
            }
            else
            {
                echo 0;
            }
        }
    }
}
?>