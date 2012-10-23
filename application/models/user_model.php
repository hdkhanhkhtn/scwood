<?php
class user_model extends Model 
{
	var $tbl_name = "user";
	var $tbl_id ="user_id";
	
    function user_model()
    {
        parent::Model();
        
    }
	
	function get($id = '',$data = '')
	{
		 $this->db->select('*');
 		 $this->db->from($this->tbl_name);
		 
		 if(!$id){
			// Get all
			$this->db->order_by("user_name", "asc"); 
			if($data) $this->db->where($data);
			
			$query = $this->db->get();

			if($query->num_rows() > 0){
				// Got some rows, return as assoc array
				return $query->result_array();
			} else {
				// No rows
				return false;
			}
			
		 }else{ 
		 	//get id row
			$this->db->where($this->tbl_id, $id);
			$this->db->limit('1');
			$query = $this->db->get();
			
			if( $query->num_rows() == 1 ){
				// One row, match!
				return $query->row_array();
			} else {
				// None
				return false;
			} 
			
		 }
		 
	}
	
	function getfromfield($wh,$field)
	{
		//get id row
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$this->db->where($field, $wh);
		$this->db->limit('1');

		$query = $this->db->get();

		if( $query->num_rows() == 1 ){
			// One row, match!
			return $query->row_array();
		} else {
			// None
			return false;
		}
	}
	
	function insert($data)
	{
	
		$result = $this->db->insert($this->tbl_name,$data);
		
		if($result)
			return $id = $this->db->insert_id();
		else
			return false; 
	}
	
	function update($id, $data)
	{
		
		if(is_array($id)){
			$this->db->where_in($this->tbl_id, $id);
		}else{
			$this->db->where($this->tbl_id, $id);
		}
		
		$result = $this->db->update($this->tbl_name, $data);
		
		// Return
		if($result){
			return $id;
		} else {
			return false;
		}
  
	}
	
	function delete($id)
	{
		if(is_array($id)){
			$this->db->where_in($this->tbl_id, $id);
		}else{
			$this->db->where($this->tbl_id, $id);
		}
		$this->db->delete($this->tbl_name); 
		
		if ($this->db->affected_rows() !== 1) {
			return FALSE;		
		} else {
			return $id;
		}
			
	}
	
	function count_result()
	{
		return $this->db->count_all_results($this->tbl_name);
	
	}
	
	function password_reset($email, $random_passkey)
	{
		$this->db->where('user_email', $email);
		
		$this->db->where('user_active','1');
		 
		$this->db->set('user_pass', md5($random_passkey));
		
		$this->db->update($this->tbl_name);
		
		if ($this->db->affected_rows() != 0) {
			
			//get id row
			$this->db->select('*');
			$this->db->where('user_email', $email);
			$this->db->from($this->tbl_name);
			$this->db->limit('1');
			
			$query = $this->db->get();
			
			if( $query->num_rows() == 1 ){
				// One row, match!
				return $query->row_array();
			}	
			
		} 
		
		return FALSE;
		
	}

}
?>