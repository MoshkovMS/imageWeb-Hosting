<?php
$dataBaseLink = mysql_connect('localhost', 'root', '');
mysql_select_db("image",$dataBaseLink);
$imageLinks = "";
function generateRandomString($length)
	{
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$numChars = strlen($chars);
	$resultString = '';
	for($i = 0; $i < $length; $i++)
	{
	$string .= substr($chars, rand(1, $numChars)-1,1);
	}
	return $string;
	}
for($i = 0; $i < count($_FILES['fileList']['tmp_name']); $i++)	
{
$fileFormat = explode('.',$_FILES['fileList']['name'][$i]);
if(($fileFormat[count($fileFormat)-1] == 'jpg') || ($fileFormat[count($fileFormat)-1] == 'jpeg'))
{
if(is_uploaded_file($_FILES['fileList']['tmp_name'][$i]))
{
$adress = generateRandomString(20).'.jpg';
move_uploaded_file($_FILES['fileList']['tmp_name'][$i], 'images/'.$adress);
mysql_query('INSERT INTO images SET link = "'.$adress.'", subscribe = '.'"empty"');
$imageLinks = $imageLinks.$adress.'|'; 
}		
}
}			
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<script>
		document.getElementsByTagName('body')[0].innerHTML = '<form  action = "filesUpload.php" method = "post" enctype = "multipart/form-data"><input name = "fileList[]" type = "file" multiple = "true" min = "1" max = "10"><input type = "submit" value = "Відправити"></form>';
		top.getMyPhotos();	
		</script>
	<?php
	
	$imageLinksArr = explode('|',$imageLinks);
	if(count($imageLinksArr) > 1)
	{
	echo'<script>top.setNewImages(\''.$imageLinks.'\')</script>';
	}
	?>
	</body>
</html>