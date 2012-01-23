<?php 
    include ('Form.php');
	function _main()
	{
		$data = array(
		  	text=>'name',
		    text=>'email',
		    password=>'password'
		);
		
		$f = new Form('post', '[CURRENT_DIR]', $data);
		
	}
	
	_main();
	
?>