<?php
	/*
		This class has been written by Phillip Heels for the School of Computer Science for a group project.
		Please do not use this class for any other purpose than listed. For help, contact me (phillipheels@googlemail.com)
	*/
	
	class Person {
	
		protected $nickname;
		protected $ip;
		protected $visted;
		protected $browser;
	
		public function setNick($theNick)
		{	
			$this->nickname = $theNick;	
		}
		
		public function setIP()
		{
			$this->ip = $_SERVER['REMOTE_ADDR'];	
		}
		
		public function setVisited()
		{
			$this->visted = $this->nickname;	
		}
		
		public function setBrowser()
		{
			$this->browser = $_SERVER['HTTP_USER_AGENT'];
		}
	
		public function getNick()
		{
			return $this->nickname;
		}	
		
		public function getIP()
		{
			return $this->ip;
		}
		
		public function getVisited()
		{
			return $this->visited;
		}
		
		public function getBrowser()
		{
			return $this->browser;
		}
	}
	

?>