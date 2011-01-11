<?php
class Utils
{
	public static function GetAllActions()
	{
		$path = Yii::app()->getControllerPath();
		$dir = opendir($path);
		$result = array();
		while($filename = readdir($dir)) {
			if ($filename !== "." && $filename !== "..") {
				$controller = basename($filename, "Controller.php");
				$classname = basename($filename, ".php");
				$result[$controller] = array();
				$methods = get_class_methods($classname);
				foreach($methods as $key=>$value) {
					if (preg_match("/action([A-Z].+)/", $value, $matches))
						$result[$controller][$matches[1]] = 1;
				}
			}
		}
		closedir($dir);
		return $result;
	}

	public static function createStruct($init, $items, $reverse)
	{
	}

	public static function t($msg)
	{
		return Yii::t('messages', $msg);
	}
}
