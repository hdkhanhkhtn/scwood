<?php
	
		$rules['txt_name'] = 'trim|required';
		$rules['txt_link'] = 'trim|required';
		$rules['txt_order'] = 'numeric';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_name'] = $this->lang->line('lbl_name');
		$fields['txt_link'] = $this->lang->line('lbl_link');
		$fields['txt_order'] = $this->lang->line('lbl_order');
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
		
?>