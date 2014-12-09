<?php
/*

SQL Buddy - Web based MySQL administration
http://www.sqlbuddy.com/

index.php
- output page structure, content loaded through ajax

MIT license

2008 Calvin Lough <http://calv.in>

*/

require_once "functions.php";

require_once(dirname(__FILE__) . '/../../../../config.php');

require_login();
require_capability('moodle/site:config', context_system::instance());

loginCheck(false);

outputPage();

?>