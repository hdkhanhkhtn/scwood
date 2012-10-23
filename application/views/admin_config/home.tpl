<form action="{$site.base_url}admin_config/home_sm" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td width="200"class="text_tt">Home</td>
    <td align="right"><input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1" /> 
    <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1" /></td>
  </tr>
</table>

<br />

{$mr.str_msg}

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

    <tr>
    <td class="error">{$mr.frm_error}&nbsp;</td>
    </tr>
    <tr>
    <td><textarea name="txt_content" cols="60" rows="10" id="txt_content" style="width:700px;height:600px" >{$mr.content}</textarea></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>

</table>
 </form>
 
{literal}
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}uploads/fckeditor/fckeditor.js"></script>
<script language="javascript" >
	var oFCKeditor = new FCKeditor('txt_content');
	oFCKeditor.BasePath	= '{/literal}{$site.base_url}{literal}uploads/fckeditor/' ;
	oFCKeditor.ReplaceTextarea() ;
</script>
{/literal}