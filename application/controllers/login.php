<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller {
	
	var $mr;
	var $site;

	function Login()
	{
		parent::Controller();	
		
		$this->lang->load('customer', $this->native_session->userdata('client_lang'));
        
        $this->mysmarty->assign('lang',$this->lang->toArray());

		$this->mr['title'] = 'Login';
		
	}
	
	function _output()
	{
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		if($this->native_session->flashdata('send_email')) $this->mr['send_email'] = $this->native_session->flashdata('send_email');
		$this->mr['title_menu'] = 'LOGIN';
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
		if($this->login_model->is_login()){redirect('customer');die();}
		
		$this->mysmarty->assign('tpl_center','login/index.tpl');
	}
	
	function sm()
	{
		if($this->login_model->is_login()){redirect('customer');die();}
		
		$this->load->library('validation');
		
		$this->load->view('login/login_validation.php', '', FALSE); // field validation

		if ($this->validation->run() == FALSE ) {
			$this->native_session->set_flashdata('error_frm',$this->validation->error_string); 
			redirect('login','refresh');
			die();
			
		} else {
			$this->load->model('customer_model');
			
			$row = $this->customer_model->getfromfield(strtolower($this->validation->txt_username),'cus_username');
			//
               $this->customer_model->update($row['cus_id'], array('cus_timelog'=>time()));
			   
				$sess = array ();
				
				$sess['username'] = $row['cus_username'];
				
				$sess['id'] = $row['cus_id'];
				
				$this->session->set_userdata('user_id',$sess['id']);
				
				$sess['name'] = $row['cus_name'];
				
				$sess['email'] = $row['cus_email'];
				
				$sess['startnumber'] = $row['cus_startnumber'];
				//			
				$this->login_model->set_login(1,$sess);
				//	
				redirect('customer/main','refresh');
				
				die();
		}
		
	}


	function valid_userpass(){
        $this->db->select('*');
		$this->db->where('LCASE(cus_username)',strtolower($this->input->post('txt_username')));
        $this->db->where('cus_pass',md5($this->input->post('txt_pass')));

        //$this->db->where('cus_active',1);
		$this->db->from('customer');
		
		if($this->db->count_all_results()){
			$this->db->select('*');
			$this->db->where('LCASE(cus_username)',strtolower($this->input->post('txt_username')));
			$this->db->where('cus_active',1);
	        $this->db->where('cus_pass',md5($this->input->post('txt_pass')));
	        $this->db->from('customer');
	        if($this->db->count_all_results())
				return true;
			else
			{
				$this->validation->set_message('valid_userpass', $this->lang->line('error_account_has_block'));
				return false;
			}	
		}else{
			$this->validation->set_message('valid_userpass', $this->lang->line('error_access_denied'));
			return false;
		}
	}

	function out()
	{
	
		$this->login_model->unset_login(1);
		
		redirect('home','refresh');
		
		die();
	}
	
	function forgetpass()
	{
		if($this->login_model->is_login(1)){redirect('mypage');die();}
		
		$this->mysmarty->assign('tpl_center','login/resetpass.tpl');
		
	}
	
	function forgetpass_sm()
	{
		if($this->login_model->is_login(1)){redirect('mypage');die();}
		
		$this->load->library('validation');
		
		$this->load->view('login/resetpass_validation.php', '', FALSE); // field validation
		
		if ($this->validation->run() == FALSE ) {
			$this->native_session->set_flashdata('error_frm',$this->validation->error_string); 
			redirect('login/forgetpass','refresh');
			die();
			
		} else {
			
			$this->load->helper('string');
			
			$str_random = random_string('numeric', 8);
			
			//update new pass
			$this->load->model('customer_model');
			$row = $this->customer_model->password_reset($this->validation->txt_email, $str_random);
			
			//send email
			//load template
			$this->load->helper('file');
			
			$html_content = read_file('application/email_tpl/forgotpw.tpl');
			//replate content
			$html_content = str_replace('#username#',$row['cus_username'],$html_content);
			$html_content = str_replace('#passowrd#',$str_random,$html_content);
		
			//load class email
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$config['charset'] = 'UTF-8';//EUC-KR';
			$config['priority'] = 1;
			
			$this->email->initialize($config);

			$this->email->from($this->site['site_email'], $this->site['site_name']);
			
			$this->email->to($this->validation->txt_email);
			
			$this->email->subject('Reset new password');
			
			$this->email->message($html_content);
			
			$this->email->send();
			
			//echo $this->email->print_debugger();
			
			$this->native_session->set_flashdata('send_email','New password has been sent to your email.'); 
			redirect('login/forgetpass','refresh');
			die();
			
		}
		
	}
	
	function valid_hasemail(){

		$this->db->where('LCASE(cus_email)',strtolower($this->input->post('txt_email')) );
	
	    $this->db->where('cus_active',1);

		$this->db->from('customer');
		
		if($this->db->count_all_results()){

			return true;
		}else{
			$this->validation->set_message('valid_hasemail', $this->lang->line('error_email'));

			return false;
		}
	}
}
?>