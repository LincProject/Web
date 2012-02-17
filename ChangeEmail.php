<!--(Ref. AL)-->

<?php
  include ('includes/classes/Page.php');
  $ChangeEmail = new Page('MultiMind :: Change Your Email Address?', 'header');
?>

<div class="grid_1">

	<h1>Want To Change Your Registered Email Address?</h1>
	
	<p>
		Changing your registered email address is easy!<br />
		Simply fill in the form below and click "Change Email Address".
	</p>
	
	<form id="ChangeEM" name="ChangeEM" method="post">
		
		<p>
			<label for="Name">Username *</label><br />
			<input type="text" id="userName" name="userName" maxlength="50" size="28" font="Veranda" disabled="disabled" value="<?php echo $_SESSION['username']; ?>"  />
		</p>
		<p>
			<label for="currentEm">Current Email Address *</label><br />
			<input type="text" id="currentEm" name="currentEm" maxlength="50" size="30" font="Veranda" value=""  />
		</p>
		<p>
			<label for="newEm">New Email Address *</label><br />
			<input type="text" id="newEm" name="newEm" maxlength="50" size="30" font="Veranda" value=""  />
		</p>
			<label for="confirmNewEm">Confirm New Email Address *</label><br />
			<input type="text" id="confirmNewEm" name="confirmNewEm" maxlength="50" size="30" font="Veranda" value=""  />
		<p>
		<p>
			<input type="submit" name="submit" id="submit" value="Change Email Address" class="registerBttn">
			<input type="reset" name="reset" id="reset" value="Reset" class="registerBttn">
		</p>
	
	</form>
	
	<script type="text/javascript">
		$(document).ready(function()
		{
			// Client Side Validation
			$('#submit').click(function()
			{
			    var userName = $('#userName').val();
				var currentEm = $('#currentEm').val();
				var newEm = $('#newEm').val();
				var confirmNewEm = $('#confirmNewEm').val();
				
				// Check there is data in "currentEm".
				if(!currentEm)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered your current email address.');
				}
				// Check there is data in "newEm".
				if(!newEm)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered your new email address.');
				}
				// Check there is data in "cofirmNewEm".
				if(!confirmNewEm)
				{
					// Throw alert box with message.
					alert ('You haven\'t confirmed your new email address.');
				}
				// Check "newEm" and "confirmNewEm" match.
				if(newEm != confirmNewEm)
				{
					// Throw alert box with message.
					alert ('Your new email addresses don\'t match.');
				}
				// Check "currentEm" and "NewEm" don't match.
				if(currentEm == newEm)
				{
					// Throw alert box with message.
					alert ('You\'ve entered the same email addresses.');
				}
				
				// If sucessful post to "ProcessForgotPW.php"
			    $.post('ProcessChangeEmail.php', {userName: userName, currentEm: currentEm, newEm: newEm, confirmNewEm: confirmNewEm}, function(data){
					if(data == 'Yes')
					{
						alert ('Your email address has been changed.');
					}
					else
						{
							alert ('Your email address hasn\'t been changed.');
						}
				});
			});
		});
	</script>
	
</div>