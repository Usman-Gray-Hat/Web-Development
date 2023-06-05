<?php
session_start();
include('dbConnect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Bootstrap Grid System -->
    <div class="container" style="margin-top:200px;">
        <div class="row">
            <div class="col-md-5 mx-auto" style="-webkit-box-shadow: 0px 0px 12px 2px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 12px 2px rgba(0,0,0,0.75);
box-shadow: 0px 0px 12px 2px rgba(0,0,0,0.75);">
<br>
            <!-- Bootstrap Card -->
            <div class="card bg-dark">
                <div class="card-header text-center text-white" style="font-weight:bold;">
                    <h1 style="font-weight:900; letter-spacing:2px;">LOGIN FORM</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <!-- Username -->
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                        <br>

                        <!-- Password -->
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>

                        <!-- Show Passowrd -->
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" onclick="Show()" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label text-white" for="inlineCheckbox1" style="font-weight:900">Show Password</label>
                        </div>

                        <!-- Login Button -->
                        <input type="submit" value="LOGIN" style="letter-spacing:2px; font-weight:900" name="LoginBtn" class="btn btn-outline-primary btn-block">
                    </form>
                    
                    <div class="card-footer text-center text-white">
                        <h6 style="font-weight:900; letter-spacing:2px;">DESIGNED BY USMAN HAMEED</h6>
                    </div>
                </div>
            </div>
            <br>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['LoginBtn']))
    {
        $username = $_POST['username'];
        $password = MD5($_POST['password']);

        $query = "select * from USERS where USERNAME='$username' and PASSWORD='$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        $data = mysqli_fetch_assoc($result);
        if($row==1)
        {
            $_SESSION['USER_ID'] = $data['ID'];
            $_SESSION['NAME'] = $data['NAME'];
            echo "<script> alert('Login successful!');
            window.location.href='home.php';
            </script>";
        }
        else
        {
            echo "<script> alert('Invalid username or password') </script>";
        }

    }
    ?>

    <!-- Show Password -->
    <script>
        function Show()
        {
            var pass = document.getElementById("password");
            if(pass.type=="password")
            {
                pass = pass.type="text";
            }
            else
            {
                pass = pass.type="password";
            }
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>