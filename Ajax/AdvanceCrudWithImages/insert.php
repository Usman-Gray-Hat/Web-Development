<?php
include('dbConnect.php');
extract($_POST);
// Accessing HTML Field's values through their field's name.
$name = $_POST['name'];
$age = $_POST['age'];
$fees = $_POST['fees'];

// For image
$image_name = $_FILES['image']['name'];
$image_temp_name = $_FILES['image']['tmp_name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$folder = "images/".$image_name; //Folder location with image name

// Validation For Image Type Or Format
if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
{
    // Validation for image size
    if($image_size<=1000000)
    {
        $query = "insert into students (name,age,fees,image_path) values('$name','$age','$fees','$folder')";
        mysqli_query($conn,$query);
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
?>