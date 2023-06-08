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
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Note: Must include Js and JQuery CDNs otherwise Modal won't work -->
</head>
<body>

   <!-- Bootstrap Grid Sytem -->
   <div class="container" style="margin-top:20px;">
    <!-- 1st Row (For Heading)-->
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center jumbotron" style="font-weight:900; letter-spacing:1px;">CRUD WITH IMAGES USING PHP, AJAX AND JQUERY </h1>
        </div>
    </div>


    <!-- 2nd Row (For Add New Record Button) -->
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#insertModal">Add New Record</button>
        </div>
    </div>


    <!-- 3rd Row (For Table) -->
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
            <div id="records">
                <!-- Table will be displayed in this div. -->  
            </div>
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
                <h1 class="text-center modal-title" style="font-weight:900">INSERT FORM</h1>
                <!-- Close Button With Cross Icon -->
                <button type="button" class="btn-close" data-bs-dismiss="modal"> &times; </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form -->
                <form action="" method="post" id="myForm">
                    <!-- Name -->
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required>
                    <br>
                    <!-- Age -->
                    <input type="number" name="age" id="age" placeholder="Enter Age" class="form-control" required>
                    <br>
                    <!-- Fees -->
                    <input type="number" name="fees" id="fees" placeholder="Enter Tuition Fees" class="form-control" required>
                    <br>
                    <!-- Image -->
                    <input type="file" name="image" id="image" required>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <!-- Insert Button -->
                <button type="submit" name="btnInsert" onclick="add()" value="Insert" id="btnInsert" class="btn btn-primary">Insert</button>
                <!-- Cancel Button -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                <h1 class="text-center modal-title" style="font-weight:900">UPDATE FORM</h1>
                <!-- Close Button With Cross Icon -->
                <button type="button" class="btn-close" data-bs-dismiss="modal"> &times; </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form -->
                <form action="" method="post" id="updateForm">
                    <!-- Name -->
                    <input type="text" name="update_name" id="update_name" placeholder="Enter Name" class="form-control" required>
                    <br>
                    <!-- Age -->
                    <input type="number" name="update_age" id="update_age" placeholder="Enter Age" class="form-control" required>
                    <br>
                    <!-- Fees -->
                    <input type="number" name="update_fees" id="update_fees" placeholder="Enter Tuition Fees" class="form-control" required>
                    <br>
                    <!-- Image -->
                    <input type="file" name="update_image" id="update_image">
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <!-- Hidden Field For User ID -->
                <input type="hidden" name="hidden_id" id="hidden_id">
                <!-- Update Button -->
                <input type="submit" name="btnInsert" onclick="update()" value="Update" id="btnInsert" class="btn btn-primary">
                <!-- Cancel Button -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </form>
            </div>
        </div>
    </div>
   </div> <!-- Update Modal Ended -->

<!-- 
    ============================================
    IMPORTANT POINTS WHILE USING IMAGES IN AJAX:
    ============================================
    (1) For Using Images in Ajax request, you need to make your form submittable and then prevent submit request
        in order to avoid page reloading.

    (2) Then you need to make object of 'FormData' and pass it on 'data' property.

    (3) If you are using file uploading option in your form, don't forget to define contentType property
        in Ajax, for contentType property, you must need to assign 'false' value without quotation.
        eg:- contentType: false,

    (4) Must assign 'false' value to processData property. Because processData only supports data within key value pairs.
-->

   <!-- Scripting -->
   <script type="text/javascript">
       // readRecords Function
       function readRecords()
       {
        var rd = 'rd';
        $.ajax({
            type: "post",
            url: "retrieve.php",
            data: {rd:rd},
            success: function (data,status)
            {
                $('#records').html(data);
            }
          });
       }

// Insert Function
$('#myForm').on('submit',function(e){
e.preventDefault();
    
    // FormData object
    var formData = new FormData(this); 
    $.ajax({
    type: "post",
    url: "insert.php",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data,status) 
    {
        readRecords();
        $('#insertForm input').val("");
        $('#insertModal').modal("hide");
    }
    });
  });

    // Edit Function
    function EditUser(id1)
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
                $('#update_image').val(user.image_path);
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
            cache: false,
            success: function (data,status)
            {
                readRecords();
                $('#updateModal').modal("hide");
            }
          });
        });

    // Delete Function 
    function DeleteUser(id2)
        {
            var conf = confirm("Are you sure you want to delete this record?");
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

// For Displaying the table records on page load.
$(document).ready(function(){
readRecords();
});
   </script>

  <!-- Note: Do not include below three scripts on retrieve page, otherwise it will conflict with the Ajax requests. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>