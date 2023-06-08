<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto-Complete</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">

    <style>
        h1{
            margin-top:20px;
            font-weight:900;
            letter-spacing:1px;
        }

        #searchBar{
            border-radius: 10px;
            width: 125%;
        }

        #icon{
            margin-top:8px;
            position: absolute;
            margin-left:130px;
        }

        li{
            /* cursor: pointer; */
            width: 125%;
            border-radius: 5px;
            padding: 2px;
            padding-left:5px;
        }

        li:hover{
            background-color: #348cf1;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center text-white text-uppercase bg-dark">Dynamic Search Bar Using jQuery Ajax</h1> <!-- Heading -->
            </div>
        </div>

        <div class="row float-right"> <!-- 2nd Row -->
            <div class="col-md-10">
            <i id="icon" class="fa fa-search"></i> <!-- Search Icon -->
            <input type="text" name="searchBar" id="searchBar" placeholder="Search" class="form-control">
            <div id="nameList"> <!-- Names list will be shown here --> </div>
        </div>
    </div>

    <!-- Scripting -->
    <script type="text/javascript"> 
    $(document).ready(function(){
        $('#searchBar').keyup(function(){
            var name = $('#searchBar').val();
            if(name!='')
            {
                $.ajax({
                    type: "post",
                    url: "process.php",
                    data: {name:name},
                    success: function (data,status) 
                    {
                        // Display search options.
                        $('#nameList').show();
                        $('#nameList').html(data);

                        // In search options, 1st item gets AUTO-FOCUSED by default.
                        $('li:first-child').css({
                            "background-color":"#348cf1",
                            "color":"white"
                        });

                        // 1st Item gets un-focused after the cursor enter on any items other than 1st item.
                        $('li:gt(0)').mouseenter(function(){
                            $('li:first-child').css({
                                "background-color":"white",
                                "color":"black"
                            });
                        });

                        // 1st Item gets focused after the cursor enter on it. 
                        $('li:first-child').mouseenter(function(){
                            $('li:first-child').css({
                                    "background-color":"#348cf1",
                                    "color":"white"
                                });
                        });

                        // For pointer cursor on list item.
                        $('#nameList').mouseenter(function(){
                            $('#nameList').css("cursor","pointer");
                        });

                        // Display list item value in Search bar after click.
                        $('#nameList').on('click','ul li',function(){
                        $('#searchBar').val($(this).text());
                        $('#searchBar').css("background-color","azure");
                        $('#nameList').hide();
                        });
                    }
                });
            }
            else
            {
                $('#nameList').hide();
            }
        });
    });
    </script>
</body>
</html>