<?php
function db_connect($tradesmendirectory)
{
   $host_name = "localhost";
   $user_name = "root";
   $password = "usbw";
   $db_name = "tradesmendirectory";
   $db_link = mysql_connect($host_name, $user_name, $password)
      or die("Could not connect to $host_name");
   mysql_select_db($tradesmendirectory)
      or die("Could not select database $db_name");
   return $db_link;
}
?>