<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- Using Bootstrap Grid System -->
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 mx-auto">

                <!-- Password -->
                <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
                <br>

                <!-- Checkbox -->
                <input type="checkbox" name="mycheckbox" id="mycheckbox" onclick="myFuncton()">
                <label for="">Show Password</label>

            </div>
        </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Scripting -->
    <script type="text/javascript">
      $("#mycheckbox").click(function(){
            var checkbox = $("#mycheckbox")[0];
            var pass = $("#pass")[0];

            // Through if else condition
            if(checkbox.checked === true)
            {
              pass.type = "text";
            }
            else
            {
              pass.type = "password";
            }

            // Through ternary operator
            // checkbox.checked === true ? pass.type = "text" : pass.type = "password"; 
      });
    </script>
    <!-- Note: 
    In JavaScript you get HTML field using this syntax: var a = document.getElementById("idName"); 
    In jQuery you get HTML field using this syntax: var a = $("#idName")[0];
    -->
  </body>
</html>