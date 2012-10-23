<?php

class Admin_policydt extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_policydt()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('faq_qna', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('policydt_model');
		
		$this->mr['title'] = 'Policy';
		
		$this->search = array('keyword' => '','policyid'=>'', 'page' => 0);
		
		if($this->native_session->flashdata('sess_search'))
		{	
			$this->search = $this->native_session->flashdata('sess_search');
			
			$this->native_session->keep_flashdata('sess_search');	
		}
		
		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql()
	{
		if($this->search['keyword'])
		{
			$this->db->like('policydt_title',$this->search['keyword']); 
		} 
			
		$this->db->where('policydt_pid', $this->search['policyid']); 
		 
	}
	
	function search()
	{
		if($this->input->post('txt_keyword') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');

		}
		
		//get current page
		$par = $this->uri->uri_to_assoc(3);
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
		$par = $this->uri->uri_to_assoc(3);
		
		$policyid = isset($par['policyid'])?$par['policyid']:'';
		
		if($policyid) $this->search['policyid'] = $policyid;
			
		$this->native_session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
		
	}
	
	function showlist()
	{
		
		$this->mysmarty->assign('tpl_center','policydt/list.tpl');
		
		//paging
		$this->where_sql();
		
		$total_rows = $this->policydt_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_policydt/search/page/');
	
		//run sql
		$this->where_sql();
			
		$this->mlist = $this->policydt_model->get();
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','policydt/frm.tpl');
		
		if($this->native_session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		$this->mr['policydt_active'] = 1;
		
		$this->mr['policydt_order'] = 1;
		
		$this->mr['policydt_pid'] = $this->search['policyid'];
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','policydt/frm.tpl');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->policydt_model->get($id);
			
				if($data) $this->mr = array_merge($this->mr,$data);
			}

		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['policydt_active'] = $par['status'];
		
		$policydt_id = $this->policydt_model->update($par['id'], $record);
		
		if($policydt_id)
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_policydt/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$hd_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_policydt/policydt_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'policydt_title' => $this->validation->txt_title,
			'policydt_body' => $this->validation->txt_body,
			'policydt_order' => $this->validation->txt_order,
			'policydt_active' => $this->validation->sel_status,
		);
		$record['policydt_pid'] = $this->search['policyid'];
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($hd_id)redirect('admin_policydt/edit/id/'.$hd_id);
			
			else redirect('admin_policydt/create');
			
			die();
			
		} else {
			
			if(!$hd_id){
				// No ID, adding new record
				$result = $this->policydt_model->insert($record);
                if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->policydt_model->update($hd_id, $record);
                if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($this->input->post('btn_save_add')){
				redirect('admin_policydt/create', 'refresh');
			}else{
				redirect('admin_policydt/search', 'refresh');
			}
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','policydt/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->policydt_model->delete($par['id']);

        if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_policydt', 'refresh');

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
				$id = $this->policydt_model->delete($arr_id);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('policydt_active' => 0);
				$id = $this->policydt_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('policydt_active' => 1);
				$id = $this->policydt_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_policydt/search', 'refresh');
		
		die();
	
	}
}
?>