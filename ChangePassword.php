<!--(Ref. AL)-->

<?php
  include ('includes/classes/Page.php');
  $ChangePassword = new Page('MultiMind :: Change Your Password?', 'header');
?>

<div class="grid_1">

	<h1>Want To Change Your Password?</h1>
	
	<p>
		Changing your MultiMind account password is easy!<br />
		Simply fill in the form below and click "Change Password".
	</p>
	
	<form id="ChangePW" name="ChangePW" method="post">
		
		<p>
			<label for="Name">Username *</label><br />
			<input type="text" id="userName" name="userName" maxlength="50" size="28" font="Veranda" disabled="disabled" value="<?php echo $_SESSION['username']; ?>"  />
		</p>
			<label for="currentPw">Current Password *</label><br />
			<input type="password" id="currentPw" name="currentPw" maxlength="50" size="30" font="Veranda" value=""  />
		<p>
		</p>
			<label for="newPw">New Password *</label><br />
			<input type="password" id="newPw" name="newPw" maxlength="50" size="30" font="Veranda" value=""  />
		<p>
		</p>
			<label for="confirmNewPw">Confirm New Password *</label><br />
			<input type="password" id="confirmNewPw" name="confirmNewPw" maxlength="50" size="30" font="Veranda" value=""  />
		<p>
		<p>
			<input type="submit" name="submit" id="submit" value="Change Password" class="registerBttn">
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
				var currentPw = $('#currentPw').val();
				var newPw = $('#newPw').val();
				var confirmNewPw = $('#confirmNewPw').val();
				
				// Check there is data in "currentPw".
				if(!currentPw)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered your current password.');
				}
				// Check there is data in "newPw".
				if(!newPw)
				{
					// Throw alert box with message.
					alert ('You haven\'t entered your new password.');
				}
				// Check there is data in "cofirmNewPw".
				if(!confirmNewPw)
				{
					// Throw alert box with message.
					alert ('You haven\'t confirmed your new password.');
				}
				// Check "newPw" and "confirmNewPw" match.
				if(newPw != confirmNewPw)
				{
					// Throw alert box with message.
					alert ('Your new passwords don\'t match.');
				}
				// Check "currentPw" and "NewPw" don't match.
				if(currentPw == newPw)
				{
					// Throw alert box with message.
					alert ('You\'ve entered the same passwords.');
				}
				
				// If sucessful post to "ProcessForgotPW.php"
			    $.post('ProcessChangePW.php', {userName: userName, currentPw: currentPw, newPw: newPw, confirmNewPw: confirmNewPw}, function(data){
					if(data == 'Yes')
					{
						alert ('Your password has been changed.');
					}
					else
						{
							alert ('Your password hasn\'t been changed.');
						}
				});
			});
		});
	</script>
	
</div>