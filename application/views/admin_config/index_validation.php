<?php
		$rules['txt_name'] = 'required';
		$rules['txt_slogan'] = 'trim';
        $rules['txt_phone'] = 'trim';
        $rules['txt_fax'] = 'trim';
        $rules['txt_email'] = 'trim|valid_email';
        $rules['txt_bankacc'] = 'trim';

        $rules['txt_title'] = 'trim';
        $rules['txt_keyword'] = 'trim';
        $rules['txt_footer'] = 'trim';
		
		$this->validation->set_rules($rules);

		$fields['txt_name'] = 'Name site';
		$fields['txt_slogan'] = 'Slogan';
        $fields['txt_phone'] = 'Phone';
        $fields['txt_fax'] = 'Fax';
        $fields['txt_email'] = 'Email';
        $fields['txt_bankacc'] = 'Bank Account';
        $fields['txt_title'] = 'Title';
        $fields['txt_keyword'] = 'keyword';
        $fields['txt_footer'] = 'Footer';

		$this->validation->set_fields($fields);
		
		$this->validation->set_error_delimiters('<br /> * ', '');
		
?>