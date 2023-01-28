<?php

// Define the recipient email
define( "RECIPIENT_EMAIL", "bitumstephen288@gmail.com" );

// Read the form values
$success = false;
$userName = isset( $_POST['username'] ) ? $_POST['username'] : "";
$senderEmail = isset( $_POST['email'] ) ? $_POST['email'] : "";
$userPhone = isset( $_POST['phone'] ) ? $_POST['phone'] : "";
$message = isset( $_POST['message'] ) ? $_POST['message'] : "";

// If all values exist, send the email
if ( $userName && $senderEmail && $userPhone && $message) {
  $recipient =  RECIPIENT_EMAIL;
  $headers = "From: " . $userName . " <" . $senderEmail . ">\r\n";
  $msgBody = " Name: ". $userName . " Email: ". $senderEmail . " Phone: ". $userPhone . " Message: " . $message . "";
  $success = mail( $recipient, "New Contact Form Submission", $msgBody, $headers );

  //Set Location After Successsfull Submission
  header('Location: contact.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
}

?>
