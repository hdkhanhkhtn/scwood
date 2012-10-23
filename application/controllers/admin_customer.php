<?php

class Admin_customer extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_customer()
	{
		parent::Controller();
			
		//load language
		$this->lang->load('customer', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
        
		$this->load->model('customer_model');
		
		$this->mr['title'] = 'Customers';
		
		$this->search = array('keyword' => '','page' => 0,'field'=>'cus_username','sort_type'=>'asc');
		
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
		//$this->db->where('cus_id', $kw); 
		$this->db->like('cus_name', $kw); 
		$this->db->or_like('cus_username',$kw);
		$this->db->or_like('cus_email', $kw); 
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



	function index()
	{	
		$this->native_session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();

	}
	
	function showlist()
	{
		
		$this->mysmarty->assign('tpl_center','customer/list.tpl');
		
		//paging
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$total_rows = $this->customer_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_customer/search/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/admin_customer/search/page/');
		
		//run sql
		if($this->search['keyword']) $this->where_sql($this->search['keyword']);
		
		$this->db->order_by ('UPPER('.$this->search['field'].')',$this->search['sort_type']);
		
		$this->mlist = $this->customer_model->get();
		
	  	if(is_array($this->mlist))
 		{
  			for($i=0; $i<count($this->mlist); $i++)
  			{
 				$this->mlist[$i]['cus_countinvoice'] = $this->customer_model->countRerport($this->mlist[$i]['cus_id']);
		        if($this->mlist[$i]['cus_timelog'])$this->mlist[$i]['cus_timelog'] = date($this->site['site_short_date'],$this->mlist[$i]['cus_timelog']);
				 if($this->mlist[$i]['cus_time'])$this->mlist[$i]['cus_time'] = date($this->site['site_short_date'],$this->mlist[$i]['cus_time']);
  			}
 		}
	 
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		if($this->native_session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
	
	}


	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','customer/new.tpl');
		
		if($this->native_session->flashdata('frm')){
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		$par = $this->uri->uri_to_assoc(3);	
		$id = isset($par['id'])?$par['id']:'';
			
		if($id)
		{
			$data = $this->customer_model->get($id);
			$data['cus_date'] = format_intdate($this->site['site_short_date'],$data['cus_date']);
			if($data) $this->mr = array_merge($this->mr,$data);
		} 
	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['cus_active'] = $par['status'];
		
		$cus_id = $this->customer_model->update($par['id'], $record);
			
		if($cus_id)
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_customer/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$cus_id = $this->input->post('hd_id');
		
		$this->load->library('validation');
		
		$rules['txt_name'] = 'trim|required|max_length[100]';
		$rules['txt_email'] = 'trim|required|max_length[100]|valid_email';
        $rules['txt_phone'] = 'trim|xss_clean';
        $rules['txt_address'] = 'trim|required|';
        $rules['txt_company'] = 'trim|required|max_length[100]';
		$rules['txt_city'] = 'trim|required|max_length[100]';
        $rules['txt_state'] = 'trim|required|';
        $rules['txt_zip'] = 'trim|required|';
        $rules['txt_fax'] = 'trim|xss_clean';
		$rules['txt_license'] = 'trim|required|max_length[100]';
        $rules['txt_pemit'] = 'trim';
        
		$fields['txt_name'] = 'Name';
		$fields['txt_email'] = 'Email';
        $fields['txt_phone'] = 'Phone';
        $fields['txt_address'] = 'Adderss';
        $fields['txt_company'] = 'Company';
        $fields['txt_city'] = 'City';
		$fields['txt_state'] = 'State';
        $fields['txt_zip'] = 'Zip';
        $fields['txt_fax'] = 'Fax';
        $fields['txt_license'] = 'License';
        $fields['txt_pemit'] = 'Pemit';
		if ($cus_id) //edit
		{
			if ($this->input->post('txt_pass'))
			{
				$rules['txt_pass'] = 'trim|required|min_length[6]|max_length[20]';
				$fields['txt_pass'] = 'Password';			
			}
			$this->validation->set_rules($rules);
			$this->validation->set_fields($fields);
			$this->validation->set_error_delimiters('<br />', '');
		}
		else //create
		{	
			$rules['txt_username'] = 'trim|required|max_length[20]';
			$rules['txt_pass'] = 'trim|required|min_length[6]|max_length[20]';
			$fields['txt_username'] = 'ID';
			$fields['txt_pass'] = 'Password';
			$this->validation->set_rules($rules);
			$this->validation->set_fields($fields);
			$this->validation->set_error_delimiters('<br />', '');
		}
		
        $is_valid = $this->validation->run();
		
		$record = array(
            
            'cus_name' => $this->validation->txt_name,
			'cus_email' => $this->validation->txt_email,
            'cus_address' => $this->validation->txt_address,
            'cus_phone' => $this->validation->txt_phone,
            'cus_comp_name' => $this->validation->txt_company,
			'cus_city' => $this->validation->txt_city,
            'cus_state' => $this->validation->txt_state,
            'cus_zipcode' => $this->validation->txt_zip,
            'cus_fax' => $this->validation->txt_fax,
			'cus_license' => $this->validation->txt_license,
            'cus_pemit' => $this->validation->txt_pemit,
		);
		if ($cus_id)
		{
			$record['cus_username'] =$this->input->post('hd_username');
			if ($this->input->post('txt_pass'))
			{
				$record['cus_pass'] = $this->validation->txt_pass;
			}
		}
		else
		{
			$record['cus_username'] =$this->validation->txt_username;
			$record['cus_pass'] = $this->validation->txt_pass;
		}
		
        if($record['cus_pass']){
            $record['cus_pass'] = md5($record['cus_pass']);
        } else{
            unset($record['cus_pass']);
        }
		
         if ($is_valid == FALSE ) {
         	
			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);
			$this->native_session->set_flashdata('frm',array_merge($record,$error));
			if ($cus_id)
            	redirect('admin_customer/edit/id/'.$cus_id, 'refresh');
            else
            	redirect('admin_customer/create', 'refresh');

			die();

		} else {
			
			$record['cus_note'] = $this->input->post('txt_note');
			$record['cus_date'] = get_strdate($this->input->post('txt_date'),$this->site['site_short_date'],'/');
			$record['cus_time'] = get_strdate($this->input->post('txt_date'),$this->site['site_short_date'],'/');
			if ($cus_id) //update
			{
				$result = $this->customer_model->update($cus_id, $record);
			}
			else
			{
				$result =$this->customer_model->insert($record);
			}
		    
	    
	        if($result)
			{
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				redirect('admin_customer/edit/id/'.$result, 'refresh');

            	die();
			}
			else
			{
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
				redirect('admin_customer/edit/id/'.$cus_id, 'refresh');

            	die();
			}
            

		}//if

	}
	
	function delete()
	{
		
		$this->mysmarty->assign('tpl_center','cus/list.tpl');
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->customer_model->delete($par['id']);
		
		if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
		
		redirect('admin_customer', 'refresh');
		
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
				$id = $this->customer_model->delete($arr_id);
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_del')));
				
			}elseif($sel_action == 'block'){
				
				$data = array('cus_active' => 0);
				$id = $this->customer_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				
			}elseif($sel_action == 'active'){
				
				$data = array('cus_active' => 1);
				$id = $this->customer_model->update($arr_id,$data);
				if($id) $this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			}
		
		}else{
		
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_customer/search', 'refresh');
		
		die();
	
	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','customer/new.tpl');
		if($this->native_session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
	}
	
	function id()
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
			$this->search['field'] = 'cus_username';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function company()
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
			$this->search['field'] = 'cus_comp_name';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function city()
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
			$this->search['field'] = 'cus_city';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function zip()
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
			$this->search['field'] = 'cus_zipcode';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
	function register()
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
			$this->search['field'] = 'cus_time';
		}
		
		$this->native_session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}
	
}
?>