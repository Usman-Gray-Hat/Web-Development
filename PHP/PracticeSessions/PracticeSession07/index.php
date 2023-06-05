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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- JS Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Data Table CDN -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Data Table Style CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center jumbotron" style="font-weight:900; letter-spacing:1px;">CRUD WITH IMAGES USING PHP, JQUERY & AJAX</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <button type="button" class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#insertModal">Add New Record</button>
        </div>
    </div>

    <div class="row" style="margin-top:5px;">
        <div class="col-md-12">
            <div id="tableRecords">
                <!-- Table will be displayed here -->
            </div>
        </div>
    </div>
</div>


<!-- Insert Modal -->
<div class="modal fade" id="insertModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">INSERT FORM</h1>
                <button type="button" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="insertForm">
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required>
                    <br>

                    <input type="number" name="age" id="age" placeholder="Enter Age" class="form-control" required>
                    <br>

                    <input type="number" name="fees" id="fees" placeholder="Enter Fees" class="form-control" required>
                    <br>

                    <input type="file" name="image" id="image" required>
                    
            </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                   </form>
            </div>
        </div>
    </div>
</div> <!-- Insert Modal Ended -->


<!-- Update Modal -->
<div class="modal fade" id="updateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">UPDATE FORM</h1>
                <button type="button" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="updateForm">
                    <input type="text" name="update_name" id="update_name" placeholder="Enter Name" class="form-control" required>
                    <br>

                    <input type="number" name="update_age" id="update_age" placeholder="Enter Age" class="form-control" required>
                    <br>

                    <input type="number" name="update_fees" id="update_fees" placeholder="Enter Fees" class="form-control" required>
                    <br>

                    <input type="file" name="update_image" id="update_image">
                    
            </div>
                    <div class="modal-footer">
                        <!-- For User ID -->
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                   </form>
            </div>
        </div>
    </div>
</div> <!-- Insert Modal Ended -->


<script type="text/javascript">

    // readRecords
    function readRecords()
    {
        var rd= 'rd';
        $.ajax({
            type: "post",
            url: "retrieve.php",
            data: {rd:rd},
            success: function (data,status) 
            {
                $('#tableRecords').html(data);
            }
        });
    }

    // Insert Function
    $('#insertForm').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "post",
            url: "insert.php",
            data: formData,
            contentType: false,
            processData: false,
            success:function(data,status) 
            {
                readRecords();
                $('#insertForm input').val("");
                $('#insertModal').modal("hide");
            }
        });
    });

    // Edit Function
    function EditStudent(id1)
    {
        $('#hidden_id').val(id1);
        // var update_name = $('$update_name').val();
        // var update_age = $('$update_age').val();
        // var update_fees = $('$update_fees').val();
        // var update_image = $('$update_image').val();
        $.ajax({
            type: "post",
            url: "edit.php",
            data: {id1:id1},
            success: function (data,status) 
            {
                var user = JSON.parse(data);
                $('#update_name').val(user.NAME);
                $('#update_age').val(user.AGE); 
                $('#update_fees').val(user.FEES); 
                $('#update_image').val(user.IMAGE_PATH);
            }
        });
        $('#updateModal').modal("show");
    }

    // Update Function
    $('#updateForm').on('submit',function(e){
        e.preventDefault();
        var formData2 = new FormData(this);
        $.ajax({
            type: "post",
            url: "update.php",
            data: formData2,
            contentType: false,
            processData: false,
            success: function (data,status) 
            {
                readRecords();
                $('#updateModal').modal("hide");
            }
        });
    });

    // Delete Function
    function DeleteStudent(id2)
    {
        var conf = confirm('Are you sure you want to delete this record??');
        if(conf==true)
        {
            $.ajax({
                type: "post",
                url: "delete.php",
                data: {id2:id2},
                success: function (data,status) 
                {
                    readRecords();
                }
            });
        }
    }
</script>

<script>
    // Load records on page reload
    $(document).ready(function () {
        readRecords();
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>