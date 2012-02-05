<?php
 
  if (isset($_POST['username']))
  {
  	 $password = $_POST['password'];
     $name = $_POST['username'];
 	 echo $name;
 	 echo $password;
   
  }else{
    echo 'Hasnt been set';
  }
 
?>