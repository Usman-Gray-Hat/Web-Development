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

  <title>Show Password With Eye Icon</title>
</head>
<style>
  *{
    font-family:sans-serif;
  }
  h1{
    font-weight:900;
    letter-spacing:2px;
  }
  label{
    font-weight:bolder;
    font-size:17px;
  }

  .fa-eye{
    cursor:pointer;
  }
</style>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-2">
      <div class="row"> <!-- 1st Row -->
        <div class="col-md-12">
          <h1 class="jumbotron text-center bg-dark text-white">SHOW PASSWORD USING EYE ICON</h1>
        </div>
      </div>

      <div class="row"> <!-- 2nd Row -->
        <div class="col-md-6 mx-auto">
          
        <!-- Bootstrap Card -->
        <div class="card">
          <!-- Card Header -->
          <div class="card-header">
            <h1 class="text-center">USER LOGIN FORM</h1> <!-- Form Heading -->
          </div>
          <!-- Card Body -->
          <div class="card-body">

            <!-- Form -->
            <form action="" method="POST">

              <!-- Email -->
              <label for="">Email:</label>
              <div class="input-group"> <!-- Input Group For Email -->
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span> <!-- Envelope Icon -->
              <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
              </div>
              <br>

              <!-- Password -->
              <label for="">Password:</label>
              <div class="input-group"> <!-- Input Group For Password -->
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span> <!-- Lock Icon -->
              <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
              <span class="input-group-text"> <i class="fa fa-eye" id="eye"></i> </span> <!-- Eye Icon -->
              </div>
              <br>        
              
              <!-- Button -->
              <button type="button" class="btn btn-outline-primary btn-block"> Login </button>
            </form>

          </div>
        </div>
        </div>
      </div>
    </div>



    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">
      $(document).ready(function () {
        
        $("#eye").click(function(){
          var pass = $("#password")[0];
          if(pass.type=="password")
          {
            pass.type = "text";
            $("#eye").addClass("fa-eye-slash");
          }
          else
          {
            pass.type = "password";
            $("#eye").removeClass("fa-eye-slash");
          }
        });
      });
    </script>
    <!--
       Note: You can use toggleClass("fa-eye-slash") on click function instead of add and remove class within if else block
       For Example: 

          $("#eye").click(function(){

          $("#eye").toggleClass("fa-eye-slash");
          var pass = $("#password")[0];

          if(pass.type=="password")
          {
            pass.type = "text";      
          }
          else
          {
            pass.type = "password";
          }
        });

   -->
</body>
</html>