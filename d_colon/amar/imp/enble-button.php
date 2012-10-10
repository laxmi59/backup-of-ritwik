<!--   Script by hscripts.com          -->
<!--   Copyright of HIOX INDIA         -->
<!-- More scripts @ http://www.hscripts.com -->

<script language=javascript>
/*function apply()
{
  document.frm.sub.disabled=true;
  if(document.frm.chk.checked==true)
  {
    document.frm.sub.disabled=false;
  }
  if(document.frm.chk.checked==false)
  {
    document.frm.sub.enabled=false;
  }
}*/
  document.frm.sub.disabled=true;
  if(!document.frm.fname.value=='')
  {
    document.frm.sub.disabled=false;
  }
   document.frm.sub.disabled=true;
  if(document.frm.chk.checked==false)
  {
    document.frm.sub.enabled=false;
  }

</script> 

<!-- Script by hscripts.com -->
<!-- Script by hscripts.com -->

<form name="frm">
<table style="border:solid green 1px">
<tr><td><input type="text" name="fname" onFocus="apply()"></td></tr>
<tr><td><input type="text" name="lname"></td></tr>
<!--<tr><td align=center><input type="checkbox" name="chk" onClick="apply()"></td></tr>I agree Terms and Conditions-->
<tr><td align=center><input type="button" name="sub" value="submit" disabled></td></tr>
<tr><td align=center>&nbsp;</td>
</tr></table>
</form>

<!-- Script by hscripts.com -->
