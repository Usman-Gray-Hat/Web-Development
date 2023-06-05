<?php
include('dbConnect.php');
extract($_POST);
if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['fees']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $fees = $_POST['fees'];

    $image_name = $_FILES['image']['name'];
    $image_temp_name = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    
    $folder = "images/";

    // Validation For Image type / format
    if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
    {
        // Validation for image size
        if($image_size<=1000000)
        {
            $folder = $folder.$image_name;
            $query = "insert into STUDENTS (NAME,AGE,FEES,IMAGE_PATH) values ('$name','$age','$fees','$folder')";
            mysqli_query($conn,$query);
            move_uploaded_file($image_temp_name,$folder);
        }
        else
        {
            // image size should not be larger than 1MB. 
        }
    }
    else
    {
        // invalid image format 
    }
}
?>