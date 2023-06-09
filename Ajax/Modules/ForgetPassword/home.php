<?php
include("dbConnect.php");
if(!isset($_SESSION['user']))
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
    <title>Home</title>
    <style>
        *{
            font-family: sans-serif;
            font-size: 14px;
        }
        h1{
            font-weight:900;
            letter-spacing:1px;
        }
    </style>
</head>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <h1 class="jumbotron text-center bg-dark text-white">HOME PAGE</h1>
                <a href="logout.php" class="btn btn-outline-danger mb-2">Logout</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <a href="about.php" class="btn btn-outline-info">Next Page</a>
            </div>
        </div>
    </div>
</body>
</html>