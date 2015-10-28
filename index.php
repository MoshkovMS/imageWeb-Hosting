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
}
img
{
display: block;
max-width: 100%;
max-height: 100%;
}
#imagesBlock
{
width: 500px;
border: black solid 1px;
background: #999999;
}
</style>
</head>
<body>
<iframe src = "filesUpload.php" height = "35" width = "350" scrolling = "no" id = "iFameWin">
</iframe>
<div id = "imagesBlock">
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