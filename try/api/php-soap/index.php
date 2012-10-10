<?php
/* require config file */
include_once('config.php');

/* require language pack */
include_once('lang_pack.php');

/* require countries data */
include_once('countries.php');

/* require languages data */
include_once('languages.php');

/* require format xml functions */
include_once('misc.php');

/* define user type constant */
define('RESELLER_TYPE', 'reseller');
define('CLIENT_TYPE', 'client');
define('EXTENSION_TYPE', 'extension');

/* disable cache */
ini_set('soap.wsdl_cache_enabled', 0);

/* create SOAP client based on WSDL, with trace for debugging */
$client = new SoapClient("https://".$voipnow_ip."/soap/schema/".$voipnow_version."/voipnowservice.wsdl", array('trace' => 1, 'exceptions' => 0));

/* send authentification headers */
$auth->username = $voipnow_username;
$auth->password = $voipnow_password;
$authvalues = new SoapVar($auth, SOAP_ENC_OBJECT, 'http://4psa.com/HeaderData/'.$voipnow_version);
$header = new SoapHeader('http://4psa.com/HeaderData/'.$voipnow_version, 'userCredentials', $authvalues, false);
$client->__setSoapHeaders(array($header));

/* define user account types for account type selection */
$user_type_selection = array('reseller', 'client', 'extension');

/* form data has been send, format SOAP object */
if (!empty($_POST)) {
	if (strtoupper($_POST['country']) == 'US') {
	    $_POST['state'] = $_POST['state_select'];
	}
	/* build the object with posted data */
	$posted = $_POST;
	foreach ($posted as $key => $val) {
		$user_data->$key = $val;
	}

	/* set inplicit control panel access and status */
	$user_data->cpAccess = 1;
	$user_data->status = 1;

	/* setup the billing plan and the tpl from the config file */
	if (isset($template_id)) {
		$user_data->clientTemplateId = $template_id;
	}
	if (isset($billing_plan_id)) {
		$user_data->billingPlanId = $billing_plan_id;
	}

	if ($account_type == 'choose') {
		if (isset($posted['acc_type'])) {
			/* get the value of the account selection field */
			$account = $posted['acc_type'];
		} else {
			$account = 'reseller';
		}
	} else {
		//get the value from config.php
			$account = $account_type;
			$posted['acc_type'] = $account_type;
	}

	/* set inplicit extension type: phone terminal for extension account creation */
	if ($account == EXTENSION_TYPE) {
		$user_data->extensionType = 'term';
	}

	/* setup parent id for account user and send request;
	backup the posted data in case of SOAP fault: data is mentained in the form to be easily modified */
	switch ($account) {
		case RESELLER_TYPE : {
			$user_data->parentClientId = $admin_id;
			$user_data->level = 10;
			$user->$account = $user_data;
			$result = $client->AddReseller($user);
			if (is_soap_fault($result)) {
				$backup = $posted;
			}
			break;
		}
		case CLIENT_TYPE : {
			$user_data->parentClientId = $reseller_id;
			$user_data->level = 50;
			$user->$account = $user_data;
			$result = $client->AddClient($user);
			if (is_soap_fault($result)) {
				$backup = $posted;
			}
			break;
		}
		case EXTENSION_TYPE : {
			$user_data->parentClientId = $client_id;
			$user_data->level = 100;
			$user->$account = $user_data;
			$result = $client->AddExtension($user);
			if (is_soap_fault($result)) {
				$backup = $posted;
			}
			break;
		}
	}
} else {
	$backup=0;
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="style.css">
		<script language="JavaScript" src="functions.js"></script>
		<title><?php echo $msg_arr['pg_title'];?></title>
	</head>
	<body>
	<div class="content">
		<h2><?php echo $msg_arr['pg_add_account'];?></h2>
		<div align="center">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<table class="info_table">
			    <tr><td><?php echo str_replace('{required}', "<span class='required'>*</span>", $msg_arr['required_fields']);?></td></tr>
			    <tr><td><?php echo $msg_arr['validation_info'];?></td></tr>
			</table>

			<!-- display information on extension type only if account type is extension -->
			<div id="ext_type_info" <?php if ($account_type == EXTENSION_TYPE) {?>style="display:block"<?php } else {?>style="display:none"<?php } ?> >
				<table class="ext_info_table">
					<tr><td><?php echo $msg_arr['extension_type'];?></td></tr>
				</table>
			</div>

			<!-- display account selection field only if $account_type = 'choose' in config.php file -->
			<?php if ($account_type == 'choose') { ?>
			<div class="block_title"><?php echo $msg_arr['choose_acc_type'];?></div>
			<table class="form_table">
				<tr>
					<td class="label"><?php echo $msg_arr['account_type'];?></td>
					<td>
						<select name="acc_type" id="acc_type" onChange="display_account(this.value)">
						<?php
						foreach($user_type_selection as $key => $val) {
							$selected = '';
							if ((!isset($backup['acc_type']) && $val == RESELLER_TYPE) || ($backup['acc_type'] == $val)) {
								$selected = 'selected';
							}
						    echo "<option value='" .$val. "' " .$selected. ">" .$val. "</option>";
						}
						?>
						</select>
					</td>
				</tr>
			</table>
			<?php } ?>

			<!-- display extension number field only if account type is extension -->
			<div id="ext_setup" <?php if ((!isset($backup['acc_type']) && $account_type == EXTENSION_TYPE) || ($backup['acc_type'] == EXTENSION_TYPE)) {?>style="display:block"<?php } else {?>style="display:none"<?php } ?>>
				<div class="block_title"><?php echo $msg_arr['info_ext_setup'];?></div>
				<table class="form_table">
					<tr>
						<td class="label"><?php echo $msg_arr['number'];?>&nbsp;<span class='required'>*</span></td>
						<td><input type="text" class="text_long" class="text_long" name="extensionNo" id="extensionNo" value="<?php if (isset($backup)) { echo $backup['extensionNo']; }?>"></td>
					</tr>
				</table>
			</div>

			<!-- display form title relative to the account type defined -->
			<div id="reseller_form" <?php if ((!isset($backup['acc_type']) && ($account_type == 'choose' || $account_type == RESELLER_TYPE)) || ($backup['acc_type'] == RESELLER_TYPE)) {?>style="display:block"<?php } else {?>style="display:none"<?php } ?> >
				<div class="block_title"><?php echo $msg_arr['reseller_form'];?></div>
			</div>
			<div id="client_form" <?php if ((!isset($backup['acc_type']) && $account_type == CLIENT_TYPE) || ($backup['acc_type'] == CLIENT_TYPE)) {?>style="display:block"<?php } else {?>style="display:none"<?php } ?>>
				<div class="block_title"><?php echo $msg_arr['client_form'];?></div>
			</div>
			<div id="extension_form" <?php if ((!isset($backup['acc_type']) && $account_type == EXTENSION_TYPE) || ($backup['acc_type'] == EXTENSION_TYPE)) {?>style="display:block"<?php } else {?>style="display:none"<?php } ?>>
				<div class="block_title"><?php echo $msg_arr['extension_form'];?></div>
			</div>

			<table class="form_table">
				<tr>
					<td class="label"><?php echo $msg_arr['company'];?></td>
					<td><input type="text" class="text_long" name="company" id="company" value="<?php if (isset($backup)) { echo $backup['company']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['contact'];?>&nbsp;<span class="required">*</span></td>
					<td><input type="text" class="text_long" name="name" id="name" value="<?php if (isset($backup)) { echo $backup['name']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['login'];?>&nbsp;<span class="required">*</span></td>
					<td><input type="text" class="text_long" name="login" id="login" value="<?php if (isset($backup)) { echo $backup['login']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['password'];?>&nbsp;<span class="required">*</span></td>
					<td><input type="password" class="text_long" name="password" id="password" value="<?php if (isset($backup)) { echo $backup['password']; }?>">&nbsp;<?php echo $msg_arr['passwd_info'];?></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['phone'];?></td>
					<td><input type="text" class="text_long" name="phone" id="phone" value="<?php if (isset($backup)) { echo $backup['phone']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['fax'];?></td>
					<td><input type="text" class="text_long" name="fax" id="fax" value="<?php if (isset($backup)) { echo $backup['fax']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['email'];?>&nbsp;<span class="required">*</span></td>
					<td><input type="text" class="text_long" name="email" id="email" value="<?php if (isset($backup)) { echo $backup['email']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['address'];?></td>
					<td><input type="text" class="text_long" name="address" id="address" value="<?php if (isset($backup)) { echo $backup['address']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['city'];?></td>
					<td><input type="text" class="text_long" name="city" id="city" value="<?php if (isset($backup)) { echo $backup['city']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['state'];?></td>
					<td>
					<input type="text" class="text_long" <?php if (isset($backup) && $backup['country'] == 'US') { echo 'style="display:none"';}  ?> name="state" id="state" value="<?php if (isset($backup)) { echo $backup['state']; }?>">
					<select name="state_select" id="state_select" <?php if (isset($backup) && $backup['country'] == 'US') { echo 'style="display:block"';} else { echo 'style="display:none"';}?> >
						<?php
						    foreach ($US_states as $key => $val) {
								$selected = '';
								if (isset($backup) && $backup['state_select'] == $key) {
									$selected = 'selected';
								}
								echo "<option value='" .$key. "' "  .$selected. ">" .$val. "</option>";
						    }
						?>
					    </select>
					</td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['pcode'];?></td>
					<td><input type="text" class="text_long" name="pcode" id="pcode" value="<?php if (isset($backup)) { echo $backup['pcode']; }?>"></td>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['country'];?>&nbsp;<span class="required">*</span></td>
					<td>
					<select name="country" id="country" onChange="switch_state_input(this.value)">
					    <?php
						foreach($country as $key => $val) {
						    $selected = '';
						    if (isset($backup) && strtoupper($backup['country']) == $key) {
							$selected = 'selected';
						    }
						    echo "<option value='" .$key. "' " .$selected. ">" .$val. "</option>";
						}
					    ?>
					</select>
				</tr>
				<tr>
					<td class="label"><?php echo $msg_arr['interface_lang'];?>&nbsp;<span class="required">*</span></td>
					<td>
					<select name="InterfaceLang" id="InterfaceLang">
						<option value="-1" <?php if (isset($backup) && $backup['InterfaceLang'] == -1) {?>selected<?php } ?> >Default</option>
						<option value="en" <?php if (isset($backup) && $backup['InterfaceLang'] == 'en') {?>selected<?php } ?> >English</option>
					</select>
					</td>
				</tr>
			</table>

			<!-- display phone language field only if account type is extension -->
			<div id="phone_lang" <?php if ((!isset($backup['acc_type']) && $account_type == EXTENSION_TYPE) || ($backup['acc_type'] == EXTENSION_TYPE)) {?>style="display:block"<?php } else {?>style="display:none"<?php } ?>>
				<table class="form_table">
					<tr>
						<td class="label"><?php echo $msg_arr['phone_lang'];?>&nbsp;<span class="required">*</span></td>
						<td>
						<select name="phoneLang" id="phoneLang">
							<?php
							$language =  array('-1' => 'Default')+ $language;
							foreach($language as $key => $val) {
								$selected = '';
								if (isset($backup) && strtoupper($backup['phoneLang']) == $key) {
								$selected = 'selected';
								}
								echo "<option value='" .$key. "' " .$selected. ">" .$val. "</option>";
							}
							?>
						</select>
						</td>
					</tr>
				</table>
			</div>

			<table class="form_table">
				<tr>
					<td class="label"><?php echo $msg_arr['user_notes'];?></td>
					<td><textarea name="notes" id="notes" rows="5"><?php if (isset($backup)) { echo $backup['notes']; }?></textarea></td>
				</tr>
			</table>

			<div class="block_title"><?php echo $msg_arr['user_billing'];?></div>
			<table class="form_table">
				<tr>
					<td class="label"><?php echo $msg_arr['extra_credit'];?></td>
					<td><input type="text" class="text_long" name="extraCredit" id="extraCredit" value="<?php if (isset($backup)) { echo $backup['extraCredit']; }?>">&nbsp;<?php echo $msg_arr['minutes'];?></td>
				</tr>
			</table>
			<table class="btn_table">
				<tr>
					<td align="right">
					<div class="someBtn">
						<button type="submit" name="bname_ok"><?php echo $msg_arr['btn_ok'];?></button><span><?php echo $msg_arr['btn_ok'];?></span>
					</div>
					</td>
				</tr>
			</table>
		</form>

		<!-- display SOAP request and response -->
		<?php
		if (isset($result)) {
		?>
			<fieldset>
			<legend><?php echo $msg_arr['lg_request'];?></legend>
				<?php
				/* display last SOAP request: formatted for a better view */
				$xml_string = format_xml($client->__getLastRequest());
				$xml_string = implode(">\n<", $xml_string);
				echo "<pre>" . htmlentities($xml_string) . "</pre>";
				?>
			</fieldset>
			<fieldset>
			<legend><?php echo $msg_arr['lg_response'];?></legend>
				<?php
				/* display last SOAP response: formatted for a better view */
				$xml_string = $client->__getLastResponse();
				if (!empty($xml_string)) {
					if ($xml_string = format_xml($client->__getLastResponse())) {
						if ($xml_string = split_faultstring($xml_string, '600')) {
							$xml_string = implode(">\n<", $xml_string);
							echo "<pre>" . htmlentities($xml_string) . "</pre>";
						} else {
							echo $msg_arr['no_answer'];
						}
					}
				} else {
					echo $msg_arr['no_answer'];
				}
				?>
			</fieldset>
		<?php
		}
		?>
		</div>
	</div>
	</body>
</html>
