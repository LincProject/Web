<?php
  include ('includes/classes/Page.php');
  include ('includes/classes/Account.php');
  $portal = new Page('MultiMind - Portal', 'header');
  $account = new Account();
  
  if(!$account->_checkAuth())
  {
  	 echo '<div class="grid_1 error">';
  	 echo '<p>You must be signed in order to view this page!</p>';
  	 die();
  }
 
?>

<div class="grid_1">


</div>

