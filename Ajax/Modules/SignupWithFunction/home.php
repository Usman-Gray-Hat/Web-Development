<?php
include('dbConfig.php');
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Home</title>
</head>
<style>
    *{
        font-family:sans-serif;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome <?php echo $_SESSION['name']; ?> !</h1>
                <br> <br>
                <a href="logout.php" class="btn btn-outline-danger" onclick="return confirmLogout()">Logout</a>
            </div>
        </div>
    </div>

    <script>
        function confirmLogout()
        {
            return confirm("Are you sure you want to logout?");
        }
    </script>
</body>
</html>