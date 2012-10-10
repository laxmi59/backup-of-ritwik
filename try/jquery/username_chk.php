<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#username').blur(function username_check(){
		var username = $('#username').val();
		if(username == "" ){
			$('#username').css('border', '3px #CCC solid');
			$('#tick').hide();
		}else{
			jQuery.ajax({type: "POST",url: "username_include_chk.php",data: 'username='+ username,cache: false,
				success: function(response){
					if(response == 1){
						$('#username').css('border', '3px #FF0000 solid');
						$('#tick').hide();
						$('#cross').fadeIn();
					}else if(response == 0){
						$('#username').css('border', '3px #009900 solid');
						$('#cross').hide();
						$('#tick').fadeIn();
					}
				}
			});
		}
	});
});
</script>
<style type="text/css">
#username{
	padding:3px;
	font-size:18px;
	border:3px #CCC solid;
}

#tick{display:none}
#cross{display:none}

</style>
</head>

<body>
Username: <input name="username" id="username" type="text" />
<img id="tick" src="tick.png" width="16" height="16"/>
<img id="cross" src="cross.png" width="16" height="16"/>


</body>
</html>
