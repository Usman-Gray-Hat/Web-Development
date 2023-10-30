<?php
include("dbConnect.php");
$start = $_POST['start'];
$chunkSize = $_POST['chunkSize'];
$query = "SELECT id, name, email FROM users LIMIT $start, $chunkSize";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
}
?>