<?php
$dataBaseLink = mysql_connect('localhost', 'root', '');
mysql_select_db("image",$dataBaseLink);
mysql_query('DROP DATABASE image', $dataBaseLink);
?>