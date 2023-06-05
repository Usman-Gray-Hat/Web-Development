<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['hidden_id']))
{
    $id = $_POST['hidden_id'];
    $name = $_POST['update_name'];
    $age = $_POST['update_age'];
    $fees = $_POST['update_fees'];


// For Image
$image_name = $_FILES['update_image']['name'];
$image_temp_name = $_FILES['update_image']['tmp_name'];
$image_type = $_FILES['update_image']['type'];
$image_size = $_FILES['update_image']['size'];
$folder = "images/".$image_name;

// For checking if the image is already exist
$qry = "select * from students where ID='$id'";
$result = mysqli_query($conn,$qry);
$data = mysqli_fetch_assoc($result);
$old_image = $data['IMAGE_PATH'];

        // If user uploads a new image during updation.
        if(is_uploaded_file($_FILES['update_image']['tmp_name']))
        {
            // Validation For Image Type Or Format
            if(strtolower($image_type)=='image/png' || strtolower($image_type)=='image/jpg' || strtolower($image_type)=='image/jpeg')
            {
                // Validation For Image Size
                if($image_size<=1000000)
                {
                    $query = "update students set NAME='$name',AGE='$age',FEES='$fees',IMAGE_PATH='$folder' where ID='$id'";
                    mysqli_query($conn,$query);
                    move_uploaded_file($image_temp_name,$folder);
                    unlink($old_image);
                }
                else
                {
                    // Image size should not be larger than 1MB.
                }
            }
            else
            {
                // Image format not supported.
            }
        }
        else
        {
            // If user doesn't upload a picture during updation.
            $query1 = "update students set NAME='$name',AGE='$age',FEES='$fees',IMAGE_PATH='$old_image' where ID='$id'";
            mysqli_query($conn,$query1);
        }
}

?>