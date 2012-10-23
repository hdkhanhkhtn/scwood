<?php

class Home extends Controller {
	
	var $mr;
	var $site;
	
	function Home()
	{
		parent::Controller();
		
	}
	
	function _output()
	{
		$this->mr['title_menu'] = 'HOME';
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
		$this->mr['title'] = 'Welcome';		
		$this->mysmarty->assign('tpl_center','home/index.tpl');
		
 		$this->db->select('*');
 		$this->db->from('home');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();
	}
	
}
?>