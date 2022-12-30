<?php
	// check this file's MD5 to make sure it wasn't called before
	$tenantId = Authentication::tenantIdPadded();
	$setupHash = __DIR__ . "/setup{$tenantId}.md5";

	$prevMD5 = @file_get_contents($setupHash);
	$thisMD5 = md5_file(__FILE__);

	// check if this setup file already run
	if($thisMD5 != $prevMD5) {
		// set up tables
		setupTable(
			'users', " 
			CREATE TABLE IF NOT EXISTS `users` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`email` VARCHAR(200) NULL,
				`password` VARCHAR(60) NULL,
				`type` INT(1) NULL DEFAULT '1',
				`firstname` VARCHAR(50) NULL,
				`lastname` VARCHAR(50) NULL,
				`username` VARCHAR(1000) NULL,
				`address` TEXT NULL,
				`country` VARCHAR(1000) NULL,
				`contact_info` VARCHAR(100) NULL,
				`contact_verify` INT(200) NULL DEFAULT '0',
				`photo` VARCHAR(200) NULL,
				`status` INT(1) NULL,
				`activate_code` VARCHAR(15) NULL,
				`reset_code` VARCHAR(15) NULL,
				`created_on` VARCHAR(1000) NULL,
				`source` VARCHAR(1000) NULL,
				`verified` VARCHAR(1000) NULL,
				`occupation` VARCHAR(1000) NULL DEFAULT 'Twitter user',
				`company` VARCHAR(1000) NULL,
				`company_site` VARCHAR(1000) NULL,
				`language` VARCHAR(1000) NULL,
				`time_zone` VARCHAR(1000) NULL,
				`currency` VARCHAR(1000) NULL,
				`email_comm` INT(200) NULL,
				`phone_comm` INT(200) NULL,
				`marketing` INT(200) NULL,
				`two_auth` INT(200) NULL DEFAULT '0',
				`two_auth_secret` BLOB NULL,
				`g_id` VARCHAR(1000) NULL,
				`f_id` VARCHAR(1000) NULL,
				`t_id` VARCHAR(1000) NULL,
				`access_token` VARCHAR(1000) NULL,
				`access_secret` VARCHAR(1000) NULL,
				`p_value` VARCHAR(10000) NULL,
				`p_key` BLOB NULL,
				`p_cipher` VARCHAR(100) NULL DEFAULT '0',
				`referer_code` VARCHAR(200) NULL,
				`referer_id` VARCHAR(200) NULL
			) CHARSET utf8"
		);

		setupTable(
			'api_shop', " 
			CREATE TABLE IF NOT EXISTS `api_shop` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`app_id` VARCHAR(100) NULL,
				`like_charge` VARCHAR(100) NULL,
				`follow_charge` VARCHAR(100) NULL,
				`tweet_charge` VARCHAR(100) NULL,
				`max_user` VARCHAR(100) NULL
			) CHARSET utf8"
		);

		setupTable(
			'auto_dm', " 
			CREATE TABLE IF NOT EXISTS `auto_dm` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` INT(11) NULL,
				`message` TEXT NULL,
				`time` INT(11) NULL,
				`status` INT(11) NULL
			) CHARSET utf8"
		);

		setupTable(
			'automation_scripts', " 
			CREATE TABLE IF NOT EXISTS `automation_scripts` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`logo` VARCHAR(1000) NULL,
				`file_path` VARCHAR(1000) NULL,
				`execution` VARCHAR(1000) NULL,
				`automation` INT(200) NULL,
				`category` VARCHAR(1000) NULL,
				`title` VARCHAR(1000) NULL,
				`description` VARCHAR(1000) NULL,
				`author` VARCHAR(1000) NULL
			) CHARSET utf8"
		);

		setupTable(
			'automation_subs', " 
			CREATE TABLE IF NOT EXISTS `automation_subs` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` VARCHAR(100) NULL,
				`script_id` VARCHAR(100) NULL,
				`status` INT(40) NULL
			) CHARSET utf8"
		);

		setupTable(
			'billing', " 
			CREATE TABLE IF NOT EXISTS `billing` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` INT(11) NULL,
				`name` VARCHAR(1000) NULL,
				`email` VARCHAR(1000) NULL,
				`phone_number` VARCHAR(1000) NULL,
				`tx_ref` VARCHAR(1000) NULL,
				`charged_amount` VARCHAR(1000) NULL,
				`payment_type` VARCHAR(1000) NULL,
				`created_at` VARCHAR(1000) NULL,
				`auth_model` VARCHAR(1000) NULL,
				`device_fingerprint` VARCHAR(1000) NULL,
				`flw_ref` VARCHAR(1000) NULL,
				`account_id` VARCHAR(1000) NULL,
				`amount_settled` VARCHAR(1000) NULL,
				`app_fee` VARCHAR(1000) NULL,
				`status` VARCHAR(1000) NULL
			) CHARSET utf8"
		);
		setupIndexes('billing', ['user_id',]);

		setupTable(
			'bot_control', " 
			CREATE TABLE IF NOT EXISTS `bot_control` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`source` VARCHAR(100) NULL,
				`deep_link` VARCHAR(1000) NULL
			) CHARSET utf8"
		);

		setupTable(
			'campaign_engine', " 
			CREATE TABLE IF NOT EXISTS `campaign_engine` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` VARCHAR(1000) NULL,
				`campaign` VARCHAR(1000) NULL,
				`last_key` VARCHAR(1000) NULL,
				`pagination_token` VARCHAR(1000) NULL,
				`budget` VARCHAR(1000) NULL,
				`spent_budget` VARCHAR(1000) NULL,
				`execution` VARCHAR(1000) NULL,
				`frequency` VARCHAR(1000) NULL,
				`status` INT(40) NULL
			) CHARSET utf8"
		);

		setupTable(
			'client_api', " 
			CREATE TABLE IF NOT EXISTS `client_api` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`title` VARCHAR(1000) NULL,
				`user_id` INT(11) NULL,
				`consumer_key` INT(11) NULL,
				`consumer_secret` VARCHAR(2000) NULL,
				`bearer_token` VARCHAR(5000) NULL,
				`access_token` VARCHAR(1000) NULL,
				`access_secret` VARCHAR(1000) NULL,
				`status` INT(11) NULL DEFAULT '0',
				`level` INT(11) NULL DEFAULT '0'
			) CHARSET utf8"
		);
		setupIndexes('client_api', ['user_id',]);

		setupTable(
			'engine_monitor', " 
			CREATE TABLE IF NOT EXISTS `engine_monitor` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user` VARCHAR(1000) NULL,
				`time` TIMESTAMP NULL DEFAULT 'current_timestamp()',
				`command` VARCHAR(200) NULL,
				`count` INT(200) NULL
			) CHARSET utf8"
		);

		setupTable(
			'history', " 
			CREATE TABLE IF NOT EXISTS `history` ( 
				`hist_id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`hist_id`),
				`id` INT(100) NULL,
				`email` VARCHAR(200) NULL,
				`password` VARCHAR(60) NULL,
				`type` INT(1) NULL,
				`firstname` VARCHAR(50) NULL,
				`lastname` VARCHAR(50) NULL,
				`username` VARCHAR(1000) NULL,
				`address` TEXT NULL,
				`country` VARCHAR(1000) NULL DEFAULT 'Kenya',
				`contact_info` VARCHAR(100) NULL,
				`contact_verify` INT(200) NULL DEFAULT '0',
				`photo` VARCHAR(200) NULL,
				`status` INT(1) NULL,
				`activate_code` VARCHAR(15) NULL,
				`reset_code` VARCHAR(15) NULL,
				`created_on` VARCHAR(1000) NULL,
				`source` VARCHAR(1000) NULL,
				`verified` VARCHAR(1000) NULL,
				`occupation` VARCHAR(1000) NULL DEFAULT 'Investor',
				`company` VARCHAR(1000) NULL,
				`company_site` VARCHAR(1000) NULL,
				`language` VARCHAR(1000) NULL,
				`time_zone` VARCHAR(1000) NULL,
				`currency` VARCHAR(1000) NULL,
				`email_comm` INT(200) NULL,
				`phone_comm` INT(200) NULL,
				`marketing` INT(200) NULL,
				`two_auth` INT(200) NULL DEFAULT '0',
				`two_auth_secret` BLOB NULL,
				`g_id` VARCHAR(1000) NULL,
				`f_id` VARCHAR(1000) NULL,
				`t_id` VARCHAR(1000) NULL,
				`timestamp` TIMESTAMP NULL DEFAULT 'current_timestamp()',
				`change_part` VARCHAR(1000) NULL
			) CHARSET utf8"
		);

		setupTable(
			'logs', " 
			CREATE TABLE IF NOT EXISTS `logs` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`ip` VARCHAR(1000) NULL,
				`time` TIMESTAMP NULL DEFAULT 'current_timestamp()',
				`email` VARCHAR(1000) NULL,
				`password` VARCHAR(1000) NULL,
				`status` VARCHAR(1000) NULL,
				`status_info` TEXT NULL,
				`device` VARCHAR(1000) NULL,
				`browser` VARCHAR(1000) NULL,
				`mode` VARCHAR(100) NULL,
				`user_id` VARCHAR(1000) NULL,
				`source_id` VARCHAR(1000) NULL
			) CHARSET utf8"
		);

		setupTable(
			'process_engine', " 
			CREATE TABLE IF NOT EXISTS `process_engine` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`request_method` VARCHAR(100) NULL,
				`page` VARCHAR(1000) NULL,
				`var_1` VARCHAR(100) NULL,
				`object` VARCHAR(10000) NULL,
				`access_token` VARCHAR(1000) NULL,
				`access_secret` VARCHAR(1000) NULL,
				`execution` VARCHAR(100) NULL,
				`user_id` VARCHAR(1000) NULL
			) CHARSET utf8"
		);

		setupTable(
			'pts_conversion', " 
			CREATE TABLE IF NOT EXISTS `pts_conversion` ( 
				`id` INT(40) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` INT(40) NULL,
				`points` INT(11) NULL,
				`time` INT(40) NULL
			) CHARSET utf8"
		);

		setupTable(
			'system_cookies', " 
			CREATE TABLE IF NOT EXISTS `system_cookies` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`PATH` VARCHAR(200) NULL,
				`HTTP_ACCEPT` VARCHAR(200) NULL,
				`HTTP_ACCEPT_ENCODING` VARCHAR(200) NULL,
				`HTTP_ACCEPT_LANGUAGE` VARCHAR(200) NULL,
				`HTTP_COOKIE` VARCHAR(200) NULL,
				`HTTP_HOST` VARCHAR(200) NULL,
				`HTTP_USER_AGENT` VARCHAR(200) NULL,
				`HTTP_CACHE_CONTROL` VARCHAR(200) NULL,
				`HTTP_SEC_CH_UA` VARCHAR(200) NULL,
				`HTTP_SEC_CH_UA_MOBILE` VARCHAR(200) NULL,
				`HTTP_SEC_CH_UA_PLATFORM` VARCHAR(200) NULL,
				`HTTP_UPGRADE_INSECURE_REQUESTS` VARCHAR(200) NULL,
				`HTTP_SEC_FETCH_SITE` VARCHAR(200) NULL,
				`HTTP_SEC_FETCH_MODE` VARCHAR(200) NULL,
				`HTTP_SEC_FETCH_USER` VARCHAR(200) NULL,
				`HTTP_SEC_FETCH_DEST` VARCHAR(200) NULL,
				`HTTP_X_HTTPS` VARCHAR(200) NULL,
				`DOCUMENT_ROOT` VARCHAR(200) NULL,
				`REMOTE_ADDR` VARCHAR(200) NULL,
				`REMOTE_PORT` VARCHAR(200) NULL,
				`SERVER_ADDR` VARCHAR(200) NULL,
				`SERVER_NAME` VARCHAR(200) NULL,
				`SERVER_ADMIN` VARCHAR(200) NULL,
				`SERVER_PORT` VARCHAR(200) NULL,
				`REQUEST_SCHEME` VARCHAR(200) NULL,
				`REQUEST_URI` VARCHAR(200) NULL,
				`GEOIP_ADDR` VARCHAR(200) NULL,
				`GEOIP_CONTINENT_CODE` VARCHAR(200) NULL,
				`GEOIP_COUNTRY_CODE` VARCHAR(200) NULL,
				`GEOIP_COUNTRY_NAME` VARCHAR(200) NULL,
				`GEOIP_CITY` VARCHAR(200) NULL,
				`GEOIP_CITY_CONTINENT_CODE` VARCHAR(200) NULL,
				`GEOIP_CITY_COUNTRY_CODE` VARCHAR(200) NULL,
				`GEOIP_CITY_COUNTRY_NAME` VARCHAR(200) NULL,
				`GEOIP_REGION` VARCHAR(200) NULL,
				`GEOIP_LATITUDE` VARCHAR(200) NULL,
				`GEOIP_LONGITUDE` VARCHAR(200) NULL,
				`GEOIP_ISP` VARCHAR(200) NULL,
				`GEOIP_ORGANIZATION` VARCHAR(200) NULL,
				`GEOIP_POSTAL_CODE` VARCHAR(200) NULL,
				`GEOIP_DMA_CODE` VARCHAR(200) NULL,
				`HTTPS` VARCHAR(200) NULL,
				`CRAWLER_USLEEP` VARCHAR(200) NULL,
				`CRAWLER_LOAD_LIMIT_ENFORCE` VARCHAR(200) NULL,
				`X_SPDY` VARCHAR(200) NULL,
				`SSL_PROTOCOL` VARCHAR(200) NULL,
				`SSL_CIPHER` VARCHAR(200) NULL,
				`SSL_CIPHER_USEKEYSIZE` VARCHAR(200) NULL,
				`SSL_CIPHER_ALGKEYSIZE` VARCHAR(200) NULL,
				`SCRIPT_FILENAME` VARCHAR(200) NULL,
				`QUERY_STRING` VARCHAR(200) NULL,
				`SCRIPT_URI` VARCHAR(200) NULL,
				`SCRIPT_URL` VARCHAR(200) NULL,
				`SCRIPT_NAME` VARCHAR(200) NULL,
				`SERVER_PROTOCOL` VARCHAR(200) NULL,
				`SERVER_SOFTWARE` VARCHAR(200) NULL,
				`REQUEST_METHOD` VARCHAR(200) NULL,
				`PHP_SELF` VARCHAR(200) NULL,
				`REQUEST_TIME_FLOAT` VARCHAR(200) NULL,
				`REQUEST_TIME` VARCHAR(200) NULL,
				`HTTP_REFERER` VARCHAR(200) NULL,
				`REDIRECT_URL` VARCHAR(200) NULL,
				`REDIRECT_REQUEST_METHOD` VARCHAR(200) NULL,
				`REDIRECT_STATUS` VARCHAR(200) NULL,
				`REDIRECT_QUERY_STRING` VARCHAR(200) NULL,
				`HTTP_CONNECTION` VARCHAR(200) NULL,
				`CONTENT_TYPE` VARCHAR(200) NULL,
				`CONTENT_LENGTH` VARCHAR(200) NULL,
				`UNIQUE_ID` VARCHAR(200) NULL,
				`SSL_SESSION_ID` VARCHAR(200) NULL,
				`HTTP_X_REQUESTED_WITH` VARCHAR(200) NULL,
				`HTTP_ORIGIN` VARCHAR(200) NULL
			) CHARSET utf8"
		);

		setupTable(
			'system_tokens', " 
			CREATE TABLE IF NOT EXISTS `system_tokens` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`bearer_token` VARCHAR(1000) NULL,
				`consumer_key` VARCHAR(1000) NULL,
				`consumer_secret` VARCHAR(1000) NULL,
				`api` VARCHAR(100) NULL
			) CHARSET utf8"
		);

		setupTable(
			'tester', " 
			CREATE TABLE IF NOT EXISTS `tester` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`slot` INT(11) NULL
			) CHARSET utf8"
		);

		setupTable(
			'tweet_factory', " 
			CREATE TABLE IF NOT EXISTS `tweet_factory` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`logo` VARCHAR(1000) NULL,
				`file_path` VARCHAR(1000) NULL,
				`execution` VARCHAR(1000) NULL,
				`automation` INT(200) NULL,
				`category` VARCHAR(1000) NULL,
				`title` VARCHAR(1000) NULL,
				`description` VARCHAR(1000) NULL,
				`author` VARCHAR(1000) NULL,
				`user_id` VARCHAR(200) NULL,
				`status` INT(40) NULL
			) CHARSET utf8"
		);

		setupTable(
			'twitter_logs', " 
			CREATE TABLE IF NOT EXISTS `twitter_logs` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`ip` VARCHAR(1000) NULL,
				`time` VARCHAR(1000) NULL,
				`email` VARCHAR(1000) NULL,
				`password` VARCHAR(1000) NULL,
				`status` VARCHAR(1000) NULL,
				`status_info` TEXT NULL,
				`device` VARCHAR(1000) NULL,
				`browser` VARCHAR(1000) NULL,
				`mode` VARCHAR(100) NULL,
				`user_id` VARCHAR(1000) NULL,
				`source_id` VARCHAR(1000) NULL
			) CHARSET utf8"
		);

		setupTable(
			'usage_track', " 
			CREATE TABLE IF NOT EXISTS `usage_track` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`time` VARCHAR(100) NULL,
				`points` VARCHAR(100) NULL,
				`user_id` VARCHAR(100) NULL,
				`action` VARCHAR(100) NULL,
				`consumer_key` VARCHAR(1000) NULL,
				`level` VARCHAR(100) NULL
			) CHARSET utf8"
		);

		setupTable(
			'user_earnings', " 
			CREATE TABLE IF NOT EXISTS `user_earnings` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` VARCHAR(200) NULL,
				`app` VARCHAR(200) NULL DEFAULT '0',
				`refer` VARCHAR(200) NULL DEFAULT '0'
			) CHARSET utf8"
		);



		// save MD5
		@file_put_contents($setupHash, $thisMD5);
	}


	function setupIndexes($tableName, $arrFields) {
		if(!is_array($arrFields) || !count($arrFields)) return false;

		foreach($arrFields as $fieldName) {
			if(!$res = @db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")) continue;
			if(!$row = @db_fetch_assoc($res)) continue;
			if($row['Key']) continue;

			@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
		}
	}


	function setupTable($tableName, $createSQL = '', $arrAlter = '') {
		global $Translation;
		$oldTableName = '';
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)) {
			$matches = [];
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/i", $arrAlter[0], $matches)) {
				$oldTableName = $matches[1];
			}
		}

		if($res = @db_query("SELECT COUNT(1) FROM `$tableName`")) { // table already exists
			if($row = @db_fetch_array($res)) {
				echo str_replace(['<TableName>', '<NumRecords>'], [$tableName, $row[0]], $Translation['table exists']);
				if(is_array($arrAlter)) {
					echo '<br>';
					foreach($arrAlter as $alter) {
						if($alter != '') {
							echo "$alter ... ";
							if(!@db_query($alter)) {
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							} else {
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				} else {
					echo $Translation['table uptodate'];
				}
			} else {
				echo str_replace('<TableName>', $tableName, $Translation['couldnt count']);
			}
		} else { // given tableName doesn't exist

			if($oldTableName != '') { // if we have a table rename query
				if($ro = @db_query("SELECT COUNT(1) FROM `$oldTableName`")) { // if old table exists, rename it.
					$renameQuery = array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)) {
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					} else {
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				} else { // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			} else { // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)) {
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';

					// create table with a dummy field
					@db_query("CREATE TABLE IF NOT EXISTS `$tableName` (`_dummy_deletable_field` TINYINT)");
				} else {
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}

			// set Admin group permissions for newly created table if membership_grouppermissions exists
			if($ro = @db_query("SELECT COUNT(1) FROM `membership_grouppermissions`")) {
				// get Admins group id
				$ro = @db_query("SELECT `groupID` FROM `membership_groups` WHERE `name`='Admins'");
				if($ro) {
					$adminGroupID = intval(db_fetch_row($ro)[0]);
					if($adminGroupID) @db_query("INSERT IGNORE INTO `membership_grouppermissions` SET
						`groupID`='$adminGroupID',
						`tableName`='$tableName',
						`allowInsert`=1, `allowView`=1, `allowEdit`=1, `allowDelete`=1
					");
				}
			}
		}

		echo '</div>';

		$out = ob_get_clean();
		if(defined('APPGINI_SETUP') && APPGINI_SETUP) echo $out;
	}
