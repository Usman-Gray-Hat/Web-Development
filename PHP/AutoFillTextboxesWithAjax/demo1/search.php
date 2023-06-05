<?php
include("dbConnect.php");
$rollNo1 = $_REQUEST['rollNo'];
if($rollNo1!=="")
{
    $query = "select * from student where Roll_No = '$rollNo1'";
    $data = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($data);

    $sName = $row['Name'];
    $sClass = $row['Class'];
}
$result = array("$sName", "$sClass");
$myJSON = json_encode($result);
echo $myJSON;
?>