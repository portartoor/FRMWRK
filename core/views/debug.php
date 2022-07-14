<b>Main Library:</b><br><br>
<?=$GLOBAL['main_lib'];?><br>
<?=$GLOBAL['lib_version'];?><br>
<br><br>
<b>Installed modules:</b><br><br>
<?
foreach($GLOBAL['modules'] as $module) {
	?>
	- <?=$module;?><br>
	<?
}
?>
<br><br>
<b>Pages in that app:</b><br><br>
<?
foreach($pages as $page) {
	?>
	- <a href="/<?if ($page!='main') { echo $page; }?>"><?=$page;?></a><br>
	<?
}
?>
<br><br>
<b>Database config</b><br><br>

host: <?=$DatabaseHost;?><br>
user: <?=$DatabaseUser;?><br>
password: <?=$DatabasePassword;?><br>
database: <?=$DatabaseName;?><br><br><br>
<b>$GLOBAL:</b><br>
<pre>
<?
print_r($GLOBAL);
?>
</pre><br><br>
<b>$_SERVER:</b><br>
<pre>
<?
print_r($_SERVER);
?>
</pre>
<?
phpinfo();
?>