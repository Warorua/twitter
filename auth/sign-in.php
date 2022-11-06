<?php
include '../includes/plain_head.php';
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
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
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Logo-->
			<a href="../account/user" class="d-block d-lg-none mx-auto py-20">
				<img alt="Logo" src="../assets/media/logos/logo_full_bold.png" class="theme-light-show h-25px" />
				<img alt="Logo" src="../assets/media/logos/logo_full_bold.png" class="theme-dark-show h-25px" />
			</a>
			<!--end::Logo-->
			<!--begin::Aside-->
			<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
				<!--begin::Wrapper-->
				<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
					<!--begin::Header-->
					<div class="d-flex flex-stack py-2">
						<!--begin::Back link-->
						<div class="me-2"></div>
						<!--end::Back link-->
						<!--begin::Sign Up link-->
						<div class="m-0">
							<span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-in-head-desc">Not a Member yet?</span>
							<a href="new" class="link-primary fw-bold fs-5" data-kt-translate="sign-in-head-link">Sign Up</a>
						</div>
						<!--end::Sign Up link=-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="py-20">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="verify.php" method="POST">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Heading-->
								<div class="text-start mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Sign In</h1>
									<!--end::Title-->
									<!--begin::Text-->
									<div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Use Twitter to sign in or sign up</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
							
								<!--begin::Actions-->
								<div class="d-flex flex-stack">
									<!--begin::Social-->
									<div class="d-flex align-items-center">
										
										<!--begin::Symbol-->
										<?php
										$tw_url = $parent_url . '/auth/sign-in.php';
										include './tww/tw_2.php' ?>


										<a href="<?php echo $url ?>" class="btn btn-secondary w-100">
											<img alt="Logo" src="../assets/media/svg/brand-logos/twitter_2.svg" /> Sign In
										</a>
										<!--end::Symbol-->
									</div>
									<!--end::Social-->
								</div>
								<!--end::Actions-->
							</div>
							<!--begin::Body-->
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
		<!--end::Authentication - Sign-in-->
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
	<script src="../assets/js/custom/authentication/sign-in/general.js"></script>
	<script src="../assets/js/custom/authentication/sign-in/i18n.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->

</body>
<!--end::Body-->
<?php include '../includes/alert.php' ?>
<!-- authentication/layouts/fancy/login 22:56:35 GMT -->

</html>