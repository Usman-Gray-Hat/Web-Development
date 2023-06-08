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
            <h2 class="jumbotron text-center text-uppercase" style="font-weight:900; letter-spacing:1px;">Fetch Data On All Text Boxes By Id & Name Without Pressing The Button.</h2>
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
                </form>
            </div>
        </div>
    </div>

    <!-- Scripting -->
    <script type="text/javascript">
        $(document).ready(function () {

            // Fetch By ID
            $('#id').on('keyup',function(){
                var id = $('#id').val();
                if(id=='')
                {
                    $('#name').val('');
                    $('#gender').val('');
                    $('#age').val('');
                    $('#email').val('');
                }
                else
                {
                    $.ajax({
                        type: "post",
                        url: "process.php",
                        data: {id:id},
                        success: function (data,status) 
                        {
                            var obj1 = JSON.parse(data);
                            $('#name').val(obj1.name);
                            $('#gender').val(obj1.gender);
                            $('#age').val(obj1.age);
                            $('#email').val(obj1.email);
                        }
                    });
                }
            });


            // Fetch By Name
            $('#name').on('keyup',function(){
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
                        var obj2 = JSON.parse(data);
                        $('#id').val(obj2.id);
                        $('#gender').val(obj2.gender);
                        $('#age').val(obj2.age);
                        $('#email').val(obj2.email);
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