<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Data Table CDN -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Data Table Style CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <?php
    extract($_POST);
    $query = "select * from STUDENTS ORDER BY ID DESC";
    $result = mysqli_query($conn,$query);
    if(isset($_POST['rd']))
    {
        $table = "<table class='table table-hover table-striped table-bordered text-center' id='dataTable'>
        <thead class='text-uppercase' style='font-weight:900'>
        <tr>
        <th>Student ID</th>
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
            <td>".$data['NAME']."</td>
            <td>".$data['AGE']."</td>
            <td>".$data['FEES']."</td>
            <td><img src='$data[IMAGE_PATH]' height='50' width='50'></td>
            <td>
            <button type='button' class='btn btn-warning' onclick='EditStudent($data[ID])'>Edit</button>
            <button type='button' class='btn btn-danger' onclick='DeleteStudent($data[ID])'>Delete</button>
            </td>
            </tr>";
        }
        $table .= "</tbody></table>";
        echo $table;
    }
    ?>

    <script>
        $(document).ready(function () {
            $('#dataTable').dataTable();
        });
    </script>

</body>
</html>