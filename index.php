<html>
	<head>
		<title>
			Миттєвий хостинг зображень
		</title>
	<style>
		iframe
			{
			border: 0px;
			background: #aaaaaa;
			margin-top: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px 1px;
			}
		img
			{
			display: block;
			max-width: 100%;
			max-height: 100%;
			}
		#imagesBlock
			{
			margin: auto;
			width: 550px;
			background: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 0px 10px 1px;
			}
		#content
			{
			box-shadow: 0px 0px 10px 1px;
			text-align: center;
			width: 700px;
			background: #ff0000;
			margin: auto;
			border: black solid 1px;
			background-image: url("back.jpg");
			width: 650px;
			border-radius: 10px;
			padding-bottom: 5px;
			}
	</style>
	</head>
	<body>
	<div id = "content">
		<iframe src = "filesUpload.php" height = "35" width = "350" scrolling = "no" id = "iFameWin">
		</iframe>
		<div id = "imagesBlock">
		</div>
	</div>
	<script>
		function setNewImages(imagesArr)
			{
			document.getElementById("imagesBlock").innerHTML = '';
			adressArr = imagesArr.split('|');
			for(i = 0; (i < adressArr.length) && (adressArr[i].length > 1); i++)
				{
				image = '<a href = "http://localhost/images/'+adressArr[i]+'" target = "_blank"><img src  = "images/'+adressArr[i]+'">'+"</a>"
				link = 'Ваше посилання: http://localhost/images/'+adressArr[i];
				document.getElementById("imagesBlock").innerHTML += image+link+"<br>";
				}
			}
	</script>
	</body>
</html>