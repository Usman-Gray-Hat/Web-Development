<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>

<?php
/*
==================
IMPORTANT WARNING:
==================
(1) Do not include jQuery CDN on retrieve page otherwise it will conflict with Modal and other Ajax requests.
(2) Include jQuery CDN only on index page because all the ajax requests are being processed from the index page. 
(3) In retrieve page, include Bootstrap, Data Table & Data Table Style CDN only.
*/
?>

<?php
include('dbConnect.php');
$query = "select * from student ORDER BY id DESC";
$result = mysqli_query($conn,$query);
$rows = mysqli_num_rows($result);

extract($_POST);
if(isset($_POST['rd']))
{
$table_records = "<table class='table table-bordered table-striped table-hover text-center' id='superTable'>
<thead class='text-uppercase' style='font-weight:bold'>
    <tr>
    <th>SR.No</th>
    <th>STUDENT NAME</th>
    <th>STUDNET AGE</th>
    <th>STUDENT FEES</th>
    <th>STUDENT PICTURE</th>
    <th>OPERATIONS</th>
    </tr>
</thead>";

        $increment = 1;
        $table_records .= "<tbody>";
        while($data=mysqli_fetch_assoc($result))
        {
        $table_records .= "<tr>
        <td>".$increment++."</td>
        <td>".$data['name']."</td>
        <td>".$data['age']."</td>
        <td>".$data['fees']."</td>
        <td><img src='$data[image_path]' height='50' width='50'></td>
        <td>
        <button class='btn btn-warning' type='button' onclick='EditUser($data[id])'>Edit</button>
        <button class='btn btn-danger' type='button' onclick='DeleteUser($data[id])'>Delete</button>
        </td></tr>";
        }
        $table_records .= "</tbody></table>";
        echo $table_records;
}
    ?>

    <script>
       $(document).ready(function () {
        $('#superTable').dataTable();
       });
    </script>

</body>
</html>
