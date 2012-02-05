
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
     var password = $('#password').val();
     
     if(!txt)
     {
        alert ('You have not submitted a valid username');
     }else if(!password){
       alert ('You have not submitted a valid password');
	 }else{
	   $.post('includes/headers/login.php', {username: txt}, function(data){
	 });
	}
 
 });

