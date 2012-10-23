<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends Controller {
	
	var $mr;
	var $site;
    var $mlist;

	function Checkout()
	{
	    parent::Controller();
	    
	    //load lang
		$this->lang->load('iteminvoice', $this->session->userdata('client_lang'));
		
		$this->lang->load('customer', $this->session->userdata('client_lang'));
        
        $this->mysmarty->assign('lang',$this->lang->toArray());
        
	    $this->mr['title'] = 'Check out';

        if (!$this->session->userdata('sp_cart')) {

          redirect('shoppingcart/','refresh');

		  die();

        }

	}

	function _output()
	{

		$this->mysmarty->assign('mr',$this->mr);
        $this->mysmarty->assign('mlist',$this->mlist);
		$this->mysmarty->view('client/index');
	}

    function islogin()
    {
        if(!$this->login_model->is_login(1))
          {
            redirect('login','refresh');

			die();
          }
        else{
            redirect('checkout','refresh');

			die();

        }
    }
    function checkout_direct()
    {
         $this->index();

    }

	function index()
	{

       $this->mysmarty->assign('tpl_center','checkout/index.tpl');
       //get customer info

       if($this->login_model->is_login(1)){

          $arr = $this->login_model->get_login(1);
          
		  $this->load->model('customer_model');

          $data = $this->customer_model->get($arr['id']);

          $record = array();
          $record['invoice_billing_id'] = $data['cus_id'];
          $record['invoice_billing_name'] = $data['cus_name'];
          $record['invoice_billing_email'] = $data['cus_email'];
          $record['invoice_billing_phone'] = $data['cus_phone'];
          $record['invoice_billing_address'] = $data['cus_address'];
          $record['invoice_billing_address2'] = $data['cus_address2'];

          $this->mr = array_merge($this->mr,$record);

        }

        if($this->session->flashdata('record'))
		{
  	        $this->mr = array_merge($this->mr,$this->session->flashdata('record'));    
        }

        if($this->session->flashdata('error'))
		{
  	         $this->mr = array_merge($this->mr,$this->session->flashdata('error'));
        }
        
	}

	function check_invoice()
	{
		//check valid billing -shipping
		$this->load->library('validation');
		
		$this->load->view('checkout/bill_validation.php', '', FALSE); // field validation
		
		$is_valid = $this->validation->run();
		
		$record = array(
		
			'invoice_billing_name' => $this->validation->txt_billname,
		  	'invoice_billing_company' => $this->validation->txt_billcompany,
			'invoice_billing_email' => $this->validation->txt_billemail,
		    'invoice_billing_phone' => $this->validation->txt_billphone,
		    'invoice_billing_address' => $this->validation->txt_billaddress,
		    'invoice_billing_address2' => $this->validation->txt_billaddress2,
		
		    //shipping
		    'invoice_shipping_name' => $this->validation->txt_shippname,
		  	'invoice_shipping_company' => $this->validation->txt_shippcompany,
			'invoice_shipping_email' => $this->validation->txt_shippemail,
		    'invoice_shipping_address' => $this->validation->txt_shippaddress,
		    'invoice_shipping_address2' => $this->validation->txt_shippaddress2,
		    'invoice_shipping_phone' => $this->validation->txt_shippphone,
		
		    //invoice
		    'invoice_comment' => $this->validation->txt_comment,
		);
		
		//save record session
		$this->session->set_flashdata('record',$record);
		
		if ($is_valid == FALSE ) {
		
			//$error['frm_error'] =  $this->validation->error_string;
		    //bill
		    $error['txt_billname_error'] =  $this->validation->txt_billname_error;
		    $error['txt_billemail_error'] =  $this->validation->txt_billemail_error;
		    $error['txt_billphone_error'] =  $this->validation->txt_billphone_error;
		    $error['txt_billaddress_error'] =  $this->validation->txt_billaddress_error;
		
		    //shipp
		    $error['txt_shippname_error'] =  $this->validation->txt_shippname_error;
		    $error['txt_shippemail_error'] =  $this->validation->txt_shippemail_error;
		    $error['txt_shippphone_error'] =  $this->validation->txt_shippphone_error;
		    $error['txt_shippaddress_error'] =  $this->validation->txt_shippaddress_error;
		
		    $this->session->set_flashdata('error',$error);
		
		    redirect('checkout','refresh');
		
			die();
		
		}
		
		redirect('checkout/preview','refresh');
		
		die();

	}

    function preview()
    {
        $this->mysmarty->assign('tpl_center','checkout/preview.tpl');
        
        //get invoice info
		$this->session->keep_flashdata('record');
		
		$record = $this->session->flashdata('record');
		 
		$this->mr = array_merge($this->mr,$record);
		
		//get cart
		$sp_cart = $this->session->userdata('sp_cart');
		
		$this->xcart->set_cart($sp_cart);
		
		$this->mlist = $this->xcart->showlist();
		
		for($i = 0; $i < count($this->mlist); $i++)
		{
			
			$this->mlist[$i]['item_price'] = format_currency($this->mlist[$i]['item_price'],$this->site['site_currency']);
			
			$this->mlist[$i]['item_amount'] = format_currency($this->mlist[$i]['item_amount'],$this->site['site_currency']);
			
		}
		$this->mlist[0]['total_amount'] = format_currency($this->mlist[0]['total_amount'],$this->site['site_currency']);


    }

    function  save_invoice()
    {
        $record = $this->session->flashdata('record');

        //load invoice
        $this->load->model('invoice_model');

        //load cart
        $sp_cart = $this->session->userdata('sp_cart');

        $this->xcart->set_cart($sp_cart);

        $lst_invdtl = $this->xcart->showlist();

        //insert invoice
      	if($this->login_model->is_login(1)){
            $arr = $this->login_model->get_login(1);
        	$record['invoice_billing_id'] = $arr['id'];
        }

        $record['invoice_date'] =  time(); 
        $record['invoice_currency'] = $this->site['site_currency'];
        $record['invoice_subtotal'] =  $lst_invdtl[0]['total_amount'];
        $record['invoice_shipping'] = 0;
        $record['invoice_total'] =  $record['invoice_subtotal'] + $record['invoice_shipping'];

        $invoice_id = $this->invoice_model->insert($record);

        //insert invoice_detail
        if($invoice_id)
        {
	        for($i = 0; $i < count($lst_invdtl); $i++){
	
	            $dt_record = array();
	            $dt_record['invdt_invoice_id'] = $invoice_id;
	            $dt_record['invdt_item_id'] = $lst_invdtl[$i]['item_id'];
	            $dt_record['invdt_item_name'] = $lst_invdtl[$i]['item_name'];
	            $dt_record['invdt_item_qty'] = $lst_invdtl[$i]['item_qty'];
	            $dt_record['invdt_item_price'] = $lst_invdtl[$i]['item_price'];
	
	            $this->invoice_model->insert_detail($dt_record);
	
	        }
	        //unset cart
	        $this->session->unset_userdata('sp_cart');
	        
	        redirect('message/thanks_invoice','refresh');
	
	        die();
		}
		else
		{
			redirect('checkout','refresh');
	
	        die();
		}
		
        

    }

}
?>