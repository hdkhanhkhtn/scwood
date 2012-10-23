<?php
class init_model extends Model {

    
    function init_model()
    {
        parent::Model();
		
		//get site information, config, language
		$query = $this->db->get('site');
		$rs_site = $query->row_array();
		$this->site = $rs_site;
		
		//save with session - when customer change language
		$this->native_session->set_userdata('client_lang',$rs_site['site_lang_client']);
		
		if(strpos($this->uri->segment(1),"admin")===false){
			$this->init_client();
			$this->site['theme_url'] = $this->config->item('base_url').'themes/'.$this->site['site_style'].'/';
			$this->mysmarty->assign('site',$this->site);
		}else{
			$this->init_admin();
		}

	}
	
	function init_client()
	{
		//load config
		$this->set_config($this->session->userdata('client_lang'));
		
		//set charset,theme,url after load config file
		$this->site['charset'] = $this->config->item('charset');
		$this->site['base_url'] = $this->config->item('base_url');
		$this->site['site_footer'] = nl2br($this->site['site_footer']);
		
		//load language
		$this->lang->load('site', $this->session->userdata('client_lang'));
		$this->lang->load('errormsg', $this->session->userdata('client_lang'));
		$this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load customer info if logined
		$this->mysmarty->assign('sess_cus',$this->login_model->get_login(1));
		
		
	}	
	
	function init_admin()
	{
		//load config
		$this->set_config($this->site['site_lang_admin']);
		
		//set charset,theme,url after load config file
		$this->site['charset'] = $this->config->item('charset');
		$this->site['theme_url'] = $this->config->item('base_url').'themes/admin/';
		$this->site['base_url'] = $this->config->item('base_url');
		$this->mysmarty->assign('site',$this->site);
		
		//load language
		$this->lang->load('errormsg', $this->site['site_lang_admin']);
		$this->lang->load('admin', $this->site['site_lang_admin']);
		$this->mysmarty->assign('lang',$this->lang->toArray());
		
		//load customer info if logined
		$this->mysmarty->assign('sess_user',$this->login_model->get_login(2));
		
		//
		if($this->uri->segment(1) != "admin_login")
		{	
			//check login
			if(!$this->login_model->is_login(2)){redirect('admin_login');die();}
		}
		
	}
	
	
	function set_config($str_lang)
	{
		
		switch($str_lang){			
			case 'korean':
				$this->config->load('config_korean');
				break;
				
			default:
				//'english'
		
		};
		
	}	

}
?>