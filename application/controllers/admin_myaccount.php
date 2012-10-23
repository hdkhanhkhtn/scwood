<?php

class Admin_myaccount extends Controller {
	
	var $mr;
	var $mlist;
	var $site;


	function Admin_myaccount()
	{
		parent::Controller();	
		
		$this->load->model('user_model');
		
		$this->lang->load('customer', $this->site['site_lang_admin']);
		
		$this->mr['title'] = 'User';
		
		$this->search = array('keyword' => '','sql_where' => '', 'page' => 0);
		
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

        $this->mysmarty->assign('tpl_center','myacc/frm.tpl');

		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
        //get rows
        $par = $this->login_model->get_login(2);

        $data = $this->user_model->getfromfield($par['username'],'user_username');

        $this->mr = array_merge($this->mr,$data);

        
  		if($this->native_session->flashdata('frm')){

			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));

		}

	}
	function setnewpass()
	{

        $this->mysmarty->assign('tpl_center','myacc/frmsetpass.tpl');

  		if($this->native_session->flashdata('frm')){

			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));

		}
	}

	
	function sm_setpass()
	{

        $this->load->library('validation');

		$this->load->view('admin_myacc/changepass_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(

			'user_pass' => $this->validation->txt_newpass,

		);

        if ($is_valid == FALSE ) {

			$error = array(
				'frm_error' => $this->validation->error_string,
			);

			$this->native_session->set_flashdata('frm',array_merge($record,$error));

            redirect('admin_myaccount/setnewpass','refresh');

			die();

		} else {

            $arr = $this->login_model->get_login(2);

		    $result = $this->user_model->update($arr['id'], $record);

            if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_change_pass')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));		
					
            redirect('admin_myaccount', 'refresh');

            die();

		}//if
    
	}

	function save()
	{
        $par = $this->login_model->get_login(2);

		$user_id = $par['id'];

		$this->load->library('validation');
		
		$this->load->view('admin_myacc/myacc_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(

			'user_name' => $this->validation->txt_name,
			'user_email' => $this->validation->txt_email,

		);

		if ($is_valid == FALSE ) {

			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error));

			redirect('admin_myaccount', 'refresh');

			die();

		} else {

			$result = $this->user_model->update($user_id, $record);
			
			if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));		
					

			redirect('admin_myaccount', 'refresh');

			die();
			
		}//if

	}
	



}
?>