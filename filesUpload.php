<?php
	$dataBaseLink = mysql_connect('localhost', 'root', '');
	mysql_select_db("image",$dataBaseLink);
	$imageLinks = "";
	$description = $_GET['description'];
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
				if($description == '')$description = 'empty';
				mysql_query('INSERT INTO images SET link = "'.$adress.'", subscribe = '.'"'.$description.'"');
				$imageLinks = $imageLinks.$description.'|'.$adress.'|'; 
				}		
			}
		}			
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#imageDescription
				{
				background: #ffffff;
				border-radius: 5px;
				border: black solid 1px;
				overflow: auto;
				}
		</style>
	</head>
	<body>
		<script>
			function setDescription()
					{
					description = document.getElementById('imageDescription').value;
					document.getElementsByTagName('form')[0].setAttribute('action', 'filesUpload.php?description='+description);
					description = '';
					}
			document.getElementsByTagName('body')[0].innerHTML = '<form  action = "" method = "post" enctype = "multipart/form-data"><input name = "fileList[]" type = "file" multiple = "true" min = "1" max = "10"><input type = "submit" value = "Відправити"></form>';
			top.getMyPhotos();		
		</script>
		<table>
			<tr>
				<td>
					Ваш коментар до зображення, або ключове слово пошуку:
				</td>
			</tr>
			<tr>
				<td>
					<textarea rows = 2 cols = 44 id = "imageDescription" onkeyup = "setDescription();">
					</textarea>
				</td>
			</tr>
		</table>
	<?php
		$imageLinksArr = explode('|',$imageLinks);
		if(count($imageLinksArr) > 2)
			{
			echo'<script>top.setNewImages(\''.$imageLinks.'\')</script>';
			}
	?>
	</body>
</html>