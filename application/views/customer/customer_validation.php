<?php
		$rules['r5b1'] = 'trim|required|max_length[100]|';
        
		$this->validation->set_rules($rules);
		
		$fields['r5b1'] = 'Street';
        
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />* ', '');
		
?>