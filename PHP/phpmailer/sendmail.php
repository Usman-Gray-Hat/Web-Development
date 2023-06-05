<?php
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Include required PHPMailer files
require 'uploades/PHPMailer.php';
require 'uploades/SMTP.php';
require 'uploades/Exception.php';

if(isset($_POST['btnSend']))
{
	if(isset($_FILES['image']))
	{
		$image_name = $_FILES['image']['name'];
		$image_temp_name = $_FILES['image']['tmp_name'];
		$image_size = $_FILES['image']['size']; //For validation if you need to validate size
		$image_type = $_FILES['image']['type']; //For validation if you need to validate type/format (png,jpg,jpeg,gif,docs,xls)

		// Attachment Location
		$folder = "img/".$image_name;
		// Moving Attachment from temporary memory to main folder location.
		move_uploaded_file($image_temp_name,$folder);
	}

	// Loading Form input values
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//Create instance of PHPMailer
	$mail = new PHPMailer();

	//Set mailer to use smtp
	$mail->isSMTP();

	//Define smtp host
	$mail->Host = "smtp.gmail.com";

	//Enable smtp authentication
	$mail->SMTPAuth = true;

	//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";

	//Port to connect smtp
	$mail->Port = "587";

	//Set gmail username (Sender Email)
	$mail->Username = "usmanhameed1790@gmail.com";

	//Set gmail password (App password only)
	$mail->Password = "YourGmailAppPassword";

	//Email subject
	$mail->Subject = $subject;

	//Set sender email
	$mail->setFrom('usmanhameed1790@gmail.com');

	//Enable HTML
	$mail->isHTML(true);

	//Attachment
	$mail->addAttachment($folder);

	//Email body
	$mail->Body = $message;

	//Add recipient
	$mail->addAddress($email);

	//Finally send email
	$exec = $mail->send();

	// Validate
	if ($exec==true) 
	{
		echo "<script> alert('Email sent successfully!'); </script>";
	}
	else
	{
		echo "<script> alert('Email not sent!'); </script>";
	}

	//Closing smtp connection
	$mail->smtpClose();
}
?>