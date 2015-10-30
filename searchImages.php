<?php
	$dataBaseLink = mysql_connect('localhost', 'root', '');
	mysql_select_db("image",$dataBaseLink);
	$query = 'SELECT * FROM images WHERE (description LIKE \'%'.$_GET['description'].'%\')';
	$queryContent = mysql_query($query);
	while($qrRes = mysql_fetch_array($queryContent))
		{
		echo '<a href = "http://localhost/images/'.$qrRes['link'].'" target = "_blank"><img src = "images/'.$qrRes['link'].'"></a>'.'<hr>Опис зображення: '.$qrRes['description'].'<hr>Посилання: http://localhost/images/'.$qrRes['link'].'<hr>';
		}
?>