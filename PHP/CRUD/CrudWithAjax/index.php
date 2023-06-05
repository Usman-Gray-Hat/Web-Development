<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Records</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>
    <!-- Using Bootstrap Grid System -->
    <div class="container" style="margin-top:50px;">

        <!-- 1st row -->
        <div class="row">
          <div class="col-md-12">
          <!-- Table Heading -->
          <h2 class="float-left">All Records</h2>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#myModal">Add New Record</button>
          </div>
        </div>


<!-- 2nd Row -->
<div class="row">
    <div class="col-md-12">

      <div id="myRecords">
        <!-- In this div, Table records will be displayed here with the respect of id. (#myRecords) -->
      </div>

    </div>
</div>

        </div>
    </div>
</div>

<!-- Insert Modal Started -->
<div class="modal fade" id="myModal">


<!-- Modal Dialog -->
<div class="modal-dialog">


<!-- Modal Content -->
<div class="modal-content">


    <!-- Modal Header -->
  <div class="modal-header">


    <!-- Heading -->
    <h2>INSERT RECORD</h2>


    <!-- Close Button with cross icon -->
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> &times; </button>
  </div>


  <!-- Modal Body -->
  <div class="modal-body">

  <!-- Form -->
  <form action="" method='post'>
        <input type="text" id="name" placeholder="Enter Full Name" class="form-control">
        <br>
        <input type="number" id="age" placeholder="Enter Age" class="form-control">
        <br>
        <input type="text" id="email" placeholder="Enter Email" class="form-control">
        <br>
        <input type="text" id="designation" placeholder="Enter Designation" class="form-control">
  </div>


  <!-- Modal Footer (Mostly used for Form's buttons) -->
  <div class="modal-footer">

    <!-- Save Changes Button -->
    <button type="button" class="btn btn-primary" onclick="add()">Save changes</button>


    <!-- Close Button -->
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </form>
     </div>
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
    <h2>UPDATE RECORD</h2>


    <!-- Close Button with cross icon -->
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> &times; </button>
  </div>


  <!-- Modal Body -->
  <div class="modal-body">

  <!-- Form -->
  <form action="" method='post'>
        <input type="text" id="update_name" placeholder="Enter Full Name" class="form-control">
        <br>
        <input type="number" id="update_age" placeholder="Enter Age" class="form-control">
        <br>
        <input type="text" id="update_email" placeholder="Enter Email" class="form-control">
        <br>
        <input type="text" id="update_designation" placeholder="Enter Designation" class="form-control">
  </div>


  <!-- Modal Footer (Mostly used for Form's buttons) -->
  <div class="modal-footer">
    <!-- Hidden Field For User ID -->
    <input type="hidden" id="hidden_userID">

    <!-- Save Changes Button -->
    <button type="button" class="btn btn-primary" onclick="Update()">Update</button>


    <!-- Close Button -->
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       </form>
      </div>
     </div>
    </div>
   </div>
  </div> <!-- Update Modal Ended  -->


<script type="text/javascript">

    // Add Function for inserting data asynchronously
   function add()
   {
    // Getting HTML field's values through id.
     var name = $('#name').val();
     var age = $('#age').val();
     var email = $('#email').val();
     var designation = $('#designation').val();

    //  Validating all fields.
     if(name=='' || age=='' || email=='' || designation=='')
     {
        alert('All fields are required');
     }
     else
     {
        $.ajax({
            url:'insert.php',
            type:'post',
            data:{name:name, age:age, email:email, designation:designation}, //Sending data to insert.php page by using key value pairs.
            success:function(data,status)
            {
                readRecords();
                alert('Data has been inserted');
                $('#myModal input').val("");
                $('#myModal').modal("hide");
            }
        });
     }
   }

  //  Retrieving records
   function readRecords()
   {
    // Dummy value just to check if the value is set or not right after the readRecords function execute. 
     var rd = 'rd';
     $.ajax({
        url:'retrieve.php',
        type:'post',
        data:{rd,rd},
        success:function(data,status)
        {
            $('#myRecords').html(data);
        }
     });
   }

  //  Edit (For displaying pre-written data in fields)
  function EditUser(id1)
  {
    // Filling hidden field with the user ID. And through this ID, the user might be updated
    $('#hidden_userID').val(id1);


    $.ajax({
      url:'edit.php',
      type:'post',
      data:{id1:id1},

      success:function(data,status)
      {
        // Catching php data and storing it in a javascript variable after converting it from jason to js.
        var user = JSON.parse(data);

        // Now, we will display pre-written data in HTML fields.
        $('#update_name').val(user.NAME);
        $('#update_age').val(user.AGE);
        $('#update_email').val(user.EMAIL);
        $('#update_designation').val(user.DESIGNATION);
      }
    });
    $('#updateModal').modal("show");
  }


  // Update Function
  function Update()
  {
    // Receiving data from HTML fields and storing it into js variables.
    var hidden_id = $('#hidden_userID').val();
    var update_name = $('#update_name').val();
    var update_age = $('#update_age').val();
    var update_email = $('#update_email').val();
    var update_designation = $('#update_designation').val();

    // Validating Update Form
    if(update_name=='' || update_age=='' || update_email=='' || update_designation=='')
    {
      alert('All fields are required!!');
    }
    else
    {
      $.ajax({
      data:{hidden_id:hidden_id, update_name:update_name, update_age:update_age, update_email:update_email, update_designation:update_designation},
      type: 'post',
      url: 'update.php',
      success:function(data,status)
      {
        $('#updateModal').modal("hide");
        readRecords();
      }
    });
    }
  }

  // Delete Function
  function DeleteUser(id2)
  {
    // Confirm Message
    var conf = confirm("Are you sure you want to delete it?");
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


<!-- For displaying all records over page reloading -->
<script>
  $(document).ready(function(){
    readRecords();
  });
</script>

</body>
</html>