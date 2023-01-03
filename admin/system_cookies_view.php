<?php
// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/system_cookies.php');
	include_once(__DIR__ . '/system_cookies_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('system_cookies');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'system_cookies';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`system_cookies`.`id`" => "id",
		"`system_cookies`.`PATH`" => "PATH",
		"`system_cookies`.`HTTP_ACCEPT`" => "HTTP_ACCEPT",
		"`system_cookies`.`HTTP_ACCEPT_ENCODING`" => "HTTP_ACCEPT_ENCODING",
		"`system_cookies`.`HTTP_ACCEPT_LANGUAGE`" => "HTTP_ACCEPT_LANGUAGE",
		"`system_cookies`.`HTTP_COOKIE`" => "HTTP_COOKIE",
		"`system_cookies`.`HTTP_HOST`" => "HTTP_HOST",
		"`system_cookies`.`HTTP_USER_AGENT`" => "HTTP_USER_AGENT",
		"`system_cookies`.`HTTP_CACHE_CONTROL`" => "HTTP_CACHE_CONTROL",
		"`system_cookies`.`HTTP_SEC_CH_UA`" => "HTTP_SEC_CH_UA",
		"`system_cookies`.`HTTP_SEC_CH_UA_MOBILE`" => "HTTP_SEC_CH_UA_MOBILE",
		"`system_cookies`.`HTTP_SEC_CH_UA_PLATFORM`" => "HTTP_SEC_CH_UA_PLATFORM",
		"`system_cookies`.`HTTP_UPGRADE_INSECURE_REQUESTS`" => "HTTP_UPGRADE_INSECURE_REQUESTS",
		"`system_cookies`.`HTTP_SEC_FETCH_SITE`" => "HTTP_SEC_FETCH_SITE",
		"`system_cookies`.`HTTP_SEC_FETCH_MODE`" => "HTTP_SEC_FETCH_MODE",
		"`system_cookies`.`HTTP_SEC_FETCH_USER`" => "HTTP_SEC_FETCH_USER",
		"`system_cookies`.`HTTP_SEC_FETCH_DEST`" => "HTTP_SEC_FETCH_DEST",
		"`system_cookies`.`HTTP_X_HTTPS`" => "HTTP_X_HTTPS",
		"`system_cookies`.`DOCUMENT_ROOT`" => "DOCUMENT_ROOT",
		"`system_cookies`.`REMOTE_ADDR`" => "REMOTE_ADDR",
		"`system_cookies`.`REMOTE_PORT`" => "REMOTE_PORT",
		"`system_cookies`.`SERVER_ADDR`" => "SERVER_ADDR",
		"`system_cookies`.`SERVER_NAME`" => "SERVER_NAME",
		"`system_cookies`.`SERVER_ADMIN`" => "SERVER_ADMIN",
		"`system_cookies`.`SERVER_PORT`" => "SERVER_PORT",
		"`system_cookies`.`REQUEST_SCHEME`" => "REQUEST_SCHEME",
		"`system_cookies`.`REQUEST_URI`" => "REQUEST_URI",
		"`system_cookies`.`GEOIP_ADDR`" => "GEOIP_ADDR",
		"`system_cookies`.`GEOIP_CONTINENT_CODE`" => "GEOIP_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_CODE`" => "GEOIP_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_NAME`" => "GEOIP_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_CITY`" => "GEOIP_CITY",
		"`system_cookies`.`GEOIP_CITY_CONTINENT_CODE`" => "GEOIP_CITY_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_CODE`" => "GEOIP_CITY_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_NAME`" => "GEOIP_CITY_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_REGION`" => "GEOIP_REGION",
		"`system_cookies`.`GEOIP_LATITUDE`" => "GEOIP_LATITUDE",
		"`system_cookies`.`GEOIP_LONGITUDE`" => "GEOIP_LONGITUDE",
		"`system_cookies`.`GEOIP_ISP`" => "GEOIP_ISP",
		"`system_cookies`.`GEOIP_ORGANIZATION`" => "GEOIP_ORGANIZATION",
		"`system_cookies`.`GEOIP_POSTAL_CODE`" => "GEOIP_POSTAL_CODE",
		"`system_cookies`.`GEOIP_DMA_CODE`" => "GEOIP_DMA_CODE",
		"`system_cookies`.`HTTPS`" => "HTTPS",
		"`system_cookies`.`CRAWLER_USLEEP`" => "CRAWLER_USLEEP",
		"`system_cookies`.`CRAWLER_LOAD_LIMIT_ENFORCE`" => "CRAWLER_LOAD_LIMIT_ENFORCE",
		"`system_cookies`.`X_SPDY`" => "X_SPDY",
		"`system_cookies`.`SSL_PROTOCOL`" => "SSL_PROTOCOL",
		"`system_cookies`.`SSL_CIPHER`" => "SSL_CIPHER",
		"`system_cookies`.`SSL_CIPHER_USEKEYSIZE`" => "SSL_CIPHER_USEKEYSIZE",
		"`system_cookies`.`SSL_CIPHER_ALGKEYSIZE`" => "SSL_CIPHER_ALGKEYSIZE",
		"`system_cookies`.`SCRIPT_FILENAME`" => "SCRIPT_FILENAME",
		"`system_cookies`.`QUERY_STRING`" => "QUERY_STRING",
		"`system_cookies`.`SCRIPT_URI`" => "SCRIPT_URI",
		"`system_cookies`.`SCRIPT_URL`" => "SCRIPT_URL",
		"`system_cookies`.`SCRIPT_NAME`" => "SCRIPT_NAME",
		"`system_cookies`.`SERVER_PROTOCOL`" => "SERVER_PROTOCOL",
		"`system_cookies`.`SERVER_SOFTWARE`" => "SERVER_SOFTWARE",
		"`system_cookies`.`REQUEST_METHOD`" => "REQUEST_METHOD",
		"`system_cookies`.`PHP_SELF`" => "PHP_SELF",
		"`system_cookies`.`REQUEST_TIME_FLOAT`" => "REQUEST_TIME_FLOAT",
		"`system_cookies`.`REQUEST_TIME`" => "REQUEST_TIME",
		"`system_cookies`.`HTTP_REFERER`" => "HTTP_REFERER",
		"`system_cookies`.`REDIRECT_URL`" => "REDIRECT_URL",
		"`system_cookies`.`REDIRECT_REQUEST_METHOD`" => "REDIRECT_REQUEST_METHOD",
		"`system_cookies`.`REDIRECT_STATUS`" => "REDIRECT_STATUS",
		"`system_cookies`.`REDIRECT_QUERY_STRING`" => "REDIRECT_QUERY_STRING",
		"`system_cookies`.`HTTP_CONNECTION`" => "HTTP_CONNECTION",
		"`system_cookies`.`CONTENT_TYPE`" => "CONTENT_TYPE",
		"`system_cookies`.`CONTENT_LENGTH`" => "CONTENT_LENGTH",
		"`system_cookies`.`UNIQUE_ID`" => "UNIQUE_ID",
		"`system_cookies`.`SSL_SESSION_ID`" => "SSL_SESSION_ID",
		"`system_cookies`.`HTTP_X_REQUESTED_WITH`" => "HTTP_X_REQUESTED_WITH",
		"`system_cookies`.`HTTP_ORIGIN`" => "HTTP_ORIGIN",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`system_cookies`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => 18,
		19 => 19,
		20 => 20,
		21 => 21,
		22 => 22,
		23 => 23,
		24 => 24,
		25 => 25,
		26 => 26,
		27 => 27,
		28 => 28,
		29 => 29,
		30 => 30,
		31 => 31,
		32 => 32,
		33 => 33,
		34 => 34,
		35 => 35,
		36 => 36,
		37 => 37,
		38 => 38,
		39 => 39,
		40 => 40,
		41 => 41,
		42 => 42,
		43 => 43,
		44 => 44,
		45 => 45,
		46 => 46,
		47 => 47,
		48 => 48,
		49 => 49,
		50 => 50,
		51 => 51,
		52 => 52,
		53 => 53,
		54 => 54,
		55 => 55,
		56 => 56,
		57 => 57,
		58 => 58,
		59 => 59,
		60 => 60,
		61 => 61,
		62 => 62,
		63 => 63,
		64 => 64,
		65 => 65,
		66 => 66,
		67 => 67,
		68 => 68,
		69 => 69,
		70 => 70,
		71 => 71,
		72 => 72,
		73 => 73,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`system_cookies`.`id`" => "id",
		"`system_cookies`.`PATH`" => "PATH",
		"`system_cookies`.`HTTP_ACCEPT`" => "HTTP_ACCEPT",
		"`system_cookies`.`HTTP_ACCEPT_ENCODING`" => "HTTP_ACCEPT_ENCODING",
		"`system_cookies`.`HTTP_ACCEPT_LANGUAGE`" => "HTTP_ACCEPT_LANGUAGE",
		"`system_cookies`.`HTTP_COOKIE`" => "HTTP_COOKIE",
		"`system_cookies`.`HTTP_HOST`" => "HTTP_HOST",
		"`system_cookies`.`HTTP_USER_AGENT`" => "HTTP_USER_AGENT",
		"`system_cookies`.`HTTP_CACHE_CONTROL`" => "HTTP_CACHE_CONTROL",
		"`system_cookies`.`HTTP_SEC_CH_UA`" => "HTTP_SEC_CH_UA",
		"`system_cookies`.`HTTP_SEC_CH_UA_MOBILE`" => "HTTP_SEC_CH_UA_MOBILE",
		"`system_cookies`.`HTTP_SEC_CH_UA_PLATFORM`" => "HTTP_SEC_CH_UA_PLATFORM",
		"`system_cookies`.`HTTP_UPGRADE_INSECURE_REQUESTS`" => "HTTP_UPGRADE_INSECURE_REQUESTS",
		"`system_cookies`.`HTTP_SEC_FETCH_SITE`" => "HTTP_SEC_FETCH_SITE",
		"`system_cookies`.`HTTP_SEC_FETCH_MODE`" => "HTTP_SEC_FETCH_MODE",
		"`system_cookies`.`HTTP_SEC_FETCH_USER`" => "HTTP_SEC_FETCH_USER",
		"`system_cookies`.`HTTP_SEC_FETCH_DEST`" => "HTTP_SEC_FETCH_DEST",
		"`system_cookies`.`HTTP_X_HTTPS`" => "HTTP_X_HTTPS",
		"`system_cookies`.`DOCUMENT_ROOT`" => "DOCUMENT_ROOT",
		"`system_cookies`.`REMOTE_ADDR`" => "REMOTE_ADDR",
		"`system_cookies`.`REMOTE_PORT`" => "REMOTE_PORT",
		"`system_cookies`.`SERVER_ADDR`" => "SERVER_ADDR",
		"`system_cookies`.`SERVER_NAME`" => "SERVER_NAME",
		"`system_cookies`.`SERVER_ADMIN`" => "SERVER_ADMIN",
		"`system_cookies`.`SERVER_PORT`" => "SERVER_PORT",
		"`system_cookies`.`REQUEST_SCHEME`" => "REQUEST_SCHEME",
		"`system_cookies`.`REQUEST_URI`" => "REQUEST_URI",
		"`system_cookies`.`GEOIP_ADDR`" => "GEOIP_ADDR",
		"`system_cookies`.`GEOIP_CONTINENT_CODE`" => "GEOIP_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_CODE`" => "GEOIP_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_NAME`" => "GEOIP_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_CITY`" => "GEOIP_CITY",
		"`system_cookies`.`GEOIP_CITY_CONTINENT_CODE`" => "GEOIP_CITY_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_CODE`" => "GEOIP_CITY_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_NAME`" => "GEOIP_CITY_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_REGION`" => "GEOIP_REGION",
		"`system_cookies`.`GEOIP_LATITUDE`" => "GEOIP_LATITUDE",
		"`system_cookies`.`GEOIP_LONGITUDE`" => "GEOIP_LONGITUDE",
		"`system_cookies`.`GEOIP_ISP`" => "GEOIP_ISP",
		"`system_cookies`.`GEOIP_ORGANIZATION`" => "GEOIP_ORGANIZATION",
		"`system_cookies`.`GEOIP_POSTAL_CODE`" => "GEOIP_POSTAL_CODE",
		"`system_cookies`.`GEOIP_DMA_CODE`" => "GEOIP_DMA_CODE",
		"`system_cookies`.`HTTPS`" => "HTTPS",
		"`system_cookies`.`CRAWLER_USLEEP`" => "CRAWLER_USLEEP",
		"`system_cookies`.`CRAWLER_LOAD_LIMIT_ENFORCE`" => "CRAWLER_LOAD_LIMIT_ENFORCE",
		"`system_cookies`.`X_SPDY`" => "X_SPDY",
		"`system_cookies`.`SSL_PROTOCOL`" => "SSL_PROTOCOL",
		"`system_cookies`.`SSL_CIPHER`" => "SSL_CIPHER",
		"`system_cookies`.`SSL_CIPHER_USEKEYSIZE`" => "SSL_CIPHER_USEKEYSIZE",
		"`system_cookies`.`SSL_CIPHER_ALGKEYSIZE`" => "SSL_CIPHER_ALGKEYSIZE",
		"`system_cookies`.`SCRIPT_FILENAME`" => "SCRIPT_FILENAME",
		"`system_cookies`.`QUERY_STRING`" => "QUERY_STRING",
		"`system_cookies`.`SCRIPT_URI`" => "SCRIPT_URI",
		"`system_cookies`.`SCRIPT_URL`" => "SCRIPT_URL",
		"`system_cookies`.`SCRIPT_NAME`" => "SCRIPT_NAME",
		"`system_cookies`.`SERVER_PROTOCOL`" => "SERVER_PROTOCOL",
		"`system_cookies`.`SERVER_SOFTWARE`" => "SERVER_SOFTWARE",
		"`system_cookies`.`REQUEST_METHOD`" => "REQUEST_METHOD",
		"`system_cookies`.`PHP_SELF`" => "PHP_SELF",
		"`system_cookies`.`REQUEST_TIME_FLOAT`" => "REQUEST_TIME_FLOAT",
		"`system_cookies`.`REQUEST_TIME`" => "REQUEST_TIME",
		"`system_cookies`.`HTTP_REFERER`" => "HTTP_REFERER",
		"`system_cookies`.`REDIRECT_URL`" => "REDIRECT_URL",
		"`system_cookies`.`REDIRECT_REQUEST_METHOD`" => "REDIRECT_REQUEST_METHOD",
		"`system_cookies`.`REDIRECT_STATUS`" => "REDIRECT_STATUS",
		"`system_cookies`.`REDIRECT_QUERY_STRING`" => "REDIRECT_QUERY_STRING",
		"`system_cookies`.`HTTP_CONNECTION`" => "HTTP_CONNECTION",
		"`system_cookies`.`CONTENT_TYPE`" => "CONTENT_TYPE",
		"`system_cookies`.`CONTENT_LENGTH`" => "CONTENT_LENGTH",
		"`system_cookies`.`UNIQUE_ID`" => "UNIQUE_ID",
		"`system_cookies`.`SSL_SESSION_ID`" => "SSL_SESSION_ID",
		"`system_cookies`.`HTTP_X_REQUESTED_WITH`" => "HTTP_X_REQUESTED_WITH",
		"`system_cookies`.`HTTP_ORIGIN`" => "HTTP_ORIGIN",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`system_cookies`.`id`" => "Id",
		"`system_cookies`.`PATH`" => "PATH",
		"`system_cookies`.`HTTP_ACCEPT`" => "HTTP_ACCEPT",
		"`system_cookies`.`HTTP_ACCEPT_ENCODING`" => "HTTP_ACCEPT_ENCODING",
		"`system_cookies`.`HTTP_ACCEPT_LANGUAGE`" => "HTTP_ACCEPT_LANGUAGE",
		"`system_cookies`.`HTTP_COOKIE`" => "HTTP_COOKIE",
		"`system_cookies`.`HTTP_HOST`" => "HTTP_HOST",
		"`system_cookies`.`HTTP_USER_AGENT`" => "HTTP_USER_AGENT",
		"`system_cookies`.`HTTP_CACHE_CONTROL`" => "HTTP_CACHE_CONTROL",
		"`system_cookies`.`HTTP_SEC_CH_UA`" => "HTTP_SEC_CH_UA",
		"`system_cookies`.`HTTP_SEC_CH_UA_MOBILE`" => "HTTP_SEC_CH_UA_MOBILE",
		"`system_cookies`.`HTTP_SEC_CH_UA_PLATFORM`" => "HTTP_SEC_CH_UA_PLATFORM",
		"`system_cookies`.`HTTP_UPGRADE_INSECURE_REQUESTS`" => "HTTP_UPGRADE_INSECURE_REQUESTS",
		"`system_cookies`.`HTTP_SEC_FETCH_SITE`" => "HTTP_SEC_FETCH_SITE",
		"`system_cookies`.`HTTP_SEC_FETCH_MODE`" => "HTTP_SEC_FETCH_MODE",
		"`system_cookies`.`HTTP_SEC_FETCH_USER`" => "HTTP_SEC_FETCH_USER",
		"`system_cookies`.`HTTP_SEC_FETCH_DEST`" => "HTTP_SEC_FETCH_DEST",
		"`system_cookies`.`HTTP_X_HTTPS`" => "HTTP_X_HTTPS",
		"`system_cookies`.`DOCUMENT_ROOT`" => "DOCUMENT_ROOT",
		"`system_cookies`.`REMOTE_ADDR`" => "REMOTE_ADDR",
		"`system_cookies`.`REMOTE_PORT`" => "REMOTE_PORT",
		"`system_cookies`.`SERVER_ADDR`" => "SERVER_ADDR",
		"`system_cookies`.`SERVER_NAME`" => "SERVER_NAME",
		"`system_cookies`.`SERVER_ADMIN`" => "SERVER_ADMIN",
		"`system_cookies`.`SERVER_PORT`" => "SERVER_PORT",
		"`system_cookies`.`REQUEST_SCHEME`" => "REQUEST_SCHEME",
		"`system_cookies`.`REQUEST_URI`" => "REQUEST_URI",
		"`system_cookies`.`GEOIP_ADDR`" => "GEOIP_ADDR",
		"`system_cookies`.`GEOIP_CONTINENT_CODE`" => "GEOIP_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_CODE`" => "GEOIP_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_NAME`" => "GEOIP_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_CITY`" => "GEOIP_CITY",
		"`system_cookies`.`GEOIP_CITY_CONTINENT_CODE`" => "GEOIP_CITY_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_CODE`" => "GEOIP_CITY_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_NAME`" => "GEOIP_CITY_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_REGION`" => "GEOIP_REGION",
		"`system_cookies`.`GEOIP_LATITUDE`" => "GEOIP_LATITUDE",
		"`system_cookies`.`GEOIP_LONGITUDE`" => "GEOIP_LONGITUDE",
		"`system_cookies`.`GEOIP_ISP`" => "GEOIP_ISP",
		"`system_cookies`.`GEOIP_ORGANIZATION`" => "GEOIP_ORGANIZATION",
		"`system_cookies`.`GEOIP_POSTAL_CODE`" => "GEOIP_POSTAL_CODE",
		"`system_cookies`.`GEOIP_DMA_CODE`" => "GEOIP_DMA_CODE",
		"`system_cookies`.`HTTPS`" => "HTTPS",
		"`system_cookies`.`CRAWLER_USLEEP`" => "CRAWLER_USLEEP",
		"`system_cookies`.`CRAWLER_LOAD_LIMIT_ENFORCE`" => "CRAWLER_LOAD_LIMIT_ENFORCE",
		"`system_cookies`.`X_SPDY`" => "X_SPDY",
		"`system_cookies`.`SSL_PROTOCOL`" => "SSL_PROTOCOL",
		"`system_cookies`.`SSL_CIPHER`" => "SSL_CIPHER",
		"`system_cookies`.`SSL_CIPHER_USEKEYSIZE`" => "SSL_CIPHER_USEKEYSIZE",
		"`system_cookies`.`SSL_CIPHER_ALGKEYSIZE`" => "SSL_CIPHER_ALGKEYSIZE",
		"`system_cookies`.`SCRIPT_FILENAME`" => "SCRIPT_FILENAME",
		"`system_cookies`.`QUERY_STRING`" => "QUERY_STRING",
		"`system_cookies`.`SCRIPT_URI`" => "SCRIPT_URI",
		"`system_cookies`.`SCRIPT_URL`" => "SCRIPT_URL",
		"`system_cookies`.`SCRIPT_NAME`" => "SCRIPT_NAME",
		"`system_cookies`.`SERVER_PROTOCOL`" => "SERVER_PROTOCOL",
		"`system_cookies`.`SERVER_SOFTWARE`" => "SERVER_SOFTWARE",
		"`system_cookies`.`REQUEST_METHOD`" => "REQUEST_METHOD",
		"`system_cookies`.`PHP_SELF`" => "PHP_SELF",
		"`system_cookies`.`REQUEST_TIME_FLOAT`" => "REQUEST_TIME_FLOAT",
		"`system_cookies`.`REQUEST_TIME`" => "REQUEST_TIME",
		"`system_cookies`.`HTTP_REFERER`" => "HTTP_REFERER",
		"`system_cookies`.`REDIRECT_URL`" => "REDIRECT_URL",
		"`system_cookies`.`REDIRECT_REQUEST_METHOD`" => "REDIRECT_REQUEST_METHOD",
		"`system_cookies`.`REDIRECT_STATUS`" => "REDIRECT_STATUS",
		"`system_cookies`.`REDIRECT_QUERY_STRING`" => "REDIRECT_QUERY_STRING",
		"`system_cookies`.`HTTP_CONNECTION`" => "HTTP_CONNECTION",
		"`system_cookies`.`CONTENT_TYPE`" => "CONTENT_TYPE",
		"`system_cookies`.`CONTENT_LENGTH`" => "CONTENT_LENGTH",
		"`system_cookies`.`UNIQUE_ID`" => "UNIQUE_ID",
		"`system_cookies`.`SSL_SESSION_ID`" => "SSL_SESSION_ID",
		"`system_cookies`.`HTTP_X_REQUESTED_WITH`" => "HTTP_X_REQUESTED_WITH",
		"`system_cookies`.`HTTP_ORIGIN`" => "HTTP_ORIGIN",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`system_cookies`.`id`" => "id",
		"`system_cookies`.`PATH`" => "PATH",
		"`system_cookies`.`HTTP_ACCEPT`" => "HTTP_ACCEPT",
		"`system_cookies`.`HTTP_ACCEPT_ENCODING`" => "HTTP_ACCEPT_ENCODING",
		"`system_cookies`.`HTTP_ACCEPT_LANGUAGE`" => "HTTP_ACCEPT_LANGUAGE",
		"`system_cookies`.`HTTP_COOKIE`" => "HTTP_COOKIE",
		"`system_cookies`.`HTTP_HOST`" => "HTTP_HOST",
		"`system_cookies`.`HTTP_USER_AGENT`" => "HTTP_USER_AGENT",
		"`system_cookies`.`HTTP_CACHE_CONTROL`" => "HTTP_CACHE_CONTROL",
		"`system_cookies`.`HTTP_SEC_CH_UA`" => "HTTP_SEC_CH_UA",
		"`system_cookies`.`HTTP_SEC_CH_UA_MOBILE`" => "HTTP_SEC_CH_UA_MOBILE",
		"`system_cookies`.`HTTP_SEC_CH_UA_PLATFORM`" => "HTTP_SEC_CH_UA_PLATFORM",
		"`system_cookies`.`HTTP_UPGRADE_INSECURE_REQUESTS`" => "HTTP_UPGRADE_INSECURE_REQUESTS",
		"`system_cookies`.`HTTP_SEC_FETCH_SITE`" => "HTTP_SEC_FETCH_SITE",
		"`system_cookies`.`HTTP_SEC_FETCH_MODE`" => "HTTP_SEC_FETCH_MODE",
		"`system_cookies`.`HTTP_SEC_FETCH_USER`" => "HTTP_SEC_FETCH_USER",
		"`system_cookies`.`HTTP_SEC_FETCH_DEST`" => "HTTP_SEC_FETCH_DEST",
		"`system_cookies`.`HTTP_X_HTTPS`" => "HTTP_X_HTTPS",
		"`system_cookies`.`DOCUMENT_ROOT`" => "DOCUMENT_ROOT",
		"`system_cookies`.`REMOTE_ADDR`" => "REMOTE_ADDR",
		"`system_cookies`.`REMOTE_PORT`" => "REMOTE_PORT",
		"`system_cookies`.`SERVER_ADDR`" => "SERVER_ADDR",
		"`system_cookies`.`SERVER_NAME`" => "SERVER_NAME",
		"`system_cookies`.`SERVER_ADMIN`" => "SERVER_ADMIN",
		"`system_cookies`.`SERVER_PORT`" => "SERVER_PORT",
		"`system_cookies`.`REQUEST_SCHEME`" => "REQUEST_SCHEME",
		"`system_cookies`.`REQUEST_URI`" => "REQUEST_URI",
		"`system_cookies`.`GEOIP_ADDR`" => "GEOIP_ADDR",
		"`system_cookies`.`GEOIP_CONTINENT_CODE`" => "GEOIP_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_CODE`" => "GEOIP_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_COUNTRY_NAME`" => "GEOIP_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_CITY`" => "GEOIP_CITY",
		"`system_cookies`.`GEOIP_CITY_CONTINENT_CODE`" => "GEOIP_CITY_CONTINENT_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_CODE`" => "GEOIP_CITY_COUNTRY_CODE",
		"`system_cookies`.`GEOIP_CITY_COUNTRY_NAME`" => "GEOIP_CITY_COUNTRY_NAME",
		"`system_cookies`.`GEOIP_REGION`" => "GEOIP_REGION",
		"`system_cookies`.`GEOIP_LATITUDE`" => "GEOIP_LATITUDE",
		"`system_cookies`.`GEOIP_LONGITUDE`" => "GEOIP_LONGITUDE",
		"`system_cookies`.`GEOIP_ISP`" => "GEOIP_ISP",
		"`system_cookies`.`GEOIP_ORGANIZATION`" => "GEOIP_ORGANIZATION",
		"`system_cookies`.`GEOIP_POSTAL_CODE`" => "GEOIP_POSTAL_CODE",
		"`system_cookies`.`GEOIP_DMA_CODE`" => "GEOIP_DMA_CODE",
		"`system_cookies`.`HTTPS`" => "HTTPS",
		"`system_cookies`.`CRAWLER_USLEEP`" => "CRAWLER_USLEEP",
		"`system_cookies`.`CRAWLER_LOAD_LIMIT_ENFORCE`" => "CRAWLER_LOAD_LIMIT_ENFORCE",
		"`system_cookies`.`X_SPDY`" => "X_SPDY",
		"`system_cookies`.`SSL_PROTOCOL`" => "SSL_PROTOCOL",
		"`system_cookies`.`SSL_CIPHER`" => "SSL_CIPHER",
		"`system_cookies`.`SSL_CIPHER_USEKEYSIZE`" => "SSL_CIPHER_USEKEYSIZE",
		"`system_cookies`.`SSL_CIPHER_ALGKEYSIZE`" => "SSL_CIPHER_ALGKEYSIZE",
		"`system_cookies`.`SCRIPT_FILENAME`" => "SCRIPT_FILENAME",
		"`system_cookies`.`QUERY_STRING`" => "QUERY_STRING",
		"`system_cookies`.`SCRIPT_URI`" => "SCRIPT_URI",
		"`system_cookies`.`SCRIPT_URL`" => "SCRIPT_URL",
		"`system_cookies`.`SCRIPT_NAME`" => "SCRIPT_NAME",
		"`system_cookies`.`SERVER_PROTOCOL`" => "SERVER_PROTOCOL",
		"`system_cookies`.`SERVER_SOFTWARE`" => "SERVER_SOFTWARE",
		"`system_cookies`.`REQUEST_METHOD`" => "REQUEST_METHOD",
		"`system_cookies`.`PHP_SELF`" => "PHP_SELF",
		"`system_cookies`.`REQUEST_TIME_FLOAT`" => "REQUEST_TIME_FLOAT",
		"`system_cookies`.`REQUEST_TIME`" => "REQUEST_TIME",
		"`system_cookies`.`HTTP_REFERER`" => "HTTP_REFERER",
		"`system_cookies`.`REDIRECT_URL`" => "REDIRECT_URL",
		"`system_cookies`.`REDIRECT_REQUEST_METHOD`" => "REDIRECT_REQUEST_METHOD",
		"`system_cookies`.`REDIRECT_STATUS`" => "REDIRECT_STATUS",
		"`system_cookies`.`REDIRECT_QUERY_STRING`" => "REDIRECT_QUERY_STRING",
		"`system_cookies`.`HTTP_CONNECTION`" => "HTTP_CONNECTION",
		"`system_cookies`.`CONTENT_TYPE`" => "CONTENT_TYPE",
		"`system_cookies`.`CONTENT_LENGTH`" => "CONTENT_LENGTH",
		"`system_cookies`.`UNIQUE_ID`" => "UNIQUE_ID",
		"`system_cookies`.`SSL_SESSION_ID`" => "SSL_SESSION_ID",
		"`system_cookies`.`HTTP_X_REQUESTED_WITH`" => "HTTP_X_REQUESTED_WITH",
		"`system_cookies`.`HTTP_ORIGIN`" => "HTTP_ORIGIN",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`system_cookies` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = true;
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
	$x->ScriptFileName = 'system_cookies_view.php';
	$x->TableTitle = 'System_cookies';
	$x->TableIcon = 'resources/table_icons/cookies.png';
	$x->PrimaryKey = '`system_cookies`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Id', 'PATH', 'HTTP_ACCEPT', 'HTTP_ACCEPT_ENCODING', 'HTTP_ACCEPT_LANGUAGE', 'HTTP_COOKIE', 'HTTP_HOST', 'HTTP_USER_AGENT', 'HTTP_CACHE_CONTROL', 'HTTP_SEC_CH_UA', 'HTTP_SEC_CH_UA_MOBILE', 'HTTP_SEC_CH_UA_PLATFORM', 'HTTP_UPGRADE_INSECURE_REQUESTS', 'HTTP_SEC_FETCH_SITE', 'HTTP_SEC_FETCH_MODE', 'HTTP_SEC_FETCH_USER', 'HTTP_SEC_FETCH_DEST', 'HTTP_X_HTTPS', 'DOCUMENT_ROOT', 'REMOTE_ADDR', 'REMOTE_PORT', 'SERVER_ADDR', 'SERVER_NAME', 'SERVER_ADMIN', 'SERVER_PORT', 'REQUEST_SCHEME', 'REQUEST_URI', 'GEOIP_ADDR', 'GEOIP_CONTINENT_CODE', 'GEOIP_COUNTRY_CODE', 'GEOIP_COUNTRY_NAME', 'GEOIP_CITY', 'GEOIP_CITY_CONTINENT_CODE', 'GEOIP_CITY_COUNTRY_CODE', 'GEOIP_CITY_COUNTRY_NAME', 'GEOIP_REGION', 'GEOIP_LATITUDE', 'GEOIP_LONGITUDE', 'GEOIP_ISP', 'GEOIP_ORGANIZATION', 'GEOIP_POSTAL_CODE', 'GEOIP_DMA_CODE', 'HTTPS', 'CRAWLER_USLEEP', 'CRAWLER_LOAD_LIMIT_ENFORCE', 'X_SPDY', 'SSL_PROTOCOL', 'SSL_CIPHER', 'SSL_CIPHER_USEKEYSIZE', 'SSL_CIPHER_ALGKEYSIZE', 'SCRIPT_FILENAME', 'QUERY_STRING', 'SCRIPT_URI', 'SCRIPT_URL', 'SCRIPT_NAME', 'SERVER_PROTOCOL', 'SERVER_SOFTWARE', 'REQUEST_METHOD', 'PHP_SELF', 'REQUEST_TIME_FLOAT', 'REQUEST_TIME', 'HTTP_REFERER', 'REDIRECT_URL', 'REDIRECT_REQUEST_METHOD', 'REDIRECT_STATUS', 'REDIRECT_QUERY_STRING', 'HTTP_CONNECTION', 'CONTENT_TYPE', 'CONTENT_LENGTH', 'UNIQUE_ID', 'SSL_SESSION_ID', 'HTTP_X_REQUESTED_WITH', 'HTTP_ORIGIN', ];
	$x->ColFieldName = ['id', 'PATH', 'HTTP_ACCEPT', 'HTTP_ACCEPT_ENCODING', 'HTTP_ACCEPT_LANGUAGE', 'HTTP_COOKIE', 'HTTP_HOST', 'HTTP_USER_AGENT', 'HTTP_CACHE_CONTROL', 'HTTP_SEC_CH_UA', 'HTTP_SEC_CH_UA_MOBILE', 'HTTP_SEC_CH_UA_PLATFORM', 'HTTP_UPGRADE_INSECURE_REQUESTS', 'HTTP_SEC_FETCH_SITE', 'HTTP_SEC_FETCH_MODE', 'HTTP_SEC_FETCH_USER', 'HTTP_SEC_FETCH_DEST', 'HTTP_X_HTTPS', 'DOCUMENT_ROOT', 'REMOTE_ADDR', 'REMOTE_PORT', 'SERVER_ADDR', 'SERVER_NAME', 'SERVER_ADMIN', 'SERVER_PORT', 'REQUEST_SCHEME', 'REQUEST_URI', 'GEOIP_ADDR', 'GEOIP_CONTINENT_CODE', 'GEOIP_COUNTRY_CODE', 'GEOIP_COUNTRY_NAME', 'GEOIP_CITY', 'GEOIP_CITY_CONTINENT_CODE', 'GEOIP_CITY_COUNTRY_CODE', 'GEOIP_CITY_COUNTRY_NAME', 'GEOIP_REGION', 'GEOIP_LATITUDE', 'GEOIP_LONGITUDE', 'GEOIP_ISP', 'GEOIP_ORGANIZATION', 'GEOIP_POSTAL_CODE', 'GEOIP_DMA_CODE', 'HTTPS', 'CRAWLER_USLEEP', 'CRAWLER_LOAD_LIMIT_ENFORCE', 'X_SPDY', 'SSL_PROTOCOL', 'SSL_CIPHER', 'SSL_CIPHER_USEKEYSIZE', 'SSL_CIPHER_ALGKEYSIZE', 'SCRIPT_FILENAME', 'QUERY_STRING', 'SCRIPT_URI', 'SCRIPT_URL', 'SCRIPT_NAME', 'SERVER_PROTOCOL', 'SERVER_SOFTWARE', 'REQUEST_METHOD', 'PHP_SELF', 'REQUEST_TIME_FLOAT', 'REQUEST_TIME', 'HTTP_REFERER', 'REDIRECT_URL', 'REDIRECT_REQUEST_METHOD', 'REDIRECT_STATUS', 'REDIRECT_QUERY_STRING', 'HTTP_CONNECTION', 'CONTENT_TYPE', 'CONTENT_LENGTH', 'UNIQUE_ID', 'SSL_SESSION_ID', 'HTTP_X_REQUESTED_WITH', 'HTTP_ORIGIN', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/system_cookies_templateTV.html';
	$x->SelectedTemplate = 'templates/system_cookies_templateTVS.html';
	$x->TemplateDV = 'templates/system_cookies_templateDV.html';
	$x->TemplateDVP = 'templates/system_cookies_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: system_cookies_init
	$render = true;
	if(function_exists('system_cookies_init')) {
		$args = [];
		$render = system_cookies_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: system_cookies_header
	$headerCode = '';
	if(function_exists('system_cookies_header')) {
		$args = [];
		$headerCode = system_cookies_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: system_cookies_footer
	$footerCode = '';
	if(function_exists('system_cookies_footer')) {
		$args = [];
		$footerCode = system_cookies_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}