<?php
include('dbConfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>PACKAGES</title>
</head>
<style>
  *{
    font-family:sans-serif;
  }
  h1{
    font-weight:bolder;
    letter-spacing:1px;
  }
  label{
    font-weight:bolder;
    font-size:17px;
  }
</style>
<body>
    <?php
    if(isset($_POST['rd']) && isset($_POST['rd'])!='')
    {
        $table = "<table class='table table-bordered table-striped table-hover text-center' id='myTable'>
        <thead class='text-uppercase'>
        <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Packages</th>
        <th>Total</th>
        </tr>
        </thead>
        <tbody>";
        $query = "select * from PACKAGE order by ID DESC";
        $result = mysqli_query($conn,$query);
        $i = 1;
        while($data=mysqli_fetch_assoc($result))
        {
            $table .= "<tr>
            <td>".$i++."</td>
            <td>".$data['username']."</td>
            <td>".$data['email']."</td>
            <td>".$data['contact_no']."</td>
            <td>".$data['package_name']."</td>
            <td>".$data['total']."</td>
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