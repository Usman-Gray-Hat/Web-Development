<?php
include('script.php');
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
    <title>Registration</title>
</head>
<style>
    *{
        font-family:sans-serif;
    }
    h1{
        font-weight:900;
        letter-spacing:2px;
    }
</style>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container mt-2">
        <div class="row">  <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center bg-dark text-white">SIGNUP AND LOGIN USING FUNCTIONS</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd row -->
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-success float-right" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
                <br><br>
                <button type="button" class="btn btn-outline-primary float-right" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
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
                        <h1 class="modal-title">SIGNUP NOW</h1>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>
                        <!-- Modal Body -->
                <div class="modal-body">

                    <!-- Signup Form -->
                    <form action="" method="POST" id="signupForm">

                    <!-- First Name -->
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">

                    <!-- Last Name -->
                    <input type="text" name="lname" id="lname" class="form-control mt-3" placeholder="Enter Last Name">

                    <!-- Gender -->
                    <select name="gender" id="gender" class="form-control mt-3">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <!-- Age -->
                    <input type="number" name="age" id="age" class="form-control mt-3" placeholder="Enter Age"> 

                    <!-- Email -->
                    <input type="text" name="email" id="email" class="form-control mt-3" placeholder="Enter Email">  

                    <!-- Password -->
                    <input type="password" name="password" id="password" class="form-control mt-3" placeholder="Enter Password">  

                    <!-- Confirm Password -->
                    <input type="password" name="cpassword" id="cpassword" class="form-control mt-3" placeholder="Re-Enter Password"> 

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" id="btnSignup">Signup</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Signup Modal Ended -->


    <!-- Login Modal Started -->
    <div class="modal fade" id="loginModal">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>LOGIN NOW</h1>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <!-- Login Form -->
                    <form action="" method="POST" id="loginForm">
                    
                    <!-- Email -->
                    <input type="text" name="email_login" id="email_login" class="form-control" placeholder="Enter Email">  

                    <!-- Password -->
                    <input type="password" name="password_login" id="password_login" class="form-control mt-3" placeholder="Enter Password">

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" id="btnLogin">Login</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>                  
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Login Modal -->


    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $("#btnSignup").click(function(){
            Signup();
        });

        $("#btnLogin").click(function(){
            Login();
        });
    </script>
</body>
</html>