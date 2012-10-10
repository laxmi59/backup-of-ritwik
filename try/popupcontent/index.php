<script type="text/javascript">
function openColourPickerDialog(wnd, field, dlgURL){
	myColourDialog.myColour="";
	if(wnd.showModalDialog(dlgURL,myColourDialog,"dialogHeight:150px;dialogWidth:300px;") == true ){
		field.value = myColourDialog.myColour;
	}else{
		return;
	}
}
function myColourDialog(){
	var myColour;
}
</script>
<form action="">
<h2> Colour: </h2>
<form action=""><input name="TextOutput" size="20" \="" type="text">
 <input class="button" value="Choose.." onClick="openColourPickerDialog(window, this.form.TextOutput, 'http://192.168.1.88/rama/try/popupcontent/data.php');" type="button">
<script type="text/javascript">
 	_uacct = "UA-1548494-1";
	urchinTracker();
</script>
</form>
