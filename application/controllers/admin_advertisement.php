<?php

class Admin_advertisement extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_advertisement()
	{
		parent::Controller();	
				
		//load module
		$this->load->model('advertisement_model');
		
		$this->mr['title'] = 'Advertisement';
		
		$this->search = array('keyword' => '','sel_type'=>'','page' => 0);
		
		$this->session->set_flashdata('sess_search',$this->search);
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function where_sql()
	{ 
		if ($this->search['keyword'])
		{
			$this->db->like('adv_name',$this->search['keyword']);
		}
		
		if ($this->search['sel_type'])
		{
			$this->db->where('adv_position',$this->search['sel_type']);
		}
		
		 
	}
	
	function search()
	{
		if($this->session->flashdata('sess_search'))
		{	
			$this->search = $this->session->flashdata('sess_search');	
		}
				
		if($this->input->post('txt_keyword') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');
		}
		
		if($this->input->post('sel_type') !== false)
		{
			$this->search['sel_type'] = $this->input->post('sel_type');
		}
		
		//get current page
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		
		//assign key word
		$this->mr['keyword'] = $this->search['keyword'];
		
		$str_tmp = 'type'.$this->search['sel_type'].'_selected';
		$this->mr[$str_tmp] = 'selected';
		
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
		
		$this->mysmarty->assign('tpl_center','advertisement/list.tpl');
		
		//paging
		$this->where_sql();
		
		$total_rows = $this->advertisement_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_advertisement/search/page/');
	
		//run sql
		$this->where_sql();
			
		$this->mlist = $this->advertisement_model->get();
		
		if(is_array($this->mlist))
		{
			for($i = 0; $i < count($this->mlist); $i++)
			{
			$this->mlist[$i]['adv_expired_date'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['adv_expired_date']);	
			}
		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','advertisement/frm.tpl');
		
		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		$this->mr['adv_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','advertisement/frm.tpl');
		
		if($this->session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
			
		}else{
		
			$par = $this->uri->uri_to_assoc(3);
			
			$id = isset($par['id'])?$par['id']:'';
			
			if($id)
			{
				$data = $this->advertisement_model->get($id);
			
				if($data)
				{	
					$this->mr = array_merge($this->mr,$data);
					$this->mr['adv_begin_date'] = format_intdate($this->site['site_short_date'],$this->mr['adv_begin_date']);
					$this->mr['adv_expired_date'] = format_intdate($this->site['site_short_date'],$this->mr['adv_expired_date']);	
				}
			}
			
		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['adv_active'] = $par['status'];
		
		$cat_id = $this->advertisement_model->update($par['id'], $record);
		
		if($cat_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_advertisement/search', 'refresh');
		
		die();
			
	}
	
	function image()
	{
		$this->mysmarty->assign('tpl_center','advertisement/frm_image.tpl');
		
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
				$data = $this->advertisement_model->get($id);
				
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
			$path_filedel = './uploads/adv/'.$hd_old_image;
		else	
			$path_filedel = '';
		
		if($chk_delfile)
		{
			if(file_exists($path_filedel)) unlink($path_filedel);
			
			$record['adv_image'] = '';

			$result = $this->advertisement_model->update($hd_id, $record);
		}
				
		if($_FILES['attach_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/adv/';
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
				
				$record['adv_image'] = $upload_data['file_name'];

				$result = $this->advertisement_model->update($hd_id, $record);
				
				if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
				
		}// if FILE
				
		redirect('admin_advertisement/image/id/'.$hd_id,'refresh');

		die();
		
	}
	
	function save()
	{
		
		$hd_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_advertisement/adv_validation.php', '', FALSE); // field validation
		
		$record = array(
				
			'adv_name' => $this->validation->txt_name,
			'adv_url' => $this->validation->txt_url,
			
			'adv_begin_date' => $this->validation->txt_begin,
			'adv_expired_date' => $this->validation->txt_expired,
			
			'adv_position' => $this->validation->sel_position,
			'adv_open' => $this->validation->sel_open,
			'adv_active' => $this->validation->sel_active,
		);
		
        if(strpos($record['adv_url'],'http://')=== false) $record['adv_url'] = 'http://'.$record['adv_url'];
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($hd_id)redirect('admin_advertisement/edit/id/'.$hd_id);
			
			else redirect('admin_advertisement/create');
			
			die();
			
		} else {
			
			$record['adv_begin_date'] = get_strdate($record['adv_begin_date']);
			$record['adv_expired_date'] = get_strdate($record['adv_expired_date']);
			
			if(!$hd_id){
				// No ID, adding new record
				$result = $this->advertisement_model->insert($record);
				
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->advertisement_model->update($hd_id, $record);
				
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($hd_id)redirect('admin_advertisement/edit/id/'.$hd_id,'refresh');
			
			if($result)
				redirect('admin_advertisement/edit/id/'.$result, 'refresh');
			else	
				redirect('admin_advertisement/create', 'refresh');
				
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','advertisement/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->advertisement_model->delete($par['id']);

        if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_advertisement', 'refresh');

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
				$id = $this->advertisement_model->delete($arr_id);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_active == 'active')
			{
				$data = array('advertisement_active' => 1);
				$id = $this->advertisement_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_type == 'blocked')
			{
				$data = array('advertisement_active' => 0);
				$id = $this->advertisement_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_advertisement/search', 'refresh');
		
		die();
	
	}
}
?>