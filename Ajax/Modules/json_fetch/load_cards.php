<?php
include("dbConnect.php");
$start = $_POST['start'];
$chunkSize = $_POST['chunkSize'];
$query = "SELECT id, name, email FROM users LIMIT $start, $chunkSize";
$result = mysqli_query($conn, $query);
$json_array = array();
while ($data = mysqli_fetch_assoc($result)) 
{
    $json_array[] = [
        "id" => $data["id"],
        "name" => $data["name"],
        "email" => $data["email"]
    ];
}
header('Content-Type: application/json');
echo json_encode($json_array);
?>