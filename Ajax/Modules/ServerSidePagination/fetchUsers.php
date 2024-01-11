<?php
include('dbConnect.php');
$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['search']['value'];

if($searchValue==="")
{
    $query = "SELECT * FROM users ORDER BY id DESC LIMIT $start, $length";
}
else
{
    $query = "SELECT * FROM users WHERE id LIKE '%$searchValue%' OR name LIKE '%$searchValue%'
    ORDER BY id ASC LIMIT $start, $length";
}

$result = mysqli_query($conn, $query);
$increment = 1;
$data = [];
while ($row = mysqli_fetch_assoc($result)) 
{
$data[] = [
        'id' => $row['id'],
        'sr_no' => $increment++,
        'name' => $row['name'],
    ];
}

$query2 = "SELECT * FROM users WHERE id LIKE '%$searchValue%' OR name LIKE '%$searchValue%'";

$result2 = mysqli_query($conn,$query2);
$totalRecords = mysqli_num_rows($result2);
$response = [
    "draw" => intval($draw),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
];
header('Content-Type: application/json');
echo json_encode($response);
?>