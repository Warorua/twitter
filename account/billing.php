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
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="security.php">Security</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="billing.php">Billing</a>
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
							<!--begin::Billing Summary-->
							<div class="card mb-5 mb-xl-10">
								<!--begin::Card body-->
								<div class="card-body">
									<!--begin::Notice-->
									<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
										<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
												<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
												<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->
										<div class="d-flex flex-stack flex-grow-1">
											<!--begin::Content-->
											<div class="fw-semibold">
												<h4 class="text-gray-900 fw-bold">We need your attention!</h4>
												<div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please 
												<a href="#" class="fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add Payment Method</a>.</div>
											</div>
											<!--end::Content-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
									<!--begin::Row-->
									<div class="row">
										<!--begin::Col-->
										<div class="col-lg-7">
											<!--begin::Heading-->
											<h3 class="mb-2">Active until Dec 09, 2022</h3>
											<p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">We will send you a notification upon Subscription expiration</p>
											<!--end::Heading-->
											<!--begin::Info-->
											<div class="fs-5 mb-2">
												<span class="text-gray-800 fw-bold me-1">$24.99</span>
												<span class="text-gray-600 fw-semibold">Per Month</span>
											</div>
											<!--end::Info-->
											<!--begin::Notice-->
											<div class="fs-6 text-gray-600 fw-semibold">Extended Pro Package. Up to 100 Agents & 25 Projects</div>
											<!--end::Notice-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-5">
											<!--begin::Heading-->
											<div class="d-flex text-muted fw-bold fs-5 mb-3">
												<span class="flex-grow-1 text-gray-800">Users</span>
												<span class="text-gray-800">86 of 100 Used</span>
											</div>
											<!--end::Heading-->
											<!--begin::Progress-->
											<div class="progress h-8px bg-light-primary mb-2">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<!--end::Progress-->
											<!--begin::Description-->
											<div class="fs-6 text-gray-600 fw-semibold mb-10">14 Users remaining until your plan requires update</div>
											<!--end::Description-->
											<!--begin::Action-->
											<div class="d-flex justify-content-end pb-0 px-0">
												<a href="#" class="btn btn-light btn-active-light-primary me-2">Cancel Subscription</a>
												<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</button>
											</div>
											<!--end::Action-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Billing Summary-->
							
							<!--begin::Billing History-->
							<div class="card">
								<!--begin::Card header-->
								<div class="card-header card-header-stretch border-bottom border-gray-200">
									<!--begin::Title-->
									<div class="card-title">
										<h3 class="fw-bold m-0">Billing History</h3>
									</div>
									<!--end::Title-->
									<!--begin::Toolbar-->
									<div class="card-toolbar m-0">
										<!--begin::Tab nav-->
										<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
											<!--begin::Tab nav item-->
											<li class="nav-item" role="presentation">
												<a id="kt_billing_6months_tab" class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Month</a>
											</li>
											<!--end::Tab nav item-->
											<!--begin::Tab nav item-->
											<li class="nav-item" role="presentation">
												<a id="kt_billing_1year_tab" class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
											</li>
											<!--end::Tab nav item-->
											<!--begin::Tab nav item-->
											<li class="nav-item" role="presentation">
												<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold" data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
											</li>
											<!--end::Tab nav item-->
										</ul>
										<!--end::Tab nav-->
									</div>
									<!--end::Toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Tab Content-->
								<div class="tab-content">
									<!--begin::Tab panel-->
									<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-bordered align-middle gy-4 gs-9">
												<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
													<tr>
														<td class="min-w-150px">Date</td>
														<td class="min-w-250px">Description</td>
														<td class="min-w-150px">Amount</td>
														<td class="min-w-150px">Invoice</td>
														<td></td>
													</tr>
												</thead>
												<tbody class="fw-semibold text-gray-600">
													<!--begin::Table row-->
													<tr>
														<td>Nov 01, 2020</td>
														<td>
															<a href="#">Invoice for Ocrober 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Oct 08, 2020</td>
														<td>
															<a href="#">Invoice for September 2022</a>
														</td>
														<td>$98.03</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Aug 24, 2020</td>
														<td>Paypal</td>
														<td>$35.07</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Aug 01, 2020</td>
														<td>
															<a href="#">Invoice for July 2022</a>
														</td>
														<td>$142.80</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jul 01, 2020</td>
														<td>
															<a href="#">Invoice for June 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jun 17, 2020</td>
														<td>Paypal</td>
														<td>$523.09</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jun 01, 2020</td>
														<td>
															<a href="#">Invoice for May 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
												</tbody>
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table container-->
									</div>
									<!--end::Tab panel-->
									<!--begin::Tab panel-->
									<div id="kt_billing_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_year">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-bordered align-middle gy-4 gs-9">
												<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
													<tr>
														<td class="min-w-150px">Date</td>
														<td class="min-w-250px">Description</td>
														<td class="min-w-150px">Amount</td>
														<td class="min-w-150px">Invoice</td>
														<td></td>
													</tr>
												</thead>
												<tbody class="fw-semibold text-gray-600">
													<!--begin::Table row-->
													<tr>
														<td>Dec 01, 2021</td>
														<td>
															<a href="#">Billing for Ocrober 2022</a>
														</td>
														<td>$250.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Oct 08, 2021</td>
														<td>
															<a href="#">Statements for September 2022</a>
														</td>
														<td>$98.03</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Aug 24, 2021</td>
														<td>Paypal</td>
														<td>$35.07</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Aug 01, 2021</td>
														<td>
															<a href="#">Invoice for July 2022</a>
														</td>
														<td>$142.80</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jul 01, 2021</td>
														<td>
															<a href="#">Statements for June 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jun 17, 2021</td>
														<td>Paypal</td>
														<td>$23.09</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
												</tbody>
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table container-->
									</div>
									<!--end::Tab panel-->
									<!--begin::Tab panel-->
									<div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_all">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-bordered align-middle gy-4 gs-9">
												<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
													<tr>
														<td class="min-w-150px">Date</td>
														<td class="min-w-250px">Description</td>
														<td class="min-w-150px">Amount</td>
														<td class="min-w-150px">Invoice</td>
														<td></td>
													</tr>
												</thead>
												<tbody class="fw-semibold text-gray-600">
													<!--begin::Table row-->
													<tr>
														<td>Nov 01, 2021</td>
														<td>
															<a href="#">Billing for Ocrober 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Aug 10, 2021</td>
														<td>Paypal</td>
														<td>$35.07</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Aug 01, 2021</td>
														<td>
															<a href="#">Invoice for July 2022</a>
														</td>
														<td>$142.80</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jul 20, 2021</td>
														<td>
															<a href="#">Statements for June 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jun 17, 2021</td>
														<td>Paypal</td>
														<td>$23.09</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<td>Jun 01, 2021</td>
														<td>
															<a href="#">Invoice for May 2022</a>
														</td>
														<td>$123.79</td>
														<td>
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
														</td>
														<td class="text-right">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
														</td>
													</tr>
													<!--end::Table row-->
												</tbody>
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table container-->
									</div>
									<!--end::Tab panel-->
								</div>
								<!--end::Tab Content-->
							</div>
							<!--end::Billing Address-->
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
<!-- account/billing.php 22:56:20 GMT -->
</html>