<?php
include('dbConnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Signup</title>
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

      <!-- Using Bootstrap Grid System -->
      <div class="container" style="margin-top:100px;">
          <div class="row">
              <div class="col-md-5 mx-auto" style="-webkit-box-shadow: 0px 1px 11px 3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 1px 11px 3px rgba(0,0,0,0.75);
box-shadow: 0px 1px 11px 3px rgba(0,0,0,0.75);">

                  <!-- Signup Form -->
                  <form action="" method="post" enctype="multipart/form-data">
                  <br>

                  <!-- Form Heading -->
                  <h1 class="text-center" style="font-weight:999">REGISTER YOURSELF HERE</h1>

                  <!-- First Name -->
                  <input type="text" name="fname" placeholder="Enter First Name" class="form-control" required>
                  <br>

                  <!-- Last Name -->
                  <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required>
                  <br>
                  
                  <!-- Age -->
                  <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
                  <br>
                  
                  <!-- Gender -->
                  <label>Male</label>
                  <input type="radio" name="gender" value="Male">
                  
                  <label>Female</label>
                  <input type="radio" name="gender" value="Female">
                  <br>
                  
                  <!-- City -->
                  <select name="city" class="form-control" required>
                      <option value="">Select City</option>
                      <option value="Karachi">Karachi</option>
                      <option value="Lahore">Lahore</option>
                      <option value="Islamabad">Islamabad</option>
                      <option value="Peshawar">Peshawar</option>
                    </select>
                    <br>
                    
                    <!-- Email -->
                    <input type="text" name="email" placeholder="Enter Email" class="form-control" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
                    <br>

                    <!-- Password -->
                    <input type="password" name="password" placeholder="Enter Password" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="pass" required>
                    <br>

                    <!-- Confirm Password -->
                    <input type="password" name="cpassword" placeholder="Re-Enter Password" class="form-control" id="cpass" required>

                    <!-- Image -->
                    <br>
                    <input type="file" name="image" required>
                    <br><br>
                    
                    <!-- Signup Button -->
                    <input type="submit" value="Signup" name="SignupBtn" class="btn btn-primary btn-block" onclick="return Compare()">
                    
                    <!-- View Records Button -->
                    <a href="Login.php.php" class="btn btn-info btn-block">Already have an account</a>
                    
                    <!-- Button For Veiwing Records -->
                    <a href="Retrieval.php" class="btn btn-success btn-block">View records</a>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['SignupBtn']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // For User Image
        $image = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];

        // Image type validation
        if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
        {
            // Image size  validation
            if($image_size<=1000000)
            {
                $folder = "images/".$image;
                $query = "insert into USERS values(Null,'$fname','$lname','$age','$gender','$city','$email','$password','$folder')";
                $exec = mysqli_query($con,$query);
                if($exec==true)
                {
                    // Moving image from temporary folder to images folder.
                    move_uploaded_file($image_temp_name,$folder);
                    echo "
                        <script>
                        swal.fire({
                            title: 'Registration Successfull',
                            text: 'Your account has been created!',
                            icon: 'success',
                            confirmButtonColor: 'blue',
                            timer:3000
                        });
                        </script>";
                }
                else
                {
                    echo "<script>
                swal.fire({
                title: 'Registration Failed!',
                text: 'Your account is not created',
                icon: 'error',
                confirmButtonColor:blue 
            });
            </script>";
                }
            }
            else
            {
                echo "<script>
                swal.fire({
                title: 'Too Big Image!',
                text: 'Your image size should be less than 1MB',
                icon: 'error',
                confirmButtonColor:blue 
            });
            </script>";
            }
        }
        else
        {
            echo "<script>
            swal.fire({
                title: 'Invalid Format',
                text: 'This format is not supported',
                icon: 'error',
                confirmButtonColor:blue 
            });
            </script>";
        }
    }
    ?>

    <!-- Using Javascript for Comparing Password and Confirm Password -->
    <script>
        function Compare()
        {
            var pass = document.getElementById("pass");
            var cpass = document.getElementById("cpass");
            if(pass.value!=cpass.value)
            {
                alert('Password and Confirm Password is not identical');
                return false;
            }
            else
            {
                return true;
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