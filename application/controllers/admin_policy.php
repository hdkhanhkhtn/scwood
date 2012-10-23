<?php

class Admin_policy extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_policy()
	{
		parent::Controller();	
		
		//load module
		$this->load->model('policy_model');
		
		$this->mr['title'] = 'Policy';
		
		$this->search = array('keyword' => '','page' => 0);
		
		$this->native_session->keep_flashdata('sess_search');
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql()
	{ 
		if($this->search['keyword'] ) $this->db->like('policy_name', $this->search['keyword']);  
		
	}


	function search()
	{
		if($this->native_session->flashdata('sess_search')){
			
			$this->search = $this->native_session->flashdata('sess_search');	
		}
		
		if($this->input->post('txt_keyword') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');

		}
		
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['type']))
		{
			$this->search['type'] = $par['type'];

		}
		
		//get current page
		
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		
		//assign key word
		$this->mr['keyword'] = $this->search['keyword'];
		
		$this->native_session->set_flashdata('sess_search',$this->search);

		$this->showlist();

	}
	
	function index()
	{	
		$this->native_session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
		
	}
	
	function showlist()
	{
		
		$this->mysmarty->assign('tpl_center','policy/list.tpl');
		
		//paging
		$this->where_sql();
		
		$total_rows = $this->policy_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_policy/search/page/');
	
		//run sql
		$this->where_sql();
			
		$this->mlist = $this->policy_model->get();
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','policy/frm.tpl');
		
		if($this->native_session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		$this->mr['policy_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','policy/frm.tpl');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->policy_model->get($id);
			
				if($data) $this->mr = array_merge($this->mr,$data);
			}
		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['policy_active'] = $par['status'];
		
		$policy_id = $this->policy_model->update($par['id'], $record);
		
		if($policy_id)
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_policy/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$policy_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_policy/policy_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'policy_name' => $this->validation->txt_name,
			'policy_desc' => $this->validation->txt_desc,
			'policy_order' => $this->validation->txt_order,
			'policy_active' => $this->validation->sel_status,
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($policy_id)redirect('admin_policy/edit/id/'.$policy_id);
			
			else redirect('admin_policy/create');
			
			die();
			
		} else {
			
			if(!$policy_id){
				// No ID, adding new record
				$result = $this->policy_model->insert($record);
                if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->policy_model->update($policy_id, $record);
                if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($this->input->post('btn_save_add')){
				redirect('admin_policy/create', 'refresh');
			}else{
				redirect('admin_policy/search', 'refresh');
			}
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','policy/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->policy_model->delete($par['id']);

        if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_policy', 'refresh');

		die();

	}
	
	function saveall()
	{
		
		$arr_id = $this->input->post('chk_id');
		
		if(is_array($arr_id)){
			
			//do with action select
			$sel_action = $this->input->post('sel_action');
		
			if($sel_action == 'delete')
			{
				$id = $this->policy_model->delete($arr_id);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('policy_active' => 0);
				$id = $this->policy_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('policy_active' => 1);
				$id = $this->policy_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_policy/search', 'refresh');
		
		die();
	
	}
}
?>