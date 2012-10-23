<?php
		$rules['txt_email'] = 'trim|required|max_length[100]|valid_email|callback_valid_hasemail';
	
		$this->validation->set_rules($rules);
		
		$fields['txt_email'] = $this->lang->line('lbl_email');
	
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />* ', '');
		
?>