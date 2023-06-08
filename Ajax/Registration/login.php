<?php
include('dbConnect.php');
session_start();
if(isset($_POST['email2']) && isset($_POST['pass2']))
{
    $email = $_POST['email2'];
    $pass = $_POST['pass2'];
    $query = "select * from users where email = '$email' and password = MD5('$pass')";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    // If email and password matches with any of existing database record, then it will return 1 row to $row variable.
    if($row==1)
    {
        $_SESSION['login-token'] = MD5(rand());  // Generating USER-LOGIN-TOKEN by creating a session with random values.

        echo $row;  /* This $row variable's value will be stored in data variable which 
                       exists in index.php file within success function as a parameter. */
    }
}
?>