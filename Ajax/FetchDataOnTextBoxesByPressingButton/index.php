<?php
include('dbConnect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  </head>
  <body>

    <!-- Bootstrap Grid System -->
    <div class="container" style="margin-top:100px;">
    <div class="row"> <!-- 1st Row -->
        <div class="col-md-12">
            <h2 class="jumbotron text-center text-uppercase" style="font-weight:900;">Fetch Data On All Text Boxes With The Respect Of Name By Pressing Button</h2>
        </div>
    </div>
        <div class="row"> <!-- 2nd Row -->
            <div class="col-md-5 mx-auto">
                <!-- From -->
                <form action="" method="post">
                    <input type="number" name="id" id="id" placeholder="ID" class="form-control">
                    <br>

                    <input type="text" name="name" id="name" placeholder="Full Name" class="form-control">
                    <br>

                    <input type="text" name="gender" id="gender" placeholder="Gender" class="form-control">
                    <br>

                    <input type="number" name="age" id="age" placeholder="Age" class="form-control">
                    <br>

                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                    <br>

                    <button type="button" class="btn btn-success btn-block" id="btnFetch">Fetch Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripting -->
    <script type="text/javascript">
        $(document).ready(function () {

        // Fetch By Name
        $('#btnFetch').on('click',function(){
            var name = $('#name').val();
            if(name=='')
            {
                $('#id').val('');
                $('#gender').val('');
                $('#age').val('');
                $('#email').val('');
            }
            else
            {
                $.ajax({
                type: "post",
                url: "process.php",
                data: {name:name},
                success: function (data,status) 
                {
                    var user = JSON.parse(data);
                    $('#id').val(user.id);
                    $('#gender').val(user.gender);
                    $('#age').val(user.age);
                    $('#email').val(user.email);
                }
               });
              }
            });
        });
    </script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>