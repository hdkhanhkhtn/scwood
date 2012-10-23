<?php

class Admin_beneficialdiversifiers extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Admin_beneficialdiversifiers()
	{
		parent::Controller();	
		
		//load language   

		//load module
		$this->load->model('beneficial_model');
		$this->mr['title'] = 'Beneficial Diversifiers';
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{	
		$this->showlist();
	}
	
	function showlist()
	{
		$this->mysmarty->assign('tpl_center','beneficialdiversifiers/index.tpl');
		$this->mr = $this->beneficial_model->get(1);
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		if($this->session->flashdata('frm'))
			$this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
	}
	
	function save()
	{
		$this->load->library('validation');

		$this->load->view('admin_beneficialdiversifiers/beneficialdiversifiers_validation.php', '', FALSE); // field validation

		$record = array(	
			'utips1' => $this->validation->utips1,
			'ultt1' => $this->validation->ultt1,
			'g1' => $this->validation->g1,
			'gci1' => $this->validation->gci1,
			's1' => $this->validation->s1,
			'jemb1' => $this->validation->jemb1,
			'djure1' => $this->validation->djure1,
			'msk1' => $this->validation->msk1,
			'mm1' => $this->validation->mm1,
			'ma1' => $this->validation->ma1,
			'mjsc1' => $this->validation->mjsc1,
			'sgh1' => $this->validation->sgh1,
			'r2v1' => $this->validation->r2v1,
			'msa1' => $this->validation->msa1,
				
			'utips2' => $this->validation->utips2,
			'ultt2' => $this->validation->ultt2,
			'g2' => $this->validation->g2,
			'gci2' => $this->validation->gci2,
			's2' => $this->validation->s2,
			'jemb2' => $this->validation->jemb2,
			'djure2' => $this->validation->djure2,
			'msk2' => $this->validation->msk2,
			'mm2' => $this->validation->mm2,
			'ma2' => $this->validation->ma2,
			'mjsc2' => $this->validation->mjsc2,
			'sgh2' => $this->validation->sgh2,
			'r2v2' => $this->validation->r2v2,
			'msa2' => $this->validation->msa2,
			
			'utips3' => $this->validation->utips3,
			'ultt3' => $this->validation->ultt3,
			'g3' => $this->validation->g3,
			'gci3' => $this->validation->gci3,
			's3' => $this->validation->s3,
			'jemb3' => $this->validation->jemb3,
			'djure3' => $this->validation->djure3,
			'msk3' => $this->validation->msk3,
			'mm3' => $this->validation->mm3,
			'ma3' => $this->validation->ma3,
			'mjsc3' => $this->validation->mjsc3,
			'sgh3' => $this->validation->sgh3,
			'r2v3' => $this->validation->r2v3,
			'msa3' => $this->validation->msa3,
			
		);
		
        
		if ($this->validation->run() == FALSE ) {
			$error = array(
				//'username_error' => $this->validation->txt_username_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_beneficialdiversifiers');
			
			die();
			
		} 
		$record['note'] =$this->input->post('txt_note');
				//Have an ID, updating existing record
		$result = $this->beneficial_model->update(1, $record);
        if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('admin_beneficialdiversifiers', 'refresh');
		
		die();
			
		//if
	}
	
}
?>