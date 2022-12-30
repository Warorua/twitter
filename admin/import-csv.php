<?php
	define('PREPEND_PATH', '');
	include_once(__DIR__ . '/lib.php');

	// accept a record as an assoc array, return transformed row ready to insert to table
	$transformFunctions = [
		'users' => function($data, $options = []) {

			return $data;
		},
		'api_shop' => function($data, $options = []) {

			return $data;
		},
		'auto_dm' => function($data, $options = []) {

			return $data;
		},
		'automation_scripts' => function($data, $options = []) {

			return $data;
		},
		'automation_subs' => function($data, $options = []) {

			return $data;
		},
		'billing' => function($data, $options = []) {
			if(isset($data['user_id'])) $data['user_id'] = pkGivenLookupText($data['user_id'], 'billing', 'user_id');

			return $data;
		},
		'bot_control' => function($data, $options = []) {

			return $data;
		},
		'campaign_engine' => function($data, $options = []) {

			return $data;
		},
		'client_api' => function($data, $options = []) {
			if(isset($data['user_id'])) $data['user_id'] = pkGivenLookupText($data['user_id'], 'client_api', 'user_id');

			return $data;
		},
		'engine_monitor' => function($data, $options = []) {
			if(isset($data['time'])) $data['time'] = guessMySQLDateTime($data['time']);

			return $data;
		},
		'history' => function($data, $options = []) {
			if(isset($data['timestamp'])) $data['timestamp'] = guessMySQLDateTime($data['timestamp']);

			return $data;
		},
		'logs' => function($data, $options = []) {
			if(isset($data['time'])) $data['time'] = guessMySQLDateTime($data['time']);

			return $data;
		},
		'process_engine' => function($data, $options = []) {

			return $data;
		},
		'pts_conversion' => function($data, $options = []) {

			return $data;
		},
		'system_cookies' => function($data, $options = []) {

			return $data;
		},
		'system_tokens' => function($data, $options = []) {

			return $data;
		},
		'tester' => function($data, $options = []) {

			return $data;
		},
		'tweet_factory' => function($data, $options = []) {

			return $data;
		},
		'twitter_logs' => function($data, $options = []) {

			return $data;
		},
		'usage_track' => function($data, $options = []) {

			return $data;
		},
		'user_earnings' => function($data, $options = []) {

			return $data;
		},
	];

	// accept a record as an assoc array, return a boolean indicating whether to import or skip record
	$filterFunctions = [
		'users' => function($data, $options = []) { return true; },
		'api_shop' => function($data, $options = []) { return true; },
		'auto_dm' => function($data, $options = []) { return true; },
		'automation_scripts' => function($data, $options = []) { return true; },
		'automation_subs' => function($data, $options = []) { return true; },
		'billing' => function($data, $options = []) { return true; },
		'bot_control' => function($data, $options = []) { return true; },
		'campaign_engine' => function($data, $options = []) { return true; },
		'client_api' => function($data, $options = []) { return true; },
		'engine_monitor' => function($data, $options = []) { return true; },
		'history' => function($data, $options = []) { return true; },
		'logs' => function($data, $options = []) { return true; },
		'process_engine' => function($data, $options = []) { return true; },
		'pts_conversion' => function($data, $options = []) { return true; },
		'system_cookies' => function($data, $options = []) { return true; },
		'system_tokens' => function($data, $options = []) { return true; },
		'tester' => function($data, $options = []) { return true; },
		'tweet_factory' => function($data, $options = []) { return true; },
		'twitter_logs' => function($data, $options = []) { return true; },
		'usage_track' => function($data, $options = []) { return true; },
		'user_earnings' => function($data, $options = []) { return true; },
	];

	/*
	Hook file for overwriting/amending $transformFunctions and $filterFunctions:
	hooks/import-csv.php
	If found, it's included below

	The way this works is by either completely overwriting any of the above 2 arrays,
	or, more commonly, overwriting a single function, for example:
		$transformFunctions['tablename'] = function($data, $options = []) {
			// new definition here
			// then you must return transformed data
			return $data;
		};

	Another scenario is transforming a specific field and leaving other fields to the default
	transformation. One possible way of doing this is to store the original transformation function
	in GLOBALS array, calling it inside the custom transformation function, then modifying the
	specific field:
		$GLOBALS['originalTransformationFunction'] = $transformFunctions['tablename'];
		$transformFunctions['tablename'] = function($data, $options = []) {
			$data = call_user_func_array($GLOBALS['originalTransformationFunction'], [$data, $options]);
			$data['fieldname'] = 'transformed value';
			return $data;
		};
	*/

	@include(__DIR__ . '/hooks/import-csv.php');

	$ui = new CSVImportUI($transformFunctions, $filterFunctions);
