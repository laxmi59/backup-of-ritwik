<?
if($_POST['Submit'])
{
	include "class.php";
	$x=new valid();
	$a=$x->notempty($_POST['Name']);
	$b=$x->notempty($_POST['Email']);
	
}
?>
<form name='test' method='POST' action='' accept-charset='UTF-8'>

         <table cellspacing='2' cellpadding='2' border='0'>
            <tr>
               <td align='right' class='normal_field'>Name</td>
               <td class='element_label'>
                  <input type='text' name='Name' size='20'><?=$a?>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Email</td>
               <td class='element_label'>
                  <input type='text' name='Email' size='20'><?=$b?>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Address</td>
               <td class='element_label'>
                  <input type='text' name='Address' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>City</td>
               <td class='element_label'>
                  <input type='text' name='City' size='20'>
               </td>
            </tr>
            <tr>
               <td colspan='2' align='left' valign='bottom' class='normal_field'>Comments</td>
            </tr>
            <tr>
               <td>
               </td>
               <td class='element_label'>
<textarea name='Comments' cols='50' rows='8'></textarea>
               </td>
            </tr>
            <tr>
               <td colspan='2' align='center'>
                  <input type='submit' name='Submit' value='Submit'>
               </td>
            </tr>
         </table>

</form>