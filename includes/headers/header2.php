<?php
  /*
    	***** This code/Page has been written by Phillip Heels
    	***** Whom, holds all the rights to this file.
    	***** None of code OR content can be used without his/her permission.
    	**** -- Unless: For open source purposes. 
    
    
    */
session_start();
?>
<!--[if IEMobile 7 ]><html class="no-js iem7" lang="en"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->

<html class="no-js not-ie" lang="en"><!--<![endif]-->
<head>
<title><?php echo $page_title; ?></title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<LINK REL=StyleSheet HREF="http://multimind.lincoln.ac.uk/includes/headers/style_1.css" TYPE="text/css" MEDIA=screen>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<?php
if(!isset($_SESSION['user_id']))
{
	echo '<div class="grid_1 error">';
	echo '<p><b>Error:</b>You have have to be signed in to view this page.</p>';
	exit();
}
?>

<script>
$(document).ready(function () {
$('.chatLink').click(function () {
                                      
  if($('#chatBox').is(":visible")) {
    $('#chatBox').toggle();
}else{
  $('#chatBox').show();
}
});

$('#chatInput').keydown(function(){
 
		alert('Your message has been sent (EXAMPLE)');	

});
//$('#chatBox').draggable({ cancel: 'button' });
});

</script>


</head>

<body>
   
    <header id="header-wrap" role="banner">

	  <hgroup class="brand" role="brand">
		 <a href="http://www.multimind.lincoln.ac.uk">MultiMind</a>
		 </hgroup>

	 	<nav class="navigation" role="navigation">
	 	<a href="/index" class="home">[BUTTON HERE]</a>
	 	<?php
	   	  if(!isset($_SESSION['user_id']))
	   	  {
	   	  	echo '<a href="#" class="userBar">Sign in</a>';
	   	}else{
	      echo "<a href='#' class='userBar'>Welcome, {$_SESSION['username']}</a>";
	   	}
	 	?>
	 </nav>
	</header>
   	
 	<div id="container">
	</div>
	
<div id="footer">
<a href="#" class="chatLink">Messages (#counter)</a>

</div>


