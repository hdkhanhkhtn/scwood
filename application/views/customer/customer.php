<?php

class Customer extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $hd_id;
	var $hd_name;
	var $tmp_cus;
	
	function Customer()
	{
		parent::Controller();
		$this->load->model('report_model');
		$this->load->model('inspector_model');
		$this->load->model('customer_model');
		$this->load->model('sendmail_model');
		$this->load->model('report_history_model');
		if (!$this->login_model->is_login(1)){redirect('login');die();}
		$arr = $this->login_model->get_login(1);
		$this->hd_id = $arr['id'];	
		$this->hd_name =$arr['username'];
		//print_r($this->native_session->userdata['sess_customer']);
		$this->xajax->registerFunction(array('chkpassname',&$this,'check_pass'));
		$this->xajax->processRequest();
		$this->xajax->configure('javascript URI', $this->site['base_url'].'application/libraries/xajax/');	
		$this->mysmarty->assign("xajax_js",$this->xajax->getJavascript()); //important !!!
	}
	
	function _output()
	{
	//	if($this->native_session->flashdata('error'))
	//		$this->mr['error'] = $this->native_session->flashdata('error');
		if ($this->native_session->flashdata('frm'))
		{
			$tmp = $this->native_session->flashdata('frm');
			$this->mr['errorfrm'] = $tmp['frm_error'];
		}	
			
	//	if($this->native_session->flashdata('frm_error'))
	//		$this->mr['frm_error'] = $this->native_session->flashdata('frm_error');
		
	//	if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
		
	}
	
	function index()
	{
		redirect('customer/main');die();
	}
	
	function main()
	{	
		
		
		$this->mr['title'] = 'Welcome';		
		$this->mysmarty->assign('tpl_center','customer/main.tpl');
		$this->db->select('*');
 		$this->db->from('customerpage');
		$this->db->limit('1');
		$query = $this->db->get();
		$this->mr = $query->row_array();
	}
	function inspector()
	{
		$this->mr['title_menu'] = 'INSPECTOR';		
		$this->mysmarty->assign('tpl_center','customer/inspector.tpl');
		$arr = $this->login_model->get_login(1);
        $cus_id = $arr['id'];
		$this->db->where('cus_id',$cus_id);
		$this->mlist = $this->inspector_model->get();
	}
	function cinspector()
	{
		$this->mysmarty->assign('tpl_center','customer/frm_inspector.tpl');
		//$par = $this->uri->uri_to_assoc(3);
		//$id = isset($par['id'])?$par['id']: '';
		//$this->mr = $this->inspector_model->get($id);
		//$this->mr['password'] = md5($this->mr['password']);
		$this->mr['title'] = 'inspector';
		if ($id)
			$this->mr['title_menu'] = 'EDIT INSPECTOR';	
		else	
			$this->mr['title_menu'] = 'NEW INSPECTOR';	
	}
	
	function setstatus(){
			
		$par = $this->uri->uri_to_assoc(3);
		$record['active'] = $par['status'];
		
		$id = $this->inspector_model->update($par['id'], $record);
			
		if($id)
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_status_change')));
		else
			$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
		redirect('customer/inspector', 'refresh');
		
		die();
			
	}
	
	function del_inspector(){
			
		$par = $this->uri->uri_to_assoc(3);
		
		$tmp = $this->inspector_model->get($par['id']);
		
		$path_filedel = './uploads/inspector/'.$tmp['image'];
		
		if(file_exists($path_filedel)) unlink($path_filedel);
		
		$id = $this->inspector_model->delete($par['id']);
			
		redirect('customer/inspector', 'refresh');
		
		die();
			
	}
	
	function del()
	{
		$par = $this->uri->uri_to_assoc(3);
		if ($par['id'])
			$id = $this->report_model->delete($par['id']);
			
		redirect('customer/report', 'refresh');
		
		die();
	}
	
	function report()
	{
		$this->mr['title'] = 'Report';		
		$this->mysmarty->assign('tpl_center','customer/report.tpl');
		
		$arr = $this->login_model->get_login(1);
        $cus_id = $arr['id'];
		$this->db->where('cus_id',$cus_id);
	    
		$this->mlist = $this->report_model->get();
		
		for($i=0;$i<count($this->mlist);$i++)
			$this->mlist[$i]['dateofinspection'] = format_intdate('m/d/Y',$this->mlist[$i]['dateofinspection']);
		$this->mr['title_menu'] = 'REPORT';	
	}
	function creport()
	{
		
		
		$this->mr['title'] = 'Welcome';		
		$this->mysmarty->assign('tpl_center','customer/frm_report.tpl');
		$par = $this->uri->uri_to_assoc(3);
		$id = isset($par['id'])?$par['id']: '';
		if($id)
		{
			$this->mr = $this->report_model->get($id);
			$this->mr['dateofinspection'] = format_intdate('m/d/Y',$this->mr['dateofinspection']);
			$this->db->where('report_id',$id);
			$mail = $this->sendmail_model->get();
			for ($i=0;$i<count($mail);$i++)
				$mail[$i]['date'] = format_intdate($this->site['site_long_date'],$mail[$i]['date']);
			$this->mysmarty->assign('mail',$mail);
			
			//report history
			$this->db->where('report_id',$id);
			$report_history = $this->report_history_model->get();
			
			for ($i=0;$i<count($report_history);$i++)
				$report_history[$i]['date'] = format_intdate($this->site['site_long_date'],$report_history[$i]['date']);
			
			$this->mysmarty->assign('report_history',$report_history);
			$this->mr['title_menu'] = 'EDIT REPORT';	
		}
		else
		{
			$this->mr['dateofinspection'] = format_intdate('m/d/Y',time());
			$this->mr['title_menu'] = 'NEW REPORT';	
		}
			
		if ($this->native_session->flashdata('frm'))
		$this->mr = array_merge($this->native_session->flashdata('frm'),$this->mr);
		
		
		$arr = $this->login_model->get_login(1);
        $cus_id = $arr['id'];	
		$tmp=$this->customer_model->get($cus_id);
		$this->mysmarty->assign('cus',$tmp);
		
		///
		$inspector_arr = array('cus_id'=>$cus_id);
		$this->db->where('active',1);
		$tmp1 = $this->inspector_model->get('',$inspector_arr);
			
		$this->mysmarty->assign('tpl_center','customer/frm_report.tpl');
		$this->mysmarty->assign('inspector',$tmp1);
		
	}
	function save_inspector()
	{	
		//upload image
		$reid = $this->input->post('reid');
		
		$arr = $this->login_model->get_login(1);
        $cus_id = $arr['id'];
		
		$hd_old_image = $this->input->post('hd_old_image');
		
		$chk_delfile = $this->input->post('chk_delfile');
		
		if($hd_old_image) 
			$path_filedel = './uploads/inspector/'.$hd_old_image;
		else	
			$path_filedel = '';
	
		if($chk_delfile)
		{
			if(file_exists($path_filedel)) unlink($path_filedel);
			$record['image'] = '';
			$result = $this->inspector_model->update($reid, $record);
		}
		
		if($_FILES['attack_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/inspector/';
			$config['allowed_types'] = 'gif|jpg|png|jped';
			$config['max_size']	= '2000';
			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('attack_1'))
			{
				$error['frm_error'] = $this->upload->display_errors();
				$this->native_session->set_flashdata('frm',$error); 
				
			}
			else
			{	
				// delete old image
				if(file_exists($path_filedel)) unlink($path_filedel);
					
				$upload_data = $this->upload->data();
				
				$record['image'] = $upload_data['file_name'];

				$result = $this->inspector_model->update($reid, $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
				
		}// if FILE
		$this->load->library('validation');
		
		$this->load->view('customer/inspector_validation.php', '', FALSE); // field validation
			
        $is_valid = $this->validation->run();
        
        $record = array(
			'cus_id' =>$cus_id,
			'name' => $this->validation->name,
			'license' => $this->input->post('license'),
			'note' =>$this->input->post('note'),
		);	

		if (!$reid)
			$record['password'] = md5('123456');

		if ($is_valid == FALSE ) 
		{
			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);
			$this->native_session->set_flashdata('frm',array_merge($record,$error));
			if ($reid)
			{
            	redirect('customer/inspector/id/'.$reid, 'refresh');
            	die();
			}
			else
			{
				redirect('customer/cinspector','refresh');
				die();
			}	
		}
		
		if ($this->input->post('reid'))
		{
			$this->inspector_model->update($this->input->post('reid'),$record);
			$id_insert = $this->input->post('reid');
		}
		else
		{
			$record['active'] =1;
			$record['image'] = $upload_data['file_name'];
			$id_insert = $this->inspector_model->insert($record);
		}
		redirect('customer/inspector/id/'.$id_insert,'refresh');
		die();
	}
	
	function edit()
	{
		$this->mr['title'] = 'Welcome';		
		$this->mysmarty->assign('tpl_center','customer/frm_report.tpl');
		$par = $this->uri->uri_to_assoc(3);
		$id = isset($par['id'])?$par['id']: '';
		$tmp=$this->customer_model->get($this->hd_id);
		$this->mr = $this->report_model->get($id);
		$this->mr['dateofinspection'] = format_intdate('m/d/Y',$this->mr['dateofinspection']);
		$this->mr = array_merge($this->mr,$tmp);
	}
	
	function send_email()
	{
		$report_id = $this->input->post('reid');
		
		$this->mr = $this->report_model->get($report_id);
		
		$tmp = $this->customer_model->get($this->mr['cus_id']);
		
		$this->mr['dateofinspection'] = format_intdate('m/d/Y',$this->mr['dateofinspection']);
	
		$this->tmp_cus = $this->customer_model->get($this->hd_id);
		
		$this->load->library('fpdi');
		
		define('FPDF_FONTPATH','./application/libraries/fpdf/font/');
		
		$this->load->view('customer/pdf_report1.php', '', FALSE); // field validation
		
		$this->fpdi->Output('./uploads/'.$this->mr['r1a'].".pdf", "F");
		
		$this->mr = $this->report_model->get($report_id);
		
		$cus_rd  = $this->customer_model->get($this->mr['cus_id']); 

        $this->load->library('validation');
        
		$this->load->view('customer/mail_validation.php', '', FALSE); // field validation
		
		$is_valid = $this->validation->run();
        $record = array(
			'email1' => $this->validation->txt_email1,
			'email2' => $this->validation->txt_email2,
			'email3' => $this->validation->txt_email3,
			'email4' => $this->validation->txt_email4,
			'email5' => $this->validation->txt_email5,
		);
		$arr = array();
		
		$error = array(
			'frm_error' => $this->validation->error_string,
		);			
		$error = explode('<br />',$error['frm_error']);

		for ($i=1;$i<count($error);$i++)
		{
			if (strrpos($error[$i],'1')==TRUE)
				$arr['email1'] = $error[$i];
			if (strrpos($error[$i],'2')==TRUE)
				$arr['email2'] = $error[$i];
			if (strrpos($error[$i],'3')==TRUE)
				$arr['email3'] = $error[$i];
			if (strrpos($error[$i],'4')==TRUE)
				$arr['email4'] = $error[$i];
			if (strrpos($error[$i],'5')==TRUE)
				$arr['email5'] = $error[$i];
		}
		$str_to = '';
		if (!isset($arr['email1'])&&$record['email1'])
			$str_to = $record['email1'].',';
		if (!isset($arr['email2'])&&$record['email2'])
			$str_to .= $record['email2'].',';
		if (!isset($arr['email3'])&&$record['email3'])
			$str_to .= $record['email3'].',';
		if (!isset($arr['email4'])&&$record['email4'])
			$str_to .= ','.$record['email4'].',';
		if (!isset($arr['email5'])&&$record['email5'])
			$str_to .= $record['email5'].',';
		$this->native_session->set_flashdata('frm',array_merge($arr,$error)); 
		//}
		//load template
		$this->load->helper('file');
		
		$html_content = read_file('application/email_tpl/report.tpl');
		//replate content
		$html_content = str_replace('#customer#',$cus_rd['cus_comp_name'],$html_content);
		
		$html_content = str_replace('#value#',$this->mr['r1a'],$html_content);
		
		//load class email
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$config['charset'] = 'UTF-8';//EUC-KR; UTF-8';
		$config['priority'] = 1;
		
		$this->email->initialize($config);
		
		//$this->email->from($this->site['site_email'], $this->site['site_name']);
		$this->email->from($cus_rd['cus_email'], $cus_rd['cus_comp_name']);
		
		$this->email->to(substr($str_to,0,strlen($str_to)-1)); 
		
		$this->email->subject('Termite Report '.$this->mr['r1a']);
		
		$this->email->message($html_content);
		
		$this->email->attach('./uploads/'.$this->mr['r1a'].'.pdf');
		
		$this->email->send();
		
		//$this->email->print_debugger();
		
		
		$tmp = array(
			'cus_id' => $this->mr['cus_id'],
			'report_id' => $report_id,
		);
		$str_to = explode(',',substr($str_to,0,strlen($str_to)-1));

		for ($i=0;$i<count($str_to);$i++)
		{
			if (trim($str_to[$i]))
			{	
				$tmp['email'] = $str_to[$i];
				$tmp['date'] = time();
				
				$tmp1 = substr($this->site['site_time_zone'],0,1);
				if ($tmp1=='+')
					$tmp['date'] =$tmp['date'] + (substr($this->site['site_time_zone'],1,strlen($this->site['site_time_zone'])-1) *60);
				else
					$tmp['date'] =$tmp['date'] - (substr($this->site['site_time_zone'],1,strlen($this->site['site_time_zone'])-1) *60);
				$tmp['cus_name'] = $this->hd_name;
				$this->sendmail_model->insert($tmp);
			}
		}
		redirect('customer/creport/id/'.$report_id,'refesh');
		die();
	}
	
	
	function save()
	{
		$reid = $this->input->post('reid');
		//UPDATE DATABASE     
		
		$arr = $this->login_model->get_login(1);

        $cus_id = $arr['id'];
        
		$record = array(
			'cus_id' => $cus_id,
			
			'r1a' => $this->input->post('r1a'),
			'r1b1' =>($this->input->post('r1b1'))?1:0,
			'r1b2' =>($this->input->post('r1b2'))?1:0,
			'r1c1' => ($this->input->post('r1c1'))?1:0 ,
			'r1c2' =>($this->input->post('r1c2'))?1:0,
			'r1c3' =>($this->input->post('r1c3'))?1:0,
			'r1d' =>$this->input->post('r1d'),
			'r1e' =>$this->input->post('r1e'),
			'r5a' =>$this->input->post('r5a'),
			'r5b1' =>$this->input->post('r5b1'),
			'r5b2' =>$this->input->post('r5b2'),
			'r5b3' =>$this->input->post('r5b3'),
			'r5b4' =>$this->input->post('r5b4'),
			'r6a' =>$this->input->post('r6a'),
			'r6b' =>$this->input->post('r6b'),
			'r7' =>$this->input->post('r7'),
			'r8a' =>($this->input->post('r8a'))?1:0,
			'r8b' =>($this->input->post('r8b'))?1:0,
			'r8c' =>($this->input->post('r8c'))?1:0,
			'r8d' =>($this->input->post('r8d'))?1:0,
			'r8e' =>($this->input->post('r8e'))?1:0,
			'r8a1' =>$this->input->post('r8a1'),
			'r8a2' =>$this->input->post('r8a2'),
			'r8c1' =>$this->input->post('rtxt_8c1'),
			'r8d1' =>$this->input->post('r8d1'),
			'r8d2' =>$this->input->post('r8d2'),
			'r8e1' =>$this->input->post('r8e1'),
			'r9a' =>($this->input->post('r9a'))?1:0,
			'r9b' =>($this->input->post('r9b'))?1:0,
			'r9c' =>($this->input->post('r9c'))?1:0,
			'r101' =>$this->input->post('r101'),
			'r102' =>$this->input->post('r102'),
			'r15' =>($this->input->post('r15'))?1:0,
			'r151' =>($this->input->post('r151'))?1:0,
			'r152' =>($this->input->post('r152'))?1:0,
			'r153' =>($this->input->post('r153'))?1:0,
			'r154' =>($this->input->post('r154'))?1:0,
			'r155' =>($this->input->post('r155'))?1:0,
			'r156' =>($this->input->post('r156'))?1:0,
			'r157' =>($this->input->post('r157'))?1:0,
			'r158' =>($this->input->post('r158'))?1:0,
			'r159' =>$this->input->post('r159'),
			'r1510' =>$this->input->post('r1510'),
			'r16' =>$this->input->post('r16'),
			'r161' =>$this->input->post('r161'),
			'r17' =>$this->input->post('r17'),
			'r171' =>($this->input->post('r171'))?1:0,
			'r172' =>($this->input->post('r172'))?1:0,
			'r173' =>($this->input->post('r173'))?1:0,
			'r174' =>($this->input->post('r174'))?1:0,
			'r175' =>($this->input->post('r175'))?1:0,
			'r176' =>($this->input->post('r176'))?1:0,
			'r177' =>$this->input->post('r177'),
			'r178' =>$this->input->post('r178'),
			'r18' =>$this->input->post('r18'),
			'r181' =>($this->input->post('r181'))?1:0,
			'r182' =>($this->input->post('r182'))?1:0,
			'r183' =>($this->input->post('r183'))?1:0,
			'r184' =>($this->input->post('r184'))?1:0,
			'r185' =>($this->input->post('r185'))?1:0,
			'r186' =>($this->input->post('r186'))?1:0,
			'r187' =>($this->input->post('r187'))?1:0,
			'r188' =>($this->input->post('r188'))?1:0,
			'r189' =>($this->input->post('r189'))?1:0,
			'r1810' =>($this->input->post('r1810'))?1:0,
			'r1811' =>($this->input->post('r1811'))?1:0,
			'r1812' =>$this->input->post('r1812'),
			'r1813' =>$this->input->post('r1813'),
			'r19' =>$this->input->post('r19'),
			'r191' =>($this->input->post('r191'))?1:0,
			'r192' =>($this->input->post('r192'))?1:0,
			'r193' =>($this->input->post('r193'))?1:0,
			'r194' =>($this->input->post('r194'))?1:0,
			'r195' =>($this->input->post('r195'))?1:0,
			'r196' =>($this->input->post('r196'))?1:0,
			'r197' =>($this->input->post('r197'))?1:0,
			'r198' =>($this->input->post('r198'))?1:0,
			'r199' =>($this->input->post('r199'))?1:0,
			'r1910' =>($this->input->post('r1910'))?1:0,
			'r1911' =>($this->input->post('r1911'))?1:0,
			'r1912' =>($this->input->post('r1912'))?1:0,
			'r1913' =>$this->input->post('r1913'),
			'r1914' =>$this->input->post('r1914'),
			'r201' =>($this->input->post('r201'))?1:0,
			'r202' =>($this->input->post('r202'))?1:0,
			'r203' =>$this->input->post('r203'),
			'r204' =>$this->input->post('rtxt_204'),
			'r205' =>$this->input->post('r205'),
			'r206' =>$this->input->post('rtxt_206'),
			'r207' =>$this->input->post('r207'),
			'r208' =>$this->input->post('r208'),
			'r211' =>($this->input->post('r211'))?1:0,
			'r212' =>($this->input->post('r212'))?1:0,
			'r213' =>($this->input->post('r213'))?1:0,
			'r214' =>($this->input->post('r214'))?1:0,
			'r215' =>($this->input->post('r215'))?1:0,
			'r216' =>($this->input->post('r216'))?1:0,
			'r217' =>($this->input->post('r217'))?1:0,
			'r218' =>($this->input->post('r218'))?1:0,
			'r219' =>($this->input->post('r219'))?1:0,
			'r2110' =>($this->input->post('r2110'))?1:0,
			'r2111' =>($this->input->post('r2111'))?1:0,
			'r2112' =>($this->input->post('r2112'))?1:0,
			'r2113' =>($this->input->post('r2113'))?1:0,
			'r2114' =>($this->input->post('r2114'))?1:0,
			'r2115' =>($this->input->post('r2115'))?1:0,
			'r2116' =>($this->input->post('r2116'))?1:0,
			'r2117' =>($this->input->post('r2117'))?1:0,
			'r2118' =>($this->input->post('r2118'))?1:0,
			'r2119' =>($this->input->post('r2119'))?1:0,
			'r2120' =>($this->input->post('r2120'))?1:0,
			'vacant' =>($this->input->post('vacant'))?1:0,
			'occupied' =>($this->input->post('occupied'))?1:0,
			'unfurnished' =>($this->input->post('unfurnished'))?1:0,
			'furnished' =>($this->input->post('furnished'))?1:0,
		);
	//	print_r($record);

		if (!trim($record['r5b1'])){
			$this->native_session->set_flashdata('frm','The Street field is required.');
			if ($reid)
            	redirect('customer/creport/id/'.$reid, 'refresh');
            else
            	redirect('customer/creport', 'refresh');
			die();
		}
		
		if (!$this->input->post('sel_inspected')||!$this->input->post('txt_pass'))
		{
			$record['password'] = 'Password or inspector name is wrong';
			$this->native_session->set_flashdata('frm',$record);
			if ($reid)
			{
				redirect('customer/creport/id/'.$reid,'refresh');
				die();
			}	
			else
			{	
				redirect('customer/creport','refresh');
				die();
			}
		}
		else
		{
			$record['inspector_id'] = $this->input->post('sel_inspected');
			
			$inspector_infor = $this->inspector_model->get($record['inspector_id']);
			if($inspector_infor)
			{
				if ($inspector_infor['password']==md5($this->input->post('txt_pass')))
				{
					$record['inspector_license'] = $inspector_infor['inspector_license'];
				}	
				else{
					$record['password'] = 'Password or inspector name is wrong';
					$this->native_session->set_flashdata('frm',$record);
	//				echo '<br><br><br>';
	//				print_r($record);
	//									die();
					if ($reid)
					{
						redirect('customer/creport/id/'.$reid,'refresh');
						die();
					}	
					else
					{	
						redirect('customer/creport','refresh');
						die();
					}
				}
			}
			
		}
		
		$hd_old_image = $this->input->post('hd_old_image');
		
		$chk_delfile = $this->input->post('chk_delfile');
		
		if($hd_old_image) 
			$path_filedel = './uploads/report/'.$hd_old_image;
		else	
			$path_filedel = '';
		
		if($chk_delfile)
		{
			
			if(file_exists($path_filedel)) unlink($path_filedel);
			$record['image'] = '';
			$result = $this->report_model->update($reid, $record);
		}
		
		if($_FILES['attach_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/report/';
			$config['allowed_types'] = 'gif|jpg|png|jped';
			$config['max_size']	= '2000';
			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('attach_1'))
			{
				
				$error['frm_error'] = $this->upload->display_errors();
				
				$this->native_session->set_flashdata('frm',$error);
				if ($reid) 
				{
					redirect('customer/creport/id/'.$reid,'refresh');
					die();
				}
				else
				{
					redirect('customer/creport/','refresh');
					die();
				}
					
				
			}
			else
			{	
				// delete old image
				if(file_exists($path_filedel)) unlink($path_filedel);
					
				$upload_data = $this->upload->data();
				
				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/report/'.$upload_data['file_name'];
				$config['maintain_ratio'] = TRUE;
				
				$config['width'] = 505;
				$config['height'] = 510;
			
				$this->image_lib->initialize($config); 
				
				if (!$this->image_lib->resize())
					echo $this->image_lib->display_errors();
				
				$record['image'] = $upload_data['file_name'];

				$result = $this->report_model->update($reid, $record);
				
				if($result)
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
				else
					$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			}	
				
		}
        
		//print_r($record);
		$record['dateofinspection'] = get_strdate($this->input->post('txt_dateofinspection'),'m/d/Y');
		
			
		if ($this->input->post('reid'))
		{
			$id_insert=$this->report_model->update($this->input->post('reid'), $record);
			$get_number=$this->report_model->get($this->input->post('reid'));
			$arr = array(
			'inspector_id'=> $inspector_infor['id'],
			'inspector_name'=>$inspector_infor['name'],
			'report_id' =>$this->input->post('reid'),
			'number'=>$get_number['number'],
			'date' => time(),
			);
			$tmp = substr($this->site['site_time_zone'],0,1);
			if ($tmp=='+')
				$arr['date'] =$arr['date'] + (substr($this->site['site_time_zone'],1,strlen($this->site['site_time_zone'])-1) *60);
			else
				$arr['date'] =$arr['date'] - (substr($this->site['site_time_zone'],1,strlen($this->site['site_time_zone'])-1) *60);

			$id_report_history = $this->report_history_model->insert($arr);
			//$this->input->post('reid');
		}
		else
		{
			$result = $this->customer_model->get($this->hd_id);
			$record['number'] = $result['cus_startnumber'];
			$record['image'] = $upload_data['file_name'];
			$id_insert = $this->report_model->insert($record);
			
			$arr = array(
			'inspector_id'=> $inspector_infor['id'],
			'inspector_name'=>$inspector_infor['name'],
			'report_id' =>$id_insert,
			'number'=>$record['number'],
			'date' => time(),
			);
			$tmp = substr($this->site['site_time_zone'],0,1);
			if ($tmp=='+')
				$arr['date'] =$arr['date'] + (substr($this->site['site_time_zone'],1,strlen($this->site['site_time_zone'])-1) *60);
			else
				$arr['date'] =$arr['date'] - (substr($this->site['site_time_zone'],1,strlen($this->site['site_time_zone'])-1) *60);

			$id_report_history = $this->report_history_model->insert($arr);
			
			$record_up = array('cus_startnumber'=> $record['number']+1);
			$this->customer_model->update($this->hd_id,$record_up);
			
		}
		redirect('customer/creport/id/'.$id_insert,'refresh');
		die();
	}
	
	function sendmail($cus,$pdfname)
	{
		$par = $this->uri->uri_to_assoc(3);
		$report_id =  $par['e_id'];
        $this->load->library('validation');
		$this->load->view('customer/mail_validation.php', '', FALSE); // field validation
		$is_valid = $this->validation->run();
        $record = array(
			'email1' => $this->validation->txt_email1,
			'email2' => $this->validation->txt_email2,
			'email3' => $this->validation->txt_email3,
			'email4' => $this->validation->txt_email4,
			'email5' => $this->validation->txt_email5,
		);
		$arr = array();
		//if ($is_valid == FALSE ) {
		$error = array(
			'frm_error' => $this->validation->error_string,
		);			
		$error = explode('<br />',$error['frm_error']);

		for ($i=1;$i<count($error);$i++)
		{
			if (strrpos($error[$i],'1')==TRUE)
				$arr['email1'] = $error[$i];
			if (strrpos($error[$i],'2')==TRUE)
				$arr['email2'] = $error[$i];
			if (strrpos($error[$i],'3')==TRUE)
				$arr['email3'] = $error[$i];
			if (strrpos($error[$i],'4')==TRUE)
				$arr['email4'] = $error[$i];
			if (strrpos($error[$i],'5')==TRUE)
				$arr['email5'] = $error[$i];
		}
		$str_to = '';
		if (!isset($arr['email1'])&&$record['email1'])
			$str_to = $record['email1'].',';
		if (!isset($arr['email2'])&&$record['email2'])
			$str_to .= $record['email2'].',';
		if (!isset($arr['email3'])&&$record['email3'])
			$str_to .= $record['email3'].',';
		if (!isset($arr['email4'])&&$record['email4'])
			$str_to .= ','.$record['email4'].',';
		if (!isset($arr['email5'])&&$record['email5'])
			$str_to .= $record['email5'].',';
		$this->native_session->set_flashdata('frm',array_merge($arr,$error)); 
		//}
		//if($this->native_session->flashdata('frm')) $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
		$this->load->library('email');
		$this->email->from($cus['cus_email'], $cus['cus_comp_name']);
		$this->email->to(substr($str_to,0,strlen($str_to)-1)); 
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.'); 
		$this->email->attach('./uploads/'.$pdfname.'.pdf');
		$this->email->send();
		
		$tmp = array(
			'cus_id' => $this->hd_id,
			'report_id' => $report_id,
		);
		$str_to = explode(',',substr($str_to,0,strlen($str_to)-1));
		for ($i=0;$i<count($str_to);$i++)
		{
			$tmp['email'] = $str_to[$i];
			$this->sendmail_model->insert($tmp);
		}
		redirect('customer/creport/id/'.$report_id,'refesh');
		die();
	}
	
	function valid_hasemail1(){
		$par = $this->uri->uri_to_assoc(3);
		$report_id =  $par['e_id'];
		$this->db->where('report_id',$report_id);
		$this->db->where('email',$this->input->post('txt_email1'));

		$this->db->from('sendmail');
		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasemail1', 'This Email 1 has been send.');
			return false;
		}
		else
		{
			return true;
		}
	}
	function valid_hasemail2(){
		$par = $this->uri->uri_to_assoc(3);
		$report_id =  $par['e_id'];
		$this->db->where('report_id',$report_id);
		$this->db->where('email',$this->input->post('txt_email2'));

		$this->db->from('sendmail');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasemail2', 'This Email 2 has been send.');
			return false;
		}
		else
		{
			return true;
		}
	}
	function valid_hasemail3(){
		$par = $this->uri->uri_to_assoc(3);
		$report_id =  $par['e_id'];
		$this->db->where('report_id',$report_id);
		$this->db->where('email',$this->input->post('txt_email3'));

		$this->db->from('sendmail');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasemail3', 'This Email 3 has been send.');
			return false;
		}
		else
		{
			return true;
		}
	}
	function valid_hasemail4(){
		$par = $this->uri->uri_to_assoc(3);
		$report_id =  $par['e_id'];
		$this->db->where('report_id',$report_id);
		$this->db->where('email',$this->input->post('txt_email4'));

		$this->db->from('sendmail');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasemail4', 'This Email 4 has been send.');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function valid_hasemail5(){
		$par = $this->uri->uri_to_assoc(3);
		$report_id =  $par['e_id'];
		$this->db->where('report_id',$report_id);
		$this->db->where('email',$this->input->post('txt_email5'));

		$this->db->from('sendmail');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_hasemail5', 'This Email 5 has been send.');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function valid_username()
	{
		
		$this->db->where('name',$this->input->post('name') );

		$this->db->from('inspector');

		if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_username', $this->lang->line('error_account_has_used'));
			return false;
		}else
		{
			return true;	
		}
	}
	
	function select_make($id_make,$str_make)
	{
		
		$str_model_dis ='<input type="text" id="inspector_license" name="inspector_license" value="" disabled>';
		
		$str_model_en ='<input type="text" id="inspector_license" name="inspector_license" value="" disabled>';
	
		$objResponse = new xajaxResponse();
		
		if(empty($id_make))
		{
			$objResponse->assign("div_option_model","innerHTML",$str_model_dis);
			$objResponse->assign("inspector_license","value",'');
		//	$objResponse->assign("inspector_image","alt",'');
		}else{
			
			//get model 
			$this->db->distinct();
			
			$query = $this->inspector_model->get($str_make);
			//$str_html = '<input type="text" id="inspector_license" name="inspector_license" value="'.$query['license'].'" disabled>';
			
			//$objResponse->assign("div_option_model","innerHTML", $str_html);
			$objResponse->assign("inspector_license","value",$query['license']);
		//	$objResponse->assign("inspector_image","src",$this->site['base_url'].'uploads/inspector/'.$query['image']);
		}
			
		return $objResponse;
	
	}
	
	function r_print()
	{
		
		$par = $this->uri->uri_to_assoc(3);
		
		$id = isset($par['id'])?$par['id']:'';
		
		$this->mr = $this->report_model->get($id);
		
		$this->tmp_cus = $this->customer_model->get($this->hd_id);
		
		$this->mr['dateofinspection'] = format_intdate('m/d/Y',$this->mr['dateofinspection']);
		
		$this->load->library('fpdi');
		
		define('FPDF_FONTPATH','./application/libraries/fpdf/font/');
		
		$this->load->view('customer/pdf_report1.php', '', FALSE); // field validation
		
		$this->fpdi->Output();
		
		die();
		
	}
	
	function check_pass($sel_inspector,$pass)
	{
		$objResponse = new xajaxResponse();
		
		$objResponse->assign("Msg_username","style.color","");
		
		if(empty($pass)){
		
			$objResponse->assign("Msg_username","innerHTML", 'Password is empty.');
					
		}else{
		
			$this->db->where('id',$sel_inspector);
			$this->db->where('password',md5($pass) ); 
			
			//$this->db->from('inspector');
			$tmp = $this->inspector_model->get();
			if($tmp){
				if($tmp[0]['image'])
				{
					
					$objResponse->assign("Msg_username","innerHTML",'<img src='.$this->site['base_url'].'uploads/inspector/'.$tmp[0]['image'].' width="120" height="30" />');
				}
				else
				{
					$objResponse->assign("Msg_username","innerHTML",  'Password is correct');
				}
				
			}else{
				$objResponse->assign("Msg_username","style.color","blue");
				$objResponse->assign("Msg_username","innerHTML",  'Password is wrong.');
								
			}
			
		}
			
		return $objResponse;

		
	}
}
?>