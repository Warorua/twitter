<?php
include '../includes/head.php';


$page_title = 'App Shop';
$page_sub_1 = 'Apps';
$page_sub_2 = 'Listing';
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
						<div class="row g-5 g-xl-8">
							<?php
							$stmt = $conn->prepare("SELECT *, api_shop.id AS shop_app_id FROM api_shop LEFT JOIN client_api ON api_shop.app_id=client_api.id WHERE client_api.user_id!=:id ORDER BY RAND()");
							$stmt->execute(['id' => $user['id']]);
							$app = $stmt->fetchAll();
							foreach ($app as $id => $row) {
								$st_pos = '
	<span class="svg-icon svg-icon-5 svg-icon-success ms-1">
	         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
		        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
	         </svg>
           </span>
	';
								$st_neg = '
	 <span class="svg-icon svg-icon-5 svg-icon-danger ms-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	          <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
	          <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
           </span>
	';
								if ($row['like_charge'] > $system_charge['like_charge']) {
									$like_status = $st_neg;
								} else {
									$like_status = $st_pos;
								}

								if ($row['follow_charge'] > $system_charge['follow_charge']) {
									$follow_status = $st_neg;
								} else {
									$follow_status = $st_pos;
								}

								if ($row['tweet_charge'] > $system_charge['tweet_charge']) {
									$tweet_status = $st_neg;
								} else {
									$tweet_status = $st_pos;
								}
								$arr = array("a" => "info", "b" => "danger", "c" => "success", "d" => "warning", "e" => "primary");
								$key = array_rand($arr);
								echo '
	
							<!--begin::Col-->
							<div class="col-xl-4">
								<!--begin::Mixed Widget 1-->
								<div class="card card-xl-stretch mb-xl-8">
									<!--begin::Body-->
									<div class="card-body p-0">
										<!--begin::Header-->
										<div class="px-9 pt-7 card-rounded h-275px w-100 bg-' . $arr[$key] . '">
											<!--begin::Heading-->
											<div class="d-flex flex-stack">
												<h3 class="m-0 text-white fw-bold fs-3">Featured App</h3>
												<div class="ms-1">
													<!--begin::Menu-->
													<!--end::Menu-->
												</div>
											</div>
											<!--end::Heading-->
											<!--begin::Balance-->
											<div class="d-flex text-center flex-column text-white pt-8">
												<span class="fw-semibold fs-7">App Source Label</span>
												<span class="fw-bold fs-2x pt-1">' . $row['title'] . '</span>
											</div>
											<!--end::Balance-->
										</div>
										<!--end::Header-->
										<!--begin::Items-->
										<div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-6">
												<!--begin::Symbol-->
												<div class="symbol symbol-45px w-40px me-5">
													<span class="symbol-label bg-lighten">
														<!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
														<span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Description-->
												<div class="d-flex align-items-center flex-wrap w-100">
													<!--begin::Title-->
													<div class="mb-1 pe-3 flex-grow-1">
														<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Like</a>
														<div class="text-gray-400 fw-semibold fs-7">Like Charge</div>
													</div>
													<!--end::Title-->
													<!--begin::Label-->
													<div class="d-flex align-items-center">
														<div class="fw-bold fs-5 text-gray-800 pe-1"><span class="fs-8 fw-light text-muted">PTS.</span>' . number_format($row['like_charge'], 2) . '</div>
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
														' . $like_status . '
														<!--end::Svg Icon-->
													</div>
													<!--end::Label-->
												</div>
												<!--end::Description-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-6">
												<!--begin::Symbol-->
												<div class="symbol symbol-45px w-40px me-5">
													<span class="symbol-label bg-lighten">
														<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
														<span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor" />
																<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor" />
																<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Description-->
												<div class="d-flex align-items-center flex-wrap w-100">
													<!--begin::Title-->
													<div class="mb-1 pe-3 flex-grow-1">
														<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Tweet</a>
														<div class="text-gray-400 fw-semibold fs-7">Tweet Charge</div>
													</div>
													<!--end::Title-->
													<!--begin::Label-->
													<div class="d-flex align-items-center">
														<div class="fw-bold fs-5 text-gray-800 pe-1"><span class="fs-8 fw-light text-muted">PTS.</span>' . number_format($row['tweet_charge'], 2) . '</div>
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
														' . $tweet_status . '
														<!--end::Svg Icon-->
													</div>
													<!--end::Label-->
												</div>
												<!--end::Description-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-6">
												<!--begin::Symbol-->
												<div class="symbol symbol-45px w-40px me-5">
													<span class="symbol-label bg-lighten">
														<!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
														<span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
																<path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Description-->
												<div class="d-flex align-items-center flex-wrap w-100">
													<!--begin::Title-->
													<div class="mb-1 pe-3 flex-grow-1">
														<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Follow</a>
														<div class="text-gray-400 fw-semibold fs-7">Follow Charge</div>
													</div>
													<!--end::Title-->
													<!--begin::Label-->
													<div class="d-flex align-items-center">
														<div class="fw-bold fs-5 text-gray-800 pe-1"><span class="fs-8 fw-light text-muted">PTS.</span>' . number_format($row['follow_charge'], 2) . '</div>
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
														' . $follow_status . '
														<!--end::Svg Icon-->
													</div>
													<!--end::Label-->
												</div>
												<!--end::Description-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="d-flex align-items-center">
												<!--begin::Description-->
												<a href="../v3/subscribe?app='.$row['id'].'" class="btn btn-icon-primary btn-text-info w-100 btn-light-info">
													<span class="svg-icon svg-icon-2x">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="currentColor" />
															<path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="currentColor" />
														</svg>
													</span>Subscribe
												</a>
												<!--end::Description-->
											</div>
											<!--end::Item-->
										</div>
										<!--end::Items-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Mixed Widget 1-->
							</div>
							<!--end::Col-->
	';
								if ($id == 2) {
									break;
								}
							}
							?>


						</div>
						<!--end::Row-->
						<!--begin::Tables Widget 12-->
						<div class="card mb-5 mb-xl-8">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label fw-bold fs-3 mb-1">More Apps</span>
									<span class="text-muted mt-1 fw-semibold fs-7">Other listed apps</span>
								</h3>
								<div class="card-toolbar">
									<!--begin::Menu-->

									<!--end::Menu-->
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body py-3">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table id="app_listings_table" class="table align-middle gs-0 gy-4">
										<!--begin::Table head-->
										<thead>
											<tr class="fw-bold text-muted bg-light">
												<th class="ps-4 min-w-50px rounded-start"></th>
												<th class="min-w-125px">Label</th>
												<th class="min-w-125px">Like</th>
												<th class="min-w-125px">Tweet</th>
												<th class="min-w-200px">Follow</th>
												<th class="min-w-200px text-end rounded-end"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<?php
											foreach ($app as $id => $row) {
												if ($id > -90) {
													$arr = array("a" => "info", "b" => "danger", "c" => "success", "d" => "warning", "e" => "primary");
													$key = array_rand($arr);
													echo '
													<tr>
												<td>
													<div class="symbol symbol-50px me-2">
														<span class="symbol-label bg-light-' . $arr[$key] . '">
															<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
															<span class="svg-icon svg-icon-2x svg-icon-' . $arr[$key] . '">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="currentColor" />
																	<path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													
												</td>
												<td>
													<div class="text-muted fw-semibold text-muted fs-6">' . $row['title'] . '</div>
												</td>
												<td>
													<a class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><span class="fs-8 fw-light text-muted">PTS.</span>' . number_format($row['like_charge'], 2) . '</a>
													<span class="text-muted fw-semibold text-muted d-block fs-7">Like charge</span>
												</td>
												<td>
													<a class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><span class="fs-8 fw-light text-muted">PTS.</span>' . number_format($row['tweet_charge'], 2) . '</a>
													<span class="text-muted fw-semibold text-muted d-block fs-7">Tweet Charge</span>
												</td>
												<td>
													<a class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><span class="fs-8 fw-light text-muted">PTS.</span>' . number_format($row['follow_charge'], 2) . '</a>
													<span class="text-muted fw-semibold text-muted d-block fs-7">Follow Charge</span>
												</td>
												<td class="text-end">
												<a href="../v3/subscribe?app='.$row['id'].'" class="btn btn-icon-primary btn-text-info w-100 btn-light-info btn-sm px-4">
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="currentColor" />
															<path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="currentColor" />
														</svg>
													</span>Subscribe
												</a>
												</td>
											</tr>

													';

												}
											}
											?>
											
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
							<!--begin::Body-->
						</div>
						<!--end::Tables Widget 12-->
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
		var table = $("#app_listings_table").DataTable({
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			'order': [],
			'pageLength': 10,
			"scrollCollapse": true,
			"search": {
				"smart": false,
				"select": 'single',
				"info": false,
				"keys": true
			},
			"lengthChange": true,
			"autoWidth": false,
			"stateSave": true,
			
			"dom": "<'row'" +
				"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"
		});
		const documentTitle = 'Customer Orders Report';
		table.buttons({
			buttons: [{
					extend: 'copyHtml5',
					title: documentTitle
				},
				{
					extend: 'excelHtml5',
					title: documentTitle
				},
				{
					extend: 'csvHtml5',
					title: documentTitle
				},
				{
					extend: 'pdfHtml5',
					title: documentTitle
				}
			]
		}).container().appendTo($('.card-toolbar'));
	</script>
	<?php include '../includes/alert.php';?>
	<!--end::Javascript-->
</body>
<!--end::Body-->
</html>