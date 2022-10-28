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
												<h3>Campaigns</h3>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body pb-0">
											<span class="fs-5 fw-semibold text-gray-600 pb-5 d-block">Active automated campaigns budget usage monitor.</span>
											<!--begin::Left Section-->
											<div class="d-flex flex-wrap justify-content-between pb-6">
												<!--begin::Row-->
												<div class="d-flex flex-wrap">
													<!--begin::Col-->
													<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
														<span class="fs-2x fw-bold text-gray-800 lh-1">
															<span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">0</span>
														</span>
														<span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Total Budget</span>
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
														<span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Total Usage</span>
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
												<h3 class="text-gray-800">Active Objects</h3>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<span class="fs-5 fw-semibold text-gray-600 pb-6 d-block">Download active automation traversal JSON objects</span>
											<!--begin::Left Section-->
											<div class="d-flex align-self-center">
												<div class="flex-grow-1 me-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Automation object" data-hide-search="true">
														<option value=""></option>
														<option value="1">Followers object</option>
														<option value="2">Following object</option>
														<option value="3">Home timeline object</option>
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
							
								</div>
								<!--end::Header-->
								<!--begin::Tab Content-->
								<div id="kt_referred_users_tab_content" class="tab-content">
									<!--begin::Tab panel-->
									<div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr class="fw-bold text-muted bg-light">
													<th class="ps-4 min-w-325px rounded-start">Campaign</th>
													<th class="min-w-125px">Budget</th>
													<th class="min-w-125px">Usage</th>
													<th class="min-w-200px">Execution</th>
													<th class="min-w-150px">Status</th>
													<th class="min-w-200px text-end rounded-end"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<?php
												$stmt = $conn->prepare("SELECT * FROM campaign_engine WHERE user_id=:user_id");
												$stmt->execute(['user_id'=>$user['id']]);
												$data = $stmt->fetchAll();
												foreach($data as $row){
													if($row['campaign'] == 1){
														$camp_title = 'Auto Follower';
														$camp_desc = 'Follows back your followers';
														$camp_image = '../assets/media/icons/followers.png';

													}elseif($row['campaign'] == 2){
														$camp_title = 'Auto Liker';
														$camp_desc = 'Auto-likes tweets on your home timeline';
														$camp_image = '../assets/media/icons/like.png';

													}elseif($row['campaign'] == 3){
														$camp_title = 'Auto Deleter';
														$camp_desc = 'Deletes your tweets from time of campaign activation';
														$camp_image = '../assets/media/icons/deleter.png';

													}else{
														$camp_title = 'Auto Unfollow';
														$camp_desc = 'Unfollows accounts that are not following you back';
														$camp_image = '../assets/media/icons/unfollow.png';

													}
													echo '
														<tr>
													<td>
														<div class="d-flex align-items-center">
															<div class="symbol symbol-50px me-5">
																<img src="'.$camp_image.'" class="" alt="" />
															</div>
															<div class="d-flex justify-content-start flex-column">
																<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">'.$camp_title.'</a>
																<span class="text-muted fw-semibold text-muted d-block fs-7">'.$camp_desc.'</span>
															</div>
														</div>
													</td>
													<td>
														<a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'.number_format($row['budget']).'</a>
														<span class="text-muted fw-semibold text-muted d-block fs-7">Points</span>
													</td>
													<td>
														<a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'.number_format($row['spent_budget']).'</a>
														<span class="text-muted fw-semibold text-muted d-block fs-7">Points</span>
													</td>
													<td>
														<a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'.str_replace(' ago','',timeDiff($row['execution'], time())).'</a>
														<span class="text-muted fw-semibold text-muted d-block fs-7">'.$row['frequency'].'</span>
													</td>
													<td>
														<span class="badge badge-light-success fs-7 fw-bold">Running...</span>
													</td>
													<td class="text-end">
														<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path
																		d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
																		fill="currentColor" />
																	<path opacity="0.3"
																		d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
																		fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3"
																		d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
																		fill="currentColor" />
																	<path
																		d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
																		fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path
																		d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
																		fill="currentColor" />
																	<path opacity="0.5"
																		d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
																		fill="currentColor" />
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
																		fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
													</td>
												</tr>
													';

												}

												?>
											
											</tbody>
											<!--end::Table body-->
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