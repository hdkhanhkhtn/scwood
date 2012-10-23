<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mypage extends Controller {
	
	var $mr;
	var $site;
    var $mlist;

	function Mypage()
	{
		parent::Controller();
		
		//check is login or not?
		if(!$this->login_model->is_login(1)){redirect('home');die();}
		
		//load lang
		$this->lang->load('customer', $this->native_session->userdata('client_lang'));
		
		$this->lang->load('errormsg', $this->native_session->userdata('client_lang'));
		
        $this->mysmarty->assign('lang',$this->lang->toArray());
		//load model
		$this->load->model('customer_model');

		$this->mr['title'] = 'My page';

		if($this->native_session->flashdata('error_frm')) $this->mr['error_frm'] = nl2br($this->native_session->flashdata('error_frm'));


	}
	
	function _output()
	{

		$this->mysmarty->assign('mr',$this->mr);
        $this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
	}
	
	function index()
	{
		$this->mysmarty->assign('tpl_center','mypage/index.tpl');
			
		if($this->native_session->flashdata('str_msg')) $this->mr['str_msg'] = $this->native_session->flashdata('str_msg');
		
		$this->historyinvoice();

	}

    function viewaccount()
    {
      $this->mysmarty->assign('tpl_center','mypage/viewaccount.tpl');

      //assign str random
      $this->load->helper('string');

      $this->mr['str_random'] = random_string('numeric', 6);

      $this->native_session->set_flashdata('sess_random',$this->mr['str_random']);

      //
      $arr = $this->login_model->get_login(1);

		$data = $this->customer_model->get($arr['id']);
      
	  if($this->native_session->flashdata('frm')){

	    $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));
	    $this->mr['cus_comp_name'] = $data['cus_comp_name'];
		
      }else{

      	$this->mr = array_merge($this->mr,$data);
      	$this->mr['title_menu'] = 'PROFILE';
      }

    }
    function update_account()
    {	
		
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
			$record['cus_logo'] = '';
			$result = $this->customer_model->update($cus_id, $record);
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
				
				$record['cus_logo'] = $upload_data['file_name'];

				$result = $this->customer_model->update($cus_id, $record);
				
			}	
				
		}// if FILE
    
        $this->load->library('validation');

		$this->load->view('mypage/account_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(
			'cus_license' => $this->validation->txt_cus_license,
			'cus_pemit' => $this->validation->txt_cus_pemit,
			'cus_name' => $this->validation->txt_name,
			'cus_email' => $this->validation->txt_email,
            'cus_address' => $this->validation->txt_address,
            'cus_city' =>$this->validation->txt_city,
            'cus_state' =>$this->validation->txt_state,
            'cus_zipcode' =>$this->validation->txt_zip,
            'cus_phone' => $this->validation->txt_phone,
            'cus_fax' => $this->validation->txt_fax,
            'cus_note' =>$this->validation->txt_note,
            'cus_startnumber' =>$this->validation->txt_startnumber,
            'cus_invoice' => $this->validation->txt_invoice_number,
		);

        if ($is_valid == FALSE ) {

			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);

			$this->native_session->set_flashdata('frm',array_merge($record,$error));

            redirect('mypage/viewaccount');

			die();

		} else {
            
		    $rs = $this->customer_model->update($cus_id, $record);
		    
		    if($rs)
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_save')));
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));	
			
            redirect('mypage/viewaccount', 'refresh');

            die();

		}//if

    }

  
	function historyinvoice()
	{
	
		//load invoice
		$this->load->model('invoice_model');

        $arr = $this->login_model->get_login(1);

      	$this->mlist = $this->invoice_model->get(0,$arr['id']);
      	
      	if(is_array($this->mlist)){
      	      	
      	for($i = 0; $i < count($this->mlist); $i++)
		{
						
			$this->mlist[$i]['invoice_total'] = format_currency($this->mlist[$i]['invoice_total'],$this->mlist[$i]['invoice_currency']);
			
			$this->mlist[$i]['invoice_date'] = format_intdate($this->site['site_short_date'],$this->mlist[$i]['invoice_date']);

			$this->mlist[$i]['invoice_status_name'] = $this->invoice_model->get_status($this->mlist[$i]['invoice_status']);		
			
		}
		
		}
	
	}

    function invoicedetail()
    {

        $this->mysmarty->assign('tpl_center','mypage/viewinvoice.tpl');

        $this->load->model('invoice_model');

        //invoice info
        $par = $this->uri->uri_to_assoc(3);

        $a_cus = $this->login_model->get_login(1);

        $this->mr = array_merge($this->mr,$this->invoice_model->get($par['id'],$a_cus['id']));
        
        $this->mr['invoice_status_name'] = $this->invoice_model->get_status($this->mr['invoice_status']);
        
        $this->mr['invoice_total'] = format_currency($this->mr['invoice_total'],$this->mr['invoice_currency']);

        //invoice detail

      	$this->mlist = $this->invoice_model->get_detail($this->mr['invoice_id']);

		if(is_array($this->mlist))
		{
	        for($i = 0; $i < count($this->mlist); $i++)
			{	
	        	//calc first
	            $this->mlist[$i]['invdt_item_amount'] = $this->mlist[$i]['invdt_item_price'] * $this->mlist[$i]['invdt_item_qty'];
	            
	            //format 
	        	$this->mlist[$i]['invdt_item_price'] = format_currency($this->mlist[$i]['invdt_item_price'],$this->mr['invoice_currency']);
				
				$this->mlist[$i]['invdt_item_amount'] = format_currency($this->mlist[$i]['invdt_item_amount'],$this->mr['invoice_currency']);
	        }
		}

    }


    function changepass()
    {
       $this->mysmarty->assign('tpl_center','mypage/changepass.tpl');

       if($this->native_session->flashdata('frm')){

	    $this->mr = array_merge($this->mr,$this->native_session->flashdata('frm'));

      }
      $this->mr['title_menu'] = 'CHANGE PASSWORD';

    }

    function sm_changepass()
    {
        $this->load->library('validation');

		$this->load->view('mypage/changepass_validation.php', '', FALSE); // field validation

        $is_valid = $this->validation->run();

		$record = array(

			'cus_pass' => $this->validation->txt_newpass,

		);

        if ($is_valid == FALSE ) {

			$error = array(
				//'cusname_error' => $this->validation->txt_cusname_error,
				'frm_error' => $this->validation->error_string,
			);

			$this->native_session->set_flashdata('frm',array_merge($record,$error));

            redirect('mypage/changepass');

			die();

		} else {

            $arr = $this->login_model->get_login(1);

		    $rs = $this->customer_model->update($arr['id'], $record);
			
			if($rs) 
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_change_pass')));
			else
				$this->native_session->set_flashdata('str_msg',set_message($this->lang->line('msg_data_error'),2));
		
            redirect('login', 'refresh');

            die();

		}//if
    }

    function check_security_code()
	{
		if($this->native_session->flashdata('sess_random') == $this->validation->txt_random )
		{
			return true;
		}else
		{
			$this->validation->set_message('check_security_code', $this->lang->line('error_security_code'));
			return false;
		}
	}

    function valid_pass(){

		$this->db->where('cus_pass',$this->input->post('txt_pass') );

		$this->db->from('customer');

		if($this->db->count_all_results()){

            return true;

		}else{

			$this->validation->set_message('valid_pass', $this->lang->line('error_old_pass'));

			return false;
		}



	}
}
?>