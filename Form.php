<?php
	/**
		Form creation and validation class. Created and developed by Phillip Heels.
		Available on Github, Fork and add your own customisations to it.
	
		Basic form creation and pull class. 
		
		Note: This is just basic, and, not fully completed. Other forms 
		(that require 'multi-select' will have its own class and will inherit to/from this one.
	*/
	
	class Form {
		
		private $values = array();
		private $errors = array();
		
		private $method;
		private $action;
		private $encrypt = false;
	
			public function __construct($theMethod, $theAction, $values)			{
				 if(!class_exists('Form'))
				 {
					 $this->show_error('The form was initalised wrong!');
				 }
					
				 if(!function_exists('main'))
				 {
				     $this->show_error('Main does not exist');
				 }
				
				 $this->method = $this->_method($theMethod);
				 $this->action = $this->_action($theAction);	 			 
				 // Start to build the form 
				 echo $this->_initalise();
				
			}
			
			public function _initalise()
			{
				$initaliser = "";
				
				if($this->encrypt)
				{ 
			  	  $initaliser = '<form method="' .$this->method. '" action="' .$this->action. '" encrypt="multipart/form-date">';
				}else{
				   $initaliser = '<form method="' .$this->method. '" action="' .$this->action. '">';
				} 
				return $initaliser;
			}
			public function _method($theMethod)
			{
				if(empty($theMethod))
				{
					echo 'No method';
				}else{
					
				  switch($theMethod)	
				  {
					   case 'post' : case 'POST':
							$this->method = 'post';
					   break;
					
					   case 'get' : case 'GET':
					       $this->method='get';
					   break; 
					
					   case 'request' : case 'REQUEST':
					       $this->method='request';
					   break;
					
					   case 'encrypte' : case 'ENCRYPTE':
					       $this->encrypt = TRUE;
					   break;
					
					   default: 
						  echo 'Unknown method';
						break;
				  }

				}
				return $this->method;
			}
			
			public function _action($theAction)
			{
				if(empty($theAction))
				{
					echo 'No action';
					
				}
				
				if($theAction == '[CURRENT_DIR]')
				{
					$this->action = $_SERVER['PHP_SELF'];
				}else{
					$this->action = $theAction;
					
				}
				return $this->action;
			}
			public function show_error($theError)
			{
				
				
			}
				
		
	}

?>