<?php
include('dbconnect.php');
extract($_POST);
if(isset($_POST['rd']))
{
    $query = "select * from STUDENTS ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $table_records = "<table class='table table-bordered table-striped table-hover text-center'>
    <tr>
    <th>ID</th>
    <th>STUDENT NAME</th>
    <th>FATHER NAME</th>
    <th>STUDENT AGE</th>
    <th>TUITION FEE</th>
    <th>OPERATIONS</th>
    </tr>";

    if($rows>0)
    {
        $no = 1;
        while($data=mysqli_fetch_assoc($result))
        {
            $table_records .= "<tr> 
            <td>".$no++."</td>
            <td>".$data['name']."</td>
            <td>".$data['father_name']."</td>
            <td>".$data['age']."</td>
            <td>".$data['fee']."</td>
            <td>
            <button type='button' class='btn btn-warning' onclick='EditUser($data[id])'> Edit </button>
            <button type='button' class='btn btn-danger' onclick='DeleteUser($data[id])'> Delete </button>
            </td></tr>";
        }
    }
    else
    {
        $table_records .= "<tr> <td colspan='6' style='font-weight:900'> NO RECORDS FOUND </td> </tr>";
    }
    $table_records .= "</table>";
    echo $table_records;
}
?>

