<?
//$DB = $FRMWRK->DB();

//$test = $FRMWRK->DBRecords('SELECT * FROM test');
//$testCount = $FRMWRK->DBRecordsCount('test',"name='type'");
//$update_test = $FRMWRK->DBRecordsUpdate('test',array('value'=>'money'),'id=1');
//$create_test = $FRMWRK->DBRecordsCreate('test',array('name','value'),array('type','food'));
//$delete_test = $FRMWRK->DBRecordsDelete('test',"id='3'");
$test_module = $ModuleExample->Info();
$hash = $FRMWRK->GenerateHash(30,false);
?>