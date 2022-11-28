<?php
include '../includes/plain_head.php';
if (isset($_GET['error'])) {
	$message = urldecode($_GET['error']);
} else {
	$message = 'Too Many Requests! Please wait then try again later.';
}
?>
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
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
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDKZXTL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!--End::Google Tag Manager (noscript) -->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page bg image-->
		<!--end::Page bg image-->
		<!--begin::Authentication - Signup Welcome Message -->
		<div class="d-flex flex-column flex-center flex-column-fluid">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center text-center p-10">
				<!--begin::Wrapper-->
				<div class="card card-flush w-lg-650px py-5">
					<div class="card-body py-15 py-lg-20">
						<!--begin::Title-->
						<h1 class="fw-bolder fs-2qx text-gray-900 mb-4">System Error</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="fw-semibold fs-6 text-gray-500 mb-7"><?php echo $message ?></div>
						<!--end::Text-->
						<!--begin::Illustration-->
						<div class="mb-11">
							<img src="../assets/media/illustrations/sigma-1/magnifying.svg" class="mw-100 mh-300px theme-light-show" alt="" />
							<img src="../assets/media/illustrations/sigma-1/magnifying.svg" class="mw-100 mh-300px theme-dark-show" alt="" />
						</div>
						<!--end::Illustration-->
						<!--begin::Link-->
						<div class="mb-5">
							<a href="../account/user" class="btn btn-sm btn-primary">Return Home</a>
						</div>
						<!--end::Link-->
						<!--begin::Link-->
						<div class="mb-5">
							<a href="https://kotnova.com/account/logout#" class="btn btn-sm btn-primary">Logout</a>
						</div>
						<!--end::Link-->
						<div class="mb-2">
							<?php
							if (strpos($message, "401 Unauthorized") !== false) {
								if (isset($_SESSION['user_id'])) {
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
									$stmt->execute(['id' => $_SESSION['user_id']]);
									$user = $stmt->fetch();

									$stmt = $conn->prepare("SELECT * FROM client_api WHERE user_id=:user_id AND status=:status");
									$stmt->execute(['user_id' => $user['id'], 'status' => 1]);
									$api_app_2 = $stmt->fetch();
							?>
									<a onclick="appDelete(<?php echo $api_app_2['id'] ?>)" class="btn btn-bg-light btn-active-color-danger btn-sm">
										<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
										<span class="svg-icon svg-icon-2x">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
												<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
												<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
											</svg>
											Unsubscribe from Active App
										</span>
										<!--end::Svg Icon-->
									</a>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Authentication - Signup Welcome Message-->
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
	<script>
		var app_id2;

		function appDelete(app_id2) {

			//*
			if (app_id2 == 'NO') {
				Swal.fire('This app cannot be deleted!', '', 'error');
			} else if (app_id2 == 'NO_2') {
				Swal.fire('First deactivate this app to delete.', '', 'error');
			} else if (app_id2 == 'NO_3') {
				Swal.fire('Unlist this app first to delete.', '', 'error');
			} else {
				Swal.fire({
					icon: 'question',
					title: 'API App Removal',
					text: 'Are you sure you want to delete this app?',
					confirmButtonText: 'Yes, delete',
					footer: '<a href="">Why do I have this issue?</a>'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							type: "POST",
							url: "../process/post/app_delete.php",
							data: {
								user: '<?php echo $user['id'] ?>',
								id: app_id2
							},
							success: function(arr) {
								var status;
								data = $.parseJSON(arr);
								if (data[0] == 'success') {
									Swal.fire(data[1], '', data[0])
									setTimeout(function() {
										window.location.reload();
									}, 2000);

								} else {
									status = data[0];
									data[0] = 'error';
									Swal.fire(status, '', data[0]);
								}

							}
						});

					} else if (result.isDenied) {
						Swal.fire('Changes are not saved', '', 'info')
					}
				})
			}

			//*/
		};
	</script>
	<!--end::Global Javascript Bundle-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

<!-- authentication/general/error-500.html 22:56:53 GMT -->

</html>