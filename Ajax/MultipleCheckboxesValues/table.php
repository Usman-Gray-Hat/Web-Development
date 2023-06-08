<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Sweet Alert2 CSS file -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
</head>
<style>
    *{
        font-family: sans-serif;
    }
    h1{
        font-weight:900;
        letter-spacing:2px;
    }
    label{
        font-size:17px;
        font-weight:bolder;
    }
</style>
<body>
<?php

include("dbConfig.php");
if(isset($_POST['rd']) && isset($_POST['rd'])!='')
{
    $query = "select * from fruits ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
    $i = 1;

    $table = "<table class='table table-bordered table-hover table-striped text-center' id='myTable'>
    <thead>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>TOTAL PRICE</th>
    </tr>
    </thead>
    <tbody>";

    while($data=mysqli_fetch_assoc($result))
    {
        $table .= "<tr>
        <td>".$i++."</td>
        <td>".$data['name']."</td>
        <td>".$data['price']."</td>
        </tr>";
    }
    $table .= "</tbody></table>";
    echo $table;
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#myTable").dataTable();
    });
</script>

</body>
</html>
