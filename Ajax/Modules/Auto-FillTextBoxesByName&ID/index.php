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

    <style>
        h1{
            margin-top:20px;
            font-weight:900;
            letter-spacing:1px;
        }
        li{
            cursor:pointer;
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
                <h1 class="jumbotron text-center text-white text-uppercase bg-dark">Implementing Auto Complete Using jQuery Ajax</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
            <div class="col-md-5 mx-auto">
                <!-- Bootstrap Card -->
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                        <h1 class="card-title text-center text-uppercase">Student Information</h1> <!-- Heading -->
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form action="">

                            <!-- Student ID -->
                            <input type="number" name="std_id" id="std_id" placeholder="Enter Student ID" class="form-control">
                            <div id="idList"> <!-- Student IDs option will be shown here --> </div>
                            <br>

                            <!-- Student Name -->
                            <input type="text" name="name" id="name" placeholder="Enter Student Name" class="form-control">
                            <div id="nameList"> <!-- Student Names option will be shown here --> </div>
                            <br>

                            <!-- Student Age -->
                            <input type="number" name="age" id="age" placeholder="Enter Student Age" class="form-control">
                            <br>

                            <!-- Student Gender -->
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <br>

                            <!-- Student Email -->
                            <input type="text" name="email" id="email" placeholder="Enter Student Email" class="form-control">
                            <br>

                            <!-- Student Address -->
                            <textarea name="address" id="address" placeholder="Address" cols="30" rows="5" class="form-control"></textarea>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripting -->
    <script type="text/javascript">
        $(document).ready(function (){

            // For Student ID Options (Through Keyup).
            $('#std_id').keyup(function(){
                var std_id = $('#std_id').val();
                if(std_id!='')
                {
                    $.ajax({
                        type: "post",
                        url: "process.php",
                        data: {std_id:std_id},
                        success:function(data,status) 
                        {
                            $('#idList').show();
                            $('#idList').html(data);
                        }
                    });
                }
                else
                {
                    $('#idList').hide();
                }
            });


            // For Auto-Fill Text Boxes With The Respect Of ID (Through Keyup).
            $('#std_id').keyup(function(){
                var std_id1 = $('#std_id').val();
                if(std_id1=='')
                {
                    $('#name').val("");
                    $('#age').val("");
                    $('#gender').val("");
                    $('#email').val("");
                    $('#address').val("");
                }
                else
                {
                    $.ajax({
                        type: "post",
                        url: "process.php",
                        data: {std_id1:std_id1},
                        success: function (data,status) 
                        {
                            var user = JSON.parse(data);
                            $('#name').val(user.name);
                            $('#age').val(user.age);
                            $('#gender').val(user.gender);
                            $('#email').val(user.email);
                            $('#address').val(user.address);
                        }
                    });
                }
            });


                // For Auto-Fill Text Boxes With The Respect Of ID (Through Item Selected).
                $('#idList').on('click','li',function(){
                var id_list_item = $(this).text();
                $('#std_id').val($(this).text());
                $('#idList').hide();

                if(id_list_item!='')
                {
                    $.ajax({
                        type: "post",
                        url: "process.php",
                        data: {id_list_item:id_list_item},
                        success:function(data,status) 
                        {
                            var user1 = JSON.parse(data);
                            $('#name').val(user1.name);
                            $('#age').val(user1.age);
                            $('#gender').val(user1.gender);
                            $('#email').val(user1.email);
                            $('#address').val(user1.address);
                        }
                    });
                }
            });


            // For Name Options (Through Keyup).
            $('#name').keyup(function(){
                var name = $('#name').val();
                if(name!='')
                {
                    $.ajax({
                        type: "post",
                        url: "process.php",
                        data: {name:name},
                        success:function (data,status) 
                        {
                            $('#nameList').show();
                            $('#nameList').html(data);
                        }
                    });
                }
                else
                {
                    $('#nameList').hide();
                }
            });


            // For Auto-Fill Text Boxes With The Respect Of Student Name (Through Keyup).
            $('#name').keyup(function(){
            var name1 = $('#name').val();
            if(name1!='')
            {
                $.ajax({
                    type: "post",
                    url: "process.php",
                    data: {name1:name1},
                    success: function (data,status) 
                    {
                        var user2 = JSON.parse(data);
                        $('#std_id').val(user2.id);
                        $('#age').val(user2.age);
                        $('#gender').val(user2.gender);
                        $('#email').val(user2.email);
                        $('#address').val(user2.address);
                    }
                });
            }
            else
            {
                $('#std_id').val("");
                $('#age').val("");
                $('#gender').val("");
                $('#email').val("");
                $('#address').val("");
            }
        });


        // For Auto-Fill Text Boxes With The Respect Of Name (Through Item Selected).
        $('#nameList').on('click','li',function(){
            var name_list_item = $(this).text();
            $('#name').val($(this).text());
            $('#nameList').hide();
            if(name_list_item!='')
            {
                $.ajax({
                    type: "post",
                    url: "process.php",
                    data: {name_list_item:name_list_item},
                    success: function (data,status) 
                    {
                        var user3 = JSON.parse(data);
                        $('#std_id').val(user3.id);
                        $('#age').val(user3.age);
                        $('#gender').val(user3.gender);
                        $('#email').val(user3.email);
                        $('#address').val(user3.address);
                    }
                });
            }
        });
    });
    </script>
</body>
</html>