<?php
include("../dbConnect.php");
if(isset($_POST['key']) && $_POST['key']==="FetchUsers")
{
    $query = "SELECT admins.id AS AdminID, admins.name AS AdminName, users.id AS UserID, users.name AS UserName, users.gender AS UserGender,
    users.age AS UserAge, users.qualification AS UserQualification
    FROM admins INNER JOIN users 
    ON users.admin_id = admins.id
    ORDER BY users.id DESC";
    $result = mysqli_query($conn,$query);
    $table = "<table class='table table-bordered table-hover table-striped text-center shadow' id='dataTable'>
    <thead class='text-uppercase'>
            <tr>
            <th>S.NO</th>
            <th>Admin Id</th>
            <th>Admin Name</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Qualification</th>
        </tr>
    </thead><tbody>";
    $i = 1;
    while($data=mysqli_fetch_assoc($result))
    {
        $table.= "<tr>
        <td>".$i++."</td>
        <td>".$data['AdminID']."</td>
        <td>".$data['AdminName']."</td>
        <td>".$data['UserID']."</td>
        <td>".$data['UserName']."</td>
        <td>".$data['UserGender']."</td>
        <td>".$data['UserAge']."</td>
        <td>".$data['UserQualification']."</td>
        </tr>";
    }
    $table.= "</tbody></table>";
    echo $table;
}
?>
<script>
    $(document).ready(function(){
        $("#dataTable").dataTable();
    });
</script>