<?php
include('dbConnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Records</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- JS Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Data Table CDN -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Data Table Style CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<!-- Sweet Alert 2 CSS File -->
<link rel="stylesheet" href="dist/sweetalert2.min.css">
<!-- Sweet Alert 2 JS Files -->
<script src="dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container" style="margin-top:20px;">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="text-center text-uppercase jumbotron" style="font-weight:900; letter-spacing:1px;">Crud With Images Using PHP, Ajax & jQuery</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
        <div class="col-md-12">
            <button type="button" data-bs-toggle="modal" data-bs-target="#insertModal" class="btn btn-info float-right" title="Create Record">Add New Records</button>
        </div>
        </div>

        <div class="row" style="margin-top:5px;"> <!-- 3rd Row -->
        <div class="col-md-12">
        <div id="records"> <!-- Table Records will be displayed here --> </div>
        </div>
        </div>
    </div>

    <!-- Insert Modal Started -->
    <div class="modal fade" id="insertModal">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Heading -->
                    <h1 class="modal-title">CREATE NEW RECORD</h1>
                    <!-- Close Button -->
                    <button data-bs-dismiss="modal" title="Close modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Insert Form -->
                    <form action="" method="post" id="insertForm">
                        <!-- Name -->
                        <input type="text" name="name" id="name" placeholder="Enter Student Name" class="form-control" required>
                        <br>
                        <!-- Age -->
                        <input type="number" name="age" id="age" placeholder="Enter Student Age" class="form-control" required>
                        <br>
                        <!-- Fees -->
                        <input type="number" name="fees" id="fees" placeholder="Enter Tuition Fee" class="form-control" required>
                        <br>
                        <!-- Image -->
                        <input type="file" name="image" id="image" required>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Save Change Button -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <!-- Cancel Button -->
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Insert Modal Ended -->


    <!-- Update Modal Started -->
    <div class="modal fade" id="updateModal">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Heading -->
                    <h1 class="modal-title">UPDATE RECORD</h1>
                    <!-- Close Button -->
                    <button data-bs-dismiss="modal" title="Close modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Update Form -->
                    <form action="" method="post" id="updateForm">
                        <!-- Name -->
                        <input type="text" name="update_name" id="update_name" placeholder="Enter Student Name" class="form-control" required>
                        <br>
                        <!-- Age -->
                        <input type="number" name="update_age" id="update_age" placeholder="Enter Student Age" class="form-control" required>
                        <br>
                        <!-- Fees -->
                        <input type="number" name="update_fees" id="update_fees" placeholder="Enter Tuition Fee" class="form-control" required>
                        <br>
                        <!-- Image -->
                        <input type="file" name="update_image" id="update_image">
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Hidden Field For Student ID -->
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <!-- Update Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                    <!-- Cancel Button -->
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Update Modal Ended -->


    <!-- Scripting -->
    <script type="text/javascript">
        $('#insertForm').on('submit',function(e){
            e.preventDefault();
            var formData1 = new FormData(this); //Making object of Insert Form

            // Insert
            $.ajax({
                type: "post",
                url: "insert.php",
                data: formData1, //Sending insert form's entire data to insert.php file
                contentType: false,
                processData: false,
                success:function(data,status) 
                {
                    readRecords();
                    swal.fire({
                        title: 'DATA INSERTED!',
                        text: 'A new record has been created successfully!',
                        icon: 'success',
                        confirmButtonColor: 'blue',
                        timer: 2000
                    });
                    $('#insertForm input').val("");
                    $('#insertModal').modal("hide");
                }
            });
        });

        // Read Records
        function readRecords()
        {
            var rd = 'rd';
            $.ajax({
                type: "post",
                url: "retrieve.php",
                data: {rd:rd},
                success:function(data,status) 
                {
                    $('#records').html(data);
                }
            });
        }

        // Edit
        function editStudent(id1)
        {
            $('#hidden_id').val(id1);
            $.ajax({
                type: "post",
                url: "edit.php",
                data: {id1:id1},
                success: function (data,status) 
                {
                    var user = JSON.parse(data);
                    $('#update_name').val(user.name);
                    $('#update_age').val(user.age);
                    $('#update_fees').val(user.fees);
                    $('#update_image').val(user.image);                
                }
            });
            $('#updateModal').modal("show");
        }

        // Update
        $('#updateForm').on('submit',function(e){
            e.preventDefault();

            var formData2 = new FormData(this); // Making object of Update Form

            $.ajax({
                type: "post",
                url: "update.php",
                data: formData2, //Sending update form's entire data to update.php file
                contentType: false,
                processData: false,
                success:function(data,status) 
                {
                    readRecords();
                    swal.fire({
                        title: 'DATA UPDATED!',
                        text: 'A record has been modified successfully!',
                        icon: 'success',
                        confirmButtonColor: 'blue',
                        timer: 2000
                    });
                    $('#updateForm input').val("");
                    $("#updateModal").modal("hide");
                }
            });
        });

        // Delete
        function deleteStudent(id2)
        {
            swal.fire({
                title: "ARE YOU SURE?",
                text: "Once deleted, you won't be able to revert this action!",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'No',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes! Delete it',
                confirmButtonColor: 'blue',
                showCloseButton: true,
                allowOutsideClick: false
            }).then((result => {
                if(result.isConfirmed){
                $.ajax({
                    type: "post",
                    url: "delete.php",
                    data: {id2:id2},
                    success:function(data,status) 
                    {
                        readRecords();
                        swal.fire({
                            title: 'DATA DELETED!',
                            text: 'A record has been removed permanently',
                            icon: 'success',
                            confirmButtonColor: 'blue',
                            timer:2000
                        });
                    }
                });
                }
            }));
        }
    </script>

    <!-- Loading table on page refresh -->
    <script>
        $(document).ready(function () {
            readRecords();
        });
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>