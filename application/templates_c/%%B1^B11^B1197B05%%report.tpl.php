<?php /* Smarty version 2.6.18, created on 2012-10-21 21:29:22
         compiled from admin_report/report.tpl */ ?>
<form action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/save" name="frm" id="frm"  method="post">
<table cellpadding="0" border="0" cellspacing="0" class="tbl_frm" >
	<tr>
        <td valign="top" ><table width="100%" border="0"  cellpadding="5" cellspacing="0" class="frm" >
          <tr>
            <td>1A. VA/HUD/FHA CASE# <br />
              <input name="reid" type="hidden" id="reid" value="<?php echo $this->_tpl_vars['mr']['id']; ?>
" />
            <input name="r1a" type="text" id="r1a" style="width:10em;" value="<?php echo $this->_tpl_vars['mr']['r1a']; ?>
" maxlength="20" readonly="readonly"  /></td>
            <td>DATE OF INSPECTION<br />
              <input name="txt_dateofinspection" type="text" id="txt_dateofinspection" size="10" readonly value="<?php echo $this->_tpl_vars['mr']['dateofinspection']; ?>
" />
              <a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_dateofinspection);return false;" ><img align="absmiddle" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/calbtn.gif" border="0" /></a>
              <!--bottom page--></td>
          </tr>
          <tr>
            <td colspan="2">1B.

              
              <input type="checkbox" id="r1b1" name="r1b1" <?php if ($this->_tpl_vars['mr']['r1b1']): ?>checked<?php endif; ?> />
              ORIGINAL REPORT
              <input type="checkbox" id="r1b2" name="r1b2" <?php if ($this->_tpl_vars['mr']['r1b2']): ?>checked<?php endif; ?> />
              SUPPLEMENTAL REPORT</td>
          </tr>
          <tr>
            <td colspan="2">1C. PURPOSE OF REPORT<br />
              <input type="checkbox" id="r1c1" name="r1c1" <?php if ($this->_tpl_vars['mr']['r1c1']): ?>checked<?php endif; ?> />
              Sale
              <input type="checkbox" id="r1c2" name="r1c2" <?php if ($this->_tpl_vars['mr']['r1c2']): ?>checked<?php endif; ?> />
              Refinancing
              <input type="checkbox" id="r1c3" name="r1c3" <?php if ($this->_tpl_vars['mr']['1c3']): ?>checked<?php endif; ?> />
              Other </td>
          </tr>
          
          <tr>
            <td colspan="2">1D. WDIIR #<br />
            <input name="r1d" type="text" id="r1d" style="width:10em;" value="<?php echo $this->_tpl_vars['mr']['r1d']; ?>
" maxlength="20" readonly="readonly" /></td>
          </tr>
          <tr>
            <td colspan="2">1E. TARF #<br />
            <input name="r1e" type="text" id="r1e" style="width:10em;" value="<?php echo $this->_tpl_vars['mr']['r1e']; ?>
" maxlength="20" readonly="readonly" /></td>
          </tr>
          <tr>
            <td colspan="2"> 3A. NAME OF INSPECTION COMPANY: <strong><?php echo $this->_tpl_vars['mr']['cus_comp_name']; ?>
</strong></td>
          </tr>
          <tr>
            <td colspan="2"> 3B. ADDRESS OF INSPECTION COMPANY (Street, City, Zip) : <strong><?php echo $this->_tpl_vars['mr']['cus_address']; ?>
<br />
            City/State/Zip : <?php echo $this->_tpl_vars['mr']['cus_city']; ?>
/<?php echo $this->_tpl_vars['mr']['cus_state']; ?>
/<?php echo $this->_tpl_vars['mr']['cus_zipcode']; ?>
</strong></td>
          </tr>
          <tr>
            <td colspan="2" > 3C. TELEPHONE NUMBER (Include Area Code) : 
              <strong><?php echo $this->_tpl_vars['mr']['cus_phone']; ?>
</strong></td>
          </tr>
          <tr>
            <td colspan="2">4. BUSINESS LICENSE # :<strong> <?php echo $this->_tpl_vars['mr']['cus_license']; ?>
</strong></td>
          </tr>
          <tr>
            <td colspan="2">5A. NAME OF PROPERTY OWNER/SELLER <input type="text" id="r5a" name="r5a" value="<?php echo $this->_tpl_vars['mr']['r5a']; ?>
"  style="width:15em;" maxlength="27" readonly="readonly" /></td>
          </tr>
          <tr>
            <td colspan="2">5B. PROPERTY ADDRESS (Street, City, Zip) <input name="r5b1" type="text" id="r5b1" value="<?php echo $this->_tpl_vars['mr']['r5b1']; ?>
" maxlength="28"  style="width:26em;" readonly="readonly" />
              <br />
              <strong>City/State/Zip</strong> <input type="text" id="r5b2" name="r5b2" value="<?php echo $this->_tpl_vars['mr']['r5b2']; ?>
"  style="width:10em;" maxlength="22" readonly="readonly"  />
              <input type="text"  id="r5b3" name="r5b3" value="AZ"  maxlength="3" style="width:7em;" readonly="readonly" />
            <input name="r5b4" type="text" id="r5b4" readonly="readonly" style="width:4em;" value="<?php echo $this->_tpl_vars['mr']['r5b4']; ?>
" maxlength="10"  /></td>
          </tr>
          <tr>
            <td colspan="2">6A. INSPECTED STRUCTURES<br />
            <textarea id="r6a" cols="85" rows="5" name="r6a" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r6a']; ?>
</textarea></td>
          </tr>
          <tr>
            <td colspan="2"> 6B. LIST ALL UN-INSPECTED STRUCTURES<br />
              <textarea id="r6b" cols="85" rows="5" name="r6b" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r6b']; ?>
</textarea></td>
          </tr>
          <tr>
            <td colspan="2"> 7. THIS INSPECTION DOES NOT INCLUDE THE FOLLOWING LISTED AREAS WHICH ARE OBSTRUCTED OR INACCESSIBLE. (See also Item 19, page 2.)<br />
              <textarea id="r7" name="r7" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r7']; ?>
</textarea></td>
          </tr>
          <tr>
            <td colspan="2"> 8. BASED ON THE INSPECTOR'S VISUAL INSPECTION OF THE READILY ACCESSIBLE AREAS OF THE PROPERTY (See Section (11) before completing):<br />
              <input type="checkbox" id="r8a" name="r8a" <?php if ($this->_tpl_vars['mr']['r8a']): ?>checked<?php endif; ?> />
              A. Visible evidence of wood-destroying insects was observed.<br />
              Describe evidence observed:<br />
              <textarea id="r8a1" name="r8a1" cols="85" rows="5" readonly="readonly" ><?php echo $this->_tpl_vars['mr']['r8a1']; ?>
</textarea>
              <br />
              Type of Wood_Destroying Insects observed:<br />
              <textarea id="r8a2" name="r8a2" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r8a2']; ?>
</textarea>
              <br />
              <input type="checkbox" id="r8b" name="r8b" <?php if ($this->_tpl_vars['mr']['r8b']): ?>checked<?php endif; ?> />
              B. No visible evidence of infestation from wood-destroying insects was observed.<br />
              <input type="checkbox" id="r8c" name="r8c" <?php if ($this->_tpl_vars['mr']['r8c']): ?>checked<?php endif; ?> />
              C. Visible evidence of infestation as noted in 8A. Proper control measures were performed on (date):
              <input name="rtxt_8c1" type="text" id="rtxt_8c1"  value="<?php echo $this->_tpl_vars['mr']['r8c1']; ?>
" size="10" maxlength="20" /><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.rtxt_8c1);return false;" ><img align="absmiddle" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/calbtn.gif" border="0" />
              <br />
              <input type="checkbox" id="r8d" name="r8d" <?php if ($this->_tpl_vars['mr']['r8d']): ?>checked<?php endif; ?> />
              D. Visible damage due to
              <input name="r8d1" type="text" id="r8d1" value="<?php echo $this->_tpl_vars['mr']['r8d1']; ?>
" readonly="readonly"  />
              was observed in the following areas:
              <br />
              <textarea cols="85" rows="5" id="r8d2" name="r8d2" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r8d2']; ?>
</textarea>
              <br />
              <input type="checkbox" id="r8e" name="r8e" <?php if ($this->_tpl_vars['mr']['r8e']): ?>checked<?php endif; ?> />
              E. Visible evidence of previous treatment was observed. List evidence. (See also Item 20, page 2):
              <textarea id="r8e1" name="r8e1" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r8e1']; ?>
</textarea></td>
          </tr>
          <tr>
            <td colspan="2"> 9. DAMAGE OBSERVED, IF ANY<br />
              <input type="checkbox" id="r9a" name="r9a" <?php if ($this->_tpl_vars['mr']['r9a']): ?>checked<?php endif; ?> />
              A. Will be or has been corrected by this company.<br />
              <input type="checkbox" id="r9b" name="r9b" <?php if ($this->_tpl_vars['mr']['r9b']): ?>checked<?php endif; ?> />
              B. Will not be corrected by this company.<br />
              <input type="checkbox" id="r9c" name="r9c" <?php if ($this->_tpl_vars['mr']['r9c']): ?>checked<?php endif; ?> />
              C. It is recommended that noted damage be evaluated by a licensed structural contractor for any necessary repairs to be made. </td>
          </tr>
          <tr>
            <td colspan="2">10. ADDITIONAL COMMENTS (Also see page 2.)<br />
              <textarea id="r101" name="r101" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r101']; ?>
</textarea>
              <br /><?php if ($this->_tpl_vars['mr']['aaa']): ?>
(Number of additional attachments to this report.)
<input name="r102" type="text" id="r102" style="width:3em;" value="<?php echo $this->_tpl_vars['mr']['r102']; ?>
" maxlength="3" />
Page(s)<?php endif; ?> </td>
          </tr>
          <tr>
            <td colspan="2" align="left">
            11. STATEMENT OF INSPECTOR:
              <br />
              A. The inspection covered the readily accessible areas of the above listed structures, including attics and crawl spaces which permitted entry.  
              <br />
              B. Special attention was given to those areas which experience has shown to be particularly susceptible to attack by wood-destroying insects.
              <br />
              C. Non-destructive  probing  and/or  sounding  of  those  areas  and  other  visible  accessible  wood  members  showing  evidence  of  infestation  was 
performed.
              <br />
              D. The inspection did not include areas which were obstructed or inaccessible at the time of inspection. 
              <br />
              E. Neither I, nor the company for which I am acting, have had, presently have, or contemplate having any  interest  in this property.   I do further 
state that neither I, nor the company for which I am acting, is associated in any way with any party to this transaction. </td>
          </tr>
          <tr>
            <td colspan="2" align="left">12C. DATE <input name="txt_12c" type="text" id="txt_12c" style="border: 1px solid #FF771D;" size="10" readonly="readonly" value="<?php echo $this->_tpl_vars['mr']['r12c']; ?>
" maxlength="20" /><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_12c);return false;" ><img align="absmiddle" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/calbtn.gif" border="0" /></a></td>
          </tr>
          <tr>
          	<td colspan="2" align="left">AT THE TIME OF THE INSPECTION THE PROPERTY WAS:&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="vacant" name="vacant" <?php if ($this->_tpl_vars['mr']['vacant']): ?>checked<?php endif; ?> />
            Vacant &nbsp;&nbsp;&nbsp;<input type="checkbox" id="occupied" name="occupied" <?php if ($this->_tpl_vars['mr']['occupied']): ?>checked<?php endif; ?> />
            Occupied 
            &nbsp;&nbsp;&nbsp;<input type="checkbox" id="unfurnished" name="unfurnished" <?php if ($this->_tpl_vars['mr']['unfurnished']): ?>checked<?php endif; ?> />
            Unfurnished 
            &nbsp;&nbsp;&nbsp;<input type="checkbox" id="furnished" name="furnished" <?php if ($this->_tpl_vars['mr']['furnished']): ?>checked<?php endif; ?> />
            Furnished</td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%">
              <tr>
                <td align="center" colspan="3"><strong>CONDITIONS CONDUCIVE TO INFESTATION</strong></td>
              </tr>
              <tr>
                <td colspan="3"> 15. WOOD TO EARTH CONTACT (EC)
                  <input name="r15" value="2" type="radio"  <?php if ($this->_tpl_vars['mr']['r15'] == 2): ?>checked<?php endif; ?> /> Yes,
                  <input name="r15" value="1" type="radio"  <?php if ($this->_tpl_vars['mr']['r15'] == 1): ?>checked<?php endif; ?> />
                  No &nbsp;&nbsp;&nbsp;&nbsp; (<i><u>If YES, check mark and explain conditions conducive)</u></i></td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r151" name="r151" <?php if ($this->_tpl_vars['mr']['r151']): ?>checked<?php endif; ?> />
                  Fence Abutting Structure<br />
                  <input type="checkbox" id="r152" name="r152" <?php if ($this->_tpl_vars['mr']['r152']): ?>checked<?php endif; ?> />
                  Concrete Form Boards<br />
                  <input type="checkbox" id="r153" name="r153" <?php if ($this->_tpl_vars['mr']['r153']): ?>checked<?php endif; ?> />
                  Porch Post </td>
                <td><input type="checkbox" id="r154" name="r154" <?php if ($this->_tpl_vars['mr']['r154']): ?>checked<?php endif; ?> />
                  Pier Post<br />
                  <input type="checkbox" id="r155" name="r155" <?php if ($this->_tpl_vars['mr']['r155']): ?>checked<?php endif; ?> />
                  Porch Stairs<br />
                  <input type="checkbox" id="r156" name="r156" <?php if ($this->_tpl_vars['mr']['r156']): ?>checked<?php endif; ?> />
                  Trellis </td>
                <td><input type="checkbox" id="r157" name="r157" <?php if ($this->_tpl_vars['mr']['r157']): ?>checked<?php endif; ?> />
                  Plantings/Planters Contacting Structure<br />
                  <input type="checkbox" id="r158" name="r158" <?php if ($this->_tpl_vars['mr']['r158']): ?>checked<?php endif; ?> />
                  Other
                  <input type="text" id="r159" name="r159" value="<?php echo $this->_tpl_vars['mr']['r159']; ?>
" readonly="readonly"/></td>
              </tr>
              <tr>
                <td colspan="3"> Comments :<br />
                  <textarea id="r1510" name="r1510" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r1510']; ?>
</textarea></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="2"> 16. EXCESSIVE CELLULOSE DEBRIS (CD)
              <input type="radio"  value="0" name="r16" checked/>
              Yes,
              <input type="radio"  name="r16" value="1" <?php if ($this->_tpl_vars['mr']['r16']): ?>checked<?php endif; ?>/>
              No &nbsp;&nbsp;&nbsp;&nbsp; <i><u>(If YES, check mark and explain conditions conducive)</u></i><br />
              Comments :<br />
              <textarea id="r161" name="r161" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r161']; ?>
</textarea></td>
          </tr>
          <tr>
            <td colspan="2"> 17. FAULTY GRADES (FG)
              <input type="radio"  name="r17" value="0" checked />
              Yes,
              <input type="radio"  name="r17" value="1" <?php if ($this->_tpl_vars['mr']['r17']): ?>checked<?php endif; ?> />
              No &nbsp;&nbsp;&nbsp;&nbsp;<i><u>(If YES, checks mark and explain conditions conducive)</u></i><br />
              <table width="100%">
                <tr>
                  <td><input type="checkbox" id="r171" name="r171" <?php if ($this->_tpl_vars['mr']['r171']): ?>checked<?php endif; ?> />
                    Slope; surface water tends to drain toward house<br />
                    <input type="checkbox" id="r172" name="r172" <?php if ($this->_tpl_vars['mr']['r172']): ?>checked<?php endif; ?> />
                    Floor level at or below grade<br />
                    <input type="checkbox" id="r173" name="r173" <?php if ($this->_tpl_vars['mr']['r173']): ?>checked<?php endif; ?> />
                    Wood siding below grade </td>
                  <td width="50%"><input type="checkbox" id="r174" name="r174" <?php if ($this->_tpl_vars['mr']['r174']): ?>checked<?php endif; ?> />
                    Stucco at or below grade<br />
                    <input type="checkbox" id="r175" name="r175" <?php if ($this->_tpl_vars['mr']['r175']): ?>checked<?php endif; ?> />
                    Joists in crawl space less than 18" above grade<br />
                    <input type="checkbox" id="r176" name="r176" <?php if ($this->_tpl_vars['mr']['r176']): ?>checked<?php endif; ?> />
                    Other
                    <input type="text" id="r177" name="r177" value="<?php echo $this->_tpl_vars['mr']['r177']; ?>
" readonly="readonly" /></td>
                </tr>
                <tr>
                  <td colspan="2"> Comments : <br />
                    <textarea id="r178" name="r178" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r178']; ?>
</textarea></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2"> 18. EXCESSIVE MOISTURE (EM)
              <input type="radio"  name="r18" value="0" checked />
              Yes,
              <input type="radio" name="r18" value="1" <?php if ($this->_tpl_vars['mr']['r18']): ?>checked<?php endif; ?> />
              No &nbsp;&nbsp;&nbsp;&nbsp;<i><u>(If YES, checks mark and explain conditions conducive)</u></i><br />
              <table width="100%">
                <tr>
                  <td><input type="checkbox" id="r181" name="r181" <?php if ($this->_tpl_vars['mr']['r181']): ?>checked<?php endif; ?> />
                    Standing water<br />
                    <input type="checkbox" id="r182" name="r182" <?php if ($this->_tpl_vars['mr']['r182']): ?>checked<?php endif; ?> />
                    Sprinklers Hitting Structure<br />
                    <input type="checkbox" id="r183" name="r183" <?php if ($this->_tpl_vars['mr']['r183']): ?>checked<?php endif; ?> />
                    Crawl Space/Water Leaking </td>
                  <td><input type="checkbox" id="r184" name="r184" <?php if ($this->_tpl_vars['mr']['r184']): ?>checked<?php endif; ?> />
                    Water Damage<br />
                    <input type="checkbox" id="r185" name="r185" <?php if ($this->_tpl_vars['mr']['r185']): ?>checked<?php endif; ?> />
                    Water Stain<br />
                    <input type="checkbox" id="r186" name="r186" <?php if ($this->_tpl_vars['mr']['r186']): ?>checked<?php endif; ?> />
                    Improper Condensate Drainage </td>
                  <td><input type="checkbox" id="r187" name="r187" <?php if ($this->_tpl_vars['mr']['r187']): ?>checked<?php endif; ?> />
                    Bath/Shower/Toilet Leaking<br />
                    <input type="checkbox" id="r188" name="r188" <?php if ($this->_tpl_vars['mr']['r188']): ?>checked<?php endif; ?> />
                    Plumbing Leaks<br />
                    <input type="checkbox" id="r189" name="r189" <?php if ($this->_tpl_vars['mr']['r189']): ?>checked<?php endif; ?> />
                    Attic/Roof Leak </td>
                  <td><input type="checkbox" id="r1810" name="r1810" <?php if ($this->_tpl_vars['mr']['r1810']): ?>checked<?php endif; ?> />
                    Inadequate Ventilation<br />
                    <input type="checkbox" id="r1811" name="r1811"  <?php if ($this->_tpl_vars['mr']['r1811']): ?>checked<?php endif; ?>/>
                    Other
                    <input type="text" id="r1812" name="r1812" value="<?php echo $this->_tpl_vars['mr']['r1812']; ?>
" readonly="readonly" /></td>
                </tr>
                <tr>
                  <td colspan="4"> Comments : <br />
                    <textarea id="r1813" name="r1813" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r1813']; ?>
</textarea></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2"> 19. INACCESSIBLE AREAS (IA)
              <input type="radio"  name="r19" value="2" <?php if ($this->_tpl_vars['mr']['r19'] == 2): ?>checked<?php endif; ?> checked/>
              Yes,
              <input type="radio"  name="r19" value="1" <?php if ($this->_tpl_vars['mr']['r19'] == 1): ?>checked<?php endif; ?> />
              No &nbsp;&nbsp;&nbsp;&nbsp;<i><u>(If YES, checks mark and explain conditions conducive)</u></i><br />
              <table width="100%">
                <tr>
                  <td><input type="checkbox" id="r191" name="r191" <?php if ($this->_tpl_vars['mr']['r191']): ?>checked<?php endif; ?> />
                    Attic - All<br />
                    <input type="checkbox" id="r192" name="r192" <?php if ($this->_tpl_vars['mr']['r192']): ?>checked<?php endif; ?> />
                    Attic - joists<br />
                    <input type="checkbox" id="r193" name="r193" <?php if ($this->_tpl_vars['mr']['r193']): ?>checked<?php endif; ?> />
                    Attic - Partial<br />
                    <input type="checkbox" id="r194" name="r194" <?php if ($this->_tpl_vars['mr']['r194']): ?>checked<?php endif; ?> />
                    Plumbing Traps </td>
                  <td><input type="checkbox" id="r195" name="r195" <?php if ($this->_tpl_vars['mr']['r195']): ?>checked<?php endif; ?>/>
                    Floors<br />
                    <input type="checkbox" id="r196" name="r196"  <?php if ($this->_tpl_vars['mr']['r196']): ?>checked<?php endif; ?>/>
                    Wall Interiors<br />
                    <input type="checkbox" id="r197" name="r197" <?php if ($this->_tpl_vars['mr']['r197']): ?>checked<?php endif; ?>/>
                    Enclosed Stairwell<br />
                    <input type="checkbox" id="r198" name="r198" <?php if ($this->_tpl_vars['mr']['r198']): ?>checked<?php endif; ?>/>
                    Dropped Ceilings </td>
                  <td><input type="checkbox" id="r199" name="r199" <?php if ($this->_tpl_vars['mr']['r199']): ?>checked<?php endif; ?>/>
                    Sub/Crawl Space Area - Clearance<br />
                    <input type="checkbox" id="r1910" name="r1910" <?php if ($this->_tpl_vars['mr']['r1910']): ?>checked<?php endif; ?>/>
                    Sub Area/Crawl Space No Access<br />
                    <input type="checkbox" id="r1911" name="r1911" <?php if ($this->_tpl_vars['mr']['r1911']): ?>checked<?php endif; ?>/>
                    Areas Obstructed By Furniture Or Stored Articles<br />
                    <input type="checkbox" id="r1912" name="r1912" <?php if ($this->_tpl_vars['mr']['r1912']): ?>checked<?php endif; ?>/>
                    Other
                    <input type="text" id="r1913" name="r1913" value="<?php echo $this->_tpl_vars['mr']['r1913']; ?>
" readonly="readonly"/></td>
                </tr>
                <tr>
                  <td colspan="3"> Comments :<br />
                    <textarea id="r1914" name="r1914" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r1914']; ?>
</textarea></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="center" colspan="2"><strong>20. EVIDENCE OF PREVIOUS TREATMENT </strong></td>
          </tr>
          <tr>
            <td colspan="2"><input type="checkbox" id="r201" name="r201" <?php if ($this->_tpl_vars['mr']['r201']): ?>checked<?php endif; ?> />
              BY ANOTHER COMPANY: While evidence of previous treatment does exist, it is impossible for the inspecting company to ascertain if such treatment was properly performed. Further investigation is left to the Buyer's discretion to determine if such treatment was done properly and if valid guarantee exists against the target pest of such treatment.<br />
              <input type="checkbox" id="r202" name="r202" <?php if ($this->_tpl_vars['mr']['r202']): ?>checked<?php endif; ?> />
              BY THE INSPECTING COMPANY: Previous treatment is recorded for this property. At the buyer's discretion, the treatment records may be viewed at the inspecting company's local office.<br />
              <table width="100%">
                <tr>
                  <td> Account Number </td>
                  <td><input name="r203" type="text" id="r203" value="<?php echo $this->_tpl_vars['mr']['r203']; ?>
" maxlength="19" readonly="readonly"/></td>
                  <td> Date of Initial Treatment </td>
                  <td><input name="rtxt_204" type="text" id="rtxt_204" value="<?php echo $this->_tpl_vars['mr']['r204']; ?>
" readonly="readonly" size="10" maxlength="12"/><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.rtxt_204);return false;" ><img align="absmiddle" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/calbtn.gif" border="0" /></td>
                </tr>
                <tr>
                  <td> Target Pest </td>
                  <td><input name="r205" type="text" id="r205" value="<?php echo $this->_tpl_vars['mr']['r205']; ?>
" readonly="readonly" /></td>
                  <td> Warranty Expiration Date </td>
                  <td><input name="rtxt_206" type="text" id="rtxt_206" value="<?php echo $this->_tpl_vars['mr']['r206']; ?>
" readonly="readonly" size="10" maxlength="12"/><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.rtxt_206);return false;" ><img align="absmiddle" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/calbtn.gif" border="0" /></td>
                </tr>
                <tr>
                  <td> Other </td>
                  <td colspan="3"><input type="text" style="width:34em;" id="r207" name="r207" value="<?php echo $this->_tpl_vars['mr']['r207']; ?>
" readonly="readonly"/></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Pest&nbsp;&nbsp;&nbsp;&nbsp;Control&nbsp;&nbsp;&nbsp;&nbsp;Inspector's&nbsp;&nbsp;&nbsp;&nbsp;Additional&nbsp;&nbsp;&nbsp;&nbsp;Comments :</strong><br />
              <textarea id="r208" name="r208" cols="85" rows="5" readonly="readonly"><?php echo $this->_tpl_vars['mr']['r208']; ?>
</textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><strong>PURSUANT TO: R4-29307 (E)(1) THROUGH(5)&amp;(a)THROUGH(p) THE INSPECTOR MUST COMPLETE THE GRAPH ON PAGE(3) FOR ANY NOTED ITEMS WHICH ARE CHECK(&radic;)MARKED BELOW</strong></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="1">
              <tr>
                <td>&radic; </td>
                <td> Code </td>
                <td> See graph </td>
                <td>&radic; </td>
                <td> Code </td>
                <td> See graph </td>
                <td>&radic; </td>
                <td> Code </td>
                <td> See graph </td>
                <td>&radic; </td>
                <td> Code </td>
                <td> See graph </td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r211" name="r211" <?php if ($this->_tpl_vars['mr']['r211']): ?>checked<?php endif; ?> /></td>
                <td colspan="2"> SU Subterranean Termites </td>
                <td><input type="checkbox" id="r216" name="r216" <?php if ($this->_tpl_vars['mr']['r216']): ?>checked<?php endif; ?> /></td>
                <td colspan="2">OW Other Wood Destroying Insects(*)</td>
                <td><input type="checkbox" id="r2111" name="r2111"  <?php if ($this->_tpl_vars['mr']['r2111']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">OB Obestructious</td>
                <td><input type="checkbox" id="r2116" name="r2116" <?php if ($this->_tpl_vars['mr']['r2116']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">WD Water DAmage</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r212" name="r212" <?php if ($this->_tpl_vars['mr']['r212']): ?>checked<?php endif; ?> /></td>
                <td colspan="2">DR Drywood Termites</td>
                <td><input type="checkbox" id="r217" name="r217" <?php if ($this->_tpl_vars['mr']['r217']): ?>checked<?php endif; ?> /></td>
                <td colspan="2"> FG Faulty Grade </td>
                <td><input type="checkbox" id="r2112" name="r2112" <?php if ($this->_tpl_vars['mr']['r2112']): ?>checked<?php endif; ?> /></td>
                <td colspan="2">IA Inaccessible</td>
                <td><input type="checkbox" id="r2117" name="r2117" <?php if ($this->_tpl_vars['mr']['r2117']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">WS Water Stains</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r213" name="r213"  <?php if ($this->_tpl_vars['mr']['r213']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">DA Dampwood Termites</td>
                <td><input type="checkbox" id="r218" name="r218" <?php if ($this->_tpl_vars['mr']['r218']): ?>checked<?php endif; ?> /></td>
                <td colspan="2">WE Wood To Earth Contact</td>
                <td><input type="checkbox" id="r2113" name="r2113" <?php if ($this->_tpl_vars['mr']['r2113']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">IV Inadequate Ventilation</td>
                <td><input type="checkbox" id="r2118" name="r2118" <?php if ($this->_tpl_vars['mr']['r2118']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">RL Roof Leaks</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r214" name="r214" <?php if ($this->_tpl_vars['mr']['r214']): ?>checked<?php endif; ?> /></td>
                <td colspan="2">BE Wood Destroying Beetles</td>
                <td><input type="checkbox" id="r219" name="r219" <?php if ($this->_tpl_vars['mr']['r219']): ?>checked<?php endif; ?>/></td>
                <td colspan="2"> CE Cellulose Drebris</td>
                <td><input type="checkbox" id="r2114" name="r2114" <?php if ($this->_tpl_vars['mr']['r2114']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">PL Plumbing Leaks</td>
                <td><input type="checkbox" id="r2119" name="r2119" <?php if ($this->_tpl_vars['mr']['r2119']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">EM Excessive Moisture</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r215" name="r215" <?php if ($this->_tpl_vars['mr']['r215']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">CA Carpenter Ants</td>
                <td><input type="checkbox" id="r2110" name="r2110" <?php if ($this->_tpl_vars['mr']['r2110']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">PA Plantings Abutting Structure</td>
                <td><input type="checkbox" id="r2115" name="r2115" <?php if ($this->_tpl_vars['mr']['r2115']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">SP Sprinkler Hitting Structure</td>
                <td><input type="checkbox" id="r2120" name="r2120" <?php if ($this->_tpl_vars['mr']['r2120']): ?>checked<?php endif; ?>/></td>
                <td colspan="2">FI Further Inspection Needed</td>
              </tr>
              <tr>
                <td colspan="12"> (*) Other Wood Destroying Insects </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="2"><div style="z-index:99;"><?php if ($this->_tpl_vars['mr']['aaaa']): ?> Inspected By
              <select id="sel_inspected" name="sel_inspected" disabled="disabled"  style="z-index:99;" >	
              	<option value="">Select inspector</option>
              		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['inspector']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                		<option value="<?php echo $this->_tpl_vars['inspector'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['mr']['inspector_id'] == $this->_tpl_vars['inspector'][$this->_sections['i']['index']]['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['inspector'][$this->_sections['i']['index']]['name']; ?>
</option>
                   	<?php endfor; endif; ?>
              </select>&nbsp;&nbsp;&nbsp; <input type="text" id="inspector_license"  name="inspector_license" readonly="readonly" value="<?php echo $this->_tpl_vars['mr']['inspector_license']; ?>
" /><?php endif; ?>
              	<?php if ($this->_tpl_vars['mr']['id']): ?><br />
              	E-mail 1 : &nbsp;&nbsp; <input type="text" id="txt_email1" name="txt_email1"  /> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;"><?php echo $this->_tpl_vars['mr']['email1']; ?>
</span><br /> <br />

				E-mail 2 : &nbsp;&nbsp; <input type="text" id="txt_email2" name="txt_email2"  /> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;"><?php echo $this->_tpl_vars['mr']['email2']; ?>
</span><br /><br />

                E-mail 3 : &nbsp;&nbsp; <input type="text" id="txt_email3" name="txt_email3"  /> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;"><?php echo $this->_tpl_vars['mr']['email3']; ?>
</span><br /><br />

                E-mail 4 : &nbsp;&nbsp; <input type="text" id="txt_email4" name="txt_email4"  /> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;"><?php echo $this->_tpl_vars['mr']['email4']; ?>
</span><br /><br />

                E-mail 5 : &nbsp;&nbsp; <input type="text" id="txt_email5" name="txt_email5"  /> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;"><?php echo $this->_tpl_vars['mr']['email5']; ?>
</span>
				<?php endif; ?></div>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <?php if ($this->_tpl_vars['mr']['id']): ?>
              <input type="button" id="btn1" value="Update history" onclick="javascript:OpenSubWin('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/print_report/id/<?php echo $this->_tpl_vars['mr']['id']; ?>
','550','500','1');">&nbsp;&nbsp;&nbsp;
              <input type="button" id="btn" onclick="javascript:OpenSubWin('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/print_mail/id/<?php echo $this->_tpl_vars['mr']['id']; ?>
','550','500','1');" value="Email history"/>&nbsp;&nbsp;&nbsp;<input type="button" id="email" name="email" value="Send Email" onclick="sm_frm(frm,'<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/send_email');" />&nbsp;&nbsp;&nbsp;
              <input type="button" value="Export to pdf" onclick="window.open('<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/r_print/id/<?php echo $this->_tpl_vars['mr']['id']; ?>
')"><?php endif; ?>&nbsp;&nbsp;&nbsp;</td>
          </tr>
        </table></td>
    </tr>
</table>
</form>

<iframe width=174 height=189 name="gToday:normal:normal.js" id="gToday:normal:normal.js" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/ipopeng.htm" scrolling="no" frameborder="0" 
style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<?php echo '
<script language="javascript" type="text/javascript">
	function sm_frm(frm,action){
		  frm.action = action;
		  frm.submit();
	}
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? \'yes\' : \'no\';
	
	  var paramz = \'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=yes,scrollbars=\'+sbt+\',width=\'+w+\',height=\'+h+\'\';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
</script>
'; ?>


<?php echo $this->_tpl_vars['xajax_js']; ?>

<div id="loading_message" class="loading" >Loading ...</div>
<?php echo '
<script type="text/javascript">
  xajax.callback.global.onRequest = function() {xajax.$(\'loading_message\').style.display = \'block\';}
  xajax.callback.global.beforeResponseProcessing = function() {xajax.$(\'loading_message\').style.display=\'none\';}
  function selectmodle(str)
  {
   document.getElementById(\'inspector_license\').value = str;
  }
</script>
'; ?>