<?php
include("../dbConnect.php");
if(isset($_POST['key']) && $_POST['key']==="Login")
{
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    if($row>0)
    {
         $data = mysqli_fetch_assoc($result);
         $_SESSION['admin-id'] = $data['id'];
         echo "Login successful..!";
    }
    else
    {
         echo "Invalid email or password..!";
    }  
}
?>