<?php

class Admin_upload extends Controller {
	
	var $mr;
	var $mlist;
	var $site;


	function Admin_upload()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('upload', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('upload_model');
		
		//load helper directory
		
		$this->load->helper('directory');
		
		$this->mr['title'] = 'Upload';
		
		$this->search = array('keyword' => '','path' => './uploads/bbs', 'page' => 0);
		
		$this->session->set_flashdata('sess_search',$this->search);
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}

	function index()
	{
		$this->session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function showlist()
	{		
		$this->mysmarty->assign('tpl_center','upload/index.tpl');
	
		$this->load->helper('array');
		$arr=directory_map($this->search['path'],true);
		$i=0;
		if ($arr){
	  		foreach ($arr as $value ){
	  			$link = @fopen($this->search['path'].$value, "rb");
	  			if ($link)
	  			{
	  				$this->mlist[$i]=$value;
	  				$i = $i + 1;
	  			}
	  		}
	  	}
	  	
	  	$this->mr['path'] = $this->search['path'];
	  	
	  	if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');	
	}
	function search()
	{
		if($this->session->flashdata('sess_search'))
		{				
			$this->search = $this->session->flashdata('sess_search');		
		}
		
		$par = $this->uri->uri_to_assoc(3);
		if (isset($par['id']))
		{   
			$this->search['path']='./uploads/'.$par['id'].'/';
		}
		
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
	}
	
	function detele()
	{

		if($this->session->flashdata('sess_search'))
		{				
			$this->search = $this->session->flashdata('sess_search');		
		}
		
		$par = $this->uri->uri_to_assoc(3);
		if (isset($par['id']))
		{   
			echo $this->search['path'].$par['id'];
		}
		
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
	}

}
?>