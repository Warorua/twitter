<?php
include '../includes/head.php';

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
		<iframe src="https://www.googletagmanager.com/ns.php?id=GTM-MDKZXTL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="user">Overview</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="settings">Settings</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="security">Security</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="billing">Billing</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="statements">Statements</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="referrals">Referrals</a>
									</li>
									<!--end::Nav item-->
									<!--begin::Nav item-->
									<li class="nav-item mt-2">
										<a class="nav-link text-active-primary ms-0 me-10 py-5" href="logs">Logs</a>
									</li>
									<!--end::Nav item-->
								</ul>
								<!--begin::Navs-->
							</div>
						</div>
						<!--end::Navbar-->
						<!--begin::Basic info-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
								<!--begin::Card title-->
								<div class="card-title m-0">
									<h3 class="fw-bold m-0">Profile Details</h3>
								</div>
								<!--end::Card title-->
							</div>
							<!--begin::Card header-->
							<!--begin::Content-->
							<div id="kt_account_settings_profile_details" class="collapse show">
								<!--begin::Form-->
								<form id="kt_account_profile_details_form_fr" class="form" method="POST" enctype="multipart/form-data">
									<!--begin::Card body-->
									<div class="card-body border-top p-9">
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<!--begin::Image input-->
												<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo pic_fix($user['photo']) ?>)"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Label-->
													<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
														<i class="bi bi-pencil-fill fs-7"></i>
														<!--begin::Inputs-->
														<input id="upload_file_fr" type="file" value="<?php echo pic_fix($user['photo']) ?>" name="avatar" accept=".png, .jpg, .jpeg" />
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
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<!--begin::Row-->
												<div class="row">
													<!--begin::Col-->
													<div class="col-lg-6 fv-row">
														<input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="<?php echo $user_firstname ?>" />
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col-lg-6 fv-row">
														<input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="<?php echo $user_lastname ?>" />
													</div>
													<!--end::Col-->
												</div>
												<!--end::Row-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-semibold fs-6">Company</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="<?php echo $user_firstname ?>'s company" />
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Company Site</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="<?php echo $user['company_site'] ?>" />
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">
												<span class="required">Contact Phone</span>
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
											</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="<?php echo $user['contact_info'] ?>" />
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->

										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">
												<span class="required">Country</span>
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
											</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-semibold">
													<option value="">Select a Country...</option>
													<option data-kt-flag="assets/media/flags/afghanistan.svg" value="AF">Afghanistan</option>
													<option data-kt-flag="assets/media/flags/aland-islands.svg" value="AX">Aland Islands</option>
													<option data-kt-flag="assets/media/flags/albania.svg" value="AL">Albania</option>
													<option data-kt-flag="assets/media/flags/algeria.svg" value="DZ">Algeria</option>
													<option data-kt-flag="assets/media/flags/american-samoa.svg" value="AS">American Samoa</option>
													<option data-kt-flag="assets/media/flags/andorra.svg" value="AD">Andorra</option>
													<option data-kt-flag="assets/media/flags/angola.svg" value="AO">Angola</option>
													<option data-kt-flag="assets/media/flags/anguilla.svg" value="AI">Anguilla</option>
													<option data-kt-flag="assets/media/flags/antigua-and-barbuda.svg" value="AG">Antigua and Barbuda</option>
													<option data-kt-flag="assets/media/flags/argentina.svg" value="AR">Argentina</option>
													<option data-kt-flag="assets/media/flags/armenia.svg" value="AM">Armenia</option>
													<option data-kt-flag="assets/media/flags/aruba.svg" value="AW">Aruba</option>
													<option data-kt-flag="assets/media/flags/australia.svg" value="AU">Australia</option>
													<option data-kt-flag="assets/media/flags/austria.svg" value="AT">Austria</option>
													<option data-kt-flag="assets/media/flags/azerbaijan.svg" value="AZ">Azerbaijan</option>
													<option data-kt-flag="assets/media/flags/bahamas.svg" value="BS">Bahamas</option>
													<option data-kt-flag="assets/media/flags/bahrain.svg" value="BH">Bahrain</option>
													<option data-kt-flag="assets/media/flags/bangladesh.svg" value="BD">Bangladesh</option>
													<option data-kt-flag="assets/media/flags/barbados.svg" value="BB">Barbados</option>
													<option data-kt-flag="assets/media/flags/belarus.svg" value="BY">Belarus</option>
													<option data-kt-flag="assets/media/flags/belgium.svg" value="BE">Belgium</option>
													<option data-kt-flag="assets/media/flags/belize.svg" value="BZ">Belize</option>
													<option data-kt-flag="assets/media/flags/benin.svg" value="BJ">Benin</option>
													<option data-kt-flag="assets/media/flags/bermuda.svg" value="BM">Bermuda</option>
													<option data-kt-flag="assets/media/flags/bhutan.svg" value="BT">Bhutan</option>
													<option data-kt-flag="assets/media/flags/bolivia.svg" value="BO">Bolivia, Plurinational State of</option>
													<option data-kt-flag="assets/media/flags/bonaire.svg" value="BQ">Bonaire, Sint Eustatius and Saba</option>
													<option data-kt-flag="assets/media/flags/bosnia-and-herzegovina.svg" value="BA">Bosnia and Herzegovina</option>
													<option data-kt-flag="assets/media/flags/botswana.svg" value="BW">Botswana</option>
													<option data-kt-flag="assets/media/flags/brazil.svg" value="BR">Brazil</option>
													<option data-kt-flag="assets/media/flags/british-indian-ocean-territory.svg" value="IO">British Indian Ocean Territory</option>
													<option data-kt-flag="assets/media/flags/brunei.svg" value="BN">Brunei Darussalam</option>
													<option data-kt-flag="assets/media/flags/bulgaria.svg" value="BG">Bulgaria</option>
													<option data-kt-flag="assets/media/flags/burkina-faso.svg" value="BF">Burkina Faso</option>
													<option data-kt-flag="assets/media/flags/burundi.svg" value="BI">Burundi</option>
													<option data-kt-flag="assets/media/flags/cambodia.svg" value="KH">Cambodia</option>
													<option data-kt-flag="assets/media/flags/cameroon.svg" value="CM">Cameroon</option>
													<option data-kt-flag="assets/media/flags/canada.svg" value="CA">Canada</option>
													<option data-kt-flag="assets/media/flags/cape-verde.svg" value="CV">Cape Verde</option>
													<option data-kt-flag="assets/media/flags/cayman-islands.svg" value="KY">Cayman Islands</option>
													<option data-kt-flag="assets/media/flags/central-african-republic.svg" value="CF">Central African Republic</option>
													<option data-kt-flag="assets/media/flags/chad.svg" value="TD">Chad</option>
													<option data-kt-flag="assets/media/flags/chile.svg" value="CL">Chile</option>
													<option data-kt-flag="assets/media/flags/china.svg" value="CN">China</option>
													<option data-kt-flag="assets/media/flags/christmas-island.svg" value="CX">Christmas Island</option>
													<option data-kt-flag="assets/media/flags/cocos-island.svg" value="CC">Cocos (Keeling) Islands</option>
													<option data-kt-flag="assets/media/flags/colombia.svg" value="CO">Colombia</option>
													<option data-kt-flag="assets/media/flags/comoros.svg" value="KM">Comoros</option>
													<option data-kt-flag="assets/media/flags/cook-islands.svg" value="CK">Cook Islands</option>
													<option data-kt-flag="assets/media/flags/costa-rica.svg" value="CR">Costa Rica</option>
													<option data-kt-flag="assets/media/flags/ivory-coast.svg" value="CI">Côte d'Ivoire</option>
													<option data-kt-flag="assets/media/flags/croatia.svg" value="HR">Croatia</option>
													<option data-kt-flag="assets/media/flags/cuba.svg" value="CU">Cuba</option>
													<option data-kt-flag="assets/media/flags/curacao.svg" value="CW">Curaçao</option>
													<option data-kt-flag="assets/media/flags/czech-republic.svg" value="CZ">Czech Republic</option>
													<option data-kt-flag="assets/media/flags/denmark.svg" value="DK">Denmark</option>
													<option data-kt-flag="assets/media/flags/djibouti.svg" value="DJ">Djibouti</option>
													<option data-kt-flag="assets/media/flags/dominica.svg" value="DM">Dominica</option>
													<option data-kt-flag="assets/media/flags/dominican-republic.svg" value="DO">Dominican Republic</option>
													<option data-kt-flag="assets/media/flags/ecuador.svg" value="EC">Ecuador</option>
													<option data-kt-flag="assets/media/flags/egypt.svg" value="EG">Egypt</option>
													<option data-kt-flag="assets/media/flags/el-salvador.svg" value="SV">El Salvador</option>
													<option data-kt-flag="assets/media/flags/equatorial-guinea.svg" value="GQ">Equatorial Guinea</option>
													<option data-kt-flag="assets/media/flags/eritrea.svg" value="ER">Eritrea</option>
													<option data-kt-flag="assets/media/flags/estonia.svg" value="EE">Estonia</option>
													<option data-kt-flag="assets/media/flags/ethiopia.svg" value="ET">Ethiopia</option>
													<option data-kt-flag="assets/media/flags/falkland-islands.svg" value="FK">Falkland Islands (Malvinas)</option>
													<option data-kt-flag="assets/media/flags/fiji.svg" value="FJ">Fiji</option>
													<option data-kt-flag="assets/media/flags/finland.svg" value="FI">Finland</option>
													<option data-kt-flag="assets/media/flags/france.svg" value="FR">France</option>
													<option data-kt-flag="assets/media/flags/french-polynesia.svg" value="PF">French Polynesia</option>
													<option data-kt-flag="assets/media/flags/gabon.svg" value="GA">Gabon</option>
													<option data-kt-flag="assets/media/flags/gambia.svg" value="GM">Gambia</option>
													<option data-kt-flag="assets/media/flags/georgia.svg" value="GE">Georgia</option>
													<option data-kt-flag="assets/media/flags/germany.svg" value="DE">Germany</option>
													<option data-kt-flag="assets/media/flags/ghana.svg" value="GH">Ghana</option>
													<option data-kt-flag="assets/media/flags/gibraltar.svg" value="GI">Gibraltar</option>
													<option data-kt-flag="assets/media/flags/greece.svg" value="GR">Greece</option>
													<option data-kt-flag="assets/media/flags/greenland.svg" value="GL">Greenland</option>
													<option data-kt-flag="assets/media/flags/grenada.svg" value="GD">Grenada</option>
													<option data-kt-flag="assets/media/flags/guam.svg" value="GU">Guam</option>
													<option data-kt-flag="assets/media/flags/guatemala.svg" value="GT">Guatemala</option>
													<option data-kt-flag="assets/media/flags/guernsey.svg" value="GG">Guernsey</option>
													<option data-kt-flag="assets/media/flags/guinea.svg" value="GN">Guinea</option>
													<option data-kt-flag="assets/media/flags/guinea-bissau.svg" value="GW">Guinea-Bissau</option>
													<option data-kt-flag="assets/media/flags/haiti.svg" value="HT">Haiti</option>
													<option data-kt-flag="assets/media/flags/vatican-city.svg" value="VA">Holy See (Vatican City State)</option>
													<option data-kt-flag="assets/media/flags/honduras.svg" value="HN">Honduras</option>
													<option data-kt-flag="assets/media/flags/hong-kong.svg" value="HK">Hong Kong</option>
													<option data-kt-flag="assets/media/flags/hungary.svg" value="HU">Hungary</option>
													<option data-kt-flag="assets/media/flags/iceland.svg" value="IS">Iceland</option>
													<option data-kt-flag="assets/media/flags/india.svg" value="IN">India</option>
													<option data-kt-flag="assets/media/flags/indonesia.svg" value="ID">Indonesia</option>
													<option data-kt-flag="assets/media/flags/iran.svg" value="IR">Iran, Islamic Republic of</option>
													<option data-kt-flag="assets/media/flags/iraq.svg" value="IQ">Iraq</option>
													<option data-kt-flag="assets/media/flags/ireland.svg" value="IE">Ireland</option>
													<option data-kt-flag="assets/media/flags/isle-of-man.svg" value="IM">Isle of Man</option>
													<option data-kt-flag="assets/media/flags/israel.svg" value="IL">Israel</option>
													<option data-kt-flag="assets/media/flags/italy.svg" value="IT">Italy</option>
													<option data-kt-flag="assets/media/flags/jamaica.svg" value="JM">Jamaica</option>
													<option data-kt-flag="assets/media/flags/japan.svg" value="JP">Japan</option>
													<option data-kt-flag="assets/media/flags/jersey.svg" value="JE">Jersey</option>
													<option data-kt-flag="assets/media/flags/jordan.svg" value="JO">Jordan</option>
													<option data-kt-flag="assets/media/flags/kazakhstan.svg" value="KZ">Kazakhstan</option>
													<option data-kt-flag="assets/media/flags/kenya.svg" value="KE">Kenya</option>
													<option data-kt-flag="assets/media/flags/kiribati.svg" value="KI">Kiribati</option>
													<option data-kt-flag="assets/media/flags/north-korea.svg" value="KP">Korea, Democratic People's Republic of</option>
													<option data-kt-flag="assets/media/flags/kuwait.svg" value="KW">Kuwait</option>
													<option data-kt-flag="assets/media/flags/kyrgyzstan.svg" value="KG">Kyrgyzstan</option>
													<option data-kt-flag="assets/media/flags/laos.svg" value="LA">Lao People's Democratic Republic</option>
													<option data-kt-flag="assets/media/flags/latvia.svg" value="LV">Latvia</option>
													<option data-kt-flag="assets/media/flags/lebanon.svg" value="LB">Lebanon</option>
													<option data-kt-flag="assets/media/flags/lesotho.svg" value="LS">Lesotho</option>
													<option data-kt-flag="assets/media/flags/liberia.svg" value="LR">Liberia</option>
													<option data-kt-flag="assets/media/flags/libya.svg" value="LY">Libya</option>
													<option data-kt-flag="assets/media/flags/liechtenstein.svg" value="LI">Liechtenstein</option>
													<option data-kt-flag="assets/media/flags/lithuania.svg" value="LT">Lithuania</option>
													<option data-kt-flag="assets/media/flags/luxembourg.svg" value="LU">Luxembourg</option>
													<option data-kt-flag="assets/media/flags/macao.svg" value="MO">Macao</option>
													<option data-kt-flag="assets/media/flags/madagascar.svg" value="MG">Madagascar</option>
													<option data-kt-flag="assets/media/flags/malawi.svg" value="MW">Malawi</option>
													<option data-kt-flag="assets/media/flags/malaysia.svg" value="MY">Malaysia</option>
													<option data-kt-flag="assets/media/flags/maldives.svg" value="MV">Maldives</option>
													<option data-kt-flag="assets/media/flags/mali.svg" value="ML">Mali</option>
													<option data-kt-flag="assets/media/flags/malta.svg" value="MT">Malta</option>
													<option data-kt-flag="assets/media/flags/marshall-island.svg" value="MH">Marshall Islands</option>
													<option data-kt-flag="assets/media/flags/martinique.svg" value="MQ">Martinique</option>
													<option data-kt-flag="assets/media/flags/mauritania.svg" value="MR">Mauritania</option>
													<option data-kt-flag="assets/media/flags/mauritius.svg" value="MU">Mauritius</option>
													<option data-kt-flag="assets/media/flags/mexico.svg" value="MX">Mexico</option>
													<option data-kt-flag="assets/media/flags/micronesia.svg" value="FM">Micronesia, Federated States of</option>
													<option data-kt-flag="assets/media/flags/moldova.svg" value="MD">Moldova, Republic of</option>
													<option data-kt-flag="assets/media/flags/monaco.svg" value="MC">Monaco</option>
													<option data-kt-flag="assets/media/flags/mongolia.svg" value="MN">Mongolia</option>
													<option data-kt-flag="assets/media/flags/montenegro.svg" value="ME">Montenegro</option>
													<option data-kt-flag="assets/media/flags/montserrat.svg" value="MS">Montserrat</option>
													<option data-kt-flag="assets/media/flags/morocco.svg" value="MA">Morocco</option>
													<option data-kt-flag="assets/media/flags/mozambique.svg" value="MZ">Mozambique</option>
													<option data-kt-flag="assets/media/flags/myanmar.svg" value="MM">Myanmar</option>
													<option data-kt-flag="assets/media/flags/namibia.svg" value="NA">Namibia</option>
													<option data-kt-flag="assets/media/flags/nauru.svg" value="NR">Nauru</option>
													<option data-kt-flag="assets/media/flags/nepal.svg" value="NP">Nepal</option>
													<option data-kt-flag="assets/media/flags/netherlands.svg" value="NL">Netherlands</option>
													<option data-kt-flag="assets/media/flags/new-zealand.svg" value="NZ">New Zealand</option>
													<option data-kt-flag="assets/media/flags/nicaragua.svg" value="NI">Nicaragua</option>
													<option data-kt-flag="assets/media/flags/niger.svg" value="NE">Niger</option>
													<option data-kt-flag="assets/media/flags/nigeria.svg" value="NG">Nigeria</option>
													<option data-kt-flag="assets/media/flags/niue.svg" value="NU">Niue</option>
													<option data-kt-flag="assets/media/flags/norfolk-island.svg" value="NF">Norfolk Island</option>
													<option data-kt-flag="assets/media/flags/northern-mariana-islands.svg" value="MP">Northern Mariana Islands</option>
													<option data-kt-flag="assets/media/flags/norway.svg" value="NO">Norway</option>
													<option data-kt-flag="assets/media/flags/oman.svg" value="OM">Oman</option>
													<option data-kt-flag="assets/media/flags/pakistan.svg" value="PK">Pakistan</option>
													<option data-kt-flag="assets/media/flags/palau.svg" value="PW">Palau</option>
													<option data-kt-flag="assets/media/flags/palestine.svg" value="PS">Palestinian Territory, Occupied</option>
													<option data-kt-flag="assets/media/flags/panama.svg" value="PA">Panama</option>
													<option data-kt-flag="assets/media/flags/papua-new-guinea.svg" value="PG">Papua New Guinea</option>
													<option data-kt-flag="assets/media/flags/paraguay.svg" value="PY">Paraguay</option>
													<option data-kt-flag="assets/media/flags/peru.svg" value="PE">Peru</option>
													<option data-kt-flag="assets/media/flags/philippines.svg" value="PH">Philippines</option>
													<option data-kt-flag="assets/media/flags/poland.svg" value="PL">Poland</option>
													<option data-kt-flag="assets/media/flags/portugal.svg" value="PT">Portugal</option>
													<option data-kt-flag="assets/media/flags/puerto-rico.svg" value="PR">Puerto Rico</option>
													<option data-kt-flag="assets/media/flags/qatar.svg" value="QA">Qatar</option>
													<option data-kt-flag="assets/media/flags/romania.svg" value="RO">Romania</option>
													<option data-kt-flag="assets/media/flags/russia.svg" value="RU">Russian Federation</option>
													<option data-kt-flag="assets/media/flags/rwanda.svg" value="RW">Rwanda</option>
													<option data-kt-flag="assets/media/flags/st-barts.svg" value="BL">Saint Barthélemy</option>
													<option data-kt-flag="assets/media/flags/saint-kitts-and-nevis.svg" value="KN">Saint Kitts and Nevis</option>
													<option data-kt-flag="assets/media/flags/st-lucia.svg" value="LC">Saint Lucia</option>
													<option data-kt-flag="assets/media/flags/sint-maarten.svg" value="MF">Saint Martin (French part)</option>
													<option data-kt-flag="assets/media/flags/st-vincent-and-the-grenadines.svg" value="VC">Saint Vincent and the Grenadines</option>
													<option data-kt-flag="assets/media/flags/samoa.svg" value="WS">Samoa</option>
													<option data-kt-flag="assets/media/flags/san-marino.svg" value="SM">San Marino</option>
													<option data-kt-flag="assets/media/flags/sao-tome-and-prince.svg" value="ST">Sao Tome and Principe</option>
													<option data-kt-flag="assets/media/flags/saudi-arabia.svg" value="SA">Saudi Arabia</option>
													<option data-kt-flag="assets/media/flags/senegal.svg" value="SN">Senegal</option>
													<option data-kt-flag="assets/media/flags/serbia.svg" value="RS">Serbia</option>
													<option data-kt-flag="assets/media/flags/seychelles.svg" value="SC">Seychelles</option>
													<option data-kt-flag="assets/media/flags/sierra-leone.svg" value="SL">Sierra Leone</option>
													<option data-kt-flag="assets/media/flags/singapore.svg" value="SG">Singapore</option>
													<option data-kt-flag="assets/media/flags/sint-maarten.svg" value="SX">Sint Maarten (Dutch part)</option>
													<option data-kt-flag="assets/media/flags/slovakia.svg" value="SK">Slovakia</option>
													<option data-kt-flag="assets/media/flags/slovenia.svg" value="SI">Slovenia</option>
													<option data-kt-flag="assets/media/flags/solomon-islands.svg" value="SB">Solomon Islands</option>
													<option data-kt-flag="assets/media/flags/somalia.svg" value="SO">Somalia</option>
													<option data-kt-flag="assets/media/flags/south-africa.svg" value="ZA">South Africa</option>
													<option data-kt-flag="assets/media/flags/south-korea.svg" value="KR">South Korea</option>
													<option data-kt-flag="assets/media/flags/south-sudan.svg" value="SS">South Sudan</option>
													<option data-kt-flag="assets/media/flags/spain.svg" value="ES">Spain</option>
													<option data-kt-flag="assets/media/flags/sri-lanka.svg" value="LK">Sri Lanka</option>
													<option data-kt-flag="assets/media/flags/sudan.svg" value="SD">Sudan</option>
													<option data-kt-flag="assets/media/flags/suriname.svg" value="SR">Suriname</option>
													<option data-kt-flag="assets/media/flags/swaziland.svg" value="SZ">Swaziland</option>
													<option data-kt-flag="assets/media/flags/sweden.svg" value="SE">Sweden</option>
													<option data-kt-flag="assets/media/flags/switzerland.svg" value="CH">Switzerland</option>
													<option data-kt-flag="assets/media/flags/syria.svg" value="SY">Syrian Arab Republic</option>
													<option data-kt-flag="assets/media/flags/taiwan.svg" value="TW">Taiwan, Province of China</option>
													<option data-kt-flag="assets/media/flags/tajikistan.svg" value="TJ">Tajikistan</option>
													<option data-kt-flag="assets/media/flags/tanzania.svg" value="TZ">Tanzania, United Republic of</option>
													<option data-kt-flag="assets/media/flags/thailand.svg" value="TH">Thailand</option>
													<option data-kt-flag="assets/media/flags/togo.svg" value="TG">Togo</option>
													<option data-kt-flag="assets/media/flags/tokelau.svg" value="TK">Tokelau</option>
													<option data-kt-flag="assets/media/flags/tonga.svg" value="TO">Tonga</option>
													<option data-kt-flag="assets/media/flags/trinidad-and-tobago.svg" value="TT">Trinidad and Tobago</option>
													<option data-kt-flag="assets/media/flags/tunisia.svg" value="TN">Tunisia</option>
													<option data-kt-flag="assets/media/flags/turkey.svg" value="TR">Turkey</option>
													<option data-kt-flag="assets/media/flags/turkmenistan.svg" value="TM">Turkmenistan</option>
													<option data-kt-flag="assets/media/flags/turks-and-caicos.svg" value="TC">Turks and Caicos Islands</option>
													<option data-kt-flag="assets/media/flags/tuvalu.svg" value="TV">Tuvalu</option>
													<option data-kt-flag="assets/media/flags/uganda.svg" value="UG">Uganda</option>
													<option data-kt-flag="assets/media/flags/ukraine.svg" value="UA">Ukraine</option>
													<option data-kt-flag="assets/media/flags/united-arab-emirates.svg" value="AE">United Arab Emirates</option>
													<option data-kt-flag="assets/media/flags/united-kingdom.svg" value="GB">United Kingdom</option>
													<option data-kt-flag="assets/media/flags/united-states.svg" value="US">United States</option>
													<option data-kt-flag="assets/media/flags/uruguay.svg" value="UY">Uruguay</option>
													<option data-kt-flag="assets/media/flags/uzbekistan.svg" value="UZ">Uzbekistan</option>
													<option data-kt-flag="assets/media/flags/vanuatu.svg" value="VU">Vanuatu</option>
													<option data-kt-flag="assets/media/flags/venezuela.svg" value="VE">Venezuela, Bolivarian Republic of</option>
													<option data-kt-flag="assets/media/flags/vietnam.svg" value="VN">Vietnam</option>
													<option data-kt-flag="assets/media/flags/virgin-islands.svg" value="VI">Virgin Islands</option>
													<option data-kt-flag="assets/media/flags/yemen.svg" value="YE">Yemen</option>
													<option data-kt-flag="assets/media/flags/zambia.svg" value="ZM">Zambia</option>
													<option data-kt-flag="assets/media/flags/zimbabwe.svg" value="ZW">Zimbabwe</option>
												</select>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-semibold fs-6">Language</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<!--begin::Input-->
												<select name="language" aria-label="Select a Language" data-control="select2" data-placeholder="Select a language..." class="form-select form-select-solid form-select-lg">
													<option value="">Select a Language...</option>
													<option data-kt-flag="assets/media/flags/indonesia.svg" value="id">Bahasa Indonesia - Indonesian</option>
													<option data-kt-flag="assets/media/flags/malaysia.svg" value="msa">Bahasa Melayu - Malay</option>
													<option data-kt-flag="assets/media/flags/canada.svg" value="ca">Català - Catalan</option>
													<option data-kt-flag="assets/media/flags/czech-republic.svg" value="cs">Čeština - Czech</option>
													<option data-kt-flag="assets/media/flags/netherlands.svg" value="da">Dansk - Danish</option>
													<option data-kt-flag="assets/media/flags/germany.svg" value="de">Deutsch - German</option>
													<option data-kt-flag="assets/media/flags/united-kingdom.svg" value="en">English</option>
													<option data-kt-flag="assets/media/flags/united-kingdom.svg" value="en-gb">English UK - British English</option>
													<option data-kt-flag="assets/media/flags/spain.svg" value="es">Español - Spanish</option>
													<option data-kt-flag="assets/media/flags/philippines.svg" value="fil">Filipino</option>
													<option data-kt-flag="assets/media/flags/france.svg" value="fr">Français - French</option>
													<option data-kt-flag="assets/media/flags/gabon.svg" value="ga">Gaeilge - Irish (beta)</option>
													<option data-kt-flag="assets/media/flags/greenland.svg" value="gl">Galego - Galician (beta)</option>
													<option data-kt-flag="assets/media/flags/croatia.svg" value="hr">Hrvatski - Croatian</option>
													<option data-kt-flag="assets/media/flags/italy.svg" value="it">Italiano - Italian</option>
													<option data-kt-flag="assets/media/flags/hungary.svg" value="hu">Magyar - Hungarian</option>
													<option data-kt-flag="assets/media/flags/netherlands.svg" value="nl">Nederlands - Dutch</option>
													<option data-kt-flag="assets/media/flags/norway.svg" value="no">Norsk - Norwegian</option>
													<option data-kt-flag="assets/media/flags/poland.svg" value="pl">Polski - Polish</option>
													<option data-kt-flag="assets/media/flags/portugal.svg" value="pt">Português - Portuguese</option>
													<option data-kt-flag="assets/media/flags/romania.svg" value="ro">Română - Romanian</option>
													<option data-kt-flag="assets/media/flags/slovakia.svg" value="sk">Slovenčina - Slovak</option>
													<option data-kt-flag="assets/media/flags/finland.svg" value="fi">Suomi - Finnish</option>
													<option data-kt-flag="assets/media/flags/el-salvador.svg" value="sv">Svenska - Swedish</option>
													<option data-kt-flag="assets/media/flags/virgin-islands.svg" value="vi">Tiếng Việt - Vietnamese</option>
													<option data-kt-flag="assets/media/flags/turkey.svg" value="tr">Türkçe - Turkish</option>
													<option data-kt-flag="assets/media/flags/greece.svg" value="el">Ελληνικά - Greek</option>
													<option data-kt-flag="assets/media/flags/bulgaria.svg" value="bg">Български език - Bulgarian</option>
													<option data-kt-flag="assets/media/flags/russia.svg" value="ru">Русский - Russian</option>
													<option data-kt-flag="assets/media/flags/suriname.svg" value="sr">Српски - Serbian</option>
													<option data-kt-flag="assets/media/flags/ukraine.svg" value="uk">Українська мова - Ukrainian</option>
													<option data-kt-flag="assets/media/flags/israel.svg" value="he">עִבְרִית - Hebrew</option>
													<option data-kt-flag="assets/media/flags/pakistan.svg" value="ur">اردو - Urdu (beta)</option>
													<option data-kt-flag="assets/media/flags/argentina.svg" value="ar">العربية - Arabic</option>
													<option data-kt-flag="assets/media/flags/argentina.svg" value="fa">فارسی - Persian</option>
													<option data-kt-flag="assets/media/flags/mauritania.svg" value="mr">मराठी - Marathi</option>
													<option data-kt-flag="assets/media/flags/india.svg" value="hi">हिन्दी - Hindi</option>
													<option data-kt-flag="assets/media/flags/bangladesh.svg" value="bn">বাংলা - Bangla</option>
													<option data-kt-flag="assets/media/flags/guam.svg" value="gu">ગુજરાતી - Gujarati</option>
													<option data-kt-flag="assets/media/flags/india.svg" value="ta">தமிழ் - Tamil</option>
													<option data-kt-flag="assets/media/flags/saint-kitts-and-nevis.svg" value="kn">ಕನ್ನಡ - Kannada</option>
													<option data-kt-flag="assets/media/flags/thailand.svg" value="th">ภาษาไทย - Thai</option>
													<option data-kt-flag="assets/media/flags/south-korea.svg" value="ko">한국어 - Korean</option>
													<option data-kt-flag="assets/media/flags/japan.svg" value="ja">日本語 - Japanese</option>
													<option data-kt-flag="assets/media/flags/china.svg" value="zh-cn">简体中文 - Simplified Chinese</option>
													<option data-kt-flag="assets/media/flags/taiwan.svg" value="zh-tw">繁體中文 - Traditional Chinese</option>
												</select>
												<!--end::Input-->
												<!--begin::Hint-->
												<div class="form-text">Please select a preferred language, including date, time, and number formatting.</div>
												<!--end::Hint-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-semibold fs-6">Time Zone</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<select name="timezone" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a timezone.." class="form-select form-select-solid form-select-lg">
													<option value="">Select a Timezone..</option>
													<option data-bs-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
													<option data-bs-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
													<option data-bs-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
													<option data-bs-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
													<option data-bs-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
													<option data-bs-offset="-25200" value="Pacific Time (US & Canada)">(GMT-07:00) Pacific Time (US & Canada)</option>
													<option data-bs-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
													<option data-bs-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
													<option data-bs-offset="-21600" value="Mountain Time (US & Canada)">(GMT-06:00) Mountain Time (US & Canada)</option>
													<option data-bs-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
													<option data-bs-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
													<option data-bs-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
													<option data-bs-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
													<option data-bs-offset="-18000" value="Central Time (US & Canada)">(GMT-05:00) Central Time (US & Canada)</option>
													<option data-bs-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
													<option data-bs-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
													<option data-bs-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
													<option data-bs-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
													<option data-bs-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
													<option data-bs-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
													<option data-bs-offset="-14400" value="Eastern Time (US & Canada)">(GMT-04:00) Eastern Time (US & Canada)</option>
													<option data-bs-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
													<option data-bs-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
													<option data-bs-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
													<option data-bs-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
													<option data-bs-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
													<option data-bs-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
													<option data-bs-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
													<option data-bs-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
													<option data-bs-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
													<option data-bs-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
													<option data-bs-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
													<option data-bs-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
													<option data-bs-offset="0" value="Azores">(GMT) Azores</option>
													<option data-bs-offset="0" value="Monrovia">(GMT) Monrovia</option>
													<option data-bs-offset="0" value="UTC">(GMT) UTC</option>
													<option data-bs-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
													<option data-bs-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
													<option data-bs-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
													<option data-bs-offset="3600" value="London">(GMT+01:00) London</option>
													<option data-bs-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
													<option data-bs-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
													<option data-bs-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
													<option data-bs-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
													<option data-bs-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
													<option data-bs-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
													<option data-bs-offset="7200" value="Prague">(GMT+02:00) Prague</option>
													<option data-bs-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
													<option data-bs-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
													<option data-bs-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
													<option data-bs-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
													<option data-bs-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
													<option data-bs-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
													<option data-bs-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
													<option data-bs-offset="7200" value="Paris">(GMT+02:00) Paris</option>
													<option data-bs-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
													<option data-bs-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
													<option data-bs-offset="7200" value="Bern">(GMT+02:00) Bern</option>
													<option data-bs-offset="7200" value="Rome">(GMT+02:00) Rome</option>
													<option data-bs-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
													<option data-bs-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
													<option data-bs-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
													<option data-bs-offset="7200" value="Harare">(GMT+02:00) Harare</option>
													<option data-bs-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
													<option data-bs-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
													<option data-bs-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
													<option data-bs-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
													<option data-bs-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
													<option data-bs-offset="10800" value="Riga">(GMT+03:00) Riga</option>
													<option data-bs-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
													<option data-bs-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
													<option data-bs-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
													<option data-bs-offset="10800" value="Athens">(GMT+03:00) Athens</option>
													<option data-bs-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
													<option data-bs-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
													<option data-bs-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
													<option data-bs-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
													<option data-bs-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
													<option data-bs-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
													<option data-bs-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
													<option data-bs-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
													<option data-bs-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
													<option data-bs-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
													<option data-bs-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
													<option data-bs-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
													<option data-bs-offset="14400" value="Baku">(GMT+04:00) Baku</option>
													<option data-bs-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
													<option data-bs-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
													<option data-bs-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
													<option data-bs-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
													<option data-bs-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
													<option data-bs-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
													<option data-bs-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
													<option data-bs-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
													<option data-bs-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
													<option data-bs-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
													<option data-bs-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
													<option data-bs-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
													<option data-bs-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
													<option data-bs-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
													<option data-bs-offset="21600" value="Astana">(GMT+06:00) Astana</option>
													<option data-bs-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
													<option data-bs-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
													<option data-bs-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
													<option data-bs-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
													<option data-bs-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
													<option data-bs-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
													<option data-bs-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
													<option data-bs-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
													<option data-bs-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
													<option data-bs-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
													<option data-bs-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
													<option data-bs-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
													<option data-bs-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
													<option data-bs-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
													<option data-bs-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
													<option data-bs-offset="28800" value="Perth">(GMT+08:00) Perth</option>
													<option data-bs-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
													<option data-bs-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
													<option data-bs-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
													<option data-bs-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
													<option data-bs-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
													<option data-bs-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
													<option data-bs-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
													<option data-bs-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
													<option data-bs-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
													<option data-bs-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
													<option data-bs-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
													<option data-bs-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
													<option data-bs-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
													<option data-bs-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
													<option data-bs-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
													<option data-bs-offset="36000" value="Guam">(GMT+10:00) Guam</option>
													<option data-bs-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
													<option data-bs-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
													<option data-bs-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
													<option data-bs-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
													<option data-bs-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
													<option data-bs-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
													<option data-bs-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
													<option data-bs-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
													<option data-bs-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
													<option data-bs-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
												</select>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Currency</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<select name="currency" aria-label="Select a Currency" data-control="select2" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg">
													<option value="">Select a currency..</option>
													<option data-kt-flag="../assets/media/flags/united-states.svg" value="KSH">
														<b>KSH</b>&nbsp;-&nbsp;Kenyan shilling
													</option>
													<option data-kt-flag="../assets/media/flags/united-states.svg" value="USD">
														<b>USD</b>&nbsp;-&nbsp;USA dollar
													</option>
													<option data-kt-flag="assets/media/flags/united-kingdom.svg" value="GBP">
														<b>GBP</b>&nbsp;-&nbsp;British pound
													</option>
													<option data-kt-flag="assets/media/flags/australia.svg" value="AUD">
														<b>AUD</b>&nbsp;-&nbsp;Australian dollar
													</option>
													<option data-kt-flag="assets/media/flags/japan.svg" value="JPY">
														<b>JPY</b>&nbsp;-&nbsp;Japanese yen
													</option>
													<option data-kt-flag="assets/media/flags/sweden.svg" value="SEK">
														<b>SEK</b>&nbsp;-&nbsp;Swedish krona
													</option>
													<option data-kt-flag="assets/media/flags/canada.svg" value="CAD">
														<b>CAD</b>&nbsp;-&nbsp;Canadian dollar
													</option>
													<option data-kt-flag="assets/media/flags/switzerland.svg" value="CHF">
														<b>CHF</b>&nbsp;-&nbsp;Swiss franc
													</option>
												</select>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<!--begin::Options-->
												<div class="d-flex align-items-center mt-3">
													<!--begin::Option-->
													<?php
													if ($user['email_comm'] == 1) {
														$em_label = 'checked';
													} else {
														$em_label = '';
													}
													if ($user['phone_comm'] == 1) {
														$ph_label = 'checked';
													} else {
														$ph_label = '';
													}

													?>
													<label class="form-check form-check-inline form-check-solid me-5">
														<input class="form-check-input" name="email_comm" type="checkbox" value="1" <?php echo $em_label ?> />
														<span class="fw-semibold ps-2 fs-6">Email</span>
													</label>
													<!--end::Option-->
													<!--begin::Option-->
													<label class="form-check form-check-inline form-check-solid">
														<input class="form-check-input" name="phone_comm" type="checkbox" value="1" <?php echo $ph_label ?> />
														<span class="fw-semibold ps-2 fs-6">Phone</span>
													</label>
													<!--end::Option-->
												</div>
												<!--end::Options-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-0">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
											<!--begin::Label-->
											<!--begin::Label-->
											<div class="col-lg-8 d-flex align-items-center">
												<div class="form-check form-check-solid form-switch fv-row">
													<input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" value="1" name="marketing" />
													<label class="form-check-label" for="allowmarketing"></label>
												</div>
											</div>
											<!--begin::Label-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Card body-->
									<input name="edit" type="hidden" value="" />
									<!--begin::Actions-->
									<div class="card-footer d-flex justify-content-end py-6 px-9">
										<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
									<!--end::Actions-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Basic info-->
						<!--begin::API Method-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
								<div class="card-title m-0">
									<h3 class="fw-bold m-0">API App Setup</h3>
								</div>
							</div>
							<!--end::Card header-->
							<!--begin::Content-->
							<div id="kt_account_settings_signin_method" class="collapse show">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::API Config-->
									<div class="d-flex flex-wrap align-items-center">
										<!--begin::Label-->
										<div id="kt_app">
											<div class="fs-6 fw-bold mb-1">Active App Set-up</div>
											<?php
											$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id AND status=:status");
											$stmt->execute(['user_id' => $user['id'], 'status' => 1]);
											$api_app = $stmt->fetch();
											if ($api_app['numrows'] < 1) {
												$api_badge = '<span class="badge badge-light-danger">You have not added your app</span>';
												$api_mess = 'Add App';
											} elseif ($api_app['level'] == 1) {
												$api_badge = '<span class="badge badge-light-info">You are a subscriber to an app</span>';
												$api_mess = 'Add My App';
												$api_consumer_key = '';
												$api_consumer_secret = '';
												$api_bearer_token = '';
												$api_access_token = '';
												$api_access_secret = '';
												$api_title = '';
											} else {
												$api_badge = '<span class="badge badge-light-success">Your app is added</span>';
												$api_mess = 'Change App';
												$api_consumer_key = $api_app['consumer_key'];
												$api_consumer_secret = $api_app['consumer_secret'];
												$api_bearer_token = $api_app['bearer_token'];
												$api_access_token = $api_app['access_token'];
												$api_access_secret = $api_app['access_secret'];
												$api_title = $api_app['title'];
											}

											?>
											<div class="fw-semibold text-gray-600"><?php echo $api_badge; ?></div>
										</div>
										<!--end::Label-->
										<!--begin::Edit-->
										<div id="kt_app_edit" class="flex-row-fluid d-none">
											<!--begin::Form-->
											<form id="kt_api_app" class="form" novalidate="novalidate" method="POST" autocomplete="off">
												<input type="hidden" />
												<div class="col-lg-12">
													<div class="fv-row mb-3">
														<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">App Title/Name</label>
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter App display Title" name="app_title" value="<?php if (isset($api_title)) {
																																																		echo $api_title;
																																																	}; ?>" required />
													</div>
												</div>
												<div class="row mb-6">
													<div class="col-lg-6 mb-4 mb-lg-0">
														<div class="fv-row mb-0">
															<label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter consumer key/API key</label>
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your consumer key" name="consumer_key" value="<?php if (isset($api_consumer_key)) {
																																																			echo $api_consumer_key;
																																																		}; ?>" required />
														</div>
													</div>
													<input name="edit" type="hidden" value="" />
													<div class="col-lg-6">
														<div class="fv-row mb-0">
															<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter consumer secret/API secret</label>
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your consumer secret" name="consumer_secret" value="<?php if (isset($api_consumer_secret)) {
																																																					echo $api_consumer_secret;
																																																				}; ?>" required />
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="fv-row mb-3">
														<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter Bearer token</label>
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your Bearer token" name="bearer_token" value="<?php if (isset($api_bearer_token)) {
																																																		echo $api_bearer_token;
																																																	}; ?>" required />
													</div>
												</div>
												<div class="col-lg-12">
													<div class="fv-row mb-3">
														<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter Access token</label>
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your Access token" name="access_token" value="<?php if (isset($api_access_token)) {
																																																		echo $api_access_token;
																																																	}; ?>" required />
													</div>
												</div>
												<div class="col-lg-12">
													<div class="fv-row mb-3">
														<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter Access secret</label>
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your Access secret" name="access_secret" value="<?php if (isset($api_access_secret)) {
																																																			echo $api_access_secret;
																																																		}; ?>" required />


														<input type="hidden" name="app_id" value="<?php if (isset($api_app['id'])) {
																										echo $api_app['id'];
																									}; ?>" required />

													</div>
												</div>

												<div class="d-flex">
													<button id="kt_addApp" type="submit" class="btn btn-primary me-2 px-6"><?php echo $api_mess; ?></button>
													<button id="kt_app_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Edit-->
										<!--begin::Action-->
										<div id="kt_app_button" class="ms-auto">
											<button class="btn btn-light btn-active-light-primary"><?php echo $api_mess; ?></button>
										</div>
										<!--end::Action-->
									</div>
									<!--end::API Config-->
									<!--begin::Separator-->
									<div class="separator separator-dashed my-6"></div>
									<!--end::Separator-->
									<?php
									if ($api_app['numrows'] > 0) {
									?>
										<!--begin::API Config-->
										<div class="d-flex flex-wrap align-items-center">
											<!--begin::Label-->
											<div id="kt_app2">
												<div class="fs-6 fw-bold mb-1">New App Set-up</div>

												<div class="fw-semibold text-gray-600"><span class="badge badge-light-info">Add a new app</span></div>
											</div>
											<!--end::Label-->
											<!--begin::Edit-->
											<div id="kt_app_edit2" class="flex-row-fluid d-none">
												<!--begin::Form-->
												<form id="kt_api_app" class="form" novalidate="novalidate" method="POST" autocomplete="off">
													<input type="hidden" />
													<div class="col-lg-12">
														<div class="fv-row mb-3">
															<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">App Title/Name</label>
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter App display Title" name="app_title" value="" required />
														</div>
													</div>
													<div class="row mb-6">
														<div class="col-lg-6 mb-4 mb-lg-0">
															<div class="fv-row mb-0">
																<label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter consumer key/API key</label>
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your consumer key" name="consumer_key" value="" required />
															</div>
														</div>
														<input name="edit" type="hidden" value="" />
														<div class="col-lg-6">
															<div class="fv-row mb-0">
																<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter consumer secret/API secret</label>
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your consumer secret" name="consumer_secret" value="" required />
															</div>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="fv-row mb-3">
															<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter Bearer token</label>
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your Bearer token" name="bearer_token" value="" required />
														</div>
													</div>
													<div class="col-lg-12">
														<div class="fv-row mb-3">
															<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter Access token</label>
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your Access token" name="access_token" value="" required />
														</div>
													</div>
													<div class="col-lg-12">
														<div class="fv-row mb-3">
															<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Enter Access secret</label>
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter your Access secret" name="access_secret" value="" required />

															<input type="hidden" name="app_id" value="NULL" required />

														</div>
													</div>

													<div class="d-flex">
														<button id="kt_addApp2" type="submit" class="btn btn-primary me-2 px-6">Add New App</button>
														<button id="kt_app_cancel2" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
													</div>
												</form>
												<!--end::Form-->
											</div>
											<!--end::Edit-->
											<!--begin::Action-->
											<div id="kt_app_button2" class="ms-auto">
												<button class="btn btn-light btn-active-light-primary">Add New App</button>
											</div>
											<!--end::Action-->
										</div>
										<!--end::API Config-->
									<?php
									}
									?>
									<!--begin::Separator-->
									<div class="separator separator-dashed my-6"></div>
									<!--end::Separator-->
									<!--begin::Table container-->
									<div class="table-responsive mt-4">
										<!--begin::Table-->
										<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr class="fw-bold text-muted bg-light">
													<th class="ps-4 min-w-100px rounded-start">API App</th>
													<th class="min-w-150px">App Title</th>
													<th class="min-w-150px">API Key</th>
													<th class="min-w-150px">Status</th>
													<th class="min-w-150px">Listing</th>
													<th class="min-w-150px">List</th>
													<th class="min-w-150px">Activate</th>
													<th class="min-w-50px">Delete</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<?php
												$stmt = $conn->prepare("SELECT * FROM client_api WHERE user_id=:user_id");
												$stmt->execute(['user_id' => $user['id']]);
												$api_app_2 = $stmt->fetchAll();

												$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id");
												$stmt->execute(['user_id' => $user['id']]);
												$api_app_3 = $stmt->fetch();


												foreach ($api_app_2 as $row) {

													if ($api_app_3['numrows'] <= 1 && $row['level'] == 2) {
														$app_delete_status = "'NO'";
													} elseif ($row['status'] == 1 && $api_app_3['numrows'] > 1) {
														$app_delete_status = "'NO_2'";
													} else {
														$app_delete_status = $row['id'];
													}

													$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM api_shop WHERE app_id=:app_id");
													$stmt->execute(['app_id' => $row['id']]);
													$api_app_4 = $stmt->fetch();
													if ($api_app_4['numrows'] > 0) {
														$app_list = "'LISTED'";
														$app_list_title = "View";
														$app_status_3 = '<span class="badge badge-warning fs-7 fw-bold">LISTED</span>';
														$app_delete_status = "'NO_3'";
													} else {
														$app_list = $row['id'];
														$app_list_title = "List";
														$app_status_3 = '<span class="badge badge-light-dark fs-7 fw-bold">UNLISTED</span>';
													}
													if ($row['level'] == 1) {
														$app_list = "'SUBSCRIBER'";
														$app_list_title = "View";
														$app_status_3 = '<span class="badge badge-danger fs-7 fw-bold">SUBSCRIBER</span>';
													}


													if ($row['status'] == 1) {
														$app_status_2 = '<span class="badge badge-light-primary fs-7 fw-bold">Active</span>';
														$app_activate = "'NO'";
													} else {
														$app_status_2 = '<span class="badge badge-light-danger fs-7 fw-bold">Inactive</span>';
														$app_activate = $row['id'];
													}



													echo '
													<tr>
													<td>
														<div class="symbol symbol-50px me-2">
															<span class="symbol-label bg-light-info">
																<!--begin::Svg Icon | path: icons/duotune/coding/cod002.svg-->
																<span class="svg-icon svg-icon-2x svg-icon-info">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="currentColor" />
																		<path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
													</td>
													<td>
														<span class="text-muted fs-7 fw-bold">' . $row['title'] . '</span>
													</td>
													<td>
														<span class="text-muted fs-7 fw-bold">' . $row['consumer_key'] . '</span>
													</td>
													<td>
														' . $app_status_2 . '
													</td>
													<td>
													' . $app_status_3 . '
													</td>
													<td>
														<a onclick="appList(' . $app_list . ', ' . $row['id'] . ')" class="btn btn-bg-light btn-active-color-info btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
															<span class="svg-icon svg-icon-2x">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M18 22H6C5.4 22 5 21.6 5 21V8C6.6 6.4 7.4 5.6 9 4H15C16.6 5.6 17.4 6.4 19 8V21C19 21.6 18.6 22 18 22ZM12 5.5C11.2 5.5 10.5 6.2 10.5 7C10.5 7.8 11.2 8.5 12 8.5C12.8 8.5 13.5 7.8 13.5 7C13.5 6.2 12.8 5.5 12 5.5Z" fill="currentColor" />
																	<path d="M12 7C11.4 7 11 6.6 11 6V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V6C13 6.6 12.6 7 12 7ZM15.1 10.6C15.1 10.5 15.1 10.4 15 10.3C14.9 10.2 14.8 10.2 14.7 10.2C14.6 10.2 14.5 10.2 14.4 10.3C14.3 10.4 14.3 10.5 14.2 10.6L9 19.1C8.9 19.2 8.89999 19.3 8.89999 19.4C8.89999 19.5 8.9 19.6 9 19.7C9.1 19.8 9.2 19.8 9.3 19.8C9.5 19.8 9.6 19.7 9.8 19.5L15 11.1C15 10.8 15.1 10.7 15.1 10.6ZM11 11.6C10.9 11.3 10.8 11.1 10.6 10.8C10.4 10.6 10.2 10.4 10 10.3C9.8 10.2 9.50001 10.1 9.10001 10.1C8.60001 10.1 8.3 10.2 8 10.4C7.7 10.6 7.49999 10.9 7.39999 11.2C7.29999 11.6 7.2 12 7.2 12.6C7.2 13.1 7.3 13.5 7.5 13.9C7.7 14.3 7.9 14.5 8.2 14.7C8.5 14.9 8.8 14.9 9.2 14.9C9.8 14.9 10.3 14.7 10.6 14.3C11 13.9 11.1 13.3 11.1 12.5C11.1 12.3 11.1 11.9 11 11.6ZM9.8 13.8C9.7 14.1 9.5 14.2 9.2 14.2C9 14.2 8.8 14.1 8.7 14C8.6 13.9 8.5 13.7 8.5 13.5C8.5 13.3 8.39999 13 8.39999 12.6C8.39999 12.2 8.4 11.9 8.5 11.7C8.5 11.5 8.6 11.3 8.7 11.2C8.8 11.1 9 11 9.2 11C9.5 11 9.7 11.1 9.8 11.4C9.9 11.7 10 12 10 12.6C10 13.2 9.9 13.6 9.8 13.8ZM16.5 16.1C16.4 15.8 16.3 15.6 16.1 15.4C15.9 15.2 15.7 15 15.5 14.9C15.3 14.8 15 14.7 14.6 14.7C13.9 14.7 13.4 14.9 13.1 15.3C12.8 15.7 12.6 16.3 12.6 17.1C12.6 17.6 12.7 18 12.9 18.4C13.1 18.7 13.3 19 13.6 19.2C13.9 19.4 14.2 19.5 14.6 19.5C15.2 19.5 15.7 19.3 16 18.9C16.4 18.5 16.5 17.9 16.5 17.1C16.7 16.8 16.6 16.4 16.5 16.1ZM15.3 18.4C15.2 18.7 15 18.8 14.7 18.8C14.4 18.8 14.2 18.7 14.1 18.4C14 18.1 13.9 17.7 13.9 17.2C13.9 16.8 13.9 16.5 14 16.3C14.1 16.1 14.1 15.9 14.2 15.8C14.3 15.7 14.5 15.6 14.7 15.6C15 15.6 15.2 15.7 15.3 16C15.4 16.2 15.5 16.6 15.5 17.2C15.5 17.7 15.4 18.1 15.3 18.4Z" fill="currentColor" />
																</svg>
																' . $app_list_title . '
															</span> 
															<!--end::Svg Icon-->
														</a>
													</td>
													<td>
														<a onclick="appActivate(' . $app_activate . ')" class="btn btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
															<span class="svg-icon svg-icon-2x">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="currentColor" />
																	<path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="currentColor" />
																</svg>
																Activate
															</span>
															<!--end::Svg Icon-->
														</a>
													</td>
													<td>
														<a onclick="appDelete(' . $app_delete_status . ')" class="btn btn-bg-light btn-active-color-danger btn-sm">
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-2x">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
																</svg>
																Delete
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
									<!--end::Table container-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::API Method-->
						<!--begin::Sign-in Method-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
								<div class="card-title m-0">
									<h3 class="fw-bold m-0">Account enhancements</h3>
								</div>
							</div>
							<!--end::Card header-->
							<!--begin::Content-->
							<div id="kt_account_settings_signin_method" class="collapse show">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::Email Address-->
									<div class="d-flex flex-wrap align-items-center">
										<!--begin::Label-->
										<div id="kt_signin_email">
											<div class="fs-6 fw-bold mb-1">Email Address</div>
											<div class="fw-semibold text-gray-600"><?php echo $user_email; ?></div>
										</div>
										<!--end::Label-->
										<!--begin::Edit-->
										<div id="kt_signin_email_edit" class="flex-row-fluid d-none">
											<!--begin::Form-->
											<form id="kt_signin_change_email_em" class="form" novalidate="novalidate" method="POST">
												<div class="row mb-6">
													<div class="col-lg-6 mb-4 mb-lg-0">
														<div class="fv-row mb-0">
															<label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
															<input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="<?php echo $user_email; ?>" />
														</div>
													</div>
													<input name="edit" type="hidden" value="" />
													<div class="col-lg-6">
														<div class="fv-row mb-0">
															<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
															<input type="password" class="form-control form-control-lg form-control-solid" name="password" id="confirmemailpassword" />
														</div>
													</div>
												</div>

												<div class="modal fade" tabindex="-1" id="kt_modal_1">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title">Security Check</h3>

																<!--begin::Close-->
																<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
																	<span class="svg-icon svg-icon-1"></span>
																</div>
																<!--end::Close-->
															</div>

															<div class="modal-body">
																<h3 class="text-dark fw-bold fs-3 mb-5">Email Change Security Code Confirmation</h3>
																<div class="text-muted fw-semibold mb-10">Enter the 6 digit code that has been sent to your new email address to successfully update your email address.</div>

																<div class="mb-10 fv-row">
																	<input class="form-control form-control-lg form-control-solid" placeholder="Security code" id="codeNo2" name="code" />
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Change Email</button>
															</div>
														</div>
													</div>
												</div>
												<div class="d-flex">
													<button id="kt_changeMail" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
													<button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Edit-->
										<!--begin::Action-->
										<div id="kt_signin_email_button" class="ms-auto">
											<button class="btn btn-light btn-active-light-primary">Change Email</button>
										</div>
										<!--end::Action-->
									</div>
									<!--end::Email Address-->
									<!--begin::Separator-->
									<div class="separator separator-dashed my-6"></div>
									<!--end::Separator-->
									<!--begin::Password-->
									<div class="d-flex flex-wrap align-items-center mb-10">
										<!--begin::Label-->
										<div id="kt_signin_password">
											<div class="fs-6 fw-bold mb-1">Password</div>
											<div class="fw-semibold text-gray-600">************</div>
										</div>
										<!--end::Label-->
										<!--begin::Edit-->
										<div id="kt_signin_password_edit" class="flex-row-fluid d-none">
											<!--begin::Form-->
											<form id="kt_signin_change_password_psd" class="form" novalidate="novalidate" method="POST">
												<input name="edit" type="hidden" value="" />
												<div class="row mb-1">
													<div class="col-lg-4">
														<div class="fv-row mb-0">
															<label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
															<input type="password" class="form-control form-control-lg form-control-solid" name="curr_password" id="currentpassword" />
														</div>
													</div>
													<div class="col-lg-4">
														<div class="fv-row mb-0">
															<label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
															<input type="password" class="form-control form-control-lg form-control-solid" name="password" id="newpassword" />
														</div>
													</div>
													<div class="col-lg-4">
														<div class="fv-row mb-0">
															<label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
															<input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
														</div>
													</div>
												</div>
												<div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
												<div class="d-flex">
													<button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
													<button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Edit-->
										<!--begin::Action-->
										<div id="kt_signin_password_button" class="ms-auto">
											<button class="btn btn-light btn-active-light-primary" id="rst_btn">Reset Password</button>
										</div>
										<!--end::Action-->
									</div>
									<!--end::Password-->
									<!--begin::Notice-->
									<?php
									if ($user['two_auth'] > 0) {
										$auth_head = 'Account secured';
										$auth_class = 'bg-light-success rounded border-success';
										$auth_icon = 'svg-icon-success';
										$auth_btn = '<a href="#" class="btn btn-warning px-6 align-self-center text-nowrap" id="authDisable">Disable</a>';
									} else {
										$auth_head = 'Secure Your Account';
										$auth_class = 'bg-light-warning rounded border-warning';
										$auth_icon = 'svg-icon-warning';
										$auth_btn = '<a href="#" class="btn btn-success px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>';
									}

									?>
									<div class="notice d-flex <?php echo $auth_class ?> border border-dashed p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
										<span class="svg-icon svg-icon-2tx <?php echo $auth_icon ?> me-4">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
												<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->

										<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
											<!--begin::Content-->
											<div class="mb-3 mb-md-0 fw-semibold">
												<h4 class="text-gray-900 fw-bold"><?php echo $auth_head ?></h4>
												<div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
											</div>
											<!--end::Content-->
											<!--begin::Action-->

											<?php echo $auth_btn ?>
											<!--end::Action-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Sign-in Method-->
						<!--begin::Connected Accounts-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
								<div class="card-title m-0">
									<h3 class="fw-bold m-0">Connected Accounts</h3>
								</div>
							</div>
							<!--end::Card header-->
							<!--begin::Content-->
							<div id="kt_account_settings_connected_accounts" class="collapse show">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::Notice-->
									<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
										<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor" />
												<path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->
										<div class="d-flex flex-stack flex-grow-1">
											<!--begin::Content-->
											<div class="fw-semibold">
												<div class="fs-6 text-gray-700">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code.
													<a href="#" class="fw-bold">Learn More</a>
												</div>
											</div>
											<!--end::Content-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
									<!--begin::Items-->

									<div class="py-2">
										<?php
										if ($user['g_id'] != '') {
											if ($user['source'] == 'G0') {
												$g_btnC = ' checked="checked" disabled';
											} else {
												$g_btnC = ' id="googleswitch" checked="checked" ';
											}
											$g_btn = '<input class="form-check-input w-45px h-30px" type="checkbox" ' . $g_btnC . ' />';
										} else {
											include '../auth/google_connect.php';
											$g_btn = '<a class="btn btn-success" href="' . $client->createAuthUrl() . '" id="googleswitch">Connect</a>';
										}
										if ($user['f_id'] != '') {
											if ($user['source'] == 'F0') {
												$f_btnC = ' checked="checked" disabled';
											} else {
												$f_btnC = ' id="facebookswitch" checked="checked" ';
											}
											$f_btn = '<input class="form-check-input w-45px h-30px" type="checkbox" ' . $f_btnC . ' />';
										} else {
											$fb_url = $parent_url . '/auth/fb_4.php';
											include '../auth/fb_1.php';
											$f_btn = '<a class="btn btn-success" href="' . $loginUrl . '" id="facebookswitch">Connect</a>';
										}
										if ($user['t_id'] != '') {
											if ($user['source'] == 'T0') {
												$t_btnC = ' checked="checked" disabled';
											} else {
												$t_btnC = ' id="twitterswitch" checked="checked" ';
											}
											$t_btn = '<input class="form-check-input w-45px h-30px" type="checkbox" ' . $t_btnC . ' />';
										} else {
											$tw_url = $parent_url . '/account/settings';
											include '../auth/tww/tw_3.php';
											$t_btn = '<a class="btn btn-success" href="' . $url . '" id="twitterswitch">Connect</a>';
										}


										?>
										<!--begin::Item-->
										<div class="d-flex flex-stack">
											<div class="d-flex">
												<img src="../assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="" />
												<div class="d-flex flex-column">
													<a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
													<div class="fs-6 fw-semibold text-gray-400">Plan properly your workflow</div>
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<div class="form-check form-check-solid form-switch">
													<?php echo $g_btn; ?>
													<label class="form-check-label" for="googleswitch"></label>
												</div>
											</div>
										</div>
										<!--end::Item-->
										<div class="separator separator-dashed my-5"></div>
										<!--begin::Item-->
										<div class="d-flex flex-stack">
											<div class="d-flex">
												<img src="../assets/media/svg/brand-logos/facebook-4.svg" class="w-30px me-6" alt="" />
												<div class="d-flex flex-column">
													<a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Facebook</a>
													<div class="fs-6 fw-semibold text-gray-400">Connect to your friends and groups</div>
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<div class="form-check form-check-solid form-switch">
													<?php echo $f_btn; ?>
													<label class="form-check-label" for="facebookswitch"></label>
												</div>
											</div>
										</div>
										<!--end::Item-->
										<div class="separator separator-dashed my-5"></div>
										<!--begin::Item-->
										<div class="d-flex flex-stack">
											<div class="d-flex">
												<img src="../assets/media/svg/brand-logos/twitter_2.svg" class="w-30px me-6" alt="" />
												<div class="d-flex flex-column">
													<a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Twitter</a>
													<div class="fs-6 fw-semibold text-gray-400">Connect to your followers and circles</div>
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<div class="form-check form-check-solid form-switch">
													<?php echo $t_btn; ?>
													<label class="form-check-label" for="twitterswitch"></label>
												</div>
											</div>
										</div>
										<!--end::Item-->
									</div>
									<!--end::Items-->
								</div>
								<!--end::Card body-->

							</div>
							<!--end::Content-->
						</div>
						<!--end::Connected Accounts-->

						<!--begin::Deactivate Account-->
						<div class="card">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
								<div class="card-title m-0">
									<h3 class="fw-bold m-0">Deactivate Account</h3>
								</div>
							</div>
							<!--end::Card header-->
							<!--begin::Content-->
							<div id="kt_account_settings_deactivate" class="collapse show">
								<!--begin::Form-->
								<form id="kt_account_deactivate_form" class="form">
									<!--begin::Card body-->
									<div class="card-body border-top p-9">
										<!--begin::Notice-->
										<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
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
													<h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
													<div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset your password.
														<br />
														<a class="fw-bold" href="#">Learn more</a>
													</div>
												</div>
												<!--end::Content-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Notice-->
										<!--begin::Form input row-->
										<div class="form-check form-check-solid fv-row">
											<input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
											<label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
										</div>
										<!--end::Form input row-->
									</div>
									<!--end::Card body-->
									<!--begin::Card footer-->
									<div class="card-footer d-flex justify-content-end py-6 px-9">
										<button id="kt_account_deactivate_account_submit" type="button" class="btn btn-danger fw-semibold">Deactivate Account</button>
									</div>
									<!--end::Card footer-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Deactivate Account-->
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
<?php include '../auth/profile/profile_edit_ajax.php'; ?>
<script>
	// Phone
	Inputmask({
		"mask": "(999) 999-999-999"
	}).mask("#phoneNo");

	// Code
	Inputmask({
		"mask": "999-999"
	}).mask("#codeNo");
</script>

</html>