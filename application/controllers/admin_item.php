<?php

class Admin_item extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_item()
	{
		parent::Controller();	
		
		//load language
		$this->lang->load('iteminvoice', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load module
		$this->load->model('item_model');
		
		$this->mr['title'] = 'item';
		
		$this->search = array('keyword' => '','sel_type' => '', 'page' => 0);
		
		$this->session->keep_flashdata('sess_search');
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
			$this->db->like('item_name',$this->search['keyword']);
		}
		
		if ($this->search['sel_type'])
		{
			$this->db->where('item_type',$this->search['sel_type']);
		}
		 
	}
	
	function search()
	{
		if($this->session->flashdata('sess_search')){
			
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
		
		$this->mysmarty->assign('tpl_center','item/list.tpl');
		
		//paging
		$this->where_sql();
		
		$total_rows = $this->item_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_item/search/page/');
	
		//run sql
		$this->where_sql();
			
		$this->mlist = $this->item_model->show_brand_cat();
		

	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','item/frm.tpl');
		
		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		$this->mr['item_active'] = 1;
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
				$data = $this->item_model->get($id);
				
				if($data) $this->mr = array_merge($this->mr,$data);
			}

		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','item/frm.tpl');
		
		$this->show_detail();
		
	}
	function brand()
	{
		$this->mysmarty->assign('tpl_center','item/frm_brand.tpl');
		
		$this->load->model('brand_model');
		
		$lst_brand = $this->brand_model->get();
		
		$this->mysmarty->assign('lst_brand',$lst_brand);
		
		$this->show_detail();
	}
	
	function brand_sm()
	{
		$hd_id = $this->input->post('hd_id');
		
		$record['item_brand_id'] = $this->input->post('sel_brand');
		
		$result = $this->item_model->update($hd_id, $record);
		
		if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		
		redirect('admin_item/brand/id/'.$hd_id,'refresh');

		die();
		
	}
	function category()
	{
		$this->mysmarty->assign('tpl_center','item/frm_category.tpl');
		
		$this->load->model('category_model');
		
		$lst_cat = $this->category_model->get();
		
		$this->mysmarty->assign('lst_category',$lst_cat);
		
		$this->show_detail();
	}
	
	function category_sm()
	{
		$hd_id = $this->input->post('hd_id');
		
		$record['item_cat_id'] = $this->input->post('sel_category');
		
		$result = $this->item_model->update($hd_id, $record);
		
		if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		
		redirect('admin_item/category/id/'.$hd_id,'refresh');

		die();
		
	}
	
	function image()
	{
		$this->mysmarty->assign('tpl_center','item/frm_image.tpl');
		
		$this->show_detail();	
	}
	
	function image_sm()
	{
		$hd_id = $this->input->post('hd_id');
		
		$hd_old_image = $this->input->post('hd_old_image');
		
		$chk_delfile = $this->input->post('chk_delfile');
		
		if($hd_old_image) 
			$path_filedel = './uploads/item/'.$hd_old_image;
		else	
			$path_filedel = '';
		
		if($chk_delfile)
		{
			if(file_exists($path_filedel)) unlink($path_filedel);
			
			$record['item_image'] = '';

			$result = $this->item_model->update($hd_id, $record);
		}
				
		if($_FILES['attach_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/item/';
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
				
				$record['item_image'] = $upload_data['file_name'];

				$result = $this->item_model->update($hd_id, $record);
				
				if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
				
		}// if FILE
				
		redirect('admin_item/image/id/'.$hd_id,'refresh');

		die();
		
	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['item_active'] = $par['status'];
		
		$item_id = $this->item_model->update($par['id'], $record);
		
		if($item_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_item/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$hd_id = $this->input->post('hd_id');

		$this->load->library('validation');

		$this->load->view('admin_item/item_validation.php', '', FALSE); // field validation
		
		$record = array(		
			'item_name' => $this->validation->txt_name,
			
			'item_price' => $this->validation->txt_price,
			'item_old_price' => $this->validation->txt_old_price,
			
			'item_desc' => $this->validation->txt_desc,
			'item_sort_desc' => $this->validation->txt_s_desc,
			
			'item_type' => $this->validation->sel_type,
			'item_order' => $this->validation->txt_order,
			'item_active' => $this->validation->sel_status,
		);
		
        
		if ($this->validation->run() == FALSE ) {
		
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($hd_id)redirect('admin_item/edit/id/'.$hd_id);
			
			else redirect('admin_item/create');
			
			die();
			
		} else {
			
			if(!$hd_id){
				// No ID, adding new record
				$result = $this->item_model->insert($record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
					
			}else{
				//Have an ID, updating existing record
				$result = $this->item_model->update($hd_id, $record);
                if($result)
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
			
			if($hd_id)redirect('admin_item/edit/id/'.$hd_id);
			
			if($result)
				redirect('admin_item/edit/id/'.$result, 'refresh');
			else	
				redirect('admin_item/create', 'refresh');
			
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','item/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->item_model->delete($par['id']);

        if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_item', 'refresh');

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
				$id = $this->item_model->delete($arr_id);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}
			elseif($sel_action == 'block')
			{
				$data = array('item_active' => 0);
				$id = $this->item_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}
			elseif($sel_action == 'active')
			{
				$data = array('item_active' => 1);
				$id = $this->item_model->update($arr_id,$data);
				if($id) $this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
			
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_item/search', 'refresh');
		
		die();
	
	}
}
?>