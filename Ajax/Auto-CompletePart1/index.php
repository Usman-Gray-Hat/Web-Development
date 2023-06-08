<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JQuery UI CSS File -->
    <link rel="stylesheet" href="jquery-ui-1.13.2/jquery-ui.min.css">
    <!-- JQuery UI JS File -->
    <script src="jquery-ui-1.13.2/jquery-ui.min.js"></script>

    <style>
        ul{
            background-color: white;
        }
        li{
            /* cursor: pointer; */
            padding:2px;
            
        }
        li:hover{
            background-color:#3698f5; 
            color: white;
        }
        /* #3698f5; */
    </style>
</head>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-white bg-dark jumbotron" style="font-weight:900;">IMPLEMENTING AUTO-COMPLETE METHOD USING JQUERY AJAX</h1>
        </div>
    </div>
        <div class="row"> <!-- 2nd Row -->
            <div class="col-md-5 mx-auto">
                <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                <div id="nameList"> <!-- Searching options will be shown here --> </div>
            </div>
        </div>
    </div>

    <!-- Scripting -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#name').keyup(function(){ 
                var name = $('#name').val();
                if(name!='')
                {
                    $.ajax({
                        type: "post",
                        url: "process.php",
                        data: {name:name},
                        success:function(data,status) 
                        {
                            $('#nameList').fadeIn(500); //Showing Div of nameList within Fade-In effect. Effect duration is half second. 
                            $('#nameList').html(data);
                        }
                    });
                }
                else
                {
                    $('#nameList').fadeOut(200);
                }
            });

            // You can also use CSS in jQuery by implementing CSS method provided by jQuery.
            $('#nameList').mouseenter(function(){
                $('li').css("cursor","pointer");
            });


            // Display list item on Text box after click.
            $('#nameList').on('click','li',function(){
                $('#name').val($(this).text());
                $('#nameList').fadeOut(500);
            });
        });
    </script>


</body>
</html>