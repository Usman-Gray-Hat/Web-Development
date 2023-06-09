<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud With Functions</title>
</head>
<style>
   *{
        font-family: sans-serif;
   }
   h1{
    font-weight:900;
    letter-spacing:2px;
   }
</style>
<body>
    
<?php
include('dbConfig.php');
if(isset($_POST['rd']) && isset($_POST['rd'])!='')
{
    $query = "select * from users order by id desc";
    $result = mysqli_query($conn,$query);
    $table = "<table class='table table-bordered table-striped table-hover text-center' id='mytable'>
    <thead>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>AGE</th>
    <th>GENDER</th>
    <th>OPERATIONS</th>
    </tr>
    </thead><tbody>";
    $increment = 1;
    while($data=mysqli_fetch_assoc($result))
    {
        $table.= "<tr>
        <td>".$increment++."</td>
        <td>".$data['name']."</td>
        <td>".$data['age']."</td>
        <td>".$data['gender']."</td>
        <td>
        <button type='button' class='btn btn-info' onclick='editUser($data[id])'>Edit</button>
        <button type='button' class='btn btn-danger' onclick='deleteUser($data[id])' id='del'>Delete</button>
        </td>
        </tr>";
    }
    $table.= "</tbody></table>";
    echo $table;
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>
</body>
</html>