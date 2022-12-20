<?php
include 'includes/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<title>Kotnova</title>
	<meta charset="utf-8" />
	<meta charset="utf-8" />
    <meta name="msapplication-TileColor" content="#ff5f6d" />
    <meta name="theme-color" content="#ff5f6d" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow" />
    <meta data-hid="charset" charset="utf-8" />
    <meta data-hid="mobile-web-app-capable" name="mobile-web-app-capable" content="yes" />
    <meta data-hid="apple-mobile-web-app-title" name="apple-mobile-web-app-title" content="Kotnova" />
	<meta name="description" content="Kotnova - Grow and manage your Twitter account with the Kotnova Twitter Artificial Intelligence Let us give you content for your Twitter account. Mass like tweets and replies. Mass delete old tweets from your account. Mass follow accounts on Twitter. Get to use a source label of your choice." />
	<meta name="keywords" content="Twitter, gain followers, twitter grow, likes, follows, tweets, auto-follow, auto-reply, twitter manage, follow for follow, KOT, Kenyans on twitter, Kenyan twitter" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Kotnova - Grow and manage your Twitter account with the Kotnova Twitter Artificial Intelligence" />
	<meta property="og:url" content="https://kotnova.com/" />
	<meta property="og:site_name" content="Kotnova" />
	<meta name="twitter:title" content="The Twitter Manager and Growth Expert">
	<meta name="twitter:description" content="Kotnova - Grow and manage your Twitter account with the Kotnova Twitter Artificial Intelligence">
	<meta name="twitter:image" content="https://kotnova.com/assets/media/logos/icon_b.png">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:url" content="https://www.kotnova.com" />
	<meta name="twitter:site" content="@Kotnovaa" />
	<link rel="canonical" href="https://kotnova.com/" />
	<link rel="shortcut icon" href="assets/media/logos/icon_b.png" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used by this page)-->
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
			j.src = 'www.googletagmanager.com/gtm5445.html?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-MDKZXTL');
	</script>
	<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
	<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />
	<!--End::Google Tag Manager -->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-white position-relative">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-theme-mode");
			} else {
				if (localStorage.getItem("data-theme") !== null) {
					themeMode = localStorage.getItem("data-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-theme", themeMode);
		}
	</script>
	<!--end::Theme mode setup on page load-->
	<!--Begin::Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDKZXTL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!--End::Google Tag Manager (noscript) -->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Header Section-->
		<div class="mb-0" id="home">
			<!--begin::Wrapper-->
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
				<!--begin::Header-->
				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center justify-content-between">
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-equal">
								<!--begin::Mobile menu toggle-->
								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-2hx">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</button>
								<!--end::Mobile menu toggle-->
								<!--begin::Logo image-->
								<a href="landing.html">
									<img alt="Logo" src="assets/media/logos/logo_full_bold.png" class="logo-default h-35px h-lg-40px" />
									<img alt="Logo" src="assets/media/logos/logo_full_bold.png" class="logo-sticky h-30px h-lg-35px" />
								</a>
								<!--end::Logo image-->
							</div>
							<!--end::Logo-->
							<!--begin::Menu wrapper-->
							<div class="d-lg-block" id="kt_header_nav_wrapper">
								<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
									<!--begin::Menu-->
									<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How it Works</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Achievements</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Features</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Toolbar-->
							<div class="flex-equal text-end ms-1">
								<a href="v2/login" class="btn btn-success">Sign In</a>
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Landing hero-->
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<!--begin::Heading-->
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<!--begin::Title-->
						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Manage, Grow and Automate your Account
							<br />with
							<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">The Best Twitter Bot Ever</span>
							</span>
						</h1>
						<!--end::Title-->
						<!--begin::Action-->
						<a href="v2/new" class="btn btn-primary">Try Kotnova</a>
						<!--end::Action-->
					</div>
					<!--end::Heading-->
					<!--begin::Clients-->
					<div class="d-flex flex-center flex-wrap position-relative px-5">
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
							<img src="assets/media/svg/brand-logos/fujifilm.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
							<img src="assets/media/svg/brand-logos/vodafone.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
							<img src="assets/media/svg/brand-logos/kpmg.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
							<img src="assets/media/svg/brand-logos/nasa.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
							<img src="assets/media/svg/brand-logos/aspnetzero.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
							<img src="assets/media/svg/brand-logos/aon.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
							<img src="assets/media/svg/brand-logos/hp-3.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
							<img src="assets/media/svg/brand-logos/truman.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
					</div>
					<!--end::Clients-->
				</div>
				<!--end::Landing hero-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Header Section-->
		<!--begin::How It Works Section-->
		<div class="mb-n10 mb-lg-n20 z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-17">
					<!--begin::Title-->
					<h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How it Works</h3>
					<!--end::Title-->
					<!--begin::Text-->
					<div class="fs-5 text-muted fw-bold">To get the best experience you need to have an elevated
						<br />access Twitter developer account.
					</div>
					<!--end::Text-->
				</div>
				<!--end::Heading-->
				<!--begin::Row-->
				<div class="row w-100 gy-10 mb-md-20">
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
								<!--end::Badge-->
								<!--begin::Title-->
								<div class="fs-5 fs-lg-3 fw-bold text-dark">Getting started</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Register for Twitter developer account
								<br />then apply for an elevated access
								<br />Developer account
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
								<!--end::Badge-->
								<!--begin::Title-->
								<div class="fs-5 fs-lg-3 fw-bold text-dark">Setup Your App</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Sign up then navigate to the settings
								<br />tab under add App and add your
								<br />keys and tokens as given by Twitter.
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
								<!--end::Badge-->
								<!--begin::Title-->
								<div class="fs-5 fs-lg-3 fw-bold text-dark">Enjoy TweetBot</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">After a successful setup enjoy your adventure
								<br />via the awesome features provided
								<br />by the App
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::How It Works Section-->
		<!--begin::Statistics Section-->
		<div class="mt-8">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="pb-15 pt-18 landing-dark-bg">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
						<!--begin::Title-->
						<h3 class="fs-2hx text-white fw-bold mb-5">We Make Things Better</h3>
						<!--end::Title-->
						<!--begin::Description-->
						<div class="fs-5 text-gray-700 fw-bold">Save time by using our automation tools to manage
							<br />grow and tweet. Be unique. Use your label.
						</div>
						<!--end::Description-->
					</div>
					<!--end::Heading-->
					<!--begin::Statistics-->
					<div class="d-flex flex-center">
						<!--begin::Items-->
						<div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
							<!--begin::Item-->
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<!--begin::Symbol-->
								<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
								<span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<!--end::Symbol-->
								<!--begin::Info-->
								<div class="mb-0">
									<!--begin::Value-->
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="3" data-kt-countup-suffix="M+">0</div>
									</div>
									<!--end::Value-->
									<!--begin::Label-->
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Tweet likes</span>
									<!--end::Label-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<!--begin::Symbol-->
								<!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
								<span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
										<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
										<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<!--end::Symbol-->
								<!--begin::Info-->
								<div class="mb-0">
									<!--begin::Value-->
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80" data-kt-countup-suffix="K+">0</div>
									</div>
									<!--end::Value-->
									<!--begin::Label-->
									<span class="text-gray-600 fw-semibold fs-5 lh-0">User follows</span>
									<!--end::Label-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<!--begin::Symbol-->
								<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
								<span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor" />
										<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor" />
										<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<!--end::Symbol-->
								<!--begin::Info-->
								<div class="mb-0">
									<!--begin::Value-->
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35" data-kt-countup-suffix="K+">0</div>
									</div>
									<!--end::Value-->
									<!--begin::Label-->
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Tweeted tweets</span>
									<!--end::Label-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Items-->
					</div>
					<!--end::Statistics-->
					<!--begin::Testimonial-->
					<div class="fs-2 fw-semibold text-muted text-center mb-3">
						<span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write about it in a
						<br />
						<span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
						<span class="fs-1 lh-1 text-gray-700">“</span>
					</div>
					<!--end::Testimonial-->
					<!--begin::Author-->
					<div class="fs-2 fw-semibold text-muted text-center">
						<a href="#" class="link-primary fs-4 fw-bold">Warorua Alex,</a>
						<span class="fs-4 fw-bold text-gray-600">Kotnova Developer</span>
					</div>
					<!--end::Author-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Statistics Section-->
		<!--begin::Features Section-->
		<div class="py-10 py-lg-20">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-12">
					<!--begin::Title-->
					<h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">What we offer</h3>
					<!--end::Title-->
					<!--begin::Sub-title-->
					<div class="fs-5 text-muted fw-bold">We have put together the best of the features, the best of the Twitter<sup>TM</sup> API to make your
						<br />presence at Twitter<sup>TM</sup> a unique and an outstanding one by giving you bespoke capabilities.
					</div>
					<!--end::Sub-title=-->
				</div>
				<!--end::Heading-->
				<!--begin::Slider-->
				<div class="tns tns-default">
					<!--begin::Wrapper-->
					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/deleter.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Mass Deleter</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">Deletes tweets automatically</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/followers.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Follow Repliers</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">Follow tweet repliers</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/auto_tweet.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Automated tweeting</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">Choose free content to auto-tweet</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/silent_retweet.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Silent Retweet</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">The tweet owner won't notice</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/badge.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Customised Label</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">Get rid of <div class="badge badge-light-info">Twitter for Android</div> and others</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/like.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Super Liker</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">Like all replies in a tweet at once</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/auto_retweet.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Bot summoning</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">Call Bot from Twitter</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Button-->
					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
						<span class="svg-icon svg-icon-3x">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</button>
					<!--end::Button-->
					<!--begin::Button-->
					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
						<span class="svg-icon svg-icon-3x">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</button>
					<!--end::Button-->
				</div>
				<!--end::Slider-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Features Section-->
		<!--begin::Testimonials Section-->
		<div style="display: none;" class="mt-20 mb-n20 position-relative z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-17">
					<!--begin::Title-->
					<h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">What Our Users Say</h3>
					<!--end::Title-->
					<!--begin::Description-->
					<div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin
					</div>
					<!--end::Description-->
				</div>
				<!--end::Heading-->
				<!--begin::Row-->
				<div class="row g-lg-10 mb-10 mb-lg-20">
					<!--begin::Col-->
					<div class="col-lg-4">
						<!--begin::Testimonial-->
						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<!--begin::Wrapper-->
							<div class="mb-7">
								<!--begin::Rating-->
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
								</div>
								<!--end::Rating-->
								<!--begin::Title-->
								<div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest site
									<br />and the most well structured
								</div>
								<!--end::Title-->
								<!--begin::Feedback-->
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design site I have ever used. The interface is up to standard. In fact the cleanest and the most up to standard I have ever seen.</div>
								<!--end::Feedback-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Author-->
							<div class="d-flex align-items-center">
								<!--begin::Avatar-->
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-1.jpg" class="" alt="" />
								</div>
								<!--end::Avatar-->
								<!--begin::Name-->
								<div class="flex-grow-1">
									<a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
									<span class="text-muted d-block fw-bold">Twitter User</span>
								</div>
								<!--end::Name-->
							</div>
							<!--end::Author-->
						</div>
						<!--end::Testimonial-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-lg-4">
						<!--begin::Testimonial-->
						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<!--begin::Wrapper-->
							<div class="mb-7">
								<!--begin::Rating-->
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
								</div>
								<!--end::Rating-->
								<!--begin::Title-->
								<div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest site
									<br />and the most well structured
								</div>
								<!--end::Title-->
								<!--begin::Feedback-->
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design site I have ever used. The interface is up to standard. In fact the cleanest and the most up to standard I have ever seen.</div>
								<!--end::Feedback-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Author-->
							<div class="d-flex align-items-center">
								<!--begin::Avatar-->
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-2.jpg" class="" alt="" />
								</div>
								<!--end::Avatar-->
								<!--begin::Name-->
								<div class="flex-grow-1">
									<a href="#" class="text-dark fw-bold text-hover-primary fs-6">Janya Clebert</a>
									<span class="text-muted d-block fw-bold">Twitter User</span>
								</div>
								<!--end::Name-->
							</div>
							<!--end::Author-->
						</div>
						<!--end::Testimonial-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-lg-4">
						<!--begin::Testimonial-->
						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<!--begin::Wrapper-->
							<div class="mb-7">
								<!--begin::Rating-->
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="bi bi-star-fill fs-5"></i>
									</div>
								</div>
								<!--end::Rating-->
								<!--begin::Title-->
								<div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest site
									<br />and the most well structured
								</div>
								<!--end::Title-->
								<!--begin::Feedback-->
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design site I have ever used. The interface is up to standard. In fact the cleanest and the most up to standard I have ever seen.</div>
								<!--end::Feedback-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Author-->
							<div class="d-flex align-items-center">
								<!--begin::Avatar-->
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-16.jpg" class="" alt="" />
								</div>
								<!--end::Avatar-->
								<!--begin::Name-->
								<div class="flex-grow-1">
									<a href="#" class="text-dark fw-bold text-hover-primary fs-6">Steave Brown</a>
									<span class="text-muted d-block fw-bold">Twitter User</span>
								</div>
								<!--end::Name-->
							</div>
							<!--end::Author-->
						</div>
						<!--end::Testimonial-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Highlight-->
				<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
					<!--begin::Content-->
					<div class="my-2 me-5">
						<!--begin::Title-->
						<div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">Start With Kotnova Today,
							<span class="fw-normal">Speed Up Growth!</span>
						</div>
						<!--end::Title-->
						<!--begin::Description-->
						<div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Join over 100,000 Twitter Users Community to Stay Ahead</div>
						<!--end::Description-->
					</div>
					<!--end::Content-->
					<!--begin::Link-->
					<a href="https://kotnova.com/v2/new" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Sign Up</a>
					<!--end::Link-->
				</div>
				<!--end::Highlight-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Testimonials Section-->
		<!--begin::Footer Section-->
		<div class="mb-0">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="landing-dark-bg pt-20">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Row-->
					<div class="row py-10 py-lg-20">
						<!--begin::Col-->
						<div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
							<!--begin::Block-->
							<div class="rounded landing-dark-border p-9 mb-10">
								<!--begin::Title-->
								<h2 class="text-white">Would you need help in getting started?</h2>
								<!--end::Title-->
								<!--begin::Text-->
								<span class="fw-normal fs-4 text-gray-700">Email us to
									<a href="https://kotnova.com/support" class="text-white opacity-50 text-hover-primary">support@kotnova.com</a></span>
								<!--end::Text-->
							</div>
							<!--end::Block-->
							<!--begin::Block-->
							<div class="rounded landing-dark-border p-9">
								<!--begin::Title-->
								<h2 class="text-white">How custom points refill?</h2>
								<!--end::Title-->
								<!--begin::Text-->
								<span class="fw-normal fs-4 text-gray-700">Use Our Custom Billing Service.
									<a href="pages/user-profile/overview.html" class="text-white opacity-50 text-hover-primary">Click to Get a Quote</a></span>
								<!--end::Text-->
							</div>
							<!--end::Block-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-lg-6 ps-lg-16">
							<!--begin::Navs-->
							<div class="d-flex justify-content-center">
								<!--begin::Links-->
								<div class="d-flex fw-semibold flex-column me-20">
									<!--begin::Subtitle-->
									<h4 class="fw-bold text-gray-400 mb-6">More for Kotnova</h4>
									<!--end::Subtitle-->
									<!--begin::Link-->
									<a href="https://kotnova.com/faqs" class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaions</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://www.youtube.com/c/Kotnova" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video Tuts</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Changelog</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://devs.Kotnova.com/" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Support Forum</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://kotnova.com/blog" class="text-white opacity-50 text-hover-primary fs-5">Blog</a>
									<!--end::Link-->
								</div>
								<!--end::Links-->
								<!--begin::Links-->
								<div class="d-flex fw-semibold flex-column ms-lg-20">
									<!--begin::Subtitle-->
									<h4 class="fw-bold text-gray-400 mb-6">Stay Connected</h4>
									<!--end::Subtitle-->
									<!--begin::Link-->
									<a href="https://www.facebook.com/Kotnova" class="mb-6">
										<img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
									</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://github.com/KotnovaHub" class="mb-6">
										<img src="assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
									</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://twitter.com/Kotnovaa" class="mb-6">
										<img src="assets/media/svg/brand-logos/twitter_2.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
									</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://dribbble.com/Kotnova" class="mb-6">
										<img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
									</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a href="https://www.instagram.com/Kotnova" class="mb-6">
										<img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
									</a>
									<!--end::Link-->
								</div>
								<!--end::Links-->
							</div>
							<!--end::Navs-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Container-->
				<!--begin::Separator-->
				<div class="landing-dark-separator"></div>
				<!--end::Separator-->
				<!--begin::Container-->
				<div class="container">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
						<!--begin::Copyright-->
						<div class="d-flex align-items-center order-2 order-md-1">
							<!--begin::Logo-->
							<a href="landing.html">
								<img alt="Logo" src="assets/media/logos/logo_full_bold.png" class="h-15px h-md-20px" />
							</a>
							<!--end::Logo image-->
							<!--begin::Logo image-->
							<span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://kotnova.com/">&copy; 2022 Kotnova Inc.</span>
							<!--end::Logo image-->
						</div>
						<!--end::Copyright-->
						<!--begin::Menu-->
						<ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
							<li class="menu-item">
								<a href="https://kotnova.com/" target="_blank" class="menu-link px-2">About</a>
							</li>
							<li class="menu-item mx-5">
								<a href="https://devs.Kotnova.com/" target="_blank" class="menu-link px-2">Support</a>
							</li>
						</ul>
						<!--end::Menu-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Footer Section-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "assets/index.html";
	</script>
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used by this page)-->
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used by this page)-->
	<script src="assets/js/custom/landing.js"></script>
	<script src="assets/js/custom/pages/pricing/general.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

<!-- landing.html 22:55:53 GMT -->

</html>