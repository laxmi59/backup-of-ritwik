<script type="text/javascript">
function checkCheckBoxes() {
	if (document.reg_form.frd.checked == false &&
	    document.reg_form.paper.checked == false &&
	    document.reg_form.banner.checked == false)
		{
		alert ('You didn\'t choose any of the checkboxes!');
		return true;
		}
	else
		{
		return false;
		}
	}
</script>
<form name="reg_form">
<table width="78%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="51%" align="center" class="iwfount"><font color="#FF0000"><strong>How&nbsp;did&nbsp;you&nbsp;know&nbsp;about&nbsp;Thames&nbsp;Overseas ?</strong></font></td>
                <td width="11%" align="center" class="iwfount"><div align="right"><font color="#660033"><strong>Friend</strong></font></div></td>
                <td width="4%" align="center"><input  name="frd" type="checkbox" id="frd" value="checkbox" /></td>
                <td width="15%" align="center"><div align="right"><font color="#660033"><strong>News paper</strong></font></div></td>
                <td width="4%" align="center"><input  name="paper" type="checkbox" id="paper" value="checkbox" /></td>
                <td width="11%" align="center" class="iwfount"><div align="right"><strong><font color="#660033">&nbsp;&nbsp;&nbsp;Banner</font></strong></div></td>
                <td width="4%" align="center"><input name="banner" type="checkbox" id="banner" value="checkbox" /></td>
              </tr>
              <tr>
                <td colspan="7" align="center" class="iwfount">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="7" align="center"><input type="button" name="submit" value="submit" onClick="return checkCheckBoxes()"/></td>
              </tr>
            </table>
</form>