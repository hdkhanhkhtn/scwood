<?php

class Contact extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Contact()
	{
		parent::Controller();
		
		//load language
		$this->lang->load('contact', $this->native_session->userdata('client_lang'));
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
        
        //page title 
        $this->mr['title'] = $this->lang->line('tt_contactus');
	}
	
	function _output()
	{
		if($this->native_session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		$this->mr['title_menu'] = 'CONTACT US';
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{	
		
		$this->mysmarty->assign('tpl_center','contact/index.tpl');
		$this->db->select('*');
 		$this->db->from('contact');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();
		$this->load->helper('string');
		
		$this->mr['str_random'] = random_string('numeric', 6);
		
		$this->native_session->set_flashdata('sess_random',$this->mr['str_random']);
		

		
	}
	
	function sm()
	{
		$this->load->library('validation');
		
		$this->load->view('contact/contact_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(		
			
			'cont_name' => $this->validation->txt_name,
			'cont_email' => $this->validation->txt_email,
			'cont_phone' => $this->validation->txt_phone,
			'cont_content' => $this->validation->txt_content,
			'cont_subject' => $this->validation->txt_subject,
		);

		if ($is_valid == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			redirect('contact','refresh');
			
			die();
		
		} else {
			
			//send email
			
			//load template
			$this->load->helper('file');
			
			$html_content = read_file('application/email_tpl/contact.tpl');
			//replate content
			$html_content = str_replace('#cont_name#',$record['cont_name'],$html_content);
			$html_content = str_replace('#cont_phone#',$record['cont_phone'],$html_content);
			$html_content = str_replace('#cont_content#',$record['cont_content'],$html_content);
		
			//load class email
				
			$this->load->library('email');
		
			$config['mailtype'] = 'html';
			$config['charset'] = 'UTF-8';//EUC-KR; UTF-8';
			$config['priority'] = 1;
			
			$this->email->initialize($config);
			
			$this->email->from($record['cont_email'], $record['cont_name']);
			
			$this->email->to($this->site['site_email']);
			
			$this->email->subject("website: ".$record['cont_subject']);
			
			$this->email->message($html_content);
			
			$this->email->send();
			//$this->email->print_debugger();
			redirect('contact/thanks');
			
			die();

		}	
		
		
	}
	
	function thanks()
	{
		$this->mr['title'] = 'Contact';
		$this->mr['title_menu'] = 'Thanks';
		
		$this->mysmarty->assign('tpl_center','contact/thanks.tpl');
		
 		$this->db->select('*');
 		$this->db->from('contact_thanks');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();
	}
	
	function check_security_code()
	{	
		if($this->native_session->flashdata('sess_random') == $this->validation->txt_random )
		{
			return true;
		}else
		{
			$this->validation->set_message('check_security_code', $this->lang->line('error_security_code'));
			return false;
		}
	}

	
}
?>