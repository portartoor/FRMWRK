<?
//paths
$TemplatePath = DIR.'template/';
$FilesPath = DIR.'core/files/';
$LibsPath = DIR.'core/libs/';
$ModelsPath = DIR.'core/models/';
$ControlsPath = DIR.'core/controls/';
$ViewsPath = DIR.'core/views/';
$CachePath = DIR.'cache/';

//template_routes
$TemplateRoutes = array(
   'config' => 'config',
);

//no UI mode for concrete routes
$NoUImode = array(
   'debug',
);

//database
$DatabaseHost = 'db_host';
$DatabaseUser = 'db_user';
$DatabasePassword = 'db_password';
$DatabaseName = 'db_name';

//globals
$GLOBAL=array(
	'app_name'=>'Framework PoW hello-world app',
	'app_version'=>'1.0',
);
?>
