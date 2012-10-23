<?php
		$rules['txt_amount1'] = 'trim|numeric';
		$rules['txt_amount2'] = 'trim|numeric';
		$rules['txt_amount3'] = 'trim|numeric';
		$rules['txt_amount4'] = 'trim|numeric';
		$rules['txt_amount5'] = 'trim|numeric';
		$rules['txt_amount6'] = 'trim|numeric';
		$rules['txt_amount7'] = 'trim|numeric';
		$rules['txt_amount8'] = 'trim|numeric';
		$rules['txt_amount9'] = 'trim|numeric';
		$rules['txt_amount10'] = 'trim|numeric';
		
		$rules['txt_des1'] = 'trim';
		$rules['txt_des2'] = 'trim';
		$rules['txt_des3'] = 'trim';
		$rules['txt_des4'] = 'trim';
		$rules['txt_des5'] = 'trim';
		$rules['txt_des6'] = 'trim';
		$rules['txt_des7'] = 'trim';
		$rules['txt_des8'] = 'trim';
		$rules['txt_des9'] = 'trim';
		$rules['txt_des10'] = 'trim';
		
        
		$this->validation->set_rules($rules);
		
		$fields['txt_amount1'] = 'Amount 1';
		$fields['txt_amount2'] = 'Amount 2';
		$fields['txt_amount3'] = 'Amount 3';
		$fields['txt_amount4'] = 'Amount 4';
		$fields['txt_amount5'] = 'Amount 5';
		$fields['txt_amount6'] = 'Amount 6';
		$fields['txt_amount7'] = 'Amount 7';
		$fields['txt_amount8'] = 'Amount 8';
		$fields['txt_amount9'] = 'Amount 9';
		$fields['txt_amount10'] = 'Amount 10';
		
		$fields['txt_des1'] = 'Desc';
		$fields['txt_des2'] = 'Desc';
		$fields['txt_des3'] = 'Desc';
		$fields['txt_des4'] = 'Desc';
		$fields['txt_des5'] = 'Desc';
		$fields['txt_des6'] = 'Desc';
		$fields['txt_des7'] = 'Desc';
		$fields['txt_des8'] = 'Desc';
		$fields['txt_des9'] = 'Desc';
		$fields['txt_des10'] = 'Desc';
		
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('* ', '<br />');
		
?>