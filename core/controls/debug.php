<?
$dir_modules = opendir($ViewsPath);
	
$pages = array();	
while($file = readdir($dir_modules)) {
	if ($file != '.' && $file != '..') {
		if (strripos($file, '.php')) {
			$file=substr($file, 0, -4);
		}
		$pages[]=$file;
	}
}
?>