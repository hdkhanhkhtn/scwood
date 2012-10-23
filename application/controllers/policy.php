<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Policy extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Policy()
	{
		parent::Controller();
		
		$this->load->model('policy_model');
		
		$this->load->model('policydt_model');
		
		$this->mr['title'] = 'Policy';		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
		
		$this->mysmarty->assign('tpl_center','policy/index.tpl');
		
		$par = $this->uri->uri_to_assoc(3);
		
		$id = (int)isset($par['id'])?$par['id']:1;
		
		//get type policy name
		$this->mr = array_merge($this->mr,$this->policy_model->get($id));
		
		//get list policy
		$this->db->where('policydt_active', 1);
		
		$this->db->where('policydt_pid', $id);
		
		$this->mlist = $this->policydt_model->get();

				
			
	}
	
	

	
}
?>