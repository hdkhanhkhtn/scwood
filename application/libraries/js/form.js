// JavaScript Document

function checkedAll (checked) {
	
	if(checked == true) checked = false;
	else checked = true;
	
	if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('frmlist').elements.length; i++) {
		document.getElementById('frmlist').elements[i].checked = checked;
	}
}

function sm_frm(frm,action,strcf){
 
	fchk = 1;
	strdo = document.getElementById('sel_action').value;
	
	if(strdo == 'delete')
	{
		if(confirm(strcf) == false){
		  fchk = 0;
		}  
	}
	
	if(fchk == 1){
	  frm.action = action;
	  frm.submit();
	}
  
}

function set_default_focus(id_ele)
{
	document.getElementById(id_ele).focus();
	
}