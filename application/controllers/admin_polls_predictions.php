<?php

class Admin_polls_predictions extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_polls_predictions()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('faq_qna', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('polls_predictions_model');
		
		$this->mr['title'] = 'Polls & Predictions';
		
		$this->search = array('keyword' => '','pollid'=>'', 'page' => 0);
		
		if($this->session->flashdata('sess_search'))
		{	
			$this->search = $this->session->flashdata('sess_search');
			
			$this->session->keep_flashdata('sess_search');	
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
			$this->db->like('polldt_question',$this->search['keyword']); 
		} 
			
		$this->db->where('polldt_poll_id', $this->search['pollid']); 
		 
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
		
		$this->session->set_flashdata('sess_search',$this->search);

		$this->showlist();

	}
	
	function index()
	{	
		$par = $this->uri->uri_to_assoc(3);
		
		$pollid = isset($par['pollid'])?$par['pollid']:'';
		
		if($pollid) $this->search['pollid'] = $pollid;
			
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
		
	}
	
	function showlist()
	{
		
		$this->mysmarty->assign('tpl_center','polldt/list.tpl');
		
		//paging
		$this->where_sql();
		
		$total_rows = $this->polldt_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_polldt/search/page/');
	
		//run sql
		$this->where_sql();
			
		$this->mlist = $this->polldt_model->get();
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','polldt/frm.tpl');
		
		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		$this->mr['polldt_active'] = 1;
		
		$this->mr['polldt_order'] = 1;
		
		$this->mr['polldt_counter'] = 1;
		
		$this->mr['polldt_poll_id'] = $this->search['pollid'];
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','polldt/frm.tpl');
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->polldt_model->get($id);
			
				if($data) $this->mr = array_merge($this->mr,$data);
			}

		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['polldt_active'] = $par['status'];
		
		$polldt_id = $this->polldt_model->update($par['id'], $record);
		
		if($polldt_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_polldt/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$hd_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_polldt/polldt_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'polldt_answer' => $this->validation->txt_answer,
			'polldt_counter' => $this->validation->txt_counter,
			'polldt_order' => $this->validation->txt_order,
			'polldt_active' => $this->validation->sel_status,
		);
		$record['polldt_poll_id'] = $this->search['pollid'];
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($hd_id)redirect('admin_polldt/edit/id/'.$hd_id);
			
			else redirect('admin_polldt/create');
			
			die();
			
		} else {
			
			if(!$hd_id){
				// No ID, adding new record
				$result = $this->polldt_model->insert($record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->polldt_model->update($hd_id, $record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($this->input->post('btn_save_add')){
				redirect('admin_polldt/create', 'refresh');
			}else{
				redirect('admin_polldt/search', 'refresh');
			}
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','polldt/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->polldt_model->delete($par['id']);

        if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_polldt', 'refresh');

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
				$id = $this->polldt_model->delete($arr_id);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('polldt_active' => 0);
				$id = $this->polldt_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('polldt_active' => 1);
				$id = $this->polldt_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_polldt/search', 'refresh');
		
		die();
	
	}
}
?>