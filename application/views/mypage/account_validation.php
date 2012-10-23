<?php
	
		$rules['txt_cus_license']='trim|required|max_length[20]';
		$rules['txt_cus_pemit']='trim|required|max_length[20]';
		$rules['txt_name'] = 'trim|required|max_length[100]';
		$rules['txt_email'] = 'trim|max_length[100]|valid_email';
		$rules['txt_address'] = 'trim|required|max_length[100]';
        $rules['txt_phone'] = 'trim|xss_clean';
        $rules['txt_city'] = 'trim|xss_clean';
        $rules['txt_state'] = 'trim|xss_clean';
        $rules['txt_zip'] = 'trim|xss_clean';
        $rules['txt_fax'] = 'trim|xss_clean';
        $rules['txt_note'] = 'trim|xss_clean';
        $rules['txt_startnumber'] = 'trim|xss_clean';
		$rules['txt_invoice_number'] = 'trim|xss_clean';
		
		$this->validation->set_rules($rules);
	
		$fields['txt_cus_license'] = $this->lang->line('lbl_license');
		$fields['txt_cus_pemit'] = $this->lang->line('lbl_pemit');
		$fields['txt_name'] = $this->lang->line('lbl_name');
		$fields['txt_email'] = $this->lang->line('lbl_email');
        $fields['txt_address'] = $this->lang->line('lbl_address');
        $fields['txt_phone'] = $this->lang->line('lbl_phone');
        $fields['txt_city'] = $this->lang->line('lbl_city');
        $fields['txt_state'] = $this->lang->line('lbl_state');
        $fields['txt_zip'] = $this->lang->line('lbl_zip');
        $fields['txt_fax'] = $this->lang->line('lbl_fax');
        $fields['txt_note'] = $this->lang->line('lbl_note');
 		$fields['txt_startnumber'] = 'Number';
		$fields['txt_invoice_number']= 'Invoice';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('* ', '<br />');

		
?>