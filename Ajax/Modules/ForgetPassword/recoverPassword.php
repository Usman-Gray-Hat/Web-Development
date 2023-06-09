<?php
include("dbConnect.php");
if(!isset($_SESSION['token']))
{
    header("Location:index.php");
}
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
    <title>Forget Password</title>
    <style>
        *{
            font-family: sans-serif;
            font-size: 14px;
        }
        h2{
            font-weight:600;
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
                        <h2 class="text-center">RECOVER PASSWORD</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="recoverPasswordForm">
                        <!-- New Password -->
                        <label for="">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter New Password" class="form-control mb-2">
                        <!-- Confirm Password -->
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Re-Enter Password" class="form-control mb-2">
                        <!-- Send Email Button -->
                        <button type="button" class="btn btn-outline-primary mb-1" id="btnUpdatePassword">Update Password</button> <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    $("#btnUpdatePassword").click(function(){
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if(password=='' || cpassword=='')
        {
            toastr.error("You can't left any field empty.","All fields are required!");
        }
        else
        {
            if(password != cpassword)
            {
                toastr.warning("New password and confirm password is not identical.","Password Not Matched!");
            }
            else
            {
                $.ajax({
                type: "post",
                url: "recoverProcess.php",
                data: {password:password, cpassword:cpassword},
                success: function (data,status) 
                {
                    if(data==1)
                    {
                        $("#recoverPasswordForm input").val("");
                        let msg = toastr.success("Your new password has been updated successfully.","Updated!");
                        if(msg)
                        {
                            function redirectToLogin()
                            {
                                window.location.href="index.php";
                            }
                            setTimeout(redirectToLogin,3000);
                        }
                    }
                    else
                    {
                        toastr.error("Password not updated.","Error occured!");
                    }
                }
              });
            }
        }
    });
    </script>
  
</body>
</html>