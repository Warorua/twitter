<?php
if (!isset($_GET['code']) or !isset($_GET['user'])) {
	$_SESSION['error'] = 'Invalid action!';
	header('location: https://tweetbot.site/v2/login');
	exit();
}

include '../includes/plain_head.php';
?>
<!--begin::Body-->

<body id="kt_body" class="app-blank">
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
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVW2LQ2" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!--End::Google Tag Manager (noscript) -->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - New password -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Logo-->
			<a href="../account/user" class="d-block d-lg-none mx-auto py-20">
				<img alt="Logo" src="../assets/media/svg/brand-logos/twitter.svg" class="theme-light-show h-25px" />
				<img alt="Logo" src="../assets/media/svg/brand-logos/twitter_2.svg" class="theme-dark-show h-25px" />
			</a>
			<!--end::Logo-->
			<!--begin::Aside-->
			<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
				<!--begin::Wrapper-->
				<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
					<!--begin::Header-->
					<div class="d-flex flex-stack py-2">
						<!--begin::Back link-->
						<div class="me-2">
							<a href="login" class="btn btn-icon bg-light rounded-circle">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr002.svg-->
								<span class="svg-icon svg-icon-2 svg-icon-gray-800">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor" />
										<path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</a>
						</div>
						<!--end::Back link-->
						<!--begin::Sign Up link-->
						<div class="m-0">
							<span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="new-password-head-desc">Already a member ?</span>
							<a href="login" class="link-primary fw-bold fs-5" data-kt-translate="new-password-head-link">Sign In</a>
						</div>
						<!--end::Sign Up link=-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="py-20">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_new_password_form" action="password_new.php?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>" method="POST">
							<!--begin::Heading-->
							<div class="text-start mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3 fs-3x" data-kt-translate="new-password-title">Setup New Password</h1>
								<!--end::Title-->
								<!--begin::Text-->
								<div class="text-gray-400 fw-semibold fs-6" data-kt-translate="new-password-desc">Have you already reset the password ?</div>
								<!--end::Link-->
							</div>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" data-kt-translate="new-password-input-password" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted" data-kt-translate="new-password-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group=-->
							<div class="fv-row mb-10">
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm Password" name="repassword" autocomplete="off" data-kt-translate="new-password-confirm-password" />
							</div>
							<!--end::Input group=-->
							<!--begin::Actions-->
							<div class="d-flex flex-stack">
								<!--begin::Link-->
								<input name="reset" type="hidden" value="" />
								<button type="submit" class="btn btn-primary" data-kt-translate="new-password-submit">
									<!--begin::Indicator label-->
									<span class="indicator-label">Submit</span>
									<!--end::Indicator label-->
									<!--begin::Indicator progress-->
									<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									<!--end::Indicator progress-->
								</button>
								<!--end::Link-->
								<!--begin::Social-->
								<div class="d-flex align-items-center">
									<div class="text-gray-400 fw-semibold fs-6 me-6" data-kt-translate="general-or">Or</div>
									<!--begin::Symbol-->
									<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
										<img alt="Logo" src="../assets/media/svg/brand-logos/google-icon.svg" class="p-4" />
									</a>
									<!--end::Symbol-->
									<!--begin::Symbol-->
									<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
										<img alt="Logo" src="../assets/media/svg/brand-logos/facebook-3.svg" class="p-4" />
									</a>
									<!--end::Symbol-->
									<!--begin::Symbol-->
									<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
										<img alt="Logo" src="../assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show p-4" />
										<img alt="Logo" src="../assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show p-4" />
									</a>
									<!--end::Symbol-->
								</div>
								<!--end::Social-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Body-->
					<!--begin::Footer-->
					<div class="m-0">
						<!--begin::Toggle-->
						<button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
							<img data-kt-element="current-lang-flag" class="w-25px h-25px rounded-circle me-3" src="../assets/media/flags/united-states.svg" alt="" />
							<span data-kt-element="current-lang-name" class="me-2">English</span>
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
							<span class="svg-icon svg-icon-3 svg-icon-muted rotate-180 m-0">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Toggle-->
						<!--begin::Menu-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4" data-kt-menu="true" id="kt_auth_lang_menu">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
									<span class="symbol symbol-20px me-4">
										<img data-kt-element="lang-flag" class="rounded-1" src="../assets/media/flags/united-states.svg" alt="" />
									</span>
									<span data-kt-element="lang-name">English</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link d-flex px-5" data-kt-lang="Swahili">
									<span class="symbol symbol-20px me-4">
										<img data-kt-element="lang-flag" class="rounded-1" src="../assets/media/flags/kenya.svg" alt="" />
									</span>
									<span data-kt-element="lang-name">Swahili</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
									<span class="symbol symbol-20px me-4">
										<img data-kt-element="lang-flag" class="rounded-1" src="../assets/media/flags/spain.svg" alt="" />
									</span>
									<span data-kt-element="lang-name">Spanish</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
									<span class="symbol symbol-20px me-4">
										<img data-kt-element="lang-flag" class="rounded-1" src="../assets/media/flags/germany.svg" alt="" />
									</span>
									<span data-kt-element="lang-name">German</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
									<span class="symbol symbol-20px me-4">
										<img data-kt-element="lang-flag" class="rounded-1" src="../assets/media/flags/japan.svg" alt="" />
									</span>
									<span data-kt-element="lang-name">Japanese</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
									<span class="symbol symbol-20px me-4">
										<img data-kt-element="lang-flag" class="rounded-1" src="../assets/media/flags/france.svg" alt="" />
									</span>
									<span data-kt-element="lang-name">French</span>
								</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Aside-->
			<!--begin::Body-->
			<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url(../assets/media/auth/bg11.png)"></div>
			<!--begin::Body-->
		</div>
		<!--end::Authentication - New password-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "../assets/index.html";
	</script>
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="../assets/plugins/global/plugins.bundle.js"></script>
	<script src="../assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Custom Javascript(used by this page)-->
	<script src="../assets/js/custom/authentication/password-reset/new-password.html"></script>
	<script src="../assets/js/custom/authentication/sign-in/i18n.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php' ?>
<!-- authentication/layouts/fancy/new-password.html 22:56:36 GMT -->

</html>