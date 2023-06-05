<?php
include("dbConnect.php");
$studentName = $_REQUEST['studentName'];
if($studentName!=="")
{
    $query = "select * from student where Name='$studentName'";
    $data = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($data);

    $sRoll_no = $row['Roll_No'];
    $sClass = $row['Class'];
}
$result = array("$sRoll_no", "$sClass");
$myJSON = json_encode($result);
echo $myJSON;
?>