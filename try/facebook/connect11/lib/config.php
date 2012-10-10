<?php

/*   
 *   FACEBOOK CONNECT LIBRARY FUNCTIONS/CLASSES
 */

/*   
 *   FILE INCLUDE PATHS
 *   MAKE SURE THESE PATHS ALL END WITH A FORWARD SLASH
 */

define(CONNECT_APPLICATION_PATH, "E:/wamp/www/rama/try/facebook/connect11/");
define(CONNECT_JAVASCRIPT_PATH, "/rama/try/facebook/connect11/javascript/");
define(CONNECT_CSS_PATH, "/rama/try/facebook/connect11/css/");
define(CONNECT_IMG_PATH, "/rama/try/facebook/connect11/img/");

include_once CONNECT_APPLICATION_PATH . 'facebook-client/facebook.php';
include_once CONNECT_APPLICATION_PATH . 'lib/fbconnect.php';
include_once CONNECT_APPLICATION_PATH . 'lib/core.php';
include_once CONNECT_APPLICATION_PATH . 'lib/user.php';
include_once CONNECT_APPLICATION_PATH . 'lib/display.php';

/*   
 *   FB CONNECT APPLICATION DATA
 */

$callback_url    = 'http://192.168.1.88/rama/try/facebook/connect11/';
$api_key         = '023f60703b4c00f89cf87c54f7dce508';
$api_secret      = '7e83d128b0d1919586556067f4d54b22';
$base_fb_url     = 'connect.facebook.com';
$feed_bundle_id  = 'your template bundle id';

/*   
 *   SAMPLE BUNDLE DATA
 */

$sample_post_title = "FB Connect Demo";
$sample_post_url = "http://pakt.com/scripts/facebook/connect/";
$sample_one_line_story = '{*actor*} posted a comment on <a href="{*post-url*}">{*post-title*}</a> and said {*post*}.';
$sample_template_data = '{"post-url":"http://pakt.com/scripts/facebook/connect/", "post-title":"FB Connect Demo", "post":"This is so easy to use!"}';

?>