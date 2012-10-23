
<form action="{$site.base_url}customer/save" name="frm" id="frm"  method="post" enctype="multipart/form-data" autocomplete="off">
<table class="content" align="center" cellpadding="0" border="0" cellspacing="0" >
	<tr>
	  <td align="left" valign="top" height="120">{include file = "customer/menu.tpl}</td>
    </tr>
    <tr>
        <td valign="top" align="center" >{if $mr.frm_error}<span style="color:#F00;font-family:Tahoma, Geneva, sans-serif;">{$mr.frm_error}</span>{/if}{if $mr.password}<span style="color:#F00;font-family:Tahoma, Geneva, sans-serif;">{$mr.password}</span>{/if}
        <table width="80%" border="0"  cellpadding="5" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;">
          <tr>
            <td colspan="2" align="left"><font size="1" color="#666666">NOTE: Pursuant to: ARS&sect;32-2321 (B) (1) (10), ARS&sect;32-2324 (A) This form must be completed only by an Active Licensed Applicator or Qualifying Party.</font></td>
          </tr>
          <tr>
            <td align="left">1A. VA/HUD/FHA CASE# <br />
              <input name="reid" type="hidden" id="reid" value="{$mr.id}" />
              <input name="r1a" type="text" id="r1a" style="border: 1px solid #FF771D;" value="{$mr.r1a}" maxlength="18"/></td>
            <td align="left">DATE OF INSPECTION<br />
              <input name="txt_dateofinspection" type="text" id="txt_dateofinspection" size="10" style="border: 1px solid #FF771D;" readonly value="{$mr.dateofinspection}" />
              <!--bottom page-->
              <a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_dateofinspection);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a></td>
          </tr>
          <tr>
            <td colspan="2" align="left">
              
              1B.
<input type="checkbox" id="r1b1" name="r1b1" {if $mr.r1b1}checked{/if} />
              ORIGINAL REPORT
              <input type="checkbox" id="r1b2" name="r1b2" {if $mr.r1b2}checked{/if} />
              SUPPLEMENTAL REPORT</td>
          </tr>
          <tr>
            <td colspan="2" align="left">1C. PURPOSE OF REPORT<br />
              <input type="checkbox" id="r1c1" name="r1c1" {if $mr.r1c1}checked{/if} />
              SALE
              <input type="checkbox" id="r1c2" name="r1c2" {if $mr.r1c2}checked{/if} />
              REFINANCE
              <input type="checkbox" id="r1c3" name="r1c3" {if $mr.r1c3}checked{/if} />
              OTHER</td>
          </tr>
          <tr>
            <td colspan="2" align="left">1D. WDIIR #<br />
            <input name="r1d" type="text" id="r1d" style="border: 1px solid #FF771D;" value="{$mr.r1d}" maxlength="18"/></td>
          </tr>
          <tr>
            <td colspan="2" align="left">1E. TARF #<br />
            <input name="r1e" type="text" id="r1e" style="border: 1px solid #FF771D;" value="{$mr.r1e}" maxlength="18"/></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 3A. NAME OF INSPECTION COMPANY: <strong>{$cus.cus_comp_name}</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 3B. ADDRESS OF INSPECTION COMPANY (Street, City, Zip) : <strong>{$cus.cus_address}<br />
            City/State/Zip : {$cus.cus_city}/{$cus.cus_state}/{$cus.cus_zipcode}</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="left" > 3C. TELEPHONE NUMBER (Include Area Code) : 
              <strong>{$cus.cus_phone}</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="left">4. BUSINESS LICENSE # :<strong> {$cus.cus_license}</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="left">5A. NAME OF PROPERTY OWNER/SELLER <input type="text" id="r5a" name="r5a" value="{$mr.r5a}" style="width:25em;border: 1px solid #FF771D;" maxlength="27" /></td>
          </tr>
          <tr>
            <td colspan="2" align="left">5B. PROPERTY ADDRESS (Street) 
              <input name="r5b1" type="text" id="r5b1" value="{$mr.r5b1}" style="width:25em;border: 1px solid #FF771D;" maxlength="43" />
               <br />
				<span style="color:#F00;padding-left:18em;">{$mr.frm_r5b1}</span><br />
              <br />
              <strong>City/State/Zip</strong> <input type="text" id="r5b2" name="r5b2" value="{$mr.r5b2}" maxlength="22" style="width:8em; border: 1px solid #FF771D;"  />
              <input type="text"  id="r5b3" name="r5b3" value="AZ" style="width:8em;border: 1px solid #FF771D;" readonly="readonly" maxlength="5" />
            <input name="r5b4" type="text" id="r5b4" style="width:8em;border: 1px solid #FF771D;" value="{$mr.r5b4}"  maxlength="10" /></td>
          </tr>
          <tr>
            <td colspan="2" align="left">6A. INSPECTED STRUCTURES<br />
            
            <div style="z-index:1000;border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;position: relative;" id="list6a">
            <ul style="padding:0;margin:0;">
            {section name=j loop=$mlist}
                {if  $mlist[j].report_6a != ""}
                    <li>{$mlist[j].report_6a}</li>
                {/if}
                {if $mlist[j].report_6a1 != ""}   
                    <li>{$mlist[j].report_6a1}</li>
                 {/if}
                 {if $mlist[j].report_6a2 != ""}   
                    <li>{$mlist[j].report_6a2}</li>
                  {/if}
             {/section}
             {foreach from=$mre item=foo}
                 {if $foo.r6a != ""}	
                 	 <li>{$foo.r6a}</li>
              {/if}
              {/foreach}
             
             
                 
                </ul>
        	</div>
           
            <textarea id="r6a" cols="50" rows="5" name="r6a" class="r6a" style="border: 1px solid #FF771D;" onclick="this.focus();this.select()">{$mr.r6a}</textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 6B. LIST ALL UN-INSPECTED STRUCTURES<br />
       
             <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list6b">
             <ul style="padding:0;margin:0;">
             {section name=j loop=$mlist}
             {if $mlist[j].report_6b!="" }
                <li>{$mlist[j].report_6b}</li>
            {/if}
              {if $mlist[j].report_6b1!=""}   
                <li>{$mlist[j].report_6b1}</li>
              {/if}
             {if $mlist[j].report_6b2!=""}   
                <li>{$mlist[j].report_6b2}</li>
              {/if}
              {/section}
              {foreach from=$mre item=foo}
                 {if $foo.r6b != ""}	
                 	 <li>{$foo.r6b}</li>
              {/if}
              {/foreach}
                </ul>
        	</div>
     
              <textarea id="r6b" cols="50" rows="5" name="r6b" style="border: 1px solid #FF771D;">{$mr.r6b}</textarea></td>
          </tr>
          <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;padding-bottom:10px;">
                <li>House Only<br/>Detached	Garage<br/>Out Building - Barn - Utility Building <br/>Main Building or Building #1 or Administrator B.</li>
                <li>Shelter Tubes <br/>Fecal Pellets<br/>Exit Holes<br/>Initial Frass<br/>Alate Wings</li>
        	</div>
          <tr>
            <td colspan="2" align="left"> 7. THIS INSPECTION DOES NOT INCLUDE THE FOLLOWING LISTED AREAS WHICH ARE OBSTRUCTED OR INACCESSIBLE. (See also Item 19, page 2.)<br />
     
             <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list7">
             <ul style="padding:0;margin:0;">
             {section name=j loop=$mlist}
              {if $mlist[j].report_7 !=""}
                <li>{$mlist[j].report_7}</li>
               {/if}
               {if  $mlist[j].report_71 !=""}
                <li>{$mlist[j].report_71}</li>
                {/if}
               {if $mlist[j].report_72 !=""}
                <li>{$mlist[j].report_72}</li>
                {/if}
                 {/section}
                 {foreach from=$mre item=foo}
                 {if $foo.r7 != ""}	
                 	 <li>{$foo.r7}</li>
              {/if}
              {/foreach}
              
             </ul>
        	</div>
            
              <textarea id="r7" name="r7" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r7}</textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 8. BASED ON THE INSPECTOR'S VISUAL INSPECTION OF THE READILY ACCESSIBLE AREAS OF THE PROPERTY (See Section (11) before completing):<br />
              <input type="checkbox" id="r8a" name="r8a" {if $mr.r8a}checked{/if} style="border: 1px solid #FF771D;" />
              A. Visible evidence of wood-destroying insects was observed.<br />
              Describe evidence observed:<br />
              
               <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list8a1">
               <ul style="padding:0;margin:0;">
               {section name=j loop=$mlist}
               {if $mlist[j].report_8a1!=''}
                <li>{$mlist[j].report_8a1}</li>
                {/if}
               {if $mlist[j].report_8a11!=''}
                <li>{$mlist[j].report_8a11}</li>
                {/if}
               {if $mlist[j].report_8a12!=''}
                <li>{$mlist[j].report_8a12}</li>
                {/if}
                {/section}
                {foreach from=$mre item=foo}
                 {if $foo.r8a1 != ""}	
                 	 <li>{$foo.r8a1}</li>
              {/if}
              {/foreach}
           
               </ul>
        	</div>
            
              <textarea id="r8a1" name="r8a1" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r8a1}</textarea>
              <br />
              Type of Wood_Destroying Insects observed:<br />
              
               <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list8a2">
               <ul style="padding:0;margin:0;">
               {section name=j loop=$mlist}
               {if $mlist[j].report_8a2!=""}
                <li>{$mlist[j].report_8a2}</li>
                {/if}
               {if  $mlist[j].report_8a21!=""}
                <li>{$mlist[j].report_8a21}</li> {/if}
               {if $mlist[j].report_8a22!=""}
                <li>{$mlist[j].report_8a22}</li>
                {/if}
                 {/section}
                 
                 {foreach from=$mre item=foo}
                 {if $foo.r8a2 != ""}	
                 	 <li>{$foo.r8a2}</li>
              {/if}
              {/foreach}
                
                </ul>
        	</div>
           
              <textarea id="r8a2" name="r8a2" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r8a2}</textarea>
              <br />
              <input type="checkbox" id="r8b" name="r8b" {if $mr.r8b}checked{/if} style="border: 1px solid #FF771D;" />
              B. No visible evidence of infestation from wood-destroying insects was observed.<br />
              <input type="checkbox" id="r8c" name="r8c" {if $mr.r8c}checked{/if} style="border: 1px solid #FF771D;"/>
              C. Visible evidence of infestation as noted in 8A. Proper control measures were performed on (date):
              <input name="rtxt_8c1" type="text" id="rtxt_8c1" style="border: 1px solid #FF771D;" size="10" readonly="readonly" value="{if $mr.r8c1}{$mr.r8c1}{/if}" maxlength="20" /><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.rtxt_8c1);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a>
              <br />
              <input type="checkbox" id="r8d" name="r8d" {if $mr.r8d}checked{/if} style="border: 1px solid #FF771D;" />
              D. Visible damage due to
              <input name="r8d1" type="text" id="r8d1" style="border: 1px solid #FF771D;" value="{$mr.r8d1}"  />
              was observed in the following areas:
              <br />
               <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list8d">
                <ul style="padding:0;margin:0;">
               {section name=j loop=$mlist}
                   {if $mlist[j].report_8d!=""}
                    <li>{$mlist[j].report_8d}</li>
                     {/if}
                   {if $mlist[j].report_8d1!=""}
                    <li>{$mlist[j].report_8d1}</li>
                     {/if}
                   {if $mlist[j].report_8d2!=""}
                    <li>{$mlist[j].report_8d2}</li>
                    {/if}
               {/section}
                {foreach from=$mre item=foo}
                 {if $foo.r8d2 != ""}	
                 	 <li>{$foo.r8d2}</li>
              {/if}
              {/foreach}
                
                </ul>
        	</div>
           
              <textarea cols="50" rows="5" id="r8d2" name="r8d2" style="border: 1px solid #FF771D;">{$mr.r8d2}</textarea>
              <br />
              <input type="checkbox" id="r8e" name="r8e" {if $mr.r8e}checked{/if} style="border: 1px solid #FF771D;"/>
              E. Visible evidence of previous treatment was observed. List evidence. (See also Item 20, page 2):<br />
              <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list8e">
              <ul style="padding:0;margin:0;">
              {section name=j loop=$mlist}
               {if $mlist[j].report_8e!=""}
                <li>{$mlist[j].report_8e}</li>
                {/if}
                 {if $mlist[j].report_8e1!=""}
                <li>{$mlist[j].report_8e1}</li>
                {/if}
                 {if $mlist[j].report_8e2!=""}
                <li>{$mlist[j].report_8e2}</li>
                {/if}
                {/section}
                 {foreach from=$mre item=foo}
                 {if $foo.r8e1 != ""}	
                 	 <li>{$foo.r8e1}</li>
              {/if}
              {/foreach}
                
                </ul>
        	</div>
           
              <textarea id="r8e1" name="r8e1" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r8e1}</textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 9. DAMAGE OBSERVED, IF ANY<br />
              <input type="checkbox" id="r9a" name="r9a" {if $mr.r9a}checked{/if} />
              A. Will be or has been corrected by this company.<br />
              <input type="checkbox" id="r9b" name="r9b" {if $mr.r9b}checked{/if} />
              B. Will not be corrected by this company.<br />
              <input type="checkbox" id="r9c" name="r9c" {if $mr.r9c}checked{/if} />
              C. It is recommended that noted damage be evaluated by a licensed structural contractor for any necessary repairs to be made. </td>
          </tr>
          <tr>
            <td colspan="2" align="left">10. ADDITIONAL COMMENTS (Also see page 2.)<br />
            <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto" id="list10">
             <ul style="padding:0;margin:0;">
             {section name=j loop=$mlist}
               {if $mlist[j].report_10!=""}
                <li>{$mlist[j].report_10}</li>
               {/if}
                 {if $mlist[j].report_101!=""}
                <li>{$mlist[j].report_101}</li>
                {/if}
                 {if $mlist[j].report_102!=""}
                <li>{$mlist[j].report_102}</li>
                {/if}
               {/section}
               {foreach from=$mre item=foo}
                 {if $foo.r101 != ""}	
                 	 <li>{$foo.r101}</li>
              {/if}
              {/foreach}
                
                </ul>
        	</div>
            
              <textarea id="r101" name="r101" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r101}</textarea>
              <br />{if $mr.aaa}
(Number of additional attachments to this report.)
<input name="r102" type="text" id="r102" style="border: 1px solid #FF771D;width:3em;" value="{$mr.r102}" maxlength="3" />
Page(s) {/if}</td>
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
            <td colspan="2" align="left">12C. DATE <input name="txt_12c" type="text" id="txt_12c" style="border: 1px solid #FF771D;" size="10" readonly="readonly" value="{$mr.r12c}" maxlength="20" /><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_12c);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a></td>
          </tr>
          <tr>
          	<td colspan="2" align="left">AT THE TIME OF THE INSPECTION THE PROPERTY WAS:&nbsp;&nbsp;&nbsp;<br />
              <input type="checkbox" id="vacant" name="vacant" {if $mr.vacant}checked{/if} />
            Vacant &nbsp;&nbsp;&nbsp;<input type="checkbox" id="occupied" name="occupied" {if $mr.occupied}checked{/if} />
            Occupied 
            &nbsp;&nbsp;&nbsp;<input type="checkbox" id="unfurnished" name="unfurnished" {if $mr.unfurnished}checked{/if} />
            Unfurnished 
            &nbsp;&nbsp;&nbsp;<input type="checkbox" id="furnished" name="furnished" {if $mr.furnished}checked{/if} />
            Furnished</td>
          </tr>
          
          <tr>
            <td colspan="2" align="left"><table width="100%">
              <tr>
                <td align="center" colspan="3"><strong>CONDITIONS CONDUCIVE TO INFESTATION</strong></td>
              </tr>
              <tr>
                <td colspan="3"> 15. WOOD TO EARTH CONTACT (EC)
                  <input name="r15" value="2" type="radio" {if $mr.r15==2}checked{/if} /> Yes,
                  <input name="r15" value="1" type="radio"  {if $mr.r15==1}checked{/if} />
                  No &nbsp;&nbsp;&nbsp;&nbsp; (<i><u>If YES, check mark and explain conditions conducive)</u></i></td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r151" name="r151" {if $mr.r151}checked{/if} />
                  Fence Abutting Structure<br />
                  <input type="checkbox" id="r152" name="r152" {if $mr.r152}checked{/if} />
                  Concrete Form Boards<br />
                  <input type="checkbox" id="r153" name="r153" {if $mr.r153}checked{/if} />
                  Porch Post </td>
                <td><input type="checkbox" id="r154" name="r154" {if $mr.r154}checked{/if} />
                  Pier Post<br />
                  <input type="checkbox" id="r155" name="r155" {if $mr.r155}checked{/if} />
                  Porch Stairs<br />
                  <input type="checkbox" id="r156" name="r156" {if $mr.r156}checked{/if} />
                  Trellis </td>
                <td><input type="checkbox" id="r157" name="r157" {if $mr.r157}checked{/if} />
                  Plantings/Planters Contacting Structure<br />
                  <input type="checkbox" id="r158" name="r158" {if $mr.r158}checked{/if} />
                  Other
                  <input name="r159" type="text" id="r159" value="{$mr.r159}" style="border: 1px solid #FF771D;"/></td>
              </tr>
              <tr>
                <td colspan="3"> Comments :<br />
                
                 <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list15">
                  <ul style="padding:0;margin:0;">
                {section name=j loop=$mlist}
               {if $mlist[j].report_15!=""}
                <li>{$mlist[j].report_15}</li>
                {/if}
                {if $mlist[j].report_151!=""}
                <li>{$mlist[j].report_151}</li>
                {/if}
                {if $mlist[j].report_152!=""}
                <li>{$mlist[j].report_152}</li>
                {/if}
                {/section}
                {foreach from=$mre item=foo}
                 {if $foo.r1510 != ""}	
                 	 <li>{$foo.r1510}</li>
              {/if}
              {/foreach}
                
                </ul>
        	</div>
           
                  <textarea id="r1510" name="r1510" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r1510}</textarea></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 16. EXCESSIVE CELLULOSE DEBRIS (CD)
              <input type="radio"  value="2" name="r16"{if $mr.r16==2}checked{/if} />
              Yes,
              <input type="radio"  name="r16" value="1" {if $mr.r16==1}checked{/if}/>
              No &nbsp;&nbsp;&nbsp;&nbsp; <i><u>(If YES, check mark and explain conditions conducive)</u></i><br />
              Comments :<br />
            
               <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list16">
                 <ul style="padding:0;margin:0;">
                 {section name=j loop=$mlist}
               {if  $mlist[j].report_16!=""}
                <li>{$mlist[j].report_16}</li>
                {/if}
                {if $mlist[j].report_161!=""} 
                <li>{$mlist[j].report_161}</li>
                {/if}
                {if $mlist[j].report_162!=""}
                <li>{$mlist[j].report_162}</li>
                {/if}
                 {/section}
                 {foreach from=$mre item=foo}
                 {if $foo.r161 != ""}	
                 	 <li>{$foo.r161}</li>
              {/if}
              {/foreach}

                </ul>
        	</div>
           
              <textarea id="r161" name="r161" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r161}</textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 17. FAULTY GRADES (FG)
              <input type="radio"  name="r17" value="2" {if $mr.r17==2}checked{/if} />
              Yes,
              <input type="radio"  name="r17" value="1" {if $mr.r17==1}checked{/if} />
              No &nbsp;&nbsp;&nbsp;&nbsp;<i><u>(If YES, check mark and explain conditions conducive)</u></i><br />
              <table width="100%">
                <tr>
                  <td><input type="checkbox" id="r171" name="r171" {if $mr.r171}checked{/if} />
                    Slope; surface water tends to drain toward house<br />
                    <input type="checkbox" id="r172" name="r172" {if $mr.r172}checked{/if} />
                    Floor level at or below grade<br />
                    <input type="checkbox" id="r173" name="r173" {if $mr.r173}checked{/if} />
                    Wood siding below grade </td>
                  <td width="50%"><input type="checkbox" id="r174" name="r174" {if $mr.r174}checked{/if} />
                    Stucco at or below grade<br />
                    <input type="checkbox" id="r175" name="r175" {if $mr.r175}checked{/if} />
                    Joists in crawl space less than 18" above grade<br />
                    <input type="checkbox" id="r176" name="r176" {if $mr.r176}checked{/if} />
                    Other
                    <input name="r177" type="text" id="r177" style="border: 1px solid #FF771D;" value="{$mr.r177}" /></td>
                </tr>
                <tr>
                  <td colspan="2"> Comments : <br />
                 
                   <div style= "border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list17">
                   <ul style="padding:0;margin:0;">
                    {section name=j loop=$mlist}
                    {if $mlist[j].report_17!=""}
                    <li>{$mlist[j].report_17}</li>
                     {/if}
                     {if $mlist[j].report_171!=""}
                    <li>{$mlist[j].report_171}</li>
                    {/if}
                     {if $mlist[j].report_172!=""}
                    <li>{$mlist[j].report_172}</li>
                    {/if}
                     {/section}
                    {foreach from=$mre item=foo}
                	 {if $foo.r178 != ""}	
                 	 <li>{$foo.r178}</li>
                 	 {/if}
                  {/foreach}

                    </ul>
                </div>
               
                    <textarea id="r178" name="r178" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r178}</textarea></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 18. EXCESSIVE MOISTURE (EM)
              <input type="radio"  name="r18" value="2" {if $mr.r18==2}checked{/if}/>
              Yes,
              <input type="radio" name="r18" value="1" {if $mr.r18==1}checked{/if} />
              No &nbsp;&nbsp;&nbsp;&nbsp;<i><u>(If YES, check mark and explain conditions conducive)</u></i><br />
              <table width="100%">
                <tr>
                  <td><input type="checkbox" id="r181" name="r181" {if $mr.r181}checked{/if} />
                    Standing water<br />
                    <input type="checkbox" id="r182" name="r182" {if $mr.r182}checked{/if} />
                    Sprinklers Hitting Structure<br />
                    <input type="checkbox" id="r183" name="r183" {if $mr.r183}checked{/if} />
                    Crawl Space/Water Leaking </td>
                  <td><input type="checkbox" id="r184" name="r184" {if $mr.r184}checked{/if} />
                    Water Damage<br />
                    <input type="checkbox" id="r185" name="r185" {if $mr.r185}checked{/if} />
                    Water Stain<br />
                    <input type="checkbox" id="r186" name="r186" {if $mr.r186}checked{/if} />
                    Improper Condensate Drainage </td>
                  <td><input type="checkbox" id="r187" name="r187" {if $mr.r187}checked{/if} />
                    Bath/Shower/Toilet Leaking<br />
                    <input type="checkbox" id="r188" name="r188" {if $mr.r188}checked{/if} />
                    Plumbing Leaks<br />
                    <input type="checkbox" id="r189" name="r189" {if $mr.r189}checked{/if} />
                    Attic/Roof Leak </td>
                  <td><input type="checkbox" id="1810" name="r1810" {if $mr.r1810}checked{/if} />
                    Inadequate Ventilation<br />
                    <input type="checkbox" id="r1811" name="r1811"  {if $mr.r1811}checked{/if}/>
                    Other
                    <input name="r1812" type="text" id="r1812" value="{$mr.r1812}" style="border: 1px solid #FF771D;"/></td>
                </tr>
                <tr>
                  <td colspan="4"> Comments : <br />
                 
                   <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list18">
                    <ul style="padding:0;margin:0;">
                     {section name=j loop=$mlist}
                    {if $mlist[j].report_18 !=""}
                    <li>{$mlist[j].report_18}</li>
                    {/if}
                    {if $mlist[j].report_181!=""}
                    <li>{$mlist[j].report_181}</li>
                    {/if}
                    {if $mlist[j].report_182!=""}
                    <li>{$mlist[j].report_182}</li>
                    {/if}
                    {/section}
                     {foreach from=$mre item=foo}
                	 {if $foo.r1813 != ""}	
                 	 <li>{$foo.r1813}</li>
                 	 {/if}
                  {/foreach}
                </ul>
        	</div>
           
                    <textarea id="r1813" name="r1813" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r1813}</textarea></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2" align="left"> 19. INACCESSIBLE AREAS (IA)
              <input type="radio"  name="r19" value="2" {if $mr.r19==2}checked{/if} />
              Yes,
              <input type="radio"  name="r19" value="1" {if $mr.r19==1}checked{/if} />
              No &nbsp;&nbsp;&nbsp;&nbsp;<i><u>(If YES, check mark and explain conditions conducive)</u></i><br />
              <table width="100%">
                <tr>
                  <td><input type="checkbox" id="r191" name="r191" {if $mr.r191}checked{/if} />
                    Attic - All<br />
                    <input type="checkbox" id="r192" name="r192" {if $mr.r192}checked{/if} />
                    Attic - joists<br />
                    <input type="checkbox" id="r193" name="r193" {if $mr.r193}checked{/if} />
                    Attic - Partial<br />
                    <input type="checkbox" id="r194" name="r194" {if $mr.r194}checked{/if} />
                    Plumbing Traps </td>
                  <td><input type="checkbox" id="r195" name="r195" {if $mr.r195}checked{/if}/>
                    Floors<br />
                    <input type="checkbox" id="r196" name="r196"  {if $mr.r196}checked{/if}/>
                    Wall Interiors<br />
                    <input type="checkbox" id="r197" name="r197" {if $mr.r197}checked{/if}/>
                    Enclosed Stairwell<br />
                    <input type="checkbox" id="r198" name="r198" {if $mr.r198}checked{/if}/>
                    Dropped Ceilings </td>
                  <td><input type="checkbox" id="r199" name="r199" {if $mr.r199}checked{/if}/>
                    Sub/Crawl Space Area - Clearance<br />
                    <input type="checkbox" id="r1910" name="r1910" {if $mr.r1910}checked{/if}/>
                    Sub Area/Crawl Space No Access<br />
                    <input type="checkbox" id="r1911" name="r1911" {if $mr.r1911}checked{/if}/>
                    Areas Obstructed By Furniture Or Stored Articles<br />
                    <input type="checkbox" id="r1912" name="r1912" {if $mr.r1912}checked{/if}/>
                    Other
                    <input name="r1913" type="text" id="r1913" value="{$mr.r1913}" style="border: 1px solid #FF771D;"/></td>
                </tr>
                <tr>
                  <td colspan="3"> Comments :<br />
                 
                   <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list19">
                    <ul style="padding:0;margin:0;">
                    {section name=j loop=$mlist}
                    {if $mlist[j].report_19 !=""}
                    <li>{$mlist[j].report_19}</li>
                    {/if}
                    {if $mlist[j].report_191 !=""}
                    <li>{$mlist[j].report_191}</li>
                    {/if}
                    {if $mlist[j].report_192!=""}
                    <li>{$mlist[j].report_192}</li>
                    {/if}
                   {/section}
                   {foreach from=$mre item=foo}
                	 {if $foo.r1914 != ""}	
                 	 <li>{$foo.r1914}</li>
                 	 {/if}
                  {/foreach}
                    
                 
                    </ul>
        	</div>
           
                    <textarea id="r1914" name="r1914" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r1914}</textarea></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="center" colspan="2"><strong>20. EVIDENCE OF PREVIOUS TREATMENT </strong></td>
          </tr>
          <tr>
            <td colspan="2" align="left"><input type="checkbox" id="r201" name="r201" {if $mr.r201}checked{/if} />
              BY ANOTHER COMPANY: While evidence of previous treatment does exist, it is impossible for the inspecting company to ascertain if such treatment was properly performed. Further investigation is left to the Buyer's discretion to determine if such treatment was done properly and if valid guarantee exists against the target pest of such treatment.<br />
              <input type="checkbox" id="r202" name="r202" {if $mr.r202}checked{/if} />
              BY THE INSPECTING COMPANY: Previous treatment is recorded for this property. At the buyer's discretion, the treatment records may be viewed at the inspecting company's local office.<br />
              <table width="100%">
                <tr>
                  <td> Account Number </td>
                  <td><input name="r203" type="text" id="r203" style="border: 1px solid #FF771D;" value="{$mr.r203}" maxlength="19" /></td>
                  <td> Date of Initial Treatment </td>
                  <td><input name="rtxt_204" type="text" id="r204" style="border: 1px solid #FF771D;" size="10" readonly="readonly" value="{if $mr.r204}{$mr.r204}{/if}" maxlength="12"/>
                  	<a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.rtxt_204);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a>
                  </td>
                </tr>
                <tr>
                  <td> Target Pest </td>
                  <td><input name="r205" type="text" id="r205" style="border: 1px solid #FF771D;" value="{$mr.r205}" /></td>
                  <td> Warranty Expiration Date </td>
                  <td><input name="rtxt_206" type="text" id="r206" style="border: 1px solid #FF771D;" size="10" readonly="readonly" value="{if $mr.r206}{$mr.r206}{/if}" maxlength="12"/>
                  	<a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.rtxt_206);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a>
                  </td>
                </tr>
                <tr>
                  <td> Other </td>
                  <td colspan="3">&nbsp;</td>
                </tr>
              </table>
            <input type="text" style="border: 1px solid #FF771D;width:34em;" id="r207" name="r207" value="{$mr.r207}" /></td>
          </tr>
          <tr>
            <td colspan="2" align="left"><strong>Pest&nbsp;&nbsp;&nbsp;&nbsp;Control&nbsp;&nbsp;&nbsp;&nbsp;Inspector's&nbsp;&nbsp;&nbsp;&nbsp;Additional&nbsp;&nbsp;&nbsp;&nbsp;Comments :</strong><br />
            <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;" id="list20">
                    <ul style="padding:0;margin:0;">
                    {section name=j loop=$mlist}
                    {if $mlist[j].report_20 !=""}
                    <li>{$mlist[j].report_20}</li>
                    {/if}
                    {if $mlist[j].report_201 !=""}
                    <li>{$mlist[j].report_201}</li>
                    {/if}
                    {if $mlist[j].report_202!=""}
                    <li>{$mlist[j].report_202}</li>
                    {/if}
                   {/section}
                   {foreach from=$mre item=foo}
                	 {if $foo.r208 != ""}	
                 	 <li>{$foo.r208}</li>
                 	 {/if}
                  {/foreach}
                  
                 
                    </ul>
        	</div>
            <textarea id="r208" name="r208" cols="50" rows="5" style="border: 1px solid #FF771D;">{$mr.r208}</textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><strong>PURSUANT TO: R4-29307 (E)(1) THROUGH(5)&amp;(a)THROUGH(p) THE INSPECTOR MUST COMPLETE THE GRAPH ON PAGE(3) FOR ANY NOTED ITEMS WHICH ARE CHECK(&radic;)MARKED BELOW</strong></td>
          </tr>
          <tr>
            <td colspan="2" ><table width="100%" border="0" style="border:1px solid;" align="left">
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
                <td><input type="checkbox" id="r211" name="r211" {if $mr.r211}checked{/if} /></td>
                <td colspan="2" align="left"> SU Subterranean Termites </td>
                <td><input type="checkbox" id="r216" name="r216" {if $mr.r216}checked{/if} /></td>
                <td colspan="2" align="left">OW Other Wood Destroying Insects(*)</td>
                <td><input type="checkbox" id="r2111" name="r2111"  {if $mr.r2111}checked{/if}/></td>
                <td colspan="2" align="left">OB Obstructions</td>
                <td><input type="checkbox" id="r2116" name="r2116" {if $mr.r2116}checked{/if}/></td>
                <td colspan="2" align="left">WD Water Damage</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r212" name="r212" {if $mr.r212}checked{/if} /></td>
                <td colspan="2" align="left">DR Drywood Termites</td>
                <td><input type="checkbox" id="r217" name="r217" {if $mr.r217}checked{/if} /></td>
                <td colspan="2" align="left"> FG Faulty Grade </td>
                <td><input type="checkbox" id="r2112" name="r2112" {if $mr.r2112}checked{/if} /></td>
                <td colspan="2" align="left">IA Inaccessible</td>
                <td><input type="checkbox" id="r2117" name="r2117" {if $mr.r2117}checked{/if}/></td>
                <td colspan="2" align="left">WS Water Stains</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r213" name="r213"  {if $mr.r213}checked{/if}/></td>
                <td colspan="2" align="left">DA Dampwood Termites</td>
                <td><input type="checkbox" id="r218" name="r218" {if $mr.r218}checked{/if} /></td>
                <td colspan="2" align="left">EC Wood To Earth Contact</td>
                <td><input type="checkbox" id="r2113" name="r2113" {if $mr.r2113}checked{/if}/></td>
                <td colspan="2" align="left">IV Inadequate Ventilation</td>
                <td><input type="checkbox" id="r2118" name="r2118" {if $mr.r2118}checked{/if}/></td>
                <td colspan="2" align="left">RL Roof Leaks</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r214" name="r214" {if $mr.r214}checked{/if} /></td>
                <td colspan="2" align="left">BE Wood Destroying Beetles</td>
                <td><input type="checkbox" id="r219" name="r219" {if $mr.r219}checked{/if}/></td>
                <td colspan="2" align="left">CE Cellulose Debris</td>
                <td><input type="checkbox" id="r2114" name="r2114" {if $mr.r2114}checked{/if}/></td>
                <td colspan="2" align="left">PL Plumbing Leaks</td>
                <td><input type="checkbox" id="r2119" name="r2119" {if $mr.r2119}checked{/if}/></td>
                <td colspan="2">EM Excessive Moisture</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="r215" name="r215" {if $mr.r215}checked{/if}/></td>
                <td colspan="2" align="left">CA Carpenter Ants</td>
                <td><input type="checkbox" id="r2110" name="r2110" {if $mr.r2110}checked{/if}/></td>
                <td colspan="2" align="left">PA Plantings Abutting Structure</td>
                <td><input type="checkbox" id="r2115" name="r2115" {if $mr.r2115}checked{/if}/></td>
                <td colspan="2" align="left">SP Sprinkler Hitting Structure</td>
                <td><input type="checkbox" id="r2120" name="r2120" {if $mr.r2120}checked{/if}/></td>
                <td colspan="2" align="left">FI Further Inspection Needed</td>
              </tr>
              <tr>
                <td colspan="12"> (*) Other Wood Destroying Insects </td>
              </tr>
            </table></td>
          </tr>
          {if $mr.image}
          <tr>
          	<td colspan="2" align="left">
            	<img src="{$site.base_url}uploads/report/{$mr.image}" width="150" height="100"  alt="" /> <input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" > Delete file.
            </td>
          </tr>
          {/if}
          <tr>
          	<td colspan="2" align="left">
            	Upload Image : <input type="file"  id="attach_1" name="attach_1" style="width:15em;" />
				<input name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.image}" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <font style="color:#F00;"> (Recommended image size is 500px X 500px)</font></td>
          </tr>
          <tr>
            <td colspan="2" align="left"><div>
              <table>
           	    <tr>
                   	  <td><font face="Arial, Helvetica, sans-serif" size="2">Inspected By</font> </td>
                      <td><select id="sel_inspected" name="sel_inspected"   style="border: 1px solid #FF771D;">
                        <option value="">Select inspector</option>
                        
                   	    
                                    {section name=i loop=$inspector}
                                        
                   	    
                        <option value="{$inspector[i].id}">{$inspector[i].name}</option>
                        
                   	    
                                    {/section}
                                
               	      
                      </select></td>
                      <td><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</font></td>
                      <td><input type="password" id="txt_pass"   name="txt_pass" style="border: 1px solid #FF771D;" onkeyup="xajax_chkpassname(sel_inspected.value,this.value,reid.value)"  /></td>
                      <td><input type="hidden" name="txt_check_print" id="txt_check_print" value="print" />
                      	<input type="hidden" name="txt_check_email" id="txt_check_email"  value="email"/>
                      </td>
                    </tr>
                  </table>
                <div id="Msg_username" class="text_error" style="padding-left:1em;"></div>
                
              	{if $mr.id}<br />
              	E-mail 1 : &nbsp;&nbsp; <input type="text" id="txt_email1" name="txt_email1"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;">{$mr.email1}</span>{if $mr.invoice_id}<input name="txt_attached1" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /> <br />

				E-mail 2 : &nbsp;&nbsp; <input type="text" id="txt_email2" name="txt_email2" style="border: 1px solid #FF771D;" /> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;">{$mr.email2}</span>{if $mr.invoice_id}<input name="txt_attached2" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /><br />

                E-mail 3 : &nbsp;&nbsp; <input type="text" id="txt_email3" name="txt_email3"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;">{$mr.email3}</span>{if $mr.invoice_id}<input name="txt_attached3" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /><br />

                E-mail 4 : &nbsp;&nbsp; <input type="text" id="txt_email4" name="txt_email4"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;">{$mr.email4}</span>{if $mr.invoice_id}<input name="txt_attached4" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /><br />

                E-mail 5 : &nbsp;&nbsp; <input type="text" id="txt_email5" name="txt_email5"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-family:Arial, Helvetica, sans-serif;font-size:12px;">{$mr.email5}</span>{if $mr.invoice_id}<input name="txt_attached5" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}
				{/if}</div>
                </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              {if $mr.id}<a  onclick="javascript:OpenSubWin('{$site.base_url}print_history/print_report/id/{$mr.id}','550','500','1');"  title="Click here to show report history"><img src="{$site.theme_url}pics/updatehistory.png" border="0" /></a>&nbsp;&nbsp;&nbsp;<a onclick="javascript:OpenSubWin('{$site.base_url}print_history/print_mail/id/{$mr.id}','550','500','1');" title="Click here to show email history"><img src="{$site.theme_url}pics/emailhistory.png" border="0" /></a>&nbsp;&nbsp;&nbsp;<img src="{$site.theme_url}pics/sendemail.png" alt="Click here to send email" border="0" onclick="sm_frm(frm,'{$site.base_url}customer/send_email','_self',2)" />
              &nbsp;&nbsp;&nbsp;<img src="{$site.theme_url}pics/print.png" alt="Export to pdf" border="0" onclick="sm_frm(frm,'{$site.base_url}customer/r_print/id/{$mr.id}','_blank',1);" />
              &nbsp;&nbsp;&nbsp;
               <img name="txt_update" id="txt_update" src="{$site.theme_url}pics/update.png" border="0" onclick="sm_frm(frm,'{$site.base_url}customer/save','_self',3);" {if $mr.report_history}width="0"{/if} alt="Click here to update" />
               {else}
               <input type="image" src="{$site.theme_url}pics/save.png" />
               
              {/if}
              <input type="hidden" name="txt_new" id="txt_new"  value="{$mr.new}"/>
              </td>
          </tr>
        </table></td>
    </tr>
</table>
</form>

<iframe width=174 height=189 name="gToday:normal:normal.js" id="gToday:normal:normal.js" src="{$site.base_url}/application/libraries/js/calendar/ipopeng.htm" scrolling="no" frameborder="0" 
style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
{literal}

<style >
div ul li:hover {
	background:#099;
	display:block;
	color:#FFF;
}
div ul li {
	display:block;
	padding:5px;
	font-size:12px;
	background-color:#CCC;
}
</style>
<!--[if lte ie 6]> 
div  {
	position:absolute;
height:100%;
left:200px;
overflow-y:auto; 
}
</style>
<![endif]--> 
<script language="javascript" type="text/javascript" charset="UTF-8">
/* <![CDATA[ */

var _show_list = false;
$().ready(function() {
	$('#r6a').keypress(function() {
		$('div#list6a').hide();
		_show_list = false;
	});
	$('#r6a').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list6a').fadeOut('fast');
		});
		
		$('div#list6a').css('width',self.outerWidth());
		$('div#list6a').fadeIn('fast', function() {
			$('div#list6a li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list6a').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});
	
	$('#r6b').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list6b').fadeOut('fast');
		});		
		$('div#list6b').css('width',self.outerWidth());
		$('div#list6b').fadeIn('fast', function() {
			$('div#list6b li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list6b').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	 
	 $('#r7').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list7').fadeOut('fast');
		});
				
		$('div#list7').css('width',self.outerWidth());
		$('div#list7').fadeIn('fast', function() {
			$('div#list7 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list7').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});
	$('#r8a1').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list8a1').fadeOut('fast');
		});		
		$('div#list8a1').css('width',self.outerWidth());
		$('div#list8a1').fadeIn('fast', function() {
			$('div#list8a1 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list8a1').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	$('#r8a2').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list8a2').fadeOut('fast');
		});		
		$('div#list8a2').css('width',self.outerWidth());
		$('div#list8a2').fadeIn('fast', function() {
			$('div#list8a2 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list8a2').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	$('#r8d2').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list8d').fadeOut('fast');
		});		
		$('div#list8d').css('width',self.outerWidth());
		$('div#list8d').fadeIn('fast', function() {
			$('div#list8d li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list8d').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	}); 
	$('#r8e1').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list8e').fadeOut('fast');
		});		
		$('div#list8e').css('width',self.outerWidth());
		$('div#list8e').fadeIn('fast', function() {
			$('div#list8e li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list8e').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});   
	
	$('#r101').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list10').fadeOut('fast');
		});		
		$('div#list10').css('width',self.outerWidth());
		$('div#list10').fadeIn('fast', function() {
			$('div#list10 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list10').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});   
	$('#r1510').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list15').fadeOut('fast');
		});		
		$('div#list15').css('width',self.outerWidth());
		$('div#list15').fadeIn('fast', function() {
			$('div#list15 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list15').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	}); 
	$('#r161').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list16').fadeOut('fast');
		});		
		$('div#list16').css('width',self.outerWidth());
		$('div#list16').fadeIn('fast', function() {
			$('div#list16 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list16').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	
	$('#r178').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list17').fadeOut('fast');
		});		
		$('div#list17').css('width',self.outerWidth());
		$('div#list17').fadeIn('fast', function() {
			$('div#list17 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list17').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	$('#r1813').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list18').fadeOut('fast');
		});		
		$('div#list18').css('width',self.outerWidth());
		$('div#list18').fadeIn('fast', function() {
			$('div#list18 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list18').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	$('#r1914').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list19').fadeOut('fast');
		});		
		$('div#list19').css('width',self.outerWidth());
		$('div#list19').fadeIn('fast', function() {
			$('div#list19 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list19').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  
	
	$('#r208').focus(function() {
		_show_list = false;
		var self = $(this);
		self.blur(function() {
			if(!_show_list)
				$('div#list20').fadeOut('fast');
		});		
		$('div#list20').css('width',self.outerWidth());
		$('div#list20').fadeIn('fast', function() {
			$('div#list20 li').click(function() {
				var a =$(this).html();
				a = a.replace(/<br>/g, '\n');
				self.val(a);
				$('div#list20').hide();
			});
			
			$(this).focus(function() {
				_show_list = true;
			});
			
		});
		
	});  

	
});

			
	function sm_frm(frm,action,target,str){
		if (str ==1)
		  {	
		  	if (document.getElementById('txt_check_print').value=="print")
		  		alert("The report will print out no inspector's sign on your report.\n If you want print out inspector's authorized signed report, enter inspector's password.");
		  }
		if (str == 2)
		  {
			  if (document.getElementById('txt_check_email').value=="email")
				 alert("The e-mailed report has without inspector's signature if you did not enter inspector's password");
				 
		  }
		  frm.target=target;
		  frm.action = action;
		  frm.submit();
	}
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? 'yes' : 'no';
	
	  var paramz = 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=yes,scrollbars='+sbt+',width='+w+',height='+h+'';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
	
	function show_pass(checked)
	{
		if (checked==false) //enable password
		{
			document.frm.txt_pass.disabled = true;
			document.frm.btn_check.disabled = true;
		}
		else
		{
			document.frm.txt_pass.disabled = false;
			document.frm.btn_check.disabled = false;	
		}
	}
	
/* ]]> */

</script>
<script>
function confir()
{
	if(confirm("aa")){
		   alert('aa');
		   }else{
			   alert('bb');
			  }	
}

</script>
{/literal}

{$xajax_js}

{literal}
<script type="text/javascript">
  xajax.callback.global.onRequest = function() {
	  //xajax.$('loading_message').style.display = 'block';
	  xajax.$('Msg_username').innerHTML = "Loading... ";
	  }
  xajax.callback.global.beforeResponseProcessing = function() {
	  //xajax.$('loading_message').style.display='none';
 }
 
  
</script>

{/literal}