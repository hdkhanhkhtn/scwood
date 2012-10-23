<?php

class Admin_login extends Controller {
	
	var $mr;
	var $site;
	
	function Admin_login()
	{
		parent::Controller();	
		
		$this->mr['title'] = 'Login';
		
	}
	
	function _output()
	{
		
		//$this->mysmarty->assign('mr',$this->mr);
		//$this->mysmarty->view('admin_login/frmlogin');
	
	}
	
	function forgetpass()
	{
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->view('admin_login/forgetpass');
	}
	function forgetpass_sm()
	{
		
		$this->load->library('validation');
		
		$this->load->view('admin_login/resetpass_validation.php', '', FALSE); // field validation

		if ($this->validation->run() == FALSE ) {
			
			$this->native_session->set_flashdata('error_frm',$this->validation->error_string);
			 
			redirect('admin_login/forgetpass','refresh');
			
			die();
			
		} else {

           
            $this->load->helper('string');
			
			$str_random = random_string('numeric', 8);
			
			//update new pass
			$this->load->model('user_model');
			$row = $this->user_model->password_reset($this->validation->txt_email, $str_random);
			
			//send email
			//load template
			$this->load->helper('file');
			
			$html_content = read_file('application/email_tpl/forgotpass.tpl');
			//replate content
			$html_content = str_replace('#username#',$row['user_username'],$html_content);
			$html_content = str_replace('#passowrd#',$str_random,$html_content);
		
			//load class email
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$config['charset'] = 'EUC-KR';
			$config['priority'] = 1;
			
			$this->email->initialize($config);

			$this->email->from($this->site['site_email'], $this->site['site_name']);
			
			$this->email->to($this->validation->txt_email);
			
			$this->email->subject('Reset new password');
			
			$this->email->message($html_content);
			
			$this->email->send();
			
			//echo $this->email->print_debugger();
		
			$this->native_session->set_flashdata('error_frm',$this->lang->line('msg_pass_change'));
			
			redirect('admin_login/','refresh');
			
			die();
				
		}
	}
	
	function valid_hasemail(){

		$this->db->where('user_email',$this->input->post('txt_email') );
	
	    $this->db->where('user_active',1);

		$this->db->from('user');

		if($this->db->count_all_results()){

			return true;
		}else{
			$this->validation->set_message('valid_hasemail', $this->lang->line('error_email'));

			return false;
		}
	}
	
	function index()
	{
		//do something
	
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->view('admin_login/frmlogin');
		
	}
	function sm()
	{
		
		$this->load->library('validation');
		
		$this->load->view('admin_login/login_validation.php', '', FALSE); // field validation

		if ($this->validation->run() == FALSE ) {
			$this->native_session->set_flashdata('error_frm',$this->validation->error_string); 
			redirect('admin_login/','refresh');
			die();
			
		} else {

            $this->load->model('user_model');

            $row = $this->user_model->getfromfield($this->validation->txt_username,'user_username');

			//
			$sess = array ();

			$sess['username'] = $row['user_username'];

			$sess['id'] = $row['user_id'];

			$sess['name'] = $row['user_name'];

			$sess['email'] = $row['user_email'];

			$this->login_model->set_login(2,$sess);
			
			redirect('admin_customer/','refresh');
			
			die();
				
		}
	
	}
	
	function valid_username(){

		$this->db->where('user_username',$this->input->post('txt_username') );

        $this->db->where('user_pass',md5($this->input->post('txt_pass')));

        $this->db->where('user_active',1);

		$this->db->from('user');
		
		if($this->db->count_all_results()){
	
			return true;
		}else{
			$this->validation->set_message('valid_username', $this->lang->line('error_access_denied'));
			
			return false;
		}
	}	
	
	function out()
	{
	
		$this->login_model->unset_login(2);
		
		redirect('admin','refresh');
		
		die();
	}
}
?>