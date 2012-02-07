<?php	
      /*
    	***** This code/Page has been written by Phillip Heels
    	***** Whom, holds all the rights to this file.
    	***** None of code OR content can be used without his/her permission.
    	**** -- Unless: For open source purposes. 
    
    
    */
    include ('../includes/classes/Page.php');  
    include ('../includes/classes/Account.php');    
    $page = new Page('MultiMind - Create an Account', 'header');
?>
<div class="grid_1">
<h1>Sign up!</h1> 
<p>Please complete the form below to sing up to MultiMind. Once you have signed up, you can access all the cool features!</p>

<?php
  $acc = new Account();
  if($acc->_checkAuth())
  {
  	 echo '<div class="error">';
  	 echo '<p>You cannot create another account when you are signed in!</p>';
	 die();  
  }
  if(!isset($_POST['submitted']))
  {
  	 $acc->_registerForm();
     
  }else{
   
    $acc->_username($_POST['username']); // set the username
    $acc->_email($_POST['email']); // set the email
    
    if($acc->_checkPass($_POST['password1'], $_POST['password2']))
    {
    	$acc->_password($_POST['password1']);
    }
    
    if($acc->_errors())
    {
        $errors = $acc->show_errors();
        
        echo '<b><font color="red">There are some errors:</font></b>';
        
        foreach($errors AS $error):
         echo '<li>' .$error. '</li>';
        endforeach;
        $acc->_registerForm();  
      
    }else{
    
    if($acc->_register())
    {
       echo 'Thank you. An email has been sent to ' .$_POST['email']. ' please read it!';
    }else{
      echo 'There seems to be an error';
      exit();
    }
    }  
  }

?>

</div>