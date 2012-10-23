<?php

class Admin extends Controller {
	
	var $mr;
	var $mlist;
	var $mlist_cus;
	var $site;

	function Admin()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('customer', $this->site['site_lang_admin']);

        $this->mysmarty->assign('lang',$this->lang->toArray());
        
		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->assign('mlist_cus',$this->mlist_cus);
		
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{
		redirect('admin_customer/','refresh');
			
		die();	
	}
		
	
}
?>