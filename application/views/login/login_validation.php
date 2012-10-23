<?php
		$rules['txt_username'] = 'trim|required|max_length[50]|callback_valid_userpass';
		$rules['txt_pass'] = 'trim|max_length[50]';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_username'] = $this->lang->line('lbl_username');
		$fields['txt_pass'] = $this->lang->line('lbl_pass');
	
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('* ', '<br />');
		
?>