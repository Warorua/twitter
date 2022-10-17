<?php
include '../includes/head.php';
if (isset($_GET['user'])) {
	if (is_numeric($_GET['user'])) {
		$abraham_client->setApiVersion('2');
		$statues = array_convert($abraham_client->get("users", ["ids" => $_GET['user']]));

		if (!isset($statues['data'])) {
			$member_id = $user['t_id'];
		} else {
			$member_id = $_GET['user'];
		}
	} else {
		$member_id = $user['t_id'];
	}
} else {
	$member_id = $user['t_id'];
}

$member_data = user_metrics($member_id);

if ($member_data['data']['verified']) {
	$verif_icon = 'svg-icon-primary';
	$verif_info = 'Twitter Verified';
} else {
	$verif_icon = 'svg-icon-warning';
	$verif_info = 'KOT Verified';
}


$ajax_user_id = $member_id;
?>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
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
						<!--begin::Social - Feeds -->
						<div class="d-flex flex-row">
							<!--begin::Start sidebar-->
							<div class="d-lg-flex flex-column flex-lg-row-auto col-4" data-kt-drawer="true" data-kt-drawer-name="start-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_social_start_sidebar_toggle">
								<!--begin::User menu-->
								<div class="card mb-5 mb-xl-8">
									<!--begin::Body-->
									<div class="card-body pt-15 px-0">
										<!--begin::Member-->
										<div class="d-flex flex-column text-center mb-9 px-9">
											<!--begin::Photo-->
											<div class="symbol symbol-80px symbol-lg-150px mb-4">
												<img src="<?php echo pic_fix($member_data['data']['profile_image_url']) ?>" class="" alt="" />
											</div>
											<!--end::Photo-->
											<!--begin::Info-->
											<div class="text-center">
												<!--begin::Name-->
												<a href="../user-profile/overview.html" class="text-gray-800 fw-bold text-hover-primary fs-4"><?php echo $member_data['data']['name'] ?></a>
												<a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $verif_info ?>">
													<!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
													<span class="svg-icon svg-icon-1 <?php echo $verif_icon ?>">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
															<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor" />
															<path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
												<!--end::Name-->
												<!--begin::Position-->
												<span class="text-muted d-block fw-semibold"><?php echo $member_data['data']['username'] ?></span>
												<!--end::Position-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Member-->
										<!--begin::Row-->
										<div class="row px-9 mb-4">
											<!--begin::Col-->
											<div class="col-md-4 text-center">
												<div class="text-gray-800 fw-bold fs-3">
													<span class="m-0" data-kt-countup="true" data-kt-countup-value="<?php echo $member_data['data']['public_metrics']['tweet_count'] ?>">0</span>
												</div>
												<span class="text-gray-500 fs-8 d-block fw-bold">TWEETS</span>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-4 text-center">
												<div class="text-gray-800 fw-bold fs-3">
													<span class="m-0" data-kt-countup="true" data-kt-countup-value="<?php echo $member_data['data']['public_metrics']['followers_count'] ?>">0</span>
												</div>
												<span class="text-gray-500 fs-8 d-block fw-bold">FOLLOWERS</span>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-4 text-center">
												<div class="text-gray-800 fw-bold fs-3">
													<span class="m-0" data-kt-countup="true" data-kt-countup-value="<?php echo $member_data['data']['public_metrics']['following_count'] ?>">0</span>
												</div>
												<span class="text-gray-500 fs-8 d-block fw-bold">FOLLOWING</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Navbar-->
										<div class="m-0">
											<!--begin::Navs-->
											<ul class="nav nav-pills nav-pills-custom flex-column border-transparent fs-5 fw-bold">
												<!--begin::Nav item-->
												<li class="nav-item mt-5">
													<a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 active" href="feeds.html">
														<!--begin::Svg Icon | path: icons/duotune/general/gen010.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-muted me-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M2 21V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H3C2.4 22 2 21.6 2 21Z" fill="currentColor" />
																<path d="M2 10V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H3C2.4 11 2 10.6 2 10Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->Feeds
														<!--begin::Bullet-->
														<span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
														<!--end::Bullet-->
													</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item mt-5">
													<a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0" href="activity.html">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-muted me-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
																<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
																<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
																<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->Activity
														<!--begin::Bullet-->
														<span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
														<!--end::Bullet-->
													</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item mt-5">
													<a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0" href="followers.html">
														<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-muted me-3">
															<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
																<path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
																<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->Followers
														<!--begin::Bullet-->
														<span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
														<!--end::Bullet-->
													</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item mt-5">
													<a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0" href="settings.html">
														<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-muted me-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor" />
																<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->Settings
														<!--begin::Bullet-->
														<span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
														<!--end::Bullet-->
													</a>
												</li>
												<!--end::Nav item-->
											</ul>
											<!--begin::Navs-->
										</div>
										<!--end::Navbar-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::User menu-->
								<?php
									//$profile_stats = $user_metrics;
									$profile_stats = user_metrics($member_id);

									include '../includes/elements/profile_stats.php';


									?>
										<?php
									//$following_list_data = get_following($user['t_id']);
									$following_list_data = get_following($member_id);

									include '../includes/elements/following_list.php';


									?>

									<?php
									//$follower_list_data = get_followers($user['t_id']);
									$follower_list_data = get_followers($member_id);
									

									include '../includes/elements/follower_list.php';


									?>
							
							</div>
							<!--end::Start sidebar-->
							<!--begin::Content-->
							<div class="col-md-12 flex-lg-row-fluid mx-lg-13">
								<!--begin::Mobile toolbar-->
								<div class="d-flex d-lg-none align-items-center justify-content-end mb-10">
									<div class="d-flex align-items-center gap-2">
										<div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_social_start_sidebar_toggle">
											<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
											<span class="svg-icon svg-icon-1">
												<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
													<path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
													<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_social_end_sidebar_toggle">
											<!--begin::Svg Icon | path: icons/duotune/coding/cod002.svg-->
											<span class="svg-icon svg-icon-1">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M18 22C19.7 22 21 20.7 21 19C21 18.5 20.9 18.1 20.7 17.7L15.3 6.30005C15.1 5.90005 15 5.5 15 5C15 3.3 16.3 2 18 2H6C4.3 2 3 3.3 3 5C3 5.5 3.1 5.90005 3.3 6.30005L8.7 17.7C8.9 18.1 9 18.5 9 19C9 20.7 7.7 22 6 22H18Z" fill="currentColor" />
													<path d="M18 2C19.7 2 21 3.3 21 5H9C9 3.3 7.7 2 6 2H18Z" fill="currentColor" />
													<path d="M9 19C9 20.7 7.7 22 6 22C4.3 22 3 20.7 3 19H9Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
									</div>
								</div>
								<!--end::Mobile toolbar-->





								<!--begin::Posts-->
								<div class="mb-10" id="kt_social_feeds_posts">
									<!--begin::Post 1-->
									<div id="activeTweet"></div>
									<div id="placeholderTweet">
										<?php
										for ($i = 0; $i <= 4; $i++) {
											echo '
                                           <!---begin::placeholder card ----->

									      <div class="card card-flush shadow-sm mb-10 h-auto overflow-visible">
										  <!--begin::Card header-->
										  <div class="card-header pt-9">
											<!--begin::Author-->
											<div class="d-flex align-items-center">
												<!--begin::Avatar-->
												<div class="symbol symbol-50px me-5">
													<img src="' . pic_fix($member_data['data']['profile_image_url']) . '" class="" alt="" />
												</div>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Name-->
													<a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">' . $member_data['data']['name'] . '</a>
													<!--end::Name-->
													<!--begin::Date-->
													<span class="text-gray-400 fw-semibold d-block">
														<div class=" placeholder-glow">
															<span class="placeholder">
																<span class="invisible">1 day, 15 hrs, 49 mins ago</span>
															</span>
															<span class="badge badge-light-info">Coming up...</span>
														</div>


													</span>
													<!--end::Date-->
													<!--begin::Date-->

													<!--end::Date-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Author-->
										  </div>
										  <!--end::Card header-->
										  <!--begin::Card body-->
										  <div class="card-body h-400px">
											<!--begin::Post content-->
											<p class=" placeholder-glow">
												<span class="placeholder col-12 h-100 rounded"></span>
											</p>
											<!--end::Post content-->

											<!--begin::Post media-->
											<div id="" class="row g-7 h-250px">

												<!--end::Col-->
											</div>

											<!--end::Post media-->
										  </div>
										  <!--begin::Card footer-->
										  <div class="card-footer pt-0">
											<!--begin::Info-->
											<div class="mb-6">
												<!--begin::Separator-->
												<div class="separator separator-solid"></div>
												<!--end::Separator-->
												<!--begin::Nav-->
												<ul class="nav py-3">
													<!--begin::Item-->
													<li class="nav-item">
														<a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active placeholder-glow" data-bs-toggle="collapse" href="#kt_social_feeds_comments_1">
															<i class="bi bi-chat-square fs-2 me-1"></i>
															<div class="placeholder w-50px placeholder-lg"></div>
														</a>
													</li>
													<!--end::Item-->
													<!--begin::Item-->
													<li class="nav-item">
														<a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-danger fw-bold px-4 me-1 placeholder-glow">
															<i class="bi bi-heart fs-2 me-1"></i>
															<div class="placeholder w-50px  placeholder-lg"></div>
														</a>
													</li>
													<!--end::Item-->
													<!--begin::Item-->
													<li class="nav-item">
														<a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 placeholder-glow">
															<i class="bi bi-arrow-repeat fs-2 me-1"></i>
															<div class="placeholder w-50px placeholder-lg"></div>
														</a>
													</li>
													<!--end::Item-->
													<!--begin::Item-->
													<li class="nav-item">
														<a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 placeholder-glow">
															<i class="bi bi-chat-quote fs-2 me-1"></i>
															<div class="placeholder w-50px placeholder-lg"></div>
														</a>
													</li>
													<!--end::Item-->
												</ul>
												<!--end::Nav-->
												<!--begin::Separator-->
												<div class="separator separator-solid mb-1"></div>
												<!--end::Separator-->

											</div>
											<!--end::Info-->
										  </div>
									     	<!--end::Card footer-->
									       </div>
									       <!--end::placeholder card-->
										';
										}

										?>
									</div>
									<!--end::More posts-->
								</div>
								<!--end::Posts-->





							</div>
							<!--end::Content-->
						</div>
						<!--end::Social - Feeds-->
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
	const Toast2 = Swal.mixin({
		toast: true,
		position: 'bottom',
		showConfirmButton: false,
		timer: 100000,
		width: '100%',
		timerProgressBar: true,
		background: 'rgba(223, 204, 255, 0.9)',
		customClass: {
			//title: 'loader_content_processor',
		},
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	});

	Toast2.fire({
		icon: 'info',
		iconColor: '#0d6efd',
		title: '?',
	})
	</script>


<script>
	var typed = new Typed("#swal2-title", {
		strings: ["negotiating with Twitter...", "bargaining...", "pleading...", "arguing...", "receiving data..."],
		typeSpeed: 30,
		showCursor: false,
		loop: true,
		shuffle: true,
	});
</script>


	<script>
		$(document).ready(function() {
			$.ajax({
				type: "POST",
				url: "../process/get/tweet_card.php",
				data: {
					user: '<?php echo $member_id ?>'
				},
				success: function(data) {
					$("#placeholderTweet").css('display', 'none');
					Toast2.close();
					$("#activeTweet").html(data);
					setInterval(function() {
						$('a#tweetRef').css('display', '');
					}, 30000);
					//$('#searchBy').KTMenu.createInstances();


				}
			});
		});

		$('a#tweetRef').click(function() {
			$('a#tweetRef').css('display', 'none');
				Toast2.fire({
		icon: 'info',
		iconColor: '#0d6efd',
		title: '?',
	});
			$("#activeTweet").css('display', 'none');
			$("#placeholderTweet").css('display', '');

			$.ajax({
				type: "POST",
				url: "../process/get/tweet_card.php",
				data: {
					user: '<?php echo $member_id ?>'
				},
				success: function(data) {
					$("#placeholderTweet").css('display', 'none');
					Toast2.close();
					$("#activeTweet").html(data);
					$("#activeTweet").css('display', '');
					setInterval(function() {
						$('a#tweetRef').css('display', '');
					}, 30000);

				}
			});

			var typed = new Typed("#swal2-title", {
			strings: ["negotiating with Twitter...", "bargaining...", "pleading...", "arguing...", "receiving data..."],
			typeSpeed: 30,
			showCursor: false,
			loop: true,
			shuffle: true,
		});

		});


	</script>
	<!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php';
//session_destroy();

?>
<!-- pages/social/feeds.html 22:57:06 GMT -->
</html>