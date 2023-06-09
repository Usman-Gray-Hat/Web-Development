<?php
include('dbConfig.php');
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
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Data Table Style CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- Sweet Alert2 CSS file -->
  <link rel="stylesheet" href="dist/sweetalert2.min.css">

  <title>PACKAGES</title>
</head>
<style>
  *{
    font-family:sans-serif;
  }
  h1{
    font-weight:bolder;
    letter-spacing:1px;
  }
  label{
    font-weight:bolder;
    font-size:17px;
  }
</style>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-2">
      <div class="row"> <!-- 1st Row -->
        <div class="col-md-12">
          <h1 class="jumbotron text-center bg-dark text-white">SELECT PACKAGES & GET TOTAL AMOUNT USING CHECKBOXES</h1>
        </div>
      </div>

      <div class="row"> <!-- 2nd Row -->
        <div class="col-md-12">
        <button type="button" class="btn btn-outline-primary float-right" data-bs-toggle="modal" data-bs-target="#myModal">Get Packages</button>
        </div>
      </div>

      <div class="row mt-2"> <!-- 3rd Row -->
      <div class="col-md-12">
        <div id="tableRecords"> <!-- Table Records Will Be Shown Here --> </div>
      </div>
      </div>
    </div>


<div class="modal fade" id="myModal" data-bs-backdrop="static"> <!-- Modal Started -->

<div class="modal-dialog">

<div class="modal-content">

  <div class="modal-header">

    <h1>ALL AVAILABLE PACKAGES</h1>

    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> &times; </button>
  </div>

  <div class="modal-body">

  <form action="" method='post'>
        <!-- User Info -->
        <!-- Full Name -->
        <label for="">Full Name:</label>
        <input type="text" name="username" id="username" placeholder="Enter Full Name" class="form-control">
        <br>
        <!-- Email -->
        <label for="">Email:</label>
        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
        <br>
        <!-- Contact No -->
        <label for="">Contact No:</label>
        <input type="number" name="contact_no" id="contact_no" placeholder="Enter Contact No" class="form-control">
        <br>

        <!-- Packages -->
        <label for=""><strong>Select Your Packages:</strong></label>
        <br>

        <!-- Logo -->
        <input type="checkbox" name="package" id="package" value="<li>Logo</li>" price="50">
        <label for="">Logo <strong>$50</strong></label>
        <br>
        <!-- Animation -->
        <input type="checkbox" name="package" id="package" value="<li>Animation</li>" price="90">
        <label for="">Animation <strong>$90</strong></label>
        <br>
        <!-- Illustration -->
        <input type="checkbox" name="package" id="package" value="<li>Illustration</li>" price="65">
        <label for="">Illustration <strong>$65</strong></label>
        <br>
        <!-- Banner -->
        <input type="checkbox" name="package" id="package" value="<li>Banner</li>" price="40">
        <label for="">Banner <strong>$40</strong></label>
        <br>
        <!-- 3D -->
        <input type="checkbox" name="package" id="package" value="<li>3D</li>" price="80">
        <label for="">3D <strong>$80</strong></label>
        <br>

        <!-- 5% Tax -->
        <label for="" class="float-right"><strong>5% Tax</strong></label>
        <br> <br>
        <!-- Total -->
        <label for="" class="float-right">Total:<strong id="total">$0.00</strong></label>
  </div>

  <div class="modal-footer">

    <button type="button" class="btn btn-primary" id="btnSave">Save</button>

    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
 </div>
</div> <!-- Modal Ended -->



    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Sweet Alert2 JS file -->
    <script src="dist/sweetalert2.all.min.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">

    $(document).ready(function () {

      $("#myTable").dataTable(); // jQuery Data Table

      readRecords(); // Prevent loosing talbe records over page reloading 


      $("input[name='package']").change(function(){
        var total = 0;
        var packages = '';
        var length = $("input[name='package']:checked").length;
        if(length==0)
        {
          $("#total").text("$0.00");
        }

        $("input[name='package']:checked").each(function(){
          total = total + parseFloat( $(this).attr("price") );
          
          // For 5% Tax
          var percentage = (5/100)*total;

          // Add 5% tax
          var addtax = percentage + total;

          // All Packages selected by user
          packages = packages + $(this).val();

          $("#total").text("$"+addtax); // For showing total with 5% Tax in modal
          $("#total").attr("totalAmount",addtax); // For storing total amount with 5% Tax in user defined attribute to fetch it later.
          $("#total").attr("totalPackages",packages); // For storing All packages in user defined attribute to fetch it later.
        });

      });

      // On Button Click
      $("#btnSave").click(function(){

        var username = $("#username").val();
        var email = $("#email").val();
        var contact_no = $("#contact_no").val();
        var total = $("#total").attr("totalAmount");
        var packages = $("#total").attr("totalPackages");

        // Validation for user credentials
        if(username=='' || email=='' || contact_no=='')
        {
          swal.fire({
            title: "You can't left any field empty",
            text: "Please fill up all the required fields below",
            icon: "warning",
            confirmButtonColor: "blue",
            showCloseButton: true,
            showCancelButton: true,
            cancelButtonColor: "red",
            allowOutsideClick: false
          });
        }
        else
        {
            var length2 = $("input[name='package']:checked").length;
            if(length2==0)
            {
              swal.fire({
              title: "You can't proceed without selecting package",
              text: "Please choose at least one package",
              icon: "info",
              confirmButtonColor: "blue",
              showCloseButton: true,
              showCancelButton: true,
              cancelButtonColor: "red",
              allowOutsideClick: false
              });
            }
            else
            {
              $.ajax({
                type: "post",
                url: "insert.php",
                data: {username:username, email:email, contact_no:contact_no, total:total, packages:packages},
                success: function (data,status) 
                {
                  readRecords();
                  $("#username").val("");
                  $("#email").val("");
                  $("#contact_no").val("");
                  $("#total").text("$0.00");
                  $("#total").attr("totalAmount",0);
                  $("#total").attr("totalPackages","");
                  $("input[name='package']").prop('checked',false); // Using .prop() method for unchecking checkbox.
                  $("#myModal").modal("hide");
                  swal.fire({
                  title: "PACKAGE ADDED SUCCESSFULLY!",
                  text: "Pakcage has been added to your account.",
                  icon: "success",
                  confirmButtonColor: "blue",
                  showCloseButton: true,
                  showCancelButton: true,
                  cancelButtonColor: "red",
                  allowOutsideClick: false,
                  timer: 2000
                  });                  
                }
              });
            }
        }
      });

      // Table Records
      function readRecords()
      {
        var rd = 'rd';
        if(rd!='')
        {
          $.ajax({
            type: "post",
            url: "table.php",
            data: {rd:rd},
            success: function (data,status) 
            {
              $("#tableRecords").html(data);
            }
          });
        }
      }
    });
    </script>
   
</body>
</html>