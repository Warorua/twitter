<?php
include '../includes/head.php';

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
		<iframe src="https://www.googletagmanager.com/ns.php?id=GTM-MDKZXTL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="user">Overview</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="settings">Settings</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="security">Security</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="billing">Billing</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="statements">Campaigns</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="referrals">Referrals</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="logs">Logs</a>
									</li>
									<!--end::Nav item-->
								</ul>
								<!--begin::Navs-->
							</div>
						</div>
						<!--end::Navbar-->
						<!--begin::Login sessions-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Heading-->
								<div class="card-title">
									<h3>Twitter logs</h3>
								</div>
								<!--end::Heading-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Button-->
									<button onclick="clearLogs()" type="button" class="btn btn-sm btn-light-primary">
										<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
										<span class="svg-icon svg-icon-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
												<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
												<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Delete Logs
									</button>
									<!--end::Button-->
								</div>
								<!--end::Card toolbar-->
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
												<th class="min-w-250px">Id</th>
												<th class="min-w-250px">Info</th>
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
											$stmt = $conn->prepare("SELECT * FROM twitter_logs WHERE user_id=:user_id ORDER BY id ASC");
											$stmt->execute(['user_id' => $user['id']]);
											$log_ses = $stmt->fetchAll();
											foreach ($log_ses as $row) {
												$time = timeDiff($row['time'], date("Y-m-d H:i:s"));
												if ($row['status'] == 1) {
													$stat = '<span class="badge badge-light-success fs-7 fw-bold">OK</span>';
												} else {
													$stat = '<span class="badge badge-light-danger fs-7 fw-bold">ERR</span>';
												}
												echo '
													<tr>
													<td>' . $row['id'] . '</td>
													<td>
														<a href="#" class="text-hover-primary text-gray-600">' . $row['status_info'] . '</a>
													</td>
													<td>
													' . $stat . '
													</td>
													<td>' . $row['browser'] . '</td>
													<td>' . $row['ip'] . '</td>
													<td>' . $time . '</td>
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
						<!--begin::Card-->
						<div class="card pt-4">
							<!--begin::Card header-->
							<div class="card-header border-0">
								<!--begin::Card title-->
								<div class="card-title">
									<h2>Account History</h2>
								</div>
								<!--end::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Button-->
									<button type="button" class="btn btn-sm btn-light-primary">
										<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
										<span class="svg-icon svg-icon-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor" />
												<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor" />
												<path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Download Report
									</button>
									<!--end::Button-->
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body py-0">
								<!--begin::Table wrapper-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
										<!--begin::Table body-->
										<tbody>
											<?php
											$stmt = $conn->prepare("SELECT * FROM history WHERE id=:user_id ORDER BY hist_id DESC");
											$stmt->execute(['user_id' => $user['id']]);
											$log_ses = $stmt->fetchAll();
											foreach ($log_ses as $row) {
												$time = timeDiff($row['timestamp'], date("Y-m-d H:i:s"));
												echo '
													<!--begin::Table row-->
													<tr>
														<!--begin::Badge=-->
														<td class="min-w-70px">
															<div class="badge badge-light-success">200 OK</div>
														</td>
														<!--end::Badge=-->
														<!--begin::Status=-->
														<td>POST/v1/user/account/' . $row['change_part'] . '</td>
														<!--end::Status=-->
														<!--begin::Timestamp=-->
														<td class="pe-0 text-end min-w-200px">' . $time . '</td>
														<!--end::Timestamp=-->
													</tr>
													<!--end::Table row-->
													';
											}

											?>
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table wrapper-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->
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
	<?php include '../includes/scripts.php'; ?>
	<?php include '../auth/security/add_js.php'; ?>
	<!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php'; ?>
<!-- account/logs 22:56:27 GMT -->

</html>