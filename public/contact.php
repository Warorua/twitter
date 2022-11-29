<?php
include '../includes/plain_head.php';
?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
							<!--begin::Contact-->
							<div class="card">
								<!--begin::Body-->
								<div class="card-body p-lg-17">
									<!--begin::Row-->
									<div class="row mb-3">
										<!--begin::Col-->
										<div class="col-md-6 pe-lg-10">
											<!--begin::Form-->
											<form action="#" class="form mb-15" method="post" id="kt_contact_form">
												<h1 class="fw-bold text-dark mb-9">Send Us Email</h1>
												<!--begin::Input group-->
												<div class="row mb-5">
													<!--begin::Col-->
													<div class="col-md-6 fv-row">
														<!--begin::Label-->
														<label class="fs-5 fw-semibold mb-2">Name</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" placeholder="" name="name" />
														<!--end::Input-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col-md-6 fv-row">
														<!--end::Label-->
														<label class="fs-5 fw-semibold mb-2">Email</label>
														<!--end::Label-->
														<!--end::Input-->
														<input type="text" class="form-control form-control-solid" placeholder="" name="email" />
														<!--end::Input-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="d-flex flex-column mb-5 fv-row">
													<!--begin::Label-->
													<label class="fs-5 fw-semibold mb-2">Subject</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="" name="subject" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="d-flex flex-column mb-10 fv-row">
													<label class="fs-6 fw-semibold mb-2">Message</label>
													<textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
												</div>
												<!--end::Input group-->
												<!--begin::Submit-->
												<button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
													<!--begin::Indicator label-->
													<span class="indicator-label">Send Feedback</span>
													<!--end::Indicator label-->
													<!--begin::Indicator progress-->
													<span class="indicator-progress">Please wait... 
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													<!--end::Indicator progress-->
												</button>
												<!--end::Submit-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-md-6 ps-lg-10">
											<!--begin::Map-->
											<div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px"></div>
											<!--end::Map-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Row-->
									<div class="row g-5 mb-5 mb-lg-15">
										<!--begin::Col-->
										<div class="col-sm-6 pe-lg-10">
											<!--begin::Phone-->
											<div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
												<!--begin::Icon-->
												<!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
												<!--end::Icon-->
												<!--begin::Subtitle-->
												<h1 class="text-dark fw-bold my-5">Let’s Speak</h1>
												<!--end::Subtitle-->
												<!--begin::Number-->
												<div class="text-gray-700 fw-semibold fs-2">1 (833) 597-7538</div>
												<!--end::Number-->
											</div>
											<!--end::Phone-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-sm-6 ps-lg-10">
											<!--begin::Address-->
											<div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
												<!--begin::Icon-->
												<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
												<span class="svg-icon svg-icon-3tx svg-icon-primary">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
														<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<!--end::Icon-->
												<!--begin::Subtitle-->
												<h1 class="text-dark fw-bold my-5">Our Head Office</h1>
												<!--end::Subtitle-->
												<!--begin::Description-->
												<div class="text-gray-700 fs-3 fw-semibold">Churchill-laan 16 II, 1052 CD, Amsterdam</div>
												<!--end::Description-->
											</div>
											<!--end::Address-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Card-->
									<div class="card mb-4 bg-light text-center">
										<!--begin::Body-->
										<div class="card-body py-12">
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/instagram-2-1.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/github.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/behance.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/pinterest-p.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
											<!--begin::Icon-->
											<a href="#" class="mx-4">
												<img src="../assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-30px my-2" alt="" />
											</a>
											<!--end::Icon-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Contact-->
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

		<!--end::Javascript-->
	</body>
	<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo18/pages/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2022 22:56:59 GMT -->
</html>