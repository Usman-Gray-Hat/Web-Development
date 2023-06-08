<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Sweet Alert2 CSS file -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <!-- Sweet Alert2 JS file -->
    <script src="dist/sweetalert2.all.min.js"></script>
    <title>Signup</title>

    <style>
        .container{
            margin-top:20px;
        }

        h1{
            font-weight:900;
            letter-spacing:2px;
        }
        label{
            
            font-family:sans-serif;
            font-weight:bold;
        }

        button{
            font-family:sans-serif;
        }
    </style>
</head>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron bg-dark text-white text-center text-uppercase">Registration Web Portal</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
            <div class="col-md-12">
                <!-- Create Account Button -->
                <button type="button" class="btn btn-success float-right" title="Create new" 
                data-bs-toggle="modal" data-bs-target="#signupModal">Create Account</button>
            </div>
        </div>
    </div>

    <!-- Signup Modal Started -->
    <div class="modal fade" id="signupModal">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>SIGNUP NOW</h1> <!-- Heading -->
                    <button type="button" data-bs-dismiss="modal" title="close">&times;</button> <!-- Close Button -->
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Signup Form -->
                    <form action="" method="post" id="signupForm">

                        <!-- First Name -->
                        <label for="">FIRST NAME</label>
                        <input type="text" name="fname" id="fname" placeholder="Enter First Name" class="form-control">
                        <br>

                        <!-- Last Name -->
                        <label for="">LAST NAME</label>
                        <input type="text" name="lname" id="lname" placeholder="Enter Last Name" class="form-control">
                        <br>

                        <!-- Gender -->
                        <label for="">GENDER</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <br>

                        <!-- Age -->
                        <label for="">AGE</label>
                        <input type="number" name="age" id="age" placeholder="Enter Age" class="form-control">
                        <br>

                        <!-- Email -->
                        <label for="">EMAIL</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
                        <br>

                        <!-- Passowrd -->
                        <label for="">PASSWORD</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                        <br>

                        <!-- Confirm Password -->
                        <label for="">CONFIRM PASSWORD</label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Re-Enter Password" class="form-control">
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">

                    <!-- Signup Button -->
                    <button type="button" id="btnSignup" class="btn btn-primary">Signup</button>
                    <!-- Cancel Button -->
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Signup Modal Ended -->


    <!-- Scripting -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#btnSignup').click(function(){
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var gender = $('#gender').val();
                var age = $('#age').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var cpassword = $('#cpassword').val();

                if(fname=='' || lname=='' || gender=='' || age=='' || email=='' || password=='' || cpassword=='')
                {
                    swal.fire({
                        title:'ALL FIELDS ARE REQUIRED',
                        text: 'You cannot left any field empty.',
                        icon: 'info',
                        confirmButtonColor: 'blue',
                        allowOutsideClick: false,
                        showCloseButton: true
                    });
                }
                else
                {
                    if(password==cpassword)
                    {
                        $.ajax({
                            type: 'post',
                            url: 'process.php',
                            data: {fname:fname, lname:lname, gender:gender, age:age, email:email, password:password},
                            success:function(data,status)
                            {
                                if(data>0)
                                {
                                    swal.fire({
                                    title:'THIS EMAIL ADDRESS IS ALREADY EXIST!',
                                    text: 'This email has taken by another user. Try different email.',
                                    icon: 'warning',
                                    confirmButtonColor: 'blue',
                                    allowOutsideClick: false,
                                    showCloseButton: true
                                    });
                                }
                                else
                                {
                                    swal.fire({
                                    title:'SIGNUP COMPLETED!',
                                    text: 'Your account has been created successfully.',
                                    icon: 'success',
                                    confirmButtonColor: 'blue',
                                    allowOutsideClick: false,
                                    showCloseButton: true,
                                    timer: 2000
                                    });
                                    $('#signupForm input,select').val("");
                                    $('#signupModal').modal("hide");
                                }
                            }
                        });
                    }
                    else
                    {
                        swal.fire({
                        title:'PASSWORD NOT MATCHED',
                        text: 'Password & Confirm Password is not identical.',
                        icon: 'error',
                        confirmButtonColor: 'blue',
                        allowOutsideClick: false,
                        showCloseButton: true
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>