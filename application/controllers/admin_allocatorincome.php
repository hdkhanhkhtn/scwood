<?php

class Admin_allocatorincome extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Admin_allocatorincome()
	{
		parent::Controller();	
		
		//load language   

		//load module
		$this->load->model('allocatorincome_model');
		$this->mr['title'] = 'Allocator Income Manager';
	}
	
	function _output()
	{
		//$this->mr['mdr_portfoliovalue'] = format_currency($this->mr['mdr_portfoliovalue']);
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
		$this->mysmarty->assign('tpl_center','allocatorincome/index.tpl');
		$this->mr = $this->allocatorincome_model->get(1);
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		if($this->session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
	}
	
	function save()
	{
		$this->load->library('validation');

		$this->load->view('admin_allocatorincome/allocatorincome_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'ai_dy_sp500' => $this->validation->ai_dy_sp500,
			'ai_dy_russell2000value' => $this->validation->ai_dy_russell2000value,
			'ai_dy_russellmicrocap' => $this->validation->ai_dy_russellmicrocap,
			'ai_dy_mscieafe' => $this->validation->ai_dy_mscieafe,
			'ai_dy_msciemergingmarkets' => $this->validation->ai_dy_msciemergingmarkets,
			'ai_dy_ftse' => $this->validation->ai_dy_ftse,
			'ai_dy_dowjones' => $this->validation->ai_dy_dowjones,
			'ai_dy_spworld' => $this->validation->ai_dy_spworld,
			'ai_dy_ustreasury' => $this->validation->ai_dy_ustreasury,
			'ai_dy_uslong' => $this->validation->ai_dy_uslong,
			'ai_dy_jpmorgan' => $this->validation->ai_dy_jpmorgan,
			'ai_portfoliovalue' => '1000000',	
			
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_allocatorincome');
			
			die();
			
		} 			
		//Have an ID, updating existing record
		$result = $this->allocatorincome_model->update(1, $record);
        if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_allocatorincome', 'refresh');
		
		die();
			
		//if
	}
}
?>