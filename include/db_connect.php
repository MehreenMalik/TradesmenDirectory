<?php
function db_connect($email_signup)
{
   $db_link = mysql_connect('localhost', 'root', '') or die("I couldn't connect to your database, please make sure your info is correct!");
   mysql_select_db('email_signup') or die("I couldn't find the database table ($table) make sure it's spelt right!");
   return $db_link;
}
?>
