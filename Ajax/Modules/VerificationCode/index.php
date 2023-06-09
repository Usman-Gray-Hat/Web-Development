<?php
include("dbConnect.php");
include("header.php");
?>
<!-- Bootstrap Grid System -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <!-- Card -->
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="card-title text-center">LOGIN FORM</h1>
                </div>
                <div class="card-body">
                    <!-- Login Form -->
                    <form action="" method="POST" id="loginForm">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control mb-2">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control mb-2">
                        <button type="button" class="btn btn-outline-success mb-3" id="loginBtn">Login</button>
                        <button type="button" class="btn btn-outline-danger mb-3" data-bs-toggle="modal" data-bs-target="#forgetPasswordModal">Forget Password?</button>
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
                        <h3 class="modal-title">FORGET PASSWORD</h3>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
            <div class="modal-body">
                <!-- Forget Password Form -->
                <form action="" method="post" id="forgetPasswordForm">
                <label for="">Email</label>
                <input type="text" name="forgetPasswordEmail" id="forgetPasswordEmail" placeholder="Enter Email" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="SendVerificationCodeBtn">Send Verification Code <div id="loader"></div> </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </form>  
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
<!-- Scripting -->
<script type="text/javascript">
    // Login
    $("#loginBtn").click(function(){
        let email = $("#email").val();
        let password = $("#password").val();
        if(email=='' || password=='')
        {
            toastr.error("You can't left any field empty.","All fields are required!");
        }
        else
        {
            $.ajax({
                type: "post",
                url: "loginProcess.php",
                data: {email:email, password:password},
                success: function (data,status) 
                {

                    if(data=="Login Failed")
                    {
                        toastr.error("Invalid email or password.","Error occured!");
                    }
                    else
                    {
                        $("#loginForm input").val("");
                        let user = JSON.parse(data);
                        let username = user.name;
                        let msg = toastr.success("Welcome "+username+"","Login Successful");
                        if(msg)
                        {
                            function redirection()
                            {
                                window.location.href="home.php";
                            }
                            setTimeout(redirection,2000);
                        }
                    }
                }
            });
        }
    });

    // Send Verification Code
    $("#SendVerificationCodeBtn").click(function(){
        let email1 = $("#forgetPasswordEmail").val();
        if(email1=='')
        {
            toastr.error("You can't left email field empty.","Error occured!");
        }
        else
        {
            $("#loader").addClass("spinner-border spinner-border-sm");
            $.ajax({
                type: "post",
                url: "SendVerificationProcess.php",
                data: {email1:email1},
                success: function (data,status) 
                {
                    if(data=="Email sent")
                    {
                        $("#loader").removeClass("spinner-border spinner-border-sm");
                        $("#forgetPasswordForm").val("");
                        $("#forgetPasswordModal").modal("hide");
                        window.location.href="EnterCode.php";
                    }
                    else if(data=="Email not sent")
                    {
			$("#loader").removeClass("spinner-border spinner-border-sm");
                        toastr.error("Email not sent.","Something went wrong!");
                    }
                    else if(data=="Email does not exist")
                    {
                        $("#loader").removeClass("spinner-border spinner-border-sm");
                        toastr.error("The email you entered does not exist.","Error occured!");
                    }
                }
            });
        }
    });
</script>