<?php
include '../includes/conn.php';
if(!isset($_SESSION['id_twoAuth'])){
	header('location:./sign-in.php');
}else{
	$conn = $pdo->open();
	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['id_twoAuth']]);
	$row = $stmt->fetch();
	if($row['two_auth'] == 2){
		//generate code
$set='123456789';
$code=substr(str_shuffle($set), 0, 6);

$_SESSION['mail_authCode'] = $code;
$recipient = preg_replace('/[)(\@\.\;\" "-]+/', '', $row['two_auth_secret']);
$message = 'Faraji%20Properties%202-Factor%20authentication%20code:%20'.$code;
file_get_contents('https://sms.movesms.co.ke/api/compose?username=Warorua&api_key=xuRR0BocoCM5Egxxqbxf2mrLUPbW7YicL4NXJExFNcBdtZHSkn&sender=SMARTLINK&to='.$recipient.'&message='.$message.'&msgtype=5&dlr=0');
$dip_n = '*****'.substr($recipient ,8, 5);

	}else{
		$dip_txt = '';
		$dip_n = 'your Authenticator.';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	
<!-- authentication/layouts/fancy/two-steps.html 22:56:35 GMT -->
<!--  --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- / -->
<head>
		<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular & Laravel by Keenthemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
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
			<!--begin::Authentication - Two-stes -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Logo-->
				<a href="../index-2.html" class="d-block d-lg-none mx-auto py-20">
					<img alt="Logo" src="../assets/media/logos/default.svg" class="theme-light-show h-25px" />
					<img alt="Logo" src="../assets/media/logos/default-dark.svg" class="theme-dark-show h-25px" />
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
								<a href="sign-in.php" class="btn btn-icon bg-light rounded-circle">
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
							<!--begin::Further link-->
							<div class="m-0">
								<span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="two-step-head-desc">Didn’t get the code ?</span>
								<a href="sign-in.php" class="link-primary fw-bold fs-5" data-kt-translate="two-step-head-resend">Resend</a>
								<span class="text-gray-400 fw-bold fs-5 mx-1" data-kt-translate="two-step-head-or">or</span>
								<a href="#" class="link-primary fw-bold fs-5" data-kt-translate="two-step-head-call-us">Call Us</a>
							</div>
							<!--end::Further link=-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="py-20">
							<!--begin::Form-->
							<form class="form w-100 mb-10" novalidate="novalidate" id="kt_sing_in_two_steps_form" method="POST" action="./two_auth_process.php">
								<!--begin::Icon-->
								<div class="text-center mb-10">
									<img alt="Logo" class="theme-light-show mh-125px" src="../assets/media/svg/misc/smartphone-2.svg" />
									<img alt="Logo" class="theme-dark-show mh-125px" src="../assets/media/svg/misc/smartphone-2-dark.svg" />
								</div>
								<!--end::Icon-->
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3" data-kt-translate="two-step-title">Two Step Verification</h1>
									<!--end::Title-->
									<!--begin::Sub-title-->
									<div class="text-muted fw-semibold fs-5 mb-5" data-kt-translate="two-step-deck">Enter the verification code we sent to</div>
									<!--end::Sub-title-->
									<!--begin::Mobile no-->
									<div class="fw-bold text-dark fs-3"><?php echo $dip_n ?></div>
									<!--end::Mobile no-->
								</div>
								<!--end::Heading-->
								<!--begin::Section-->
								<div class="mb-10">
									<!--begin::Label-->
									<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1" data-kt-translate="two-step-label">Type your 6 digit security code</div>
									<!--end::Label-->
									<!--begin::Input group-->
									<div class="d-flex flex-wrap flex-stack">
										<input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" required/>
										<input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value=""  required/>
										<input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value=""  required/>
										<input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value=""  required/>
										<input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value=""  required/>
										<input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value=""  required/>
										<input type="hidden" name="twoAuth" value="" />
									</div>
									<!--begin::Input group-->
								</div>
								<!--end::Section-->
								<!--begin::Actions-->
								<div class="text-center">
									<!--begin::Submit-->
									<button type="submit" class="btn btn-primary" data-kt-translate="two-step-submit">
										<!--begin::Indicator label-->
										<span class="indicator-label">Submit</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
									<!--end::Submit-->
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
			<!--end::Authentication - Two-stes-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "../assets/index.html";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/authentication/sign-in/two-steps.js"></script>
		<script src="../assets/js/custom/authentication/sign-in/i18n.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
	<?php include '../includes/alert.php' ?>
<!-- authentication/layouts/fancy/two-steps.html 22:56:35 GMT -->
</html>