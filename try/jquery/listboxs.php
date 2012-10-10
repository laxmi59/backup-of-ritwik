<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
if( $('#selectbox option').length ==0)	
	$("#move").attr('disabled','disabled');
else
	$("#move").attr('disabled','');
if( $('#selectbox2 option').length ==0)	
	$("#moveback").attr('disabled','disabled');
else
	$("#moveback").attr('disabled','');
	
	$("#move").click(function(){
		if(document.getElementById("chk").checked==true){
			$('#selectbox option:selected').appendTo('#selectbox2');
		}else{
			var mainval=[]; var maintxt=[];
			$('#selectbox :selected').each(function(i, selected){ 
				mainval[i] = $(selected).val();
				maintxt[i] = $(selected).text();
				selval='<option value="'+mainval[i]+'" id="">'+maintxt[i]+'</option>';
				$("#selectbox2").append(selval);
				
			});
		}
		if( $('#selectbox option').length ==0)
			$("#move").attr('disabled','disabled');
		else
			$("#move").attr('disabled','');
		if( $('#selectbox2 option').length ==0)
			$("#moveback").attr('disabled','disabled');
		else
			$("#moveback").attr('disabled','');
	});
	$("#moveback").click(function(){
		if(document.getElementById("chk").checked==true){
			$('#selectbox2 option:selected').appendTo('#selectbox');
		}else{
			var mainval=[]; var maintxt=[];
			$('#selectbox2 :selected').each(function(i, selected){ 
				mainval[i] = $(selected).val();
				maintxt[i] = $(selected).text();
				selval='<option value="'+mainval[i]+'" id="">'+maintxt[i]+'</option>';
				$("#selectbox").append(selval);
				
			});
		}
	});
	if( $('#selectbox option').length ==0)
		$("#move").attr('disabled','disabled');
	else
		$("#move").attr('disabled','');
	if( $('#selectbox2 option').length ==0)
		$("#moveback").attr('disabled','disabled');
	else
		$("#moveback").attr('disabled','');
});
</script>
</head>

<body>
<form name="f1">
<table>
<tr>
	<th>Select the Item</th>
	<th></th>
	<th>Mapped items</th>
</tr>
<tr>
	<td><select multiple name="selectbox" id="selectbox" size="20" style="width:120px" >
	<? for($i=1;$i<=10;$i++){?>
	<option value="Item<?=$i?>" id="">Item<?=$i?></option>
	<? }?>
	</select>
	</td>
	<td><input type="button" id="move" value=">>" ><br>
	<input type="button" id="moveback" value="<<" ></td>
	<td><select multiple size="20" name="selectbox2" id="selectbox2" style="width:120px">
	</select></td>
</tr>
<tr><td><input type="checkbox" name="chk" id="chk">remove and add</td></tr>
</table>
</form>
</body>
</html>
