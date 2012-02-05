<?php
    /*
    	***** This code/Page has been written by Phillip Heels
    	***** Whom, holds all the rights to this file.
    	***** None of code OR content can be used without his/her permission.
    	**** -- Unless: For open source purposes. 
    
    
    */
  class Connect {
    	
      protected $host;
      protected $user;
      protected $password;
      protected $connected;
      protected $database;
      protected $error = array();
      
      protected $allowed = array(
         1=>'multimin_admin',
         2=>'multimin_admin2'
      );
       
      public function __construct($theHost="", $theUser="", $thePassword="", $theDatabase="")
      {
      	  $this->host = $this->_host($theHost);
      	  $this->user = $this->_user($theUser);
      	  $this->password = $this->_password($thePassword);
      	  $this->database = $this->_database($theDatabase);
      	  
      	  $this->connected = $this->_connect();
      	  $this->_errors();
      }
      
      public function _host($theHost="")
      {
      	 if(empty($theHost))
      	 {
      	   $this->error[0] = 'Error: You have not provided a valid host';
      	   return 0;
      	 }else if($theHost != "localhost")
      	 {
      	     $this->error[1] = 'Error: The site administrator has disabled hosts that are not <b>localhost</b>';
      	     return 0;
      	 }
      	 
      	 return $theHost;
      }
      
      public function _user($theUser="")
      {
      	 if(empty($theUser))
      	 {
      	    $this->error[2] = 'Error: You have not provided a valid username';
      	    return 0;
      	 }else if(!in_array($theUser, $this->allowed))
      	 {
      	     $this->error[3] = 'Error: You have provided a incorrect username';
      	     return 0;
      	 }
      	 return $theUser;
      } 
      
      public function _password($thePassword="")
      {
      	 if(empty($thePassword))
      	 {
      	 	$this->error[4] = 'You have not provided a password';
      	 	return 0;
      	 }
      	 return $thePassword;
      }
      
      public function _database($theDatabase="")
      {
      	 if(empty($theDatabase))
      	 {
      	    $this->error[5] = 'You have not provided a valid database name';
      	 }
      	 
      	 return $theDatabase;
      	  
      }
      
      public function _connect()
      {
      	 $this->connected = mysql_connect($this->host, $this->user, $this->password);
      	 if($this->connected)
      	 {
      	 	$database = mysql_select_db($this->database);
      	 	if(!$database)
      	 	{
      	 	   $this->error[6] = 'Database <b>' .$this->database. '</b> does not exist';
      	 	   return 0;
      	 	
      	 	}
      	    return true;
      	 }else{
      	   $this->error[7] = "Cannot connect. Please contact the site administrator!";
      	   return 0;
      	 }
      	
      }
      
      public function _errors()
      {
      	  if(($this->error))
      	  {
      	  	 echo '<font color="red">There are errors:<br /></font>';
      	  	 foreach($this->error as $errors)
      	  	 {
      	  	     echo '<li>' .$errors . '<br />';
      	  	 
      	  	 }
      	  }else{
      	  }
      
      }
      
      
  
  }

?>