<?php
class paging_model extends Model {

    function paging_model()
    {
        parent::Model();
    }

	function limit($page,$per_page,$total_rows,$base_url)
    {

		if(!$total_rows) return false;
		
		$this->load->library('pagination');
		
		$config['base_url'] = $this->config->site_url().$base_url;
		
		$config['total_rows'] = $total_rows;
		
		$config['per_page'] = $per_page;
		
		$config['num_links'] = 10;
		
		$config['cur_page'] = $page;
		
		$config['num_tag_open'] = "";
		
		$config['num_tag_close'] = "";
		
		$config['cur_tag_open'] = "&nbsp<span class='current'>";

		$config['cur_tag_close'] = "</span>";
		
		$config['num_tag_open'] = "&nbsp<span class='number'>";

		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		
		$this->mr['str_paging'] = $this->pagination->create_links();
		
		//
		
		$this->mr['str_paging'] .= ' Page: ('.(ceil($page/$per_page)+1).'/'.ceil($total_rows/$per_page).') ';
		
		$this->mr['str_paging'] .= ', Total rows: '.$total_rows;
		
		$this->db->limit($config['per_page'],$config['cur_page']);
		
    }

	
}
?>