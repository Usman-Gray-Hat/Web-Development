<?php
include('dbConnect.php');
if(!isset($_SESSION['login-token']))
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
    <title>Portal Home Page</title>
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

    <!-- Bootstrap Grid System -->
    <div class="container" style="margin-top:20px;">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="text-center text-uppercase jumbotron" style="font-weight:900; letter-spacing:1px;">THIS IS HOME PAGE OF WEB PORTAL</h1>
            </div>
        </div>

        <!-- 2nd Row -->
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-danger float-right" onclick="logout()">Logout</button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">
        function logout()
        {
            swal.fire({
                title: "CONFIRMATION",
                text: "Are you sure you want to logout",
                icon: "question",
                confirmButtonColor: 'blue',
                confirmButtonText: 'Yes',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonColor: 'red',
                cancelButtonText: 'No',
                allowOutsideClick: false,
            }).then((result => {
                if(result.isConfirmed)
                {
                    window.location.href="logout.php";
                }
            }));
        }
    </script>
</body>
</html>