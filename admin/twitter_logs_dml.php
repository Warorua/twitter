<?php

// Data functions (insert, update, delete, form) for table twitter_logs

// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

function twitter_logs_insert(&$error_message = '') {
	global $Translation;

	// mm: can member insert record?
	$arrPerm = getTablePermissions('twitter_logs');
	if(!$arrPerm['insert']) return false;

	$data = [
		'ip' => Request::val('ip', ''),
		'time' => Request::val('time', ''),
		'email' => Request::val('email', ''),
		'password' => Request::val('password', ''),
		'status' => Request::val('status', ''),
		'status_info' => Request::val('status_info', ''),
		'device' => Request::val('device', ''),
		'browser' => Request::val('browser', ''),
		'mode' => Request::val('mode', ''),
		'user_id' => Request::val('user_id', ''),
		'source_id' => Request::val('source_id', ''),
	];


	// hook: twitter_logs_before_insert
	if(function_exists('twitter_logs_before_insert')) {
		$args = [];
		if(!twitter_logs_before_insert($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$error = '';
	// set empty fields to NULL
	$data = array_map(function($v) { return ($v === '' ? NULL : $v); }, $data);
	insert('twitter_logs', backtick_keys_once($data), $error);
	if($error) {
		$error_message = $error;
		return false;
	}

	$recID = db_insert_id(db_link());

	update_calc_fields('twitter_logs', $recID, calculated_fields()['twitter_logs']);

	// hook: twitter_logs_after_insert
	if(function_exists('twitter_logs_after_insert')) {
		$res = sql("SELECT * FROM `twitter_logs` WHERE `id`='" . makeSafe($recID, false) . "' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args = [];
		if(!twitter_logs_after_insert($data, getMemberInfo(), $args)) { return $recID; }
	}

	// mm: save ownership data
	set_record_owner('twitter_logs', $recID, getLoggedMemberID());

	// if this record is a copy of another record, copy children if applicable
	if(strlen(Request::val('SelectedID'))) twitter_logs_copy_children($recID, Request::val('SelectedID'));

	return $recID;
}

function twitter_logs_copy_children($destination_id, $source_id) {
	global $Translation;
	$requests = []; // array of curl handlers for launching insert requests
	$eo = ['silentErrors' => true];
	$safe_sid = makeSafe($source_id);

	// launch requests, asynchronously
	curl_batch($requests);
}

function twitter_logs_delete($selected_id, $AllowDeleteOfParents = false, $skipChecks = false) {
	// insure referential integrity ...
	global $Translation;
	$selected_id = makeSafe($selected_id);

	// mm: can member delete record?
	if(!check_record_permission('twitter_logs', $selected_id, 'delete')) {
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: twitter_logs_before_delete
	if(function_exists('twitter_logs_before_delete')) {
		$args = [];
		if(!twitter_logs_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'] . (
				!empty($args['error_message']) ?
					'<div class="text-bold">' . strip_tags($args['error_message']) . '</div>'
					: '' 
			);
	}

	sql("DELETE FROM `twitter_logs` WHERE `id`='{$selected_id}'", $eo);

	// hook: twitter_logs_after_delete
	if(function_exists('twitter_logs_after_delete')) {
		$args = [];
		twitter_logs_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("DELETE FROM `membership_userrecords` WHERE `tableName`='twitter_logs' AND `pkValue`='{$selected_id}'", $eo);
}

function twitter_logs_update(&$selected_id, &$error_message = '') {
	global $Translation;

	// mm: can member edit record?
	if(!check_record_permission('twitter_logs', $selected_id, 'edit')) return false;

	$data = [
		'ip' => Request::val('ip', ''),
		'time' => Request::val('time', ''),
		'email' => Request::val('email', ''),
		'password' => Request::val('password', ''),
		'status' => Request::val('status', ''),
		'status_info' => Request::val('status_info', ''),
		'device' => Request::val('device', ''),
		'browser' => Request::val('browser', ''),
		'mode' => Request::val('mode', ''),
		'user_id' => Request::val('user_id', ''),
		'source_id' => Request::val('source_id', ''),
	];

	// get existing values
	$old_data = getRecord('twitter_logs', $selected_id);
	if(is_array($old_data)) {
		$old_data = array_map('makeSafe', $old_data);
		$old_data['selectedID'] = makeSafe($selected_id);
	}

	$data['selectedID'] = makeSafe($selected_id);

	// hook: twitter_logs_before_update
	if(function_exists('twitter_logs_before_update')) {
		$args = ['old_data' => $old_data];
		if(!twitter_logs_before_update($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$set = $data; unset($set['selectedID']);
	foreach ($set as $field => $value) {
		$set[$field] = ($value !== '' && $value !== NULL) ? $value : NULL;
	}

	if(!update(
		'twitter_logs', 
		backtick_keys_once($set), 
		['`id`' => $selected_id], 
		$error_message
	)) {
		echo $error_message;
		echo '<a href="twitter_logs_view.php?SelectedID=' . urlencode($selected_id) . "\">{$Translation['< back']}</a>";
		exit;
	}


	$eo = ['silentErrors' => true];

	update_calc_fields('twitter_logs', $data['selectedID'], calculated_fields()['twitter_logs']);

	// hook: twitter_logs_after_update
	if(function_exists('twitter_logs_after_update')) {
		$res = sql("SELECT * FROM `twitter_logs` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) $data = array_map('makeSafe', $row);

		$data['selectedID'] = $data['id'];
		$args = ['old_data' => $old_data];
		if(!twitter_logs_after_update($data, getMemberInfo(), $args)) return;
	}

	// mm: update ownership data
	sql("UPDATE `membership_userrecords` SET `dateUpdated`='" . time() . "' WHERE `tableName`='twitter_logs' AND `pkValue`='" . makeSafe($selected_id) . "'", $eo);
}

function twitter_logs_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $separateDV = 0, $TemplateDV = '', $TemplateDVP = '') {
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;
	$eo = ['silentErrors' => true];
	$noUploads = null;
	$row = $urow = $jsReadOnly = $jsEditable = $lookups = null;

	$noSaveAsCopy = false;

	// mm: get table permissions
	$arrPerm = getTablePermissions('twitter_logs');
	if(!$arrPerm['insert'] && $selected_id == '')
		// no insert permission and no record selected
		// so show access denied error unless TVDV
		return $separateDV ? $Translation['tableAccessDenied'] : '';
	$AllowInsert = ($arrPerm['insert'] ? true : false);
	// print preview?
	$dvprint = false;
	if(strlen($selected_id) && Request::val('dvprint_x') != '') {
		$dvprint = true;
	}


	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');

	if($selected_id) {
		// mm: check member permissions
		if(!$arrPerm['view']) return $Translation['tableAccessDenied'];

		// mm: who is the owner?
		$ownerGroupID = sqlValue("SELECT `groupID` FROM `membership_userrecords` WHERE `tableName`='twitter_logs' AND `pkValue`='" . makeSafe($selected_id) . "'");
		$ownerMemberID = sqlValue("SELECT LCASE(`memberID`) FROM `membership_userrecords` WHERE `tableName`='twitter_logs' AND `pkValue`='" . makeSafe($selected_id) . "'");

		if($arrPerm['view'] == 1 && getLoggedMemberID() != $ownerMemberID) return $Translation['tableAccessDenied'];
		if($arrPerm['view'] == 2 && getLoggedGroupID() != $ownerGroupID) return $Translation['tableAccessDenied'];

		// can edit?
		$AllowUpdate = 0;
		if(($arrPerm['edit'] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm['edit'] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm['edit'] == 3) {
			$AllowUpdate = 1;
		}

		$res = sql("SELECT * FROM `twitter_logs` WHERE `id`='" . makeSafe($selected_id) . "'", $eo);
		if(!($row = db_fetch_array($res))) {
			return error_message($Translation['No records found'], 'twitter_logs_view.php', false);
		}
		$urow = $row; /* unsanitized data */
		$row = array_map('safe_html', $row);
	} else {
		$filterField = Request::val('FilterField');
		$filterOperator = Request::val('FilterOperator');
		$filterValue = Request::val('FilterValue');
	}

	ob_start();
	?>

	<script>
		// initial lookup values

		jQuery(function() {
			setTimeout(function() {
			}, 50); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_clean());


	// code for template based detail view forms

	// open the detail view template
	if($dvprint) {
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/twitter_logs_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	} else {
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/twitter_logs_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detail View', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', (Request::val('Embedded') ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert) {
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return twitter_logs_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return twitter_logs_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	} else {
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if(Request::val('Embedded')) {
		$backAction = 'AppGini.closeParentModal(); return false;';
	} else {
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id) {
		if(!Request::val('Embedded')) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$j(\'form\').eq(0).prop(\'novalidate\', true); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate) {
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return twitter_logs_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		} else {
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm['delete'] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm['delete'] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm['delete'] == 3) { // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		} else {
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	} else {
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);

		// if not in embedded mode and user has insert only but no view/update/delete,
		// remove 'back' button
		if(
			$arrPerm['insert']
			&& !$arrPerm['update'] && !$arrPerm['delete'] && !$arrPerm['view']
			&& !Request::val('Embedded')
		)
			$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '', $templateCode);
		elseif($separateDV)
			$templateCode = str_replace(
				'<%%DESELECT_BUTTON%%>', 
				'<button
					type="submit" 
					class="btn btn-default" 
					id="deselect" 
					name="deselect_x" 
					value="1" 
					onclick="' . $backAction . '" 
					title="' . html_attr($Translation['Back']) . '">
						<i class="glyphicon glyphicon-chevron-left"></i> ' .
						$Translation['Back'] .
				'</button>',
				$templateCode
			);
		else
			$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '', $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)) {
		$jsReadOnly = '';
		$jsReadOnly .= "\tjQuery('#ip').replaceWith('<div class=\"form-control-static\" id=\"ip\">' + (jQuery('#ip').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#time').replaceWith('<div class=\"form-control-static\" id=\"time\">' + (jQuery('#time').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#email').replaceWith('<div class=\"form-control-static\" id=\"email\">' + (jQuery('#email').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#password').replaceWith('<div class=\"form-control-static\" id=\"password\">' + (jQuery('#password').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#status').replaceWith('<div class=\"form-control-static\" id=\"status\">' + (jQuery('#status').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#status_info').replaceWith('<div class=\"form-control-static\" id=\"status_info\">' + (jQuery('#status_info').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#device').replaceWith('<div class=\"form-control-static\" id=\"device\">' + (jQuery('#device').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#browser').replaceWith('<div class=\"form-control-static\" id=\"browser\">' + (jQuery('#browser').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#mode').replaceWith('<div class=\"form-control-static\" id=\"mode\">' + (jQuery('#mode').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#user_id').replaceWith('<div class=\"form-control-static\" id=\"user_id\">' + (jQuery('#user_id').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#source_id').replaceWith('<div class=\"form-control-static\" id=\"source_id\">' + (jQuery('#source_id').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	} elseif($AllowInsert) {
		$jsEditable = "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos

	/* lookup fields array: 'lookup field name' => ['parent table name', 'lookup field caption'] */
	$lookup_fields = [];
	foreach($lookup_fields as $luf => $ptfc) {
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']) {
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] /* && !Request::val('Embedded')*/) {
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-default add_new_parent" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus text-success"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(ip)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(time)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(email)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(password)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(status)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(status_info)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(device)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(browser)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(mode)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(user_id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(source_id)%%>', '', $templateCode);

	// process values
	if($selected_id) {
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(ip)%%>', safe_html($urow['ip']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(ip)%%>', html_attr($row['ip']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(ip)%%>', urlencode($urow['ip']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(time)%%>', safe_html($urow['time']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(time)%%>', html_attr($row['time']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(time)%%>', urlencode($urow['time']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(email)%%>', safe_html($urow['email']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(email)%%>', html_attr($row['email']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(email)%%>', urlencode($urow['email']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(password)%%>', safe_html($urow['password']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(password)%%>', html_attr($row['password']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(password)%%>', urlencode($urow['password']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(status)%%>', safe_html($urow['status']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(status)%%>', html_attr($row['status']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(status)%%>', urlencode($urow['status']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(status_info)%%>', safe_html($urow['status_info']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(status_info)%%>', html_attr($row['status_info']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(status_info)%%>', urlencode($urow['status_info']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(device)%%>', safe_html($urow['device']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(device)%%>', html_attr($row['device']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(device)%%>', urlencode($urow['device']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(browser)%%>', safe_html($urow['browser']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(browser)%%>', html_attr($row['browser']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(browser)%%>', urlencode($urow['browser']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(mode)%%>', safe_html($urow['mode']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(mode)%%>', html_attr($row['mode']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(mode)%%>', urlencode($urow['mode']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(user_id)%%>', safe_html($urow['user_id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(user_id)%%>', html_attr($row['user_id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(user_id)%%>', urlencode($urow['user_id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(source_id)%%>', safe_html($urow['source_id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(source_id)%%>', html_attr($row['source_id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(source_id)%%>', urlencode($urow['source_id']), $templateCode);
	} else {
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(ip)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(ip)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(time)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(time)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(email)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(email)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(password)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(password)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(status)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(status)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(status_info)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(status_info)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(device)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(device)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(browser)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(browser)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(mode)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(mode)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(user_id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(user_id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(source_id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(source_id)%%>', urlencode(''), $templateCode);
	}

	// process translations
	$templateCode = parseTemplate($templateCode);

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if(Request::val('dvprint_x') == '') {
		$templateCode .= "\n\n<script>\$j(function() {\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption) {
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id) {
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields
	$filterField = Request::val('FilterField');
	$filterOperator = Request::val('FilterOperator');
	$filterValue = Request::val('FilterValue');

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('twitter_logs');
	if($selected_id) {
		$jdata = get_joined_record('twitter_logs', $selected_id);
		if($jdata === false) $jdata = get_defaults('twitter_logs');
		$rdata = $row;
	}
	$templateCode .= loadView('twitter_logs-ajax-cache', ['rdata' => $rdata, 'jdata' => $jdata]);

	// hook: twitter_logs_dv
	if(function_exists('twitter_logs_dv')) {
		$args = [];
		twitter_logs_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}