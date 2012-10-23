<form action="{$site.base_url}admin_config/report_sm" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Report config</td>
     <td align="right"><input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1" /> 
    <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1" /></td>
  </tr>
</table>

<!--<br />

{$mr.str_msg}-->

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" id="tbl_frm" >

	<tr>
		<td class="error" colspan="3">{$mr.frm_error}&nbsp;</td>
	</tr>

  <!--<tr>
    <td colspan="3">1A. VA/HUD/FHA CASE#  : </td>
  </tr>
  <tr>
  <td><input type=text name="txt_1a" id="txt_1a" value="{$mr.report_1a}" size=34 ></td>
    <td><input type=text name="txt_1a1" id="txt_1a1" value="{$mr.report_1a1}" size=34 ></td>
    <td><input type=text name="txt_1a2" id="txt_1a2" value="{$mr.report_1a2}" size=34 ></td>
  </tr>
  <tr>
    <td colspan="3">1D. WDIIR # </td>
  </tr>
  <tr>
    <td><input name="txt_1d" type="text" size=34 id="txt_1d" value="{$mr.report_1d}" /></td>
     <td> <input name="txt_1d1" type="text" size=34 id="txt_1d1" value="{$mr.report_1d1}" /></td>
     <td> <input name="txt_1d2" type="text" size=34 id="txt_1d2" value="{$mr.report_1d2}" /></td>
  </tr>
  <tr>
    <td colspan="3">1E. TARF # : </td>
  </tr>
  <tr>
    <td><input name="txt_1e" type="text" id="txt_1e" value="{$mr.report_1e}" size="34" /></td>
    <td><input name="txt_1e1" type="text" id="txt_1e1" value="{$mr.report_1e1}" size="34" /></td>
    <td><input name="txt_1e2" type="text" id="txt_1e2" value="{$mr.report_1e2}" size="34" /></td>
  </tr>
  <tr>
    <td colspan="3">5A. NAME OF PROPERTY OWNER/SELLER : </td>
  </tr>
  <tr>
    <td><input name="txt_5a" type="text" id="txt_5a" value="{$mr.report_5a}" size="34" /></td>
    <td><input name="txt_5a1" type="text" id="txt_5a1" value="{$mr.report_5a1}" size="34" /></td>
    <td><input name="txt_5a2" type="text" id="txt_5a2" value="{$mr.report_5a2}" size="34" /></td>
  </tr>
  <tr>
    <td colspan="3">5B. PROPERTY ADDRESS (Street) :</td>
  </tr>
  <tr>
    <td><input name="txt_5b" type="text" id="txt_5b" value="{$mr.report_5b}" size="34" /></td>
    <td><input name="txt_5b1" type="text" id="txt_5b1" value="{$mr.report_5b1}" size="34" /></td>
    <td><input name="txt_5b2" type="text" id="txt_5b2" value="{$mr.report_5b2}" size="34" /></td>
  </tr>-->
  <tr>
    <td colspan="3" class="6a">6A. INSPECTED STRUCTURES : <input type="button" name="btnAdd6a" class="btnAdd6a" id="btnAdd6a" value="Add more" /></td>
  </tr>
  
  
  <tr>
  <td colspan="3">
  	<table class="tb_6a" id="tb_6a">
     {section name=i loop=$mr}
     {if ($mr[i].report_6a !="" or $mr[i].report_6a1!="" or $mr[i].report_6a2!="" )}
    	<tr id="6a">
          <td><textarea name="txt_6a[]" cols="30"   id="txt_6a[]" >{$mr[i].report_6a}</textarea></td>
          <td><textarea name="txt_6a1[]" cols="30"   id="txt_6a1[]" >{$mr[i].report_6a1}</textarea></td>
          <td><textarea name="txt_6a2[]" cols="30"   id="txt_6a2[]" >{$mr[i].report_6a2}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_6a[]" id="hd_old_6a" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
	<tr>
    <td colspan="3" class="6b">6B. LIST ALL UN-INSPECTED STRUCTURES : <input type="button" name="btnAdd6b" class="btnAdd6b" id="btnAdd6b" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
  <table class="tb_6b" id="tb_6b">
     {section name=i loop=$mr}
     {if ($mr[i].report_6b !="" or $mr[i].report_6b1!="" or $mr[i].report_6b2!="")}
    	<tr id="6b">
          <td><textarea name="txt_6b[]" cols="30"   id="txt_6b[]" >{$mr[i].report_6b}</textarea></td>
          <td><textarea name="txt_6b1[]" cols="30"   id="txt_6b1[]" >{$mr[i].report_6b1}</textarea></td>
          <td><textarea name="txt_6b2[]" cols="30"   id="txt_6b2[]" >{$mr[i].report_6b2}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_6b[]" id="hd_old_6b" />
      </tr>
      {/if}
  	 {/section}
    </table>
    <tr>
    <td colspan="3" class="7">7. THIS INSPECTION DOES NOT INCLUDE THE FOLLOWING LISTED AREAS WHICH ARE OBSTRUCTED OR INACCESSIBLE.: <input type="button" name="btnAdd7" class="btnAdd7" id="btnAdd7" value="Add more" /></td>
  </tr>
  <tr>
  	<td colspan="3">
  <table class="tb_7" id="tb_7">
     {section name=i loop=$mr}
     {if $mr[i].report_7 !="" or $mr[i].report_71!="" or $mr[i].report_72!=""}
    	<tr id="7">
          <td><textarea name="txt_7[]" cols="30"   id="txt_7[]" >{$mr[i].report_7}</textarea></td>
          <td><textarea name="txt_71[]" cols="30"   id="txt_71[]" >{$mr[i].report_71}</textarea></td>
          <td><textarea name="txt_72[]" cols="30"   id="txt_72[]" >{$mr[i].report_72}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_7[]" id="hd_old_7" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  <tr>
    <td colspan="3" class="8">8. BASED ON THE INSPECTOR'S VISUAL INSPECTION OF THE READILY ACCESSIBLE AREAS OF THE PROPERTY : </td>
  </tr>
  <tr>
    <td colspan="3" class="8a1">8. A. Describe evidence observed : <input type="button" name="btnAdd8a1" class="btnAdd8a1" id="btnAdd8a1" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
  <table class="tb_8a1" id="tb_8a1">
     {section name=i loop=$mr}
     {if ($mr[i].report_8a1 !="" or $mr[i].report_8a1!="" or $mr[i].report_8a12!="")}
    	<tr id="7">
          <td><textarea name="txt_8a1[]" cols="30"   id="txt_8a1[]" >{$mr[i].report_8a1}</textarea></td>
          <td><textarea name="txt_8a11[]" cols="30"   id="txt_8a11[]" >{$mr[i].report_8a11}</textarea></td>
          <td><textarea name="txt_8a12[]" cols="30"   id="txt_8a12[]" >{$mr[i].report_8a12}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_8a1[]" id="hd_old_8a1" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" class="8a2">8. A. Type of Wood_Destroying Insects observed: <input type="button" name="btnAdd8a2" class="btnAdd8a2" id="btnAdd8a2" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
  <table class="tb_8a2" id="tb_8a2">
     {section name=i loop=$mr}
      {if $mr[i].report_8a2 !="" or $mr[i].report_8a21!="" or $mr[i].report_8a22!=""}
    	<tr id="8a2">
          <td><textarea name="txt_8a2[]" cols="30"   id="txt_8a2[]" >{$mr[i].report_8a2}</textarea></td>
          <td><textarea name="txt_8a21[]" cols="30"   id="txt_8a21[]" >{$mr[i].report_8a21}</textarea></td>
          <td><textarea name="txt_8a22[]" cols="30"   id="txt_8a22[]" >{$mr[i].report_8a22}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_8a2[]" id="hd_old_8a2" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" class="8d">8. D : <input type="button" name="btnAdd8d" class="btnAdd8d" id="btnAdd8d" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
  <table class="tb_8d" id="tb_8d">
     {section name=i loop=$mr}
     {if $mr[i].report_8d !="" or $mr[i].report_8d1!="" or $mr[i].report_8d1!="" }
    	<tr id="7">
          <td><textarea name="txt_8d[]" cols="30"   id="txt_8d[]" >{$mr[i].report_8d}</textarea></td>
          <td><textarea name="txt_8d1[]" cols="30"   id="txt_8d1[]" >{$mr[i].report_8d1}</textarea></td>
          <td><textarea name="txt_8d2[]" cols="30"   id="txt_8d2[]" >{$mr[i].report_8d2}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_8d[]" id="hd_old_8d" />
      </tr>
     {/if}
  	 {/section}
    </table>
  </td>
   
  </tr>
   <tr>
    <td colspan="3" class="8e">8. E. Visible evidence of previous treatment was observed. List evidence. : <input type="button" name="btnAdd8e" class="btnAdd8e" id="btnAdd8e" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_8e" id="tb_8e">
     {section name=i loop=$mr}
      {if $mr[i].report_8e !="" or $mr[i].report_8e1!="" or $mr[i].report_8e2!=""}
    	<tr id="7">
          <td><textarea name="txt_8e[]" cols="30"   id="txt_8e[]" >{$mr[i].report_8e}</textarea></td>
          <td><textarea name="txt_8e1[]" cols="30"   id="txt_8e1[]" >{$mr[i].report_8e1}</textarea></td>
          <td><textarea name="txt_8e2[]" cols="30"   id="txt_8e2[]" >{$mr[i].report_8e2}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_8e[]" id="hd_old_8e" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
  
   <tr>
    <td colspan="3" class="10">10. ADDITIONAL COMMENTS : <input type="button" name="btnAdd10" class="btnAdd10" id="btnAdd10" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_10" id="tb_10">
     {section name=i loop=$mr}
     {if $mr[i].report_10 !="" or $mr[i].report_101!="" or $mr[i].report_102!=""}
    	<tr id="7">
          <td><textarea name="txt_10[]" cols="30"   id="txt_10[]" >{$mr[i].report_10}</textarea></td>
          <td><textarea name="txt_101[]" cols="30"   id="txt_101[]" >{$mr[i].report_101}</textarea></td>
          <td><textarea name="txt_102[]" cols="30"   id="txt_102[]" >{$mr[i].report_102}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_10[]" id="hd_old_10" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>

  </tr>
  <tr>
    <td colspan="3" class="15">15. WOOD TO EARTH CONTACT : <input type="button" name="btnAdd15" class="btnAdd15" id="btnAdd15" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_15" id="tb_15">
     {section name=i loop=$mr}
       {if $mr[i].report_15 !="" or $mr[i].report_151!="" or $mr[i].report_152!=""}
    	<tr id="7">
          <td><textarea name="txt_15[]" cols="30"   id="txt_15[]" >{$mr[i].report_15}</textarea></td>
          <td><textarea name="txt_151[]" cols="30"   id="txt_151[]" >{$mr[i].report_151}</textarea></td>
          <td><textarea name="txt_152[]" cols="30"   id="txt_152[]" >{$mr[i].report_152}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_15[]" id="hd_old_15" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
  <!--<tr>
    <td colspan="3">15. Other : </td>
  </tr>
  <tr>
    <td><input name="txt_15a" type=text size=34 value="{$mr.report_15a}"  id="txt_15a" ></td>
    <td><input name="txt_15a1" type=text size=34 value="{$mr.report_15a1}"  id="txt_15a1" ></td>
    <td><input name="txt_15a2" type=text size=34 value="{$mr.report_15a2}"  id="txt_15a2" ></td>
  </tr>-->
  <tr>
    <td colspan="3" class="16">16. EXCESSIVE CELLULOSE DEBRIS : <input type="button" name="btnAdd16" class="btnAdd16" id="btnAdd16" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_16" id="tb_16">
     {section name=i loop=$mr}
      {if $mr[i].report_16 !="" or $mr[i].report_161!="" or $mr[i].report_162!=""}
    	<tr id="7">
          <td><textarea name="txt_16[]" cols="30"   id="txt_16[]" >{$mr[i].report_16}</textarea></td>
          <td><textarea name="txt_161[]" cols="30"   id="txt_161[]" >{$mr[i].report_161}</textarea></td>
          <td><textarea name="txt_162[]" cols="30"   id="txt_162[]" >{$mr[i].report_162}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_16[]" id="hd_old_16" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>

   <tr>
    <td colspan="3" class="17">17. FAULTY GRADES : <input type="button" name="btnAdd17" class="btnAdd17" id="btnAdd17" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_17" id="tb_17">
     {section name=i loop=$mr}
     {if $mr[i].report_17 !="" or $mr[i].report_171!="" or $mr[i].report_172!=""}
    	<tr id="7">
          <td><textarea name="txt_17[]" cols="30"   id="txt_17[]" >{$mr[i].report_17}</textarea></td>
          <td><textarea name="txt_171[]" cols="30"   id="txt_171[]" >{$mr[i].report_171}</textarea></td>
          <td><textarea name="txt_172[]" cols="30"   id="txt_172[]" >{$mr[i].report_172}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_17[]" id="hd_old_17" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
 <!-- <tr>
    <td colspan="3">17. Other : </td>
  </tr>
  <tr>
    <td><input name="txt_17a" type=text size=34 value="{$mr.report_17a}"  id="txt_17a" ></td>
    <td><input name="txt_17a1" type=text size=34 value="{$mr.report_17a1}"  id="txt_17a1" ></td>
    <td><input name="txt_17a2" type=text size=34 value="{$mr.report_17a2}"  id="txt_17a2" ></td>
  </tr>-->
  
   <tr>
    <td colspan="3" class="18">18. EXCESSIVE MOISTURE : <input type="button" name="btnAdd18" class="btnAdd18" id="btnAdd18" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_18" id="tb_18">
     {section name=i loop=$mr}
     {if $mr[i].report_18 !="" or $mr[i].report_181!="" or $mr[i].report_182!=""}
    	<tr id="7">
          <td><textarea name="txt_18[]" cols="30"   id="txt_18[]" >{$mr[i].report_18}</textarea></td>
          <td><textarea name="txt_181[]" cols="30"   id="txt_181[]" >{$mr[i].report_181}</textarea></td>
          <td><textarea name="txt_182[]" cols="30"   id="txt_182[]" >{$mr[i].report_182}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_18[]" id="hd_old_18" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
 <!-- <tr>
    <td colspan="3">18. Other : </td>
  </tr>
  <tr>
    <td><input name="txt_18a" type=text size=34  value="{$mr.report_18a}"  id="txt_18a1" ></td>
    <td><input name="txt_18a1" type=text size=34  value="{$mr.report_18a1}"  id="txt_18a1" ></td>
    <td><input name="txt_18a2" type=text size=34  value="{$mr.report_18a2}"  id="txt_18a2" ></td>
  </tr>-->
  
   <tr>
    <td colspan="3" class="19">19. INACCESSIBLE AREAS : <input type="button" name="btnAdd19" class="btnAdd19" id="btnAdd19" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_19" id="tb_19">
     {section name=i loop=$mr}
     {if $mr[i].report_19 !="" or $mr[i].report_191!="" or $mr[i].report_192!=""}
    	<tr id="7">
          <td><textarea name="txt_19[]" cols="30"   id="txt_19[]" >{$mr[i].report_19}</textarea></td>
          <td><textarea name="txt_191[]" cols="30"   id="txt_191[]" >{$mr[i].report_191}</textarea></td>
          <td><textarea name="txt_192[]" cols="30"   id="txt_192[]" >{$mr[i].report_192}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_19[]" id="hd_old_19" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>
<!-- <tr>
    <td colspan="3">19. Other : </td>
  </tr>
  <tr>
    <td><input name="txt_19a" type=text size=34 value="{$mr.report_19a}"  id="txt_19a" ></td>
    <td><input name="txt_19a1" type=text size=34 value="{$mr.report_19a1}"  id="txt_19a1" ></td>
    <td><input name="txt_19a2" type=text size=34 value="{$mr.report_19a2}"  id="txt_19a2" ></td>
  </tr>-->

    <td colspan="3">20. EVIDENCE OF PREVIOUS TREATMENT  : <input type="button" name="btnAdd20" class="btnAdd20" id="btnAdd20" value="Add more" /></td>
  </tr>
  <tr>
  <td colspan="3">
   <table class="tb_20" id="tb_20">
     {section name=i loop=$mr}
     {if $mr[i].report_20 !="" or $mr[i].report_201!="" or $mr[i].report_20!=""}
    	<tr id="7">
          <td><textarea name="txt_20[]" cols="30"   id="txt_20[]" >{$mr[i].report_20}</textarea></td>
          <td><textarea name="txt_201[]" cols="30"   id="txt_201[]" >{$mr[i].report_201}</textarea></td>
          <td><textarea name="txt_202[]" cols="30"   id="txt_202[]" >{$mr[i].report_202}</textarea></td>
          {if $smarty.section.i.index!=0}
          <td><a href="{$site.base_url}admin_config/delete_re/{$mr[i].report_id}" onclick="return confirm('Do you really want to delete?')">delete</a></td>
          {/if}
          <input type="hidden" value="{$mr[i].report_id}" name="hd_old_20[]" id="hd_old_20" />
      </tr>
      {/if}
  	 {/section}
    </table>
  </td>
  </tr>

<div id="ConfirmBox"></div>
</table>
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt"></td>
     <td align="right"><input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1" /> 
    <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1" /></td>
  </tr>
</table>
 </form>

 {literal}

 <script type="text/javascript" src="http://tshop.vn/tmrp_symprotek/plugins/js/jquery/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="http://tshop.vn/thegioiwifi/plugins/jquery.ui/ui.core.js"></script>
<script type="text/javascript" src="http://tshop.vn/thegioiwifi/plugins/jquery.ui/ui.dialog.js"></script>
<link href="http://tshop.vn/thegioiwifi/plugins/jquery.ui/themes/base/ui.all.css" media="screen" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" charset="UTF-8">
	var number6a = 0;
	var number6b = 0;
	var number7 = 0;
	var number8a1 = 0;
	var number8a2 = 0;
	var number8d = 0;
	var number8e = 0;
	var number10 = 0;
	var number15 = 0;
	var number16 = 0;
	var number17 = 0;
	var number18 = 0;
	var number19 = 0;
	var number20 = 0;
$(document).ready(function() {
  $("input#btnAdd6a").click(function() {
	  number6a = number6a+1;
	  $("table#tb_6a").last().append('<tr id="delete_job'+number6a+'">'
											+ '<td><textarea name="arr_6a[]" cols="30"   id="arr_6a[]" ></textarea></td>'
											+ '<td><textarea name="arr_6a1[]" cols="30"   id="arr_6a1[]" ></textarea></td>'
											+ '<td><textarea name="arr_6a2[]" cols="30"   id="arr_6a2[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number6a+'" onclick="delete_job('+number6a+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="1" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  
  $("input#btnAdd6b").click(function() {
	  number6b = number6b+1;
	  $("table#tb_6b").last().append('<tr id="delete_job'+number6b+'">'
											+ '<td><textarea name="arr_6b[]" cols="30"   id="arr_6b[]" ></textarea></td>'
											+ '<td><textarea name="arr_6b1[]" cols="30"   id="arr_6b1[]" ></textarea></td>'
											+ '<td><textarea name="arr_6b2[]" cols="30"   id="arr_6b2[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number6b+'" onclick="delete_job('+number6b+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number7+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
   $("input#btnAdd7").click(function() {
	   number7 = number7+1;
	  $("table#tb_7").last().append('<tr id="delete_job'+number7+'">'
											+ '<td><textarea name="arr_7[]" cols="30"   id="arr_7[]" ></textarea></td>'
											+ '<td><textarea name="arr_71[]" cols="30"   id="arr_71[]" ></textarea></td>'
											+ '<td><textarea name="arr_72[]" cols="30"   id="arr_72[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number7+'" onclick="delete_job('+number7+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number7+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  
   $("input#btnAdd8a1").click(function() {
	   number8a1 = number8a1+1;
	  $("table#tb_8a1").last().append('<tr id="delete_job'+number8a1+'">'
											+ '<td><textarea name="arr_8a1[]" cols="30"   id="arr_8a1[]" ></textarea></td>'
											+ '<td><textarea name="arr_8a11[]" cols="30"   id="arr_8a11[]" ></textarea></td>'
											+ '<td><textarea name="arr_8a12[]" cols="30"   id="arr_8a12[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number8a1+'" onclick="delete_job('+number8a1+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number8a1+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd8a2").click(function() {
	   number8a2 = number8a2+1;
	  $("table#tb_8a2").last().append('<tr id="delete_job'+number8a2+'">'
											+ '<td><textarea name="arr_8a2[]" cols="30"   id="arr_8a2[]" ></textarea></td>'
											+ '<td><textarea name="arr_8a21[]" cols="30"   id="arr_8a21[]" ></textarea></td>'
											+ '<td><textarea name="arr_8a22[]" cols="30"   id="arr_8a22[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number8a2+'" onclick="delete_job('+number8a2+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number8a2+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd8d").click(function() {
	   number8d = number8d+1;
	  $("table#tb_8d").last().append('<tr id="delete_job'+number8d+'">'
											+ '<td><textarea name="arr_8d[]" cols="30"   id="arr_8d[]" ></textarea></td>'
											+ '<td><textarea name="arr_8d1[]" cols="30"   id="arr_8d1[]" ></textarea></td>'
											+ '<td><textarea name="arr_8d2[]" cols="30"   id="arr_8d2[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number8d+'" onclick="delete_job('+number8d+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number8d+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd8e").click(function() {
	   number8d = number8d+1;
	  $("table#tb_8e").last().append('<tr id="delete_job'+number8e+'">'
											+ '<td><textarea name="arr_8e[]" cols="30"   id="arr_8e[]" ></textarea></td>'
											+ '<td><textarea name="arr_8e1[]" cols="30"   id="arr_8e1[]" ></textarea></td>'
											+ '<td><textarea name="arr_8e2[]" cols="30"   id="arr_8e2[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number8e+'" onclick="delete_job('+number8e+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number8e+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd10").click(function() {
	   number10 = number10+1;
	  $("table#tb_10").last().append('<tr id="delete_job'+number10+'">'
											+ '<td><textarea name="arr_10[]" cols="30"   id="arr_10[]" ></textarea></td>'
											+ '<td><textarea name="arr_101[]" cols="30"   id="arr_101[]" ></textarea></td>'
											+ '<td><textarea name="arr_102[]" cols="30"   id="arr_102[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number10+'" onclick="delete_job('+number10+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number10+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
   $("input#btnAdd15").click(function() {
	   number15 = number15+1;
	  $("table#tb_15").last().append('<tr id="delete_job'+number15+'">'
											+ '<td><textarea name="arr_15[]" cols="30"   id="arr_15[]" ></textarea></td>'
											+ '<td><textarea name="arr_151[]" cols="30"   id="arr_151[]" ></textarea></td>'
											+ '<td><textarea name="arr_152[]" cols="30"   id="arr_152[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number15+'" onclick="delete_job('+number15+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number15+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd16").click(function() {
	   number16 = number16+1;
	  $("table#tb_16").last().append('<tr id="delete_job'+number16+'">'
											+ '<td><textarea name="arr_16[]" cols="30"   id="arr_16[]" ></textarea></td>'
											+ '<td><textarea name="arr_161[]" cols="30"   id="arr_161[]" ></textarea></td>'
											+ '<td><textarea name="arr_162[]" cols="30"   id="arr_162[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number16+'" onclick="delete_job('+number16+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number16+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd17").click(function() {
	   number17 = number17+1;
	  $("table#tb_17").last().append('<tr id="delete_job'+number17+'">'
											+ '<td><textarea name="arr_17[]" cols="30"   id="arr_17[]" ></textarea></td>'
											+ '<td><textarea name="arr_171[]" cols="30"   id="arr_171[]" ></textarea></td>'
											+ '<td><textarea name="arr_172[]" cols="30"   id="arr_172[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number17+'" onclick="delete_job('+number17+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number17+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd18").click(function() {
	   number18 = number18+1;
	  $("table#tb_18").last().append('<tr id="delete_job'+number18+'">'
											+ '<td><textarea name="arr_18[]" cols="30"   id="arr_18[]" ></textarea></td>'
											+ '<td><textarea name="arr_181[]" cols="30"   id="arr_181[]" ></textarea></td>'
											+ '<td><textarea name="arr_182[]" cols="30"   id="arr_182[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number18+'" onclick="delete_job('+number18+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number18+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd19").click(function() {
	   number19 = number19+1;
	  $("table#tb_19").last().append('<tr id="delete_job'+number19+'">'
											+ '<td><textarea name="arr_19[]" cols="30"   id="arr_19[]" ></textarea></td>'
											+ '<td><textarea name="arr_191[]" cols="30"   id="arr_191[]" ></textarea></td>'
											+ '<td><textarea name="arr_192[]" cols="30"   id="arr_192[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number19+'" onclick="delete_job('+number19+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number19+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
  $("input#btnAdd20").click(function() {
	   number20 = number20+1;
	  $("table#tb_20").last().append('<tr id="delete_job'+number20+'">'
											+ '<td><textarea name="arr_20[]" cols="30"   id="arr_20[]" ></textarea></td>'
											+ '<td><textarea name="arr_201[]" cols="30"   id="arr_201[]" ></textarea></td>'
											+ '<td><textarea name="arr_202[]" cols="30"   id="arr_202[]" ></textarea></td>'
											+ '<td><a class="DeleteAction'+number20+'" onclick="delete_job('+number20+',0);" href="javascript: void(0);">delete</a></td>'
											+ '<input type="hidden" value="'+number20+'" name="hd[]" id="hd"  />'
											+ ' </tr>');
  });
});


var delete_job =function (row,id) {
	var self = this;
	$('#ConfirmBox').html('Do you really want to delete?')
		.dialog({
			title: 'Confirm',
			closeOnEscape: false,
			resizable: false,
			modal: true,
			open: function(event, ui) {
				$('.ui-dialog-titlebar-close').hide();
			},
			buttons: {
				'No': function() {
					$(this).dialog('destroy');
				},
				'Yes': function() {
					$(this).dialog('destroy');
					$('#delete_job' + row).fadeOut('slow');
					$('#delete_job' + row).remove();
				}
			}
	});
};
		

</script>
{/literal}