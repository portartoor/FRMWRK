<?
class Render {
	//FRMWRK main logic script
	//v 1.0
	//MVC pattern
	public function Get() {
		$route = $this->Route();
	}

	private function Route() {
		include ('config.php');

		$routes = $this->GetRoutes();
		$type = (preg_match('/\b.php\b/',$routes['extension'])) ? 'file' : 'path';

		if ($routes['routes_count']==0) {
			if ($type=='path') {
				$this->DrawPage('main.php');
			}
		}
		else {
			if ($type=='file') {
				$this->DrawPage($routes['extension']);
			}
			else if ($type=='path') {
				$this->DrawPage($routes['routes'][1].'.php');
			}
		}
	}

	private function GetRoutes() {
		$result=array();

		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$routes = array_filter($routes);
		$final = end($routes);
		$result['routes'] = array_diff($routes, array(''));
		$result['routes_count'] = count($routes);
		$result['extension'] = end($routes);
		$result['extension_type'] = substr($final, -4);
		
		$ref_check = (preg_match('/\bref=\b/',$result['extension'])) ? 'true' : 'false';
		$parameter_check = (preg_match('/\b=\b/',$result['extension'])) ? 'true' : 'false';
		$result['ref_check'] = $ref_check;
		$result['parameter_check'] = $parameter_check;
		
		if ($result['extension']!='' && $ref_check=='true' && $result['routes'][1]==$result['extension'] || $result['extension']!='' && $parameter_check=='true' && $result['routes'][1]==$result['extension']) {
			$result['routes'] = 0;
			$result['routes_count'] = 0;
			$result['extension_type'] = '';
			$result['extension'] = '';
		}
		if (isset($_GET['ref'])) {
			$referal = $_GET['ref'];
		}
		else {
			$referal = 0;
		}
		$result['referal'] = $referal;
		
		if ($ref_check=='true') {
			setcookie("referal", $referal, time() + 360000);
		}

		$i = 0;
		$ii = 0;
		foreach ($routes as $route) {
			$i++;
			if ($i>2) {
				$ii++;
				$_GET[$ii]=$route;
			}
		}
		
		
		return $result;
	}

	private function TemplatePath() {
		include ('config.php');

		$routes = $this->GetRoutes();
		$type = (preg_match('/\b.php\b/',$routes['extension'])) ? 'file' : 'path';

		foreach ($TemplateRoutes as $routeNow => $templateSet) {
			$TemplatePath = '';

			if (isset($routes['routes'][1]) && $routes['routes'][1]==$routeNow) {
				$TemplatePath = $TemplatePath.'views/'.$templateSet.'/';
				break(1);
			}
			else {
				$TemplatePath = $TemplatePath.'views/simple/';
			}
		}

		return $TemplatePath;
	}

	private function DrawPage($FilePath) {
		$routes = $this->GetRoutes();
		include ('config.php');

		$File = $FilePath;

		//include main framework lib
		include($LibsPath.'frmwrk/frmwrk.php');
		$FRMWRK = new FRMWRK();
		$GLOBAL['main_lib']=$LibName;
		$GLOBAL['lib_version']=$LibVersion;
		
		//include modules
		$GLOBAL['modules']=$FRMWRK->GetModules();
		foreach ($GLOBAL['modules'] as $module) {
			include ($LibsPath.'modules/'.$module.'/module.php');
			$$module = new Module();
		}
		
		//drawing the page by routes rules
		if ($routes['routes_count']>=2) {
			if ($routes['routes_count']!=0 && is_dir($ViewsPath.$routes['routes'][1])) {
				$ModelsPath = $ModelsPath.$routes['routes'][1].'/';
				$ControlsPath = $ControlsPath.$routes['routes'][1].'/';
				$ViewsPath = $ViewsPath.$routes['routes'][1].'/';
				$File = $routes['routes'][2].'.php';
			}
		}
		else {
			if ($routes['routes_count']!=0 && is_dir($ViewsPath.$routes['routes'][1])) {
				$ModelsPath = $ModelsPath.$routes['routes'][1].'/';
				$ControlsPath = $ControlsPath.$routes['routes'][1].'/';
				$ViewsPath = $ViewsPath.$routes['routes'][1].'/';
				$File = 'main.php';
			}
		}
		
		if (file_exists($ViewsPath.$File)) {
			if (file_exists($ModelsPath.$File)) {
				include($ModelsPath.$File);
			}
		}
		else {
			include($ModelsPath.'404.php');
		}
		
		if (file_exists($ControlsPath.$File)) {
			include($ControlsPath.$File);
		}
		if (in_array($routes['routes'][2], $NoUImode, true)) {
			if (!file_exists($ViewsPath.$File)) {
				header("HTTP/1.0 404 Not Found");
			}
			
			if (file_exists($ViewsPath.$File)) {
				include($ViewsPath.$File);
			}
			else {
				include($FilesPath.'404.php');
			}
			
			if (!file_exists($ViewsPath.$File)) {
				die();
			}
		}
		else {
			if (!file_exists($ViewsPath.$File)) {
				header("HTTP/1.0 404 Not Found");
			}
			
			include($TemplatePath.'header.php');

			if (file_exists($ViewsPath.$File)) {
				include($ViewsPath.$File);
			}
			else {
				include($FilesPath.'404.php');
			}

			include($TemplatePath.'footer.php');
			
			if (!file_exists($ViewsPath.$File)) {
				die();
			}
		}
	}
}
?>
