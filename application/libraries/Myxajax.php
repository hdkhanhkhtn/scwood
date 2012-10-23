<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myxajax {

	function Myxajax() {
	
		require_once(APPPATH.'libraries/xajax/xajax_core/xajax.inc'.EXT);
		
		$CI =& get_instance();
		
		$CI->xajax = new xajax();
		
		
	}
	
}
