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
			<div id="kt_aside" class="aside px-5" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '285px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
				<!--begin::Aside menu-->
				<?php include '../includes/menu.php' ?>
				<!--end::Aside menu-->
				<!--begin::Footer-->
				<div class="aside-footer flex-column-auto pt-3 pb-7" id="kt_aside_footer">
					<a href="https://preview.keenthemes.com/html/metronic/docs/getting-started" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
						<span class="btn-label">Docs & Components</span>
						<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
						<span class="svg-icon btn-icon svg-icon-2">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
								<rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
								<rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
								<rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
								<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</a>
				</div>
				<!--end::Footer-->
			</div>
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
						<!--begin::Layout-->
						<div class="d-flex flex-column flex-lg-row">
							<!--begin::Sidebar-->
							<div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
								<!--begin::Contacts-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header pt-7" id="kt_chat_contacts_header">
										<!--begin::Form-->
										<form id="newChat" class="w-100 position-relative" autocomplete="off">
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<!--end::Icon-->
											<!--begin::Input-->
											<div class="input-group mb-5">
												<input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Enter username to send DM..." />
												<button class="btn btn-light-primary hover-scale" id="basic-addon1" type="submit">
													<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
													<span class="svg-icon svg-icon-2x">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor" />
															<path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor" />
														</svg>
													</span>
												</button>
											</div>
											<!--end::Input-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-5" id="kt_chat_contacts_body">
										<!--begin::List-->

										<div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="{default: '100px', lg: '300px'}" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
											<div class="dmPrepend"></div>
											<?php
											$abraham_client->setApiVersion('1.1');
											$data = $abraham_client->get('direct_messages/events/list', [
												"count" => 50,
											]);
											$dt1 = array_convert($data);
											$arr = array();

											foreach ($dt1['events'] as $row) {
												if ($row['message_create']['sender_id'] == $user['t_id']) {
													$messager_id = $row['message_create']['target']['recipient_id'];
													if (in_array($messager_id, $arr) == false) {

														array_push($arr, $messager_id);

														$user_msg = $user_client->getUserById($messager_id);
														$time_now = date('Y-m-d H:i:s');
														$time_then = date("Y-m-d H:i:s", $row['created_timestamp'] / 1000);
														echo '
	          <!--begin::User-->
	              <div onclick="messenger(' . "'" . '' . $messager_id . '' . "'" . ', ' . "'" . '' . $user_msg->getName() . '' . "'" . ', ' . "'" . '' . pic_fix($user_msg->getProfileImageUrl()) . '' . "'" . ', ' . "'" . '' . $user_msg->getUsername() . '' . "'" . ')" class="d-flex flex-stack py-4 hover-scale">
	             	 <!--begin::Details-->
	                	<div class="d-flex align-items-center">
		             	<!--begin::Avatar-->
			           <div class="symbol symbol-45px symbol-circle">
			        	<img alt="Pic" src="' . pic_fix($user_msg->getProfileImageUrl()) . '" />
			         </div>
			         <!--end::Avatar-->
			         <!--begin::Details-->
			         <div class="ms-5">
			        	<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">' . $user_msg->getName() . '</a>
				    <div class="fw-semibold text-muted">' . $user_msg->getUsername() . '</div>
			     </div>
			     <!--end::Details-->
		          </div>
		                <!--end::Details-->
		          <!--begin::Lat seen-->
		                <div class="d-flex flex-column align-items-end ms-2">
			             <span class="text-muted fs-7 mb-1">' . timeDiff($time_then, $time_now) . '</span>
	 	           </div>
	          	<!--end::Lat seen-->
	            </div>
	            <!--end::User-->
				<!--begin::Separator-->
				<div class="separator separator-dashed d-none"></div>
				<!--end::Separator-->
	        ';
													}
												} elseif ($row['message_create']['target']['recipient_id']  == $user['t_id']) {
													$messager_id = $row['message_create']['sender_id'];
													if (in_array($messager_id, $arr) == false) {

														array_push($arr, $messager_id);

														$user_msg = $user_client->getUserById($messager_id);
														$time_now = date('Y-m-d H:i:s');
														$time_then = date("Y-m-d H:i:s", $row['created_timestamp'] / 1000);
														echo '
	          <!--begin::User-->
	              <div onclick="messenger(' . "'" . '' . $messager_id . '' . "'" . ', ' . "'" . '' . $user_msg->getName() . '' . "'" . ', ' . "'" . '' . pic_fix($user_msg->getProfileImageUrl()) . '' . "'" . ', ' . "'" . '' . $user_msg->getUsername() . '' . "'" . ')" class="d-flex flex-stack py-4 hover-scale">
	             	 <!--begin::Details-->
	                	<div class="d-flex align-items-center">
		             	<!--begin::Avatar-->
			           <div class="symbol symbol-45px symbol-circle">
			        	<img alt="Pic" src="' . pic_fix($user_msg->getProfileImageUrl()) . '" />
			         </div>
			         <!--end::Avatar-->
			         <!--begin::Details-->
			         <div class="ms-5">
			        	<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">' . $user_msg->getName() . '</a>
				    <div class="fw-semibold text-muted">' . $user_msg->getUsername() . '</div>
			     </div>
			   <!--end::Details-->
		          </div>
		                <!--end::Details-->
		          <!--begin::Lat seen-->
		                <div class="d-flex flex-column align-items-end ms-2">
			             <span class="text-muted fs-7 mb-1">' . timeDiff($time_then, $time_now) . '</span>
	 	           </div>
	          	<!--end::Lat seen-->
	            </div>
	                 <!--end::User-->
				<!--begin::Separator-->
				<div class="separator separator-dashed d-none"></div>
				<!--end::Separator-->
	        ';
													}
													$_SESSION['myarr'] = $arr;
												}
											}
											?>
										</div>
										<!--end::List-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Contacts-->
							</div>
							<!--end::Sidebar-->
							<!--begin::Content-->
							<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
								<!--begin::Messenger-->
								<div class="card" id="kt_chat_messenger">
									<!--begin::Card header-->
									<div class="card-header" id="kt_chat_messenger_header">
										<!--begin::Title-->
										<div class="card-title">
											<!--begin::User-->
											<div class="d-flex justify-content-center flex-column me-3">
												<a kt_msg_name="msgName" href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Choose account to get started</a>
												<!--begin::Info-->
												<div class="mb-0 lh-1">
													<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
													<span kt_msg_username="msgUserName" class="fs-7 fw-semibold text-muted">Active</span>
												</div>
												<!--end::Info-->
											</div>
											<!--end::User-->
										</div>
										<!--end::Title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Menu-->
											<div class="me-n3">
												<button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
													<i class="bi bi-three-dots fs-2"></i>
												</button>
												<!--begin::Menu 3-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
													<!--begin::Heading-->
													<div class="menu-item px-3">
														<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
													</div>
													<!--end::Heading-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a contact email to send an invitation"></i></a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
														<a href="#" class="menu-link px-3">
															<span class="menu-title">Groups</span>
															<span class="menu-arrow"></span>
														</a>
														<!--begin::Menu sub-->
														<div class="menu-sub menu-sub-dropdown w-175px py-4">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Create Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Invite Members</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu sub-->
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3 my-1">
														<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 3-->
											</div>
											<!--end::Menu-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body h-75" id="kt_chat_messenger_body">
										<!--begin::Messages-->
										<div class="scroll-y me-n5 pe-5 h-500px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="{default: '100px', lg: '300px'}" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">

											<div class="userChatsHolder">
												<!--begin::Message(in)-->
												<div kt_msg_holder="1" class="d-flex justify-content-start mb-10">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column align-items-start">
														<!--begin::User-->
														<div class="d-flex align-items-center mb-2">
															<!--begin::Avatar-->
															<div class="symbol symbol-35px symbol-circle">
																<img alt="Pic" src="../assets/media/svg/brand-logos/twitter.svg" />
															</div>
															<!--end::Avatar-->
															<!--begin::Details-->
															<div class="ms-3">
																<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1"></a>
																<span class="text-muted fs-7 mb-1"></span>
															</div>
															<!--end::Details-->
														</div>
														<!--end::User-->
														<!--begin::Text-->
														<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">
															<img class="rounded w-100" src="../assets/media/illustrations/sigma-1/2.png" />
														</div>
														<!--end::Text-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Message(in)-->
											</div>

											<div class="userChats"></div>







											<!--begin::Message(template for out)-->
											<div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
												<!--begin::Wrapper-->
												<div class="d-flex flex-column align-items-end">
													<!--begin::User-->
													<div class="d-flex align-items-center mb-2">
														<!--begin::Details-->
														<div class="me-3">
															<span class="text-muted fs-7 mb-1">Just now</span>
															<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
														</div>
														<!--end::Details-->
														<!--begin::Avatar-->
														<div class="symbol symbol-35px symbol-circle">
															<img alt="Pic" src="../assets/media/avatars/300-1.jpg" />
														</div>
														<!--end::Avatar-->
													</div>
													<!--end::User-->
													<!--begin::Text-->
													<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text"></div>
													<!--end::Text-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Message(template for out)-->
											<!--begin::Message(template for in)-->
											<div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
												<!--begin::Wrapper-->
												<div class="d-flex flex-column align-items-start">
													<!--begin::User-->
													<div class="d-flex align-items-center mb-2">
														<!--begin::Avatar-->
														<div class="symbol symbol-35px symbol-circle">
															<img alt="Pic" src="../assets/media/avatars/300-25.jpg" />
														</div>
														<!--end::Avatar-->
														<!--begin::Details-->
														<div class="ms-3">
															<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
															<span class="text-muted fs-7 mb-1">Just now</span>
														</div>
														<!--end::Details-->
													</div>
													<!--end::User-->
													<!--begin::Text-->
													<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Big Deal for you.</div>
													<!--end::Text-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Message(template for in)-->



										</div>
										<!--end::Messages-->
									</div>
									<!--end::Card body-->
									<!--begin::Card footer-->
									<div class="card-footer pt-4" id="kt_chat_messenger_footer">
										<form class="chatTool">
											<!--begin:Toolbar-->
											<div class="row mt-3">
												<!--begin::Actions-->
												<div class="d-flex align-items-center me-2 col-md-7">
													<!--begin::Form-->
													<div style="width:100%;" class="ql-quil ql-quil-plain pb-3">
														<!--begin::Editor-->
														<input name="about" type="hidden">
														<div data-kt-element="input" class="py-6 kt_docs_quill_basic"></div>
														<!--end::Editor-->
														<div class="separator"></div>
													</div>
													<!--end::Form-->
												</div>
												<!--end::Actions-->
												<!--begin::Send-->
												<div class="col-md-4 mt-5">
													<button class="btn btn-primary w-100" type="submit" data-kt-element="send">Send</button>

												</div>
												<!--end::Send-->
											</div>
											<!--end::Toolbar-->
										</form>
									</div>
									<!--end::Card footer-->
								</div>
								<!--end::Messenger-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Layout-->
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
	<!--begin::Activities drawer-->
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
		var quill = new Quill('.kt_docs_quill_basic', {
			modules: {
				toolbar: [
					['bold', 'italic', 'underline', 'strike'],
					['image', 'link'],
					[{
						'direction': 'rtl'
					}],
					['clean']
				]
			},
			placeholder: 'Type your text here...',
			theme: 'snow' // or 'bubble'
		});



		////chat api
		$(document).on('submit', '.chatTool', function(e) {
			e.preventDefault();

			formData = new FormData(this);

			var about = document.querySelector('input[name=about]');

			about.value = JSON.stringify(quill.getContents());

			$.ajax({
				method: "POST",
				url: "../process/post/send_message.php",
				data: {
					message: about.value
				},
				success: function(data) {
					window.location.reload();

				}
			});
		});

		////dm new user
		$(document).on('submit', '#newChat', function(e) {
			e.preventDefault();
			// alert('senttt');
			formData = new FormData(this);

			$.ajax({
				method: "POST",
				url: "../process/get/new_dm.php",
				data: formData,
				processData: false, // tell jQuery not to process the data
				contentType: false, // tell jQuery not to set contentType
				enctype: 'multipart/form-data',

				success: function(data) {
					$('button[type="submit"]').text("Send new");
					if (data == '404') {
						alert('Account username not found');
					} else if (data == '403') {
						alert('Enter username to process');
					} else {
						$('.dmPrepend').html(data);

					}
					//window.location.reload();
					//alert(data);

				}
			});
		});
	</script>
	<!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php';
//session_destroy();

?>
<!-- apps/chat/private.html 23:02:14 GMT -->

</html>