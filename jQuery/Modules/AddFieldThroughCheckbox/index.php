<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Dynamic Checkboxes</title>
</head>
<style>
  *{
    font-family:sans-serif;
  }
  h1{
    font-weight:900;
    letter-spacing:2px;
  }
</style>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-2">
      <div class="row"> <!-- 1st Row -->
        <div class="col-md-12">
          <h1 class="jumbotron text-center bg-dark text-white">ADD NEW FIELD BY CLICKING ON CHECKBOX</h1>
        </div>
      </div>

      <div class="row"> <!-- 2nd Row -->
        <div class="col-md-12">
          <button type="button" class="btn btn-outline-info float-right" data-bs-toggle="modal" data-bs-target="#myModal"> Add New </button>
        </div>
      </div>
    </div>

    <!-- Modal Started -->
    <div class="modal fade" id="myModal">
      <!-- Modal Dialog -->
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h1>ADD NEW PACKAGE</h1>
            <button type="button" class="btn-close btn-outline-secondary" data-bs-dismiss="modal">&times;</button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body"> 
            <form action="" method="POST"> <!-- Form -->

            <!-- Product 1 -->
            <input type="checkbox" name="" id="product1" onclick="myFunction(1)">
            <label for="">Package 1</label>
            <div id="div1">
              <input type="text" name="promo_code" id="promo_code" placeholder="Enter Promo Code" class="form-control">
              <br>
              <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control">
            </div>
            <br>

            <!-- Product 2 -->
            <input type="checkbox" name="" id="product2" onclick="myFunction(2)">
            <label for="">Package 2</label>
            <div id="div2">
              <input type="text" name="promo_code" id="promo_code" placeholder="Enter Promo Code" class="form-control">
              <br>
              <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control">
            </div>
            <br>

            <!-- Product 3 -->
            <input type="checkbox" name="" id="product3" onclick="myFunction(3)">
            <label for="">Package 3</label>
            <div id="div3">
              <input type="text" name="promo_code" id="promo_code" placeholder="Enter Promo Code" class="form-control">
              <br>
              <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control">
            </div>
            <br>

            <!-- Product 4 -->
            <input type="checkbox" name="" id="product4" onclick="myFunction(4)">
            <label for="">Package 4</label>
            <div id="div4">
              <input type="text" name="promo_code" id="promo_code" placeholder="Enter Promo Code" class="form-control">
              <br>
              <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control">
            </div>
            <br>     

            <!-- Product 5 -->
            <input type="checkbox" name="" id="product5" onclick="myFunction(5)">
            <label for="">Package 5</label>
            <div id="div5">
              <input type="text" name="promo_code" id="promo_code" placeholder="Enter Promo Code" class="form-control">
              <br>
              <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control">
            </div>
            <br>

            </form>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary">Submit</button>
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div> <!-- Modal Ended -->


    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">
      $(document).ready(function () {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
      });

      function myFunction(id)
      {
        if(id==1)
        {
          var checkBox = $("#product1")[0];
          var div = $("#div1")[0];

          if(checkBox.checked===true)
          {
            div.style.display="block";
          }
          else
          {
            div.style.display="none";
          }
        }
        else if(id==2)
        {
          var checkBox = $("#product2")[0];
          var div = $("#div2")[0];

          if(checkBox.checked===true)
          {
            div.style.display="block";
          }
          else
          {
            div.style.display="none";
          }
        }
        else if(id==3)
        {
          var checkBox = $("#product3")[0];
          var div = $("#div3")[0];

          if(checkBox.checked===true)
          {
            div.style.display="block";
          }
          else
          {
            div.style.display="none";
          }
        }
        else if(id==4)
        {
          var checkBox = $("#product4")[0];
          var div = $("#div4")[0];

          if(checkBox.checked===true)
          {
            div.style.display="block";
          }
          else
          {
            div.style.display="none";
          }
        }
        else if(id==5)
        {
          var checkBox = $("#product5")[0];
          var div = $("#div5")[0];

          if(checkBox.checked===true)
          {
            div.style.display="block";
          }
          else
          {
            div.style.display="none";
          }
        }
      }
    </script>
</body>
</html>