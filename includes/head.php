<?php
$start_time = microtime(true);
include '../includes/conn.php';
include '../includes/session.php';
require '../vendor/autoload.php';
include '../includes/api_config.php';
?>

<head>
	<title>Kotnova</title>
	<meta charset="utf-8" />
	<meta name="description" content="Grow and manage your Twitter account. Let us give you content for your Twitter account. Mass like tweets and replies. Mass delete old tweets from your account. Mass follow accounts on Twitter. Get to use a source label of your choice." />
	<meta name="keywords" content="Twitter, gain followers, twitter grow, likes, follows, tweets, auto-follow, auto-reply, twitter manage, follow for follow, KOT, Kenyans on twitter, Kenyan twitter" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Grow and manage your Twitter account." />
	<meta property="og:url" content="https://kotnova.com/" />
	<meta property="og:site_name" content="Kotnova" />
	<meta name="twitter:title" content="The Twitter Manager and Growth Expert">
	<meta name="twitter:description" content="Grow and manage your Twitter account.">
	<meta name="twitter:image" content="https://kotnova.com/assets/media/logos/logo_full_bold.png">
	<meta name="twitter:card" content="summary_large_image">
	<link rel="canonical" href="https://kotnova.com/" />
	<link rel="shortcut icon" href="../assets/media/logos/icon_b.png" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used by this page)-->
	<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>

	<!--end::Global Stylesheets Bundle-->
	<!--Begin::Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src = '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
	</script>
	<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
	<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />
	<!--End::Google Tag Manager -->
</head>