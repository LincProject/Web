<?php
	// Capture variables
	$map_id = $_GET['id'];
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
	$chat_id = getChatId();
	// Define query.
	$getMessages = "SELECT * FROM messages WHERE chat_id = '$chat_id' ORDER BY date_sent LIMIT 15";
	// Result query.
	$messageResults = mysql_query($getMessages);
	if(mysql_affected_rows() == 1)
	{
		while($row = mysql_fetch_array($messageResults))
		{
			echo $row['account_id']. " (" .$row['date_sent']. ") : " .$row['message']. "<br />";
		}
	}else
		{
			echo 'No messages posted yet!';
		}
?>