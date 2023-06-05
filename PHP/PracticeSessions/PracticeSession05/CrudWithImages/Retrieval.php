<?php
session_start();
include('dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Sweet Alert CDN -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <script src="dist/sweetalert2.min.js"></script>
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Retrieval</title>
</head>
<body>
<?php

$query = "select * from USERS";
$result = mysqli_query($con,$query);
$totalRows = mysqli_num_rows($result);
if($totalRows>0)
{
    ?>

    <!-- Using Bootstrap Grid System -->
    <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-md-3 offset-8">

    <!-- Add Record Button -->
    <a class="btn btn-primary float-right" href="Insert.php">Add Record</a>
    <br><br>

    <!-- Logout Button -->
    <a class="btn btn-warning float-right" href="Logout.php">Logout Now</a>
    <br> <br>
</div>
</div>
        <div class="row">
            <div class="col-md-10 offset-1">

    <!-- Table -->
            <table id="MyTable" class="table table-bordered table-hover table-striped">
                
        <thead>
            <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Name</th>
            <th class="text-center">Age</th>
            <th class="text-center">Gender</th>
            <th class="text-center">City</th>
            <th class="text-center">Image</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1; //For serial number Incrementation
            while($data=mysqli_fetch_assoc($result))
            {
                echo "<tr>
                <td class='text-center'>".$no++."</td>
                <td class='text-center'>".$data['NAME']."</td>
                <td class='text-center'>".$data['AGE']."</td>
                <td class='text-center'>".$data['GENDER']."</td>
                <td class='text-center'>".$data['CITY']."</td>
                <td class='text-center'> <img src='$data[IMAGE_PATH]' height='40' width='55'> </td>
                <td class='text-center'> <a class='btn btn-success' href='Update.php?id=$data[ID]'>Edit</a></td>
                <td class='text-center'> <a class='btn btn-danger' href='Delete.php?id=$data[ID]' onclick='return Confirmation()'>Delete</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
    <?php
}
else
{
    echo "
            <script>
            swal.fire({
                title: 'No Rows Found!',
                text: 'Table is empty :(',
                icon: 'error',
                confirmButtonColor: 'blue',
                timer: 2000
            })
            </script>";

            echo "<div class='container' style='margin-top:50px;'>
            <div class='row'>
                <div class='col-md-6 mx-auto'>
            <a class='btn btn-primary btn-block' href='Insert.php'>Add Record </a>
        </div>
        </div>";
}
?>

<!-- Using Javascript for confirmation before deleting a record -->
<script>
    function Confirmation()
    {
        return confirm('Are you sure you want to delete this record?');
    }

    // jQuery Data Table code
    $(document).ready(function () {
        $("#MyTable").dataTable();
    });
</script>
</body>
</html>
