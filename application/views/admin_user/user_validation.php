<?php
	
		$rules['txt_username'] = 'trim|required|max_length[50]|htmlentities';
		$rules['txt_pass'] = 'trim|min_length[6]|max_length[50]|htmlentities';
		$rules['txt_name'] = 'trim|required|max_length[50]|htmlentities';
		$rules['txt_email'] = 'trim|max_length[50]|valid_email';

		$this->validation->set_rules($rules);
		
		$fields['txt_username'] = $this->lang->line('lbl_username');
		$fields['txt_pass'] = $this->lang->line('lbl_pass');
		$fields['txt_name'] = $this->lang->line('lbl_name');
		$fields['txt_email'] = $this->lang->line('lbl_email');
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />* ', '');
	
		
?>