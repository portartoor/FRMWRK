<?
$LibName = 'FRMWRK';
$LibVersion = '1.0';
class FRMWRK {
	
	//safety
	function CheckInjections($value) {
		$text = strtolower($text);

		if (
		!strpos($text, "select") &&
		!strpos($text, "union") &&
		!strpos($text, "order") &&
		!strpos($text, "where") &&
		!strpos($text, "char") &&
		!strpos($text, "from")
		) {
			return true;
		} else {
			return false;
		}
	}

	public function GenerateHash($value,$type) {
		$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP0123456789";
		$size=StrLen($chars)-1;
		$hash=null;
		
		if (is_numeric($value)) {
			$i=0;
			do {
				$hash.=$chars[rand(0,$size)];
				$i++;
			} while ($i<$value);
		}
		else {
			$hash=$value;
		}
		
		if ($type=='md5') {
			$hash=md5($hash);
		}
		
		return $hash;
	}
	
	//database
	public function DB() {
		include(DIR.'/core/config.php');
		return mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);
	}

	public function DBRecords($sql) {
		include(DIR.'/core/config.php');
		$DB = mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);

		$result = array();
		$how = mysqli_query($DB, $sql);
		
		while ($sqlAr = mysqli_fetch_assoc($how)) {
			$result[]=$sqlAr;
		}

		if ($DB) {
			mysqli_close($DB);
		}

		return $result;
	}

	public function DBRecordsCount($from,$where) {
		include(DIR.'/core/config.php');
		$DB = mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);

		if (!$where) {
			$sql = "SELECT COUNT(*) AS counter FROM `".$from."`";
		}
		else {
			$sql = "SELECT COUNT(*) AS counter FROM `".$from."` WHERE ".$where;
		}

		$how = mysqli_query($DB, $sql);
		$sqlAr = mysqli_fetch_assoc($how);
		$count = $sqlAr['counter'];

		if ($DB) {
			mysqli_close($DB);
		}

		return $count;
	}
	
	public function DBRecordsUpdate($table,$fields,$where) {
		include(DIR.'/core/config.php');
		$DB = mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);
		
		$result = array();
		
		$sql = 'UPDATE `'.$table.'` SET';
		$i=0;
		foreach ($fields as $field=>$value) {
			if ($i>0) {
				$sql.=",";
			}
			else {
				$sql.=" ";
			}
			$sql.="`".$field."`='".$value."'";
			$i++;
		}
		$sql.=' WHERE '.$where;
		
		if (mysqli_query($DB, $sql)) {
			$result['status']='success';
		}
		else {
			$result['status']='error';
		}
			
		return $result;
	}
	
	public function DBRecordsCreate($table,$fields,$values) {
		include(DIR.'/core/config.php');
		$DB = mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);
		
		$result = array();
		
		$sql = 'INSERT INTO `'.$table.'` (';
		$i=0;
		foreach ($fields as $field) {
			if ($i>0) {
				$sql.=",";
			}
			$sql.=$field;
			$i++;
		}
		$sql.= ') VALUES (';
		$i=0;
		foreach ($values as $value) {
			if ($i>0) {
				$sql.=",";
			}
			$sql.="'".$value."'";
			$i++;
		}
		$sql.= ')';
		if (mysqli_query($DB, $sql)) {
			$result['status']='success';
		}
		else {
			$result['status']='error';
		}
			
		return $result;
	}
	
	public function DBRecordsDelete($table,$where) {
		include(DIR.'/core/config.php');
		$DB = mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);
		
		$result = array();
		
		$sql = 'DELETE FROM `'.$table.'` WHERE '.$where;
		if (mysqli_query($DB, $sql)) {
			$result['status']='success';
		}
		else {
			$result['status']='error';
		}
			
		return $result;
	}
	
	//email
	public function EmailReturn($template,$content) {
		return $template['begin'].$content.$template['end'];
	}
	
	//engine
	public function GetModules() {
		include(DIR.'/core/config.php');
		
		$Modules=array();
		$dir_modules = opendir($LibsPath.'modules/');
		
		while($file = readdir($dir_modules)) {
			if ($file != '.' && $file != '..') {
				$Modules[]=$file;
			}
		}
		
		return $Modules;
	}
}
?>
