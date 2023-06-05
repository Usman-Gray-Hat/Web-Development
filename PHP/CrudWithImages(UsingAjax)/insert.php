<?php
include('dbConnect.php');
/*
Now, we will get HTML Field's values with the help of their respective field's name
*/

$name = $_POST['name'];
$age = $_POST['age'];
$fees = $_POST['fees'];

// For images
$image_name = $_FILES['image']['name'];
$image_temp_name = $_FILES['image']['tmp_name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];

/*
Note: $_FILES return values in array format.
      $_FILES return four values,
      (1) File name (key name = 'name')
      (2) File temporary name (key name = 'tmp_name')
      (3) File type or format (key name = 'type')
      (4) File size (key name = 'size') 
*/

// Storing folder location
$folder = "images/";

// Validation For Image Type
if(strtolower($image_type)=='image/png' || strtolower($image_type)=='image/jpg' || strtolower($image_type)=='image/jpeg')
{
    // Validation For Image Size
    if($image_size<=1000000)
    {
        $folder = $folder.$image_name;
        $query = "insert into student (name,age,fees,image_path) values('$name','$age','$fees','$folder')";
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
    // Image format not supported.
}
?>