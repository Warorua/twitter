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
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="statements.php">Statements</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="referrals.php">Referrals</a>
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
							<!--begin::Referral program-->
							<div class="card mb-5 mb-xl-10">
								<!--begin::Body-->
								<div class="card-body py-10">
									<h2 class="mb-9">Referral Program</h2>
									<!--begin::Overview-->
									<div class="row mb-10">
										<!--begin::Col-->
										<div class="col-xl-6 mb-15 mb-xl-0 pe-5">
											<h4 class="mb-0">How to use Referral Program</h4>
											<p class="fs-6 fw-semibold text-gray-600 py-4 m-0">Use images to enhance your post, improve its flow, add humor 
											<br />and explain complex topics</p>
											<a href="#" class="btn btn-light btn-active-light-primary fw-bold">Get Started</a>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-xl-6">
											<h4 class="text-gray-800 mb-0">Your Referral Link</h4>
											<p class="fs-6 fw-semibold text-gray-600 py-4 m-0">Plan your blog post by choosing a topic, creating an outline conduct 
											<br />research, and checking facts</p>
											<div class="d-flex">
												<input id="kt_referral_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="https://tweetbot.site/refer?refid=<?php echo $user['id'].'_'.substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-'), 0, 12); ?>" />
												<button id="kt_referral_program_link_copy_btn" class="btn btn-light btn-active-light-primary fw-bold flex-shrink-0" data-clipboard-target="#kt_referral_link_input">Copy Link</button>
											</div>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Overview-->
									<!--begin::Stats-->
									<div class="row">
										<!--begin::Col-->
										<div class="col">
											<div class="card card-dashed flex-center min-w-175px my-3 p-6">
												<span class="fs-4 fw-semibold text-info pb-1 px-2">Net Earnings</span>
												<span class="fs-lg-2tx fw-bold d-flex justify-content-center">KES.
												<span data-kt-countup="true" data-kt-countup-value="0.00">0</span></span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="card card-dashed flex-center min-w-175px my-3 p-6">
												<span class="fs-4 fw-semibold text-success pb-1 px-2">Balance</span>
												<span class="fs-lg-2tx fw-bold d-flex justify-content-center">KES.
												<span data-kt-countup="true" data-kt-countup-value="0">0</span></span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="card card-dashed flex-center min-w-175px my-3 p-6">
												<span class="fs-4 fw-semibold text-danger pb-1 px-2">Avg Deal Size</span>
												<span class="fs-lg-2tx fw-bold d-flex justify-content-center">KES.
												<span data-kt-countup="true" data-kt-countup-value="0">0</span></span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="card card-dashed flex-center min-w-175px my-3 p-6">
												<span class="fs-4 fw-semibold text-primary pb-1 px-2">Referral Signups</span>
												<span class="fs-lg-2tx fw-bold d-flex justify-content-center">KES.
												<span data-kt-countup="true" data-kt-countup-value="0">0</span></span>
											</div>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Stats-->
									<!--begin::Info-->
									<p class="fs-5 fw-semibold text-gray-600 py-6">Writing headlines for blog posts is as much an art as it is a science, and probably warrants its own post, but for now, all I’d advise is experimenting with what works for your audience, especially if it’s not resonating with your audience</p>
									<!--end::Info-->
									<!--begin::Notice-->
									<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
										<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor" />
												<path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->
										<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
											<!--begin::Content-->
											<div class="mb-3 mb-md-0 fw-semibold">
												<h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>
												<div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank account. Commision is KES.25 per transaction under KES.5,000</div>
											</div>
											<!--end::Content-->
											<!--begin::Action-->
											<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Withdraw Money</a>
											<!--end::Action-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Referral program-->
							<!--begin::Referred users-->
							<div class="card">
								<!--begin::Header-->
								<div class="card-header card-header-stretch">
									<!--begin::Title-->
									<div class="card-title">
										<h3>Referred Users</h3>
									</div>
									<!--end::Title-->
								
								</div>
								<!--end::Header-->
								<!--begin::Tab content-->
								<div id="kt_referred_users_tab_content" class="tab-content">
									<!--begin::Tab panel-->
									<div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-bordered table-flush align-middle gy-6">
												<!--begin::Thead-->
												<thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten">
													<tr>
														<th class="min-w-125px ps-9">Order ID</th>
														<th class="min-w-125px px-0">User</th>
														<th class="min-w-125px">Date</th>
														<th class="min-w-125px">Bonus</th>
														<th class="min-w-125px ps-0">Profit</th>
													</tr>
												</thead>
												<!--end::Thead-->
												<!--begin::Tbody-->
												<tbody class="fs-6 fw-semibold text-gray-600">
													<tr>
														<td class="ps-9">00000000</td>
														<td class="ps-0">
															<a href="#" class="text-gray-600 text-hover-primary">Null User</a>
														</td>
														<td>Jan 1, 1970</td>
														<td>0%</td>
														<td class="text-success">KES.00.00</td>
													</tr>
													
												</tbody>
												<!--end::Tbody-->
											</table>
											<!--end::Table-->
										</div>
									</div>
									<!--end::Tab panel-->
								</div>
								<!--end::Tab content-->
							</div>
							<!--end::Referred users-->
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
<!-- account/referrals.php 22:56:23 GMT -->
</html>