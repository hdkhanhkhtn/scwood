<?php

class Change_pass extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $hd_id;
	var $cus_tmp;

	function Change_pass()
	{
		parent::Controller();
		$this->load->model('inspector_model');
		$this->load->model('inspector_model');
		if (!$this->login_model->is_login(1) && (!$this->login_model->is_login(2)))
		{
			redirect('login');
			die();
		}
		$arr = $this->login_model->get_login(1);
		$this->hd_id = $arr['id'];	
		$this->hd_name =$arr['username'];
		
		$this->native_session->keep_flashdata('sess_search');

	}
	
	function change()
	{
		
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['id']))
		{
 			$this->mr['inspector_id'] = $par['id'];
			$this->mysmarty->assign('mr',$this->mr);
			$this->mysmarty->view('customer/change_pass.tpl');
		}
		
	}
	
	function sm()
	{
		$this->load->library('validation');
		$this->load->view('customer/change_pass_validation.php', '', FALSE); // field validation
		$id = $this->input->post('txt_id');
        $is_valid = $this->validation->run();
        
        $record = array(
			'old' => $this->validation->txt_old_pass,
			'new' => $this->validation->txt_new_pass,
			'con' => $this->validation->txt_con_pass,
		);	
		
		if ($is_valid == FALSE ) {
			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('error_frm',$this->validation->error_string); 
			redirect('change_pass/change/id/'.$id,'refresh');
			die();
		}
		else {

            $arr = $this->login_model->get_login(1);

			$pass['password'] = $record['new'];
			
		    $rs = $this->inspector_model->update($id, $pass);
			
			if($rs) 
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_change_pass')));
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
            redirect('change_pass/change/id/'.$id,'refresh');

            die();

		}//if
	}
	
	function valid_userpass()
	{
		$session = $this->login_model->get_login(1);
		
		$id = $this->input->post('txt_id');
		
		$this->db->where('id',$id);
		
        $this->db->where('password',md5($this->input->post('txt_old_pass')));
        
        $this->db->where('cus_id',$session['id']);

        //$this->db->where('cus_active',1);
		$this->db->from('inspector');
		
		if($this->db->count_all_results()){

			return true;
		}else{
			$this->validation->set_message('valid_userpass', $this->lang->line('error_old_pass'));
			return false;
		}
	}
	
}
?>