<?php
  include ('includes/classes/Page.php');
  $contact = new Page('MultiMind - Contact Us', 'header');
?>

<div class="grid_1">

	<h1>Contact Us!</h1>

	<p>
		Contact MultiMind's team of developers.<br />
		Fields marked with a * are mandatory.
	</p>

	<form id="ContactForm" name="ContactForm" method="post" action="processContact.php">

		<p>
			<label for="Name">Your Name *</label><br />
			<input type="text" id="Name" name="Name" maxlength="50" size="60" font="Veranda">
		</p>
		
		<p>
			<label for="EmailFrom">Email Address *</label><br />
			<input type="text" id="EmailFrom" name="EmailFrom" maxlength="80" size="60" font="Veranda">
		</p>
		
		<p>
			<label for="About">Enquiry About *</label><br />
			<select id="About" name="About">
				<option value="Please Choose a Option" selected="selected">Please Select an Option</option>
				<option value="Compliants">Complaints</option>
				<option value="Improvements">Improvements</option>
				<option value="Feedback">Feedback</option>
				<option value="User Help">User Help</option>
			</select>
		</p>
		
		<p>
			<label for="Comments">Comments *</label><br />
			<textarea name="Comments" id="Comments" maxlength="1000" cols="47" rows="10" font="Veranda"></textarea>
		<p>
		
		<p>
			<input type="submit" name="submit" id="submit" value="Submit">
			<input type="reset" name="reset" id="reset" value="Reset">
		</p>
			
	</form>
	
	<!-- jQuery script to validate the entered details (client side validation) -->
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#submit').click(function()
			{	
				// Bring in variables to function.
				var Name = $("#Name").val();
				var EmailFrom = $("#EmailFrom").val();
				var Comments =  $("#Comments").val();
				
				// Check there is data in "Name", "EmailFrom" and "Comments".
				if(!Name)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered your Name.');
				}
				if(!EmailFrom)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered your Email Address.');
				}
				if(!Comments)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered any Comments.');
				}
			});
		});
	</script>
</div>