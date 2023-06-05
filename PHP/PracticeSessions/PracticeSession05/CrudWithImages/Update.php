<?php
session_start();
include('dbConnection.php');
if($_SESSION['AdminName']==null)
{
    header("Location:Login.php");
}

$UpdatedId = $_GET['id']??"";
$query = "select * from USERS where ID='$UpdatedId'";
$result = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($result);
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
    <!-- Sweet Alert CDN -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <script src="dist/sweetalert2.min.js"></script>
  </head>
  <body>

      <!-- Using Bootstrap Grid System -->
      <div class="container" style="margin-top:50px;">
          <div class="row">
              <div class="col-md-5 mx-auto" style="-webkit-box-shadow: 0px 1px 12px 2px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 1px 12px 2px rgba(0,0,0,0.75);
box-shadow: 0px 1px 12px 2px rgba(0,0,0,0.75);">

                      <!-- Form -->
                      <form action="" method="post" enctype="multipart/form-data">
                      <br>

                      <!-- Form Heading -->
                      <h1 class="text-center" style="font-weight:900">UPDATE FORM</h1>

                      <!-- Hidden Field For ID -->
                      <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">

                      <!-- Name -->
                      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $data['NAME']; ?>" required>
                      <br>

                      <!-- Age -->
                      <input type="number" name="age" placeholder="Enter Age" class="form-control" value="<?php echo $data['AGE']; ?>" required>
                      <br>

                      <!-- For Gender -->
                      <?php
                      if($data['GENDER']=="Male")
                      {
                          echo"
                          <label>Male</label>
                          <input type='radio' name='gender' value='Male' Checked>
                          <label>Female</label>
                          <input type='radio' name='gender' value='Female'>
                          <br>";
                      }
                      else if($data['GENDER']=="Female")
                      {
                        echo"
                        <label>Male</label>
                        <input type='radio' name='gender' value='Male'>
                        <label>Female</label>
                        <input type='radio' name='gender' value='Female' Checked>
                        <br>";
                      }
                      ?>

                      <!-- For City -->
                      <?php
                      if($data['CITY']=="Karachi")
                      {
                          echo"
                          <select name='city' class='form-control' required>
                          <option value=''>Select City</option>
                          <option value='Lahore'>Lahore</option>
                          <option value='Karachi' Selected>Karachi</option>
                          <option value='Islamabad'>Islamabad</option>
                          <option value='Peshawar'>Peshawar</option>
                          </select>
                          <br>";
                      }
                      else if($data['CITY']=="Lahore")
                      {
                        echo "
                        <select name='city' class='form-control' required>
                        <option value=''>Select City</option>
                        <option value='Lahore' Selected>Lahore</option>
                        <option value='Karachi'>Karachi</option>
                        <option value='Islamabad'>Islamabad</option>
                        <option value='Peshawar'>Peshawar</option>
                        </select>
                        <br>";
                      }
                      else if($data['CITY']=="Islamabad")
                      {
                        echo "
                        <select name='city' class='form-control' required>
                        <option value=''>Select City</option>
                        <option value='Lahore'>Lahore</option>
                        <option value='Karachi'>Karachi</option>
                        <option value='Islamabad' Selected>Islamabad</option>
                        <option value='Peshawar'>Peshawar</option>
                        </select>
                        <br>";
                      }
                      else if($data['CITY']=="Peshawar")
                      {
                        echo "
                        <select name='city' class='form-control' required>
                        <option value=''>Select City</option>
                        <option value='Lahore'>Lahore</option>
                        <option value='Karachi'>Karachi</option>
                        <option value='Islamabad'>Islamabad</option>
                        <option value='Peshawar' Selected>Peshawar</option>
                        </select>
                        <br>";
                      }
                      ?>

                      <!-- Hidden Field For Old Image -->
                      <input type="hidden" name="OldImage" value="<?php echo $data['IMAGE_PATH']; ?>">

                      <!-- For displaying Old image above on Image file controller -->
                      <?php
                      if($data['IMAGE_PATH']!="" && $data['IMAGE_PATH']!=null)
                      {
                          echo "<img src='$data[IMAGE_PATH]' width='60' height='60'>";
                      }
                      ?>
                      <br> <br>

                      <!-- Image File Controller -->
                      <input type="file" name="image">
                      <br> <br>

                      <!-- Update Button -->
                      <input type="submit" value="Update" name="UpdateBtn" class="btn btn-success btn-block">

                      <!-- Cancel Button -->
                      <a href="Retrieval.php" class="btn btn-danger btn-block">Cancel</a>
                      <br>
                  </form>
              </div>
          </div>
      </div>

      <?php
      if(isset($_POST['UpdateBtn']))
      {
          // Storing html field values in php variables
          $id = $_POST['id'];
          $name = $_POST['name'];
          $age = $_POST['age'];
          $gender = $_POST['gender'];
          $city = $_POST['city'];
          $OldImage = $_POST['OldImage'];

          // For image
          $image_name = $_FILES['image']['name'];
          $image_temp_name = $_FILES['image']['tmp_name'];
          $image_size = $_FILES['image']['size'];
          $image_type = $_FILES['image']['type'];

          // If update with image upload
          if(is_uploaded_file($_FILES['image']['tmp_name']))
          {

              // Validation for image format
              if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
              {

                  // Validation for image size
                  if($image_size<=1000000)
                  {
                      $folder = "images/".$image_name;
                      $query = "update USERS set NAME='$name', AGE='$age', GENDER='$gender', CITY='$city', IMAGE_PATH='$folder' where ID='$id'";
                      $exec = mysqli_query($con,$query);
                      if($exec==true)
                      {
                        echo"
                        <script>
                        swal.fire({
                            title: 'Updated!',
                            text: 'Data updated successfully',
                            icon: 'success',
                            confirmButtonColor: 'blue',
                            timer: 3000
                        }).then(function() {
                            window.location.href='Retrieval.php';
                        });
                        </script>";

                        // Moving image from temporary folder to actual folder
                        move_uploaded_file($image_temp_name,$folder);

                        // Removing old image from folder
                        unlink(realpath($OldImage));
                      }
                      else
                      {
                        echo "
                        <script>
                        swal.fire({
                            title: 'Update Error',
                            text: 'Data is not updated',
                            icon: 'error',
                            confirmButtonColor: 'blue',
                            timer: 3000
                        })
                        </script>";
                      }
                  }
                  else
                  {
                    echo "
                    <script>
                    swal.fire({
                        title: 'Too Large!',
                        text: 'Image size shoulde be less than 1MB',
                        icon: 'error',
                        confirmButtonColor: 'blue',
                        timer: 3000
                    })
                    </script>";
                  }
              }
              else
              {
                echo "
                <script>
                swal.fire({
                    title: 'Invalid Format!',
                    text: 'Format not supported',
                    icon: 'error',
                    confirmButtonColor: 'blue',
                    timer: 3000
                })
                </script>";
              }
          }
          else
          {
            // If update without image upload
            $query = "update USERS set NAME='$name', AGE='$age', GENDER='$gender', CITY='$city' where ID='$id'";
            $exec = mysqli_query($con,$query);
            if($exec==true)
            {
              echo "
              <script>
              swal.fire({
                  title: 'Updated!',
                  text: 'Data updated successfully',
                  icon: 'success',
                  confirmButtonColor: 'blue',
                  timer: 3000
              }).then(function() {
                  window.location.href='Retrieval.php';
              });
              </script>";
            }
            else
            {
              echo "
              <script>
              swal.fire({
                  title: 'Update Error',
                  text: 'Data is not updated',
                  icon: 'error',
                  confirmButtonColor: 'blue',
                  timer: 3000
              })
              </script>";
            }
        }
      }

      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>