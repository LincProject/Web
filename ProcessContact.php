<?php

// If a Email Address was entered.
if(isset($_POST['EmailFrom']))
{
	$EmailTo = "adam.lighton@live.co.uk";
	$EmailSubject = "Enquiry : Project MultiMind";
	
	// Function : died - Returns an error code if there are submission errors.
	function Error($error)
	{
		  include ('includes/classes/Page.php');
		  $error = new Page('MultiMind :: Error!', 'header');
		  
		  echo "<div class=\"grid_1\">
					<h1>Errors Found</h1>
					Sorry, we have found some errors!<br /><br />
					Please resolve these errors.<br /><br />
				</div>";

		  die();
	}

	// Test user filled in required elements, if not call "Error" Function to notify them.
	if(!isset($_POST['Name']) || !isset($_POST['EmailFrom']) || !isset($_POST['About']) || !isset($_POST['Comments'])) 
	{
		Error('There appears to be a problem with the details you entered.');
	}
	
	// Populate variables with data from "Enquiry.php".
	$Name = $_POST['Name'];
	$EmailFrom = $_POST['EmailFrom'];
	$About = $_POST['About'];
	$Comments = $_POST['Comments'];

	$error_message = "";
	
	// Validate entry of a "Name".
	$string_exp = "^[a-z .'-]+$";
	if(!eregi($string_exp,$Name))
	{
		$error_message .= 'The Name you entered isn\'t valid.<br />';
	}
	
	// Validate entry of an "EmailFrom".
	$email_exp = "^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$";
	if(!eregi($email_exp,$EmailFrom))
	{
		$error_message .= 'The Email Address you entered isn\'t valid.<br />';
	}
	
	// Validate entry of "Comments".
	$string_exp = "^[A-Z0-9._%-]";
	if(!eregi($string_exp,$Comments))
	{
		$error_message .= 'The Comments you entered aren\'t valid.<br />';
	}

	// If errors have been call "Error" Function.
	if(strlen($error_message) > 0)
	{
		Error($error_message);
	}
	
	// Add Email Title in "EmailBody".
	$EmailBody = "Project MultiMind Enquiry.\n\n";

	// Function "CleanString" - Used to populate "EmailBody".
	function clean_string($string)
	{
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
	}

	// Write Email Body.
	
	$EmailBody .= "Customer.......: ".clean_string($Name)."\n\n";
	$EmailBody .= "E-Mail.........: ".clean_string($EmailFrom)."\n\n";
	$EmailBody .= "About..........: ".clean_string($About)."\n\n";
	$EmailBody .= "Comments.......: ".clean_string($Comments)."\n\n";

	// Create Email Headers.
	$headers = 'From: '.$EmailFrom."\r\n".
			   'Reply-To: '.$EmailFrom."\r\n" .
			   'X-Mailer: PHP/' . phpversion();
	
	@mail($EmailTo, $EmailSubject, $EmailBody, $headers);
	
	// Create Confirmation Email
	
		$HostSender = "info@multimind.lincoln.ac.uk";
		$HostReply = $EmailTo;
		
		// Create Email Headers.
		$headers1 = 'From: '.$HostSender."\r\n".
					'Reply-To: '.$HostReply."\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
		$EmailSubject1 = "Enquiry : Project MultiMind";
		$ConfirmEmailBody = "Project MultiMind Enquiry.\n\n";
		
		$ConfirmEmailBody .= "Thankyou for your enquiry.\n\n";
		$ConfirmEmailBody .= "A member of the team will be in touch shortly!";
		
		@mail($EmailFrom, $EmailSubject1, $ConfirmEmailBody, $headers1);
	
	
?>

<?php
}
?>

<?php
  include ('includes/classes/Page.php');
  $contact = new Page('MultiMind :: Thankyou for your enquiry', 'header');
?>

<div class="grid_1">

	<h1>Thankyou!</h1>

	<p>
		Thanks for your enquiry, we'll be in touch soon!
	</p>
</div>