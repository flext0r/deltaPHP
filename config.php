<?php
$MYSQL_HOST = 'localhost';
$MYSQL_USER = 'root';
$MYSQL_PASSWORD = '';
$MYSQL_DB = 'Obliczenia';
$sql = '';

if(!$connection = mysql_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASSWORD))
{
	echo 'Unable to connect with database!<br>'.mysql_error();
}else{
	if(!mysql_select_db($MYSQL_DB,$connection))
	{
		$sql = "CREATE DATABASE {$MYSQL_DB}";
		if(mysql_query($sql))
		{
			mysql_select_db($MYSQL_DB,$connection);
			$sql = "CREATE TABLE delta (del_ID INT(9) AUTO_INCREMENT PRIMARY KEY NOT NULL, del_X0 FLOAT NOT NULL, del_X1 FLOAT NOT NULL, del_X2 FLOAT NOT NULL, del_date VARCHAR(30) NOT NULL)";
			if(!mysql_query($sql))
			{
				echo 'Error! Unable to create table!<br>'.mysql_error();
				$sql = "DROP DATABASE {$MYSQL_DB}";
				mysql_query($sql);
			}
			}else{
				echo 'Error! Unable to create database!<br>'.mysql_error();
			}
		}
}






?>