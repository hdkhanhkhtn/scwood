<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require "smarty/Smarty.class.php";

/**
* @file system/application/libraries/Mysmarty.php
*/
class Mysmarty extends Smarty
{
	function Mysmarty()
	{
		$this->Smarty();

		$config =& get_config();
		
		// absolute path prevents "template not found" errors
		$this->template_dir = $config['smarty_template_dir'];
																	
		$this->compile_dir  = $config['smarty_compile_dir'];
			
		$this->compile_check = $config['smarty_compile_check'];
	
		$this->debugging = $config['smarty_debugging'];
	
		//$smarty->caching = true ;	
		
		if (function_exists('site_url')) {
    		// URL helper required
			$this->assign("site_url", site_url()); // so we can get the full path to CI easily
		}
	}
	
	function view($resource_name, $cache_id = null)   {
		if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
		return parent::display($resource_name, $cache_id);
	}
		
	/*function view($resource_name, $params = array())   {
		if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
		
		if (is_array($params) && count($params)) {
			foreach ($params as $key => $value) {
				$this->assign($key, $value);
			}
		}
		
		// check if the template file exists.
		if (!is_file($this->template_dir . $resource_name)) {
			show_error("template: [$resource_name] cannot be found.");
		}
		
		return parent::display($resource_name);
	}*/
	
} // END class smarty_library
?>