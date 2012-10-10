<title>Sections Demo</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".country").change(function(){
		var id=$(this).val();
		var dataString = 'id='+ id;
		$.ajax({
			type: "POST",
			url: "ajax_city.php",
			data: dataString,
			cache: false,
			success: function(html){
				$(".city").html(html);
			}	 
		});
	});
});
</script>
<div style="margin:80px">
<label>Select :</label> <select name="country" class="country">
<option selected="selected">--Select Country--</option>
<option value="1">test1</option>
<option value="2">test2</option>
</select> 
<!--<label>City :</label> -->
<table cellpadding="0" cellspacing="0" class="city">
</table>