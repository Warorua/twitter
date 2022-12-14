<?php
// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/campaign_engine.php');
	include_once(__DIR__ . '/campaign_engine_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('campaign_engine');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'campaign_engine';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`campaign_engine`.`id`" => "id",
		"`campaign_engine`.`user_id`" => "user_id",
		"`campaign_engine`.`campaign`" => "campaign",
		"`campaign_engine`.`last_key`" => "last_key",
		"`campaign_engine`.`pagination_token`" => "pagination_token",
		"`campaign_engine`.`budget`" => "budget",
		"`campaign_engine`.`spent_budget`" => "spent_budget",
		"`campaign_engine`.`execution`" => "execution",
		"`campaign_engine`.`frequency`" => "frequency",
		"`campaign_engine`.`status`" => "status",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`campaign_engine`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => '`campaign_engine`.`status`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`campaign_engine`.`id`" => "id",
		"`campaign_engine`.`user_id`" => "user_id",
		"`campaign_engine`.`campaign`" => "campaign",
		"`campaign_engine`.`last_key`" => "last_key",
		"`campaign_engine`.`pagination_token`" => "pagination_token",
		"`campaign_engine`.`budget`" => "budget",
		"`campaign_engine`.`spent_budget`" => "spent_budget",
		"`campaign_engine`.`execution`" => "execution",
		"`campaign_engine`.`frequency`" => "frequency",
		"`campaign_engine`.`status`" => "status",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`campaign_engine`.`id`" => "Id",
		"`campaign_engine`.`user_id`" => "User_id",
		"`campaign_engine`.`campaign`" => "Campaign",
		"`campaign_engine`.`last_key`" => "Last_key",
		"`campaign_engine`.`pagination_token`" => "Pagination_token",
		"`campaign_engine`.`budget`" => "Budget",
		"`campaign_engine`.`spent_budget`" => "Spent_budget",
		"`campaign_engine`.`execution`" => "Execution",
		"`campaign_engine`.`frequency`" => "Frequency",
		"`campaign_engine`.`status`" => "Status",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`campaign_engine`.`id`" => "id",
		"`campaign_engine`.`user_id`" => "user_id",
		"`campaign_engine`.`campaign`" => "campaign",
		"`campaign_engine`.`last_key`" => "last_key",
		"`campaign_engine`.`pagination_token`" => "pagination_token",
		"`campaign_engine`.`budget`" => "budget",
		"`campaign_engine`.`spent_budget`" => "spent_budget",
		"`campaign_engine`.`execution`" => "execution",
		"`campaign_engine`.`frequency`" => "frequency",
		"`campaign_engine`.`status`" => "status",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`campaign_engine` ";
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
	$x->ScriptFileName = 'campaign_engine_view.php';
	$x->TableTitle = 'Campaign_engine';
	$x->TableIcon = 'resources/table_icons/asterisk_orange.png';
	$x->PrimaryKey = '`campaign_engine`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Id', 'User_id', 'Campaign', 'Last_key', 'Pagination_token', 'Budget', 'Spent_budget', 'Execution', 'Frequency', 'Status', ];
	$x->ColFieldName = ['id', 'user_id', 'campaign', 'last_key', 'pagination_token', 'budget', 'spent_budget', 'execution', 'frequency', 'status', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/campaign_engine_templateTV.html';
	$x->SelectedTemplate = 'templates/campaign_engine_templateTVS.html';
	$x->TemplateDV = 'templates/campaign_engine_templateDV.html';
	$x->TemplateDVP = 'templates/campaign_engine_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: campaign_engine_init
	$render = true;
	if(function_exists('campaign_engine_init')) {
		$args = [];
		$render = campaign_engine_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: campaign_engine_header
	$headerCode = '';
	if(function_exists('campaign_engine_header')) {
		$args = [];
		$headerCode = campaign_engine_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: campaign_engine_footer
	$footerCode = '';
	if(function_exists('campaign_engine_footer')) {
		$args = [];
		$footerCode = campaign_engine_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
