<?php

class Service extends Controller {
	
	var $mr;

	var $site;
	
	function Service()
	{
		parent::Controller();
		$this->mr['title'] = 'Getting Started';
	}
	
	function _output()
	{
		$this->mr['title_menu'] = 'GETTING STARTED';
		$this->mysmarty->assign('mr',$this->mr);
	
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
				
		$this->mysmarty->assign('tpl_center','service/index.tpl');
		
 		$this->db->select('*');
 		$this->db->from('service');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();
	}

	
}
?>