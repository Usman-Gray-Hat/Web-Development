<?php
include("dbConnect.php");
$query = "SELECT admins.id AS AdminID, admins.name AS AdminName, users.id AS UserID, users.name AS UserName, users.gender AS UserGender,
users.age AS UserAge, users.qualification AS UserQualification
FROM admins INNER JOIN users 
ON users.admin_id = admins.id
ORDER BY users.id";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 14px;
        }
        .heading{
            font-size: 17px;
        }
    </style>
</head>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped text-center shadow">
                    <thead>
                        <tr>
                            <th colspan="8" class="heading">USER'S INFORMATION WITH THE REFERENCE OF PRIMARY KEY & FOREIGN KEY RELATIONSHIP</th>
                        </tr>
                    </thead>
                    <thead class="text-uppercase">
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
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while($data=mysqli_fetch_assoc($result))
                        {
                            echo "<tr>
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
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JQuery CDN, Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>