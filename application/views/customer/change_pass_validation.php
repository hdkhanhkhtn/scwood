<?php
		$rules['txt_old_pass'] = 'trim|required|min_length[6]|callback_valid_userpass|md5';
        $rules['txt_new_pass'] = 'trim|required|min_length[6]|md5';	
		$rules['txt_con_pass'] = 'trim|required|min_length[6]|md5|matches[txt_new_pass]';
        
		$this->validation->set_rules($rules);
		
		$fields['txt_old_pass'] = 'Old password';
		$fields['txt_new_pass'] = 'New password';
		$fields['txt_con_pass'] = 'Confirm password';
        
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('* ', '<br />');
		
?>