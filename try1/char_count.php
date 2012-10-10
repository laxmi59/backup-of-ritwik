<script type="text/javascript">
function countChars(l)
{
       var len=document.NameSMS.textArea.value.length;
       var str=document.NameSMS.textArea.value;
       if(len<=l)
       {
        document.NameSMS.txtLen.value=l-len;
       }
       else
       {
          document.NameSMS.textArea.value=str.substr(0,str.length-1);
       } 
 }
</script>
<form name="NameSMS">
<textarea name="textArea" onKeyDown="countChars(20)" onKeyUp="countChars(20)"></textarea>
</form>