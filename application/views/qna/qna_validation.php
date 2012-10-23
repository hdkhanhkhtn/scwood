<?php
		$rules['txt_name'] = 'trim|required';
		$rules['txt_email'] = 'trim|required|max_length[100]|valid_email';
		$rules['txt_question'] = 'trim|required|max_length[300]';
				
		$this->validation->set_rules($rules);
		
		$fields['txt_name'] = $this->lang->line('lbl_name');
		$fields['txt_email'] = $this->lang->line('lbl_email');
		$fields['txt_question'] = $this->lang->line('lbl_question');
	
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
?>