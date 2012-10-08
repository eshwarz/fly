<?php

//Online connection.
// $con = mysql_connect('localhost','pavseshc_cc','crazychums123') or die ('OOPS: '.mysql_error());
// mysql_select_db('pavseshc_main',$con) or die (mysql_error());

/*
//Windows connection.
$con = mysql_connect('localhost','root','') or die ('OOPS: '.mysql_error());
mysql_select_db('pavsesh_main',$con) or die (mysql_error());
*/


//linux connection.
$con = mysql_connect('localhost','root','') or die ('OOPS: '.mysql_error());
mysql_select_db('pavsesh_main',$con) or die (mysql_error());
$GLOBALS['con'] = $con;
?>
