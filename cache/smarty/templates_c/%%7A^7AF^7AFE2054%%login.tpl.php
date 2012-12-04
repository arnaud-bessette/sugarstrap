<?php /* Smarty version 2.6.11, created on 2012-12-04 15:08:07
         compiled from custom/modules/Users/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'custom/modules/Users/login.tpl', 42, false),array('function', 'sugar_getimagepath', 'custom/modules/Users/login.tpl', 84, false),)), $this); ?>
<!--
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

/*********************************************************************************

 ********************************************************************************/
-->
<script type='text/javascript'>
var LBL_LOGIN_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_SUBMIT'), $this);?>
';
var LBL_REQUEST_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_REQUEST_SUBMIT'), $this);?>
';
var LBL_SHOWOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_SHOWOPTIONS'), $this);?>
';
var LBL_HIDEOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_HIDEOPTIONS'), $this);?>
';
</script>
<div class="span12">
	<div class="login-box">
		<form action="index.php" method="post" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
			<?php if ($this->_tpl_vars['LOGIN_ERROR'] != ''): ?>
			<div class="alert">
				<?php echo $this->_tpl_vars['LOGIN_ERROR']; ?>

				<div class="waiting">
					<?php if ($this->_tpl_vars['WAITING_ERROR'] != ''): ?>
					<?php echo $this->_tpl_vars['WAITING_ERROR']; ?>

					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			
			<input type="hidden" name="module" value="Users">
			<input type="hidden" name="action" value="Authenticate">
			<input type="hidden" name="return_module" value="Users">
			<input type="hidden" name="return_action" value="Login">
			<input type="hidden" id="cant_login" name="cant_login" value="">
			<?php $_from = $this->_tpl_vars['LOGIN_VARS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['var']):
?>
			<input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['var']; ?>
">
			<?php endforeach; endif; unset($_from); ?>
			
			<?php if (! empty ( $this->_tpl_vars['SELECT_LANGUAGE'] )): ?>
			<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LANGUAGE'), $this);?>
:
			<select style='width: 152px' name='login_language' onchange="switchLanguage(this.value)"><?php echo $this->_tpl_vars['SELECT_LANGUAGE']; ?>
</select>
			<?php endif; ?>

			<label for="user_name"><?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_USER_NAME'), $this);?>
:</label>
			<input type="text" tabindex="1" id="user_name" name="user_name" class="input-block-level" value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' />
			<label for="user_password"><?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_PASSWORD'), $this);?>
:</label>
			<input type="password" tabindex="2" id="user_password" name="user_password" class="input-block-level" value='<?php echo $this->_tpl_vars['LOGIN_PASSWORD']; ?>
' />
			<input title="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_BUTTON_TITLE'), $this);?>
" class="btn btn-large btn-primary" type="submit" tabindex="3" id="login_button" name="Login" value="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_BUTTON_LABEL'), $this);?>
" />
		</form>
		
		<form action="index.php" method="post" name="fp_form" id="fp_form" >
			<div  style="cursor: hand; cursor: pointer; display:<?php echo $this->_tpl_vars['DISPLAY_FORGOT_PASSWORD_FEATURE']; ?>
;" onclick='toggleDisplay("forgot_password_dialog");'>
				<a href='javascript:void(0)'><IMG src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'advanced_search.gif'), $this);?>
" border="0" alt="Hide Options" id="forgot_password_dialog_options"><?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_FORGOT_PASSWORD'), $this);?>
</a>
			</div>

			<div id="forgot_password_dialog" style="display:none" >
				<input type="hidden" name="entryPoint" value="GeneratePassword" />
				<div id="generate_success" class='error' style="display:inline;"></div>
				
				<label for="fp_user_name"><?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_USER_NAME'), $this);?>
:</label>
				<input type="text" id="fp_user_name" name="fp_user_name" class="input-block-level" value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' />
				<label for="fp_user_mail"><?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_EMAIL'), $this);?>
:</label>
				<input type="text" id="fp_user_mail" name="fp_user_mail" class="input-block-level" value='' />
				<?php echo $this->_tpl_vars['CAPTCHA']; ?>

				<div id='wait_pwd_generation'></div>

				<input title="Email Temp Password" class="btn" type="button" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_SUBMIT'), $this);?>
" />
			</div>
		</form>
	</div>
</div>