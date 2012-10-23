<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qna extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Qna()
	{
		parent::Controller();
		
		//load model
		$this->load->model('qna_model');
		
		//load language
		$this->lang->load('faq_qna', $this->session->userdata('client_lang'));
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		//paging - search		
		$this->search = array('keyword' => '','sql_where' => 'qna_active = 1', 'page' => 0);
		
		$this->session->keep_flashdata('sess_search');
		
		//set title
		$this->mr['title'] = 'Q&A';		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
		
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();

	}
	
	function where_sql($search)
	{
		$this->db->where('qna_active',1);
	}
	
	function search()
	{
		
		// get id
		$par = $this->uri->uri_to_assoc(3);
		
		if(isset($par['id'])) $this->detail($par['id']);
		
		//get current page
		if(isset($par['page']))
		{
			$this->search['page'] = $par['page'];
		}
		
		//assign keyword
		$this->mr['keyword'] = $this->search['keyword'];
		
		$this->session->set_flashdata('sess_search',$this->search);

		$this->showlist();
		
	}
	
	function showlist()
	{
		$this->mysmarty->assign('tpl_center','qna/index.tpl');

		//paging
		$this->where_sql($this->search);
		$total_rows = $this->qna_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line'],$total_rows,'/qna/search/page/');
		//$this->paging_model->limit($page,3,$total_rows,'/qna/search/page/');
		
		//run sql
		if($this->search['sql_where'])$this->db->where($this->search['sql_where']);
		
		$this->mlist = $this->qna_model->get();
		
	}
	
	function detail($id)
	{
		$row = $this->qna_model->get($id);
	
		$row['qna_answer'] = nl2br($row['qna_answer']);
		
		$this->mr = array_merge($row,$this->mr);
	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','qna/frm.tpl');

	}
	
	function sm()
	{
		
		$this->load->library('validation');
		
		$this->load->view('qna/qna_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();
		
		$record = array(		
			'qna_question' => $this->validation->txt_question,
			'qna_name' => $this->validation->txt_name,
			'qna_email' => $this->validation->txt_email,
			'qna_active' => 1,
			'qna_time' => time(),
		);

		if ( $is_valid == FALSE ) {

			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('qna/create');
			
			die();
			
		} 

		$result = $this->qna_model->insert($record);
		
        if($result)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			
		redirect('qna/search', 'refresh');

		die();
		
	}
	
}
?>