<!--(Ref. AL)-->

<?php

	$userName = $_POST['userName'];
	$currentPw = $_POST['currentPw'];
	$newPw = $_POST['newPw'];
	$confirmNewPw = $_POST['confirmNewPw'];
	
	include('/includes/classes/Accounts.php');
	
	$a = new Account();
	
	if($a->_changePassword($currentPw, $newPw))
	{
		echo 'Yes';
	}
	else
		{
			echo 'No';
		}
	
	if($a->_errors())
	{
		foreach($a->show_errors() as $error):
			echo $error;
		endforeach;
	}
	
	public function _changePassword($currentPw, $newPw)
	{
		$query = "SELECT password, username FROM Accounts WHERE password=md5('$this->password') AND username='$userName'";
		$result = mysql_query($query);
		
		if(mysql_affected_rows() == 1)
		{
			$update = "UPDATE Accounts SET password=md5('$this->password') WHERE username = '{$_SESSION['username']}'";
			$result = mysql_query($update);
			
			if(mysql_affected_rows() == 1)
			{
				return true;
			}
			else
				{
					return false;
				}
		}
		else
		{
			return false;
		}
	}

?>