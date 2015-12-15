<?php
function db_connect($tradesmendirectory)
{
   $db_link = mysql_connect('localhost', 'root', 'usbw') or die("I couldn't connect to your database, please make sure your info is correct!");
   mysql_select_db('tradesmendirectory') or die("I couldn't find the database table ($table) make sure it's spelt right!");
   return $db_link;
}
?>
