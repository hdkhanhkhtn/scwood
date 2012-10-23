<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends Controller {
	
	var $mr;
	var $site;
	

	function Register()
	{
		parent::Controller();	
		
        $this->lang->load('customer', $this->native_session->userdata('client_lang'));
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		$this->load->model('customer_model');
					
		$this->mr['title'] = 'Regsiter';
		if ($this->login_model->get_login(1))
		{
			redirect('customer/main/','refresh');
			
			die();
		}
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		
	}
	
	function _output()
	{
		$this->mr['title_menu'] = 'REGISTER';
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->view('client/index');
		
	}
	
	function index()
	{
		$this->mysmarty->assign('tpl_center','register/index.tpl');
		
		//load ajax
		$this->load->library('Myxajax');
		$this->xajax->registerFunction(array('chkUsername',&$this,'check_user'));
		$this->xajax->processRequest();
		$this->xajax->configure('javascript URI', $this->site['base_url'].'application/libraries/xajax/');	
		$this->mysmarty->assign("xajax_js",$this->xajax->getJavascript()); //important !!!
		
		//
		if($this->native_session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		if($this->native_session->flashdata('mail_frm')) $this->mr['mail_frm'] = $this->native_session->flashdata('mail_frm');
        //assign random str
        $this->load->helper('string');

		$this->mr['str_random'] = random_string('numeric', 6);

        $this->native_session->set_flashdata('sess_random',$this->mr['str_random']);
        
        //get policy
        $this->load->model('policy_model');
		
		$lst_policy = $this->policy_model->get();
		
		if(is_array($lst_policy))
		{
			$this->mysmarty->assign('lst_policy',$lst_policy);
		}

	}
	
	function check_user($str)
	{
		$objResponse = new xajaxResponse();
		
		$objResponse->assign("Msg_username","style.color","");
		
		if(empty($str)){
		
			$objResponse->assign("Msg_username","innerHTML", 'Username is empty.');
					
		}else{
		
			$this->db->where('LCASE(cus_username)',strtolower($str) ); 
			
			$this->db->from('customer');
			
			if($this->db->count_all_results()){
		
				$objResponse->assign("Msg_username","innerHTML",  $str.' is not available.');
				
			}else{
				$objResponse->assign("Msg_username","style.color","blue");
				$objResponse->assign("Msg_username","innerHTML",  $str.' is available.');
								
			}
			
		}
			
		return $objResponse;

		
	}
	
	
	function submit(){

		$this->load->library('validation');
		
		$this->load->view('register/register_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(		
			'cus_username' => $this->validation->txt_username,
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
            'cus_pemit' => $this->validation->txt_pemit,
            'cus_note' => $this->validation->txt_note,

		);

		if($is_valid == FALSE ) {

			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('register/','refresh');
			
			die();
			
		} else {
					
			//insert
			
			$this->load->helper('string');

			$random_string = random_string('numeric', 6);
			
			$record['cus_pass'] = md5($random_string);

			$record['cus_time'] = time();
			
			$this->customer_model->insert($record);
			
			//send email password

			//load template
			$this->load->helper('file');
			
			$html_content = read_file('application/email_tpl/register.tpl');
			//replate content
			$html_content = str_replace('#name#',$record['cus_name'],$html_content);
			
			$html_content = str_replace('#username#',$record['cus_username'],$html_content);
			
			$html_content = str_replace('#sitename#',$this->site['site_name'],$html_content);
			
			$html_content = str_replace('#password#',$random_string,$html_content);
		
			//load class email
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$config['charset'] = 'UTF-8';//EUC-KR; UTF-8';
			$config['priority'] = 1;
			
			$this->email->initialize($config);

			$this->email->from($this->site['site_email'], $this->site['site_name']);
			
			$this->email->to($this->validation->txt_email);
			
			$this->email->subject('Welcome to '.$this->site['site_name']);
			
			$this->email->message($html_content);
			
			if ($this->email->send())
			{
				redirect('register/thanks/');
				die();
			}
			else
			{
				
				$this->native_session->set_flashdata('mail_frm','e-Mail ID is not available, Set-up a revceiving account or Check procedure required.'); 
				redirect('register/','refresh');
				die();
			}
			
		}

		
	}
	
	function thanks()
	{
		$this->mysmarty->assign('tpl_center','register/thanks.tpl');
		$this->db->select('*');
 		$this->db->from('thanks');
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
	
	function valid_hasuser(){

		$this->db->where('LCASE(cus_username)',strtolower($this->input->post('txt_username')) );

		$this->db->from('customer');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasuser', $this->lang->line('error_account_has_used'));
			return false;
		}else
		{
			return true;	
		}
	}
	
	function valid_hasemail(){

		$this->db->where('LCASE(cus_email)',strtolower($this->input->post('txt_email')) );

		$this->db->from('customer');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasemail', $this->lang->line('error_email_has_used'));
			return false;
		}
		else
		{
			return true;
		}
	}
	
}
?>