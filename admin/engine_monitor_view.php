<?php
// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/engine_monitor.php');
	include_once(__DIR__ . '/engine_monitor_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('engine_monitor');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'engine_monitor';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`engine_monitor`.`id`" => "id",
		"`engine_monitor`.`user`" => "user",
		"`engine_monitor`.`time`" => "time",
		"`engine_monitor`.`command`" => "command",
		"`engine_monitor`.`count`" => "count",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`engine_monitor`.`id`',
		2 => 2,
		3 => '`engine_monitor`.`time`',
		4 => 4,
		5 => '`engine_monitor`.`count`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`engine_monitor`.`id`" => "id",
		"`engine_monitor`.`user`" => "user",
		"`engine_monitor`.`time`" => "time",
		"`engine_monitor`.`command`" => "command",
		"`engine_monitor`.`count`" => "count",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`engine_monitor`.`id`" => "Id",
		"`engine_monitor`.`user`" => "User",
		"`engine_monitor`.`time`" => "Time",
		"`engine_monitor`.`command`" => "Command",
		"`engine_monitor`.`count`" => "Count",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`engine_monitor`.`id`" => "id",
		"`engine_monitor`.`user`" => "user",
		"`engine_monitor`.`time`" => "time",
		"`engine_monitor`.`command`" => "command",
		"`engine_monitor`.`count`" => "count",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`engine_monitor` ";
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
	$x->ScriptFileName = 'engine_monitor_view.php';
	$x->TableTitle = 'Engine_monitor';
	$x->TableIcon = 'resources/table_icons/monitor_lightning.png';
	$x->PrimaryKey = '`engine_monitor`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Id', 'User', 'Time', 'Command', 'Count', ];
	$x->ColFieldName = ['id', 'user', 'time', 'command', 'count', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/engine_monitor_templateTV.html';
	$x->SelectedTemplate = 'templates/engine_monitor_templateTVS.html';
	$x->TemplateDV = 'templates/engine_monitor_templateDV.html';
	$x->TemplateDVP = 'templates/engine_monitor_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: engine_monitor_init
	$render = true;
	if(function_exists('engine_monitor_init')) {
		$args = [];
		$render = engine_monitor_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: engine_monitor_header
	$headerCode = '';
	if(function_exists('engine_monitor_header')) {
		$args = [];
		$headerCode = engine_monitor_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: engine_monitor_footer
	$footerCode = '';
	if(function_exists('engine_monitor_footer')) {
		$args = [];
		$footerCode = engine_monitor_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}