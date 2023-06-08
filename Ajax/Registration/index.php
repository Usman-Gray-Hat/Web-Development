<?php
include('dbConnect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Sweet Alert 2 CSS File -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <!-- Sweet Alert 2 JS Files -->
    <script src="dist/sweetalert2.all.min.js"></script>
   </head>
  <body>
    <div class="container" style="margin-top:10px;">
        <div class="row">  <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="text-center text-uppercase jumbotron" style="font-weight:900; letter-spacing:1px;">Register Yourself Here</h1>
            </div>
        </div>
        <div class="row float-right"> <!-- 2nd Row -->
            <div class="col-md-12">
                <button class="btn btn-success" type="button" title="Register now" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
                <button class="btn btn-primary" type="button" title="Login now" data-bs-toggle="modal" data-bs-target="#signinModal">Sign in</button>
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
                    <h1 class="modal-title" style="font-weight:900">SIGN UP</h1>
                    <!-- Close Button -->
                    <button type="button" data-bs-dismiss="modal" title="Close">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Signup Form -->
                    <form action="" method="post" id="signupForm">
                        <!-- First Name -->
                        <input type="text" name="fname" id="fname" placeholder="Enter First Name" class="form-control">
                        <br>
                        <!-- Last Name -->
                        <input type="text" name="lname" id="lname" placeholder="Enter Last Name" class="form-control">
                        <br>
                        <!-- Gender -->
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <br>
                        <!-- Age -->
                        <input type="number" name="age" id="age" placeholder="Enter Age" class="form-control">
                        <br>
                        <!-- Email -->
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
                        <br>
                        <!-- Password -->
                        <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
                        <br>
                        <!-- Confirm Password -->
                        <input type="password" name="cpass" id="cpass" placeholder="Re-Enter Password" class="form-control">
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Sign up</button> <!-- Signup Button -->
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> <!-- Cancel Button -->
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Signup Modal Ended -->



    <!-- Login Modal Started -->
    <div class="modal fade" id="signinModal">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Heading -->
                    <h1 class="modal-title" style="font-weight:900">SIGN IN</h1>
                    <!-- Close Button -->
                    <button type="button" data-bs-dismiss="modal" title="Close">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Login Form -->
                    <form action="" method="post" id="loginForm">
                        <!-- Email -->
                        <input type="text" name="email2" id="email2" placeholder="Enter Email" class="form-control" required>
                        <br>
                        <!-- Password -->
                        <input type="password" name="pass2" id="pass2" placeholder="Enter Password" class="form-control" required>
                        <br>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Login</button> <!-- Login Button -->
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> <!-- Cancel Button -->
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Login Modal Ended -->




    <!-- Scripting -->
    <script type="text/javascript">
        // For Signup Form
        $('#signupForm').on('submit',function(e){
            e.preventDefault();

            var signupForm = new FormData(this); //Signup Form Object

            // Validation For Empty Fields
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var gender = $('#gender').val();
            var age = $('#age').val();
            var email = $('#email').val();
            var pass = $('#pass').val();
            var cpass = $('#cpass').val();

            if(fname=="" || lname=="" || gender=="" || age=="" || email=="" || pass=="" || cpass=="")
            {
                swal.fire({
                title: "ALL FIELDS ARE REQUIRED!",
                text: "You can't left any field empty in Signup Form",
                icon: "warning",
                showCloseButton: true,
                confirmButtonColor: "blue"
                });
            }
            else
            {
                // Validation for matching password and confirm password field.
                if(pass!=cpass)
                {
                    swal.fire({
                    title: 'PASSWORD NOT MATCHED!',
                    text: 'Password and Confirm Password is not identical.',
                    icon: 'error',
                    showCloseButton: true,
                    confirmButtonColor: 'blue'
                    });
                }
                else
                {
                    $.ajax({
                    type: "post",
                    url: "signup.php",
                    data: signupForm,
                    contentType: false,
                    processData: false,
                    success: function(data,status) 
                    {
                        $('#signupForm input,select').val(''); //For clearing all fields after the form submission.
                        $('#signupModal').modal('hide');
                        swal.fire({
                        title: 'REGISTRATION COMPLETED!',
                        text: 'Your account has been created successfully.',
                        icon: 'success',
                        confirmButtonColor: 'blue',
                        timer:2000
                        });
                    }
                  });
                }
            }
        });


        // For Login Form
        $('#loginForm').on('submit',function(e){
            e.preventDefault();

            var loginForm = new FormData(this); // Login Form Object

            $.ajax({
                type: "post",
                url: "login.php",
                data: loginForm,
                contentType: false,
                processData: false,
                success:function(data,status) 
                {
                    // Now, checking if it gets a row from $row variable which exists in login.php file.
                    if(data==1)
                    {
                        $('#loginModal').modal("hide");
                        swal.fire({
                        title: 'LOGIN SUCCESSFUL!',
                        text: 'Welcome to our application.',
                        icon: 'success',
                        confirmButtonColor: 'blue',
                        timer: 900,
                        }).then(function(){
                            window.location.href='home.php';
                        });
                    }
                    else
                    {
                        swal.fire({
                        title: 'LOGIN FAILED!',
                        text: 'Invalid email or password.',
                        icon: 'error',
                        showCloseButton: true,
                        confirmButtonColor: 'blue'
                    });
                    }
                }
            });
        })
        </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>