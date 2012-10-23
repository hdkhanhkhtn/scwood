<?php

class Admin_user extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_user()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('customer', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('user_model');
		
		$this->mr['title'] = 'User';
		
		$this->search = array('keyword' => '','page' => 0);
		
		$this->native_session->keep_flashdata('sess_search');
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql($kw)
	{
		$this->db->where('user_id', $kw); 
		$this->db->like('user_name', $kw); 
		$this->db->or_like('user_username', $kw); 
	}
	
	function search()
	{
		
		if($this->input->post('txt_keyword') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');

		}elseif($this->native_session->flashdata('sess_search')){
			
			$this->search = $this->native_session->flashdata('sess_search');	
		}
		
		//get current page
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		$this->native_session->set_flashdata('sess_search',$this->search);
		
		//assign keyword
		$this->mr['keyword'] = $this->search['keyword'];
		
		$this->showlist();

	}
	
	function index()
	{	
		$this->native_session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
		
	}
	
	function showlist()
	{
		
		$this->mysmarty->assign('tpl_center','user/list.tpl');
		
		//paging
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$total_rows = $this->user_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_user/search/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/admin_user/search/page/');
	
		//run sql
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$this->mlist = $this->user_model->get();
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','user/frm.tpl');
		
		if($this->native_session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		$this->mr['user_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','user/frm.tpl');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->user_model->get($id);
			
				if($data) $this->mr = array_merge($this->mr,$data);
			}
		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['user_active'] = $par['status'];
		
		$user_id = $this->user_model->update($par['id'], $record);
		
		if($user_id)
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_user/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$user_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_user/user_validation.php', '', FALSE); // field validation
		
		$record = array(
			'user_username' => $this->validation->txt_username,
			'user_name' => $this->validation->txt_name,
			'user_email' => $this->validation->txt_email,
			'user_pass' => $this->validation->txt_pass,
		);

        if(!$record['user_pass']){
           unset($record['user_pass']);
        }else{
           $record['user_pass'] = md5($record['user_pass']);
        }

		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($user_id)redirect('admin_user/edit/id/'.$user_id);
			
			else redirect('admin_user/create');
			
			die();
			
		} else {
			
			if(!$user_id){
				// No ID, adding new record
				$result = $this->user_model->insert($record);
                if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->user_model->update($user_id, $record);
                if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($this->input->post('btn_save_add')){
				redirect('admin_user/create', 'refresh');
			}else{
				redirect('admin_user/search', 'refresh');
			}
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','user/list.tpl');

		$par = $this->uri->uri_to_assoc(3);

		$id = $this->user_model->delete($par['id']);

        if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_user', 'refresh');

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
				$id = $this->user_model->delete($arr_id);
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('user_active' => 0);
				$id = $this->user_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('user_active' => 1);
				$id = $this->user_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_user/search', 'refresh');
		
		die();
	
	}
}
?>