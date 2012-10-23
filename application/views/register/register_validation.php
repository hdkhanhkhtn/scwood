<?php

		$rules['txt_username'] = 'trim|required|max_length[100]|callback_valid_hasuser';
		$rules['txt_name'] = 'trim|required|max_length[100]';
		$rules['txt_email'] = 'trim|required|max_length[100]|valid_email|callback_valid_hasemail';
        $rules['txt_phone'] = 'trim|xss_clean';
        $rules['txt_address'] = 'trim|required|';
        $rules['txt_company'] = 'trim|required|max_length[100]';
		$rules['txt_city'] = 'trim|required|max_length[100]';
        $rules['txt_state'] = 'trim|required|';
        $rules['txt_zip'] = 'trim|required|';
        $rules['txt_fax'] = 'trim|xss_clean';
		$rules['txt_license'] = 'trim|required|max_length[100]';
        $rules['txt_pemit'] = 'trim';
		$rules['txt_note'] = 'trim';
		
		$this->validation->set_rules($rules);
		
		
		$fields['txt_username'] = 'User name';
		$fields['txt_name'] = 'Name';
		$fields['txt_email'] = 'Email';
        $fields['txt_phone'] = 'Phone';
        $fields['txt_address'] = 'Adderss';
        $fields['txt_company'] = 'Company';
        $fields['txt_city'] = 'City';
		$fields['txt_state'] = 'State';
        $fields['txt_zip'] = 'Zip';
        $fields['txt_fax'] = 'Fax';
        $fields['txt_license'] = 'License';
        $fields['txt_pemit'] = 'Pemit';
		$fields['txt_note'] = 'Note';

      	//$rules['txt_random'] = 'required|trim|numeric|callback_check_security_code';
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('* ', '<br />');
		

?>