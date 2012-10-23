<?php
		
		$rules = array();
		$rules['txt_billname'] = 'trim|required|max_length[100]|htmlentities';
		$rules['txt_billemail'] = 'trim|required|max_length[100]|valid_email';
        $rules['txt_billphone'] = 'required|numeric';
        $rules['txt_billcompany'] = 'trim|htmlentities';
        $rules['txt_billaddress'] = 'trim|required|htmlentities';
        $rules['txt_billaddress2'] = 'trim|htmlentities';

        $rules['txt_shippname'] = 'trim|required|max_length[100]|htmlentities';
		$rules['txt_shippemail'] = 'trim|required|max_length[100]|valid_email';
        $rules['txt_shippphone'] = 'required|numeric';
        $rules['txt_shippcompany'] = 'trim|htmlentities';
        $rules['txt_shippaddress'] = 'trim|required|htmlentities';
        $rules['txt_shippaddress2'] = 'trim|htmlentities';

        //invoice
        $rules['txt_comment'] = 'trim|htmlentities';
        //

		$this->validation->set_rules($rules);

		$fields = array();
		$fields['txt_billname'] = $this->lang->line('lbl_name');
        $fields['txt_billcompany'] = $this->lang->line('lbl_company');
		$fields['txt_billemail'] = $this->lang->line('lbl_email');
        $fields['txt_billaddress'] = $this->lang->line('lbl_address');
        $fields['txt_billaddress2'] = $this->lang->line('lbl_address');
        $fields['txt_billphone'] = $this->lang->line('lbl_phone');

        $fields['txt_shippname'] = $this->lang->line('lbl_name');
        $fields['txt_shippcompany'] = $this->lang->line('lbl_company');
		$fields['txt_shippemail'] = $this->lang->line('lbl_email');
        $fields['txt_shippaddress'] = $this->lang->line('lbl_address');
        $fields['txt_shippaddress2'] = $this->lang->line('lbl_address');
        $fields['txt_shippphone'] = $this->lang->line('lbl_phone');

        //invoice
        $fields['txt_comment'] = $this->lang->line('lbl_invoice_comment');
        //

		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />* ', '');


?>