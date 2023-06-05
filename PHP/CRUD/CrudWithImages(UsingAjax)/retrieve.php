<?php
include('dbConnect.php');
$query = "select * from student ORDER BY id DESC";
$result = mysqli_query($conn,$query);
$rows = mysqli_num_rows($result);

extract($_POST);
if(isset($_POST['rd']))
{
$table_records = "<table class='table table-bordered table-striped table-hover text-center text-uppercase' id='myTable'>
<thead>
    <tr>
    <th>SR.No</th>
    <th>STUDENT NAME</th>
    <th>STUDNET AGE</th>
    <th>STUDENT FEES</th>
    <th>STUDENT PICTURE</th>
    <th>OPERATIONS</th>
    </tr>
</thead>";
            if($rows>0)
            {
                $increment = 1;
                while($data=mysqli_fetch_assoc($result))
                {
                $table_records .= "<tbody>
                <tr>
                <td>".$increment++."</td>
                <td>".$data['name']."</td>
                <td>".$data['age']."</td>
                <td>".$data['fees']."</td>
                <td><img src='$data[image_path]' height='50' width='50'></td>
                <td>
                <button class='btn btn-warning' type='button' onclick='EditUser($data[id])'>Edit</button>
                <button class='btn btn-danger' type='button' onclick='DeleteUser($data[id])'>Delete</button>
                </td>
                </tr>
                </tbody>";
                }
            }
            else
            {
                $table_records .= "<tbody>
                <tr>
                <td colspan='6' style='font-weight:900'> DATA NOT FOUND </td>
                </tr>
                </tbody>";
            }
            $table_records .= "</table>";
            echo $table_records;
    }
    ?>