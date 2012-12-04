{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

*}
{if $USE_GROUP_TABS}
<div class="navbar navbar-fixed-top navbar-inverse" id="moduleList">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    {assign var="groupSelected" value=false}
                    {foreach from=$groupTabs item=modules key=group name=groupList}
                    {capture name=extraparams assign=extraparams}parentTab={$group}{/capture}
                    {if ( ( $smarty.request.parentTab == $group || (!$smarty.request.parentTab && in_array($MODULE_TAB,$modules.modules)) ) && !$groupSelected ) || ($smarty.foreach.groupList.index == 0 && $defaultFirst)}
                    <li class="active">
                        <a href="#" id="grouptab_{$smarty.foreach.groupList.index}">{$group}</a>
                        {assign var="groupSelected" value=true}
                    {else}
                    <li>
                        <a href="#" id="grouptab_{$smarty.foreach.groupList.index}">{$group}</a>
                    {/if}
                    </li>
                    {/foreach}
                </ul>
                {include file="_welcome.tpl" theme_template=true}
            </div>
        </div>
    </div>
</div>

{assign var="groupSelected" value=false}
{foreach from=$groupTabs item=modules key=group name=moduleList}
{capture name=extraparams assign=extraparams}parentTab={$group}{/capture}
<div class="navbar visible-desktop" id="moduleLink_{$smarty.foreach.moduleList.index}" {if ( ( $smarty.request.parentTab == $group || (!$smarty.request.parentTab && in_array($MODULE_TAB,$modules.modules)) ) && !$groupSelected ) || ($smarty.foreach.moduleList.index == 0 && $defaultFirst)}class="selected" {assign var="groupSelected" value=true}{/if}>
    <div class="navbar-inner">
    	<ul class="nav">
	        {foreach from=$modules.modules item=module key=modulekey}
	        <li>
	        	{capture name=moduleTabId assign=moduleTabId}moduleTab_{$smarty.foreach.moduleList.index}_{$module}{/capture}
	        	{sugar_link id=$moduleTabId module=$modulekey data=$module extraparams=$extraparams}
	        </li>
	        {/foreach}
	        {if !empty($modules.extra)}
	        <li class="subTabMore">
	        	<a>>></a>      
		        <ul class="cssmenu">
		        {foreach from=$modules.extra item=submodulename key=submodule}
					<li>
						<a href="{sugar_link module=$submodule link_only=1 extraparams=$extraparams}">{$submodulename}
						</a>
					</li>
		        {/foreach}
		        </ul> 
	        </li>
	        {/if}	        
        </ul>
    </div>
</div>
{/foreach}
{else}
<div id="moduleList">
<ul>
    {foreach from=$moduleTopMenu item=module key=name name=moduleList}
    {if $name == $MODULE_TAB}
    <li class="selected">{sugar_link id="moduleTab_$name" module=$name}
    {else}
    <li>{sugar_link id="moduleTab_$name" module=$name data=$module}
    {/if}
    </li>
    {/foreach}
    {if count($moduleExtraMenu) > 0}
    <li id="moduleTabExtraMenu">
        <a href="#">&gt;&gt;</a><br />
        <ul class="cssmenu">
            {foreach from=$moduleExtraMenu item=module key=name name=moduleList}
            <li>{sugar_link id="moduleTab_$name" module=$name data=$module}
            {/foreach}
        </ul>        
    </li>
    {/if}
</ul>
</div>
{/if}

    {if $AUTHENTICATED}
    {include file="_headerLastViewed.tpl" theme_template=true}
    {include file="_headerShortcuts.tpl" theme_template=true}
    {/if}
