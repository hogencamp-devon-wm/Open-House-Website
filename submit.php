<?php
// Check for empty fields
if(empty($_POST['name'])  		||
    empty($_POST['email']) 	    ||
    empty($_POST['subject']) 	||
    empty($_POST['category'])	||
    empty($_POST['message'])	    ||
    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
    echo "No arguments Provided!";
    return false;
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$category = $_POST['category'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'youremailhere@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "	You have received a new message from your website contact form.
				\n\n"."Here are the details:
				\n\nName: $name
				\n\nEmail: $email
				\n\nSubject: $subject
				\n\nCategory: $category
				\n\nMessage: $message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $subject";
mail($to,$email_subject,$email_body,$headers);
return true;
?>