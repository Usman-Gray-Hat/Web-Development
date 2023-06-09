<?php
include("dbConnect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include("PHPMailer/PHPMailer.php");
include("PHPMailer/Exception.php");
include("PHPMailer/SMTP.php");

if(isset($_POST['email2']) && isset($_POST['email2'])!='')
{
    $email = $_POST['email2'];
    $query = "select * from users where email='$email'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);

    if($row>0) // Validation for if email exist
    {
        $name = $data['name'];
        $_SESSION['RecoverEmail'] = $email;
        // Generating random token for authentication of recovering user password
        $_SESSION['token'] = MD5(rand());
        $token = $_SESSION['token'];
        if($token!='')
        {
            $query1 = "insert into tokens (token) values ('$token')";
            $exec = mysqli_query($conn,$query1);
        }

        // Creating instance of PHPMailer 
        $mail = new PHPMailer();

        // SMTP Configuration
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";

        // Credentials
        $mail->Username = "usmanhameed1790@gmail.com";
        $mail->Password = "Your-App-Password";
        $mail->setFrom("usmanhameed1790@gmail.com","Emerald Tech Solutions.Ltd Pvt");

        // Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Subject = "Recover Password";
        $mail->Body = "Hey <b>$name</b>! <br> 
        Here you can recover your password by clicking on the below link: <br>
        <a href='http://localhost/ForgetPassword/recoverPassword.php?token=$token'>
        http://localhost/ForgetPassword/recoverPassword.php?token=$token </a> ";

        $mail->addAddress($email);
        $sendEmail = $mail->send();
        if($sendEmail==true) 
        {
            echo $email;
        }
        else
        {
            echo 0;
        }
    }
    else
    {
        echo "email not exist";
    }
}
?>