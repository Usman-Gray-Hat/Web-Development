<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['rd']))
{
    $table_records = "<table class='table table-bordered table-striped table-hover text-center'>
    <tr>
    <th> ID </th>
    <th> NAME </th>
    <th> AGE </th>
    <th> EMAIL </th>
    <th> DESIGNATION </th>
    <th> OPERATIONS </th>
    </tr>"; 
    $query = "select * from EMPLOYEES ORDER BY ID DESC";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows>0)
    {
        $no = 1;
       while($data=mysqli_fetch_assoc($result))
       {
        $table_records .= "<tr>
        <td>".$no++."</td>
        <td>".$data['NAME']."</td>
        <td>".$data['AGE']."</td>
        <td>".$data['EMAIL']."</td>
        <td>".$data['DESIGNATION']."</td>
        <td> 
        <button type='button' class='btn btn-outline-primary' onclick='EditUser($data[ID])'> Edit </button>
        <button type='button' class='btn btn-outline-danger' onclick='DeleteUser($data[ID])'> Delete </button> 
        </td></tr>";
       }
    }
    else
    {
        $table_records .= "<tr> <td colspan='6' style='font-weight:bold'> NO RECORDS FOUND </td> </tr>";
    }
    $table_records .= "</table>";
    echo $table_records;
}
?>