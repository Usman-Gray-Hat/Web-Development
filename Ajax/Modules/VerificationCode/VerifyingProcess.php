<?php
include("dbConnect.php");
if(isset($_POST['code']) && isset($_POST['code'])!='')
{
    $code = $_POST['code'];
    $query = "select * from verification_codes where codes='$code'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);

    // Validation For If Verification Code Exist.
    if($row>0)
    {
        // Validation For Verification Code Expiration
        if($data['status']==1)
        {
            // Creating Session For Later Use And Update Password Page Authorization. 
            $_SESSION['Verified'] = $code;
            echo "Correct Code";
        }
        else
        {
            echo "Code Expired";
        }
    }
    else
    {
        echo "Incorrect verificaiton code";
    }
}
?>
