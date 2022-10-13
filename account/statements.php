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
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="billing.php">Billing</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="statements.php">Statements</a>
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
									<!--begin::Earnings-->
									<div class="card card-xxl-stretch mb-5 mb-xxl-10">
										<!--begin::Header-->
										<div class="card-header">
											<div class="card-title">
												<h3>Earnings</h3>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body pb-0">
											<span class="fs-5 fw-semibold text-gray-600 pb-5 d-block">Last 30 day earnings calculated. Apart from arranging the order of topics.</span>
											<!--begin::Left Section-->
											<div class="d-flex flex-wrap justify-content-between pb-6">
												<!--begin::Row-->
												<div class="d-flex flex-wrap">
													<!--begin::Col-->
													<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
														<span class="fs-2x fw-bold text-gray-800 lh-1">
															<span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">0</span>
														</span>
														<span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Net Earnings</span>
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
														<span class="fs-2x fw-bold text-gray-800 lh-1">
														<span class="" data-kt-countup="true" data-kt-countup-value="80">0</span>%</span>
														<span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Change</span>
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
														<span class="fs-2x fw-bold text-gray-800 lh-1">
															<span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$">0</span>
														</span>
														<span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Fees</span>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Row-->
												<a href="#" class="btn btn-primary px-6 flex-shrink-0 align-self-center">Withdraw Earnings</a>
											</div>
											<!--end::Left Section-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Earnings-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xxl-4">
									<!--begin::Invoices-->
									<div class="card card-xxl-stretch mb-5 mb-xxl-10">
										<!--begin::Header-->
										<div class="card-header">
											<div class="card-title">
												<h3 class="text-gray-800">Invoices</h3>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<span class="fs-5 fw-semibold text-gray-600 pb-6 d-block">Download apart from order of the good awesome invoice topics</span>
											<!--begin::Left Section-->
											<div class="d-flex align-self-center">
												<div class="flex-grow-1 me-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seller Annual Fee" data-hide-search="true">
														<option value=""></option>
														<option value="1">Individual Seller Account</option>
														<option value="2">Variable Closing Fee</option>
														<option value="3">Minimum Referral Fee</option>
													</select>
													<!--end::Select-->
												</div>
												<!--begin::Action-->
												<button type="button" class="btn btn-primary btn-icon flex-shrink-0">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
															<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</button>
												<!--end::Action-->
											</div>
											<!--end::Left Section-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Invoices-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Statements-->
							<div class="card">
								<!--begin::Header-->
								<div class="card-header card-header-stretch">
									<!--begin::Title-->
									<div class="card-title">
										<h3 class="m-0 text-gray-800">Statement</h3>
									</div>
									<!--end::Title-->
									<!--begin::Toolbar-->
									<div class="card-toolbar m-0">
										<!--begin::Tab nav-->
										<ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs border-transparent" role="tablist">
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_year_tab" class="nav-link text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_referrals_1">This Year</a>
											</li>
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_2019_tab" class="nav-link text-active-gray-800 me-4" data-bs-toggle="tab" role="tab" href="#kt_referrals_2">2019</a>
											</li>
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_2018_tab" class="nav-link text-active-gray-800 me-4" data-bs-toggle="tab" role="tab" href="#kt_referrals_3">2018</a>
											</li>
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_2017_tab" class="nav-link text-active-gray-800 ms-8" data-bs-toggle="tab" role="tab" href="#kt_referrals_4">2017</a>
											</li>
										</ul>
										<!--end::Tab nav-->
									</div>
									<!--end::Toolbar-->
								</div>
								<!--end::Header-->
								<!--begin::Tab Content-->
								<div id="kt_referred_users_tab_content" class="tab-content">
									<!--begin::Tab panel-->
									<div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
												<!--begin::Thead-->
												<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
													<tr>
														<th class="min-w-175px ps-9">Date</th>
														<th class="min-w-150px px-0">Order ID</th>
														<th class="min-w-350px">Details</th>
														<th class="min-w-125px">Amount</th>
														<th class="min-w-125px text-center">Invoice</th>
													</tr>
												</thead>
												<!--end::Thead-->
												<!--begin::Tbody-->
												<tbody class="fs-6 fw-semibold text-gray-600">
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">102445788</td>
														<td>Darknight transparency 36 Icons Pack</td>
														<td class="text-success">$38.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 24, 2020</td>
														<td class="ps-0">423445721</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-2.60</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 08, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Cartoon Mobile Emoji Phone Pack</td>
														<td class="text-success">$76.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Sep 15, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Iphone 12 Pro Mockup Mega Bundle</td>
														<td class="text-success">$5.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">May 30, 2020</td>
														<td class="ps-0">523445943</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-1.30</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Apr 22, 2020</td>
														<td class="ps-0">231445943</td>
														<td>Parcel Shipping / Delivery Service App</td>
														<td class="text-success">$204.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Feb 09, 2020</td>
														<td class="ps-0">426445943</td>
														<td>Visual Design Illustration</td>
														<td class="text-success">$31.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">984445943</td>
														<td>Abstract Vusial Pack</td>
														<td class="text-success">$52.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Jan 04, 2020</td>
														<td class="ps-0">324442313</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-0.80</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
												</tbody>
												<!--end::Tbody-->
											</table>
											<!--end::Table-->
										</div>
									</div>
									<!--end::Tab panel-->
									<!--begin::Tab panel-->
									<div id="kt_referrals_2" class="card-body p-0 tab-pane fade" role="tabpanel">
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
												<!--begin::Thead-->
												<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
													<tr>
														<th class="min-w-175px ps-9">Date</th>
														<th class="min-w-150px px-0">Order ID</th>
														<th class="min-w-350px">Details</th>
														<th class="min-w-125px">Amount</th>
														<th class="min-w-125px text-center">Invoice</th>
													</tr>
												</thead>
												<!--end::Thead-->
												<!--begin::Tbody-->
												<tbody class="fs-6 fw-semibold text-gray-600">
													<tr>
														<td class="ps-9">May 30, 2020</td>
														<td class="ps-0">523445943</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-1.30</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Apr 22, 2020</td>
														<td class="ps-0">231445943</td>
														<td>Parcel Shipping / Delivery Service App</td>
														<td class="text-success">$204.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Feb 09, 2020</td>
														<td class="ps-0">426445943</td>
														<td>Visual Design Illustration</td>
														<td class="text-success">$31.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">984445943</td>
														<td>Abstract Vusial Pack</td>
														<td class="text-success">$52.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Jan 04, 2020</td>
														<td class="ps-0">324442313</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-0.80</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">102445788</td>
														<td>Darknight transparency 36 Icons Pack</td>
														<td class="text-success">$38.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 24, 2020</td>
														<td class="ps-0">423445721</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-2.60</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 08, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Cartoon Mobile Emoji Phone Pack</td>
														<td class="text-success">$76.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Sep 15, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Iphone 12 Pro Mockup Mega Bundle</td>
														<td class="text-success">$5.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
												</tbody>
												<!--end::Tbody-->
											</table>
											<!--end::Table-->
										</div>
									</div>
									<!--end::Tab panel-->
									<!--begin::Tab panel-->
									<div id="kt_referrals_3" class="card-body p-0 tab-pane fade" role="tabpanel">
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
												<!--begin::Thead-->
												<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
													<tr>
														<th class="min-w-175px ps-9">Date</th>
														<th class="min-w-150px px-0">Order ID</th>
														<th class="min-w-350px">Details</th>
														<th class="min-w-125px">Amount</th>
														<th class="min-w-125px text-center">Invoice</th>
													</tr>
												</thead>
												<!--end::Thead-->
												<!--begin::Tbody-->
												<tbody class="fs-6 fw-semibold text-gray-600">
													<tr>
														<td class="ps-9">Feb 09, 2020</td>
														<td class="ps-0">426445943</td>
														<td>Visual Design Illustration</td>
														<td class="text-success">$31.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">984445943</td>
														<td>Abstract Vusial Pack</td>
														<td class="text-success">$52.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Jan 04, 2020</td>
														<td class="ps-0">324442313</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-0.80</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Sep 15, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Iphone 12 Pro Mockup Mega Bundle</td>
														<td class="text-success">$5.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">102445788</td>
														<td>Darknight transparency 36 Icons Pack</td>
														<td class="text-success">$38.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 24, 2020</td>
														<td class="ps-0">423445721</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-2.60</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 08, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Cartoon Mobile Emoji Phone Pack</td>
														<td class="text-success">$76.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">May 30, 2020</td>
														<td class="ps-0">523445943</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-1.30</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Apr 22, 2020</td>
														<td class="ps-0">231445943</td>
														<td>Parcel Shipping / Delivery Service App</td>
														<td class="text-success">$204.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
												</tbody>
												<!--end::Tbody-->
											</table>
											<!--end::Table-->
										</div>
									</div>
									<!--end::Tab panel-->
									<!--begin::Tab panel-->
									<div id="kt_referrals_4" class="card-body p-0 tab-pane fade" role="tabpanel">
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
												<!--begin::Thead-->
												<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
													<tr>
														<th class="min-w-175px ps-9">Date</th>
														<th class="min-w-150px px-0">Order ID</th>
														<th class="min-w-350px">Details</th>
														<th class="min-w-125px">Amount</th>
														<th class="min-w-125px text-center">Invoice</th>
													</tr>
												</thead>
												<!--end::Thead-->
												<!--begin::Tbody-->
												<tbody class="fs-6 fw-semibold text-gray-600">
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">102445788</td>
														<td>Darknight transparency 36 Icons Pack</td>
														<td class="text-success">$38.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 24, 2020</td>
														<td class="ps-0">423445721</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-2.60</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">102445788</td>
														<td>Darknight transparency 36 Icons Pack</td>
														<td class="text-success">$38.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 24, 2020</td>
														<td class="ps-0">423445721</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-2.60</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Feb 09, 2020</td>
														<td class="ps-0">426445943</td>
														<td>Visual Design Illustration</td>
														<td class="text-success">$31.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Nov 01, 2020</td>
														<td class="ps-0">984445943</td>
														<td>Abstract Vusial Pack</td>
														<td class="text-success">$52.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Jan 04, 2020</td>
														<td class="ps-0">324442313</td>
														<td>Seller Fee</td>
														<td class="text-danger">$-0.80</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 08, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Cartoon Mobile Emoji Phone Pack</td>
														<td class="text-success">$76.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
													<tr>
														<td class="ps-9">Oct 08, 2020</td>
														<td class="ps-0">312445984</td>
														<td>Cartoon Mobile Emoji Phone Pack</td>
														<td class="text-success">$76.00</td>
														<td class="text-center">
															<button class="btn btn-light btn-sm btn-active-light-primary">Download</button>
														</td>
													</tr>
												</tbody>
												<!--end::Tbody-->
											</table>
											<!--end::Table-->
										</div>
									</div>
									<!--end::Tab panel-->
								</div>
								<!--end::Tab Content-->
							</div>
							<!--end::Statements-->
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
<!-- account/statements.php 22:56:22 GMT -->
</html>