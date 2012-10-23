<?php
		$rules['name'] = 'trim|required|callback_valid_user';	
		$rules['txt_pass'] = 'trim|required|min_length[6]|md5|callback_valid_password';
		$rules['license'] = 'trim';
		$rules['note'] = 'trim';
		
        
		$this->validation->set_rules($rules);
		
		$fields['txt_pass'] = 'Password';
		$fields['name'] = 'Name';
		$fields['license'] = 'License';
		$fields['note'] = 'Note';
		
        
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('* ', '<br />');
		
?>