<?php
session_start();
include('dbConnect.php');
if($_SESSION['USER_ID']==null)
{
    header("Location:index.php");
}
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
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-5 mx-auto">

            <!-- Bootstrap Card -->
            <div class="card">
                <div class="card-header text-center" style="font-weight:bold;">
                    CHANGE PASSWORD
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <!-- Old Password -->
                        <label for="" style="font-weight:900">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter Current Password" required>
                        

                        <!-- New Password -->
                        <label for="" style="font-weight:900">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter New Password" required>
                        

                        <!-- Confirm Password -->
                        <label for="" style="font-weight:900">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Re-Enter Password" required>

                        <!-- Show Passowrd -->
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" onclick="Show()" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1" style="font-weight:900">Show Password</label>
                        </div>

                        <!-- Update Button -->
                        <input type="submit" value="Update" name="UpdateBtn" onclick="return Check()" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php
     
     if(isset($_POST['UpdateBtn']))
     {

        //  Only the user who logged in have right to change his/her password
         if(isset($_SESSION['USER_ID']))
         {

            //  taking user ID in id variable from Session object which was created when he logged in. 
             $id = $_SESSION['USER_ID'];


            //  Query to fetch all data of that specific user
             $query1 = "select * from USERS where ID='$id'";


            //  Storing fetch data into result variable
             $result = mysqli_query($conn,$query1);


            //  Converting fetch data into Associative array
             $data = mysqli_fetch_assoc($result);

             if(mysqli_num_rows($result)==1)
             {

                //  Storing field values in php variables
                 $old_password = MD5($_POST['old_password']);
                 $new_password = MD5($_POST['new_password']);
                 $confirm_password = MD5($_POST['confirm_password']);


                //  Comparing Current password with Old Password
                 if($old_password == $data['PASSWORD'])
                 {

                    // Comparing New Password with Confirm Password
                     if($new_password == $confirm_password)
                     {
                        //  Update Query
                         $query2 = "update USERS set PASSWORD='$new_password' where ID='$id'";

                        //  Executing query
                         $exec = mysqli_query($conn,$query2);
                         if($exec==true)
                         {
                            echo "<script> alert('Password updated successfully!')
                            window.location.href='home.php' </script>";
                         }
                         else
                         {
                            echo "<script> alert('Password not updated :( ') </script>";
                         }
                     }
                     else
                     {
                        echo "<script> alert('New Password and Confirm Password is not identical!') </script>";
                     }
                 }
                 else
                 {
                    echo "<script> alert('Your current password is invalid!') </script>";
                 }
             }
         }
     }
     
     ?>

       <!-- Show Password -->
       <script>
        function Show()
        {
            var old_pass = document.getElementById("old_password");
            var new_pass = document.getElementById("new_password");
            var confirm_pass = document.getElementById("confirm_password");
            if(old_pass.type=="password" && new_pass.type=="password" && confirm_pass.type=="password")
            {
                old_pass = old_pass.type="text";
                new_pass = new_pass.type="text";
                confirm_pass = confirm_pass.type="text";
            }
            else
            {
                old_pass = old_pass.type="password";
                new_pass = new_pass.type="password";
                confirm_pass = confirm_pass.type="password";
            }
        }
    </script>

    <!-- <script>
        function Check()
        {
            var new_pass = document.getElementById("new_password");
            var confirm_pass = document.getElementById("confirm_password");
            if(new_pass.value!=confirm_pass.value)
            {
                alert('New Password and Confirm Password is not identical!!');
                return false;
            }
            else
            {
                return true;
            }
        }
    </script> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>