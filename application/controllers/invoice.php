<?php

class Invoice extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $hd_id;
	var $hd_name;
	var $tmp_cus;
	var $tmp_inspector;
	
	function Invoice()
	{
		parent::Controller();
		$this->load->model('report_model');
		$this->load->model('inspector_model');
		$this->load->model('customer_model');
		$this->load->model('invoice_model');
	
		if (!$this->login_model->is_login(1)){redirect('login');die();}
		$arr = $this->login_model->get_login(1);
		$this->hd_id = $arr['id'];	
		$this->hd_name =$arr['username'];
		//print_r($this->native_session->userdata['sess_customer']);
		
		$this->xajax->processRequest();
		$this->xajax->configure('javascript URI', $this->site['base_url'].'application/libraries/xajax/');	
		$this->mysmarty->assign("xajax_js",$this->xajax->getJavascript()); //important !!!
		
		$this->search = array('page' => 0);
	}
	
	function _output()
	{
		
		if($this->native_session->flashdata('error'))
			$this->mr['error'] = $this->native_session->flashdata('error');
			
		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = $this->native_session->flashdata('error_frm');
		
		if($this->native_session->flashdata('frm'))
		{
			 $tmp = $this->native_session->flashdata('frm');
			 $this->mr['frm_error'] = $tmp['frm_error'];
		}
	
		$this->mysmarty->assign('mr',$this->mr);
		
		$this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
		
	}
	
	function index()
	{
		
	}
	
	function create()
	{
		$this->mysmarty->assign('tpl_center','invoice/index.tpl');
		
		$par = $this->uri->uri_to_assoc(3);
		if (isset($par['id']))
		{
			$this->db->where('report_id',$par['id']);
			$invoice = $this->invoice_model->get();
			if ($invoice)
			{
				
				$this->mr['report_id'] = $par['id'];
				redirect('invoice/edit/id/'.$invoice[0]['invoice_id']);
				die();
			}
			
			$report = $this->report_model->get($par['id']);
			
			if (!$this->mr)
				$this->mr = $report;
			else
				$this->mr = array_merge($this->mr,$report);
			
			$customer = $this->customer_model->get($report['cus_id']);
			$this->mr['new'] = $par['new'];
			$this->mr['report_id'] = $report['id'];
			$this->mr = array_merge($this->mr,$customer);
			$this->mr['date'] = format_intdate($this->site['site_short_date'],time());
			$this->mr['invoice_name'] = $report['number'];
			$this->mr['inspected_name'] = $report['r5a'];
			$this->mr['inspected_address'] = $report['r5b1'];
			$this->mr['inspected_city'] = $report['r5b2'];
			$this->mr['inspected_state'] = $report['r5b3'];
			$this->mr['inspected_zipcode'] = $report['r5b4'];
			//print_r($this->mr);
			/*
			$this->db->order_by('invoice_id','desc');
			$this->db->limit(1);
			$invoice = $this->invoice_model->Get();
			$number = $invoice[0]['invoice_id'] + 1;
			
			$this->mr['invoice_name'] = str_pad($number,strlen($customer['cus_invoice']),$customer['cus_invoice'],STR_PAD_LEFT);
			*/
			$this->mr['invoice_name'] = $this->mr['number'];
			$this->mr['report'] = $this->mr['number'];
		}
	}
	
	function save()
	{
		$invoice_id = $this->input->post('invoice_id');
		
		$report_id = $this->input->post('report_id');
		
		$new = $this->input->post('txt_new');
		
		$this->load->library('validation');
		$this->load->view('invoice/invoice_validation.php', '', FALSE); // field validation
		$is_valid = $this->validation->run();
		
		$record = array(
			'date' => get_strdate($this->input->post('txt_date'),$this->site['site_short_date']),
			'cus_id' =>$this->hd_id,
			
			'desc_1'=>$this->validation->txt_des1,
			'desc_2'=>$this->validation->txt_des2,
			'desc_3'=>$this->validation->txt_des3,
			'desc_4'=>$this->validation->txt_des4,
			'desc_5'=>$this->validation->txt_des5,
			'desc_6'=>$this->validation->txt_des6,
			'desc_7'=>$this->validation->txt_des7,
			'desc_8'=>$this->validation->txt_des8,
			'desc_9'=>$this->validation->txt_des9,
			'desc_10'=>$this->validation->txt_des10,
			'amount_1' => $this->validation->txt_amount1,
			'amount_2' => $this->validation->txt_amount2,
			'amount_3' => $this->validation->txt_amount3,
			'amount_4' => $this->validation->txt_amount4,
			'amount_5' => $this->validation->txt_amount5,
			'amount_6' => $this->validation->txt_amount6,
			'amount_7' => $this->validation->txt_amount7,
			'amount_8' => $this->validation->txt_amount8,
			'amount_9' => $this->validation->txt_amount9,
			'amount_10' => $this->validation->txt_amount10,
			'description' => $this->input->post('txt_description'),
		);
		
		if ($is_valid == FALSE ) 
		{
			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);
			
			$this->native_session->set_flashdata('frm',array_merge($record,$error));
			if ($invoice_id)
			{
            	
				if($new){
				redirect('invoice/edit/id/'.$invoice_id.'/new/'.$new);
				die();
				}else{
				redirect('invoice/edit/id/'.$invoice_id);
				die();
				}
				//redirect('invoice/edit/id/'.$invoice_id, 'refresh');
            	//die();
			}
			else
			{
				if($new){
				redirect('invoice/create/id/'.$report_id.'/new/'.$new);
				die();
				}else{
				redirect('invoice/create/id/'.$report_id);
				die();
				}
				//redirect('invoice/create/id/'.$report_id,'refresh');
				//die();
			}	
		}
		
		$report = $this->report_model->Get($report_id);
		
		$customer = $this->customer_model->get($report['cus_id']);
		
		$record['report_id'] = $report_id;
		$record['report'] = $report['number'];
		$record['escrow'] = $report['r1a'];
		$record['invoice_name'] = $this->input->post('txt_invoicename');
		
		$record['inspected_name'] = $this->input->post('txt_inspected_name');
		$record['inspected_cname'] = $this->input->post('txt_inspected_cname');
		$record['inspected_address'] = $this->input->post('txt_inspected_address');
		$record['inspected_city'] = $this->input->post('txt_inspected_city');
		$record['inspected_state'] = $this->input->post('txt_inspected_state');
		$record['inspected_zipcode'] = $this->input->post('txt_inspected_zipcode');
		
		$record['bill_name'] = $this->input->post('txt_bill_name');
		$record['bill_cname'] = $this->input->post('txt_bill_cname');
		$record['bill_address'] = $this->input->post('txt_bill_address');
		$record['bill_city'] = $this->input->post('txt_bill_city');
		$record['bill_state'] = $this->input->post('txt_bill_state');
		$record['bill_zipcode'] = $this->input->post('txt_bill_zipcode');
		
		/*
		$this->db->order_by('invoice_id','desc');
		$this->db->limit(1);
		$invoice = $this->invoice_model->Get();
		$number = $invoice[0]['invoice_id'] + 1;
		*/
		
		
		
		if ($invoice_id)
			$result = $this->invoice_model->update($invoice_id,$record);
		else
		{
			//$record['invoice_name'] = str_pad($number,strlen($customer['cus_invoice']),$customer['cus_invoice'],STR_PAD_LEFT);
			$result = $this->invoice_model->insert($record);
		}
		//================== export invoice fdf =========================
		if ($result)
		{
			$this->mr = $this->invoice_model->get($result);
			
			$customer = $this->customer_model->get($this->mr['cus_id']);
			
			$this->mr = array_merge($this->mr,$customer);
			$this->mr['date'] = format_intdate('M. d. Y',$this->mr['date']);
			$m = 0;
			$this->mr['total'] = 0;
			for($i=1;$i<=10;$i++)
			{
				if ($this->mr['desc_'.$i])
				{
					$this->mlist[$m]['desc'] = $this->mr['desc_'.$i];
					$this->mlist[$m]['amount'] = format_currency($this->mr['amount_'.$i],$this->site['site_currency']);
					$this->mr['total']+=$this->mr['amount_'.$i];
					$m++ ;
				}
			}
		}
		$this->mr['total'] = format_currency($this->mr['total'],$this->site['site_currency']);
		$data = $this->load->view('print_r/invoice', '', true);
		//print_r($this->mr);
		//die();
		$arrReport = $this->report_model->get($this->mr['report_id']);
		
		$this->load->library('html2pdf');
		$this->html2pdf->HTML2PDF('P','letter', 'en', array(10, 10, 10, 10));
		$this->html2pdf->WriteHTML($data,false);
		$this->html2pdf->Output('./uploads/invoice'.$arrReport['number'].'.pdf','F');
		if($result)
		{
			if($new){
			redirect('invoice/edit/id/'.$result.'/new/'.$new);
			die();
			}else{
			redirect('invoice/edit/id/'.$result);
			die();
			}
		}
	}
	
	function edit()
	{
		$this->mysmarty->assign('tpl_center','invoice/index.tpl');
		
		$par = $this->uri->uri_to_assoc(3);
		
		if (isset($par['id']))
		{
			
			$this->mr = $this->invoice_model->get($par['id']);
			$this->mr['new']=$par['new'];
			$customer = $this->customer_model->get($this->mr['cus_id']);
			$this->mr = array_merge($this->mr,$customer);
			/*
			$report = $this->report_model->get($this->mr['report_id']);
			$this->mr['inspected_name'] = $report['r5a'];
			$this->mr['inspected_address'] = $report['r5b1'];
			$this->mr['inspected_city'] = $report['r5b2'];
			$this->mr['inspected_state'] = $report['r5b3'];
			$this->mr['inspected_zipcode'] = $report['r5b4'];
			*/
			
			$this->mr['date'] = format_intdate($this->site['site_short_date'],$this->mr['date']);	
		}
	}
	
}
?>