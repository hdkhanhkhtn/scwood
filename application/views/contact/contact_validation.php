<?php
		$rules['txt_name'] = 'trim|required';
		$rules['txt_email'] = 'trim|required|valid_email';
		$rules['txt_phone'] = 'trim';
		$rules['txt_subject'] = 'trim|required|max_length[100]';
		$rules['txt_content'] = 'trim|required';
		$rules['txt_random'] = 'required|numeric|callback_check_security_code';


		
		$this->validation->set_rules($rules);
		
		$fields['txt_name'] = $this->lang->line('lbl_name');
		$fields['txt_email'] = $this->lang->line('lbl_email');
		$fields['txt_phone'] = $this->lang->line('lbl_phone');
		$fields['txt_subject'] = $this->lang->line('lbl_subject');
		$fields['txt_content'] = $this->lang->line('lbl_content');
		$fields['txt_random'] = $this->lang->line('lbl_security');

		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
?>