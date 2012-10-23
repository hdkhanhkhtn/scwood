<?php

class Admin_bbs extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;
	
	function Admin_bbs()
	{
		parent::Controller();
		
		//load language
		$this->lang->load('bbs', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
			
		//load model
		$this->load->model('bbs_model');
		
		//title
		$this->mr['title'] = 'BBS';
		
		$this->search = array('keyword' => '','page' => 0);
		
		$this->session->keep_flashdata('sess_search');
		
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql($search)
	{
		$this->db->where('bbs_active',1);
			
		if($search['keyword'])
		{
			$keyword = $this->db->escape_str($search['keyword']);
			$sql ="(bbs_user LIKE '%".$keyword."%' "; 
			$sql.=" OR bbs_title LIKE '%".$keyword."%' "; 
			$sql.= " OR bbs_content LIKE '%".$keyword."%')";
			$this->db->where($sql);
			
		}

	}
	
	function search()
	{	
		if($this->input->post('txt_keyword') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');
		
		}
		elseif($this->session->flashdata('sess_search'))
		{
			$this->search = $this->session->flashdata('sess_search');	
		}
		
		// pid
		$par = $this->uri->uri_to_assoc(3);
		
		if(isset($par['pid'])) $this->search['pid'] = $par['pid'];
		
	
		//get current page
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
		$this->mysmarty->assign('tpl_center','bbs/list.tpl');
		
		//
		if($this->search['keyword'])$this->where_sql($this->search);

		//paging
		$total_rows = $this->bbs_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_bbs/search/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/admin_bbs/search/page/');
		
		//run sql
		if($this->search['keyword'])$this->where_sql($this->search);
		
		$this->mlist = $this->bbs_model->get();
		
		if(is_array($this->mlist))
		{
			for($i = 0; $i < count($this->mlist); $i++)
			{
				$this->mlist[$i]['bbs_time'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['bbs_time']);	
						
				$str_count =  substr_count($this->mlist[$i]['bbs_level'], '|');
				
				if($str_count >= 1)$this->mlist[$i]['bbs_span'] = str_repeat("&nbsp;&nbsp;",$str_count);
			
			}
		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
	}
	
	
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','bbs/frm.tpl');

		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		//set default load
		$this->mr['bbs_active'] = 1;

		if($this->session->flashdata('sess_search')){
			$this->search = $this->session->flashdata('sess_search');
		}
		if($this->search['pid']) {
			$row = $this->bbs_model->get($this->search['pid']);
			$this->mr['bbs_pid'] = $this->search['pid'];
			$this->mr['bbs_ptitle'] = $row['bbs_title'];
			
		}
		
	}
	
	
	function edit()
	{
	
		$this->mysmarty->assign('tpl_center','bbs/frm.tpl');
	
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$data = $this->bbs_model->get($par['id']);
			
			$this->mr = array_merge($this->mr,$data);
			
			$this->mr['bbs_time'] = format_intdate($this->site['site_short_date'],$this->mr['bbs_time']);		
		}

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['bbs_active'] = $par['status'];
		
		$bbs_id = $this->bbs_model->update($par['id'], $record);
		
		if($bbs_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error')));
			
		redirect('admin_bbs/search', 'refresh');
		
		die();
			
	}
	
	function attach()
	{
		$this->mysmarty->assign('tpl_center','bbs/frm_attach.tpl');
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$data = $this->bbs_model->get($par['id']);
			
			$this->mr = array_merge($this->mr,$data);	
		}
		
			
	}
	
	function attach_sm()
	{
		$hd_id = $this->input->post('hd_id');
		
		$hd_old_image = $this->input->post('hd_old_image');
		
		$chk_delfile = $this->input->post('chk_delfile');
		
		if($hd_old_image) 
			$path_filedel = './uploads/bbs/'.$hd_old_image;
		else	
			$path_filedel = '';
		
		if($chk_delfile)
		{
			if(file_exists($path_filedel)) unlink($path_filedel);
			
			$record['bbs_attach'] = '';

			$result = $this->bbs_model->update($hd_id, $record);
		}
				
		if($_FILES['attach_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/bbs/';
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
				
				$record['bbs_attach'] = $upload_data['file_name'];

				$result = $this->bbs_model->update($hd_id, $record);
				
				if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
				
		}// if FILE
				
		redirect('admin_bbs/attach/id/'.$hd_id,'refresh');

		die();
		
		
	}
	
	function save()
	{
		
		$bbs_id = $this->input->post('hd_id');
		
		$this->load->library('validation');
		
		$this->load->view('admin_bbs/bbs_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'bbs_content' => $this->validation->txt_content,
			'bbs_title' => $this->validation->txt_title,
			'bbs_user' => $this->validation->txt_name,
			'bbs_email' => $this->validation->txt_email,
			'bbs_order' => $this->validation->txt_order,
			'bbs_active' => $this->validation->sel_status,
			
		);

		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_bbs/edit/id/'.$bbs_id);
			
			die();
			
		} else {

			//Have an ID, updating existing record
			$this->bbs_model->update($bbs_id, $record);
			$this->session->set_flashdata('msg_success',$this->lang->line('msg_data_save'));
		}	

		redirect('admin_bbs/search', 'refresh');
		
		die();

	}
	
	function delete()
	{
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->bbs_model->delete($par['id']);

        $this->session->set_flashdata('msg_success',$this->lang->line('msg_data_del')); 
		
		redirect('admin_bbs/search', 'refresh');
		
		die();
		
	}
	
	function saveall()
	{
		
		$arr_id = $this->input->post('chk_id');
		
		if(is_array($arr_id)){
			
			//do with action select
			$sel_action = $this->input->post('sel_action');
		
			if($sel_action == 'delete'){
				$id = $this->bbs_model->delete($arr_id);
				
			}elseif($sel_action == 'block'){
				$data = array('bbs_active' => 0);
				$id = $this->bbs_model->update($arr_id,$data);
				
			}elseif($sel_action == 'active'){
				$data = array('bbs_active' => 1);
				$id = $this->bbs_model->update($arr_id,$data);
			}
			
			$this->session->set_flashdata('msg_success',$this->lang->line('msg_data_save'));
		
		}else{
		
			$this->session->set_flashdata('msg_error',$this->lang->line('msg_data_error'));
		}
		

		redirect('admin_bbs/search', 'refresh');
		
		die();
	
	}
	
}
?>