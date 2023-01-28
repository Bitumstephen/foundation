<?php

// Define some constants
define( "RECIPIENT_NAME", "bitum stephen" );
define( "RECIPIENT_EMAIL", "bitumstephen288@gmail.com" );


// Read the form values
$success = false;
$userName = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$userPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$userSubject = isset( $_POST['subject'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $userName && $senderEmail && $userPhone && $userSubject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $userName . "";
  // $headers = "From: " . $senderEmail . "\r\n" . "Reply-To: " . $senderEmail . "\r\n" . "X-Mailer: PHP/" . phpversion();
  $msgBody = " Name: ". $userName . " Email: ". $senderEmail . " Phone: ". $userPhone . " Subject: ". $userSubject . " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );
  // $success = mail( $recipient, $userSubject, $msgBody, $headers );

  //Set Location After Successsfull Submission
  header('Location: contact.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
}

?>