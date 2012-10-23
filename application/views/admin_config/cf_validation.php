<?php
		$rules['txt_short_date'] = 'required|trim';
        $rules['txt_long_date'] = 'required|trim';
		$rules['txt_time_zone'] = 'required|trim|callback_valid_gtm';

		$rules['txt_num_line'] = 'required|numeric';
        $rules['txt_num_line2'] = 'required|numeric';
        $rules['rdo_lang'] = 'required';
        $rules['rdo_lang_admin'] = 'required';



		$this->validation->set_rules($rules);
		
		$fields['txt_short_date'] = 'Format date';
        $fields['txt_long_date'] = 'Format date';
		$fields['txt_time_zone'] = 'Time zone';
		$fields['txt_num_line'] = 'Number line';
        $fields['txt_num_line2'] = 'Number line';
        $fields['rdo_lang'] = 'Language';
        $fields['rdo_lang_admin'] = 'Language';


		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br /> * ', '');
		
?>