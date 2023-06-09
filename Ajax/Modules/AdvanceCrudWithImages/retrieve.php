<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Sweet Alert 2 CSS File -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <!-- Sweet Alert 2 JS Files -->
    <script src="dist/sweetalert2.all.min.js"></script>
   </head>
<body>
<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['rd']))
{
    $query = "select * from students ORDER BY id DESC";
    $result = mysqli_query($conn,$query);

    $table = "<table class='table table-bordered table-hover table-striped text-center' id='dataTable'>
    <thead class='text-uppercase' style='font-weight:900'>
    <tr>
    <th>SR.No</th>
    <th>Student Name</th>
    <th>Student Age</th>
    <th>Student Fees</th>
    <th>Student Image</th>
    <th>Operations</th>
    </tr>
    </thead>";
    $increment = 1;
    $table .= "<tbody>";
    while($data = mysqli_fetch_assoc($result))
    {
        $table .= "<tr>
        <td>".$increment++."</td>
        <td>".$data['name']."</td>
        <td>".$data['age']."</td>
        <td>".$data['fees']."</td>
        <td> <img src='$data[image_path]' height='50' width='50'> </td>
        <td>
        <button type='button' class='btn btn-warning' title='Edit this record' onclick='editStudent($data[id])'>Edit</button>
        <button type='button' class='btn btn-danger' title='Delete this record' onclick='deleteStudent($data[id])'>Delete</button>
        </td>
        </tr>";
    }
    $table .= "</tbody></table>";
    echo $table;
}
?>

<script>
    $('document').ready(function(){
        $('#dataTable').dataTable();
    });
</script>
</body>
</html>