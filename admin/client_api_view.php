<?php
// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/client_api.php');
	include_once(__DIR__ . '/client_api_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('client_api');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'client_api';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`client_api`.`id`" => "id",
		"`client_api`.`title`" => "title",
		"IF(    CHAR_LENGTH(`users1`.`id`), CONCAT_WS('',   `users1`.`id`), '') /* User_id */" => "user_id",
		"`client_api`.`consumer_key`" => "consumer_key",
		"`client_api`.`consumer_secret`" => "consumer_secret",
		"`client_api`.`bearer_token`" => "bearer_token",
		"`client_api`.`access_token`" => "access_token",
		"`client_api`.`access_secret`" => "access_secret",
		"`client_api`.`status`" => "status",
		"`client_api`.`level`" => "level",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`client_api`.`id`',
		2 => 2,
		3 => '`users1`.`id`',
		4 => '`client_api`.`consumer_key`',
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => '`client_api`.`status`',
		10 => '`client_api`.`level`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`client_api`.`id`" => "id",
		"`client_api`.`title`" => "title",
		"IF(    CHAR_LENGTH(`users1`.`id`), CONCAT_WS('',   `users1`.`id`), '') /* User_id */" => "user_id",
		"`client_api`.`consumer_key`" => "consumer_key",
		"`client_api`.`consumer_secret`" => "consumer_secret",
		"`client_api`.`bearer_token`" => "bearer_token",
		"`client_api`.`access_token`" => "access_token",
		"`client_api`.`access_secret`" => "access_secret",
		"`client_api`.`status`" => "status",
		"`client_api`.`level`" => "level",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`client_api`.`id`" => "Id",
		"`client_api`.`title`" => "Title",
		"IF(    CHAR_LENGTH(`users1`.`id`), CONCAT_WS('',   `users1`.`id`), '') /* User_id */" => "User_id",
		"`client_api`.`consumer_key`" => "Consumer_key",
		"`client_api`.`consumer_secret`" => "Consumer_secret",
		"`client_api`.`bearer_token`" => "Bearer_token",
		"`client_api`.`access_token`" => "Access_token",
		"`client_api`.`access_secret`" => "Access_secret",
		"`client_api`.`status`" => "Status",
		"`client_api`.`level`" => "Level",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`client_api`.`id`" => "id",
		"`client_api`.`title`" => "title",
		"IF(    CHAR_LENGTH(`users1`.`id`), CONCAT_WS('',   `users1`.`id`), '') /* User_id */" => "user_id",
		"`client_api`.`consumer_key`" => "consumer_key",
		"`client_api`.`consumer_secret`" => "consumer_secret",
		"`client_api`.`bearer_token`" => "bearer_token",
		"`client_api`.`access_token`" => "access_token",
		"`client_api`.`access_secret`" => "access_secret",
		"`client_api`.`status`" => "status",
		"`client_api`.`level`" => "level",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['user_id' => 'User_id', ];

	$x->QueryFrom = "`client_api` LEFT JOIN `users` as users1 ON `users1`.`id`=`client_api`.`user_id` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'client_api_view.php';
	$x->TableTitle = 'Client_api';
	$x->TableIcon = 'resources/table_icons/client_account_template.png';
	$x->PrimaryKey = '`client_api`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Id', 'Title', 'User_id', 'Consumer_key', 'Consumer_secret', 'Bearer_token', 'Access_token', 'Access_secret', 'Status', 'Level', ];
	$x->ColFieldName = ['id', 'title', 'user_id', 'consumer_key', 'consumer_secret', 'bearer_token', 'access_token', 'access_secret', 'status', 'level', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/client_api_templateTV.html';
	$x->SelectedTemplate = 'templates/client_api_templateTVS.html';
	$x->TemplateDV = 'templates/client_api_templateDV.html';
	$x->TemplateDVP = 'templates/client_api_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: client_api_init
	$render = true;
	if(function_exists('client_api_init')) {
		$args = [];
		$render = client_api_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: client_api_header
	$headerCode = '';
	if(function_exists('client_api_header')) {
		$args = [];
		$headerCode = client_api_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: client_api_footer
	$footerCode = '';
	if(function_exists('client_api_footer')) {
		$args = [];
		$footerCode = client_api_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}