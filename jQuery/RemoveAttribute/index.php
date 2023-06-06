<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *{
            font-family: sans-serif;
            font-size: 12px;
        }
        label{
            font-size: 16px;
            font-weight: 500;
        }
        h1{
            font-weight:900;
            letter-spacing: 2px;
        }
    </style>
  </head>
  <body>

      <!-- Bootstrap Grid System -->
      <div class="container mt-5">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center text-white bg-dark">REMOVE ATTRIBUTE IN JQUERY</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
          <div class="col-md-6 mx-auto">

            <!-- Form -->
            <form action="" method="POST">

            <!-- Name -->
            <label for="" style="color:red" id="myLabel">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required>
            <br>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Submit</button>
            <br><br>

            <!-- Action Buttons -->
            <button type="button" class="btn btn-primary" id="btn1">Remove Disability Of A Button</button>
            <button type="button" class="btn btn-primary" id="btn2">Remove Required</button>
            <button type="button" class="btn btn-primary" id="btn3">Remove Class</button>
            <button type="button" class="btn btn-primary" id="btn4">Remove Style</button>
            
            </form>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Scripting -->
      <script type="text/javascript">

        $(document).ready(function () {

        // Remove Disability Of A Submit Button
        $("#btn1").click(function(){
          $("#btnSubmit").removeAttr("disabled");
        });

        // Remove Required
        $("#btn2").click(function(){
          $("#name").removeAttr("required");
        });

        // Remove Class (Bootstrap Class="form-control")
        $("#btn3").click(function(){
          $("#name").removeAttr("class");
        });

        // Remove Style
        $("#btn4").click(function(){
          $("#myLabel").removeAttr("style");
        });

    });
      </script>

  </body>
</html>