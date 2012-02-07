<?php
    /* 			
    	**** This file has been created by Phillip Heels.
    	**** It is evidence that a task to create a div, from another one is functuional.
    	**** It is not the completed solution to the MindMap, just provides the workings on creating a div.
    	
    	*** This code cannot be used / submitted without the full permission of Phillip Heels.	 	
   
 	*/
 	
   include ('../includes/classes/Page.php'); 
   
   $page = new Page ('MultiMind - Creating div', 'header2');
?>
<style>
#node {

}

<script>
jQuery.fn.center = function () {
 this.css("position","absolute");
 this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
 this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
 return this;
}
  var nodeText = 'Node Example';
  
  alert ('Hello');

</script>

<div id="node">afasf</div>