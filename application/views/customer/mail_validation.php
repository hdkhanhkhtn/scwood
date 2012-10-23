<?php
		$rules['txt_email1'] = 'trim|max_length[100]|valid_email|callback_valid_hasemail1';
        $rules['txt_email2'] = 'trim|max_length[100]|valid_email|callback_valid_hasemail2';
        $rules['txt_email3'] = 'trim|max_length[100]|valid_email|callback_valid_hasemail3';
        $rules['txt_email4'] = 'trim|max_length[100]|valid_email|callback_valid_hasemail4';
        $rules['txt_email5'] = 'trim|max_length[100]|valid_email|callback_valid_hasemail5';
        
		$this->validation->set_rules($rules);
		
		$fields['txt_email1'] = 'Email 1';
        $fields['txt_email2'] = 'Email 2';
        $fields['txt_email3'] = 'Email 3';
        $fields['txt_email4'] = 'Email 4';
        $fields['txt_email5'] = 'Email 5';
        
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />* ', '');
		
?>