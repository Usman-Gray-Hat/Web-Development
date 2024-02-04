<?php
if(isset($_POST['info']) && isset($_POST['info'])===true)
{
    $name = "Usman Hameed";
    $age = 25;
    $email = "usmanhameed@gmail.com";
    
    $response = array(
        "name" => $name,
        "age" => $age,
        "email" => $email
    );
    echo json_encode($response);
}
?>