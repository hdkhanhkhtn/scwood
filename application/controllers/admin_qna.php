<?php

class Admin_qna extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_qna()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('faq_qna', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('qna_model');
		
		$this->mr['title'] = 'Q&A';
		
		$this->search = array('keyword' => '', 'page' => 0);
		
		$this->session->keep_flashdata('sess_search');
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql($kw)
	{ 
		$this->db->like('qna_question', $kw); 
		 
	}
	
	function search()
	{
		if($this->input->post('txt_keyword') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');

		}elseif($this->session->flashdata('sess_search')){
			
			$this->search = $this->session->flashdata('sess_search');	
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
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
		
	}
	
	function showlist()
	{
		
		$this->mysmarty->assign('tpl_center','qna/list.tpl');
		
		//paging
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$total_rows = $this->qna_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_qna/search/page/');
	
		//run sql
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
			
		$this->mlist = $this->qna_model->get();
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','qna/frm.tpl');
		
		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		$this->mr['qna_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','qna/frm.tpl');
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$data = $this->qna_model->get($par['id']);
			
			$this->mr = array_merge($this->mr,$data);
		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['qna_active'] = $par['status'];
		
		$qna_id = $this->qna_model->update($par['id'], $record);
		
		if($qna_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_qna/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$user_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_qna/qna_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'qna_question' => $this->validation->txt_question,
			'qna_answer' => $this->validation->txt_answer,
			'qna_order' => $this->validation->txt_order,
			'qna_active' => $this->validation->sel_status,
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($user_id)redirect('admin_qna/edit/id/'.$user_id);
			
			else redirect('admin_qna/create');
			
			die();
			
		} else {
			
			if(!$user_id){
				// No ID, adding new record
				$result = $this->qna_model->insert($record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->qna_model->update($user_id, $record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			

			redirect('admin_qna/search', 'refresh');
		
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','qna/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->qna_model->delete($par['id']);

        if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_qna', 'refresh');

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
				$id = $this->qna_model->delete($arr_id);
				$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('qna_active' => 0);
				$id = $this->qna_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('qna_active' => 1);
				$id = $this->qna_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_qna/search', 'refresh');
		
		die();
	
	}
}
?>