<?php
	// Capture variables
	$map_id = $_GET['id'];
	$comment = $_POST['comment'];
	// Function to get the chat id
	function getChatId()
	{
		$chatid = "SELECT chat_id, map_id FROM chat WHERE map_id = '$map_id'";
		$chatResult = mysql_query($chatid);
		if(mysql_affected_rows() == 1)
		{
			$row = mysql_fetch_row($chatResult);
			$chat_id = $row[0];
			return $chat_id;
		}
	}	
	//Validate variables
	if(!$map_id || !is_numeric($map_id))
	{
		echo 'No numeric Map Id Specified';
	}
	if(!$comment)
	{
		echo 'You didn\'t enter a comment';
	}
	// Store chat id in $chat_id.
	$chat_id = getChatId();
	// Define query to insert.
	$addComment = "INSERT INTO messages (chat_id, account_id, message, date_sent)
			       VALUES '$chat_id','{$_SESSION['username']}','$comment', NOW()";
	// Insert comment details into database.
	$commentRes = mysql_query($addcomment);
	if(mysql_affected_rows() == 1)
	{
		echo 'Yes';
	}else
		{
			echo 'No';
		}
?>