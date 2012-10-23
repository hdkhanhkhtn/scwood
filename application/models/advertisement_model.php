<?php
class advertisement_model extends Model {
	
	var $tbl_name = "advertisement";
	var $tbl_id ="adv_id";
	
    function advertisement_model()
    {
        parent::Model();
    }
	
	function get($id = '',$data = '')
	{
		 $this->db->select('*');
 		 $this->db->from($this->tbl_name);
		 
		 if(!$id){
			// Get all
			$this->db->order_by($this->tbl_id, "desc"); 
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
	
	function get_random($pos)
	{
		//1: left ; 2: right; 3: top; 4:bottom;
	
		$this->db->select('*');
		$this->db->limit(1);
		$this->db->where('adv_position',$pos);
		$this->db->where('adv_active',1);
		$this->db->from($this->tbl_name);
		$this->db->order_by('adv_id','random');
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			// Got some rows, return as assoc array
			return $query->result_array();
		} else {
			// No rows
			return false;
		}
	}
	

	
}
?>