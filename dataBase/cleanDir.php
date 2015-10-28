<?php
function cleanDir($path)
	{
	$adress = $_SERVER['DOCUMENT_ROOT'].'/'.$path;
	$dirHandle = opendir($adress);
	while(false !== ($entry = readdir($dirHandle)))
		{
		if(($entry != '.') && ($entry != '..'))
			{
			if(is_file($adress.'/'.$entry))
				{
				unlink($adress.'/'.$entry);
				}
				else if(is_dir($adress.'/'.$entry))
					{
					cleanDir($path.'/'.$entry);
					rmdir($path.'/'.$entry);
					}
			}
		}
	}
?>