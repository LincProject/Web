<!--(Ref. AL)-->

<?php

	$userName = $_POST['userName'];
	$currentEm = $_POST['currentEm'];
	$newEm = $_POST['newEm'];
	$confirmNewEm = $_POST['confirmNewEm'];
	
	include('/includes/classes/Accounts.php');
	
	$a = new Account();
	
	if($a->_changeEmail($currentEm, $newEm))
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
	
	public function _changeEmail($currentEm, $newEm)
	{
		$query = "SELECT email, username FROM Accounts WHERE password=('$this->email') AND username='$userName'";
		$result = mysql_query($query);
		
		if(mysql_affected_rows() == 1)
		{
			$update = "UPDATE Accounts SET password=('$this->email') WHERE username = '{$_SESSION['username']}'";
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