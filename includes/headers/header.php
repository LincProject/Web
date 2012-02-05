<?php
ob_start();
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

<script>
$(document).ready(function () {
$('.userBar').click(function () {
                                      
  if($('#user').is(":visible")) {
    $('#user').toggle();
}else{
  $('#user').show();
}
});
$('.masting').draggable({ cancel: 'button' });

 $('.bttSign').click(function()
 {
     var txt = $('#username').val();
     var pass = $('#password').val();
     var submit = $('#submitted').val();

     if(!txt)
     {
        alert ('You have not submitted a valid username');
     }else if(!pass){
       alert ('You have not submitted a valid password');
	 }else{
	   $.post('http://multimind.lincoln.ac.uk/users/login', {username: txt, password: pass, submitted: submit}, function(data){
	   
	   if(data == 'Yes')
	   {
	   	 window.location.reload(true); 
	   }else{
	     alert ('Wrong username / password');
	     alert (data);
	   }
	 });
	}
 
 });

});

</script>


</head>

<body>
   
    <header id="header-wrap" role="banner">

		<hgroup class="brand" role="brand">
			MultiMind
		</hgroup>

	 <nav class="navigation" role="navigation">
	 <a href="/index" class="home">Home</a>
	 <a href="/about" class="about">About</a>
	 <a href="/documentation" class="document">Documentation</a>
	 <a href="/contact" class="contact">Contact us</a>
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
	<?php 
	if($mast_point == 1)
	{
	?>
	<section class="mast" role="middle Section">
	    <aside class="masting">
	     <h1 class="mastHeading"><?php echo $mast; ?></center></h1> 
	    </aside>
	</section>
   	<?php
   	}else if($mast_point == 0){
   	?>
   	<?php
   	}
   	?>
   	
  <section class="main" role="main content">
  

<div id="user">

<?php
  if(!isset($_SESSION['user_id']))
  { 
        echo '<form method="post">';
     	echo '<input type="text" name="username" id="username" placeholder="Username">';
     	echo '<input type="password" name="password" id="password" placeholder="Password">';
     	echo '<button class="bttSign" type="button">Sign in</button>';
     	echo '<input type="hidden" id="submitted" name="submitted" value="TRUE" /><br /><br />';
     	echo '<a href="users/signup" class="newUser">New to MultiMind?</a><br />';
     	echo '<a href="/users/forgot" class="forgot">Forgot your password?</a>';
     	echo '</form>';
  }else{
    echo '<a href="/portal" class="portal">Portal</a>';
    
  }
 
?>
</div>


