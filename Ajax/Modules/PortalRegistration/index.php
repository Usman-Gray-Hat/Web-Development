<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Sweet Alert 2 CSS File -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <!-- Sweet Alert 2 JS File -->
    <script src="dist/sweetalert2.all.min.js"></script>
</head>
<body>

    <!-- Bootstrap Grid Sytem -->
    <div class="container" style="margin-top:20px;">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="text-center text-uppercase jumbotron" style="font-weight:900; letter-spacing:1px;">WEB PORTAL REGISTRATION PAGE</h1>
            </div>
        </div>
        
        <div class="row"> <!-- 2nd Row -->
        <div class="col-md-5 mx-auto">
            <!-- Bootstrap Card For Login Form -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <!-- Heading -->
                    <h1 class="card-title text-center" style="font-weight:900; letter-spacing:1px;">LOGIN FORM</h1>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form -->
                    <form action="" method="post" id="loginForm">
                        <!-- Email -->
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
                        <br>
                        <!-- Password -->
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                </div>
                <!-- Card Footer -->
                <div class="card-footer">
                    <!-- Login Button -->
                    <button type="button" class="btn btn-primary btn-block" id="loginBtn">LOGIN</button>
                    <!-- Sginup Button -->
                    <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#signupModal">DON'T HAVE ACCOUNT? SIGNUP NOW</button>
                </form>
                </div>
            </div>
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
                    <!-- Heading -->
                    <h1 class="text-center text-uppercase modal-title" style="font-weight:900; letter-spacing:1px;">SIGNUP</h1>
                    <!-- Close Button -->
                    <button type="button" data-bs-dismiss="modal" title="Close modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Form -->
                    <form action="" method="post" id="signupForm">
                        <!-- First Name -->
                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control">
                        <br>
                        <!-- Last Name -->
                        <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control">
                        <br>
                        <!-- Gender -->
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <br>
                        <!-- Age -->
                        <input type="number" name="age" id="age" placeholder="Age" class="form-control">
                        <br>
                        <!-- Email -->
                        <input type="text" name="email2" id="email2" placeholder="Email" class="form-control">
                        <br>
                        <!-- Password -->
                        <input type="password" name="password2" id="password2" placeholder="Password" class="form-control">
                        <br>
                        <!-- Confirm Password -->
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Signup Button -->
                    <button type="button" class="btn btn-success" onclick="signup()">Signup</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Signup Modal Ended -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">
            // For Login 
            $('#loginBtn').on('click',function(){
                var email = $('#email').val();
                var password = $('#password').val();
                if(email=='' || password=='')
                {
                    swal.fire({
                        title: 'ALL FIELDS ARE REQUIRED',
                        text: 'You cannot left any field empty',
                        icon: 'warning',
                        confirmButtonColor: 'blue',
                        showCloseButton: true,
                        allowOutsideClick: false,
                    });
                }
                else
                {
                    $.ajax({
                        url: 'login.php',
                        type: 'post',
                        data: {email:email,password:password},
                        success:function(response,status)
                        {
                            if(response>0)
                            {
                                swal.fire({
                                title: 'LOGIN SUCCESSFUL',
                                text: 'Welcome to portal',
                                icon: 'success',
                                confirmButtonColor: 'blue',
                                showCloseButton: true,
                                allowOutsideClick: false,
                                timer:1000
                                }).then(function(){
                                    window.location.href="home.php";
                                });
                            }
                            else
                            {
                                swal.fire({
                                title: 'LOGIN FAILED',
                                text: 'Invalid email or password',
                                icon: 'error',
                                confirmButtonColor: 'blue',
                                showCloseButton: true,
                                allowOutsideClick: false
                                });
                            }
                        }
                    });
                }
            });

            // For Signup
            function signup()
            {
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var gender = $('#gender').val();
                var age = $('#age').val();
                var email2 = $('#email2').val();
                var password2 = $('#password2').val();
                var confirm_password = $('#confirm_password').val();

                if(fname=='' || lname=='' || gender=='' || age=='' || email2=='' || password2=='' || confirm_password=='')
                {
                        swal.fire({
                        title: 'ALL FIELDS ARE REQUIRED',
                        text: 'You cannot left any field empty in signup form',
                        icon: 'warning',
                        confirmButtonColor: 'blue',
                        showCloseButton: true,
                        allowOutsideClick: false,
                    });
                }
                else
                {
                    if(password2!=confirm_password)
                    {
                        swal.fire({
                        title: 'PASSWORD NOT MATCHED',
                        text: 'Password and Confirm Password is not identical',
                        icon: 'error',
                        confirmButtonColor: 'blue',
                        showCloseButton: true,
                        allowOutsideClick: false,
                        });
                    }
                    else
                    {
                        $.ajax({
                        type: "post",
                        url: "signup.php",
                        data: {fname:fname, lname:lname, gender:gender, age:age, email2:email2, password2:password2},
                        success: function (response,status) 
                        {
                            $('#signupForm input,select').val("");
                            $('#signupModal').modal("hide");
                            swal.fire({
                            title: 'REGISTRATION COMPLETED!',
                            text: 'Your account has been created successfully',
                            icon: 'success',
                            confirmButtonColor: 'blue',
                            showCloseButton: true,
                            allowOutsideClick: false,
                            timer:1000
                            });
                        }
                       });
                    }
                }
            }
 
    </script>
</body>
</html>