<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Must Add This CDN For Using Eye Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  </head>
  <style>
.password-container{
  width: 100%;
  position: relative;
}
.password-container input[type="password"],
.password-container input[type="text"]{
  width: 100%;
  padding: 12px 36px 12px 12px;
  box-sizing: border-box;
}
.fa-eye{
  position: absolute;
  top: 19%;
  right: 4%;
  cursor: pointer;
  color: lightgray;
}
  </style>
  <body>

      <!-- Using Bootstrap Grid System -->
      <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-5 mx-auto">

            <!-- Using Bootstrap Card -->
            <div class="card">


                <!-- Card Header For Heading -->
                <div class="card-header">
                    <h1 class="text-center" style="font-weight:bold; letter-spacing:2px;">LOGIN FORM</h1>
                </div>


                <!-- Card Body -->
                <div class="card-body">


                <!-- Form Started -->
                <form action="" method="post">


                <!-- Username -->
                <input type="text" name="username" placeholder="Enter Username" value="<?php if(isset($_SESSION['u'])) { echo $_SESSION['u']; } ?>" class="form-control" required>
                <br>


                <!-- Password Container -->
                <div class="password-container">  
                <!-- Password -->
                <input type="password" name="password" placeholder="Enter Password" value="<?php if(isset($_SESSION['p'])) { echo $_SESSION['p']; } ?>" id="password" class="form-control" required>
                <!-- Eye Icon --> <i class="fa-solid fa-eye" id="eye"></i>
                <br>
                </div>

                <input type="checkbox" name="RememberMe" <?php if(isset($_SESSION['p'])) { ?> checked <?php } ?> >
                <label for="" style="font-weight:bold">Remember me</label>


                <!-- Login Button -->
                <input type="submit" value="Login" name="loginBtn" class="btn btn-outline-info btn-block">
                <br>
                    </form>
                </div>
            </div>
            </div>
        </div>
      </div>

      <?php
      if(isset($_POST['loginBtn']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username=="usman123" && $password=="GrayHat")
        {
            // Generating Login Token
            $_SESSION['token'] = MD5(rand());

            // For Remember Functionality
            if(isset($_POST['RememberMe']))
            {
                $_SESSION['u'] = $username;
                $_SESSION['p'] = $password;
            }
            else
            {
                unset($_SESSION['u']);
                unset($_SESSION['p']);
            }

            $_SESSION['username'] = $username; //Storing Username in Session so we can use it later in home page with the Welcome Message.
            header("Location:home.php");
        }
      }

      ?>

    <!-- Script For Showing Password Through Eye Icon -->
    <script>
    const passwordField = document.querySelector("#password");
    const eyeIcon= document.querySelector("#eye");
    eyeIcon.addEventListener("click", function(){
    this.classList.toggle("fa-eye-slash");
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    })
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>