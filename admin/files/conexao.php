<?php 
	
	//$conn = mysql_connect("nasfazendas.mysql.dbaas.com.br","nasfazendas","nasfazendas!@#")or die(mysql_error());

$conn = mysql_connect("localhost","root","")or die(mysql_error());
	$date = mysql_select_db("nasfazendas",$conn)or die(mysql_error());
	 mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
?>