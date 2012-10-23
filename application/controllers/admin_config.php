<?php

class Admin_config extends Controller {
	
	var $mr;
	var $mlist;
	var $site;

	function Admin_config()
	{
		parent::Controller();
		$this->mr['title'] = 'Site management';
		
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('admin/index');
	}
	
	function index()
	{
		
		$this->mysmarty->assign('tpl_center','config/index.tpl');
		
		$query = $this->db->get('site');
		
		$this->mr = array_merge($this->mr,$query->row_array());
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
	
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}
		$this->mr['site_footer'] = htmlspecialchars($this->mr['site_footer']);
	
	}
	function index_sm()
	{
	
		$this->load->library('validation');

		$this->load->view('admin_config/index_validation.php', '', FALSE); // field validation

		$is_valid = $this->validation->run();

		$record = array(
			'site_name' => $this->validation->txt_name,
            'site_phone' => $this->validation->txt_phone,
            'site_fax' => $this->validation->txt_fax,
            'site_email' => $this->validation->txt_email,
            'site_bankacc' => $this->validation->txt_bankacc,

            'site_title' => $this->validation->txt_title,
            'site_keyword' => $this->validation->txt_keyword,
            'site_footer' => $this->validation->txt_footer,

		);

		if ($is_valid == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
				
		} else {
			$this->db->limit('1');
			$result = $this->db->update('site', $record);
			
			if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		}
		
		redirect('admin_config', 'refresh');
		
		die();
				
	}
	
	function delete_re($id)
	{
		$this->db->where('report_id',$id);
		$result = $this->db->delete('config_report');
		redirect('admin_config/report', 'refresh');
	} 
	
	function report_sm()
	{ 
		$this->load->library('validation');
		$is_valid = $this->validation->run();
		$hd = $this->input->post('hd');
	   
		
	    $record_arr = array ();
		$temp_6a = $this->input->post('arr_6a');
		$temp_6a1 = $this->input->post('arr_6a1');
		$temp_6a2 = $this->input->post('arr_6a2');
		for($i=0;$i<count($temp_6a);$i++)
		{
			if($temp_6a[$i] !="")
			{
			$record_arr[$i]['report_6a'] = $temp_6a[$i];
			$record_arr[$i]['report_6a1'] = $temp_6a1[$i];
			$record_arr[$i]['report_6a2'] = $temp_6a2[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			//echo $this->db->last_query();
			}
			
			//echo $this->db->last_query();
			
		}
		
		$record_arr="";
		$temp6b = $this->input->post('arr_6b');
		$temp6b1 = $this->input->post('arr_6b1');
		$temp6b2 = $this->input->post('arr_6b2');
		//echo count($temp6b);
		for($i=0;$i<count($temp6b);$i++)
		{
			if($temp6b[$i] !="")
			{
			$record_arr[$i]['report_6b'] = $temp6b[$i];
			$record_arr[$i]['report_6b1'] = $temp6b1[$i];
			$record_arr[$i]['report_6b2'] = $temp6b2[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
			//
		}
		
		$temp7 = $this->input->post('arr_7');
		$temp71 = $this->input->post('arr_71');
		$temp72 = $this->input->post('arr_72');
		$record_arr="";
		//echo count($temp7);
		for($i=0;$i<count($temp7);$i++)
		{
			if($temp7[$i] !="")
			{
			$record_arr[$i]['report_7'] = $temp7[$i];
			$record_arr[$i]['report_71'] = $temp71[$i];
			$record_arr[$i]['report_72'] = $temp72[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
			//echo $this->db->last_query();
		}
      
		$temp8a1 = $this->input->post('arr_8a1');
		$temp8a11 = $this->input->post('arr_8a11');
		$temp8a12 = $this->input->post('arr_8a12');
		$record_arr="";
		for($i=0;$i<count($temp8a1);$i++)
		{
			if($temp8a1[$i] !="")
			{
			$record_arr[$i]['report_8a1'] = $temp8a1[$i];
			$record_arr[$i]['report_8a11'] = $temp8a11[$i];
			$record_arr[$i]['report_8a12'] = $temp8a12[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		$temp8a2 = $this->input->post('arr_8a2');
		$temp8a21 = $this->input->post('arr_8a21');
		$temp8a22 = $this->input->post('arr_8a22');
		$record_arr="";
		for($i=0;$i<count($temp8a2);$i++)
		{
			if($temp8a2[$i] !="")
			{
			$record_arr[$i]['report_8a2'] = $temp8a2[$i];
			$record_arr[$i]['report_8a21'] = $temp8a21[$i];
			$record_arr[$i]['report_8a22'] = $temp8a22[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$temp8d = $this->input->post('arr_8d');
		$temp8d1 = $this->input->post('arr_8d1');
		$temp8d2 = $this->input->post('arr_8d2');
		$record_arr="";
		for($i=0;$i<count($temp8d);$i++)
		{
			if($temp8d[$i] !="")
			{
			$record_arr[$i]['report_8d'] = $temp8d[$i];
			$record_arr[$i]['report_8d1'] = $temp8d1[$i];
			$record_arr[$i]['report_8d2'] = $temp8d2[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		$temp8e = $this->input->post('arr_8e');
		$temp8e1 = $this->input->post('arr_8e1');
		$temp8e2 = $this->input->post('arr_8e2');
		$record_arr="";
		for($i=0;$i<count($temp8e);$i++)
		{
			if($temp8e[$i] !="")
			{
			$record_arr[$i]['report_8e'] = $temp8e[$i];
			$record_arr[$i]['report_8e1'] = $temp8e1[$i];
			$record_arr[$i]['report_8e2'] = $temp8e2[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
	
		$temp10 = $this->input->post('arr_10');
		$temp101 = $this->input->post('arr_101');
		$temp102 = $this->input->post('arr_102');
		$record_arr="";
		for($i=0;$i<count($temp10);$i++)
		{
			if($temp10[$i] !="")
			{
			$record_arr[$i]['report_10'] = $temp10[$i];
			$record_arr[$i]['report_101'] = $temp101[$i];
			$record_arr[$i]['report_102'] = $temp102[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$record_arr="";
		$temp15 = $this->input->post('arr_15');
		$temp151 = $this->input->post('arr_151');
		$temp152 = $this->input->post('arr_152');
		for($i=0;$i<count($temp15);$i++)
		{
			if($temp15[$i] !="")
			{
			$record_arr[$i]['report_15'] = $temp15[$i];
			$record_arr[$i]['report_151'] = $temp151[$i];
			$record_arr[$i]['report_152'] = $temp152[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$record_arr="";
		$temp16 = $this->input->post('arr_16');
		$temp161 = $this->input->post('arr_161');
		$temp162 = $this->input->post('arr_162');
		for($i=0;$i<count($temp16);$i++)
		{
			if($temp16[$i] !="")
			{
			$record_arr[$i]['report_16'] = $temp16[$i];
			$record_arr[$i]['report_161'] = $temp161[$i];
			$record_arr[$i]['report_162'] = $temp162[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$record_arr="";
		$temp17 = $this->input->post('arr_17');
		$temp171 = $this->input->post('arr_171');
		$temp172 = $this->input->post('arr_172');
		for($i=0;$i<count($temp17);$i++)
		{
			if($temp17[$i] !="")
			{
			$record_arr[$i]['report_17'] = $temp17[$i];
			$record_arr[$i]['report_171'] = $temp171[$i];
			$record_arr[$i]['report_172'] = $temp172[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$record_arr="";
		$temp18 = $this->input->post('arr_18');
		$temp181 = $this->input->post('arr_181');
		$temp182 = $this->input->post('arr_182');
		for($i=0;$i<count($temp18);$i++)
		{
			if($temp18[$i] !="")
			{
			$record_arr[$i]['report_18'] = $temp18[$i];
			$record_arr[$i]['report_181'] = $temp181[$i];
			$record_arr[$i]['report_182'] = $temp182[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$record_arr="";
		$temp19 = $this->input->post('arr_19');
		$temp191 = $this->input->post('arr_191');
		$temp192 = $this->input->post('arr_192');
		for($i=0;$i<count($temp19);$i++)
		{
			if($temp19[$i] !="")
			{
			$record_arr[$i]['report_19'] = $temp19[$i];
			$record_arr[$i]['report_191'] = $temp191[$i];
			$record_arr[$i]['report_192'] = $temp192[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
		$record_arr="";
		$temp20 = $this->input->post('arr_20');
		$temp201 = $this->input->post('arr_201');
		$temp202 = $this->input->post('arr_202');
		for($i=0;$i<count($temp20);$i++)
		{
			if($temp20[$i] !="")
			{
			$record_arr[$i]['report_20'] = $temp20[$i];
			$record_arr[$i]['report_201'] = $temp201[$i];
			$record_arr[$i]['report_202'] = $temp202[$i];
			$result = $this->db->insert('config_report', $record_arr[$i]);
			}
		}
		
			$record = array();
			$report_6a = $this->input->post('txt_6a');
			$report_6a1 = $this->input->post('txt_6a1');
			$report_6a2 = $this->input->post('txt_6a2');
			$report_id_6a =$this->input->post('hd_old_6a');
			//echo count($report_6a);
			for($i=0;$i<count($report_6a);$i++)
			{
				if($report_id_6a[$i] !="")
			   {
				$record[$i]['report_6a'] = $report_6a[$i];
				$record[$i]['report_6a1'] = $report_6a1[$i];
				$record[$i]['report_6a2'] = $report_6a2[$i];
				$this->db->where('report_id',$report_id_6a[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
				//echo $this->db->last_query().'<br/>';
			   }
			}
			
			
			$report_6b = $this->input->post('txt_6b');
			$report_6b1 = $this->input->post('txt_6b1');
			$report_6b2 = $this->input->post('txt_6b2');
			$report_id_6b =$this->input->post('hd_old_6b');
			$record ="";
			//echo count($report_6b);
			for($i=0;$i<count($report_6b);$i++)
			{
			   if($report_id_6b[$i] !="")
			   {
				$record[$i]['report_6b'] = $report_6b[$i];
				$record[$i]['report_6b1'] = $report_6b1[$i];
				$record[$i]['report_6b2'] = $report_6b2[$i];
				$this->db->where('report_id',$report_id_6b[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
				//echo $this->db->last_query().'<br/>';
				//echo 'fdfdf';
			   }
			}
			//die();
			
			$report_7 = $this->input->post('txt_7');
			$report_71 = $this->input->post('txt_71');
			 $report_72 = $this->input->post('txt_72');
			 $report_id_7 =$this->input->post('hd_old_7');
			 $record ="";
			for($i=0;$i<count($report_7);$i++)
			{
				if($report_id_7[$i] !="")
			   {
				$record[$i]['report_7'] = $report_7[$i];
				$record[$i]['report_71'] = $report_71[$i];
				$record[$i]['report_72'] = $report_72[$i];
				$this->db->where('report_id',$report_id_7[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
            
			
			$report_8a1 = $this->input->post('txt_8a1');
			 $report_8a11 = $this->input->post('txt_8a11');
			 $report_8a12 =$this->input->post('txt_8a12');
			  $report_id_8a =$this->input->post('hd_old_8a1');
			 
			  $record ="";
			for($i=0;$i<count($report_8a1);$i++)
			{
				if($report_id_8a[$i] !="")
			   {
				$record[$i]['report_8a1'] = $report_8a1[$i];
				$record[$i]['report_8a11'] = $report_8a11[$i];
				$record[$i]['report_8a12'] = $report_8a12[$i];
				$this->db->where('report_id',$report_id_8a[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
				//echo $this->db->last_query();
			   }
			}
			//die();
           
			
			$report_8a2 = $this->input->post('txt_8a2');
			 $report_8a21 = $this->input->post('txt_8a21');
			  $report_8a22 = $this->input->post('txt_8a22');
			   $report_id_a2 =$this->input->post('hd_old_8a2');
			   $record ="";
			for($i=0;$i<count($report_8a2);$i++)
			{
				if($report_id_a2[$i] !="")
			   {
				$record[$i]['report_8a2'] = $report_8a2[$i];
				$record[$i]['report_8a21'] = $report_8a21[$i];
				$record[$i]['report_8a22'] = $report_8a22[$i];
				$this->db->where('report_id',$report_id_a2[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
           

			$report_8d = $this->input->post('txt_8d');
			 $report_8d1 = $this->input->post('txt_8d1');
			  $report_8d2 = $this->input->post('txt_8d2');
			   $report_id_8d =$this->input->post('hd_old_8d');
			   $record ="";
			for($i=0;$i<count($report_8d);$i++)
			{
				if($report_id_8d[$i] !="")
			   {
				$record[$i]['report_8d'] = $report_8d[$i];
				$record[$i]['report_8d1'] = $report_8d1[$i];
				$record[$i]['report_8d2'] = $report_8d2[$i];
				$this->db->where('report_id',$report_id_8d[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
				//echo $this->db->last_query();
			   }
			}
           //die();
			$report_8e = $this->input->post('txt_8e');
			 $report_8e1 = $this->input->post('txt_8e1');
			 $report_8e2 = $this->input->post('txt_8e2');
			  $report_id_8e =$this->input->post('hd_old_8e');
			  $record ="";
			for($i=0;$i<count($report_8e);$i++)
			{
				if($report_id_8e[$i] !="")
			   {
				$record[$i]['report_8e'] = $report_8e[$i];
				$record[$i]['report_8e1'] = $report_8e1[$i];
				$record[$i]['report_8e2'] = $report_8e2[$i];
				$this->db->where('report_id',$report_id_8e[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
           
			$report_10 = $this->input->post('txt_10');
			$report_101 = $this->input->post('txt_101');
			$report_102 = $this->input->post('txt_102');
			 $report_id_10 =$this->input->post('hd_old_10');
			 $record ="";
			for($i=0;$i<count($report_10);$i++)
			{
				if($report_id_10[$i] !="")
			   {
				$record[$i]['report_10'] = $report_10[$i];
				$record[$i]['report_101'] = $report_101[$i];
				$record[$i]['report_102'] = $report_102[$i];
				$this->db->where('report_id',$report_id_10[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
            $report_15 = $this->input->post('txt_15');
			$report_151 = $this->input->post('txt_151');
			$report_152 = $this->input->post('txt_152');
			 $report_id_15 =$this->input->post('hd_old_15');
			 $record ="";
			for($i=0;$i<count($report_15);$i++)
			{
				if($report_id_15[$i] !="")
			   {
				$record[$i]['report_15'] = $report_15[$i];
				$record[$i]['report_151'] = $report_151[$i];
				$record[$i]['report_152'] = $report_152[$i];
				$this->db->where('report_id',$report_id_15[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
			
			$report_16 = $this->input->post('txt_16');
			$report_161 = $this->input->post('txt_161');
			$report_162 = $this->input->post('txt_162');
			 $report_id_16 =$this->input->post('hd_old_16');
			 $record ="";
			for($i=0;$i<count($report_16);$i++)
			{
				if($report_id_16[$i] !="")
			   {
				$record[$i]['report_16'] = $report_16[$i];
				$record[$i]['report_161'] = $report_161[$i];
				$record[$i]['report_162'] = $report_162[$i];
				$this->db->where('report_id',$report_id_16[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
           
			$report_17 = $this->input->post('txt_17');
			$report_171 =$this->input->post('txt_171');
			$report_172 = $this->input->post('txt_172');
			$report_id_17 =$this->input->post('hd_old_17');
			$record ="";
			for($i=0;$i<count($report_17);$i++)
			{
				if($report_id_17[$i] !="")
			   {
				$record[$i]['report_17'] = $report_17[$i];
				$record[$i]['report_171'] = $report_171[$i];
				$record[$i]['report_172'] = $report_172[$i];
				$this->db->where('report_id',$report_id_17[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
            
			$report_18 = $this->input->post('txt_18');
			$report_181 = $this->input->post('txt_181');
			$report_182 = $this->input->post('txt_182');
			$report_id_18 =$this->input->post('hd_old_18');
			$record ="";
			for($i=0;$i<count($report_18);$i++)
			{
				if($report_id_18[$i] !="")
			   {
				$record[$i]['report_18'] = $report_18[$i];
				$record[$i]['report_181'] = $report_181[$i];
				$record[$i]['report_182'] = $report_182[$i];
				$this->db->where('report_id',$report_id_18[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
				}
			}
            

			$report_19 = $this->input->post('txt_19');
			$report_191 = $this->input->post('txt_191');
			$report_192 = $this->input->post('txt_192');
			$report_id_19 =$this->input->post('hd_old_19');
			$record ="";
			for($i=0;$i<count($report_19);$i++)
			{
				if($report_id_19[$i] !="")
			   {
				$record[$i]['report_19'] = $report_19[$i];
				$record[$i]['report_191'] = $report_191[$i];
				$record[$i]['report_192'] = $report_192[$i];
				$this->db->where('report_id',$report_id_19[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
            
			
			$report_20 = $this->input->post('txt_20');
			$report_201 = $this->input->post('txt_201');
			$report_202 =$this->input->post('txt_202');
			$report_id_20 =$this->input->post('hd_old_20');
			$record ="";
			for($i=0;$i<count($report_20);$i++)
			{
				if($report_id_20[$i] !="")
			    {
				$record[$i]['report_20'] = $report_20[$i];
				$record[$i]['report_201'] = $report_201[$i];
				$record[$i]['report_202'] = $report_202[$i];
				$this->db->where('report_id',$report_id_20[$i]);
			 	$result = $this->db->update('config_report', $record[$i]);
			   }
			}
    		if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
		
		redirect('admin_config/report', 'refresh');
		
				
	}
	
	function setting()
	{

		$this->mysmarty->assign('tpl_center','config/config.tpl');
		
		$query = $this->db->get('site');
		
		$this->mr = array_merge($this->mr,$query->row_array());
		
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
	
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function config_sm()
	{
		
		$this->load->library('validation');

		$this->load->view('admin_config/cf_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(
          'site_short_date' => $this->validation->txt_short_date,
          'site_long_date' => $this->validation->txt_long_date,
          'site_time_zone' => $this->validation->txt_time_zone,
			'site_style' => $this->input->post('select'),
          'site_num_line' => $this->validation->txt_num_line,
          'site_num_line2' => $this->validation->txt_num_line2,
          'site_lang_client' => $this->validation->rdo_lang,
          'site_lang_admin' => $this->validation->rdo_lang_admin,
			'site_state' => $this->input->post('txt_state'),
          'site_invoice' => $this->input->post('txt_invoice'),
		);
		
		if ($is_valid == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 
			
			
			
		} else {

			$this->db->limit('1');
			
			$result = $this->db->update('site', $record);
	
			if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
						
		}
		
		redirect('admin_config/setting', 'refresh');
		
		die();
	
	}
	
	function aboutus()
	{

		$this->mysmarty->assign('tpl_center','config/aboutus.tpl');
		
		$this->db->select('*');
 		$this->db->from('aboutus');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function aboutus_sm()
	{
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'About us';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('aboutus', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/aboutus', 'refresh');
		
		die();
		
		
	}
	
	function customer()
	{

		$this->mysmarty->assign('tpl_center','config/customer.tpl');
		
		$this->db->select('*');
 		$this->db->from('customerpage');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function report()
	{

		$this->mysmarty->assign('tpl_center','config/report.tpl');
		$this->db->select('*');
 		$this->db->from('config_report');
		$this->db->order_by('report_id','asc');
		$query = $this->db->get();
		$this->mr = $query->result_array();	
		//print_r($this->mr);
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
		
	}
	
	function customer_sm()
	{
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Content';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('customerpage', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/customer', 'refresh');
		
		die();
		
		
	}
	
	function home()
	{

		$this->mysmarty->assign('tpl_center','config/home.tpl');
		
		$this->db->select('*');
 		$this->db->from('home');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function home_sm()
	{
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Home';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('home', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/home', 'refresh');
		
		die();
		
		
	}
	
	function contact()
	{
		$this->mysmarty->assign('tpl_center','config/contact.tpl');
		
		$this->db->select('*');
 		$this->db->from('contact');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function contact_sm()
	{
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Contact';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('contact', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/contact', 'refresh');
		
		die();
	}
	
	function contact_thanks()
	{
		$this->mysmarty->assign('tpl_center','config/contact_thanks.tpl');
		
		$this->db->select('*');
 		$this->db->from('contact_thanks');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function contact_thanks_sm()
	{
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Content';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('contact_thanks', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/contact_thanks', 'refresh');
		
		die();
	}
	
	function service()
	{

		$this->mysmarty->assign('tpl_center','config/service.tpl');
		
		$this->db->select('*');
 		$this->db->from('service');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function service_sm()
	{
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Service';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('service', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/service', 'refresh');
		
		die();
		
		
	}
	
	function thanks()
	{
		$this->mysmarty->assign('tpl_center','config/thanks.tpl');
		
		$this->db->select('*');
 		$this->db->from('thanks');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
	}
	
	function thanks_sm()
	{
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Thanks';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('thanks', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/thanks', 'refresh');
		
		die();
	}
	
	function customerpage()
	{

		$this->mysmarty->assign('tpl_center','config/customerpage.tpl');
		
		$this->db->select('*');
 		$this->db->from('customerpage');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();	
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		}	
		
	}
	
	function customerpage_sm()
	{
		//
		$this->load->library('validation');
		
		$rules['txt_content'] = 'required';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_content'] = 'Customer Home Page';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		//
		$record = array(		
			'content' => $this->validation->txt_content,

		);
		
		if ($this->validation->run() == FALSE ) {
			
			$error = array(
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error)); 

		} else {
			
				$this->db->limit('1');
				
				$result = $this->db->update('customerpage', $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));	
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
				
					
		}
		
		redirect('admin_config/customerpage', 'refresh');
		
		die();
		
		
	}
	
	function valid_gtm(){
		
		//xu ly chuoi
		$f = 0;
		$tmp = substr($this->input->post('txt_time_zone'),0,1);
		$tmp1 = substr($this->input->post('txt_time_zone'),1,(strlen($this->input->post('txt_time_zone'))-1));
		if ($tmp=='+'||$tmp=='-')
			$f=0;
		else
		{
			$f = 1;
			$this->validation->set_message('valid_gtm','Time zone only enter \'+\' or \'-\'');
			return false;
		}
		if (!is_numeric($tmp1))
		{
			$f = 1;
			$this->validation->set_message('valid_gtm','Time zone wrong');
			return false;
		}
		if ($f=0)
			return true;
	}
	
}
?>