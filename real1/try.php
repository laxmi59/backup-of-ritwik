<script>
var keylist="123456789"
var temp=''

function generatepass(plength){
temp=''
for (i=0;i<plength;i++)
temp+=keylist.charAt(Math.floor(Math.random()*keylist.length));
return temp;
}
function populateform(enterlength){
//document.pgenerate.abc.value=generatepass(enterlength)
alert(generatepass(enterlength))
}
</script>
<form method="post">
<input type="text" name="abc">
<!--<input type="text" name="thelength" size=3 value="5">-->
<input name="submit" type="submit" class="btn" onClick="populateform(5)" value="submit">

</form>