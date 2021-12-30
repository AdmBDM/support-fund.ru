<?php

namespace common\components;

class MyDebugHelper
{
	public static function myDebug ($arr, $die = false){
		echo '<pre>' . print_r($arr, true) . '</pre>';
		if ($die) die;
	}

	public static function cl_print_r ($var, $label = '') {
		$str = json_encode(print_r ($var, true));
		echo "<script>console.group('".$label."');console.log('".$str."');console.groupEnd();</script>";
	}

}
?>