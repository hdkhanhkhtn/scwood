<?php

class Customer extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $hd_id;
	var $hd_name;
	var $tmp_cus;
	var $mre;
	var $tmp_inspector;
	
	function Customer()
	{
		parent::Controller();
		$this->load->model('report_model');
		$this->load->model('invoice_model');
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
		
		$this->search = array('page' => 0);
	}
	
	function _output()
	{
		if($this->native_session->flashdata('error'))
			$this->mr['error'] = $this->native_session->flashdata('error');
		if ($this->native_session->flashdata('frm'))
		{
			$tmp = $this->native_session->flashdata('frm');
			$this->mr['errorfrm'] = $tmp['frm_error'];
		}	
			
	//	if($this->native_session->flashdata('frm_error'))
	//		$this->mr['frm_error'] = $this->native_session->flashdata('frm_error');
		
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		if($this->native_session->flashdata('frm'))
		{
			 $tmp = $this->native_session->flashdata('frm');
			 $this->mr['frm_error'] = $tmp['frm_error'];
		}
		if($this->native_session->flashdata('frm_r5b1')) $this->mr['frm_r5b1'] = $this->native_session->flashdata('frm_r5b1');
	
	
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->assign('mre',$this->mre);
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
		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		$this->mr['title_menu'] = 'INSPECTOR';		
		$this->mysmarty->assign('tpl_center','customer/inspector.tpl');
		$arr = $this->login_model->get_login(1);
        $cus_id = $arr['id'];
		$this->db->where('cus_id',$cus_id);
		
		$total_rows = $this->inspector_model->count_result();
		
		$page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/customer/inspector/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/customer/inspector/page/');
		
		$this->db->where('cus_id',$cus_id);
		
		$this->mlist = $this->inspector_model->get();
	}
	function cinspector()
	{
		$this->mysmarty->assign('tpl_center','customer/frm_inspector.tpl');
		$par = $this->uri->uri_to_assoc(3);
		$id = isset($par['id'])?$par['id']: '';
		$this->mr = $this->inspector_model->get($id);
		if ($id)
			{if ($this->mr['cus_id']!=$this->hd_id)
			{
				redirect('customer/inspector','refresh');
				die();
			}
		}
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
		
		if ($tmp['cus_id']!=$this->hd_id)
		{
			redirect('customer/inspector','refresh');
			die();
		}
		
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

		$par = $this->uri->uri_to_assoc(3);
		if(isset($par['page'])){
			$this->search['page'] = $par['page'];
		}
		
		$arr = $this->login_model->get_login(1);
        $cus_id = $arr['id'];
		$this->db->where('cus_id',$cus_id);
		
	    $total_rows = $this->report_model->count_result();
	    
	    $page = $this->search['page'];
		
		$this->load->model('paging_model');

		$this->paging_model->limit($page,$this->site['site_num_line2'],$total_rows,'/customer/report/page/');
		//$this->paging_model->limit($page,2,$total_rows,'/customer/report/page/');
		

	    
	    
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
			if ($this->mr['cus_id']!=$this->hd_id)
			{
				redirect('customer/report','refresh');
				die();
			}
			//======================================
			$this->db->where('report_id',$id);
			$invoice = $this->invoice_model->get();
			if ($invoice)
			{
				$this->mr['invoice_id'] = $invoice[0]['invoice_id'];
				
			}
			//========================================
			$this->mr['sc_date'] = format_intdate('m/d/Y',$this->mr['sc_date']);
			$this->mr['sc_treat1_date'] = format_intdate('m/d/Y',$this->mr['sc_treat1_date']);
			$this->mr['sc_date_ack'] = format_intdate('m/d/Y',$this->mr['sc_date_ack']);
            $infest4percent = explode('|',$this->mr['sc_infest4percent']);
            $this->mr['infest4percent_from'] = $infest4percent[0];
            $this->mr['infest4percent_to'] = $infest4percent[1];
            
            //echo '<pre>'; var_dump($this->mr); echo '</pre>'; die();
            
			$this->db->where('report_id',$id);
			$mail = $this->sendmail_model->get();
			for ($i=0;$i<count($mail);$i++)
				$mail[$i]['date'] = format_intdate($this->site['site_long_date'],$mail[$i]['date']);
			$this->mysmarty->assign('mail',$mail);
			
			//report history
			$this->db->where('report_id',$id);
			$report_history = $this->report_history_model->get();
			if ($report_history)
				$this->mr['report_history'] = '123';
			$this->mr['title_menu'] = 'EDIT REPORT';	
		}
		else
		{
			$this->mr['dateofinspection'] = format_intdate('m/d/Y',time());
			$this->mr['title_menu'] = 'NEW REPORT';
			$this->mr['new'] = '1';
			//set default
			$this->mr['r15'] = -1;
			$this->mr['r16'] = -1;
			$this->mr['r17'] = -1;
			$this->mr['r18'] = -1;
			$this->mr['r19'] = -1;
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
		
		
		$this->db->select('*');
 		$this->db->from('config_report');
		$query = $this->db->get();
		$this->mlist = $query->result_array();	
		$recode_old= array();
		$k=0;
		for($i=0;$i<count($this->mlist);$i++)
		{
		if($this->mlist[$i]['report_6a']!='')
		{
			$recode_old[$k]['report_6a']= $this->mlist[$i]['report_6a'];
		}
		if($this->mlist[$i]['report_6a1']!='')
		{
			$recode_old[$k]['report_6a1']= $this->mlist[$i]['report_6a1'];
		}
		if($this->mlist[$i]['report_6a2']!='')
		{
			$recode_old[$k]['report_6a2']= $this->mlist[$i]['report_6a2'];
			
		}
		if($this->mlist[$i]['report_6b']!='')
		{
			$recode_old[$k]['report_6b']= $this->mlist[$i]['report_6b'];
		}
		if($this->mlist[$i]['report_6b1']!='')
		{
			$recode_old[$k]['report_6b1']= $this->mlist[$i]['report_6b1'];
			
		}
		if($this->mlist[$i]['report_6b2']!='')
		{
			$recode_old[$k]['report_6b2']= $this->mlist[$i]['report_6b2'];
			
		}
		if($this->mlist[$i]['report_7']!='')
		{
			$recode_old[$k]['report_7']= $this->mlist[$i]['report_7'];
		}
		if($this->mlist[$i]['report_71']!='')
		{
			$recode_old[$k]['report_71']= $this->mlist[$i]['report_71'];
		}
		if($this->mlist[$i]['report_72']!='')
		{
			$recode_old[$k]['report_72']= $this->mlist[$i]['report_72'];
		}
		if($this->mlist[$i]['report_8a1']!='')
		{
			$recode_old[$k]['report_8a1']= $this->mlist[$i]['report_8a1'];
		}
		if($this->mlist[$i]['report_8a11']!='')
		{
			$recode_old[$k]['report_8a11']= $this->mlist[$i]['report_8a11'];
		}
		if($this->mlist[$i]['report_8a12']!='')
		{
			$recode_old[$k]['report_8a12']= $this->mlist[$i]['report_8a12'];

		}
		if($this->mlist[$i]['report_8a2']!='')
		{
			$recode_old[$k]['report_8a2']= $this->mlist[$i]['report_8a2'];

		}
		if($this->mlist[$i]['report_8a21']!='')
		{
			$recode_old[$k]['report_8a21']= $this->mlist[$i]['report_8a21'];
		}
		if($this->mlist[$i]['report_8a22']!='')
		{
			$recode_old[$k]['report_8a22']= $this->mlist[$i]['report_8a22'];
			
		}
		if($this->mlist[$i]['report_8d']!='')
		{
			$recode_old[$k]['report_8d']= $this->mlist[$i]['report_8d'];
		}
		if($this->mlist[$i]['report_8d1']!='')
		{
			$recode_old[$k]['report_8d1']= $this->mlist[$i]['report_8d1'];
		}
		if($this->mlist[$i]['report_8d2']!='')
		{
			$recode_old[$k]['report_8d2']= $this->mlist[$i]['report_8d2'];
		}
		if($this->mlist[$i]['report_8e']!='')
		{
			$recode_old[$k]['report_8e']= $this->mlist[$i]['report_8e'];
		}
		if($this->mlist[$i]['report_8e1']!='')
		{
			$recode_old[$k]['report_8e1']= $this->mlist[$i]['report_8e1'];
		}
		if($this->mlist[$i]['report_8e2']!='')
		{
			$recode_old[$k]['report_8e2']= $this->mlist[$i]['report_8e2'];
		}
		if($this->mlist[$i]['report_10']!='')
		{
			$recode_old[$k]['report_10']= $this->mlist[$i]['report_10'];

		}
		if($this->mlist[$i]['report_101']!='')
		{
			$recode_old[$k]['report_101']= $this->mlist[$i]['report_101'];
		}
		if($this->mlist[$i]['report_102']!='')
		{
			$recode_old[$k]['report_102']= $this->mlist[$i]['report_102'];
		}
		if($this->mlist[$i]['report_15']!='')
		{
			$recode_old[$k]['report_15']= $this->mlist[$i]['report_15'];
		}
		if($this->mlist[$i]['report_151']!='')
		{
			$recode_old[$k]['report_151']= $this->mlist[$i]['report_151'];
		}
		if($this->mlist[$i]['report_152']!='')
		{
			$recode_old[$k]['report_152']= $this->mlist[$i]['report_152'];
		}
		if($this->mlist[$i]['report_16']!='')
		{
			$recode_old[$k]['report_16']= $this->mlist[$i]['report_16'];
		}
		if($this->mlist[$i]['report_161']!='')
		{
			$recode_old[$k]['report_161']= $this->mlist[$i]['report_161'];
		}
		if($this->mlist[$i]['report_162']!='')
		{
			$recode_old[$k]['report_162']= $this->mlist[$i]['report_162'];
		}
		if($this->mlist[$i]['report_17']!='')
		{
			$recode_old[$k]['report_17']= $this->mlist[$i]['report_17'];
		}
		if($this->mlist[$i]['report_171']!='')
		{
			$recode_old[$k]['report_171']= $this->mlist[$i]['report_171'];
		}
		if($this->mlist[$i]['report_172']!='')
		{
			$recode_old[$k]['report_172']= $this->mlist[$i]['report_172'];
		}
		if($this->mlist[$i]['report_18']!='')
		{
			$recode_old[$k]['report_18']= $this->mlist[$i]['report_18'];
		}
		if($this->mlist[$i]['report_181']!='')
		{
			$recode_old[$k]['report_181']= $this->mlist[$i]['report_181'];
		}
		if($this->mlist[$i]['report_182']!='')
		{
			$recode_old[$k]['report_182']= $this->mlist[$i]['report_182'];

		}
		if($this->mlist[$i]['report_19']!='')
		{
			$recode_old[$k]['report_19']= $this->mlist[$i]['report_19'];

		}
		if($this->mlist[$i]['report_191']!='')
		{
			$recode_old[$k]['report_191']= $this->mlist[$i]['report_191'];
		}
		if($this->mlist[$i]['report_192']!='')
		{
			$recode_old[$k]['report_192']= $this->mlist[$i]['report_192'];
		}
		if($this->mlist[$i]['report_20']!='')
		{
			$recode_old[$k]['report_20']= $this->mlist[$i]['report_20'];

		}
		if($this->mlist[$i]['report_201']!='')
		{
			$recode_old[$k]['report_201']= $this->mlist[$i]['report_201'];
		}
		if($this->mlist[$i]['report_202']!='')
		{
			$recode_old[$k]['report_202']= $this->mlist[$i]['report_202'];
		}
		$k++;
	}
		$this->mlist = $recode_old;
	
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		if($this->native_session->flashdata('frm')){
			
			$this->mlist = array_merge($this->mlist,$this->native_session->flashdata('frm'));
		}
		$user_id = $this->session->userdata('user_id');
		$this->db->select('*');
 		$this->db->from('report');
		$this->db->where('cus_id',$user_id);
		$this->db->limit('3');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		$this->mre = $query->result_array();
		$recode_temp= array();
		
		$j=0;
		$temp='';
		for($i=0;$i < count($this->mlist);$i++)
		{
			$temp1 .= $this->mlist[$i]['report_6a'].'|'.$this->mlist[$i]['report_6a1'].'|'.$this->mlist[$i]['report_6a2'];
			$temp2 .= $this->mlist[$i]['report_6b'].'|'.$this->mlist[$i]['report_6b1'].'|'.$this->mlist[$i]['report_6b2'];
			$temp3 .= $this->mlist[$i]['report_7'].'|'.$this->mlist[$i]['report_71'].'|'.$this->mlist[$i]['report_72'];
			$temp4 .= $this->mlist[$i]['report_8a1'].'|'.$this->mlist[$i]['report_8a11'].'|'.$this->mlist[$i]['report_8a12'];
			$temp5 .= $this->mlist[$i]['report_8a2'].'|'.$this->mlist[$i]['report_8a21'].'|'.$this->mlist[$i]['report_8a22'];
			$temp6 .= $this->mlist[$i]['report_8e'].'|'.$this->mlist[$i]['report_8e1'].'|'.$this->mlist[$i]['report_8e2'];
			$temp7 .= $this->mlist[$i]['report_8d'].'|'.$this->mlist[$i]['report_8d1'].'|'.$this->mlist[$i]['report_8d2'];
			$temp8 .= $this->mlist[$i]['report_10'].'|'.$this->mlist[$i]['report_101'].'|'.$this->mlist[$i]['report_102'];
			$temp9 .= $this->mlist[$i]['report_15'].'|'.$this->mlist[$i]['report_151'].'|'.$this->mlist[$i]['report_152'];
			$temp10 .= $this->mlist[$i]['report_16'].'|'.$this->mlist[$i]['report_161'].'|'.$this->mlist[$i]['report_162'];
			$temp11 .= $this->mlist[$i]['report_17'].'|'.$this->mlist[$i]['report_171'].'|'.$this->mlist[$i]['report_172'];
			$temp12 .= $this->mlist[$i]['report_18'].'|'.$this->mlist[$i]['report_181'].'|'.$this->mlist[$i]['report_182'];
			$temp13 .= $this->mlist[$i]['report_19'].'|'.$this->mlist[$i]['report_191'].'|'.$this->mlist[$i]['report_192'];
			$temp14 .= $this->mlist[$i]['report_20'].'|'.$this->mlist[$i]['report_201'].'|'.$this->mlist[$i]['report_202'];
		}
		$temp6a = explode('|',$temp1);
		$temp6b = explode('|',$temp2);
		$temp7 = explode('|',$temp3);
		$temp8a1 = explode('|',$temp4);
		$temp8a2 = explode('|',$temp5);
		$temp8d = explode('|',$temp6);
		$temp8e = explode('|',$temp7);
		$temp10 = explode('|',$temp8);
		$temp15 = explode('|',$temp9);
		$temp16 = explode('|',$temp10);
		$temp17 = explode('|',$temp11);
		$temp18 = explode('|',$temp12);
		$temp19 = explode('|',$temp13);
		$temp20 = explode('|',$temp14);
		for($k=0;$k < count($this->mre);$k++)
		{
			
				if(!in_array($this->mre[$k]['r6a'],$temp6a))
				{
					$recode_temp[$j]['r6a'] = $this->mre[$k]['r6a'];
				}
				if(!in_array($this->mre[$k]['r6b'],$temp6b))
				{
					$recode_temp[$j]['r6b'] = $this->mre[$k]['r6b'];
				}
				if(!in_array($this->mre[$k]['r7'],$temp7))
				{
					$recode_temp[$j]['r7'] = $this->mre[$k]['r7'];
				}
				if(!in_array($this->mre[$k]['r8a1'],$temp8a1))
				{
					$recode_temp[$j]['r8a1'] = $this->mre[$k]['r8a1'];
				}
				if(!in_array($this->mre[$k]['r8a2'],$temp8a2))
				{
					$recode_temp[$j]['r8a2'] = $this->mre[$k]['r8a2'];
				}
				if(!in_array($this->mre[$k]['r8d2'],$temp8d))
				{
					$recode_temp[$j]['r8d2'] = $this->mre[$k]['r8d2'];
				}
				if(!in_array($this->mre[$k]['r8e1'],$temp8e))
				{
					$recode_temp[$j]['r8e1'] = $this->mre[$k]['r8e1'];
				}
				if(!in_array($this->mre[$k]['r101'],$temp10))
				{
					$recode_temp[$j]['r101'] = $this->mre[$k]['r101'];
				}
				if(!in_array($this->mre[$k]['r1510'],$temp15))
				{
					$recode_temp[$j]['r1510'] = $this->mre[$k]['r1510'];
				}
				if(!in_array($this->mre[$k]['r161'],$temp16))
				{
					$recode_temp[$j]['r161'] = $this->mre[$k]['r161'];
				}
				if(!in_array($this->mre[$k]['r178'],$temp17))
				{
					$recode_temp[$j]['r178'] = $this->mre[$k]['r178'];
				}
				if(!in_array($this->mre[$k]['r1813'],$temp18))
				{
					$recode_temp[$j]['r1813'] = $this->mre[$k]['r1813'];
				}
				if(!in_array($this->mre[$k]['r1914'],$temp19))
				{
					$recode_temp[$j]['r1914'] = $this->mre[$k]['r1914'];
				}
				if(!in_array($this->mre[$k]['r208'],$temp20))
				{
					$recode_temp[$j]['r208'] = $this->mre[$k]['r208'];
				}
			
				$j++;
			
		}		
		$k=0;
		$j=0;
		$l=0;
		$n=0;
		$m=0;
		$o=0;
		$p=0;
		$q=0;
		$r=0;
		$s=0;
		$t=0;
		$a=0;
		$b=0;
		$c=0;
		$temp_recode = array();	
		for($i=0;$i<count($recode_temp);$i++){
				if( trim($recode_temp[$i]['r6a'])!= trim($recode_temp[$i+1]['r6a']) )
				{
						$temp_recode[$k]['r6a'] = $recode_temp[$i]['r6a'];
						$k++;
				}
				
				if(trim($recode_temp[$i]['r6b'])!= trim($recode_temp[$i+1]['r6b']))
				{
						$temp_recode[$j]['r6b'] = $recode_temp[$i]['r6b'];
						$j++;
				}
				
				if(trim($recode_temp[$i]['r7'])!= trim($recode_temp[$i+1]['r7']))
				{
						$temp_recode[$l]['r7'] = $recode_temp[$i]['r7'];
						$l++;
				}
				
				if(trim($recode_temp[$i]['r8a1'])!= trim($recode_temp[$i+1]['r8a1']))
				{
						$temp_recode[$m]['r8a1'] = $recode_temp[$i]['r8a1'];
						$m++;
				}
				
				if(trim($recode_temp[$i]['r8a2'])!= trim($recode_temp[$i+1]['r8a2']))
				{
						$temp_recode[$n]['r8a2'] = $recode_temp[$i]['r8a2'];
						$n++;
				}
				
				if(trim($recode_temp[$i]['r8d2'])!= trim($recode_temp[$i+1]['r8d2']))
				{
						$temp_recode[$o]['r8d2'] = $recode_temp[$i]['r8d2'];
						$o++;
				}
				
				if(trim($recode_temp[$i]['r8e1'])!= trim($recode_temp[$i+1]['r8e1']))
				{
						$temp_recode[$p]['r8e1'] = $recode_temp[$i]['r8e1'];
						$p++;
				}
				
				if(trim($recode_temp[$i]['r101'])!= trim($recode_temp[$i+1]['r101']))
				{
						$temp_recode[$q]['r101'] = $recode_temp[$i]['r101'];
						$q++;
				}
				
				if(trim($recode_temp[$i]['r1510'])!= trim($recode_temp[$i+1]['r1510']))
				{
						$temp_recode[$r]['r1510'] = $recode_temp[$i]['r1510'];
						$r++;
				}
				
				if(trim($recode_temp[$i]['r161'])!= trim($recode_temp[$i+1]['r161']))
				{
						$temp_recode[$s]['r161'] = $recode_temp[$i]['r161'];
						$s++;
				}
				
				if(trim($recode_temp[$i]['r178'])!= trim($recode_temp[$i+1]['r178']))
				{
						$temp_recode[$t]['r178'] = $recode_temp[$i]['r178'];
						$t++;
				}
				
				if(trim($recode_temp[$i]['r1813'])!= trim($recode_temp[$i+1]['r1813']))
				{
						$temp_recode[$a]['r1813'] = $recode_temp[$i]['r1813'];
						$a++;
				}
				
				if(trim($recode_temp[$i]['r1914'])!= trim($recode_temp[$i+1]['r1914']))
				{
						$temp_recode[$b]['r1914'] = $recode_temp[$i]['r1914'];
						$b++;
				}
				if(trim($recode_temp[$i]['r208'])!= trim($recode_temp[$i+1]['r208']))
				{
						$temp_recode[$c]['r208'] = $recode_temp[$i]['r208'];
						$c++;
				}
		}
		$this->mre = $temp_recode;
		
		//print_r($this->mre);
		if($this->native_session->flashdata('str_msg')) $this->mre['str_msg'] = $this->native_session->flashdata('str_msg');
		if($this->native_session->flashdata('frm')){
			$this->mre = array_merge($this->mre,$this->native_session->flashdata('frm'));
		}
		
	}
	
	function _sm_image()
	{
	    $reid = $this->input->post('reid');
	    
		$hd_old_image = $this->input->post('hd_old_image');
		
		$chk_delfile = $this->input->post('chk_delfile');
		
		if($hd_old_image) 
			$path_filedel = './uploads/inspector/'.$hd_old_image;
		else	
			$path_filedel = '';
	
		if($chk_delfile)
		{
			if(file_exists($path_filedel)) unlink($path_filedel);
			$record = array();
			$record['image'] = '';
			$result = $this->inspector_model->update($reid, $record);
		}
		
		if($_FILES['attack_1']['size'])
		{
			$config = array();
			$config['upload_path'] = './uploads/inspector/';
			$config['allowed_types'] = 'gif|jpg|png|jped';
			$config['max_size']	= '4000';
			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('attack_1'))
			{	
				// delete old image
				if(file_exists($path_filedel)) unlink($path_filedel);
					
				$upload_data = $this->upload->data();
				
				return $upload_data['file_name'];
			}
			else
			{
				$error['frm_error'] = $this->upload->display_errors();
				$this->native_session->set_flashdata('frm',$error); 	
			}
				
			return false;	
		}// if FILE
	}
	
	function _get_inspector()
	{
		$reid = $this->input->post('reid');
		
		$arr = $this->login_model->get_login(1);
		
        $cus_id = $arr['id'];
			
		$this->load->library('validation');
		
		$this->load->view('customer/inspector_validation.php', '', FALSE); // field validation
			
        $is_valid = $this->validation->run();
        
        $record = array(
			'cus_id' =>$cus_id,
			'password' =>$this->validation->txt_pass,
			'name' => $this->validation->name,
			'license' => $this->input->post('license'),
			'note' =>$this->input->post('note'),
		);
		
		if ($is_valid == FALSE ) 
		{
			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error));
			
			if ($reid)
				$tmp = 'customer/cinspector/id/'.$reid;
			else
				$tmp = 'customer/cinspector';
				
        	redirect($tmp, 'refresh');
        	
        	die();
				
		}
		else
		{
			return $record;
		}
	}
	
	function save_inspector()
	{	
		$reid = $this->input->post('reid');
		
		$record = array();
		
		$record = $this->_get_inspector();
		
		if($record)
		{
			$tmp = $this->_sm_image();
			
			if($tmp) $record['image'] = $tmp;
	
			$result = $this->inspector_model->update($reid, $record);
			
			if($result)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
			
			
			if ($reid)
			{
				$this->inspector_model->update($this->input->post('reid'),$record);
				$id_insert = $this->input->post('reid');
			}
			else
			{
				$record['active'] =1;
				$id_insert = $this->inspector_model->insert($record);
			}
			redirect('customer/inspector/id/'.$id_insert,'refresh');
			die();		
		}
		redirect('customer/cinspector','refresh');
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
		
		if (!$report_id)
		{
			$this->tmp_inspector['license'] = '';
			$this->tmp_inspector['image'] = '';
		}
		
		if (!$this->input->post('sel_inspected')||!$this->input->post('txt_pass'))
		{
			$this->tmp_inspector['license'] = '';
			$this->tmp_inspector['image'] = '';
			
		
			
		}
		else
		{
			$record['inspector_id'] = $this->input->post('sel_inspected');
			
			$inspector_infor = $this->inspector_model->get($record['inspector_id']);
			if($inspector_infor)
			{
				if ($inspector_infor['password']==md5($this->input->post('txt_pass')))
				{
					$this->tmp_inspector['id'] = $inspector_infor['id'];
					$this->tmp_inspector['license'] = $inspector_infor['license'];
					$this->tmp_inspector['image'] = $inspector_infor['image'];
				}	
				else{
					$this->tmp_inspector['license'] = '';
					$this->tmp_inspector['image'] = '';
				
				}
			}
			
		}
		//===========================================
		/*$this->db->where('report_id',$report_id);
		$invoice = $this->invoice_model->get();
		if ($invoice)
		{
			$this->print_invoice($invoice[0]['invoice_id']);
		}*/
		//===========================================
		
		
		$this->mr = $this->report_model->get($report_id);
		
		$tmp = $this->customer_model->get($this->mr['cus_id']);
		
		$this->mr['dateofinspection'] = format_intdate('m/d/Y',$this->mr['dateofinspection']);
	
		$this->tmp_cus = $this->customer_model->get($this->hd_id);
	
		$this->load->library('fpdi');
		
		define('FPDF_FONTPATH','./application/libraries/fpdf/font/');
		
		$this->load->view('customer/pdf_report1.php', '', FALSE); // field validation
		
		$this->fpdi->Output('./uploads/'.$this->mr['number'].".pdf", "F");
		
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
			'attached1' => $this->input->post('txt_attached1'),
			'attached2' => $this->input->post('txt_attached2'),
			'attached3' => $this->input->post('txt_attached3'),
			'attached4' => $this->input->post('txt_attached4'),
			'attached5' => $this->input->post('txt_attached5'),
		);
		
	//	print_r($record);
	//	die();
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
		
		
		for($i=1;$i<=5;$i++){
		if(!empty($record['email'.$i])){
			$this->email->initialize($config);
			
			//$this->email->from($this->site['site_email'], $this->site['site_name']);
			$this->email->from($cus_rd['cus_email'], $cus_rd['cus_comp_name']);
			$this->email->to($record['email'.$i]); 
			
			$this->email->subject('Termite Report '.$this->mr['number']);
			
			$this->email->message($html_content);
			
			$this->email->attach('./uploads/'.$this->mr['number'].'.pdf');
			
			if(!empty($record['attached'.$i]))
			$this->email->attach('./uploads/invoice'.$this->mr['number'].'.pdf');
			
			$this->email->send();
			$this->email->clear('./uploads/invoice'.$this->mr['number'].'.pdf');
			}
			
		}
		
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
        //echo '<pre>';var_dump($_POST); echo '</pre>';die();
        $cus_id = $arr['id'];
        $sc_infest4percent = $this->input->post('infest4percent');
        
		$record = array(
			'cus_id' => $cus_id,
			
			'sc_file_code' => $this->input->post('sc_file_code'),
			'sc_location' => $this->input->post('sc_location'),
			'sc_area' =>($this->input->post('sc_area'))?1:0,
			'sc_infest1a_act' =>($this->input->post('sc_infest1a_act'))?1:0,
			'sc_infest1a_pre' =>($this->input->post('sc_infest1a_pre'))?1:0,
			'sc_infest1b_act' =>($this->input->post('sc_infest1b_act'))?1:0,
			'sc_infest1b_pre' =>($this->input->post('sc_infest1b_pre'))?1:0,
			'sc_infest1c_act' =>($this->input->post('sc_infest1c_act'))?1:0,
			'sc_infest1c_pre' =>($this->input->post('sc_infest1c_pre'))?1:0,
			'sc_infest1d_act' =>($this->input->post('sc_infest1d_act'))?1:0,
			'sc_infest1d_pre' =>($this->input->post('sc_infest1d_pre'))?1:0,
			'sc_infest1e_act' =>($this->input->post('sc_infest1e_act'))?1:0,
			'sc_infest1e_act' =>($this->input->post('sc_infest1e_act'))?1:0,
			'sc_infest1e_pre' =>($this->input->post('sc_infest1e_pre'))?1:0,
			'sc_infest2' =>($this->input->post('sc_infest2'))?1:0,
			'sc_infest3a' =>($this->input->post('sc_infest3a'))?1:0,
			'sc_infest3b' =>($this->input->post('sc_infest3b'))?1:0,
			'sc_infest4' =>($this->input->post('sc_infest4'))?1:0,
			'sc_infest4percent' => $sc_infest4percent['from'].'|'.$sc_infest4percent['to'],
			'sc_damage' =>($this->input->post('sc_damage'))?1:0,
			'sc_treat1_desc' => $this->input->post('sc_treat1_desc'),
			'sc_treat1' =>($this->input->post('sc_treat1'))?1:0,
			'sc_treat2' =>($this->input->post('sc_treat2'))?1:0,
			'sc_treat3' =>($this->input->post('sc_treat3'))?1:0,
			'sc_treat4' =>($this->input->post('sc_treat4'))?1:0,
			'sc_remark' =>($this->input->post('sc_remark'))?1:0,
			'sc_remark_desc' => $this->input->post('sc_remark_desc'),
			'sc_firm' => $this->input->post('sc_firm'),
			'sc_license_num' => $this->input->post('sc_license_num'),
			'sc_bus_li_num' => $this->input->post('sc_bus_li_num'),
			'sc_add1' => $this->input->post('sc_add1'),
			'sc_add2' => $this->input->post('sc_add2'),
            
//			'vacant' =>($this->input->post('vacant'))?1:0,
//			'occupied' =>($this->input->post('occupied'))?1:0,
//			'unfurnished' =>($this->input->post('unfurnished'))?1:0,
//			'furnished' =>($this->input->post('furnished'))?1:0,
		);
        
		$record['sc_date'] = get_strdate($this->input->post('sc_date'),'m/d/Y');
		
		$record['sc_date_ack'] = get_strdate($this->input->post('sc_date_ack'),'m/d/Y');
		$record['sc_treat1_date'] = get_strdate($this->input->post('sc_treat1_date'),'m/d/Y');
        //echo '<pre>';var_dump($record); echo '</pre>';die();
        
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
		if ($this->input->post('reid'))
		{
			$id_insert=$this->report_model->update($this->input->post('reid'), $record);
			$get_number=$this->report_model->get($this->input->post('reid'));
			
			$record['inspector_id'] = $this->input->post('sel_inspected');
			
			$inspector_infor = $this->inspector_model->get($record['inspector_id']);
			if($inspector_infor)
			{
				if ($inspector_infor['password']==md5($this->input->post('txt_pass')))
				{
					$this->tmp_inspector['id'] = $inspector_infor['id'];
					$this->tmp_inspector['license'] = $inspector_infor['license'];
					$this->tmp_inspector['image'] = $inspector_infor['image'];
				}	
				else{
					$this->tmp_inspector['license'] = '';
					$this->tmp_inspector['image'] = '';
				
				}
			}
			if ($this->tmp_inspector['id'])
			{
				$arr = array(
				'inspector_id'=> $this->tmp_inspector['id'],
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
			}
			
			//$this->input->post('reid');
		}
		else
		{
			
			
			
			$result = $this->customer_model->get($this->hd_id);
			$record['number'] = $result['cus_startnumber'];
			$record['image'] = $upload_data['file_name'];
			$id_insert = $this->report_model->insert($record);
			
			
			$record['inspector_id'] = $this->input->post('sel_inspected');
			
			$inspector_infor = $this->inspector_model->get($record['inspector_id']);
			if($inspector_infor)
			{
				if ($inspector_infor['password']==md5($this->input->post('txt_pass')))
				{
					$this->tmp_inspector['id'] = $inspector_infor['id'];
					$this->tmp_inspector['license'] = $inspector_infor['license'];
					$this->tmp_inspector['image'] = $inspector_infor['image'];
				}	
				else{
					$this->tmp_inspector['license'] = '';
					$this->tmp_inspector['image'] = '';
				
				}
			}
			if ($this->tmp_inspector['id'])
			{
				$arr = array(
				'inspector_id'=> $this->tmp_inspector['id'],
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
			}
			
			
			$record_up = array('cus_startnumber'=> $record['number']+1);
			$this->customer_model->update($this->hd_id,$record_up);
			
		}
		if ($this->input->post('txt_new')==1){
		echo "<script>if(confirm(\"Do you want to create invoice\")){
		   window.location = '".$this->site['base_url']."invoice/create/id/".$id_insert."/new/1'

		   }else{
			   window.location = '".$this->site['base_url']."customer/creport/id/".$id_insert."'
			  }	</script>";
			  die();
		}else{
		redirect('customer/creport/id/'.$id_insert,'refresh');
		die();
		}
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
	
	function valid_user()
	{
		if($this->input->post('reid')) return true;
		
		$this->db->select('*');
		$this->db->where('LCASE(name)',strtolower($this->input->post('name')));
		$this->db->where('active',1);
		$reid = $this->input->post('reid');

        $this->db->from('inspector');
        if($this->db->count_all_results())
		{
			$this->validation->set_message('valid_user', 'This account has been used.');
			return false;
		}
		else
		{
			return true;
		}	
		
	}
	
	function valid_password()
	{
		//when insert
		if($this->input->post('reid')== NULL) return true;
		
		$this->db->select('*');
		
		$this->db->where('password',$this->input->post('txt_pass'));
		
		$this->db->where('id',$this->input->post('reid'));
		
		$this->db->where('active',1);
	
        $this->db->from('inspector');
        
        if($this->db->count_all_results())
        {
        	return true;
        }
		else
		{
			$this->validation->set_message('valid_password', 'If you want change information, Type correct password.');
			return false;
		}	
		
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
		
		if (!$id)
		{
			$this->tmp_inspector['license'] = '';
			$this->tmp_inspector['image'] = '';
		}
		
		if (!$this->input->post('sel_inspected')||!$this->input->post('txt_pass'))
		{
			$this->tmp_inspector['license'] = '';
			$this->tmp_inspector['image'] = '';
			
			
		}
		else
		{
			$record['inspector_id'] = $this->input->post('sel_inspected');
			
			$inspector_infor = $this->inspector_model->get($record['inspector_id']);
			if($inspector_infor)
			{
				if ($inspector_infor['password']==md5($this->input->post('txt_pass')))
				{
					$this->tmp_inspector['id'] = $inspector_infor['id'];
					$this->tmp_inspector['license'] = $inspector_infor['license'];
					$this->tmp_inspector['image'] = $inspector_infor['image'];
				}	
				else{
					$this->tmp_inspector['license'] = '';
					$this->tmp_inspector['image'] = '';
				
				}
			}
			
		}
		
		$this->mr = $this->report_model->get($id);
		
		$this->tmp_cus = $this->customer_model->get($this->hd_id);
		
		
		
		$this->mr['dateofinspection'] = format_intdate('m/d/Y',$this->mr['dateofinspection']);
		
		$this->load->library('fpdi');
		
		define('FPDF_FONTPATH','./application/libraries/fpdf/font/');
		
		$this->load->view('customer/pdf_report1.php', '', FALSE); // field validation
		
		$this->fpdi->Output();
		
		die();
		
	}
	
	function check_pass($sel_inspector,$pass,$reid)
	{
		$objResponse = new xajaxResponse();
		
		$objResponse->assign("Msg_username","style.color","");
		if ($reid)
		{
			$this->db->where('report_id',$reid);
			$result = $this->report_history_model->get();
		}
		if(empty($pass)){
		
			$objResponse->assign("Msg_username","innerHTML", '&nbsp');
			if ($result)
			{
				$objResponse->assign("txt_update","width", 0);
				
			}	
			$objResponse->assign("txt_check_print","value", 'print');
				$objResponse->assign("txt_check_email","value", 'email');				
		}else{
			$this->db->where('id',$sel_inspector);
			$this->db->where('password',md5($pass) ); 
			
			//$this->db->from('inspector');
			$tmp = $this->inspector_model->get();
			if($tmp){
				if ($result)
				{
					$objResponse->assign("txt_update","width", 74);
				}
				$objResponse->assign("txt_check_print","value", '');
					$objResponse->assign("txt_check_email","value", '');
				if($tmp[0]['image'])
				{
					
					$objResponse->assign("Msg_username","innerHTML",'<img src='.$this->site['base_url'].'uploads/inspector/'.$tmp[0]['image'].' width="120" height="30" />');
				}
				else
				{
					
					$objResponse->assign("Msg_username","innerHTML",  'Password is correct');
				}
				
			}else{
				
					$objResponse->assign("txt_check_print","value", 'print');
					$objResponse->assign("txt_check_email","value", 'email');
				if ($result)
				{
					$objResponse->assign("txt_update","width", 0);
				}	
					
				//$objResponse->assign("Msg_username","style.color","blue");
				$objResponse->assign("Msg_username","innerHTML",  '&nbsp');
								
			}
			
		}
			
		return $objResponse;

		
	}
	
	function valid_username()
	{
		$this->db->where('LCASE(name)',strtolower($this->input->post('name')) );
		
		$this->db->where('cus_id',$this->hd_id);
		
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
}
?>