<?php
include('dbConnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Delete</title>
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
      
  <?php
$DeletedId = $_GET['id']??"";
$query1 = "select * from USERS where ID='$DeletedId'";
$result = mysqli_query($con,$query1);
$data = mysqli_fetch_assoc($result);

$img = $data['IMAGE_PATH'];

// deleting record from table
$query2 = "delete from USERS where ID='$DeletedId'";
$exec = mysqli_query($con,$query2);
if($exec==true)
{
    // removing image from folder
    unlink($img);
    echo "
    <script>
    swal.fire({
    title: 'Record Deleted',
    text: 'Record has been removed',
    icon: 'success',
    confirmButtonColor: 'blue',
    timer: 1500
    }).then(function() {
    window.location.href='Retrieval.php';
    });
    </script>";
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>