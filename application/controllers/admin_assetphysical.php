<?php

class Admin_assetphysical extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Admin_assetphysical()
	{
		parent::Controller();	
		
		//load language   

		//load module
		$this->load->model('assetclassphysical_model');
		$this->mr['title'] = 'Asset class physical';
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{	
		$this->showlist();
	}
	
	function showlist()
	{
		$this->mysmarty->assign('tpl_center','assetphysical/index.tpl');
		$this->mr = $this->assetclassphysical_model->get(1);
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		if($this->session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
	}
	
	function save()
	{
		$this->load->library('validation');

		$this->load->view('admin_assetphysical/assetphysical_validation.php', '', FALSE); // field validation

		$record = array(		
			'acp_rt_sp500' => $this->validation->mdr_sa_sp500,
			'acp_rt_russell2000value' => $this->validation->mdr_sa_russell2000value,
			'acp_rt_russellmicrocap' => $this->validation->mdr_sa_russellmicrocap,
			'acp_rt_mscieafe' => $this->validation->mdr_sa_mscieafe,
			'acp_rt_msciemergingmarkets' => $this->validation->mdr_sa_msciemergingmarkets,
			'acp_rt_ftse' => $this->validation->mdr_sa_ftse,
			'acp_rt_dowjones' => $this->validation->mdr_sa_dowjones,
			'acp_rt_spworld' => $this->validation->mdr_sa_spworld,
			
			'acp_rf_sp500' => $this->validation->mdr_5ar_sp500,
			'acp_rf_russell2000value' => $this->validation->mdr_5ar_russell2000value,
			'acp_rf_russellmicrocap' => $this->validation->mdr_5ar_russellmicrocap,
			'acp_rf_mscieafe' => $this->validation->mdr_5ar_mscieafe,
			'acp_rf_msciemergingmarkets' => $this->validation->mdr_5ar_msciemergingmarkets,
			'acp_rf_ftse' => $this->validation->mdr_5ar_ftse,
			'acp_rf_dowjones' => $this->validation->mdr_5ar_dowjones,
			'acp_rf_spworld' => $this->validation->mdr_5ar_spworld,
			
		);
		
        
		if ($this->validation->run() == FALSE ) {
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_assetphysical');
			
			die();
			
		} 
		$record['acp_asof'] =$this->input->post('txt_asof');
				//Have an ID, updating existing record
		$result = $this->assetclassphysical_model->update(1, $record);
        if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_assetphysical', 'refresh');
		
		die();
			
		//if
	}
	
}
?>