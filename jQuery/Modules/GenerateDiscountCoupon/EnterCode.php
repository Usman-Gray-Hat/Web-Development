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
    <title>Generate Discount Coupon</title>
</head>
<body>
  <style>

*{
    font-family: sans-serif;
}

.card-title
{
    font-weight: 900;
    letter-spacing: 1px;
}
</style>
      
        <!-- Bootstrap Grid System -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <!-- Card -->
                    <div class="card shadow">
                        <div class="card-header">
                            <h1 class="card-title text-center">GET YOUR DISCOUNT</h1>
                        </div>
                        <div class="card-body">
                            <input type="text" name="coupon" id="coupon" placeholder="Enter your discount coupon" class="form-control mb-2">
                            <button type="button" class="btn btn-outline-success" id="btnSubmit">Submit</button>
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
    include('Toaster/ToasterOptions.php');
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#btnSubmit").click(function(){
                let coupon = $("#coupon").val();
                if(coupon=='')
                {
                    toastr.error("Please enter your discount coupon","Error occured!");
                }
                else
                {
                    if(localStorage.getItem("current_coupon"))
                    {
                        if(localStorage.getItem("current_coupon")==coupon)
                        {
                            toastr.success("Now you will get 20% discount.","Discount Given!");
                            $("#coupon").val("");
                        }
                        else
                        {
                            toastr.error("Invalid discount coupon");
                        }
                    }
                    else
                    {
                        toastr.error("Invalid discount coupon.","Error occured!");
                    }
                }
            });
        });
    </script>
  </body>
</html>