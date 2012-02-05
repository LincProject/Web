<?php
  
   include ('includes/classes/Connect.php');
   include ('includes/classes/Account.php');
   
   if(isset($_POST['submitted']))
   {
   	  $conn = new Connect('localhost', 'multimin_admin2', 'donkeykong101', 'multimin_mindmap');
   	  $user = new Account();
   	  
   	  $username = 'Phillip';
   	  $password = 'safsafaf';
   	  
   	  $user->_username($username);
   	  $user->_password($password);
   	  
   	  	if($user->_login())
   	  	{
   	  		echo 'Username is fine';
   	  	}else{
   	  	  echo 'Username is not fine';	
   	  	}
   	  	
   	  	
   	  	
   	  
   	  
   }
    
?>