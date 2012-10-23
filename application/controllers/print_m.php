<?php

class Print_m extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $hd_id;

	function Print_m()
	{
		parent::Controller();
		$this->load->model('sendmail_model');
		$this->load->model('report_model');
		if (!$this->login_model->is_login(1)&&(!$this->login_model->is_login(2)))
		{
			redirect('login');
			die();
		}
	}
	
	function _output()
	{
		$this->mysmarty->assign('mr',$this->mr);
		
	}
	
	function mprint()
	{
		$par = $this->uri->uri_to_assoc(3);
		if ($par['id'])
		{	
			$this->db->where('report_id',$par['id']);
			$this->db->order_by("date", "desc");
			$result = $this->sendmail_model->get();
			for ($i=0;$i<count($result);$i++)
			{
				$result[$i]['date'] = format_intdate($this->site['site_long_date'],$result[$i]['date']);
			}
			
			$this->mysmarty->assign('lst_report',$result);		
			$this->mr = $this->report_model->get($par['id']);
			
			$src = '<table cellpadding="0" cellspacing="0" align="center" style="text-align: left; width: 180mm;backgound:#55DD44"><tr><td style="text-align: left; width: 30mm;border: solid 1px #55DD44"><img src="'.$this->site['theme_url'].'pics/greatseal.gif" style="height: 30mm"/></td><td style="text-align: center; width: 150mm;border: solid 1px #55DD44"><h1>MAIL HISTORY</h1><br>VA/HUD/FHA CASE'.$this->mr['1a'].'</td></tr><tr><td></td><td></td></tr></table><br /><table cellpadding="0" cellspacing="0" align="center" style="text-align: left; width: 180mm;backgound:#55DD44"><tr><td style="text-align: left; width: 50mm;border: solid 1px #55DD44;background:#CCCCCC">Email address</td><td style="text-align: left; width: 50mm;border: solid 1px #55DD44;background:#CCCCCC">Date - Time send mail</td></tr>';
			for ($i=0;$i<count($result);$i++)
			{
				$src .='<tr><td style="text-align: left; width: 50mm;border: solid 1px #55DD44">'.$result[$i]['email'].'</td><td style="text-align: left; width: 100mm;border: solid 1px #55DD44">'.$result[$i]['date'].'</td></tr>';
			}
			$src .='</table>';
			$this->load->library(html2pdf);
			$this->html2pdf->HTML2PDF('P','A4','en', array(10, 10, 10, 10));
			$this->html2pdf->WriteHTML($src,isset($_GET['vuehtml']));
			$this->html2pdf->Output('about.pdf');
		}	
	}
}