<?php
include("dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Toaster CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">     
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section-header">
        <h1 class="jumbo-heading text-center bg-dark text-white py-5">CRUD OPERATION USING SERVER SIDE PAGINATION APPROACH</h1>
    </section>

    <!-- Bootstrap Grid System -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary float-end" 
                data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <!-- User Table -->
                <table class="table table-bordered table-hover table-striped text-center" id="userTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>HIDDEN ID</th>
                            <th>SR.NO</th>
                            <th>NAME</th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Add New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addUserForm">
                        <label for="name">Name:</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Name" autocomplete="name">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addUserBtn">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editUserForm">
                        <label for="name">Name:</label>
                        <input type="text" id="edit_name" class="form-control" placeholder="Enter Name" autocapitalize="words">
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user_hidden_id">
                    <button type="button" class="btn btn-primary" id="updateUserBtn">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <!-- Toaster JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
    <script>

// Fetch User On Page Initialization
$(document).ready(function () {
    fetchUsers();
});

// Fetch User
function fetchUsers()
{
    $("#userTable").DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": 
    {
      "type": "POST",
      "url": "fetchUsers.php", 
    },
    "columns": [
        { data: 'id', className:'d-none'},
        { data: 'sr_no'},
        { data: 'name'},
        {
            "render":function(data,stype,full,meta)
            {
                var buttons = '';
                buttons += `<button type='button' class='btn btn-info me-1 text-white' onclick="editUser(${full.id})">Edit</button>`;
                buttons += `<button type='button' class='btn btn-danger' onclick="deleteUser(${full.id})">Delete</button>`;
                return buttons;
            }
        }
    ],
    "pageLength": 10,
    "searching": true,
    });
}

// Add User
$("#addUserBtn").click(function(){
    let name = $("#name").val();
    if(name==="")
    {
        alert("Please enter name");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "addUsers.php",
            data: {name:name},
            success: function (response) 
            {
                if(response==="User added")
                {
                    alert(response);
                    $("#userTable").DataTable().destroy();
                    fetchUsers();
                    $("#addUserForm input").val("");
                    $("#addUserModal").modal("hide");
                }
                else if(response==="User not added")
                {
                    alert(response);
                }
                else
                {
                    alert("An unknown error has occured");
                }
            }
        });
    }
});

// Edit User
function editUser(id)
{
    $("#user_hidden_id").val(id);
    $.ajax({
        type: "POST",
        url: "editUser.php",
        data: {id:id},
        success: function (response) 
        {
            let user = JSON.parse(response);
            $("#edit_name").val(user.name);
            $("#editUserModal").modal("show");
        }
    });
}

// Update User
$("#updateUserBtn").click(function(){
    let id = $("#user_hidden_id").val();
    let name = $("#edit_name").val();
    $.ajax({
        type: "POST",
        url: "updateUser.php",
        data: {id:id, name:name},
        success: function (response) 
        {
            if(response==="User updated")
            {
                alert(response);
                $("#userTable").DataTable().destroy();
                fetchUsers();
                $("#editUserModal").modal("hide");
            }
            else if(response==="User not updated")
            {
                alert(response);
            }
            else
            {
                alert("An unknown error has occured");
            }
        }
    });
});

// Delete User
function deleteUser(id)
{
    $.ajax({
        type: "POST",
        url: "deleteUser.php",
        data: {id:id},
        success: function (response) 
        {
            if(response==="User has been deleted")
            {
                alert(response);
                $("#userTable").DataTable().destroy();
                fetchUsers();
            }
            else if(response==="User has not been deleted")
            {
                alert(response);
            }
            else
            {
                alert("An unknown error has occured");
            }
        }
    });
}
    </script>   
</body>
</html>