<?php
include '../includes/head.php';
$ajax_user_id = $user['t_id'];

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
										<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="overview.php">Overview</a>
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
						<div class="row g-5 g-xxl-8 ">
							<!--begin::Col-->
							<div class="col-xl-6">
								<!--begin::Feeds Widget 1-->


								<?php
								$form_action = '../process/post/tweet.php';
								$form_id = 'tweet_process_09';
								include '../includes/elements/tweet_form.php';
								?>


								<!--end::Feeds Widget 1-->



								<!--begin::Posts-->
								<div class="mb-10">
									<!--begin::Post 1-->
									<!--begin::Card-->




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
													<img src="' . $t_user->getProfileImageUrl() . '" class="" alt="" />
												</div>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Name-->
													<a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">' . $t_user->getName() . '</a>
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








								</div>
								<!--end::Posts-->






















							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-xl-6">
								<!--begin::Charts Widget 1-->
								<div class="card mb-5 mb-xxl-8">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Profile Details</h3>
										</div>
										<!--end::Card title-->
										<!--begin::Action-->
										<a href="settings.php" class="btn btn-primary align-self-center">Edit Profile</a>
										<!--end::Action-->
									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										<!--begin::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800"><?php echo $user_fullname ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Company</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?php echo $user_company ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Contact Phone
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 d-flex align-items-center">
												<span class="fw-bold fs-6 text-gray-800 me-2"><?php echo $user_contact ?></span>
												<?php echo $user_contact_verify ?>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Gas Points</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary"><?php echo number_format(safeDecrypt($user['p_value'], $user['p_key'])) ?></a>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Country
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800"><?php echo $user_country ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Communication</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800"><?php echo $user_communication ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-10">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
											<!--begin::Label-->
											<!--begin::Label-->
											<div class="col-lg-8">
												<span class="fw-semibold fs-6 text-gray-800">Yes</span>
											</div>
											<!--begin::Label-->
										</div>
										<!--end::Input group-->
										<!--begin::Notice-->
										<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
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
													<div class="fs-6 text-gray-700">Mass tweet liking is limited to 100 auto-likes per tweet as per the Twitter API limitation.
														<a class="fw-bold" href="https://twittercommunity.com/t/liking-users-and-retweeters-limits/156711" target="_blank">Read more</a>
													</div>
												</div>
												<!--end::Content-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Notice-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Charts Widget 1-->
								<!--begin::Stats widget widget 2-->
								<div class="card card-flush mb-5 mb-xxl-8">
									<!--begin::Header-->
									<div class="card-header pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold text-dark">Account usage</span>
											<span class="text-muted mt-1 fw-semibold fs-7">Limit monitoring panel</span>
										</h3>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body">
										<!--begin::Chart-->
										<div class="card card-bordered">
											<div class="card-body">
												<div id="kt_amcharts_5" style="height: 500px;"></div>
											</div>
										</div>
										<!--end::Chart-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Stats widget widget 2-->
								<?php
								$profile_stats = $user_metrics;
								//$profile_stats = user_metrics('1462050191662538757');

								include '../includes/elements/profile_stats.php';


								?>
								<?php
								$following_list_data = get_following($user['t_id']);
								//$follower_list_data = get_followers('1462050191662538757');

								include '../includes/elements/following_list.php';


								?>

								<?php
								$follower_list_data = get_followers($user['t_id']);
								//$follower_list_data = get_followers('1462050191662538757');


								include '../includes/elements/follower_list.php';


								?>
								<!--begin::End sidebar-->
								<div class="d-lg-flex flex-column flex-lg-row-auto col-10" data-kt-drawer="true" data-kt-drawer-name="end-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_social_end_sidebar_toggle">



									<!--begin::Social widget 2-->
									<div class="card card-flush mb-5 mb-xxl-8">
										<!--begin::Header-->
										<div class="card-header pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-dark">Trending Feeds</span>
												<span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
											</h3>
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<a href="activity.html" class="btn btn-sm btn-light">View All</a>
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Row-->
											<div class="row g-3 g-lg-6">
												<!--begin::Col-->
												<div class="col-md-6">
													<!--begin::Img-->
													<a href="#">
														<img src="../assets/media/stock/600x600/img-33.jpg" class="rounded w-100" alt="" />
													</a>
													<!--end::Img-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6">
													<!--begin::Img-->
													<a href="#">
														<img src="../assets/media/stock/600x600/img-26.jpg" class="rounded w-100" alt="" />
													</a>
													<!--end::Img-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6">
													<!--begin::Img-->
													<a href="#">
														<img src="../assets/media/stock/600x600/img-25.jpg" class="rounded w-100" alt="" />
													</a>
													<!--end::Img-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6">
													<!--begin::Img-->
													<a href="#">
														<img src="../assets/media/stock/600x600/img-35.jpg" class="rounded w-100" alt="" />
													</a>
													<!--end::Img-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Social widget 2-->
								</div>
								<!--end::End sidebar-->
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
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toastr-bottom-full-width",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "25000",
			"hideDuration": "25000",
			"timeOut": "25000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		toastr.info("?");
	</script>

	<script>
		var typed = new Typed(".toastr-message", {
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
					user: '<?php echo $user['t_id'] ?>'
				},
				success: function(data) {
					$("#placeholderTweet").css('display', 'none');
					toastr.clear();
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
			toastr.info("?");
			$("#activeTweet").css('display', 'none');
			$("#placeholderTweet").css('display', '');

			$.ajax({
				type: "POST",
				url: "../process/get/tweet_card.php",
				data: {
					user: '<?php echo $user['t_id'] ?>'
				},
				success: function(data) {
					$("#placeholderTweet").css('display', 'none');
					toastr.clear();
					$("#activeTweet").html(data);
					$("#activeTweet").css('display', '');
					setInterval(function() {
						$('a#tweetRef').css('display', '');
					}, 30000);

				}
			});

			var typed = new Typed(".toastr-message", {
				strings: ["negotiating with Twitter...", "bargaining...", "pleading...", "arguing...", "receiving data..."],
				typeSpeed: 30,
				showCursor: false,
				loop: true,
				shuffle: true,
			});

		});
	</script>
	<script>
		$(document).on('submit', '#<?php echo $form_id ?>', function(e) {
			e.preventDefault();

			formData = new FormData(this);
			//formData.append('avatar', $('#upload_file_fr').files);


			$.ajax({
				method: "POST",
				url: "<?php echo $form_action ?>",
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

<!-- account/overview.php 22:56:11 GMT -->
<?php include '../includes/alert.php';
//session_destroy();

?>

</html>