<?php
include("dbConnect.php");
if(isset($_SESSION['UserEmail']) && isset($_SESSION['Verified']))
{
    $email = $_SESSION['UserEmail'];
    $Verificaiton_Code = $_SESSION['Verified'];

    if(isset($_POST['pass']) && isset($_POST['cpass']))
    {
        $pass = MD5($_POST['pass']);
        $cpass = MD5($_POST['cpass']);
        $query = "update users set password='$pass' where email='$email'";
        $exec = mysqli_query($conn,$query);
        if($exec==true)
        {
            echo "Password Updated";
            $query2 = "update verification_codes set status='0' where codes='$Verificaiton_Code'";
            $exec2 = mysqli_query($conn,$query2);
            if($exec2==true)
            {
                unset($_SESSION['UserEmail']);
                unset($_SESSION['Verified']);
            }
        }
    }
}
?>