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
							
							<!--begin::Products-->
							<div class="card card-flush">
								<!--begin::Card header-->
								<div class="card-header align-items-center py-5 gap-2 gap-md-5">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-4">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
										</div>
										<!--end::Search-->
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
										<!--begin::Flatpickr-->
										<div class="input-group w-250px">
											<input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
											<button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
														<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
										</div>
										<!--end::Flatpickr-->
										<div class="w-100 mw-150px">
											<!--begin::Select2-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
												<option></option>
												<option value="all">All</option>
												<option value="Cancelled">Cancelled</option>
												<option value="Completed">Completed</option>
												<option value="Denied">Denied</option>
												<option value="Expired">Expired</option>
												<option value="Failed">Failed</option>
												<option value="Pending">Pending</option>
												<option value="Processing">Processing</option>
												<option value="Refunded">Refunded</option>
											</select>
											<!--end::Select2-->
										</div>
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
													</div>
												</th>
												<th class="min-w-100px">Order ID</th>
												<th class="min-w-175px">Customer</th>
												<th class="text-end min-w-70px">Status</th>
												<th class="text-end min-w-100px">Total</th>
												<th class="text-end min-w-100px">Processing Fee</th>
												<th class="text-end min-w-100px">Payment type</th>
												<th class="text-end min-w-100px">Date paid</th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-semibold text-gray-600">
											<?php
											$stmt = $conn->prepare("SELECT * FROM billing WHERE user_id=:user_id");
											$stmt->execute(['user_id'=>$user['id']]);
											$bill = $stmt->fetchAll();
											foreach($bill as $row){
												$originalDate = $row['created_at'];
												$newDate = date("Y-m-d H:i:s", strtotime($originalDate));
												$holderDate = date("Y-m-d", strtotime($originalDate));
												echo '
												<!--begin::Table row-->
											<tr>
												<!--begin::Checkbox-->
												<td>
													<div class="form-check form-check-sm form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="1" />
													</div>
												</td>
												<!--end::Checkbox-->
												<!--begin::Order ID=-->
												<td data-kt-ecommerce-order-filter="order_id">
													<a class="text-gray-800 text-hover-primary fw-bold">'.$row['flw_ref'].'</a>
												</td>
												<!--end::Order ID=-->
												<!--begin::Customer=-->
												<td>
													<div class="d-flex align-items-center">
														<!--begin:: Avatar -->
														<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
															<a>
																<div class="symbol-label">
																	<img src="'.pic_fix($t_user->getProfileImageUrl()).'" alt="'.$user['username'].'" class="w-100" />
																</div>
															</a>
														</div>
														<!--end::Avatar-->
														<div class="ms-5">
															<!--begin::Title-->
															<a class="text-gray-800 text-hover-primary fs-5 fw-bold">'.$user['username'].'</a>
															<!--end::Title-->
														</div>
													</div>
												</td>
												<!--end::Customer=-->
												<!--begin::Status=-->
												<td class="text-end pe-0" data-order="Completed">
													<!--begin::Badges-->
													<div class="badge badge-light-success">Completed</div>
													<!--end::Badges-->
												</td>
												<!--end::Status=-->
												<!--begin::Total=-->
												<td class="text-end pe-0">
													<span class="fw-bold">KES.'.number_format($row['charged_amount']).'</span>
												</td>
												<!--end::Total=-->
												<!--begin::processing fee=-->
												<td class="text-end" data-order="0.0">
													<span class="fw-bold">KES.'.number_format($row['app_fee']).'</span>
												</td>
												<!--end::processing fee=-->
												<!--begin::Payment type=-->
												<td class="text-end" data-order="'.$row['payment_type'].'">
													<span class="fw-bold">'.$row['payment_type'].'</span>
												</td>
												<!--end::Payment type=-->
												<!--begin::Date Modified=-->
												<td class="text-end" data-order="'.$holderDate.'">
													<span class="fw-bold">'.$newDate.'</span>
												</td>
												<!--end::Date Modified=-->
											
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
								<!--end::Card body-->
							</div>
							<!--end::Products-->
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