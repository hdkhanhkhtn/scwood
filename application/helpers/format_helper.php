<?php

	function get_str_limit($width,$max,$str)
	{
		$count_character = 0;
		$str_return = '';
		$line = 0;
		$tmp = explode('<br />',nl2br($str));
		// 1 line
		
		if (strlen($tmp[0])>=$max)
		{
			return substr($tmp[0],0,$max).'...(See attachm%e@n#t$)';
		}
			
		for ($i=0;$i<count($tmp);$i++)
		{
			if($count_character > $max) 
			{	
				
				if(substr($str_return,strlen($str_return)-11,strlen($str_return))!='chm%e@n#t$)')
					$str_return .='...(See attachm%e@n#t$)';
				break;
			}
			$strlen_line = strlen($tmp[$i]);
			
			if($strlen_line < $width)
			{
				$count_character += $width;
				if($count_character<=$max)
					$str_return .= $tmp[$i];
			} 
			else
			{	
				$len_limit = $max - $count_character;
				
				
				if(strlen($tmp[$i]) > $len_limit)
				{
					$str_return .= substr($tmp[$i],0,$len_limit).'...(See attachm%e@n#t$)';
					return $str_return;
				}
				else
				{
					
					$str_return .= $tmp[$i];
					$line = (int)(strlen($tmp[$i])/$width);
					
					//$count_character = strlen($tmp[$i]);
					if ($line<=1)
						$count_character += $width;
					else
					{
						$count_character += $line*$width;
					}
					if ( $count_character = $max)
					{
						if (isset($tmp[$i+1]))
							$str_return .='...(See attachm%e@n#t$)';
						return $str_return;
					}
					//$count_character += strlen($tmp[$i]);
				}
			}  

					
		} // for
		return $str_return;
	}

	//format currency
	function format_currency($val=0, $site_lang=1)
	{
		$f ='';
		
		if($val === FALSE) return false;
		
		if ($val<0)
		{
			$val = abs($val);
			$f = "- ";
		}
		
		if($site_lang == 1){
			//format English
			return $f.'$'.number_format($val,2,".",",");
		
		}elseif($site_lang == 2){
			//format korean
			return number_format($val,0,".",",") . '&#50896;';
		}else{
		
			return $val;
		}	
	}

	function format_intdate($str_format,$int_date)
	{
		if(!$int_date) return false;
		return date($str_format,$int_date);
		
	}
	
	function get_strdate($str_date,$str_format = 'Y/m/d',$str_sep='/')
	{
		
		if(!$str_date) return false;
		
		$arr = explode($str_sep, $str_date);
			
		switch($str_format)
		{
			case 'Y/m/d':	list($y,$m,$d) = $arr;break;
			
			case 'm/d/Y':	list($m,$d,$y) = $arr;break;
			
			case 'd/m/Y':	list($d,$m,$y) = $arr;break;
							
		}		
		return mktime(0,0,0,$m,$d,$y);

	}
	
	function set_message($str_msg,$type=1)
	{
		if($type == 1)//success
		{
			return $str_msg = "<p class='success_msg'>".$str_msg."</p>";
		}
		elseif($type==2){//warn
		
			return $str_msg = "<p class='warn_msg'>".$str_msg."</p>";
		}
	}
	
	
	
?>