<?php
		
		$rules['txt_name'] = 'trim|required';
		$rules['txt_url'] = 'trim|required';
		
		$rules['txt_begin'] = 'trim';
		$rules['txt_expired'] = 'trim';
		
		$rules['sel_position'] = 'trim';
		$rules['sel_open'] = 'trim';
		$rules['sel_active'] = 'trim';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_name'] = $this->lang->line('lbl_question');
		$fields['txt_url'] = $this->lang->line('lbl_answer');
		
		$fields['txt_begin'] = $this->lang->line('lbl_begin_date');
		$fields['txt_expired'] = $this->lang->line('lbl_exp_date');
		
		$fields['sel_position'] = $this->lang->line('lbl_position');
		$fields['sel_open'] = $this->lang->line('lbl_open');
		$fields['sel_active'] = $this->lang->line('lbl_active');
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
		
?>