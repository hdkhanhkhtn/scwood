<?php
	

		$rules['txt_name'] = 'trim|required|max_length[100]|htmlentities';
		$rules['txt_email'] = 'trim|max_length[100]|valid_email';

		$this->validation->set_rules($rules);
		

		$fields['txt_name'] = $this->lang->line('lbl_name');
		$fields['txt_email'] = $this->lang->line('lbl_email');
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />', '');
	
		
?>