<?php
include '../includes/head.php';

?>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.php?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
							<!--begin::Navbar-->
							<div class="card mb-5 mb-xl-10">
								<div class="card-body pt-9 pb-0">
									<!--begin::Details-->
									<?php include './blocks/details_block.php' ?>
									<!--end::Details-->
									<!--begin::Navs-->
									<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="overview.php">Overview</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="settings.php">Settings</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="security.php">Security</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="billing.php">Billing</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="statements.php">Statements</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="referrals.php">Referrals</a>
										</li>
										<!--end::Nav item-->
									
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="logs.php">Logs</a>
										</li>
										<!--end::Nav item-->
									</ul>
									<!--begin::Navs-->
								</div>
							</div>
							<!--end::Navbar-->
							<!--begin::Row-->
							<div class="row g-xxl-9">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Security summary-->
									<div class="card card-xxl-stretch mb-5 mb-xl-10">
										<!--begin::Header-->
										<div class="card-header card-header-stretch">
											<!--begin::Title-->
											<div class="card-title">
												<h3 class="m-0 text-gray-900">Security Summary</h3>
											</div>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<ul class="nav nav-tabs nav-line-tabs nav-stretch border-transparent fs-5 fw-bold" id="kt_security_summary_tabs">
													<li class="nav-item">
														<a class="nav-link text-active-primary active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_security_summary_tab_pane_hours">Overall</a>
													</li>
												</ul>
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body pt-7 pb-0 px-0">
											<!--begin::Tab content-->
											<div class="tab-content">
												<!--begin::Tab panel-->
												<div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours" role="tabpanel">
													<!--begin::Row-->
													<div class="row p-0 mb-5 px-9">
														<?php
														function log_sess($type){
															global $conn;
															global $user;
															$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM logs WHERE status=:status AND user_id=:user_id");
															$stmt->execute(['status'=>$type, 'user_id'=>$user['id']]);
															$log_nm = $stmt->fetch();
															$log_tt = $log_nm['numrows'];

															return $log_tt;
														}

														?>
														<!--begin::Col-->
														<div class="col">
															<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
																<span class="fs-4 fw-semibold text-success d-block">User Total Sign-in</span>
																<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="<?php echo log_sess(0) + log_sess(1) ?>">0</span>
															</div>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col">
															<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
																<span class="fs-4 fw-semibold text-primary d-block">Successfull Attempts</span>
																<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="<?php echo log_sess(1) ?>">0</span>
															</div>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col">
															<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
																<span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
																<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="<?php echo log_sess(0) ?>">0</span>
															</div>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
													<!--begin::Container-->
													<div class="pt-2">
														<!--begin::Tabs-->
														<div class="d-flex align-items-center pb-6 px-9">
															<!--begin::Title-->
															<h3 class="m-0 text-gray-900 flex-grow-1">Activity Chart</h3>
															<!--end::Title-->
															<!--begin::Nav pills-->
															<ul class="nav nav-pills nav-line-pills border rounded p-1">
																<li class="nav-item me-2">
																	<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab" href="#kt_security_summary_tab_pane_hours_agents">Logins</a>
																</li>
															</ul>
															<!--end::Nav pills-->
														</div>
														<!--end::Tabs-->
														<!--begin::Tab content-->
														<div class="tab-content px-3">
															<!--begin::Tab pane-->
															<div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours_agents" role="tabpanel">
																<!--begin::Chart-->
																<div id="kt_security_sessions" style="height: 300px"></div>
																<!--end::Chart-->
															</div>
															<!--end::Tab pane-->
														</div>
														<!--end::Tab content-->
													</div>
													<!--end::Container-->
												</div>
												<!--end::Tab panel-->
											</div>
											<!--end::Tab content-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Security summary-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xxl-4">
									<!--begin::Security recent alerts-->
									<div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
										<!--begin::Body-->
										<div class="card-body pt-5">
											<!--begin::Carousel-->
											<div id="kt_security_recent_alerts" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
												<!--begin::Heading-->
												<div class="d-flex flex-stack align-items-center flex-wrap">
													<h4 class="text-gray-400 fw-semibold mb-0 pe-2">Recent Alerts</h4>
													<!--begin::Carousel Indicators-->
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
														<li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="0" class="ms-1 active"></li>
														<li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="1" class="ms-1"></li>
														<li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="2" class="ms-1"></li>
														<li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="3" class="ms-1"></li>
													</ol>
													<!--end::Carousel Indicators-->
												</div>
												<!--end::Heading-->
												<!--begin::Carousel inner-->
												<div class="carousel-inner pt-6">
													<!--begin::Item-->
													<div class="carousel-item active">
														<!--begin::Wrapper-->
														<div class="carousel-wrapper">
															<!--begin::Description-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Latest Announcements</a>
																<p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">In the last year, you’ve probably had to adapt to new ways of living and working.</p>
															</div>
															<!--end::Description-->
															<!--begin::Summary-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-bold me-2">Jun 10, 2021</span>
																<a href="#" class="btn btn-sm btn-light">Learn More</a>
															</div>
															<!--end::Summary-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
												<?php
												$stmt = $conn->prepare("SELECT * FROM logs WHERE user_id=:user_id ORDER BY id DESC LIMIT 3");
												$stmt->execute(['user_id'=>$user['id']]);
												$log_ses = $stmt->fetchAll();
												foreach($log_ses as $row){
													echo '
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="carousel-wrapper">
															<!--begin::Description-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Latest Logs</a>
																<p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">'.$row['status_info'].'</p>
															</div>
															<!--end::Description-->
															<!--begin::Summary-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-bold me-2">'.$row['time'].'</span>
																<a href="#" class="btn btn-sm btn-light">Logged</a>
															</div>
															<!--end::Summary-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
													';

												}

												?>
												
												</div>
												<!--end::Carousel inner-->
											</div>
											<!--end::Carousel-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Security recent alerts-->
									<!--begin::Security guidelines-->
									<div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
										<!--begin::Body-->
										<div class="card-body pt-5">
											<!--begin::Carousel-->
											<div id="kt_security_guidelines" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
												<!--begin::Heading-->
												<div class="d-flex flex-stack align-items-center flex-wrap">
													<h4 class="text-gray-400 fw-semibold mb-0 pe-2">Security Guidelines</h4>
													<!--begin::Carousel Indicators-->
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
														<li data-bs-target="#kt_security_guidelines" data-bs-slide-to="0" class="ms-1 active"></li>
														<li data-bs-target="#kt_security_guidelines" data-bs-slide-to="1" class="ms-1"></li>
														<li data-bs-target="#kt_security_guidelines" data-bs-slide-to="2" class="ms-1"></li>
													</ol>
													<!--end::Carousel Indicators-->
												</div>
												<!--end::Heading-->
												<!--begin::Carousel inner-->
												<div class="carousel-inner pt-6">
													<!--begin::Item-->
													<div class="carousel-item active">
														<!--begin::Wrapper-->
														<div class="carousel-wrapper">
															<!--begin::Description-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Get Start Your Security</a>
																<p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">In the last year, you’ve probably had to adapt to new ways of living and working.</p>
															</div>
															<!--end::Description-->
															<!--begin::Summary-->
															<div class="d-flex flex-stack pt-8">
																<span class="text-muted fw-semibold fs-6 pe-2">34, Soho Avenue, Tokio</span>
																<a href="#" class="btn btn-sm btn-light">Register</a>
															</div>
															<!--end::Summary-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="carousel-wrapper">
															<!--begin::Description-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="fw-bold text-dark text-hover-primary">Security Policy Update</a>
																<p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">As we approach one year of working remotely, we wanted to take a look back and share some ways teams around the world have collaborated effectively.</p>
															</div>
															<!--end::Description-->
															<!--begin::Summary-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-bold me-2">Oct 05, 2021</span>
																<a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Explore</a>
															</div>
															<!--end::Summary-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<!--begin::Wrapper-->
														<div class="carousel-wrapper">
															<!--begin::Description-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="fw-bold text-dark text-hover-primary">Terms Of Use Document</a>
																<p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">Today we are excited to share an amazing certification opportunity which is designed to teach you everything</p>
															</div>
															<!--end::Description-->
															<!--begin::Summary-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-bold me-2">Nov 10, 2021</span>
																<a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Discover</a>
															</div>
															<!--end::Summary-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Carousel inner-->
											</div>
											<!--end::Carousel-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Security guidelines-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Login sessions-->
							<div class="card mb-5 mb-xl-10">
								<!--begin::Card header-->
								<div class="card-header">
									<!--begin::Heading-->
									<div class="card-title">
										<h3>Login Sessions</h3>
									</div>
									<!--end::Heading-->
								
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-0">
									<!--begin::Table wrapper-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table id="kt_login_sessions" class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
											<!--begin::Thead-->
											<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
												<tr>
													<th class="min-w-250px">Date</th>
													<th class="min-w-100px">Status</th>
													<th class="min-w-150px">Device</th>
													<th class="min-w-150px">IP Address</th>
													<th class="min-w-150px">Time</th>
												</tr>
											</thead>
											<!--end::Thead-->
											<!--begin::Tbody-->
											<tbody class="fw-6 fw-semibold text-gray-600">
												<?php
												$stmt = $conn->prepare("SELECT * FROM logs WHERE user_id=:user_id ORDER BY id DESC");
												$stmt->execute(['user_id'=>$user['id']]);
												$log_ses = $stmt->fetchAll();
												foreach($log_ses as $row){
													$time = timeDiff($row['time'],date("Y-m-d H:i:s"));
													if($row['status'] == 1){
														$stat = '<span class="badge badge-light-success fs-7 fw-bold">OK</span>';
													}else{
														$stat = '<span class="badge badge-light-danger fs-7 fw-bold">ERR</span>';
													}
													echo '
													<tr>
													<td>
														<a href="#" class="text-hover-primary text-gray-600">'.$row['time'].'</a>
													</td>
													<td>
													'.$stat.'
													</td>
													<td>'.$row['browser'].'</td>
													<td>'.$row['ip'].'</td>
													<td>'.$time.'</td>
												</tr>
													';

												}

												?>
											
											</tbody>
											<!--end::Tbody-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table wrapper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Login sessions-->
						
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
		
		<?php include '../includes/scripts.php';?>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
<?php include '../includes/alert.php';?>
<?php include '../auth/security/add_js.php';?>
<!-- account/security.php 22:56:17 GMT -->
</html>