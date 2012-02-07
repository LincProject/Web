<?php 
     /*
    	***** This code/Page has been written by Phillip Heels
    	***** Whom, holds all the rights to this file.
    	***** None of code OR content can be used without his/her permission.
    	**** -- Unless: For open source purposes. 
    
    
    */
   if(isset($_POST['submitted']))
   {
      include ('../includes/classes/Account.php');
      
   	  $user = new Account();
   	  
   	  $username = $_POST['username'];
   	  $password = $_POST['password'];
   	  
   	  $user->_username($username);
   	  $user->_password($password);
   	  
   	  if($user->_errors())
      {
        $errors = $user->show_errors();
        
        echo '<b><font color="red">There are some errors:</font></b>';
        
        foreach($errors AS $error)
        {
           echo '<li>' .$error. '</li>';
        } 
        form();  
      }
      
      if($user->_login())
      {
         echo 'Yes';
      }else{
        echo 'Wrong username or password';
      }
   	  
   }else{
   	echo 'Submitted in an error';
   }    
 
 

?>