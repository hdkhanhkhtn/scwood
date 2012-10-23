<?php

class Column extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	
	function Column()
	{
		parent::Controller();
		$this->search = array('sel_type' =>'','keyword' => '','page' => 0,'page_id'=>'');
		$this->session->keep_flashdata('sess_search');
		$this->load->model('page_model');
		$this->load->model('bbs_model');
		$this->db->where('page_active',1);
		if(!$this->login_model->is_login(1))
		{
			$this->db->where('page_permission',0);
		}
		$this->lst_menu = $this->page_model->get();
		$this->mysmarty->assign('lst_menu',$this->lst_menu);
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{	
		$this->mysmarty->assign('tpl_center','column/column.tpl');
	}
	
	function lang($lang)
	{
		$this->session->set_userdata('client_lang',$lang);
		redirect('home/','refresh');
		die();
	}
	
	function show()
	{
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['id']))
		{
			$this->db->where('bbs_page_id',$par['id']);
			$this->search['page_id'] = $par['id'];
		}
		$this->showlist();
	}
	
	function showlist()
	{
			
		$this->mysmarty->assign('tpl_center','column/column.tpl');
		
		//paging
		$this->where_sql($this->search);
		
		$total_rows = $this->bbs_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line'],$total_rows,'/column/search_column/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/board/search_board/page/');
		
		//run sql		
		$this->where_sql($this->search);
		
		$this->mlist = $this->bbs_model->get();	
		//check is logined or not?
		
		if(is_array($this->mlist))
		{
			for($i = 0; $i < count($this->mlist); $i++)
			{
				$this->mlist[$i]['bbs_time'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['bbs_time']);			
				$str_count =  substr_count($this->mlist[$i]['bbs_level'], '|');
				
				if($str_count >= 1)$this->mlist[$i]['bbs_span'] = str_repeat("&nbsp;&nbsp;",$str_count);
			
			}
		}
		$this->mr['page_id'] = $this->search['page_id'];
		$tmp = $this->page_model->get($this->search['page_id']);
		if ($tmp)
			$this->mr['title'] = $tmp['page_title'];
		if($this->session->flashdata('str_msg')) $this->mr['str_msg'] = $this->session->flashdata('str_msg');
		$this->session->set_flashdata('sess_search',$this->search);
	}

	function where_sql($search)
	{	
		
		//$this->search = $this->session->flashdata('sess_search');
		$this->db->where('bbs_page_id',$this->search['page_id']);
		$this->db->where('bbs_active',1);
		if($search['keyword'])
		{
			switch ($search['sel_type'])
			{
			case "1":
				$this->db->like('bbs_title',$search['keyword']);
				break;
				
			case "2":
				$this->db->like('bbs_user',$search['keyword']);
				break;
				
			case "3":
				$this->db->like('bbs_content',$search['keyword']);
				break;
				
			default:
				$keyword = $this->db->escape_str($search['keyword']);
				$sql ="(bbs_user LIKE '%".$keyword."%' "; 
				$sql.=" OR bbs_title LIKE '%".$keyword."%' "; 
				$sql.= " OR bbs_content LIKE '%".$keyword."%')";
				$this->db->where($sql);
			}
			
		}
		
	}
	
	function detail($id)
	{
		$par = $this->uri->uri_to_assoc(3);
		if (isset($par['pid']))
		{
			$this->db->where('bbs_page_id',$par['pid']);
			$this->search['page_id'] = $par['pid'];
		}
		else
			$this->db->where('bbs_page_id',$this->search['page_id']);
		$this->db->where('bbs_page_id',$this->search['page_id']);
		$this->mr = $this->bbs_model->get($id);
		$this->mr['bbs_time'] = format_intdate($this->site['site_short_date'],$this->mr['bbs_time']);
		
		$this->mr['bbs_content'] = nl2br($this->mr['bbs_content']);
		
		//set increate view
	
		$record_upt['bbs_count'] = $this->mr['bbs_count']+1;
		
		$this->bbs_model->update($id,$record_upt);
	}
	
	function search_column()
	{
		if($this->session->flashdata('sess_search'))
		{
			$this->search = $this->session->flashdata('sess_search');	
		}

		if($this->input->post('txt_keyword') !== false || $this->input->post('sel_type') !== false)
		{
			$this->search['keyword'] = $this->input->post('txt_keyword');
			$this->search['sel_type'] = $this->input->post('sel_type');
			$this->search['page'] = 0;
		}
		
		$par = $this->uri->uri_to_assoc(3);
		//show list
		if (isset($par['id']))
			$this->detail($par['id']); 
		//get current page
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
			//echo 'search board'.$par['page'];
		}
		
		//assign keyword
		$this->mr['keyword'] = $this->search['keyword'];
		
		if(isset($this->search['sel_type']))
		{
			$str_tmp = 'type'.$this->search['sel_type'].'_selected';
			
			$this->mr[$str_tmp] = 'selected';
		}
		$this->session->set_flashdata('sess_search',$this->search);
		$this->showlist();
	}

	function create_column()
	{
		//print_r($this->session->flashdata('sess_search'));
		if ($this->session->flashdata('sess_search'))
		{	
			//echo 'hi';
			$this->search = $this->session->flashdata('sess_search');
			$tmp = $this->page_model->get($this->search['page_id']);
			$this->mr['title'] = $tmp['page_title'];
		}

		$par = $this->uri->uri_to_assoc(3);
		
		$this->mr['reid'] = isset($par['reid'])?$par['reid']: '';
		if ($this->mr['reid'])
		{
			$tmp = $this->bbs_model->get($this->mr['reid']);
			$this->mr['page_id'] = 	$tmp['bbs_page_id'];
		}
		
		if (isset($par['id']))
		{
			$tmp = $this->page_model->get('page_id',$par['id']);
			$this->mr['page_id'] =  $par['id'];
				
		}
		$this->mysmarty->assign('tpl_center','column/frm_column.tpl');
	}
	
	function column_sm()
	{

		$this->load->library('validation');
		
		$this->load->view('column/column_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();
        
        $bbs_id = $this->input->post('bbs_id');
        
        $reid = $this->input->post('reid');
        
        //print_r( $this->session->userdata['sess_customer'])
        
		$record = array(		
			'bbs_content' => $this->validation->txt_content,
			'bbs_title' => $this->validation->txt_title,
			'bbs_user' => $this->session->userdata['sess_customer']['username'],
			'bbs_email' => $this->session->userdata['sess_customer']['email'],
			'bbs_active' => 1,
			'bbs_time' => time(),
			'bbs_page_id' =>$this->input->post('hd_id'),
		);
		if ( $is_valid == FALSE ) {

			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			$this->session->set_flashdata('frm',array_merge($record,$error)); 
			
			if($bbs_id)redirect('column/edit/id/'.$bbs_id);
			
			//elseif($re_id) redirect('bbs/create/reid/'.$re_id);
			
			else redirect('column/create_column/id/2');
			
			die();
			
		} 
		
		if(!$bbs_id)
		{
			// No ID, adding new record
			//using Transactions 
			$this->db->trans_begin();
			$id_insert = $this->bbs_model->insert($record);
			
			//check new topic or answer for topic
			if($reid)
			{
				//set level - answer
				$row = $this->bbs_model->get($reid);
				$record_upt['bbs_level'] = $row['bbs_level'].'|'.$id_insert;
				$record_upt['bbs_pid'] = $row['bbs_pid'];
			}
			else
			{
				//new topic 
				$record_upt['bbs_pid'] = $id_insert;
				
			}
			$this->bbs_model->update($id_insert,$record_upt);
			
			
			if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			}
			else
			{
			    $this->db->trans_commit();
			}
			//end stransactions
			
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_add')));
		}
		else
		{
			//Have an ID, updating existing record
			$this->bbs_model->update($bbs_id, $record);
			$this->session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
		}	
		redirect('column/show/id/'.$this->input->post('hd_id'),'refresh');

		die();
	}
	
	function edit()
	{
		if ($this->session->flashdata('sess_search'))
		{	
			$this->search = $this->session->flashdata('sess_search');
			$tmp = $this->page_model->get($this->search['page_id']);
			$this->mr['title'] = $tmp['page_title'];
		}
		
		$this->mysmarty->assign('tpl_center','column/frm_column.tpl');
			
		$par = $this->uri->uri_to_assoc(3);
		$this->mr['page_id'] = $this->search['page_id'];
		$this->mr['bbs_id'] = isset($par['bbs_id'])?$par['bbs_id']: '';
		
		if($this->mr['bbs_id'])
		{	
			$row = $this->bbs_model->get($this->mr['bbs_id']);
			$this->mr = array_merge($row,$this->mr);
		}
		//if not return
	}
	
	function delete()
	{
		
		$par = $this->uri->uri_to_assoc(3);

		if (isset($par['bbs_id']))
		{
			$tmp = $this->bbs_model->get($par['bbs_id']);
			if ($tmp)
			{
				if ($tmp['bbs_level']!='1')
				{
					$this->db->like('bbs_level',$tmp['bbs_level']);
					$result = $this->bbs_model->get();
				}
				else
				{
					$this->db->where('bbs_pid',$tmp['bbs_pid']);
					$result = $this->bbs_model->get();
				}
				for ($i=0;$i<count($result);$i++)
				{
					$this->bbs_model->delete($result[$i]['bbs_id']);
					
				}
			}
		}
		redirect('column/search_column','refresh');
	}
	
}