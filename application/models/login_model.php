<?php
class login_model extends Model {
	
	var $obj;
	
    function login_model()
    {
       	parent::Model();
	
    }
    
    function get_obj($obj){
		
		if($obj == 1)	$this->obj = 'sess_customer';
		elseif($obj == 2)	$this->obj = 'sess_user';
		
	}

	function is_login($obj = 1){
		
		$this->get_obj($obj);
	
		if ($this->native_session->userdata($this->obj)) {
			return TRUE;
		} else {
			return FALSE;
		}
			
		
	}
	
	function get_login($obj = 1)
	{
		
		$this->get_obj($obj);
		
		if ($this->native_session->userdata($this->obj)) {
			return $this->native_session->userdata($this->obj);
		}
		
		return false;
	}
	
	function set_login($obj = 1, $val){
		
		$this->get_obj($obj);
		
		$this->native_session->set_userdata($this->obj,$val);
		
	}
	
	function unset_login($obj=1){
		
		$this->get_obj($obj);
		
		$this->native_session->unset_userdata($this->obj);
		
	}

}
?>