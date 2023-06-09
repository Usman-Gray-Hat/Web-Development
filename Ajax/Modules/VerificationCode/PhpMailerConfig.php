<?php
// Using PHPMailer Libraries
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Including PHPMailer required files
include("PHPMailer/PHPMailer.php");
include("PHPMailer/SMTP.php");
include("PHPMailer/Exception.php");

// PHPMailer Instance
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
$mail->setFrom("usmanhameed1790@gmail.com","High Table Continental.Ltd Pvt");
?>