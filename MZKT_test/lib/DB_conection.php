<?php
	$host = 'localhost';
	$user = 'MyUser';
	$pswd = 'qwerty';
	$db = 'shopbd';

	$conection = mysql_connect($host,$user,$pswd);
	mysql_set_charset('utf8',$conection);
	if(!$conection || !mysql_select_db($db,$conection))
	{
		exit(mysql_error());
	}
?>