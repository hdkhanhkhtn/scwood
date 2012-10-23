<?php
		$rules['txt_name'] = 'trim|required|max_length[200]';
		$rules['txt_desc'] = 'trim';
		$rules['txt_order'] = 'numeric';
		$rules['sel_status'] = 'max_length[5]';
		
		$this->validation->set_rules($rules);
		
		$fields['txt_name'] = $this->lang->line('lbl_title');
		$fields['txt_desc'] = $this->lang->line('lbl_body');
		$fields['txt_order'] = $this->lang->line('lbl_order');
		$fields['sel_status'] = $this->lang->line('lbl_status');
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
?>