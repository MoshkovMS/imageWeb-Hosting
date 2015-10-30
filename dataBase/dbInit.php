<?php
$dataBaseLink = mysql_connect('localhost', 'root', '');
if(!mysql_select_db("image",$dataBaseLink))
	{
	mysql_query('CREATE DATABASE image', $dataBaseLink);
	mysql_select_db("image",$dataBaseLink);
	mysql_query('CREATE TABLE images(
		link TEXT, 
		description TEXT 
		)');
	}
?>