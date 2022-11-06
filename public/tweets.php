<?php
include '../includes/head.php';
if (isset($_GET['tweet'])) {
	if (is_numeric($_GET['tweet'])) {
		//$abraham_client->setApiVersion('2');

		try {
			$statues = array_convert($tweet_client->getTweet($_GET['tweet']));
			$tweet_id = $_GET['tweet'];
		} catch (Exception $e) {
			$tweet_id = 1582432112384233474;
			$_SESSION['error'] = 'Invalid tweet id';
		}
	} else {
		$tweet_id = 1582432112384233474;
		$_SESSION['error'] = 'Invalid tweet id';
	}
} else {
	$tweet_id = 1582432112384233474;
	$_SESSION['error'] = 'Invalid tweet id';
}

$tweet_data = array_convert($tweet_client->getTweet($tweet_id));

$tweeter = array_convert($user_client->getUserById($tweet_data['data']['author_id']));
/*
if ($tweet_data['data']['verified']) {
	$verif_icon = 'svg-icon-primary';
	$verif_info = 'Twitter Verified';
} else {
	$verif_icon = 'svg-icon-warning';
	$verif_info = 'KOT Verified';
}
*/


?>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
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
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<?php include '../includes/menu.php' ?>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				<?php include '../includes/header.php' ?>
				<!--end::Header-->
				<!--begin::Toolbar-->
				<?php include '../includes/toolbar.php' ?>
				<!--end::Toolbar-->
				<!--begin::Container-->
				<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
					<!--begin::Post-->
					<div class="content flex-row-fluid" id="kt_content">
						<!--begin::Row-->
						<div class="row g-5 g-xl-10">
							<!--begin::Col-->
							<div class="col-xl-4 mb-xl-10">
								<!--begin::Lists Widget 19-->
								<div class="card card-flush h-xl-100">
									<!--begin::Heading-->
									<div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px" style="background-image:url('/metronic8/demo18/assets/media/svg/shapes/top-green.png" data-theme="light">
										<!--begin::Title-->
										<h3 class="card-title align-items-start flex-column text-primary pt-15">
											<span class="fw-bold fs-2x mb-3">Tweeted by, <?php echo $tweeter['data']['name'] ?></span>
											<div class="fs-4 text-info">
												Posted <?php echo timeDiff($tweet_data['data']['created_at'], date('c')) ?>
											</div>
										</h3>
										<!--end::Title-->
									</div>
									<!--end::Heading-->
									<!--begin::Body-->
									<div class="card-body mt-n20">
										<!--begin::Stats-->
										<div class="mt-n20 position-relative">
											<!--begin::Row-->
											<div class="row g-3 g-lg-6">
												<!--begin::Col-->
												<div class="col-6">
													<!--begin::Items-->
													<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
														<!--begin::Symbol-->
														<div class="symbol symbol-30px me-5 mb-8">
															<span class="symbol-label">
																<!--begin::Svg Icon | path: icons/duotune/medicine/med005.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-danger">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Stats-->
														<div class="m-0">
															<!--begin::Number-->
															<span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo number_format_short($tweet_data['data']['public_metrics']['like_count']) ?></span>
															<!--end::Number-->
															<!--begin::Desc-->
															<span class="text-gray-500 fw-semibold fs-6">Likes</span>
															<!--end::Desc-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Items-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-6">
													<!--begin::Items-->
													<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
														<!--begin::Symbol-->
														<div class="symbol symbol-30px me-5 mb-8">
															<span class="symbol-label">
																<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor" />
																		<path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Stats-->
														<div class="m-0">
															<!--begin::Number-->
															<span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo number_format_short($tweet_data['data']['public_metrics']['retweet_count']) ?></span>
															<!--end::Number-->
															<!--begin::Desc-->
															<span class="text-gray-500 fw-semibold fs-6">Retweets</span>
															<!--end::Desc-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Items-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-6">
													<!--begin::Items-->
													<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
														<!--begin::Symbol-->
														<div class="symbol symbol-30px me-5 mb-8">
															<span class="symbol-label">
																<!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor" />
																		<rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
																		<rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Stats-->
														<div class="m-0">
															<!--begin::Number-->
															<span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo number_format_short($tweet_data['data']['public_metrics']['reply_count']) ?></span>
															<!--end::Number-->
															<!--begin::Desc-->
															<span class="text-gray-500 fw-semibold fs-6">Replies</span>
															<!--end::Desc-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Items-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-6">
													<!--begin::Items-->
													<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
														<!--begin::Symbol-->
														<div class="symbol symbol-30px me-5 mb-8">
															<span class="symbol-label">
																<!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="currentColor" />
																		<path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Stats-->
														<div class="m-0">
															<!--begin::Number-->
															<span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo number_format_short($tweet_data['data']['public_metrics']['quote_count']) ?></span>
															<!--end::Number-->
															<!--begin::Desc-->
															<span class="text-gray-500 fw-semibold fs-6">Quoted</span>
															<!--end::Desc-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Items-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Lists Widget 19-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-xl-8 mb-5 mb-xl-10">
								<!--begin::Row-->
								<div class="row g-5 g-xl-10">
									<!--begin::Col-->
									<div class="col-xl-6 mb-xl-10">
										<!--begin::Slider Widget 1-->
										<div id="kt_sliders_widget_1_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="5000">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<h4 class="card-title d-flex align-items-start flex-column">
													<span class="card-label fw-bold text-gray-800">Tweet’s Metrics</span>
													<span class="text-gray-400 mt-1 fw-bold fs-7"><span class="badge badge-light-danger">Tweet ID: </span><?php echo $tweet_data['data']['id'] ?></span>
												</h4>
												<!--end::Title-->
												<!--begin::Toolbar-->
												<div class="card-toolbar">
													<!--begin::Carousel Indicators-->
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
														<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="0" class="active ms-1"></li>
														<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="1" class="ms-1"></li>
														<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="2" class="ms-1"></li>
													</ol>
													<!--end::Carousel Indicators-->
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-6">
												<!--begin::Carousel-->
												<div class="carousel-inner mt-n5">
													<!--begin::Item-->
													<div class="carousel-item active show">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mb-5">
															<!--begin::Chart-->
															<div class="w-80px flex-shrink-0 me-2">
																<div style="height: 100px" class="min-h-auto ms-n3" id="kt_slider_widget_1_chart_1"></div>
															</div>
															<!--end::Chart-->
															<!--begin::Info-->
															<div class="m-0">
																<!--begin::Subtitle-->
																<h4 class="fw-bold text-gray-800 mb-3">Post details</h4>
																<!--end::Subtitle-->
																<!--begin::Items-->
																<div class="d-flex d-grid gap-5">
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0 me-4">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Source: <span class="badge badge-light-info"><?php echo $tweet_data['data']['source'] ?></span>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Reply setting: <span class="badge badge-light-success"><?php echo $tweet_data['data']['reply_settings'] ?></span>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																</div>
																<!--end::Items-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mb-5">
															<!--begin::Chart-->
															<div class="w-80px flex-shrink-0 me-2">
																<div class="min-h-auto ms-n3" id="kt_slider_widget_1_chart_2" style="height: 100px"></div>
															</div>
															<!--end::Chart-->
															<!--begin::Info-->
															<div class="m-0">
																<!--begin::Subtitle-->
																<h4 class="fw-bold text-gray-800 mb-3">Entities</h4>
																<?php
																if (isset($tweet_data['data']['entities']['urls'][0]['url'])) {
																	$twt_url = '<span class="badge badge-light-success">' . $tweet_data['data']['entities']['urls'][0]['url'] . '</span>';
																} else {
																	$twt_url = '';
																}
																if (isset($tweet_data['data']['entities']['urls'][0]['media_key'])) {
																	$twt_media_key = '<span class="badge badge-light-success">' . $tweet_data['data']['entities']['urls'][0]['media_key'] . '</span>';
																} else {
																	$twt_media_key = '';
																}


																?>
																<!--end::Subtitle-->
																<!--begin::Items-->
																<div class="d-flex d-grid gap-5">
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0 me-4">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->URL: <?php echo $twt_url ?>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Media key: <?php echo $twt_media_key ?>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																</div>
																<!--end::Items-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mb-5">
															<!--begin::Chart-->
															<div class="w-80px flex-shrink-0 me-2">
																<div class="min-h-auto ms-n3" id="kt_slider_widget_1_chart_3" style="height: 100px"></div>
															</div>
															<!--end::Chart-->
															<!--begin::Info-->
															<div class="m-0">
																<!--begin::Subtitle-->
																<h4 class="fw-bold text-gray-800 mb-3">Other</h4>
																<!--end::Subtitle-->
																<!--begin::Items-->
																<div class="d-flex d-grid gap-5">
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0 me-4">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Language: <span class="badge badge-info"><?php echo $tweet_data['data']['lang'] ?></span>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Possibly sensitive: <?php if ($tweet_data['data']['possibly_sensitive']) {
																														echo '<span class="badge badge-danger">sensitive</span>';
																													} else {
																														echo '<span class="badge badge-success">insensitive</span>';
																													} ?>
																		</span>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																</div>
																<!--end::Items-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Carousel-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Slider Widget 1-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6 mb-5 mb-xl-10">
										<!--begin::Slider Widget 2-->
										<div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="5500">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<h4 class="card-title d-flex align-items-start flex-column">
													<span class="card-label fw-bold text-gray-800">Tweeter’s Metrics</span>
													<span class="text-gray-400 mt-1 fw-bold fs-7"><span class="badge badge-light-danger">Tweeter ID: </span><?php echo $tweet_data['data']['author_id'] ?></span>
												</h4>
												<!--end::Title-->
												<!--begin::Toolbar-->
												<div class="card-toolbar">
													<!--begin::Carousel Indicators-->
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
														<li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0" class="active ms-1"></li>
														<li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1" class="ms-1"></li>
														<li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2" class="ms-1"></li>
													</ol>
													<!--end::Carousel Indicators-->
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-6">
												<!--begin::Carousel-->
												<div class="carousel-inner">
													<!--begin::Item-->
													<div class="carousel-item active show">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mb-9">
															<!--begin::Symbol-->
															<div class="symbol symbol-70px symbol-circle me-5">
																<span class="symbol-label bg-light-success">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-3x svg-icon-success">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="currentColor" />
																			<path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="currentColor" />
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Info-->
															<div class="m-0">
																<!--begin::Subtitle-->
																<h4 class="fw-bold text-gray-800 mb-3">Public Metrics</h4>
																<!--end::Subtitle-->
																<!--begin::Items-->
																<div class="d-flex d-grid gap-5">
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0 me-4">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			Followers: <span class="badge badge-light-danger"><?php echo number_format_short($tweeter['data']['public_metrics']['followers_count']) ?></span>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			Following: <span class="badge badge-light-danger"><?php echo number_format_short($tweeter['data']['public_metrics']['following_count']) ?></span>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			Tweets: <span class="badge badge-light-danger"><?php echo number_format_short($tweeter['data']['public_metrics']['tweet_count']) ?></span>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			Lists: <span class="badge badge-light-danger"><?php echo number_format_short($tweeter['data']['public_metrics']['listed_count']) ?></span>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																</div>
																<!--end::Items-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="mb-1">

															<a href="./feeds.php?user=<?php echo $tweeter['data']['id'] ?>" target="_blank" class="btn btn-sm btn-success">View user</a>
														</div>
														<!--end::Action-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mb-9">
															<!--begin::Symbol-->
															<div class="symbol symbol-70px symbol-circle me-5">
																<img src="<?php echo pic_fix($tweeter['data']['profile_image_url']) ?>" class="" alt="" />
															</div>
															<!--end::Symbol-->
															<!--begin::Info-->
															<div class="m-0">
																<!--begin::Subtitle-->
																<h4 class="fw-bold text-gray-800 mb-3">User</h4>
																<!--end::Subtitle-->
																<!--begin::Items-->
																<div class="d-flex d-grid gap-5">
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0 me-4">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Name: <?php echo $tweeter['data']['name'] ?>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Username: <?php echo $tweeter['data']['username'] ?>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																</div>
																<!--end::Items-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="mb-1">

															<a href="./feeds.php?user=<?php echo $tweeter['data']['id'] ?>" target="_blank" class="btn btn-sm btn-success">View user</a>
														</div>
														<!--end::Action-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mb-9">
															<!--begin::Symbol-->
															<div class="symbol symbol-70px symbol-circle me-5">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs038.svg-->
																	<span class="svg-icon svg-icon-3x svg-icon-primary">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M12.0444 17.9444V12.1444L17.0444 15.0444C18.6444 15.9444 19.1445 18.0444 18.2445 19.6444C17.3445 21.2444 15.2445 21.7444 13.6445 20.8444C12.6445 20.2444 12.0444 19.1444 12.0444 17.9444ZM7.04445 15.0444L12.0444 12.1444L7.04445 9.24445C5.44445 8.34445 3.44444 8.84445 2.44444 10.4444C1.54444 12.0444 2.04445 14.0444 3.64445 15.0444C4.74445 15.6444 6.04445 15.6444 7.04445 15.0444ZM12.0444 6.34444V12.1444L17.0444 9.24445C18.6444 8.34445 19.1445 6.24444 18.2445 4.64444C17.3445 3.04444 15.2445 2.54445 13.6445 3.44445C12.6445 4.04445 12.0444 5.14444 12.0444 6.34444Z" fill="currentColor" />
																			<path opacity="0.3" d="M7.04443 9.24445C6.04443 8.64445 5.34442 7.54444 5.34442 6.34444C5.34442 4.54444 6.84444 3.04443 8.64444 3.04443C10.4444 3.04443 11.9444 4.54444 11.9444 6.34444V12.1444L7.04443 9.24445ZM17.0444 15.0444C18.0444 15.6444 19.3444 15.6444 20.3444 15.0444C21.9444 14.1444 22.4444 12.0444 21.5444 10.4444C20.6444 8.84444 18.5444 8.34445 16.9444 9.24445L11.9444 12.1444L17.0444 15.0444ZM7.04443 15.0444C6.04443 15.6444 5.34442 16.7444 5.34442 17.9444C5.34442 19.7444 6.84444 21.2444 8.64444 21.2444C10.4444 21.2444 11.9444 19.7444 11.9444 17.9444V12.1444L7.04443 15.0444Z" fill="currentColor" />
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Info-->
															<div class="m-0">
																<!--begin::Subtitle-->
																<h4 class="fw-bold text-gray-800 mb-3">Other</h4>
																<!--end::Subtitle-->
																<!--begin::Items-->
																<div class="d-flex d-grid gap-5">
																	<!--begin::Item-->
																	<div class="d-flex flex-column flex-shrink-0 me-4">
																		<!--begin::Section-->
																		<span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Location: <span class="badge badge-light-primary">
																				<?php
																				if (isset($tweeter['data']['location'])) {
																					echo $tweeter['data']['location'];
																				}
																				?>
																			</span>
																		</span>
																		<!--end::Section-->
																		<!--begin::Section-->
																		<span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																					<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->URL:
																			<span class="badge badge-success">
																				<?php
																				if (isset($tweeter['data']['url'])) {
																					echo $tweeter['data']['url'];
																				} else {
																					echo 'No url';
																				}

																				?>
																			</span>
																		</span>
																		<!--end::Section-->
																	</div>
																	<!--end::Item-->
																</div>
																<!--end::Items-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="mb-1">

															<a href="./feeds.php?user=<?php echo $tweeter['data']['id'] ?>" target="_blank" class="btn btn-sm btn-success">View user</a>
														</div>
														<!--end::Action-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Carousel-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Slider Widget 2-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--begin::Engage widget 4-->
								<div class="card border-transparent" data-theme="light" style="background-color: #1C325E;">
									<!--begin::Body-->
									<div class="card-body d-flex ps-xl-15">
										<!--begin::Wrapper-->
										<div class="m-0">
											<!--begin::Title-->
											<div kt_tweet_text="" class="position-relative fs-3 z-index-2 fw-bold text-white mb-7 w-75">
												<?php echo $tweet_data['data']['text'] ?>
											</div>
											<!--end::Title-->
											<!--begin::Action-->
											<div class="mb-3" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
												<li kt_tweet_link="L" class="btn btn-danger fw-semibold me-2">Like Tweet</li>
												<li kt_tweet_link="UL" class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">Disike tweet</li>
											</div>
											<!--begin::Action-->
										</div>
										<!--begin::Wrapper-->
										<!--begin::Illustration-->
										<img src="../assets/media/illustrations/sigma-1/17-dark.png" class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
										<!--end::Illustration-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Engage widget 4-->
								<!--begin::Tweet actions -->
								<div class="card shadow-sm mt-5">
									<div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible">
										<h3 class="card-title">
											<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-10-09-043348/core/html/src/media/icons/duotune/social/soc006.svg-->
											<span class="svg-icon svg-icon-primary svg-icon-2hx">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="currentColor" />
													<path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											Tweet Magic Box
										</h3>
										<div class="card-toolbar rotate-180">
											<span class="svg-icon svg-icon-info svg-icon-2x">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.5" d="M11.4343 14.3657L7.25 18.55C6.83579 18.9643 6.16421 18.9643 5.75 18.55C5.33579 18.1358 5.33579 17.4643 5.75 17.05L11.2929 11.5072C11.6834 11.1166 12.3166 11.1166 12.7071 11.5072L18.25 17.05C18.6642 17.4643 18.6642 18.1358 18.25 18.55C17.8358 18.9643 17.1642 18.9643 16.75 18.55L12.5657 14.3657C12.2533 14.0533 11.7467 14.0533 11.4343 14.3657Z" fill="currentColor" />
													<path d="M11.4343 8.36573L7.25 12.55C6.83579 12.9643 6.16421 12.9643 5.75 12.55C5.33579 12.1358 5.33579 11.4643 5.75 11.05L11.2929 5.50716C11.6834 5.11663 12.3166 5.11663 12.7071 5.50715L18.25 11.05C18.6642 11.4643 18.6642 12.1358 18.25 12.55C17.8358 12.9643 17.1642 12.9643 16.75 12.55L12.5657 8.36573C12.2533 8.05331 11.7467 8.05332 11.4343 8.36573Z" fill="currentColor" />
												</svg>
											</span>
										</div>
									</div>
									<div id="kt_docs_card_collapsible" class="collapse show">
										<div class="card-body">
											<div class="row">
												<div class="col-md-4" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
													<div kt_tweet_link="LR" class="btn btn-flex btn-danger px-6 w-100">
														<span class="svg-icon svg-icon-2x">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
																<path opacity="0.5" d="M12.4343 12.4343L10.75 10.75C10.3358 10.3358 9.66421 10.3358 9.25 10.75C8.83579 11.1642 8.83579 11.8358 9.25 12.25L12.2929 15.2929C12.6834 15.6834 13.3166 15.6834 13.7071 15.2929L19.25 9.75C19.6642 9.33579 19.6642 8.66421 19.25 8.25C18.8358 7.83579 18.1642 7.83579 17.75 8.25L13.5657 12.4343C13.2533 12.7467 12.7467 12.7467 12.4343 12.4343Z" fill="currentColor" />
																<path d="M8.43431 12.4343L6.75 10.75C6.33579 10.3358 5.66421 10.3358 5.25 10.75C4.83579 11.1642 4.83579 11.8358 5.25 12.25L8.29289 15.2929C8.68342 15.6834 9.31658 15.6834 9.70711 15.2929L15.25 9.75C15.6642 9.33579 15.6642 8.66421 15.25 8.25C14.8358 7.83579 14.1642 7.83579 13.75 8.25L9.56569 12.4343C9.25327 12.7467 8.74673 12.7467 8.43431 12.4343Z" fill="currentColor" />
															</svg>
														</span>
														<span class="d-flex flex-column align-items-start ms-2">
															<span class="fs-3 fw-bold">Like</span>
															<span class="fs-7">Like Replies</span>
														</span>
													</div>
												</div>
												<div class="col-md-4" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
													<div kt_tweet_link="RR" class="btn btn-flex btn-primary px-6 w-100">
														<span class="svg-icon svg-icon-2x">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor" />
																<path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor" />
															</svg>
														</span>
														<span class="d-flex flex-column align-items-start ms-2">
															<span class="fs-3 fw-bold">Retweet</span>
															<span class="fs-7">Retweet Replies</span>
														</span>
													</div>
												</div>
												<div class="col-md-4" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
													<div kt_tweet_link="SR" class="btn btn-flex btn-info px-6 w-100">
														<span class="svg-icon svg-icon-2x">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="currentColor" />
																<path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="currentColor" />
															</svg>
														</span>
														<span class="d-flex flex-column align-items-start ms-2">
															<span class="fs-3 fw-bold">Retweet</span>
															<span class="fs-7">Silent Retweet</span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-md-4" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
													<div kt_tweet_link="FL" class="btn btn-flex btn-light-danger px-6 w-100">
														<span class="svg-icon svg-icon-2x">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
																<path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
															</svg>
														</span>
														<span class="d-flex flex-column align-items-start ms-2">
															<span class="fs-3 fw-bold">Follow</span>
															<span class="fs-7">Follow Likers</span>
														</span>
													</div>
												</div>
												<div class="col-md-4" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
													<div kt_tweet_link="FR" class="btn btn-flex btn-light-primary px-6 w-100">
														<span class="svg-icon svg-icon-2x">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
																<path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
															</svg>
														</span>
														<span class="d-flex flex-column align-items-start ms-2">
															<span class="fs-3 fw-bold">Follow</span>
															<span class="fs-7">Follow Repliers</span>
														</span>
													</div>
												</div>
												<div class="col-md-4" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>">
													<div kt_tweet_link="FR_2" class="btn btn-flex btn-light-success px-6 w-100">
														<span class="svg-icon svg-icon-2x">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
																<path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
															</svg>
														</span>
														<span class="d-flex flex-column align-items-start ms-2">
															<span class="fs-3 fw-bold">Follow</span>
															<span class="fs-7">Follow Retweeters</span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end::Tweet actions -->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row g-5 g-xl-10">
							<!--begin::Col-->
							<div class="col-xl-4 mb-xl-10">
								<!--begin::List widget 20-->
								<div class="card h-auto">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold text-dark">Tweet media</span>
											<span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
										</h3>
										<!--begin::Toolbar-->
										<div class="card-toolbar">
											<a href="#" class="btn btn-sm btn-light">All Courses</a>
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-6">
										<?php
										$tweet_data_2 = tweet($tweet_data['data']['id']);
										if (isset($tweet_data_2['includes'])) {
											foreach ($tweet_data_2['includes']['media'] as $row_3) {
												$tweet_type = $row_3['type'];
												$tweet_media_key = $row_3['media_key'];
												if ($row_3['type'] != 'photo') {
													if (!isset($photo_key)) {
														$data_2 = tweet_video($tweet_data['data']['id']);
														foreach ($data_2['includes']['media'] as $id => $row_4) {
															$video = $row_4['variants'][0]['url'];
															echo '
				<video
				id="my-video"
			class="video-js vjs-theme-city rounded"
			controls
			preload="auto"
			width="100%"
			height="400px"
			poster="https://w0.peakpx.com/wallpaper/525/853/HD-wallpaper-plain-black-marble-textures-marble.jpg"
			data-setup="{}"
			>
				<source class="rounded w-100" src="' . $video . '" type="video/mp4">
				<p class="vjs-no-js">
			  To view this video please enable JavaScript, and consider upgrading to a
			  web browser that
			  <a href="https://videojs.com/html5-video-support/" target="_blank"
				>supports HTML5 video</a
			  >
			</p>
			  </video>
				';
															if ($id == 0) {
																break;
															}
														}
														$video_key = 1;
													}
												} else {
													if (!isset($video_key)) {
														$photo_key = 1;
														$tweet_img = $row_3['url'];
														$img = "'" . $tweet_img . "'";
														echo '
			<!--begin::Col-->
		<div kt_img_type="tweetImg" class="w-auto h-300px mt-3">
			<!--begin::Item-->
			<a class="d-block card-rounded overlay h-100" data-fslightbox="lightbox-projects" href="' . $tweet_img . '">
				<!--begin::Image-->
				<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100" style="background-image:url(' . $img . ')"></div>
				<!--end::Image-->
				<!--begin::Action-->
				<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
					<i class="bi bi-eye-fill fs-3x text-white"></i>
				</div>
				<!--end::Action-->
			</a>
			<!--end::Item-->
		</div>
		<!--end::Col-->
		
			';
													}
												}
											}
										} else {
											echo 'This tweet has no media!';
										}


										?>
									</div>
									<!--end::Body-->
								</div>
								<!--end::List widget 20-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-xl-8 mb-5 mb-xl-10">




								<?php

								if (isset($_SESSION['tweetMedia'])) {
									unset($_SESSION['tweetMedia']);
								}
								$form_action = '/process/post/tweet.php';
								$form_id = 'tweet_process_09';
								$rep_status = '
								<input type="hidden" value="' . $tweet_id . '" name="tweet_id" />
								<input type="hidden" value="@' . $tweeter['data']['username'] . '" name="tweet_username" />
								';
								$rep_text = 'reply';
								include '../includes/elements/tweet_form.php';
								?>

								<!--begin::Timeline Widget 1-->
								<div class="card card-flush">


									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold fs-3 mb-1">Tweet Replies</span>
											<span class="text-muted mt-1 fw-semibold fs-7">The latest 10 comments</span>
										</h3>
										<div kt_tweet_link="LR" class="card-toolbar">
											<a href="#" kt_tweet_id="<?php echo $tweet_data['data']['id'] ?>" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary">Like Replies</a>
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body py-3">
										<div class="tab-content">
											<!--begin::Tap pane-->
											<div class="tab-pane fade show active" id="kt_table_widget_4_tab_1">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table align-middle gs-0 gy-3">
														<!--begin::Table head-->
														<thead>
															<tr>
																<th class="p-0 w-50px"></th>
																<th class="p-0 min-w-150px"></th>
																<th class="p-0 min-w-140px"></th>
																<th class="p-0 min-w-120px"></th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>

															<?php
															$tw_rep = tweet_reply_printer($tweet_data['data']['id'], 10);

															if (isset($tw_rep['data'])) {
																foreach ($tw_rep['data'] as $row) {
																	$rep_user = array_convert($user_client->getUserById($row['author_id']));

																	echo '
																															<tr>
																	<td>
																		<div class="symbol symbol-50px">
																			<img src="' . pic_fix($rep_user['data']['profile_image_url']) . '" alt="" />
																		</div>
																	</td>
																	<td>
																		<a href="../v3/account?user=' . $rep_user['data']['id'] . '" class="text-dark fw-bold text-hover-primary mb-1 fs-6">' . $rep_user['data']['name'] . '</a>
																		<span class="text-muted fw-semibold d-block fs-7">' . $rep_user['data']['username'] . '</span>
																	</td>
																	<td>
																	' . $row['text'] . '
																	</td>
																	<td class="text-end">
																	<a href="../v3/tweets?tweet=' . $row['id'] . '" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
																		<span class="svg-icon svg-icon-5 svg-icon-gray-700">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
																				<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																</td>
																</tr>
																';
																}
															} else {

																echo '
																<tr>
																	
																	<td>
																	<span class="badge badge-light-danger">This tweet has no replies!</span>
																	</td>
																</tr>
																';
															}



															?>





														</tbody>
														<!--end::Table body-->
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Tap pane-->
										</div>
									</div>
									<!--end::Body-->




















								</div>
								<!--end::Timeline Widget 1-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Post-->
				</div>
				<!--end::Container-->
				<!--begin::Footer-->
				<?php include '../includes/footer.php' ?>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->
	<!--begin::Drawers-->
	<?php include '../includes/drawers.php' ?>
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
	<!--begin::Modals-->
	<?php include '../includes/modals.php' ?>
	<!--end::Modals-->
	<!--begin::Javascript-->
	<?php include '../includes/scripts.php';
	//$_SESSION['error'] = $fbemail;
	?>


	<script>
		// set the dropzone container id
		const id = "#kt_dropzonejs_example_3";
		const dropzone = document.querySelector(id);

		// set the preview element template
		var previewNode = dropzone.querySelector(".dropzone-item");
		previewNode.id = "";
		var previewTemplate = previewNode.parentNode.innerHTML;
		previewNode.parentNode.removeChild(previewNode);

		var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
			url: "<?php echo $parent_url . $form_action ?>", // Set the url for your upload script location
			method: "post",
			parallelUploads: 20,
			paramName: "file",
			maxFiles: 4,
			maxFilesize: 15, // Max filesize in MB
			acceptedFiles: ".jpeg,.png,.gif,.mp4,.jpg",
			previewTemplate: previewTemplate,
			previewsContainer: id + " .dropzone-items", // Define the container to display the previews
			clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
			maxfilesexceeded: function() {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
				})

				Toast.fire({
					icon: 'error',
					title: 'Maximum files allowed is 4.'
				})
			},
		});

		myDropzone.on("addedfile", function(file) {
			// Hookup the start button
			const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
			dropzoneItems.forEach(dropzoneItem => {
				dropzoneItem.style.display = '';
			});
		});

		// Update the total progress bar
		myDropzone.on("totaluploadprogress", function(progress) {
			const progressBars = dropzone.querySelectorAll('.progress-bar');
			progressBars.forEach(progressBar => {
				progressBar.style.width = progress + "%";
			});
		});

		myDropzone.on("sending", function(file) {
			// Show the total progress bar when upload starts
			const progressBars = dropzone.querySelectorAll('.progress-bar');
			progressBars.forEach(progressBar => {
				progressBar.style.opacity = "1";
			});
		});

		// Hide the total progress bar when nothing"s uploading anymore
		myDropzone.on("complete", function(progress) {
			const progressBars = dropzone.querySelectorAll('.dz-complete');

			setTimeout(function() {
				progressBars.forEach(progressBar => {
					progressBar.querySelector('.progress-bar').style.opacity = "0";
					progressBar.querySelector('.progress').style.opacity = "0";
				});
			}, 300);
		});



		/////////////////////////final form process
		$(document).on('submit', '#<?php echo $form_id ?>', function(e) {
			e.preventDefault();

			formData = new FormData(this);
			//formData.append('avatar', $('#upload_file_fr').files);


			$.ajax({
				method: "POST",
				url: "..<?php echo $form_action ?>",
				data: formData,
				processData: false, // tell jQuery not to process the data
				contentType: false, // tell jQuery not to set contentType
				enctype: 'multipart/form-data',

				success: function(data) {
					// alert(data);
					//console.log(data); 

					window.location.reload();
				}
			});
		});
	</script>


	<!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php';
//session_destroy();

?>
<!-- dashboards/online-courses.html 22:54:57 GMT -->

</html>