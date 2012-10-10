<?php
session_start();
/*
Template Name: account
*/
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');

//echo TEMPLATEPATH . '/lib/Functions.php';
get_header();
if($_SESSION['userid']<>''){
	$qry="select * from `contactdetails` where contactdet_id=".$_SESSION['userid'];
	$fet_user_info=mysql_fetch_object(mysql_query($qry));
}else{
	wp_redirect(get_option('siteurl') . '/get-started');exit;
}
?>
<script src="<?php bloginfo('template_directory'); ?>/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php bloginfo('template_directory'); ?>/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<!--cancel account-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cancel/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cancel/scripts.js"></script>
<script type="text/javascript">
//$(document).ready(function(){
 /*$('#div_2').hide();
$('#div_1').hover(function() {
    $('#div_2').show('slow');
},function(){
    $('#div_2').hide('slow');
});*/
/* $('#div_1').hover(function() {
  $('#div_2').stop().fadeIn();
}, function(){
  $('#div_2').stop().fadeOut();
});*/
//});
</script>
<div class="container">
<div class="cancal-account"  id="login"  ><a href="#" class="login-button"><span>Cancel Account</span></a>   
   <div id="login-popout" class="account-cancel" style="display:none;">
    If you are not satisfied with RecoverLink , you can cancel during the trial period and owe nothing more.<br>
            If you cancel after the trial period, then no refund will be given.
 <input type="button" value="Cancel This Service" class="submit"   />
</div>

          </div>
          
          
          <!--tabs-->
  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">My Account</li>
      <li class="TabbedPanelsTab" tabindex="0">My Membership Info</li>
      <li class="TabbedPanelsTab" tabindex="0">My Label Set</li>
      <li class="TabbedPanelsTab" tabindex="0">Transaction History</li>
      <li class="TabbedPanelsTab" tabindex="0">Order More Labels</li>
	  <li class="TabbedPanelsTab" tabindex="0" onclick="window.location='<?php echo get_option('siteurl');?>/lost_item/'">Lost Item</li>
    </ul>
    <div class="TabbedPanelsContentGroup"> 
      <!--tab1 content-->
      <div class="TabbedPanelsContent">
	       <?php include_once (TEMPLATEPATH . '/tab1content.php'); ?>
      </div>
        <!--tab2 content-->
      <div class="TabbedPanelsContent">
        <?php include_once (TEMPLATEPATH . '/tab2content.php'); ?>
      </div>
      <!--tab3 content-->
      <div class="TabbedPanelsContent">
	    <?php include_once (TEMPLATEPATH . '/tab3content.php'); ?>

     </div>
      <!--tab4 content-->
      <div class="TabbedPanelsContent">
	    <?php include_once (TEMPLATEPATH . '/tab4content.php'); ?>
    </div>
      <!--tab5 content-->
      <div class="TabbedPanelsContent">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php bloginfo('template_directory'); ?>/images/label_group.gif"></td>
    <td><form method="post" action="#">
          <table  >
            <tbody>
              <tr>
                <td align="center" colspan="2"> A label set consists of eight labels<br/>
                  "Order now<br/>
                  - $20.00"<br/></td>
              </tr>
              <tr>
                <td align="center" colspan="2">includes shipping and handling</td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" style="padding-right: 10px; border-right: 1pt dotted rgb(102, 102, 102);"><label>Number of Sets
                    <input type="text" size="4" value="" id="quantity" name="quantity">
                  </label></td>
                <td align="left"><input type="image" src="<?php bloginfo('template_directory'); ?>/images/order_labels.gif"></td>
              </tr>
            </tbody>
          </table>
        </form></td>
  </tr>
</table>

       
        
      </div>
	  <div class="TabbedPanelsContent">
	    <?php //include_once (TEMPLATEPATH . '/tab6content.php'); ?>
    </div>
    </div>
	
  </div>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script> 
