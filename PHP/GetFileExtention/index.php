<?php
include('dbConfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>File Records</title>
</head>
<style>
    *{
        font-family: sans-serif;
        font-size: 13px;
    }
</style>
<body>
    <!-- Bootstrap Grid System -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                    <!-- Form -->
                    <form action="index.php" method="post" enctype="multipart/form-data">
                    <!-- Image -->
                    <input type="file" name="image" class="mt-2" required> <br>
                    <!-- Submit Button -->
                    <input type="submit" value="Submit" name="submitBtn" class="btn btn-outline-primary mt-2">
                    </form>
            </div>
        </div>
    </div>

    <?php
    
    if(isset($_POST['submitBtn']))
    {
        // For Image Name
        $image_name = $_FILES['image']['name'];
        echo "File name is: ".$image_name;
        echo "<br>";
    
        // Get File Extension
        $extension = substr(strchr($image_name,"."),1);
        echo "File extension is: ".$extension;
        echo "<br>";
    
        // Rename File 
        $image_name = "UsmanDocument".".".$extension;
        echo "File name after renaming is: ".$image_name;
        echo "<br>";
    }
    
    ?>

</body>
</html>