<?php
include("dbConnect.php");
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
    <!-- Toaster CSS File -->
    <link rel="stylesheet" href="Toaster/toaster.css">
    <title>Login</title>
    <style>
        *{
            font-family: sans-serif;
            font-size: 14px;
        }
        h1{
            font-weight:900;
            letter-spacing:1px;
        }
        label{
            font-weight:300;
        }
    </style>
</head>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <!-- Bootstrap Card -->
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">LOGIN NOW!</h1>
                    </div>
                    <div class="card-body">
                        <!-- Login Form -->
                        <form action="" method="POST" id="loginForm">
                        <!-- Email -->
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control mb-2">
                        <!-- Password -->
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control mb-2">
                        <!-- Login Button -->
                        <button type="button" class="btn btn-outline-primary mb-1" id="btnLogin">Login</button> <br>
                        <!-- Forget Password -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#forgetPasswordModal">Forget password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forget Password Modal -->
    <div class="modal fade" id="forgetPasswordModal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">FORGET PASSWORD?</h1>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <!-- Forget Password Form -->
                <form action="" method="POST" id="forgetPasswordForm">
                <!-- Email -->
                <label for="">Email</label>
                <input type="text" name="email2" id="email2" placeholder="Enter Email" class="form-control mb-2">
                </div>
                <div class="modal-footer">
                <!-- Send Email Button -->
                <button type="button" class="btn btn-outline-primary mb-1" id="btnSendEmail">Send Email <div id="loader"></div> </button>
                <button type="button" class="btn btn-outline-secondary mb-1" data-bs-dismiss="modal">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Forget Password Modal Ended -->


    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- Toaster JS File -->
    <script src="Toaster/toaster.js"></script>
    <?php
    include("Toaster/ToasterOptions.php");
    ?>
    <!-- Scripting -->
    <script type="text/javascript">
        // Login
        $("#btnLogin").click(function(){
            var email = $("#email").val();
            var password = $("#password").val();
            if(email=='' || password=='')
            {
                toastr.error("You can't left any field empty.","All fields are required!");
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: "loginProcess.php",
                    data: {email:email, password:password},
                    success: function (data,status) 
                    {
                        if(data==0)
                        {
                            toastr.error("Invalid email or password.","Login Failed!");
                        }
                        else
                        {
                            $("#loginForm input").val("");
                            var USER = JSON.parse(data);
                            var username = USER.name;
                            let toasterMessage = toastr.success("Welcome "+username+"","Login Successful!");
                            if(toasterMessage)
                            {
                                function redirectNow()
                                {
                                    window.location.href="home.php";
                                }
                                setTimeout(redirectNow,3000);
                            }
                        }
                    }
                });
            }
        });

        // Forget Password
        $("#btnSendEmail").click(function(){
            var email2 = $("#email2").val();
            if(email2=='')
            {
                toastr.error("You can't left email field empty.","Error occured!");
            }
            else
            {
                $("#loader").addClass("spinner-border spinner-border-sm");
                $.ajax({
                    type: "POST",
                    url: "forgetPassword.php",
                    data: {email2:email2},
                    success: function (data,status) 
                    {
                        if(data==email2)
                        {
                            $("#loader").removeClass("spinner-border spinner-border-sm");
                            toastr.success("We have sent you email at "+email2+"","Check your email");
                            $("#forgetPasswordForm input").val("");
                            $("#forgetPasswordModal").modal("hide");

                        }
                        else if(data==0)
                        {
			    $("#loader").removeClass("spinner-border spinner-border-sm");
                            toastr.error("Email not sent","Error occured!");
                        }
                        else if(data=="email not exist")
                        {
			    $("#loader").removeClass("spinner-border spinner-border-sm");
                            toastr.error("The email you enter does not exist.","Error occured!");
                        }
                    }
                });
            }
        });

    </script>
</body>
</html>