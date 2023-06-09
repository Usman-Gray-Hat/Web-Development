<?php
include("dbConnect.php");
include("header.php");
if(!isset($_SESSION['UserEmail']) && !isset($_SESSION['Verified']))
{
    header("Location:index.php");
}
else if(isset($_SESSION['UserEmail']) && !isset($_SESSION['Verified']))
{
    header("Location:EnterCode.php");
}
?>

<!-- Bootstrap Grid System -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <!-- Card -->
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="card-title text-center">UPDATE PASSWORD</h2>
                </div>
                <div class="card-body">
                    <!-- Update Password Form -->
                    <form action="" method="POST" id="updatePasswordForm">
                        <label for="">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control mb-2">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Re-Enter Password" class="form-control mb-2">
                        <button type="button" class="btn btn-outline-primary" id="UpdatePasswordBtn">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
<!-- Scripting -->
<script type="text/javascript">
    $("#UpdatePasswordBtn").click(function(){
        let pass = $("#password").val();
        let cpass = $("#cpassword").val();
        if(pass=='' || cpass=='')
        {
            toastr.error("You can't left any field empty.","All fields are required!");
        }
        else
        {
            if(pass!=cpass)
            {
                toastr.error("New password and confirm password is not identical.","Passwords Not Matched!");
            }
            else
            {
                $.ajax({
                    type: "post",
                    url: "updatePasswordProcess.php",
                    data: {pass:pass, cpass:cpass},
                    success: function (data,status) 
                    {
                        if(data=="Password Updated")
                        {
                            $("#updatePasswordForm input").val("");
                            let msg = toastr.success("Your password has been updated successfully.","Password Updated!");
                            if(msg)
                            {
                                function redirection()
                                {
                                    window.location.href="index.php";
                                }
                                setTimeout(redirection,2000);
                            }
                        }  
                    }
                });
            }
        }
    });
</script>