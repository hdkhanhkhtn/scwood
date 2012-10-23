<?php

class Print_history extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $hd_id;
	var $cus_tmp;

	function Print_history()
	{
		parent::Controller();
		$this->load->model('report_history_model');
		$this->load->model('report_model');
		$this->load->model('invoice_model');
		$this->load->model('sendmail_model');
		$this->load->model('customer_model');
		if (!$this->login_model->is_login(1) && (!$this->login_model->is_login(2)))
		{
			redirect('login');
			die();
		}
		$arr = $this->login_model->get_login(1);
		$this->hd_id = $arr['id'];	
		$this->hd_name =$arr['username'];
		$this->native_session->keep_flashdata('sess_search');
	}
	
	function _output()
	{
		
		$this->mysmarty->assign('mr',$this->mr);
		
	}
	
	function print_list()
	{
		$this->mr['title'] = 'Print List Report';
		
		$this->db->where('customer.cus_id',$this->hd_id);	
		
		$this->db->from('customer');
		$this->db->join('report','report.cus_id=customer.cus_id');
		
		if ($this->session->flashdata('sess_search'))
		{
			$tmp = $this->session->flashdata('sess_search');
			
			$this->db->order_by($tmp['field'],$tmp['sort_type']);
			
		}
		else
		{
			$this->db->order_by('id','desc');
		}
		
		$query = $this->db->get();
		$this->mlist  = $query->result_array();
		for($i=0;$i<count($this->mlist);$i++)
		{
			$this->mlist[$i]['dateofinspection'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['dateofinspection']);
		}

		$data = $this->load->view('print_r/report_list', '', true);
					
		$this->load->library('html2pdf');
		$this->html2pdf->HTML2PDF('L','letter', 'en', array(10, 10, 10, 10));
		$this->html2pdf->WriteHTML($data,false);
		$this->html2pdf->Output();
		
	}
	
	function print_report()
	{
		$this->mr['title'] = 'Print history';	
		
		$par = $this->uri->uri_to_assoc(3);
		if ($par['id'])
		{	
			$this->db->where('report_id',$par['id']);
			$this->db->order_by("date", "desc");
			$result = $this->report_history_model->get();
			for ($i=0;$i<count($result);$i++)
			{
				$result[$i]['date'] = format_intdate($this->site['site_long_date'],$result[$i]['date']);
			}
			
			$this->mysmarty->assign('report_history',$result);
			$this->mr = $this->report_model->get($par['id']);	
			$this->mr['r1a'] = 'VA/HUD/FHA CASE'. ' '. $this->mr['r1a'];
			$this->mr['title'] = 'Report history';
			$this->mysmarty->assign('mr',$this->mr);
		}
		
		$this->mysmarty->view('print_r/index_r.tpl');
	}
	function print_mail()
	{
			
		
		$par = $this->uri->uri_to_assoc(3);
		if ($par['id'])
		{	
			$this->db->where('report_id',$par['id']);
			$this->db->order_by("date", "desc");
			$result = $this->sendmail_model->get();
			for ($i=0;$i<count($result);$i++)
			{
				$result[$i]['date'] = format_intdate($this->site['site_long_date'],$result[$i]['date']);
			}
			
			$this->mysmarty->assign('lst_mail',$result);		
			$this->mr = $this->report_model->get($par['id']);
			
			$this->mr['r1a'] = 'VA/HUD/FHA CASE'. ' '. $this->mr['r1a'];
			$this->mr['title'] = 'Email history';
			$this->mysmarty->assign('mr',$this->mr);
		}
		
		$this->mysmarty->view('print_r/index_m.tpl');
	}
	
	function rprint()
	{
		$par = $this->uri->uri_to_assoc(3);
		if ($par['id'])
		{	
			if ($this->hd_id)
				$this->tmp_cus = $this->customer_model->get($this->hd_id);
		
			$this->db->where('report_id',$par['id']);
			$this->db->order_by("date", "desc");
			$this->mlist = $this->report_history_model->get();
			for ($i=0;$i<count($this->mlist);$i++)
			{
				$this->mlist[$i]['date'] = format_intdate($this->site['site_long_date'],$this->mlist[$i]['date']);
			}
			
			$this->mysmarty->assign('lst_report',$result);		
			$this->mr = $this->report_model->get($par['id']);

			$data = $this->load->view('print_r/report_history', '', true);
					
			$this->load->library('html2pdf');
			$this->html2pdf->HTML2PDF('L','letter', 'en', array(10, 10, 10, 10));
			$this->html2pdf->WriteHTML($data,false);
			$this->html2pdf->Output();
		}	
	}
	function mprint()
	{
		$par = $this->uri->uri_to_assoc(3);
		if ($par['id'])
		{	
			if ($this->hd_id)
				$this->tmp_cus = $this->customer_model->get($this->hd_id);
			
			$this->db->where('report_id',$par['id']);
			$this->db->order_by("date", "desc");
			$this->mlist = $this->sendmail_model->get();
			for ($i=0;$i<count($this->mlist);$i++)
			{
				$this->mlist[$i]['date'] = format_intdate($this->site['site_long_date'],$this->mlist[$i]['date']);
			}
			
			$this->mysmarty->assign('lst_report',$result);		
			$this->mr = $this->report_model->get($par['id']);
			
			$data = $this->load->view('print_r/email_history', '', true);
					
			$this->load->library('html2pdf');
			$this->html2pdf->HTML2PDF('L','letter', 'en', array(10, 10, 10, 10));
			$this->html2pdf->WriteHTML($data,false);
			$this->html2pdf->Output();
		}	
	}
	
	function cus_print()
	{
		if ($this->native_session->flashdata('sess_search'))
		{
			$tmp = $this->native_session->flashdata('sess_search');
			
			$this->db->order_by('UPPER('.$tmp['field'].')',$tmp['sort_type']);
			$this->db->like('cus_name', $tmp['keyword']); 
			$this->db->or_like('cus_username',$tmp['keyword']);
			$this->db->or_like('cus_email', $tmp['keyword']); 
			
		}
		$this->mlist =  $this->customer_model->get();
		for ($i=0;$i<count($this->mlist);$i++)
		{
			$lst[$i]['cus_date'] = format_intdate($this->site['site_long_date'],$this->mlist[$i]['cus_date']);
		}
		
		$data = $this->load->view('print_r/customer_list', '', true);
					
		$this->load->library('html2pdf');
		$this->html2pdf->HTML2PDF('L','letter', 'en', array(10, 10, 10, 10));
		$this->html2pdf->WriteHTML($data,false);
		$this->html2pdf->Output();
	}
	
	function report_list()
	{
		if ($this->native_session->flashdata('sess_search'))
		{
			$search = $this->native_session->flashdata('sess_search');
			
			
			$sel = $search['sel_type'];
			if ($sel ==1 ) //lic.no.
			{
				$this->db->like('cus_license',$search['keyword']);
				$tmp = $this->customer_model->get();
				if ($tmp)
				{
					for ($i=0;$i<count($tmp);$i++)
					{
						if ($i==0)
							$sql = "report.cus_id LIKE '%".$tmp[$i]['cus_id']."%'";
						else
							$sql .= " or report.cus_id LIKE '%".$tmp[$i]['cus_id']."%'";
					}
				}
				else
					$sql = "report.cus_id =0";
			}
			elseif ($sel==2) //file no.
				$sql = "number LIKE '%".$search['keyword']."%'";
			elseif ($sel ==3)
				$sql = "r5b1 LIKE '%".$search['keyword']."%'";
			if ($sql)
				$this->db->where($sql);
			
			
			
			
			$this->db->order_by($search['field'], $search['sort_type']); 
			
		}
		$this->db->from('customer');
		$this->db->join('report','report.cus_id=customer.cus_id');
		
		$query = $this->db->get();
		$this->mlist  = $query->result_array();
		for($i=0;$i<count($this->mlist);$i++)
		{
			$this->mlist[$i]['dateofinspection'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['dateofinspection']);
		}
		
		$this->mysmarty->assign('mlist',$this->mlist);
		
		$this->mysmarty->view('print_r/report_list.tpl');
		
		/*$data = $this->load->view('print_r/report_list', '', true);
					
		$this->load->library('html2pdf');
		$this->html2pdf->HTML2PDF('L','letter', 'en', array(10, 10, 10, 10));
		$this->html2pdf->WriteHTML($data,false);
		$this->html2pdf->Output(); */
		
	}
	
	function print_invoice()
	{
		$par = $this->uri->uri_to_assoc(3);
		
		if (isset($par['id']))
		{
			$this->mr = $this->invoice_model->get($par['id']);
			
			$customer = $this->customer_model->get($this->mr['cus_id']);
			
			$this->mr = array_merge($this->mr,$customer);
			$this->mr['date'] = format_intdate('M. d. Y',$this->mr['date']);
			$m = 0;
			$this->mr['total'] = 0;
			for($i=1;$i<=10;$i++)
			{
				if ($this->mr['desc_'.$i] && $this->mr['amount_'.$i])
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
					
		$this->load->library('html2pdf');
		$this->html2pdf->HTML2PDF('P','letter', 'en', array(10, 10, 10, 10));
		$this->html2pdf->WriteHTML($data,false);
		$this->html2pdf->Output();
	}
	
}