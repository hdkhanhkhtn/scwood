<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Faqs()
	{
		parent::Controller();
		
		//load model
		$this->load->model('faqs_model');
		
		//paging - search		
		$this->search = array('keyword' => '','sql_where' => 'faqs_active = 1', 'page' => 0);
		
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
	
	function search()
	{
		//get session data
		if($this->session->flashdata('sess_search'))
		{
			$this->search = $this->session->flashdata('sess_search');
		}	
			
		//search key
		if($this->input->post('txt_keyword') !== false)
		{
	
			$this->search['keyword'] = $this->input->post('txt_keyword');
			
			if($this->search['keyword'])
			{
			$this->search['sql_where'] = ' ( faqs_question like \'%'.$this->search['keyword'].'%\' OR faqs_answer like \'%'.$this->search['keyword'].'%\')';
			}
			else
			{
			$this->search['sql_where'] = '';	
			}
			
		}
		
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
		$this->mysmarty->assign('tpl_center','faqs/index.tpl');

		//paging
		$total_rows = $this->faqs_model->count_result($this->search['sql_where']);
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line'],$total_rows,'/faqs/search/page/');
		//$this->paging_model->limit($page,3,$total_rows,'/faqs/search/page/');
		
		//run sql
		if($this->search['sql_where'])$this->db->where($this->search['sql_where']);
		
		$this->mlist = $this->faqs_model->get();
		
	}
	
	function detail($id)
	{
		$row = $this->faqs_model->get($id);
	
		$row['faqs_answer'] = nl2br($row['faqs_answer']);
		
		$this->mr = array_merge($row,$this->mr);
	}
	

	
}
?>