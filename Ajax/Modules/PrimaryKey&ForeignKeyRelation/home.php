<?php
include("dbConnect.php");
if(!isset($_SESSION['admin-id']))
{
    header("Location:index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <!-- Heading Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="jumbo-heading py-5 text-center bg-dark text-white">IMPLEMENTATION OF PRIMARY KEY & FOREIGN KEY RELATION</h1>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-info float-end mb-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
                <br> <br>
                <a href="logout.php" class="btn btn-outline-danger float-end mb-2">Logout</a>
                <div id="userTable"> <!-- Table Records --> </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                            <h2 class="modal-title">ADD NEW USER</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <form method="POST" id="addUserForm">
                        <input type="text" id="name" placeholder="Enter Username" class="form-control mb-2">
                        <select id="gender" class="form-control mb-2">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <input type="number" id="age" placeholder="Enter Age" class="form-control mb-2">
                        <input type="text" id="qualification" placeholder="Enter Qualification" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" id="btnAddUser">Save</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JQuery CDN, Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>