<?php
  $error_listing = array(
  1=> 'insufficient includes in order to complete accurate output. Vital (include) files may be missing.' 
  );

?>
<html>
<head>
<title>Ooops! Something has happened =(</title>
<LINK REL=StyleSheet HREF="http://multimind.lincoln.ac.uk/includes/headers/style_1.css" TYPE="text/css" MEDIA=screen>
</head>
<body>
<div class="grid_1 error">
<center><b>Something has broke!</b></center>
<p>Something bad has happened! We're working really hard to fix it and we will be back soon! </p>
<p>Apologies for any inconvenience this has caused you! </p>
<p>
<?php
  $d = date_default_timezone_set('Europe/London');
  echo '<b>Predefined error: (' . date_default_timezone_get() . ')</b> ';
  foreach($error_listing as $error => $key)
  {
     echo $key;
     echo ': <br /><br /> ERROR CODE: ' . $error;
  
  }

?>
</p>
</div>

</body>
