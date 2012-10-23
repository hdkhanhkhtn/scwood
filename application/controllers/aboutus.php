<?php

class Aboutus extends Controller {
	
	var $mr;

	var $site;
	
	function Aboutus()
	{
		parent::Controller();
		$this->mr['title'] = 'About Us';
	}
	
	function _output()
	{
		$this->mr['title_menu'] = 'ABOUT US';
		$this->mysmarty->assign('mr',$this->mr);
	
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
				
		$this->mysmarty->assign('tpl_center','aboutus/index.tpl');
		
 		$this->db->select('*');
 		$this->db->from('aboutus');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
			

				
			
	}

	
}
?>