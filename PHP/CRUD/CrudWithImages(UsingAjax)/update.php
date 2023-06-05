<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['hidden_id']) && isset($_POST['update_name']) && isset($_POST['update_age']) && isset($_POST['update_fees']))
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
$qry = "select * from student where id='$id'";
$result = mysqli_query($conn,$qry);
$data = mysqli_fetch_assoc($result);
$old_image = $data['image_path'];

        // If user uploads a new image during updation.
        if(is_uploaded_file($_FILES['update_image']['tmp_name']))
        {
            // Validation For Image Type Or Format
            if(strtolower($image_type)=='image/png' || strtolower($image_type)=='image/jpg' || strtolower($image_type)=='image/jpeg')
            {
                // Validation For Image Size
                if($image_size<=1000000)
                {
                    $query = "update student set name='$name',age='$age',fees='$fees',image_path='$folder' where id='$id'";
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
            $query1 = "update student set name='$name',age='$age',fees='$fees',image_path='$old_image' where id='$id'";
            mysqli_query($conn,$query1);
        }
}

?>