<?php
//pass read
//pass edit
//no reply
class News extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function News()
	{
		parent::Controller();
		
		$this->lang->load('news',$this->session->userdata('client_lang'));
		
		$this->mysmarty->assign('lang',$this->lang->toArray());
		
		$this->search = array('keyword' => '', 'page' => 0);
		
		$this->load->model('news_model');
		
		$this->mr['title'] = 'NEWS';	
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
		if($this->input->post('txt_keyword') !== false){
			$this->search['keyword'] = $this->input->post('txt_keyword');	
		
		}elseif($this->session->flashdata('sess_search'))
		{				
			$this->search = $this->session->flashdata('sess_search');		
		}				
		//get current page	
		$par = $this->uri->uri_to_assoc(3);
		if (isset($par['id']))
		{
			if ($par['id'])
				$this->detail($par['id']);
		}	
		
		if(isset($par['page'])){
		$this->search['page'] = $par['page'];	
		}		//assign key word		
		
		$this->mr['keyword'] = $this->search['keyword'];			
		
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();	
	}
	
	function where_sql($kw)
	{	
		$this->db->where('news_active',1);
		
		$keyword = $this->db->escape_str($kw);
		
		if ($this->search['keyword'])
		{	
			$sql='(news_comment LIKE \'%'.$keyword.'%\' OR news_title LIKE \'%'.$keyword.'%\' OR news_content LIKE \'%'.$keyword.'%\')';
			$this->db->where($sql);
		}
	}
	
	function showlist()
	{
		$this->mysmarty->assign('tpl_center','news/index.tpl');
			
		$par = $this->uri->uri_to_assoc(3);
		
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		//if($this->search['keyword'])$this->where_sql($this->search['keyword']);
		$this->where_sql($this->search['keyword']);
		
		$total_rows = $this->news_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line'],$total_rows,'/news/search/page/');
		//$this->paging_model->limit($page,3,$total_rows,'/news/search/page/');
		
		//if($this->search['keyword'])$this->where_sql($this->search['keyword']);
		$this->where_sql($this->search['keyword']);
		
		$this->mlist = $this->news_model->get();
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
	}
	
	function detail()
	{
		$this->mysmarty->assign('tpl_center','news/detail.tpl');
		
		$par = $this->uri->uri_to_assoc(3);
		
		$id = isset($par['id'])?$par['id']:'';
		
		if ($id)
		{
			//get detail by id
			$this->mr = $this->news_model->get($id);
			
			//get top 5
			$this->db->select('news_title,news_id');
			$this->db->where('news_id != ',$id);
			$this->db->from('news');
			
			$this->db->limit(5);
			$query = $this->db->get();
			$this->mlist = $query->result_array();
		}
    }
		

}
?>