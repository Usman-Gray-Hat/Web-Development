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
   $folder = "images/".$image_name; // Folder Location with image name

   // For Old Image
   $query = "select * from students where id='$id'";
   $result = mysqli_query($conn,$query);
   $data = mysqli_fetch_assoc($result);
   $old_image = $data['image_path'];

// If user update a record by uploading the new image
if(is_uploaded_file($_FILES['update_image']['tmp_name']))
{
    // Validation for image type OR format
    if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
    {
        // Validation for image size
        if($image_size<=1000000)
        {
            $query1 = "update students set name='$name',age='$age',fees='$fees',image_path='$folder' where id='$id'";
            mysqli_query($conn,$query1);
            unlink($old_image);
            move_uploaded_file($image_temp_name,$folder);
        }
        else
        {
            // Image size should not be larger than 1MB.
        }
    }
    else
    {
        // Invalid image format
    }
}
else
{
    // If user update a record without uploading the new image
    $query2 = "update students set name='$name',age='$age',fees='$fees' where id='$id'";
    mysqli_query($conn,$query2);
}    

}
?>