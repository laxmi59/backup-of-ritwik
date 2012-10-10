<script type="text/javascript">
function sendAndClose( selObj ){

//if ( selObj.selectedIndex != 0 ){

  window.dialogArguments.myColour = 

   selObj;

  window.returnValue=true;

  window.close();

// }

}
</script>
<input type="button" value="one" onclick="sendAndClose(this.value)" />
<input type="button" value="two" onclick="sendAndClose(this.value)" />
<input type="button" value="three" onclick="sendAndClose(this.value)" />
