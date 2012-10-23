<?php

class Admin_invoice extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;
	
	function Admin_invoice()
	{
		parent::Controller();	
		
		//load lang
		$this->lang->load('iteminvoice', $this->site['site_lang_admin']);
		
		$this->lang->load('customer', $this->site['site_lang_admin']);
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
		
		$this->load->model('invoice_model');
		
		$this->mr['title'] = 'Sale';
		
		$this->search = array('keyword' => '','status'=>'1', 'page' => 0);
		
		$this->session->keep_flashdata('sess_search');
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->assign('mlist',$this->mlist);
		
		$this->mysmarty->view('admin/index');
	}
	
	
	
	function index()
	{	
		$this->mr['status'] = $this->search['status'];
		
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();

	}
	
	function order()
	{	
		$this->search['status'] = '0';
		
		$this->mr['status'] = $this->search['status'];
		
		$this->session->set_flashdata('sess_search',$this->search);
		
		$this->showlist();
		
	}
	
	function search()
	{	
		if($this->session->flashdata('sess_search')){
			
			$this->search = $this->session->flashdata('sess_search');
		}
			
		//billing name
		if($this->input->post('txt_keyword') !== false){
	
			$this->search['keyword'] = $this->input->post('txt_keyword');
		
		}
		
		//set status
		if($this->input->post('status') !== false){
			
			$this->search['status'] = $this->input->post('status');
			
		}

		//get current page
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		
		if(isset($this->search['status']))
		{
			$str_tmp = 'status'.$this->search['status'].'_selected';
			
			$this->mr[$str_tmp] = 'selected';
		}
		
		//assign key word
		$this->mr['keyword'] = $this->search['keyword'];
		
		$this->mr['status'] = $this->search['status'];
		
		$this->session->set_flashdata('sess_search',$this->search);

		$this->showlist();

	}
	
	function where_sql()
	{ 
		//set sql_where	
		
		if($this->search['status'])
		{
			$this->db->where('invoice_status ' ,$this->search['status']); 
		}else
			$this->db->where('invoice_status' ,0); 
		
		if($this->search['keyword']){
				
			$this->db->like('invoice_billing_name', $this->search['keyword']); 
		}
		 
	}
	
	function showlist()
	{	
		$this->mysmarty->assign('tpl_center','invoice/list.tpl');
		//echo	$this->search['sql_where']; 
			
		//paging
		$this->where_sql();
		
		$total_rows = $this->invoice_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/admin_invoice/search/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/admin_invoice/search/page/');
		
		//run sql
		$this->where_sql();
		
		$this->mlist = $this->invoice_model->get();
		
		//get max status
		$max_status = $this->invoice_model->get_max_status();
		
		if(is_array($this->mlist))
		{
			for($i = 0; $i < count($this->mlist); $i++)
			{	
				$this->mlist[$i]['invoice_status_name'] = $this->invoice_model->get_status($this->mlist[$i]['invoice_status']);
				
				if($this->mlist[$i]['invoice_status'] == $max_status['status_id'])
				{
					$this->mlist[$i]['invoice_status_next'] = 0;
				}
				else
				{
					$this->mlist[$i]['invoice_status_next'] = $this->mlist[$i]['invoice_status'] + 1;	
				}
				
				//format
				$this->mlist[$i]['invoice_total'] = format_currency($this->mlist[$i]['invoice_total'],$this->mlist[$i]['invoice_currency']);
				
				$this->mlist[$i]['invoice_date'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['invoice_date']);
	
			}
		}
		
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		
		
	}
	
	
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','invoice/frm.tpl');

		if($this->session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->session->flashdata('frm'));
		
		//set default load
		$this->mr['invoice_active'] = 1;
	}
	
	function edit(){
	
		$this->mysmarty->assign('tpl_center','invoice/frm.tpl');
			
		$par = $this->uri->uri_to_assoc(3);
		
		$data = $this->invoice_model->get($par['id']);
		
		$this->mr = array_merge($this->mr,$data);
		
		$this->mr['invoice_total'] = format_currency($this->mr['invoice_total'],$this->mr['invoice_currency']);

		//invoice detail

      	$this->mlist = $this->invoice_model->get_detail($par['id']);


        for($i = 0; $i < count($this->mlist); $i++){

            $this->mlist[$i]['invdt_item_amount'] = $this->mlist[$i]['invdt_item_price'] * $this->mlist[$i]['invdt_item_qty'];
            
             
        	$this->mlist[$i]['invdt_item_price'] = format_currency($this->mlist[$i]['invdt_item_price'],$this->mr['invoice_currency']);
			
			$this->mlist[$i]['invdt_item_amount'] = format_currency($this->mlist[$i]['invdt_item_amount'],$this->mr['invoice_currency']);
			
			

        }
        
        //get lst status
        $list_status = $this->invoice_model->get_status();
        $this->mysmarty->assign('list_status',$list_status);

	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);

		$record['invoice_status'] = $par['status'];
		
		$invoice_id = $this->invoice_model->update($par['id'], $record);
		
		if($invoice_id)
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_invoice/search', 'refresh');
		
		die();
			
	}
	
	function save()
	{
		
		$invoice_id = $this->input->post('invoice_id');
		
		$this->load->library('validation');
		
		$this->load->view('admin_invoice/invoice_validation.php', '', FALSE); // field validation
		
		$is_valid = $this->validation->run();
		
		$record = array(		
			'invoice_status' => $this->validation->sel_status,
			
		);

		if ($is_valid == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			redirect('admin_invoice/edit/id/'.$invoice_id);
		
			die();
			
		} else {
			
			$invoice_id = $this->invoice_model->update($invoice_id, $record);
			
			if($invoice_id)
				$this->session->set_flashdata('msg_success',$this->lang->line('msg_status_change'));
			else
				$this->session->set_flashdata('msg_error',$this->lang->line('msg_data_error'));	
				
			redirect('admin_invoice/search', 'refresh');
	
			die();
			
		}//if

	}
	
	function delete()
	{
		
		$par = $this->uri->uri_to_assoc(3);

		$id = $this->invoice_model->delete($par['id']);

        $this->session->set_flashdata('msg_success',set_message($this->lang->line('msg_data_del'))); 
		
		redirect('admin_invoice/search', 'refresh');
		
		die();
		
	}
	
	function saveall()
	{
		
		$arr_id = $this->input->post('chk_id');
		
		if(is_array($arr_id)){
			
			//do with action select
			$sel_action = $this->input->post('sel_action');
		
			if($sel_action == 'delete'){
				$id = $this->invoice_model->delete($arr_id);
				
			}elseif($sel_action == 'block'){
				$data = array('invoice_active' => 0);
				$id = $this->invoice_model->update($arr_id,$data);
				
			}elseif($sel_action == 'active'){
				$data = array('invoice_active' => 1);
				$id = $this->invoice_model->update($arr_id,$data);
			}
			
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		
		}else{
		
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		}
		

		redirect('admin_invoice/search', 'refresh');
		
		die();
	
	}
	
	
}
?>