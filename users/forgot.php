<?php
   /*	
   		Page: forgot.php
   		Module by: Chirag Tailor
   		Description:
   		
   		The page has two stages:
   		1)
   			- The user is asked to enter their email addresss
   			- The System then checks to see if the email exists (Use function in "Accounts class"
   				
   				
   				***** EXAMPLE *****
   				if $user->_checkEmail($email)
 				   retrun true
 				else
 				   return false
 				endif
   				
   			- If the email address exists, they are sent an email containing a link.
   		
   		2) 
   			- If an id is present (this is an md5 encrypted of the users id)
   			- The password will be reset (again, use md5 and rand())
   			- And email will be sent with the temp password.
   
   */
   
   include ('../includes/classes/Page.php'); 
   include ('../includes/classes/Account.php');
   
   $user = new Account();
   $page = new Page ('MultiMind - Forgot Password', 'header');
   
   function form()
   {	
	  echo '<form method="post" action="">';
	  echo '<label for="email">Email: *</label>';
	  echo '<input type="text" name="email" class="rounded" value=""><br />';	
	  echo '<input type="submit" name="submit" id="submit" class="registerBttn" value="Reset Password">';
  	  echo '<input type="hidden" name="submitted" value="TRUE">';
   }
?>

<div class="grid_1"><h1>Forgot your password?</h1>
<p>If you have forgotten your password, you can easily reset your password to a temporary password.</p>
<p>In order to reset your password, you need to enter your email address below. This should be the email address you signed up with.</p>
<?php
	$id = stripcslashes($_GET['id']);
	$email = $_GET['email'];
  	
    if(empty($id)) // Check to see if the id is empty
    {
    	if(!isset($_POST['submitted'])) // check to see if the form hasn't been submitted
    	{
    	    form();
    	}else{
    	  
    	  // the form has been submitted
    	  // Make a new variable "user_id"
    	  
    	  $user_id = md5($user->_getUserID($_POST['email']));
    	  $e = $_POST['email'];
    	
    	  // Now that you have the users ID, and you have encrypted it,
    	  // you should now send an email using (mail) to the user
    	  // asking them to click on a link: multimind.lincoln.ac.uk/users/forgot.php?id=$user_id&email=$e
    	
    	  // Leave this in. DO NOT remove this!
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
    	}
    	
   
    }
    if(!empty($id) || (!empty($email)))
    {
        if(!preg_match('#[0-9a-f]{32}#i', $id))
        {
           echo '<div class="gird_1 error">Error: Not a valid ID</div>';
           exit();	 
        }
      	// In here, you should change the password USING UPDATE to a new temp password (provided)
      	
        $temp_password = substr(md5(uniqid(rand(), 1)), 3, 10);
        
        // use something like this:
        // $update = "UPDATE Accounts SET password=md5('$temp_password') WHERE email='$e'
        // send them an email with their temp password
        
      
    }


?>