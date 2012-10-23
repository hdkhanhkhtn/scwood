<?php

class Admin_email extends Controller {
	
	var $mr;
	var $mlist;
	var $site;

	function Admin_email()
	{
		parent::Controller();
		$this->mr['title'] = 'Email template';
		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{

		$this->mysmarty->assign('tpl_center','email/main.tpl');
		
		
		$par = $this->uri->uri_to_assoc(3);
			
		$filename = isset($par['filename'])?$par['filename']:'';
		
		$filename = 'register';
		
		if($filename) $path_file = $this->site['base_url'].'application/email_tpl/'.$filename.'.tpl';
		else $path_file = '';
		
		if(!file_exists($path_file))
		{
			$this->load->helper('file');
			$content = read_file('./application/email_tpl/'.$filename.'.tpl');
		}
		
		 $this->mr['content'] = $content;
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function index_sm()
	{
		$filename = 'register';
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Customer Home Page';
		
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
			
			if (!write_file('./application/email_tpl/'.$filename.'.tpl', $record['content']))
			{
			     $tmp = 'Unable to write the file';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp,2));
			}
			else
			{
			     $tmp = 'File written!';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp));
			}
					
		}
		
		redirect('admin_email', 'refresh');
		
		die();
	}
	
	function report()
	{
		$this->mysmarty->assign('tpl_center','email/report.tpl');
		
		$filename = 'report';
		
		if($filename) $path_file = $this->site['base_url'].'application/email_tpl/'.$filename.'.tpl';
		else $path_file = '';
		
		if(!file_exists($path_file))
		{
			$this->load->helper('file');
			$content = read_file('./application/email_tpl/'.$filename.'.tpl');
		}
		
		 $this->mr['content'] = $content;
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function report_sm()
	{
		$filename = 'report';
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Customer Home Page';
		
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
			
			if (!write_file('./application/email_tpl/'.$filename.'.tpl', $record['content']))
			{
			     $tmp = 'Unable to write the file';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp,2));
			}
			else
			{
			     $tmp = 'File written!';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp));
			}
					
		}
		redirect('admin_email/report', 'refresh');
		die();
	}
	
	function contact()
	{
		$this->mysmarty->assign('tpl_center','email/contact.tpl');
		
		$filename = 'contact';
		
		if($filename) $path_file = $this->site['base_url'].'application/email_tpl/'.$filename.'.tpl';
		else $path_file = '';
		
		if(!file_exists($path_file))
		{
			$this->load->helper('file');
			$content = read_file('./application/email_tpl/'.$filename.'.tpl');
		}
		
		 $this->mr['content'] = $content;
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function contact_sm()
	{
		$filename = 'contact';
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Customer Home Page';
		
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
			
			if (!write_file('./application/email_tpl/'.$filename.'.tpl', $record['content']))
			{
			     $tmp = 'Unable to write the file';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp,2));
			}
			else
			{
			     $tmp = 'File written!';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp));
			}
					
		}
		redirect('admin_email/contact', 'refresh');
		die();
	}
	
	function forgotpw()
	{
		$this->mysmarty->assign('tpl_center','email/forgotpw.tpl');
		
		$filename = 'forgotpw';
		
		if($filename) $path_file = $this->site['base_url'].'application/email_tpl/'.$filename.'.tpl';
		else $path_file = '';
		
		if(!file_exists($path_file))
		{
			$this->load->helper('file');
			$content = read_file('./application/email_tpl/'.$filename.'.tpl');
		}
		
		 $this->mr['content'] = $content;
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function forgotpw_sm()
	{
		$filename = 'forgotpw';
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Customer Home Page';
		
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
			
			if (!write_file('./application/email_tpl/'.$filename.'.tpl', $record['content']))
			{
			     $tmp = 'Unable to write the file';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp,2));
			}
			else
			{
			     $tmp = 'File written!';
			     $this->native_session->set_flashdata('str_msg',set_message($tmp));
			}
					
		}
		redirect('admin_email/forgotpw', 'refresh');
		die();
	}
	
}
?>