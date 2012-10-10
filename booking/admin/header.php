<? session_start();?>
<!--<link href="../css/style1.css" type="text/css" rel="stylesheet" />-->
<link href="../style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="content">
<tr><td class="topbar"><h1 align="center"> Welcome &nbsp;<?=$_SESSION['admin_name']?></h1></td></tr>
<tr><td class="banner">&nbsp;</td></tr>
<tr><td>
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr class="menu_back_color1" height="20" >
		<td width="306" align="center"><a href="<?=ADM_HOME?>" class="menu1"><strong>Home</strong></a></td>
		<td width="306" align="center"><a href="<?=ADM_SERVICE?>?act=show" class="menu1"><strong>Services</strong></a></td>
		<td width="306" align="center"><a href="<?=ADM_STATE?>?act=show"  class="menu1"><strong>States</strong></a></td>
		<td width="306" align="center"><a href="<?=ADM_SITE?>?act=show"  class="menu1"><strong>Sites</strong></a></td>
		<td width="306" align="center"><a href="<?=ADM_COMPANY?>?act=show"  class="menu1"><strong>Company</strong></a></td>
		<td width="306" align="center"><a href="timeslots.php?act=show"  class="menu1"><strong>Appointments</strong></a></td>
		<?php /*?><td width="306" align="center"><a href="myaccount.php?act=show" class="a"><strong>Calender view</strong></a></td><?php */?>
   		<td width="306" ><div align="center"><a href="<?=ADM_LOGOUT?>" class="menu1"><strong>Logout</strong></a></div></td>
	</tr>
	</table>
</td></tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="head"></td>
  </tr>
  <tr>
    <td class="head1"></td>
  </tr>
  <tr>
    <td class="head"></td>
  </tr>
</table>


                 