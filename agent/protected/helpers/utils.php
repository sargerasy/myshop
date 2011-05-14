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

	public static function getModelTree($models, $id_attr, $parent_attr)
	{
		$nodes = array(0=>array());
		$orphan = array();
		foreach($models as $val) {
			$pid = $val[$parent_attr];
			$id = $val[$id_attr];
			$node = array('value'=>$val);
			if(array_key_exists($id, $orphan))
				$node['children'] = $orphan[$id];
			else
				$node['children'] = array();
			if(array_key_exists($pid, $nodes)) {
				$nodes[$pid]['children'][$id] = &$node; 
			} else {
				if(array_key_exists($pid,  $orphan))
					$orphan[$pid][$id] = &$node;
				else
					$orphan[$pid] = array();
			}
			$nodes[$id] = &$node;
			unset($node);
		}

		return $nodes[0];
	}

	public static function generateOptionTree($tree, $text, $name_attr, $level)
	{
		$indent = '';
		for($i = 0; $i < $level; $i++)
			$indent = '&nbsp&nbsp&nbsp&nbsp'.$indent;

		$children = $tree['children'];
		foreach($children as $id=>$child) {
			$text = $text.'<option value="'.$id.'">'.$indent.$children[$id]['value'][$name_attr].'</option>';
			$text = Utils::generateOptionTree($children[$id], $text, $name_attr, $level + 1);
		}
		return $text;
	}

	public static function createStruct($init, $items, $reverse)
	{
	}

	public static function exclude($main, $sub, $attr)
	{
		$result = array();
		foreach($main as $m) {
			$exist = false;
			foreach($sub as $s) {
				if($m->attributes[$attr] == $s->attributes[$attr]) {
					$exist = true;
					break;
				}
			}
			if(!$exist)
				$result[] = $m;
		}
		return $result;
	}

	public static function t($msg, $params=array())
	{
		return Yii::t('messages', $msg, $params);
	}

	public static function addWholesaleCart($cart)
	{
		if(!isset($_SESSION['ws_cart_max_key'])) {
			$_SESSION['ws_cart_max_key'] = 0;
			$_SESSION['ws_cart'] = array();
		}
		$_SESSION['ws_cart_max_key'] += 1;
		$key = strval($_SESSION['ws_cart_max_key']);
		$cart['key'] = $key;
		$_SESSION['ws_cart'][$key] = $cart;
		return $_SESSION['ws_cart_max_key'];
	}

	public static function dropWholesaleCart($key)
	{
		unset($_SESSION['ws_cart'][$key]);
	}

	public static function getWholesaleCarts()
	{
		if(isset($_SESSION['ws_cart']))
			return $_SESSION['ws_cart'];
		return array();
	}
}
