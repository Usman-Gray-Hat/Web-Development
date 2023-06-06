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
                <h1 class="jumbotron text-center text-white bg-dark">SET ATTRIBUTE IN JQUERY</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
          <div class="col-md-6 mx-auto">

            <!-- Form -->
            <form action="" method="POST">

            <!-- Name -->
            <input type="text" name="name" id="name" placeholder="Enter Username" title="Username" required>
            <br> <br>

            <!-- Submit Button -->
            <button type="button" class="btn btn-primary" id="btn1">Set Attribute One By On</button> <br><br>
            <button type="button" class="btn btn-primary" id="btn2">Set Multiple Attributes Through Key Value Pair</button>

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

          // Set Attributes One By One
          $("#btn1").click(function(){
            $("#name").attr("placeholder","Enter Password"); // For placeholder
            $("#name").attr("title","Password"); // For title
            $("#name").attr("class","form-control"); // For bootstrap class
            $("#name").attr("type","password"); // For password type
          });

          // Set Multiple Attributes
          $("#btn2").click(function(){
            $("#name").attr({
              placeholder: "Enter Password", // For placeholder
              title: "Password", // For title
              class: "form-control", // For bootstrap class
              type: "password" // For password type
            });
          });

        });
      </script>

  </body>
</html>