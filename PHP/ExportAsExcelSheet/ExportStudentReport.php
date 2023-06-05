<?php
include('dbConnect.php');
$query = "select * from STUDENT ORDER BY ID DESC";
$result = mysqli_query($conn,$query);

$table = "<table>
         <thead>
         <th>ID</th>
         <th>NAME</th>
         <th>GENDER</th>
         <th>AGE</th>
         <th>EMAIL</th>
         </thead>";

         while($data=mysqli_fetch_assoc($result))
         {
            $table .= "<tr>
            <td>".$data['ID']."</td>
            <td>".$data['NAME']."</td>
            <td>".$data['GENDER']."</td>
            <td>".$data['AGE']."</td>
            <td>".$data['EMAIL']."</td>
            </tr>";
         }

$table .= "</table>";

// For Exporting
echo $table;
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=StudentRecord.xls");
?>