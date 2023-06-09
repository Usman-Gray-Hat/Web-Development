<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include("uploades/PHPMailer.php");
include("uploades/Exception.php");
include("uploades/SMTP.php");

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $file_name = $_FILES['file']['name'];
    $file_temp_name = $_FILES['file']['tmp_name'];
    $folder = "files/".$file_name;
    if($file_name!='')
    {
        $attachmentmsg = "<h4> Attachment is attached below </h4>";
        move_uploaded_file($file_temp_name,$folder);
    }
    else
    {
        $attachmentmsg = "";
    }

    $mail = new PHPMailer();

    // SMTP Config
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";

    // Credentials
    $mail->Username = "usmanhameed1790@gmail.com";
    $mail->Password = "YourAppPassword"; // Must add your App Password
    $mail->setFrom("usmanhameed1790@gmail.com","Unilever");

    // Content
    $mail->Subject = $subject;
    $mail->Body = "Hey <b> $name </b> ! $message <br> $attachmentmsg";
    $mail->addAttachment($folder);
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->addAddress($email);
    $exec = $mail->send();
    if($exec==true)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
}
?>