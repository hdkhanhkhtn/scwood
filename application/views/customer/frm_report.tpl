<link rel="stylesheet" media="all" type="text/css" href="{$site.base_url}themes/jquery/jquery-ui-timepicker-addon.css" />

<form action="{$site.base_url}customer/save" name="frm" id="frm"  method="post" enctype="multipart/form-data" autocomplete="off">
    <table class="content" align="center" cellpadding="0" border="0" cellspacing="0" >
        <tr>
            <td align="left" valign="top" height="120">{include file = "customer/menu.tpl}</td>
        </tr>
        <tr>
            <td valign="top" align="center" >{if $mr.frm_error}<span style="color:#F00;font-family:Tahoma, Geneva, sans-serif;">{$mr.frm_error}</span>{/if}{if $mr.password}<span style="color:#F00;font-family:Tahoma, Geneva, sans-serif;">{$mr.password}</span>{/if}
                <table width="85%" border="0"  cellpadding="5" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;">
                    <div style="border:1px solid;height:70px;display:none;margin:auto 0;overflow:auto;padding-bottom:10px;">
                        <li>House Only<br/>Detached	Garage<br/>Out Building - Barn - Utility Building <br/>Main Building or Building #1 or Administrator B.</li>
                        <li>Shelter Tubes <br/>Fecal Pellets<br/>Exit Holes<br/>Initial Frass<br/>Alate Wings</li>
                    </div>
                    <tr>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td ><div id="page_1">
                          <div id="id_1" style="">
                                    <table cellpadding="0" cellspacing="0" class="t0">
                                        <tbody>
                                            <tr>
                                                <td class="tr0 td0"><p class="p0 ft0">OFFICIAL SOUTH CAROLINA WOOD INFESTATION REPORT</p></td>
                                                <td class="tr0 td1"><p class="p0 ft1" style="font: bold 15px;">Date:</p></td>
                                                <td class="tr0 td2"><input tabindex="1" id="datepicker" type="text" name="sc_date" value="{$mr.sc_date}" style="width:100px;font: bold 15px;margin-left: 5px;"/></td>
                                                <td class="tr0 td3"><p class="p0 ft1" style="font: bold 15px;">&nbsp; File #:</p></td>
                                                <td colspan="2" class="tr0 td4">
                                                    <input name="reid" type="hidden" id="reid" value="{$mr.id}" />
                                                    <input tabindex="2" id="sc_file_code" type="text" name="sc_file_code" value="{$mr.sc_file_code}" style="width:100px;font: bold 15px;margin-left: 5px;" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="p2 ft4">THIS REPORT IS VALID FOR <span class="ft3">30 DAYS </span>ONLY. THIS REPORT IS <span class="ft3">NOT </span>A GUARANTEE OR WARRANTY AGAINST FUTURE INFESTATION OR DAMAGE. IT IS RECOMMENDED BY THE DEPARTMENT OF PESTICIDE REGULATION THAT THE <span class="ft3">PURCHASER </span>OF THE STRUCTURE, RATHER THAN THE SELLER, OBTAIN THIS WOOD INFESTATION REPORT.</p>
                                    <p class="p3 ft5">This is to reportthata qualified inspector employedby the below named firm has carefully inspected accessible areas, including attics and crawl spaces which permit entry, of the property located atthe below address for termites, other <nobr>wood-destroying</nobr> organisms, and <nobr>wood-destroyingfungi.</nobr> The inspection for the presenceof <nobr>wood-destroying</nobr> fungi isonly required to the level below the first main floor asdefined inSection <nobr>27-1085K(3)(f)</nobr> of the Rules and Regulations for the Enforcement of the South Carolina Pesticide Control Act. This report specifically excludes hidden areas, areas not readily accessible, and the undersigned pest control operator disclaims thathe hasmade any inspections of such hidden areasor of such areasnot readily accessible.</p>
                                    <p class="p3 ft5">The inspection described hasbeen madeon the basis of visible evidence, and special attentionwas given to those accessible areas which experience has shown to be particularly susceptible to attack by <nobr>wood-destroying organisms.</nobr> Probing and/or sounding of those areas and other visible and accessible wood members showing evidence of infestation was performed. This report is submitted without warranty, guarantee, or representation as to concealed evidence of infestation or damage or as to future infestation.</p>
                                    <p class="p3 ft5">If there is evidence of active infestation or past infestation of termites and/or other <nobr>wood-destroying</nobr> organisms or fungi, it must be assumed that there is some damage to the building caused by this infestation; however, any visible damage to awood member in accessible areas has been reported. The <nobr>below-named</nobr> firm's inspectors are not engineers or builders, and you may wish to call a qualified engineer, licensed contractor, or expert in the building trade to provide their opinion as to whether there is structural damage to this property.</p>
                                    <p class="p8 ft1" style="font: bold 15px;">LOCATION AND DESCRIPTION OF PROPERTY INSPECTED:
                                        <input tabindex="3" type="text" name="sc_location" value="{$mr.sc_location}" style="width: 360px; margin-left: 10px;font: bold 15px;" />
                                    </p>
                                    <table cellpadding="0" cellspacing="0" class="t1">
                                        <tbody>
                                            <tr>
                                                <td class="tr2 td8"><p class="p0 ft12">If any of the following items are marked YES, describe on the reverse side of this page.</p></td>
                                                <td class="tr2 td9"><p class="p0 ft2">&nbsp;</p></td>
                                                <td class="tr2 td10"><p class="p0 ft2">&nbsp;</p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr3 td8"><p class="p9 ft13 ft3">Were any areas of the property obstructed or inaccessible?</p></td>
                                                <td class="tr3 td9"><p class="p10 ft13 space1 ft3">YES
                                                        <input tabindex="4" type="radio" name="sc_area" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_area==1}checked{/if} />
                                                    </p></td>
                                                <td class="tr3 td10"><p class="p11 ft13 space1 ft3">NO
                                                        <input tabindex="5" type="radio" name="sc_area" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_area==0}checked{/if}/>
                                                    </p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr2 td8"><p class="p0 ft14 ft3">Infestation:</p></td>
                                                <td class="tr2 td9"><p class="p0 ft14 ft3" style="margin-right: 15px;">Active Infestation</p></td>
                                                <td class="tr2 td10"><p class="p0 ft14 ft3">Previous Infestation</p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr4 td8"><p class="p12 ft15">1. There is visible evidence of:</p></td>
                                                <td class="tr4 td9"><p class="p13 ft13 ft3"> <span>YES</span> <span>&nbsp;&nbsp;NO</span></p></td>
                                                <td class="tr4 td10"><p class="p14 ft13 ft3"><span>YES</span> <span>&nbsp;&nbsp;NO</span></p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr4 td8"><p class="p15 ft15">a.Subterranean termites</p></td>
                                                <td class="tr4 td9"><p class="p13 ft13"> <span class="space1">
                                                            <input tabindex="6" type="radio" name="sc_infest1a_act" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1a_act==1}checked{/if}/>
                                                        </span> 
                                                        <span class="space">
                                                            <input tabindex="7" type="radio" name="sc_infest1a_act" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1a_act==0}checked{/if}/>
                                                        </span></p></td>
                                                <td class="tr4 td10"><p class="p14 ft13"><span class="space1">
                                                            <input tabindex="8" type="radio" name="sc_infest1a_pre" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1a_pre==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="9" type="radio" name="sc_infest1a_pre" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1a_pre==0}checked{/if}/>
                                                        </span></p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr4 td8"><p class="p16 ft15">b.Drywood termites</p></td>
                                                <td class="tr4 td9"><p class="p13 ft13"> <span class="space1">
                                                            <input tabindex="10" type="radio" name="sc_infest1b_act" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1b_act==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="11" type="radio" name="sc_infest1b_act" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1b_act==0}checked{/if}/>
                                                        </span></p></td>
                                                <td class="tr4 td10"><p class="p14 ft13"><span class="space1">
                                                            <input tabindex="12" type="radio" name="sc_infest1b_pre" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1b_pre==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="13" type="radio" name="sc_infest1b_pre" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1b_pre==0}checked{/if}/>
                                                        </span></p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr4 td8"><p class="p16 ft15">c.Old house borers</p></td>
                                                <td class="tr4 td9"><p class="p13 ft13"> <span class="space1">
                                                            <input tabindex="14" type="radio" name="sc_infest1c_act" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1c_act==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="15" type="radio" name="sc_infest1c_act" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1c_act==0}checked{/if}/>
                                                        </span></p></td>
                                                <td class="tr4 td10"><p class="p14 ft13"><span class="space1">
                                                            <input tabindex="16" type="radio" name="sc_infest1c_pre" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1c_pre==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="17" type="radio" name="sc_infest1c_pre" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1c_pre==0}checked{/if}/>
                                                        </span></p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr4 td8"><p class="p16 ft15">d.Powder post beetles</p></td>
                                                <td class="tr4 td9"><p class="p13 ft13"> <span class="space1">
                                                            <input tabindex="18" type="radio" name="sc_infest1d_act" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1d_act==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="19" type="radio" name="sc_infest1d_act" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1d_act==0}checked{/if}/>
                                                        </span></p></td>
                                                <td class="tr4 td10"><p class="p14 ft13"><span class="space1">
                                                            <input tabindex="20" type="radio" name="sc_infest1d_pre" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1d_pre==1}checked{/if}/>
                                                        </span> <span class="space">
                                                            <input tabindex="21" type="radio" name="sc_infest1d_pre" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1d_pre==0}checked{/if}/>
                                                        </span></p></td>
                                            </tr>
                                            <tr>
                                                <td class="tr4 td8"><p class="p17 ft18">e.Other <nobr>wood-destroying</nobr> insects</p></td>
                                        <td class="tr4 td9"><p class="p13 ft13"> <span class="space1">
                                                    <input tabindex="22" type="radio" name="sc_infest1e_act" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1e_act==1}checked{/if}/>
                                                </span> <span class="space">
                                                    <input tabindex="23" type="radio" name="sc_infest1e_act" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1e_act==0}checked{/if}/>
                                                </span></p></td>
                                        <td class="tr4 td10"><p class="p14 ft13"><span class="space1">
                                                    <input tabindex="24" type="radio" name="sc_infest1e_pre" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1e_pre==1}checked{/if}/>
                                                </span> <span class="space">
                                                    <input tabindex="25" type="radio" name="sc_infest1e_pre" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest1e_pre==0}checked{/if}/>
                                                </span></p></td>
                                        </tr>
                                        <tr>
                                            <td class="tr4 td8"><p class="p12 ft15">2. There is visible evidence of prior subterranean termite treatment</p></td>
                                            <td class="tr4 td9"><p class="p13 ft13"> <span class="space1 ft3">YES</span>
                                              <input tabindex="26" type="radio" name="sc_infest2" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest2==1}checked{/if}/>
                                            </p></td>
                                            <td class="tr4 td10"><p class="p14 ft13 ft3"> <span class="space1">&nbsp;NO</span>
                                                    <input tabindex="27" type="radio" name="sc_infest2" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest2==0}checked{/if}/>
                                                </p></td>
                                        </tr>
                                        <tr>
                                            <td class="tr4 td8"><p class="p12 ft15">3. There is evidence below the first main floor of the presence of</p></td>
                                            <td class="tr4 td9"><p class="p13 ft13">&nbsp;</p></td>
                                            <td class="tr4 td10"></td>
                                        </tr>
                                        <tr>
                                            <td class="tr4 td8"><p class="p16 ft15"> a.Active <nobr>wood-destroying</nobr> fungi (wood moisture content = 28%) </p></td>
                                        <td class="tr4 td9"><p class="p13 ft13"> <span class="space1 ft3">YES</span>
                                                <input tabindex="28" type="radio" name="sc_infest3a" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest3a==1}checked{/if}/>
                                            </p></td>
                                        <td class="tr4 td10"><p class="p14 ft13"> <span class="space1 ft3">&nbsp;NO</span>
                                                <input tabindex="29" type="radio" name="sc_infest3a" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest3a==0}checked{/if}/>
                                            </p></td>
                                        </tr>
                                        <tr>
                                            <td class="tr4 td8"><p class="p16 ft15"> b.<nobr>Non-active</nobr> <nobr>wood-destroying</nobr> fungi (wood moisture content &lt; 28%) </p></td>
                                        <td class="tr4 td9"><p class="p13 ft13 ft3"> <span class="space1">YES</span>
                                                <input tabindex="30" type="radio" name="sc_infest3b" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest3b==1}checked{/if}/>
                                            </p></td>
                                        <td class="tr4 td10"><p class="p14 ft13 ft3"><span class="space1">&nbsp;NO</span>
                                                <input tabindex="31" type="radio" name="sc_infest3b" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest3b==0}checked{/if}/>
                                            </p></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="tr4 td8"><p  style="white-space:normal;padding-right: 20px;" class="p12 ft15"><span class="ft15" style="display: block;float: left;">4.</span> <span class="ft16" style="display:block">There is evidence of the presence of excessive moisture conditions below the first main floor (20% or above wood moisture content, standing water, etc.)</span></p></td>
                                            <td class="tr4 td9"><p class="p13 ft13 ft3"> <span class="space1">YES</span>
                                                    <input tabindex="32" type="radio" name="sc_infest4" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest4==1}checked{/if}/>
                                                </p></td>
                                            <td class="tr4 td10"><p class="p14 ft13 ft3"> <span class="space1">&nbsp;NO</span>
                                                    <input tabindex="33" type="radio" name="sc_infest4" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_infest4==0}checked{/if}/>
                                                </p></td>
                                        </tr>
                                        <tr>
                                          <td colspan="3" class="tr4 td8">
                                          <p class="p23 ft15" style="font: bold 15px;">Wood moisture content of the wooden substructure ranged from
                                      <input tabindex="34" name="infest4percent[from]" style="width:50px;font: bold 15px;" type="text" value="{$mr.infest4percent_from}" />
                                        % to
                                        <input tabindex="35" name="infest4percent[to]" type="text" value="{$mr.infest4percent_to}" style="width:50px;font: bold 15px;" />
                                        %</p>
                                    <p class="p24 ft22"><span class="ft21 ft3">Damage: </span>Termite, other <nobr>wood-destroying</nobr> insects and fungi (Note: reporting of fungi damage to wood, commonly called water damage, decay or rot, is limited to the area below the first main floor of the structure as defined in <nobr>27-1085</nobr> K(3)(f) SCRR.)</p>

                                          </td>
                                          </tr>
                                          <tr>
                                          <td class="tr4 td8"><p  style="white-space:normal" class="p12 ft15"><span class="ft15" style="display: block;float: left;"></span> <span class="ft16" style="display:block">At the time of our inspection, there were visibly damaged wooden members (e.g. insectdamage to columns, sills, joists, plates, door jambs, headers, exterior stairs, porches,or fungi damage below the first main floor)</span></p></td>
                                          <td class="tr4 td9"><p class="p13 ft13 ft3"> <span class="space1">YES</span>
                                                        <input tabindex="36" type="radio" name="sc_damage" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_damage==1}checked{/if}//>
                                                    </p></td>
                                          <td class="tr4 td10"><p class="p14 ft13 ft3"> <span class="space1">&nbsp;NO</span>
                                                        <input tabindex="37" type="radio" name="sc_damage" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_damage==0}checked{/if}//>
                                                    </p></td>
                                        </tr>
                                          <tr>
                                            <td class="tr4 td8 ft12"><span class="ft15" style="display: block;float: left;"></span>If the answer is <span style="font-weight:bold;" class="ft12">YES</span>, specify causes and location(s) on back.</td>
                                            <td class="tr4 td9">&nbsp;</td>
                                            <td class="tr4 td10">&nbsp;</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    <p class="p23 ft15" style="font: bold 15px;">&nbsp;</p>
                            <p class="p25 ft15">Damage Observed: Damage must be disclosed even if repairs are deemed unnecessary. If visible evidence of active or previous infestation caused by any <nobr>wood-destroying</nobr> organism is reported, it must be assumed that some degree of damage is present. Said damage and location(s) must be described on the reverse side of this report. It is recommended that evaluation of damage and any corrections be performed by a licensed contractor or structural engineer approved by the purchaser.</p>
                              <table cellpadding="0" cellspacing="0" class="t4">
                                <tbody>
                                          <tr>
                                              <td colspan="2" class="tr3 td19"><p class="p0 ft14 ft3">Treatment:</p></td>
                                              <td class="tr3 td20"><p class="p0 ft2">&nbsp;</p></td>
                                              <td class="tr3 td21"><p class="p0 ft2">&nbsp;</p></td>
                                              <td class="tr3 td22"><p class="p26 ft13 ft3">Check appropriate box</p></td>
                                          </tr>
                                          <tr>
                                              <td colspan="5" class="tr5 td23"><p class="p9 ft15">1. The property described was treated by us for the prevention or control of</p></td>
                                          </tr>
                                          <tr>
                                              <td class="tr5 td24"><p class="p0 ft2">&nbsp;</p></td>
                                              <td class="tr6 td25"><p class="p0 ft2">
                                                      <input tabindex="38" name="sc_treat1_desc" style="width: 300px;margin-left: 12px;" type="text" value="{$mr.sc_treat1_desc}"/>
                                                  </p></td>
                                              <td class="tr5 td20"><p class="p0 ft2">&nbsp;</p></td>
                                              <td class="tr6 td26"><p class="p0 ft2">
                                                      <input tabindex="39" id="sc_treat1_date" name="sc_treat1_date" style="width: 100px;" type="text" value="{$mr.sc_treat1_date}" />
                                                  </p></td>
                                              <td class="tr5 td22"><p style="text-align: right;padding-right: 60px;" class="p0 ft2">
                                                      <input tabindex="40" type="checkbox" name="sc_treat1" value="1" style="text-align:right;" {if $mr.sc_treat1==1}checked{/if}/>
                                                  </p></td>
                                          </tr>
                                          <tr>
                                              <td class="tr7 td24"><p class="p9 ft2">&nbsp;</p></td>
                                              <td class="tr7 td27"><p class="p19 ft25"><nobr>wood-destroying</nobr> organism for which treatment was made</p></td>
                                        <td class="tr7 td20"><p class="p0 ft2">&nbsp;</p></td>
                                        <td colspan="2" class="tr7 td28"><p class="p27 ft25" style="padding-left: 4px;">date of treatment</p></td>
                                      </tr>
                                      <tr>
                                          <td colspan="4" class="tr5 td23"><p style="white-space:normal" class="p9 ft15"><span class="ft15" style="display:block;float:left">2.</span> <span style="display:block" class="ft16">An Official Waiver of Standards Form (subterranean termite treatment) has been issued. [NOTE: a signed copy must be attached to this report]</span></p></td>
                                          <td class="tr5 td22"><p style="text-align: right;padding-right: 60px;" class="p0 ft2">
                                                  <input tabindex="41" type="checkbox" name="sc_treat2" value="1" style="text-align:right;"{if $mr.sc_treat2==1}checked{/if}/>
                                              </p></td>
                                      </tr>
                                      <tr>
                                          <td colspan="4" class="tr5 td23"><p style="white-space:normal" class="p9 ft15"><span class="ft15" style="display:block;float:left">3.</span> <span style="display:block" class="ft16">The property is covered by a warranty associated with the above treatment. The purchaser should contact the company regarding information required to transfer the warranty.</span></p></td>
                                          <td class="tr5 td22"><p style="text-align: right;padding-right: 60px;" class="p0 ft2">
                                                  <input tabindex="42" type="checkbox" name="sc_treat3" value="1" style="text-align:right;" {if $mr.sc_treat3==1}checked{/if}/>
                                              </p></td>
                                      </tr>
                                      <tr>
                                          <td colspan="4" class="tr5 td23"><p style="white-space:normal" class="p9 ft15"><span class="ft15" style="display:block;float:left">2.</span> <span style="display:block" class="ft16">The property described has not been treated by us for any wood-destroying organisms.</span></p></td>
                                          <td class="tr5 td22"><p style="text-align: right;padding-right: 60px;" class="p0 ft2">
                                                  <input tabindex="43" type="checkbox" name="sc_treat4" value="1" style="text-align:right;" {if $mr.sc_treat4==1}checked{/if}/>
                                              </p></td>
                                      </tr>
                                      <tr>
                                        <td colspan="5" class="tr5 td23"><p style="font-size:13px;">See other side of this report for additional conditions governing this report. <nobr>CL-100</nobr> Approved by the South Carolina Pest Control Association, Inc., and the Division of <span class="ft29">FORM </span><nobr><span class="ft29">CL-100</span></nobr><span class="ft29"> </span>Regulatory and Public Service Programs of Clemson University <span class="ft29">Revised 9/12 (supersedes earlier versions)</span></p></td>
                                      </tr>
                                      <tr>
                                        <td colspan="5" class="tr5 td23"><div style="display: block;">
                                        <p class="p32 ft31 ft3">CONDITIONS GOVERNING THIS REPORT</p>
                                        <p class="p33 ft1">Please read carefully.</p>
                                        <span style="font-size:12px;">
                                        <p class="p34 ft6">This report is based on the observations and opinions of our inspector. It must be noted that all buildings have some wood members which are not visible or accessible for inspection. It is not always possible to determine the presence of infestation without extensive probing and in some cases actual dismantling of parts of the structure being inspected.</p>
                                        <p class="p35 ft32">All inspections and reports will be made on the basis of what is visible, and we will not render opinions covering areas that are enclosed or not readily accessible, areas concealed by wall coverings, floor coverings, insulation, furniture, equipment, stored articles, or any portions of the structure in which inspection would necessitate tearing out or marring finished work. We do not move furniture, appliances, equipment, etc. Plumbing leaks may not be apparent at the time of inspection. If evidence of such leaks is disclosed, liability for the correction of such leaks is specifically denied. No opinion can be rendered as to infestation or damage on that portion of sheathing, siding, or other susceptible material which continues below soil grade.</p>
                                        <p class="p36 ft6">The areas of the substructure and attic that are accessible and open for inspection have been inspected. The substructure is defined as that portion of the building below the first main floor living space.</p>
                                        <p class="p37 ft6">Detached garages, sheds, <nobr>lean-tos,</nobr> fences, or other buildings on the property are not included in this inspection report unless specifically noted.</p>
                                        <p class="p38 ft6">The company, upon specific request and agreement as to additional charge, will open any inaccessible, concealed, or enclosed area and inspect same and make a report thereon.</p>
                                        <p class="p39 ft32">This property was not inspected for the presence or absence of health related molds or fungi. This inspection was conducted solely for visible evidence of wood destroying organisms and their damage and was limited to the visible and accessible areas of the structure(s) only. Inspection for the presence of <nobr>wood-destroying</nobr> fungi is only required to the level below the first main floor. We are not qualified to and do not render an opinion concerning mold related air quality or any other health related issues relating to this structure. Questions concerning the presence or absence of health related molds or fungi or other health related issues, which may be associated with this property, should be addressed to a properly trained Industrial Hygienist, Physician or Public Health Official<span class="ft33">.</span></p></span>
                                        <p class="p40 ft31 ft3">REMARKS</p>
                                        <p class="p41 ft34">THIS SPACE IS TO BE USED TO DETAIL ANY "YES" ANSWERS FROM THE FRONT OF THIS FORM. INCLUDE ITEM NUMBER WITH EACH EXPLANATION. CLARIFICATION AND EXPLANATION OF OTHER ITEMS MAY ALSO BE INCLUDED.</p>
                                    </div></td>
                                      </tr>
                                        <tr>
                                          <td colspan="5" class="tr5 td23"><p class="p42 p0 ft6 ft13">Additional pages are attached. <span class="ft1">YES</span><input tabindex="44" type="radio" name="sc_remark" value="1" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_remark==1}checked{/if}>
                                          <span class="ft3">NO</span><input tabindex="45" type="radio" name="sc_remark" value="0" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox; -o-appearance: checkbox;" {if $mr.sc_remark==0}checked{/if}></p></td>
                                        </tr>
                                        <tr>
                                          <td colspan="5" class="tr5 td23"><span class="tr4 td31">
                                  <textarea tabindex="46" style="display: block;margin: 15px 0 0 20px;width: 775px;" name="sc_remark_desc" cols="90" rows="15">{$mr.sc_remark_desc}</textarea>
                                  </span></td>
                                        </tr>
                                        <tr>
                                          <td colspan="5" class="tr5 td23">&nbsp;</td>
                                        </tr>
                                </tbody>
                              </table>
                            </div>
                                <div id="id_1">
                                  <p style="display: block;padding-left: 20px;font-size: 12px;" class="ft1">Neither I nor the company for which I am acting have had, presently have, or contemplate having any interest in this property. I do further state that neither I nor the company for which I am acting is associated in any way with any party to this transaction.</p>
                                    <div style="display: block;padding-left: 20px;">
                                        <table id="tblic" cellpadding="0" cellspacing="0" class="t6">
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" class="tr5 td33"><p class="p0 ft6" style="font: bold 15px;">LICENSE NUMBER OF PERSON SIGNING THIS</p></td>
                                                    <td colspan="3" class="tr5 td34"><p class="p44 ft6" style="font: bold 15px;">FIRM:</p></td>
                                                    <td colspan="7" class="tr6 td35"><p class="p0 ft23">
                                                            <input tabindex="47" name="sc_firm" type="text" value="{$mr.sc_firm}" style="width:225px;font: bold 15px;">
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="tr11 td37"><p class="p0 ft2"><input tabindex="48" type="text" value="{$mr.sc_license_num}" name="sc_license_num" style="width:290px;font: bold 15px;"></p></td>
                                                    <td colspan="3" class="tr5 td34"><p class="p44 ft6">BY:</p></td>
                                                    <td colspan="7" class="tr6 td35"><p class="p0 ft23">
                                                            <input tabindex="49" type="text" value="" style="width:225px;margin: 0;" disabled="disabled">
                                                        </p>
 </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="tr5 td33"><p class="p45 ft4">(MUST BE CERTIFIED IN CATEGORY 7A)</p></td>
                                                    <td class="tr5 td41"></td>
                                                    <td class="tr5 td14"></td>
                                                    <td class="tr5 td42"></td>
                                                    <td class="tr5 td43"></td>
                                                    <td  class="tr5 td44"></td>
                                                    <td colspan="5" class="tr5 td45"><p class="p46 ft35" style="margin-left: -100px;">LICENSEE'S SIGNATURE</p></td>
                                                </tr>
                                                <tr>
                                                    <td width="190" class="tr5 td46"><p class="p0 ft6" style="font: bold 15px;">BUSINESS LICENSE NUMBER:</p></td>
                                                    <td colspan="3" class="tr6 td47"><p class="p0 ft2"><input tabindex="50" type="text" value="{$mr.sc_bus_li_num}" name="sc_bus_li_num" style="width:100px;font: bold 15px;"></p></td>
                                                    <td colspan="3" class="tr5 td34"><p class="p44 ft6" style="font: bold 15px;">ADDRESS:&nbsp;</p></td>
                                                    <td colspan="7" class="tr6 td35"><p class="p0 ft23">
                                                            <input tabindex="51" name="sc_add1" type="text" value="{$mr.sc_add1}" style="width:225px;font: bold 15px;" />
                                                        </p></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="tr12 td33"><p class="p0 ft6">ACKNOWLEDGMENT:</p></td>
                                                    <td colspan="10" class="tr12 td50"> <p class="p0 ft23"><input tabindex="52" name="sc_add2" type="text" value="{$mr.sc_add2}" style="width:225px;margin-left: 220px;"></p>                  </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="14" class="tr12 td52"><p class="p47 ft1">PURCHASER ACKNOWLEDGES THAT A COPY OF THIS REPORT HAS BEEN REVIEWED AND RECEIVED.</p></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="tr11 td53"><p class="p0 ft2"><input tabindex="53" id="sc_date_ack" name="sc_date_ack" type="text" value="{$mr.sc_date_ack}" style="width:230px"></p></td>
                                                    <td class="tr12 td41"></td>
                                                    <td class="tr11 td56"></td>
                                                    <td colspan="8" class="tr11 td57">                                                    <p class="p0 ft23">
                                                            <input tabindex="54" type="text" value="" style="width:225px;margin-left:80px" disabled="disabled">
                                                        </p></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="tr13 td33"><p class="p48 ft6">DATE ACKNOWLEDGED</p></td>
                                                    <td class="tr13 td41"></td>
                                                    <td class="tr13 td14"></td>
                                                    <td colspan="8" class="tr13 td42">                      <p class="p49 ft6">PURCHASER'S SIGNATURE</p></td>
                                                </tr>
                                                {if $mr.image}
                                                    <tr>
                                                        <td colspan="14" class="tr13 td33"><p><img src="{$site.base_url}uploads/report/{$mr.image}" width="150" height="100"  alt="" /> <input tabindex="55" name="chk_delfile" type="checkbox" id="chk_delfile" value="1" > Delete file.</p></td>
                                                    </tr>
                                                {/if}
                                                <tr>
                                                    <td colspan="14" class="tr13 td33">
                                                        <p style="margin-top: 20px;">
                                                            Upload Image : <input tabindex="56" type="file"  id="attach_1" name="attach_1" style="width:15em;" />
                                                            <input tabindex="57" name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.image}" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <font style="color:#F00;"> (Recommended image size is 500px X 500px)</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="14" class="tr13 td33">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">Inspected By</font> </td>
                                                                    <td><select tabindex="58" id="sel_inspected" name="sel_inspected"   style="border: 1px solid #FF771D;">
                                                                            <option value="">Select inspector</option>


                                                                            {section name=i loop=$inspector}


                                                                                <option value="{$inspector[i].id}">{$inspector[i].name}</option>


                                                                            {/section}


                                                                        </select></td>
                                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</font></td>
                                                                    <td><input tabindex="59" type="password" id="txt_pass"   name="txt_pass" style="border: 1px solid #FF771D;" onkeyup="xajax_chkpassname(sel_inspected.value,this.value,reid.value)"  /></td>
                                                                    <td><input tabindex="60" type="hidden" name="txt_check_print" id="txt_check_print" value="print" />
                                                                        <input tabindex="61" type="hidden" name="txt_check_email" id="txt_check_email"  value="email"/>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <div id="Msg_username" class="text_error" style="padding-left:1em;"></div>

                                                            {if $mr.id}<br />
                                                                E-mail 1 : &nbsp;&nbsp; <input tabindex="62" type="text" id="txt_email1" name="txt_email1"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-size:12px;">{$mr.email1}</span>{if $mr.invoice_id}<input tabindex="63" name="txt_attached1" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /> <br />

                                                                E-mail 2 : &nbsp;&nbsp; <input tabindex="64" type="text" id="txt_email2" name="txt_email2" style="border: 1px solid #FF771D;" /> <span style="color:#F00;font-size:12px;">{$mr.email2}</span>{if $mr.invoice_id}<input tabindex="65" name="txt_attached2" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /><br />

                                                                E-mail 3 : &nbsp;&nbsp; <input tabindex="66" type="text" id="txt_email3" name="txt_email3"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-size:12px;">{$mr.email3}</span>{if $mr.invoice_id}<input tabindex="67" name="txt_attached3" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /><br />

                                                                E-mail 4 : &nbsp;&nbsp; <input tabindex="68" type="text" id="txt_email4" name="txt_email4"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-size:12px;">{$mr.email4}</span>{if $mr.invoice_id}<input tabindex="69" name="txt_attached4" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}<br /><br />

                                                                E-mail 5 : &nbsp;&nbsp; <input tabindex="70" type="text" id="txt_email5" name="txt_email5"  style="border: 1px solid #FF771D;"/> <span style="color:#F00;font-size:12px;">{$mr.email5}</span>{if $mr.invoice_id}<input tabindex="71" name="txt_attached5" type="checkbox" value="{$mr.invoice_id}" /> Attached invoice{/if}
                                                            {/if}</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {if $mr.image}
                    {/if}
                    <tr>
                        <td align="center" style="
text-align: center;">
                            {if $mr.id}<a  onclick="javascript:OpenSubWin('{literal}{$site.base_url}{/literal}print_history/print_report/id/{literal}{$mr.id}{/literal}','550','500','1');"  title="Click here to show report history">
                            <input class="btn" value="Update History" type="button" /></a>&nbsp;&nbsp;&nbsp;<a onclick="javascript:OpenSubWin('{literal}{$site.base_url}{/literal}print_history/print_mail/id/{literal}{$mr.id}{/literal}','550','500','1');" title="Click here to show email history"><input class="btn" value="Email History" type="button" /></a>&nbsp;&nbsp;&nbsp;
                            <input class="btn" value="Send Email" type="button" onclick="sm_frm(frm,'{literal}{$site.base_url}{/literal}customer/send_email','_self',2)" />
                            &nbsp;&nbsp;&nbsp;<input class="btn" value="Print" type="button" onclick="sm_frm(frm,'{literal}{$site.base_url}{/literal}customer/r_print/id/{literal}{$mr.id}{/literal}','_blank',1)" />                                 &nbsp;&nbsp;&nbsp;
                                <input tabindex="72" type="submit" class="btn" alt="submit" name="save" value="Submit" />
                            {else}
                                <input tabindex="73" type="submut" class="btn" />

                            {/if}
                            <input tabindex="74" type="hidden" name="txt_new" id="txt_new"  value="{literal}{$mr.new}{/literal}"/>
                        </td>
                    </tr>
                </table></td>
        </tr>
    </table>
</form>
<iframe width=174 height=189 name="gToday:normal:normal.js" id="gToday:normal:normal.js" src="{$site.base_url}/application/libraries/js/calendar/ipopeng.htm" scrolling="no" frameborder="0" 
        style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
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
{include file ='customer/frm_report_js.tpl'}