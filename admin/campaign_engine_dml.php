<?php

// Data functions (insert, update, delete, form) for table campaign_engine

// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

function campaign_engine_insert(&$error_message = '') {
	global $Translation;

	// mm: can member insert record?
	$arrPerm = getTablePermissions('campaign_engine');
	if(!$arrPerm['insert']) return false;

	$data = [
		'user_id' => Request::val('user_id', ''),
		'campaign' => Request::val('campaign', ''),
		'last_key' => Request::val('last_key', ''),
		'pagination_token' => Request::val('pagination_token', ''),
		'budget' => Request::val('budget', ''),
		'spent_budget' => Request::val('spent_budget', ''),
		'execution' => Request::val('execution', ''),
		'frequency' => Request::val('frequency', ''),
		'status' => Request::val('status', ''),
	];


	// hook: campaign_engine_before_insert
	if(function_exists('campaign_engine_before_insert')) {
		$args = [];
		if(!campaign_engine_before_insert($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$error = '';
	// set empty fields to NULL
	$data = array_map(function($v) { return ($v === '' ? NULL : $v); }, $data);
	insert('campaign_engine', backtick_keys_once($data), $error);
	if($error) {
		$error_message = $error;
		return false;
	}

	$recID = db_insert_id(db_link());

	update_calc_fields('campaign_engine', $recID, calculated_fields()['campaign_engine']);

	// hook: campaign_engine_after_insert
	if(function_exists('campaign_engine_after_insert')) {
		$res = sql("SELECT * FROM `campaign_engine` WHERE `id`='" . makeSafe($recID, false) . "' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args = [];
		if(!campaign_engine_after_insert($data, getMemberInfo(), $args)) { return $recID; }
	}

	// mm: save ownership data
	set_record_owner('campaign_engine', $recID, getLoggedMemberID());

	// if this record is a copy of another record, copy children if applicable
	if(strlen(Request::val('SelectedID'))) campaign_engine_copy_children($recID, Request::val('SelectedID'));

	return $recID;
}

function campaign_engine_copy_children($destination_id, $source_id) {
	global $Translation;
	$requests = []; // array of curl handlers for launching insert requests
	$eo = ['silentErrors' => true];
	$safe_sid = makeSafe($source_id);

	// launch requests, asynchronously
	curl_batch($requests);
}

function campaign_engine_delete($selected_id, $AllowDeleteOfParents = false, $skipChecks = false) {
	// insure referential integrity ...
	global $Translation;
	$selected_id = makeSafe($selected_id);

	// mm: can member delete record?
	if(!check_record_permission('campaign_engine', $selected_id, 'delete')) {
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: campaign_engine_before_delete
	if(function_exists('campaign_engine_before_delete')) {
		$args = [];
		if(!campaign_engine_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'] . (
				!empty($args['error_message']) ?
					'<div class="text-bold">' . strip_tags($args['error_message']) . '</div>'
					: '' 
			);
	}

	sql("DELETE FROM `campaign_engine` WHERE `id`='{$selected_id}'", $eo);

	// hook: campaign_engine_after_delete
	if(function_exists('campaign_engine_after_delete')) {
		$args = [];
		campaign_engine_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("DELETE FROM `membership_userrecords` WHERE `tableName`='campaign_engine' AND `pkValue`='{$selected_id}'", $eo);
}

function campaign_engine_update(&$selected_id, &$error_message = '') {
	global $Translation;

	// mm: can member edit record?
	if(!check_record_permission('campaign_engine', $selected_id, 'edit')) return false;

	$data = [
		'user_id' => Request::val('user_id', ''),
		'campaign' => Request::val('campaign', ''),
		'last_key' => Request::val('last_key', ''),
		'pagination_token' => Request::val('pagination_token', ''),
		'budget' => Request::val('budget', ''),
		'spent_budget' => Request::val('spent_budget', ''),
		'execution' => Request::val('execution', ''),
		'frequency' => Request::val('frequency', ''),
		'status' => Request::val('status', ''),
	];

	// get existing values
	$old_data = getRecord('campaign_engine', $selected_id);
	if(is_array($old_data)) {
		$old_data = array_map('makeSafe', $old_data);
		$old_data['selectedID'] = makeSafe($selected_id);
	}

	$data['selectedID'] = makeSafe($selected_id);

	// hook: campaign_engine_before_update
	if(function_exists('campaign_engine_before_update')) {
		$args = ['old_data' => $old_data];
		if(!campaign_engine_before_update($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$set = $data; unset($set['selectedID']);
	foreach ($set as $field => $value) {
		$set[$field] = ($value !== '' && $value !== NULL) ? $value : NULL;
	}

	if(!update(
		'campaign_engine', 
		backtick_keys_once($set), 
		['`id`' => $selected_id], 
		$error_message
	)) {
		echo $error_message;
		echo '<a href="campaign_engine_view.php?SelectedID=' . urlencode($selected_id) . "\">{$Translation['< back']}</a>";
		exit;
	}


	$eo = ['silentErrors' => true];

	update_calc_fields('campaign_engine', $data['selectedID'], calculated_fields()['campaign_engine']);

	// hook: campaign_engine_after_update
	if(function_exists('campaign_engine_after_update')) {
		$res = sql("SELECT * FROM `campaign_engine` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) $data = array_map('makeSafe', $row);

		$data['selectedID'] = $data['id'];
		$args = ['old_data' => $old_data];
		if(!campaign_engine_after_update($data, getMemberInfo(), $args)) return;
	}

	// mm: update ownership data
	sql("UPDATE `membership_userrecords` SET `dateUpdated`='" . time() . "' WHERE `tableName`='campaign_engine' AND `pkValue`='" . makeSafe($selected_id) . "'", $eo);
}

function campaign_engine_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $separateDV = 0, $TemplateDV = '', $TemplateDVP = '') {
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
	$arrPerm = getTablePermissions('campaign_engine');
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
		$ownerGroupID = sqlValue("SELECT `groupID` FROM `membership_userrecords` WHERE `tableName`='campaign_engine' AND `pkValue`='" . makeSafe($selected_id) . "'");
		$ownerMemberID = sqlValue("SELECT LCASE(`memberID`) FROM `membership_userrecords` WHERE `tableName`='campaign_engine' AND `pkValue`='" . makeSafe($selected_id) . "'");

		if($arrPerm['view'] == 1 && getLoggedMemberID() != $ownerMemberID) return $Translation['tableAccessDenied'];
		if($arrPerm['view'] == 2 && getLoggedGroupID() != $ownerGroupID) return $Translation['tableAccessDenied'];

		// can edit?
		$AllowUpdate = 0;
		if(($arrPerm['edit'] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm['edit'] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm['edit'] == 3) {
			$AllowUpdate = 1;
		}

		$res = sql("SELECT * FROM `campaign_engine` WHERE `id`='" . makeSafe($selected_id) . "'", $eo);
		if(!($row = db_fetch_array($res))) {
			return error_message($Translation['No records found'], 'campaign_engine_view.php', false);
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
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/campaign_engine_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	} else {
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/campaign_engine_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detail View', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', (Request::val('Embedded') ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert) {
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return campaign_engine_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return campaign_engine_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
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
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return campaign_engine_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
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
		$jsReadOnly .= "\tjQuery('#user_id').replaceWith('<div class=\"form-control-static\" id=\"user_id\">' + (jQuery('#user_id').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#campaign').replaceWith('<div class=\"form-control-static\" id=\"campaign\">' + (jQuery('#campaign').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#last_key').replaceWith('<div class=\"form-control-static\" id=\"last_key\">' + (jQuery('#last_key').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#pagination_token').replaceWith('<div class=\"form-control-static\" id=\"pagination_token\">' + (jQuery('#pagination_token').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#budget').replaceWith('<div class=\"form-control-static\" id=\"budget\">' + (jQuery('#budget').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#spent_budget').replaceWith('<div class=\"form-control-static\" id=\"spent_budget\">' + (jQuery('#spent_budget').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#execution').replaceWith('<div class=\"form-control-static\" id=\"execution\">' + (jQuery('#execution').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#frequency').replaceWith('<div class=\"form-control-static\" id=\"frequency\">' + (jQuery('#frequency').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#status').replaceWith('<div class=\"form-control-static\" id=\"status\">' + (jQuery('#status').val() || '') + '</div>');\n";
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
	$templateCode = str_replace('<%%UPLOADFILE(user_id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(campaign)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(last_key)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(pagination_token)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(budget)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(spent_budget)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(execution)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(frequency)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(status)%%>', '', $templateCode);

	// process values
	if($selected_id) {
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(user_id)%%>', safe_html($urow['user_id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(user_id)%%>', html_attr($row['user_id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(user_id)%%>', urlencode($urow['user_id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(campaign)%%>', safe_html($urow['campaign']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(campaign)%%>', html_attr($row['campaign']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(campaign)%%>', urlencode($urow['campaign']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(last_key)%%>', safe_html($urow['last_key']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(last_key)%%>', html_attr($row['last_key']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(last_key)%%>', urlencode($urow['last_key']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(pagination_token)%%>', safe_html($urow['pagination_token']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(pagination_token)%%>', html_attr($row['pagination_token']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(pagination_token)%%>', urlencode($urow['pagination_token']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(budget)%%>', safe_html($urow['budget']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(budget)%%>', html_attr($row['budget']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(budget)%%>', urlencode($urow['budget']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(spent_budget)%%>', safe_html($urow['spent_budget']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(spent_budget)%%>', html_attr($row['spent_budget']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(spent_budget)%%>', urlencode($urow['spent_budget']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(execution)%%>', safe_html($urow['execution']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(execution)%%>', html_attr($row['execution']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(execution)%%>', urlencode($urow['execution']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(frequency)%%>', safe_html($urow['frequency']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(frequency)%%>', html_attr($row['frequency']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(frequency)%%>', urlencode($urow['frequency']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(status)%%>', safe_html($urow['status']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(status)%%>', html_attr($row['status']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(status)%%>', urlencode($urow['status']), $templateCode);
	} else {
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(user_id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(user_id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(campaign)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(campaign)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(last_key)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(last_key)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(pagination_token)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(pagination_token)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(budget)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(budget)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(spent_budget)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(spent_budget)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(execution)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(execution)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(frequency)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(frequency)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(status)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(status)%%>', urlencode(''), $templateCode);
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
	$rdata = $jdata = get_defaults('campaign_engine');
	if($selected_id) {
		$jdata = get_joined_record('campaign_engine', $selected_id);
		if($jdata === false) $jdata = get_defaults('campaign_engine');
		$rdata = $row;
	}
	$templateCode .= loadView('campaign_engine-ajax-cache', ['rdata' => $rdata, 'jdata' => $jdata]);

	// hook: campaign_engine_dv
	if(function_exists('campaign_engine_dv')) {
		$args = [];
		campaign_engine_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}