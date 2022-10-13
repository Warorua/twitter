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

$followers = $bird_elephant->user($member_data['data']['username'])->followers([
	'max_results' => 1000,
	'user.fields' => 'location,created_at,public_metrics,url,profile_image_url,verified',
]);

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
						<!--begin::Card-->
						<div class="card">
							<!--begin::Card header-->
							<div class="card-header border-0 pt-6">
								<!--begin::Card title-->
								<div class="card-title">
									<!--begin::Search-->
									<div class="d-flex align-items-center position-relative my-1">
										<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
										<span class="svg-icon svg-icon-1 position-absolute ms-6">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
												<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
									</div>
									<!--end::Search-->
								</div>
								<!--begin::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Toolbar-->
									<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
										<!--begin::Filter-->
										<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->Filter
										</button>
										<!--begin::Menu 1-->
										<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
											<!--begin::Header-->
											<div class="px-7 py-5">
												<div class="fs-5 text-dark fw-bold">Filter Options</div>
											</div>
											<!--end::Header-->
											<!--begin::Separator-->
											<div class="separator border-gray-200"></div>
											<!--end::Separator-->
											<!--begin::Content-->
											<div class="px-7 py-5" data-kt-user-table-filter="form">
												<!--begin::Input group-->
												<div class="mb-10">
													<label class="form-label fs-6 fw-semibold">Role:</label>
													<select name="verification" data-control="select2" data-placeholder="Select verification" data-hide-search="true" class="form-select form-select-solid fw-bold">
														<option></option>
														<option value="Verified">Verified</option>
														<option value="Unverified">Unverified</option>
													</select>
												</div>
												<!--end::Input group-->

												<!--begin::Actions-->
												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
													<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
												</div>
												<!--end::Actions-->
											</div>
											<!--end::Content-->
										</div>
										<!--end::Menu 1-->
										<!--end::Filter-->
										<!--begin::Export-->
										<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
													<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
													<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->Export
										</button>
										<!--end::Export-->
										<!--begin::Add user-->
										<a href="../public/following.php?user=<?php echo $member_id ?>" type="button" class="btn btn-primary">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
													<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->Following
										</a>
										<!--end::Add user-->
									</div>
									<!--end::Toolbar-->
									<!--begin::Group actions-->
									<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
										<div class="fw-bold me-5">
											<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
										</div>
										<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Hide Selected</button>
									</div>
									<!--end::Group actions-->
									<!--begin::Modal - Adjust Balance-->
									<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header">
													<!--begin::Modal title-->
													<h2 class="fw-bold">Export Users</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
													<!--begin::Form-->
													<form id="kt_modal_export_users_form" class="form" action="#">
														<!--begin::Input group-->
														<div class="fv-row mb-10">
															<!--begin::Label-->
															<label class="fs-6 fw-semibold form-label mb-2">Select Verification:</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="verification" data-control="select2" data-placeholder="Select verification" data-hide-search="true" class="form-select form-select-solid fw-bold">
																<option></option>
																<option value="Verified">Verified</option>
																<option value="Unverified">Unverified</option>
															</select>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-10">
															<!--begin::Label-->
															<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
																<option></option>
																<option value="excel">Excel</option>
																<option value="pdf">PDF</option>
																<option value="cvs">CVS</option>
																<option value="zip">ZIP</option>
															</select>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="text-center">
															<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
															<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																<span class="indicator-label">Submit</span>
																<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
															</button>
														</div>
														<!--end::Actions-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Modal body-->
											</div>
											<!--end::Modal content-->
										</div>
										<!--end::Modal dialog-->
									</div>
									<!--end::Modal - New Card-->
									<!--begin::Modal - Add task-->
									<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_add_user_header">
													<!--begin::Modal title-->
													<h2 class="fw-bold">Add User</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
													<!--begin::Form-->
													<form id="kt_modal_add_user_form" class="form" action="#">
														<!--begin::Scroll-->
														<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
																<!--end::Label-->
																<!--begin::Image placeholder-->
																<style>
																	.image-input-placeholder {
																		background-image: url('../assets/media/svg/files/blank-image.svg');
																	}

																	[data-theme="dark"] .image-input-placeholder {
																		background-image: url('../assets/media/svg/files/blank-image-dark.svg');
																	}
																</style>
																<!--end::Image placeholder-->
																<!--begin::Image input-->
																<div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
																	<!--begin::Preview existing avatar-->
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(../assets/media/avatars/300-6.jpg);"></div>
																	<!--end::Preview existing avatar-->
																	<!--begin::Label-->
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<!--begin::Inputs-->
																		<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																		<input type="hidden" name="avatar_remove" />
																		<!--end::Inputs-->
																	</label>
																	<!--end::Label-->
																	<!--begin::Cancel-->
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<!--end::Cancel-->
																	<!--begin::Remove-->
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<!--end::Remove-->
																</div>
																<!--end::Image input-->
																<!--begin::Hint-->
																<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
																<!--end::Hint-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-semibold fs-6 mb-2">Full Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-semibold fs-6 mb-2">Email</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="mb-7">
																<!--begin::Label-->
																<label class="required fw-semibold fs-6 mb-5">Role</label>
																<!--end::Label-->
																<!--begin::Verification-->
																<!--begin::Input row-->
																<div class="d-flex fv-row">
																	<!--begin::Radio-->
																	<div class="form-check form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked' />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<label class="form-check-label" for="kt_modal_update_role_option_0">
																			<div class="fw-bold text-gray-800">Administrator</div>
																			<div class="text-gray-600">Best for business owners and company administrators</div>
																		</label>
																		<!--end::Label-->
																	</div>
																	<!--end::Radio-->
																</div>
																<!--end::Input row-->
																<div class='separator separator-dashed my-5'></div>
																<!--begin::Input row-->
																<div class="d-flex fv-row">
																	<!--begin::Radio-->
																	<div class="form-check form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<label class="form-check-label" for="kt_modal_update_role_option_1">
																			<div class="fw-bold text-gray-800">Developer</div>
																			<div class="text-gray-600">Best for developers or people primarily using the API</div>
																		</label>
																		<!--end::Label-->
																	</div>
																	<!--end::Radio-->
																</div>
																<!--end::Input row-->
																<div class='separator separator-dashed my-5'></div>
																<!--begin::Input row-->
																<div class="d-flex fv-row">
																	<!--begin::Radio-->
																	<div class="form-check form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<label class="form-check-label" for="kt_modal_update_role_option_2">
																			<div class="fw-bold text-gray-800">Analyst</div>
																			<div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
																		</label>
																		<!--end::Label-->
																	</div>
																	<!--end::Radio-->
																</div>
																<!--end::Input row-->
																<div class='separator separator-dashed my-5'></div>
																<!--begin::Input row-->
																<div class="d-flex fv-row">
																	<!--begin::Radio-->
																	<div class="form-check form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<label class="form-check-label" for="kt_modal_update_role_option_3">
																			<div class="fw-bold text-gray-800">Support</div>
																			<div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
																		</label>
																		<!--end::Label-->
																	</div>
																	<!--end::Radio-->
																</div>
																<!--end::Input row-->
																<div class='separator separator-dashed my-5'></div>
																<!--begin::Input row-->
																<div class="d-flex fv-row">
																	<!--begin::Radio-->
																	<div class="form-check form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<label class="form-check-label" for="kt_modal_update_role_option_4">
																			<div class="fw-bold text-gray-800">Trial</div>
																			<div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
																		</label>
																		<!--end::Label-->
																	</div>
																	<!--end::Radio-->
																</div>
																<!--end::Input row-->
																<!--end::Verification-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Scroll-->
														<!--begin::Actions-->
														<div class="text-center pt-15">
															<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
															<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																<span class="indicator-label">Submit</span>
																<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
															</button>
														</div>
														<!--end::Actions-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Modal body-->
											</div>
											<!--end::Modal content-->
										</div>
										<!--end::Modal dialog-->
									</div>
									<!--end::Modal - Add task-->
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body py-4">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
									<!--begin::Table head-->
									<thead>
										<!--begin::Table row-->
										<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
											<th class="w-10px pe-2">
												<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
													<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
												</div>
											</th>
											<th class="min-w-125px">User</th>
											<th class="min-w-125px">Location</th>
											<th class="min-w-125px">Twitter ID</th>
											<th class="min-w-125px">Verification</th>
											<th class="min-w-125px">Joined Date</th>
											<th class="text-end min-w-100px">Actions</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-semibold">
										<?php
										$data = array_convert($followers);
										foreach ($data['data'] as $row) {
											if (isset($row['location'])) {
												$location = $row['location'];
											} else {
												$location = 'UNAVAILABLE';
											}
											if ($row['verified']) {
												$verification = '<div class="badge badge-primary fw-bold">Verified</div>';
											} else {
												$verification = '<div class="badge badge-danger fw-bold">Unverified</div>';
											}
											$date_j = timeDiff($row['created_at'], date('c'));
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
											<!--begin::User=-->
											<td class="d-flex align-items-center">
												<!--begin:: Avatar -->
												<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
													<a href="view.html">
														<div class="symbol-label">
															<img src="' . pic_fix($row['profile_image_url']) . '" alt="' . $row['name'] . '" class="w-100" />
														</div>
													</a>
												</div>
												<!--end::Avatar-->
												<!--begin::User details-->
												<div class="d-flex flex-column">
													<a href="view.html" class="text-gray-800 text-hover-primary mb-1">' . $row['name'] . '</a>
													<span>' . $row['username'] . '</span>
												</div>
												<!--begin::User details-->
											</td>
											<!--end::User=-->
											<!--begin::Role=-->
											<td>' . $location . '</td>
											<!--end::Role=-->
											<!--begin::Last login=-->
											<td>
												<div class="badge badge-light fw-bold">' . $row['id'] . '</div>
											</td>
											<!--end::Last login=-->
											<!--begin::Two step=-->
											<td>' . $verification . '</td>
											<!--end::Two step=-->
											<!--begin::Joined-->
											<td>' . $date_j . '</td>
										
											<!--begin::Joined-->
											<!--begin::Action=-->
											<td class="text-end">
												<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
													<span class="svg-icon svg-icon-5 m-0">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="../public/feeds.php?user=' . $row['id'] . '" class="menu-link px-3">View Here</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="https://twitter.com/' . $row['username'] . '" target="_blank" class="menu-link px-3">On Twitter</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
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
						<!--end::Card-->
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
	<?php include '../includes/scripts.php'; ?>

	<!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php'; ?>
<!-- apps/user-management/users/list.html 23:01:31 GMT -->

</html>