<?php
include("../Database/dbConnect.php");
if(isset($_POST['rd']) && isset($_POST['rd'])!='')
{
    $query = "select * from users order by id limit 2";
    $result = mysqli_query($conn,$query);
    $table = "<table class='table table-bordered table-hover table-striped text-center' id='DataTable'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>";

        while($data=mysqli_fetch_assoc($result))
        {
            $table.= "<tr>
            <td>".$data['id']."</td>
            <td>".$data['name']."</td>
            <td>".$data['age']."</td>
            </tr>";
            $id = $data['id'];
        }
        $table.= "<tr id='remove_row'>
        <td colspan='3'>
        <button type='button' class='btn btn-outline-primary' id='load-more' data-id='$id'>Load more</button>
        </td>
        </tr></tbody></table>";
        echo $table;
}
?>