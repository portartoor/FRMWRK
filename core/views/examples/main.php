///Database work examples:<br><br>
$FRMWRK->DBRecords('SELECT * FROM test'):<br>
<pre>
Array
(
    [0] => Array
        (
            [id] => 1
            [name] => type
            [value] => money
        )

    [1] => Array
        (
            [id] => 2
            [name] => type
            [value] => time
        )

)
</pre><br><br>
$FRMWRK->DBRecordsCount('test',"name='type'"):<br>
<pre>
2
</pre><br><br>
///Modules usage examples:<br><br>
$test_module = $ModuleExample->Info();<br>
<pre>
<?
print_r($test_module);
?>
</pre><br><br>

///Other examples:<br><br>
$FRMWRK->GenerateHash(30,'md5'):<br>
<pre>
<?
print_r($hash);
?>
</pre><br><br>