<?php

      /*
    	***** This code/Page has been written by Phillip Heels
    	***** Whom, holds all the rights to this file.
    	***** None of code OR content can be used without his/her permission.
    	**** -- Unless: For open source purposes.   
    */
    session_start();
    DEFINE ('HEADER_PATH', '/home/multimin/public_html/includes/headers/'); 
    class Page {
        
    	protected $title;
    	protected $header_loc;
    	protected $heading;
    	protected $header_point = 0;
    	protected $id;
    	public function __construct($theTitle="", $theHeader="", $theHeading="", $theID="")
    	{	
    		$this->heading = $this->_heading($theHeading);
    		$this->title = $this->_title($theTitle);
    		$this->header_loc = $this->_header($theHeader);
    		$this->id = $this->_id($theID);
    		
    			$this->build();
    	}
   	
   		public function _heading($theHeading)
   		{	
   			if(empty($theHeading))
   			{
   				$this->header_point = 0;
   			}else{
   			  $this->header_point = 1;
   			return $theHeading;
   		   }
   		}
   		public function _title($theTitle)
   		{
   			if(empty($theTitle))
    		{
    			echo 'Error: You have not provided a page title';	
    		}
    		
    		if($theTitle == "[DYNAMICALLY ASSIGN]")
    		{
    		  $this->title = $this->_dynamically();
    		}
    		return $theTitle;
   		}
   		
   		public function _header($theHeader)
   		{
   			if(empty($theHeader))
    		{
    		   echo 'Error: You have not provided a header location';
    		}
    		
    		$headerFile = (string) HEADER_PATH . $theHeader . ".php";
    		
    		if(file_exists($headerFile))
    		{
    			return $headerFile;
    		}else{
    		  echo '<font color="red"><b>Error:</b>Cannot find specified Header Location</font>';
    		  return 0;
    		}
    		   
   		}
   		public function _id($theID)
   		{
   		
   		}
   		public function build()
   		{	
   			echo $id;
   			// declare local variables
   			$mast_point = $this->header_point; 
   			$mast = $this->heading;
   			$page_title = $this->title;
   			include ($this->header_loc);
   		}
   
    }	
?>
    
