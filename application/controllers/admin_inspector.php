<?php

class Admin_inspector extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_inspector()
	{
		parent::Controller();
			
		//load language
		$this->lang->load('inspector', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
        
		$this->load->model('inspector_model');
		
		$this->mr['title'] = 'Inpsector';
		
		$this->search = array('keyword' => '','page' => 0,'field'=>'name','sort_type'=>'asc');
		
		$this->native_session->keep_flashdata('sess_search');
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function showlist()
	{
		$this->mysmarty->assign('tpl_center','inspector/index.tpl');
		
		//paging
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$total_rows = $this->inspector_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_inspector/search/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/admin_customer/search/page/');
		
		//run sql
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		$this->db->order_by($this->search['field'], $this->search['sort_type']);
		$this->mlist = $this->inspector_model->get();
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		if($this->native_session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
	}
	
	function where_sql($kw)
	{
		$this->db->like('name', $kw); 
		$this->db->or_like('license',$kw); 
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
		//assign key word
		$this->mr['keyword'] = $this->search['keyword'];
		
		$this->native_session->set_flashdata('sess_search',$this->search);

		$this->showlist();

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','inspector/frm.tpl');
		if($this->native_session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		
	}
	
	function edit()
	{
		$this->mysmarty->assign('tpl_center','inspector/frm.tpl');
		
		if($this->native_session->flashdata('frm')){
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		$par = $this->uri->uri_to_assoc(3);	
		$id = isset($par['id'])?$par['id']:'';
			
		if($id)
		{
			$data = $this->inspector_model->get($id);
			if($data) $this->mr = array_merge($this->mr,$data);
		} 
	}
	
	function save()
	{
		$inspector_id = $this->input->post('inspector_id');
		
		
		$this->load->library('validation');
		
		$rules['txt_name'] = 'trim|required|max_length[100]';
		if($inspector_id) // if edit
		{
			if ($this->input->post('txt_pass')) //if enter pass
			{
				$rules['txt_pass'] = 'trim|min_length[6]|md5';
			}
		}
		else //if create
        	$rules['txt_pass'] = 'trim|required|min_length[6]|md5';
        	
        $rules['txt_license'] = 'trim';
        $rules['txt_note'] = 'trim';
        
        $this->validation->set_rules($rules);
        
		$fields['txt_name'] = 'Name';
		$fields['txt_license'] = 'License';
        $fields['txt_pass'] = 'Password';
        $fields['txt_note'] = 'Note';
		
		$this->validation->set_fields($fields);
		$this->validation->set_error_delimiters('* ', '<br />');
		
        $is_valid = $this->validation->run();
		
		$record = array(
            
            'name' => $this->validation->txt_name,
			'license' => $this->validation->txt_license,
            'note' => $this->validation->txt_note,
            'active' => $this->input->post('sel_active'),
		);
		if ($inspector_id)
		{
			if($this->input->post('txt_pass'))
				$record['password'] = $this->validation->txt_pass;
		}
		else
		{
			$record['password'] = $this->validation->txt_pass;
		}
		//check before upload image
		
		if ($is_valid == FALSE ) 
		{
			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error));
			if ($inspector_id)
			{
            	redirect('admin_inspector/id/'.$inspector_id, 'refresh');
            	die();
			}
			else
			{
				redirect('admin_inspector/create','refresh');
				die();
			}	
		}
		else
		{
			//upload file
			$hd_old_image = $this->input->post('hd_old_image');
			
			$chk_delfile = $this->input->post('chk_delfile');
			
			if($hd_old_image) 
				$path_filedel = './uploads/inspector/'.$hd_old_image;
			else	
				$path_filedel = '';
		
			if($chk_delfile)
			{
				if(file_exists($path_filedel)) unlink($path_filedel);
				$record['image'] = '';
				$result = $this->inspector_model->update($reid, $record);
			}
			
			if($_FILES['attack_1']['size'])
			{
				
				$config = array();
				$config['upload_path'] = './uploads/inspector/';
				$config['allowed_types'] = 'gif|jpg|png|jped';
				$config['max_size']	= '2000';
				$config['encrypt_name'] = true;
				$config['remove_spaces'] = true;
				
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('attack_1'))
				{
					$error['frm_error'] = $this->upload->display_errors();
					$this->native_session->set_flashdata('frm',$error); 
					
				}
				else
				{	
					// delete old image
					if(file_exists($path_filedel)) unlink($path_filedel);
						
					$upload_data = $this->upload->data();
					
					$record['image'] = $upload_data['file_name'];
	
					
				}	
					
			}// if FILE
			
			
			//save data
			//check is edit or create
			if ($inspector_id) //edit
			{
				$id_insert = $this->inspector_model->update($this->input->post('inspector_id'),$record);
			}
			else //create
			{	
				$record['image'] = $upload_data['file_name'];
				$id_insert = $this->inspector_model->insert($record);
			}
			
			if($id_insert)
			{
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				redirect('admin_inspector', 'refresh');
            	die();
			}
			else
			{
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
				redirect('admin_inspector/edit/id/'.$inspector_id, 'refresh');
            	die();
			}
		}
	}
	
	function delete()
	{
		$par = $this->uri->uri_to_assoc(3);
		
		$tmp = $this->inspector_model->get($par['id']);
		
		$path_filedel = './uploads/inspector/'.$tmp['image'];
		
		if(file_exists($path_filedel)) unlink($path_filedel);
		
		$id = $this->inspector_model->delete($par['id']);
			
		redirect('admin_inspector', 'refresh');
		
		die();
	}
	
	function name()
	{
		if($this->native_session->flashdata('sess_search'))
			$this->search = $this->native_session->flashdata('sess_search');

		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['sort'])){
			if ($par['sort']=='asc')
				$sort = 'asc';
			else
				$sort = 'desc';
			$this->search['sort_type'] = $sort;
			$this->search['field'] = 'name';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function lic()
	{
		if($this->native_session->flashdata('sess_search'))
			$this->search = $this->native_session->flashdata('sess_search');

		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['sort'])){
			if ($par['sort']=='asc')
				$sort = 'asc';
			else
				$sort = 'desc';
			$this->search['sort_type'] = $sort;
			$this->search['field'] = 'license';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);
		$record['active'] = $par['status'];
		
		$id = $this->inspector_model->update($par['id'], $record);
			
		if($id)
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_inspector/', 'refresh');
		
		die();
			
	}
	
}	
?>