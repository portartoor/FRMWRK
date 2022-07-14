Pure FRMWRK v 1.0 
=================

contains:

- php framework on MVC pattern + easy configurable pattern system
- ability to load modules
- templating core with jquery 3.3.1 and normalized css included
- maximum logic and usability conception
- nothing superfluous, only really necessary functionality and code

=================
List of functions:

Main lib is placed [HERE](core/libs/frmwrk/frmwrk.php)

-safety:
$FRMWRK->CheckInjections($value);
$FRMWRK->GenerateHash($value,$type);

-database work:
$FRMWRK->DB();
$FRMWRK->DBRecords($sql);
$FRMWRK->DBRecordsCount($from,$where);
$FRMWRK->DBRecordsUpdate($table,$fields,$where);
$FRMWRK->DBRecordsCreate($table,$fields,$values);
$FRMWRK->DBRecordsDelete($table,$where);

-emails work:
$FRMWRK->EmailReturn($template,$content);
