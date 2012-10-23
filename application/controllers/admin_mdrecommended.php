<?php

class Admin_mdrecommended extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Admin_mdrecommended()
	{
		parent::Controller();	
		
		//load language   

		//load module
		$this->load->model('mdrecommended_model');
		$this->mr['title'] = 'MD Recommended Manager';
	}
	
	function _output()
	{
		$this->mr['mdr_portfoliovalue'] = format_currency($this->mr['mdr_portfoliovalue']);
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
		$this->mysmarty->assign('tpl_center','mdrecommended/index.tpl');
		$this->mr = $this->mdrecommended_model->get(1);
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		if($this->session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
	}
	
	function save()
	{
		$this->load->library('validation');

		$this->load->view('admin_mdrecommended/mdrecommended_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'mdr_sa_sp500' => $this->validation->mdr_sa_sp500,
			'mdr_sa_russell2000value' => $this->validation->mdr_sa_russell2000value,
			'mdr_sa_russellmicrocap' => $this->validation->mdr_sa_russellmicrocap,
			'mdr_sa_mscieafe' => $this->validation->mdr_sa_mscieafe,
			'mdr_sa_msciemergingmarkets' => $this->validation->mdr_sa_msciemergingmarkets,
			'mdr_sa_ftse' => $this->validation->mdr_sa_ftse,
			'mdr_sa_dowjones' => $this->validation->mdr_sa_dowjones,
			'mdr_sa_spworld' => $this->validation->mdr_sa_spworld,
			'mdr_sa_ustreasury' => $this->validation->mdr_sa_ustreasury,
			'mdr_sa_uslong' => $this->validation->mdr_sa_uslong,
			'mdr_sa_jpmorgan' => $this->validation->mdr_sa_jpmorgan,
			'mdr_sa_goldman' => $this->validation->mdr_sa_goldman,
			'mdr_sa_gold' => $this->validation->mdr_sa_gold,
			
			'mdr_5ar_sp500' => $this->validation->mdr_5ar_sp500,
			'mdr_5ar_russell2000value' => $this->validation->mdr_5ar_russell2000value,
			'mdr_5ar_russellmicrocap' => $this->validation->mdr_5ar_russellmicrocap,
			'mdr_5ar_mscieafe' => $this->validation->mdr_5ar_mscieafe,
			'mdr_5ar_msciemergingmarkets' => $this->validation->mdr_5ar_msciemergingmarkets,
			'mdr_5ar_ftse' => $this->validation->mdr_5ar_ftse,
			'mdr_5ar_dowjones' => $this->validation->mdr_5ar_dowjones,
			'mdr_5ar_spworld' => $this->validation->mdr_5ar_spworld,
			'mdr_5ar_ustreasury' => $this->validation->mdr_5ar_ustreasury,
			'mdr_5ar_uslong' => $this->validation->mdr_5ar_uslong,
			'mdr_5ar_jpmorgan' => $this->validation->mdr_5ar_jpmorgan,
			'mdr_5ar_goldman' => $this->validation->mdr_5ar_goldman,
			'mdr_5ar_gold' => $this->validation->mdr_5ar_gold,	
			
			'mdr_portfoliovalue' => $this->validation->mdr_portfoliovalue,	
			
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_mdrecommended');
			
			die();
			
		} 
		
		$record['mdr_portfoliovalue'] = str_replace('$','',$this->input->post('mdr_portfoliovalue'));
		$record['mdr_portfoliovalue'] = str_replace(',','',$record['mdr_portfoliovalue']);
		
		$total = $record['mdr_sa_sp500'] + $record['mdr_sa_russell2000value'] + $record['mdr_sa_russellmicrocap'] + $record['mdr_sa_mscieafe'] + $record['mdr_sa_msciemergingmarkets'] + $record['mdr_sa_ftse'] + $record['mdr_sa_dowjones'] + $record['mdr_sa_spworld'] + $record['mdr_sa_ustreasury'] + $record['mdr_sa_uslong'] + $record['mdr_sa_jpmorgan'] + $record['mdr_sa_goldman'] + $record['mdr_sa_gold'];
		if ($total!=100)
		{
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_percent_error_return'),2));
			redirect('admin_mdrecommended','refresh');
			
			die();
			
		}
			
				//Have an ID, updating existing record
		$result = $this->mdrecommended_model->update(1, $record);
        if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_mdrecommended', 'refresh');
		
		die();
			
		//if
	}
	
	function valid_portfoliovalue(){
		$tmp = str_replace('$','',$this->input->post('mdr_portfoliovalue'));
		$tmp = str_replace(',','',$tmp);
		if ($tmp>0)
			return true;
		else
			return false;
	}
	
}
?>