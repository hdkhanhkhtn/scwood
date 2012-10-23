<?php

class Admin_brand extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_brand()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('faq_qna', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('brand_model');
		
		$this->mr['title'] = 'brand';
		
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
		 
		$this->db->like('brand_name', $kw); 
		 
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
		
		$this->mysmarty->assign('tpl_center','brand/list.tpl');
		
		//paging
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$total_rows = $this->brand_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_brand/search/page/');
	
		//run sql
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
			
		$this->mlist = $this->brand_model->get();
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','brand/frm.tpl');
		
		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		$this->mr['brand_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','brand/frm.tpl');
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->brand_model->get($id);
			
				if($data) $this->mr = array_merge($this->mr,$data);
			}
			
		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['brand_active'] = $par['status'];
		
		$brand_id = $this->brand_model->update($par['id'], $record);
		
		if($brand_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_brand/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$hd_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_brand/brand_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'brand_name' => $this->validation->txt_name,
			'brand_desc' => $this->validation->txt_desc,
			'brand_order' => $this->validation->txt_order,
			'brand_active' => $this->validation->sel_status,
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($hd_id)redirect('admin_brand/edit/id/'.$hd_id);
			
			else redirect('admin_brand/create');
			
			die();
			
		} else {
			
			if(!$hd_id){
				// No ID, adding new record
				$result = $this->brand_model->insert($record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->brand_model->update($hd_id, $record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($this->input->post('btn_save_add')){
				redirect('admin_brand/create', 'refresh');
			}else{
				redirect('admin_brand/search', 'refresh');
			}
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','brand/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->brand_model->delete($par['id']);

        if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_brand', 'refresh');

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
				$id = $this->brand_model->delete($arr_id);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('brand_active' => 0);
				$id = $this->brand_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('brand_active' => 1);
				$id = $this->brand_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_brand/search', 'refresh');
		
		die();
	
	}
}
?>