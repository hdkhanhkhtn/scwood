<?php
	
		$rules['txt_question'] = 'trim|required';
		$rules['txt_answer'] = 'trim|required';
		$rules['txt_order'] = 'numeric';
		$rules['sel_status'] = 'max_length[5]';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_question'] = $this->lang->line('lbl_question');
		$fields['txt_answer'] = $this->lang->line('lbl_answer');
		$fields['txt_order'] = $this->lang->line('lbl_order');
		$fields['sel_status'] = $this->lang->line('lbl_status');
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
		
?>