<?php
class item_model extends Model {
	
	var $tbl_name = "item";
	var $tbl_id ="item_id";
	
    function item_model()
    {
        parent::Model();
    }
	
	function get_recommend($catid,$id)
	{
		//get top 5
		
		$this->db->select('*');
		$this->db->limit(3);
		
		$this->db->where('item_cat_id',$catid);
		$this->db->where($this->tbl_id.' != ',$id);
		
		$this->db->from($this->tbl_name);
		$this->db->order_by('item_id','random');
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			// Got some rows, return as assoc array
			return $query->result_array();
		} else {
			// No rows
			return false;
		}
	}
	
	function get($id = '',$data = '')
	{
		 $this->db->select('*');
 		 $this->db->from($this->tbl_name);
		 
		 if(!$id){
			// Get all 
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
	
	function show_brand_cat()
	{
		// Get all
		$this->db->select('*');
 		$this->db->from($this->tbl_name);
 		 
		$this->db->order_by($this->tbl_id, "desc"); 
		
		$this->db->join('brand', 'brand_id = item_brand_id', 'left');
		$this->db->join('category', 'category_id = item_cat_id', 'left');
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			// Got some rows, return as assoc array
			return $query->result_array();
		} else {
			// No rows
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
	

}
?>