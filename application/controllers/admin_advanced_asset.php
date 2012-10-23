<?php

class Admin_advanced_asset extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Admin_advanced_asset()
	{
		parent::Controller();	
		$this->load->model('advanced_asset_model');
		$this->mr['title'] = 'Advanced asset allocation manager';
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
		
		$this->mysmarty->assign('tpl_center','advanced_asset/index.tpl');
		$this->mr = $this->advanced_asset_model->get(1);
		$this->mr['advanced_asset_asof'] = format_intdate($this->site['site_short_date'],$this->mr['advanced_asset_asof']);
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		if($this->session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
	}
	
	function save()
	{
		$this->load->library('validation');

		$this->load->view('admin_advanced_asset/advanced_asset_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'advanced_asset_asof' => $this->validation->advanced_asset_asof,
			'advanced_asset_sp500' => $this->validation->advanced_asset_sp500,
			'advanced_asset_russell2000value' => $this->validation->advanced_asset_russell2000value,
			'advanced_asset_russellmicrocap' => $this->validation->advanced_asset_russellmicrocap,
			'advanced_asset_mscieafe' => $this->validation->advanced_asset_mscieafe,
			'advanced_asset_msciemergingmarkets' => $this->validation->advanced_asset_msciemergingmarkets,
			'advanced_asset_ftse' => $this->validation->advanced_asset_ftse,
			'advanced_asset_dowjones' => $this->validation->advanced_asset_dowjones,
			'advanced_asset_spworld' => $this->validation->advanced_asset_spworld,
			'advanced_asset_ustreasury' => $this->validation->advanced_asset_ustreasury,
			'advanced_asset_uslong' => $this->validation->advanced_asset_uslong,
			'advanced_asset_jpmorgan' => $this->validation->advanced_asset_jpmorgan,
			'advanced_asset_goldman' => $this->validation->advanced_asset_goldman,
			'advanced_asset_gold' => $this->validation->advanced_asset_gold,
			'advanced_asset_mdrpsd' => $this->validation->advanced_asset_mdrpsd,
			'advanced_asset_rfr' => $this->validation->advanced_asset_rfr,
			'advanced_asset_sd500_sd' => $this->validation->advanced_asset_sd500_sd,
			'advanced_asset_tipssd' => $this->validation->advanced_asset_tipssd,
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_advanced_asset');
			
			die();
			
		} 
		
		if ($record['advanced_asset_sp500']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_sp500'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_russell2000value']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_russell2000value'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_russellmicrocap']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_russellmicrocap'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_mscieafe']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_mscieafe'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_msciemergingmarkets']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_msciemergingmarkets'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_ftse']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_ftse'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_dowjones']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_dowjones'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_spworld']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_spworld'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_ustreasury']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_ustreasury'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_uslong']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_uslong'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_jpmorgan']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_jpmorgan'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_goldman']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_goldman'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_gold']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_gold'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_mdrpsd']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_mdrpsd'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}	
		if ($record['advanced_asset_rfr']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_rfr'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_sd500_sd']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_sd500_sd'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}
		if ($record['advanced_asset_tipssd']<0)
    	{
    		$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_tipssd'),2));
			redirect('admin_advanced_asset','refresh');
			die();
		}	
		
		$record['advanced_asset_asof'] = get_strdate($record['advanced_asset_asof'],$this->site['site_short_date']);
		
		$result = $this->advanced_asset_model->update(1, $record);
        if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_advanced_asset', 'refresh');
		
		die();
			
		//if
	}
	
	function valid_asof()
	{//$this->site['site_short_date']
		$tmp = $this->input->post('advanced_asset_asof');
		$arr = explode('/', $tmp);
		if (!count($arr)==3)
		{	$this->validation->set_message('valid_asof', 'Your As of field must contain a date.');
			return false;
		}
		elseif (!checkdate($arr[0],$arr[1],$arr[2]))
		{
			$this->validation->set_message('valid_asof', 'Your As of field must contain a date.');
			return false;
		}
		else
			return true;
	}
	
}
?>