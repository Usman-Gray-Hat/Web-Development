<?php
include('dbConnection.php');
session_start();
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
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Sweet Alert 2 CDNs -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <script src="dist/sweetalert2.all.min.js"> </script>
  </head>
  <body>

  <!-- Using Bootstrap Grid Sytem -->
    <div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-5 mx-auto" style="-webkit-box-shadow: 0px 1px 11px 3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 1px 11px 3px rgba(0,0,0,0.75);
box-shadow: 0px 1px 11px 3px rgba(0,0,0,0.75);">

                <!-- Login Form -->
                <form action="" method="post">
                <br>

                <!-- Form Heading -->
                <h1 class="text-center" style="font-weight:999">LOGIN FORM</h1>

                <!-- Email -->
                <input type="text" name="email" placeholder="Enter Email" class="form-control" required value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
                <br>

                <!-- Password -->
                <input type="password" name="password" placeholder="Enter Password" class="form-control" id="pass" required value="<?php if(isset($_COOKIE['password'])) { $decrypt = base64_decode($_COOKIE['password']); echo $decrypt; } ?>">
                <br>

                <!-- Show Password -->
                <input type="checkbox" onclick="ShowPassword()">
                <label>Show Password</label>
                <br>

                <!-- Remember Me -->
                <input type="checkbox" name="RememberMe" <?php if(isset($_COOKIE['email'])){ ?> checked <?php } ?>>
                <label>Remember Me</label>
                
                <!-- Login Button -->
                <input type="submit" value="Login" name="LoginBtn" class="btn btn-info btn-block">

                <!-- Signup Button -->
                <a href="Signup.php" class="btn btn-success btn-block">Register Yourself</a>

                <!-- Button For Viewing Records -->
                <a href="Retrieval.php" class="btn btn-warning btn-block">View records</a>
                <br>
            </form>
        </div>
    </div>
    </div>

    <?php
    
     if(isset($_POST['LoginBtn']))
     {
         $email = $_POST['email'];
         $password = $_POST['password'];

         $query = "select * from USERS where email='$email' and PASSWORD='$password'";
         $result = mysqli_query($con,$query);

         $data = mysqli_fetch_assoc($result);
         $totalRow = mysqli_num_rows($result);

         if($totalRow==1)
         {
             $_SESSION['Name'] = $data['FNAME'];
             echo "
                    <script>
                    swal.fire({
                    title: 'Login Successfull!',
                    text: 'Welcome ".$_SESSION['Name']."!',
                    icon: 'success',
                    confirmButtonColor: 'blue',
                    timer:3000
                    }).then(function() {
                    window.location.href='Home.php';
                    });
                    </script>";
             if(isset($_POST['RememberMe']))
             {
                //  For sending password in encrypted form in cookies.
                 $encrypt = base64_encode($password);

                 setcookie('email',$email,time()+60*60*1000);
                 setcookie('password',$encrypt,time()+60*60*1000);

             }
             else
             {
                setcookie('email','',time()-60*60*1000);
                setcookie('password','',time()-60*60*1000);
             }
         }
         else
         {
            echo "
            <script>
            swal.fire({
                title: 'Login Failed!',
                text: 'Email or Password is invalid',
                icon: 'error',
                confirmButtonColor: 'blue'
            });
            </script>";
         }
     }
    ?>

    <!-- Using Javascript for Show Password -->
    <script>
        function ShowPassword()
        {
            var pass = document.getElementById("pass");
            if(pass.type == "password")
            {
                pass.type = "text";
            }
            else
            {
                pass.type = "password";
            }
        }
    </script>
  </body>
</html>