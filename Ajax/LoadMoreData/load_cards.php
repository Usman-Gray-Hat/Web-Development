<?php
include("dbConnect.php");
$start = $_POST['start'];
$chunkSize = $_POST['chunkSize'];
$query = "SELECT id, name, email FROM users LIMIT $start, $chunkSize";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) 
{
    echo "<div class='col-md-3'>
            <div class='card'>
                <div class='card-header text-center'>
                <h5>".$row['id']."</h5>
                </div>

            <div class='card-body text-center'>
                <p>".$row['name']."</p>
                <p>".$row['email']."</p>
            </div>
            </div>
            <br>
        </div>";
}
?>