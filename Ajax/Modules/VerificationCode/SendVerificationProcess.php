<?php
include("dbConnect.php");
include("PhpMailerConfig.php");
if(isset($_POST['email1']) && isset($_POST['email1'])!='')
{
    $email = $_POST['email1'];
    $query = "select * from users where email='$email'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    // For Extracting Users's Name
    $data = mysqli_fetch_assoc($result);
    $name = $data['name'];

    if($row>0) // Validation For If Email Exist.
    {
        // Creating Session for later use.
        $_SESSION['UserEmail'] = $email;

        // Generating Five Digits Verification Code
        $verification_code = mt_rand(10000,90000);

        // Sending Verification Code Through Mail.
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Subject = "Verification Code For Password Recovery";
        $mail->Body = "Hey <b> $name </b>! Here is your verification code <br>
        Verification Code: $verification_code";
        $mail->addAddress($email);
        $sendMail = $mail->send();
        if($sendMail==true)
        {
            $query2 = "insert into verification_codes (codes) values ('$verification_code')";
            $exec = mysqli_query($conn,$query2);
            echo "Email sent";
        }
        else
        {
            echo "Email not sent";
        }
    }
    else
    {
        echo "Email does not exist";
    }
}
?>