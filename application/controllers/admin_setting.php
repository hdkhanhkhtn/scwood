<?php

class Admin_setting extends Controller {
	
	var $mr;
	var $mlist;
	var $site;

	function Admin_setting()
	{
		parent::Controller();
		$this->mr['title'] = 'Site management';
		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{
		
		$this->mysmarty->assign('tpl_center','setting/index.tpl');
		
		$query = $this->db->get('site');
		
		$this->mr = array_merge($this->mr,$query->row_array());
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
	
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}
		$this->mr['site_footer'] = htmlspecialchars($this->mr['site_footer']);
	
	}
	function index_sm()
	{
	
		$this->load->library('validation');

		$this->load->view('admin_setting/index_validation.php', '', FALSE); // field validation

		$is_valid = $this->validation->run();

		$record = array(
			'site_name' => $this->validation->txt_name,
			'site_slogan' => $this->validation->txt_slogan,

            'site_phone' => $this->validation->txt_phone,
            'site_fax' => $this->validation->txt_fax,
            'site_email' => $this->validation->txt_email,
            'site_bankacc' => $this->validation->txt_bankacc,

            'site_title' => $this->validation->txt_title,
            'site_keyword' => $this->validation->txt_keyword,
            'site_footer' => $this->validation->txt_footer,

		);

		if ($is_valid == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
				
		} else {
			$this->db->limit('1');
			$result = $this->db->update('site', $record);
			
			if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		}
		
		redirect('admin_setting', 'refresh');
		
		die();
				
	}
	
	function setting()
	{

		$this->mysmarty->assign('tpl_center','setting/setting.tpl');
		
		$query = $this->db->get('site');
		
		$this->mr = array_merge($this->mr,$query->row_array());
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
	
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function config_sm()
	{
		
		$this->load->library('validation');

		$this->load->view('admin_setting/cf_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(
          'site_short_date' => $this->validation->txt_short_date,
          'site_long_date' => $this->validation->txt_long_date,

          'site_num_line' => $this->validation->txt_num_line,
          'site_num_line2' => $this->validation->txt_num_line2,

          'site_currency' => $this->validation->rdo_currency,
          'site_lang_client' => $this->validation->rdo_lang,
          'site_lang_admin' => $this->validation->rdo_lang_admin,
			
		);
		
		if ($is_valid == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			
			
			
		} else {

			$this->db->limit('1');
			
			$result = $this->db->update('site', $record);
	
			if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
						
		}
		
		redirect('admin_setting/setting', 'refresh');
		
		die();
		
		
	}
	
	function contact()
	{
		$this->mysmarty->assign('tpl_center','setting/contact.tpl');
		
		$this->db->select('*');
 		$this->db->from('contact');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function contact_sm()
	{
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Contact';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('contact', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/contact', 'refresh');
		
		die();
	}
	
	function contact_thanks()
	{
		$this->mysmarty->assign('tpl_center','setting/contact_thanks.tpl');
		
		$this->db->select('*');
 		$this->db->from('contact_thanks');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function contact_thanks_sm()
	{
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Content';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('contact_thanks', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/contact_thanks', 'refresh');
		
		die();
	}
	
	function aboutus()
	{

		$this->mysmarty->assign('tpl_center','setting/aboutus.tpl');
		
		$this->db->select('*');
 		$this->db->from('aboutus');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function aboutus_sm()
	{
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'About us';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('aboutus', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_setting/aboutus', 'refresh');
		
		die();
		
		
	}
	
	
	
}
?>