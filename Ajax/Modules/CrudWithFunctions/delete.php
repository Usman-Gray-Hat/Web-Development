<?php
include('dbConfig.php');
if(isset($_POST['id2']) && isset($_POST['id2'])!='')
{
    $id = $_POST['id2'];
    $query = "delete from users where id='$id'";
    mysqli_query($conn,$query);
}
?>