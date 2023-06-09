<?php
include("dbConnect.php");
include("header.php");
if(!isset($_SESSION['UserEmail']))
{
    header("Location:index.php");
}
?>

<!-- Bootstrap Grid System -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <!-- Card -->
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="card-title text-center">ENTER FIVE DIGITS CODE</h2>
                </div>
                <div class="card-body">
                    <!-- Verificaiton Form -->
                    <form action="" method="POST">
                        <input type="number" name="code" id="code" placeholder="Enter Code" class="form-control mb-2" maxlength="5">
                        <button type="button" class="btn btn-outline-success" id="VerifyNowBtn">Verify</button>
                    </form>
                </div>
                <div class="card-footer">
                    <h4>We have sent you verification code at <?php echo $_SESSION['UserEmail']; ?></h4>
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
    $("#VerifyNowBtn").click(function(){
        let code = $("#code").val();
        if(code=='')
        {
            toastr.info("You must need to enter verification code in order to proceed further.","Enter Verification Code");
        }
        else
        {
            $.ajax({
                type: "post",
                url: "VerifyingProcess.php",
                data: {code:code},
                success:function(data,status) 
                {
                    if(data=="Correct Code")
                    {
                        window.location.href="updatePassword.php";
                    }
                    else if(data=="Code Expired")
                    {
                        toastr.warning("This verification code has already expired.","Error occured");
                    }
                    else if(data=="Incorrect verificaiton code")
                    {
                        toastr.error("Make sure the code you enter is valid.","Incorrect Verification Code");
                    }
                }
            });
        }
    });
</script>