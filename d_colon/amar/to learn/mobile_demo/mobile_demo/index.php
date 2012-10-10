<?php
// Include class to generate output
require('library.inc');
// Create page an use simulator to test and debug
$page = new HAW_deck("Demo");
$text=new HAW_text('Welcome');
$page->add_text($text);
// Render the page
$page->create_page();
?>