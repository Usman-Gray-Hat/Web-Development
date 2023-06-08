<?php
include('dbConfig.php');
if(isset($_POST['allFruits']) && isset($_POST['allFruits'])!='' && isset($_POST['totalCost']) && isset($_POST['totalCost'])!='')
{
    $allFruits = $_POST['allFruits'];
    $totalCost = $_POST['totalCost'];

    $query = "insert into fruits (name,price) values ('<ul>$allFruits</ul>','$totalCost')";
    mysqli_query($conn,$query);
}
?>