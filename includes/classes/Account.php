<?php
session_start();
 class Account {
 
 	 protected $user_id;
 	 protected $username;
 	 protected $email;
 	 protected $password;
 	 protected $ativated;
 	 protected $date_registered;
 	 protected $error = array();
 	  
 	 public function _username($theName)
 	 {
 	    if(empty($theName))
 	    {
 	       $this->error[0] = 'You have not entered a username';
 	       return false;
 	    }
 	   
 	    if(preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $theName))
 	    {
 	       $this->username = $theName;
 	       return true;
 	   }else{
 	     $this->error[1] = 'Your username is not valid.';
 	   }
 	   
 	   return $theName;  
 	 }
 	 
 	 public function _email($theEmail)
 	 { 
 	    if(empty($theEmail))
 	    {
 	       $this->error[2] = 'You have not entered your email address';
 	       return false;
 	    }
 	    
 	    if(eregi('^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$', $theEmail))
 	    {
 	       $this->email = $theEmail;
 	       return true;
 	    }else{
 	      $this->error[3] = 'Your email address is not valid';
 	      return false;
 	    }
 	    
 	    //return $theEmail;
 	 }
 	   
 	 public function _password($thePassword)
 	 {
 	    if(empty($thePassword))
 	    {
 	       $this->error[4] = 'You have not entered your password';
 	       return false;	
 	    }else{
 	      $this->password = $thePassword;
 	      return true;
 	    }
 	    return $thrPassword;
 	 }
 	 
 	 public function _checkPass($pass1, $thePassword2)
 	 {
 	    if($pass1 == $thePassword2)
 	    {
 	      return true;
 	    }else{
 	      $this->error[5] = 'Your passwords do not match';
 	    }
 	 
 	 }
 	 
 	 public function _errors()
 	 {
 	    if(!empty($this->error))
 	    {
 	       return true;
 	  }else{
 	    return false;  
 	  }
 	 
 	 }
 	 
 	 public function show_errors()
 	 {
 	    return $this->error;
 	 
 	 }
 	 
 	 public function _checkUsername($name)
 	 {
 	    $username = "SELECT username FROM Accounts WHERE username='$name'";
 	    $usernameRes = mysql_query($username) or trigger_error(mysql_error());
 	    if(mysql_affected_rows() == 1)
 	    {
 	       return true;
 	    }else{
 	      return false;
 	    }
 	   
 	 }
 	 
 	 public function _checkEmail($email)
 	 {
 	    $username = "SELECT email FROM Accounts WHERE email='$email'";
 	    $usernameRes = mysql_query($username) or trigger_error(mysql_error());
 	    if(mysql_affected_rows() == 1)
 	    {
 	       return true;
 	    }else{
 	      return false;
 	    }
 	   
 	 }
 	 
 	 public function _checkBan()
 	 {
 	 	$ban = "SELECT user_id FROM bans WHERE user_id='{$_SESSION['user_id']}";
 	 	$banRes = mysql_query($ban);
 	 	if(mysql_affected_rows() == 1)
 	 	{
 	 	  return true;
 	 	}else{
 	 	 return false;
 	 	}
 	 
 	 }
 	 
 	 public function _forgotPassword($theEmail, $id="")
 	 {
 	 	if(empty($theEmail))
 	 	{
 	 	   // error message!
 	 	   
 	 	}else if(isset($id)){
 	 	  
 	 	
 	 	}
 	 	
 	 	
 	 }
 	 public function _checkAuth()
 	 {
 	 	if(isset($_SESSION['user_id']))
 	 	{
 	 	  return true;
 	 	}else{
 	 	  return false;
 	 	}
 	 }
 	 
 	 public function _registerForm()
 	 {
 	  	echo '<form method="post" action="">';
  	 	echo '<label for="username">Username: *</label>';
  	 	echo '<input type="text" name="username" class="rounded"><br />';
  	    echo '<label for="email">Email: *</label>';
  	 	echo '<input type="text" name="email" class="rounded"><br />';
  	 	echo '<label for="password">Password: *</label>';
  	
  	 	echo '<input type="password" name="password1" class="rounded"><br />';
  	 
  	 	echo '<label for="confirm">Confirm Password: *</label>';
  	 	echo '<input type="password" name="password2" class="rounded"><br />';
  	 	echo '<input type="submit" name="submit" id="submit" class="registerBttn" value="Sign up!">';
  	 	echo '<input type="hidden" name="submitted" value="TRUE">';
  	 	echo '<input type="submit" name="reset" class="registerBttn" value="Reset!">';
  
  	}
  	
  	 public function _loginForm()
  	 {
     echo '<form method="post" action="">';
     echo '<label for="username">Username: *</label>';
  	 echo '<input type="text" name="username" class="rounded"><br />';
  	 echo '<label for="password">Password: *</label>';
  	 echo '<input type="password" name="password" class="rounded"><br />';
     
     echo '<input type="submit" name="submit" id="submit" class="registerBttn" value="Sign up!">';
  	 echo '<input type="hidden" name="submitted" value="TRUE">';
  	 echo '<input type="submit" name="reset" class="registerBttn" value="Reset!">';
   }


 	 public function _register()
 	 { 
 	  
 	    $register = "INSERT INTO Accounts (username, email, password, date_registered) VALUES ('$this->username', '$this->email', md5('$this->password'), NOW())";
 	    $registerRes = mysql_query($register) or trigger_error(mysql_error());
 	    if(mysql_affected_rows() == 1)
 	    {
 	       $activation = md5(uniqid(rand(), true));
 	       $email = "Hello, $this->username!\n\n Thank you for signing up to MultiMind. Now that you're a member, you can sign into the site and use all the cool features that we have to offer. Please note that some 				    of the features may not work until you have activated your account (For security reasons!) It's simple to do though! Just click on the link contained in this email.\n http://										multimind.lincoln.ac.uk/users/activate.php?id=" .mysql_insert_id(). "&y=$activation We hope you enjoy your time here, and you do not encounter any problems whilst using our services. If however you do, 					you can use our contact page at: http://multimind.lincoln.ac.uk/contact\n\n Thanks again, Phillip (Head Programmer)\n\n\n DO NOT reply to this email, otherwise, you'll be waiting a long time for 					a reply ;)";
 	     
 	       mail($this->email, 'From: accounts@multimind.lincoln.ac.uk', 'Welcome to MultiMind', $email);
 	       return true;
 	    }else{
 	      echo 'There seems to be a problem.';
 	      return false;
 	    }
 	 
 	 }
 	 public function _login()
 	 {
 	 	if(empty($this->username) || empty($this->password))
 	 	{
 	 		echo 'You haven\'t entered your username/password';
 	 	}
 	 	
 	 	
 	 	$signin = "SELECT account_id, email, username, password FROM Accounts WHERE username='$this->username' AND password=md5('$this->password')";
 	 	$result = mysql_query($signin) or trigger_error(mysql_error());
 	 	if(mysql_affected_rows() == 1)
 	 	{
 	 	   $_SESSION['username'] = $this->username;
 	 	   
 	 	   while($row = mysql_fetch_array($result))
 	 	   {
 	 	   	  $_SESSION['user_id'] = $row['account_id'];
 	 	   	  $_SESSION['email'] = $row['email'];
 	 	   }
 	 	   return true;
 	 	}else{
 	 	  return false;
 	 	}
 	 }
 	 
 	 
 	 
 }
?>