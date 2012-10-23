<?php

        $rules['txt_pass'] = 'trim|required|md5|callback_valid_pass';
		$rules['txt_newpass'] = 'required|min_length[6]|max_length[30]|htmlentities|md5';
		$rules['txt_cfnewpass'] = 'required|md5|matches[txt_newpass]';

		$this->validation->set_rules($rules);

        $fields['txt_pass'] = $this->lang->line('lbl_pass');
		$fields['txt_newpass'] = $this->lang->line('lbl_newpass');
		$fields['txt_cfnewpass'] = $this->lang->line('lbl_cfpass');


		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<br />* ', '');

?>