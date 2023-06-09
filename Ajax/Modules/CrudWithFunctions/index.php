<?php
include('dbConfig.php');
include('script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Sweet Alert2 CSS file -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <title>Crud With Functions</title>
</head>
<style>
   *{
        font-family: sans-serif;
   }
   h1{
    font-weight:900;
    letter-spacing:2px;
   }
</style>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="jumbotron text-center bg-dark text-white">CRUD WITH FUNCTIONS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary float-right" data-bs-toggle="modal" data-bs-target="#insertmodal">Add New</button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div id="tableRecords">  </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">INSERT NEW RECORD</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times; </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="insertForm">
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                        <input type="number" name="age" id="age" placeholder="Enter Age" class="form-control mt-2">
                        <input type="text" name="gender" id="gender" placeholder="Enter Gender" class="form-control mt-2">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnInsert">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="updateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">INSERT NEW RECORD</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times; </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="updateForm">
                        <input type="text" name="update_name" id="update_name" placeholder="Enter Name" class="form-control">
                        <input type="number" name="update_age" id="update_age" placeholder="Enter Age" class="form-control mt-2">
                        <input type="text" name="update_gender" id="update_gender" placeholder="Enter Gender" class="form-control mt-2">
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="button" class="btn btn-primary" id="btnUpdate">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Sweet Alert2 JS file -->
    <script src="dist/sweetalert2.all.min.js"></script>
    <!-- Calling Functions -->
    <script type="text/javascript">
    $(document).ready(function () {
        readRecord();
    });

    $("#btnInsert").click(function(){
        insertRecord();
    });

    $("#btnUpdate").click(function(){
        updateRecord();
    });
    </script>
</body>
</html>