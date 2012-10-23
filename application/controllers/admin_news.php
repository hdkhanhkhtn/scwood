<?php

class Admin_news extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_news()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('faq_qna', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('news_model');
		
		$this->mr['title'] = 'News';
		
		$this->search = array('keyword' => '','page' => 0);
		
		$this->session->set_flashdata('sess_search',$this->search);
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql($kw)
	{ 
		$this->db->like('news_title', $kw); 
		 
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
		
		$this->mysmarty->assign('tpl_center','news/list.tpl');
		
		//paging
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$total_rows = $this->news_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_news/search/page/');
	
		//run sql
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
			
		$this->mlist = $this->news_model->get();
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','news/frm.tpl');
		
		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		$this->mr['news_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','news/frm.tpl');
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->news_model->get($id);
			
				if($data) $this->mr = array_merge($this->mr,$data);
			}
			
		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['news_active'] = $par['status'];
		
		$cat_id = $this->news_model->update($par['id'], $record);
		
		if($cat_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_news/search', 'refresh');
		
		die();
			
	}
	
	function image()
	{
		$this->mysmarty->assign('tpl_center','news/frm_image.tpl');
		
		$this->show_detail();	
	}
	
	function show_detail()
	{
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->news_model->get($id);
				
				if($data) $this->mr = array_merge($this->mr,$data);
			}

		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
	}
	
	function image_sm()
	{
		$hd_id = $this->input->post('hd_id');
		
		$hd_old_image = $this->input->post('hd_old_image');
		
		$chk_delfile = $this->input->post('chk_delfile');
		
		if($hd_old_image) 
			$path_filedel = './uploads/news/'.$hd_old_image;
		else	
			$path_filedel = '';
		
		if($chk_delfile)
		{
			if(file_exists($path_filedel)) unlink($path_filedel);
			
			$record['news_image'] = '';

			$result = $this->news_model->update($hd_id, $record);
		}
				
		if($_FILES['attach_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/news/';
			$config['allowed_types'] = 'gif|jpg|png|jped';
			$config['max_size']	= '2000';
			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('attach_1'))
			{
				$error['frm_error'] = $this->upload->display_errors();
				
				$this->session->set_flashdata('frm',$error); 
				
			}
			else
			{	
				// delete old image
				if(file_exists($path_filedel)) unlink($path_filedel);
					
				$upload_data = $this->upload->data();
				
				$record['news_image'] = $upload_data['file_name'];

				$result = $this->news_model->update($hd_id, $record);
				
				if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
				
		}// if FILE
				
		redirect('admin_news/image/id/'.$hd_id,'refresh');

		die();
		
	}
	
	function save()
	{
		
		$hd_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_news/news_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'news_title' => $this->validation->txt_title,
			'news_comment' => $this->validation->txt_comment,
			'news_content' => $this->validation->txt_content,
			'news_active' => $this->validation->sel_active,
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($hd_id)redirect('admin_news/edit/id/'.$hd_id);
			
			else redirect('admin_news/create');
			
			die();
			
		} else {
			if(!$hd_id){
				// No ID, adding new record
				$result = $this->news_model->insert($record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->news_model->update($hd_id, $record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($hd_id)redirect('admin_news/edit/id/'.$hd_id);
			
			if($result)
				redirect('admin_news/edit/id/'.$result, 'refresh');
			else	
				redirect('admin_news/create', 'refresh');
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','news/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->news_model->delete($par['id']);

        if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_news', 'refresh');

		die();

	}
	
	function saveall()
	{
		
		$arr_id = $this->input->post('chk_id');
		
		if(is_array($arr_id)){
			
			//do with action select
			$sel_active = $this->input->post('sel_action');
		
			if($sel_active == 'delete')
			{
				$id = $this->news_model->delete($arr_id);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_active == 'active')
			{
				$data = array('news_active' => 1);
				$id = $this->news_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_type == 'blocked')
			{
				$data = array('news_active' => 0);
				$id = $this->news_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_news/search', 'refresh');
		
		die();
	
	}
}
?>