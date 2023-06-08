<?php
include('dbConnect.php');
session_start();
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
    <title>Home</title>
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
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center text-uppercase" style="font-weight:900; letter-spacing:1px;">This is home page</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
        <div class="col-md-12">
            <a class="btn btn-danger float-right text-white" id='logoutbtn' onclick="confirmLogout()">Logout</a>
        </div>
        </div>
    </div>

    <script type="text/javascript">
        function confirmLogout()
        {
            swal.fire({
                title: 'Confirm?',
                text: 'Are you sure you want to logout right now?',
                icon: 'question',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonColor: 'red',
                confirmButtonColor: 'blue',
                allowOutsideClick: false,
            }).then((result) => {
                if(result.isConfirmed)
                {
                    window.location.href='logout.php';
                }
            });
        }
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>