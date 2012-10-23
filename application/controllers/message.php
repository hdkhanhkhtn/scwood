<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message extends Controller 
{
	
	var $mr;
	var $site;
	
	function Message()
	{
		parent::Controller();	
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		$this->mysmarty->view('client/index');
	}
	
	function thanks_contact()
	{
		$this->mr['title'] = 'Thanks';		
		$this->mysmarty->assign('tpl_center','contact/thanks.tpl');	
	}
}
?>