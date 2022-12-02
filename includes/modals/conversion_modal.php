		<!--begin::Modal - Create Campaign-->
		<div class="modal fade" id="kt_modal_top_up_wallet" tabindex="-1" aria-hidden="true">
		    <!--begin::Modal dialog-->
		    <div class="modal-dialog modal-lg p-9">
		        <!--begin::Modal content-->
		        <div class="modal-content modal-rounded">
		            <!--begin::Modal header-->
		            <div class="modal-header py-7 d-flex justify-content-between">
		                <!--begin::Modal title-->
		                <h2>Referral Points Conversion</h2>
		                <!--end::Modal title-->
		                <!--begin::Close-->
		                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" aria-label="Close">
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
		            <!--begin::Modal header-->
		            <!--begin::Modal body-->
		            <div class="modal-body scroll-y m-5">
		                <!--begin::Stepper-->
		                <div class="stepper stepper-links d-flex flex-column gap-5">
		                    <!--begin::Nav-->
		                    <div class="stepper-nav justify-content-center py-2">
		                        <!--begin::Step 1-->
		                        <div class="stepper-item current" data-kt-stepper-element="nav">
		                            <h3 class="stepper-title">Select where to settle the conversion.</h3>
		                        </div>
		                        <!--end::Step 1-->
		                    </div>
		                    <!--end::Nav-->
		                    <!--begin::Form-->
		                    <form class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_convert_points">
		                        <!--begin::Step 1-->
		                        <div class="current">
		                            <!--begin::Wrapper-->
		                            <div class="w-100">
		                                <!--begin::Heading-->
		                                <div class="pb-10 pb-lg-15">
		                                    <!--begin::Title-->
		                                    <h2 class="fw-bold d-flex align-items-center text-dark">Set Points to convert
		                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="You will be charged the set amount from your selected payment option"></i>
		                                    </h2>
		                                    <!--end::Title-->
		                                    <!--begin::Notice-->
		                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out
		                                        <a href="#" class="link-primary fw-bold">Help Page</a>.
		                                    </div>
		                                    <!--end::Notice-->
		                                </div>
		                                <!--end::Heading-->
		                                <!--begin::Input group-->
		                                <div class="mb-10 fv-row">
		                                    <!--begin::Label-->
		                                    <label class="form-label mb-3">
		                                        <span class="required">Points Amount</span>
		                                    </label>
		                                    <!--end::Label-->
		                                    <!--begin::Input-->
		                                    <?php
                                            if (isset($balance)) {
                                                $balance = $balance;
                                            } else {
                                                $balance = 0;
                                            }
                                            ?>
		                                    <input type="number" class="form-control form-control-lg form-control-solid" name="top_up_amount" placeholder="" value="<?php echo $balance ?>" max="<?php echo $balance ?>" autocomplete="off" />
		                                    <!--end::Input-->
		                                </div>
		                                <!--end::Input group-->
		                                <!--begin::Input group-->
		                                <div class="mb-10">
		                                    <!--begin::Label-->
		                                    <label class="required fw-semibold fs-6 mb-5">Conversion Type</label>
		                                    <!--end::Label-->
		                                    <!--begin::Row-->
		                                    <div class="row row-cols-1 row-cols-md-2 g-5">
		                                        <!--begin::Col-->
		                                        <div class="col">
		                                            <!--begin::Option-->
		                                            <input type="radio" class="btn-check" name="conversion" value="1" id="kt_radio_buttons_2_option_1" checked="checked" />
		                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center h-100" for="kt_radio_buttons_2_option_1">
		                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin010.svg-->
		                                                <span class="svg-icon svg-icon-3hx svg-icon-primary">
		                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                                        <path opacity="0.3" d="M20 18H4C3.4 18 3 17.6 3 17V7C3 6.4 3.4 6 4 6H20C20.6 6 21 6.4 21 7V17C21 17.6 20.6 18 20 18ZM12 8C10.3 8 9 9.8 9 12C9 14.2 10.3 16 12 16C13.7 16 15 14.2 15 12C15 9.8 13.7 8 12 8Z" fill="currentColor" />
		                                                        <path d="M18 6H20C20.6 6 21 6.4 21 7V9C19.3 9 18 7.7 18 6ZM6 6H4C3.4 6 3 6.4 3 7V9C4.7 9 6 7.7 6 6ZM21 17V15C19.3 15 18 16.3 18 18H20C20.6 18 21 17.6 21 17ZM3 15V17C3 17.6 3.4 18 4 18H6C6 16.3 4.7 15 3 15Z" fill="currentColor" />
		                                                    </svg>
		                                                </span>
		                                                <!--end::Svg Icon-->
		                                                <span class="d-block fw-semibold text-start">
		                                                    <span class="text-dark fw-bold d-block fs-3">Cash</span>
		                                                    <span class="text-muted fw-semibold fs-6">Convert points to cash and settle to your MPESA.</span>
		                                                </span>
		                                            </label>
		                                            <!--end::Option-->
		                                        </div>
		                                        <!--end::Col-->
		                                        <!--begin::Col-->
		                                        <div class="col">
		                                            <!--begin::Option-->
		                                            <input type="radio" class="btn-check" name="conversion" value="2" id="kt_radio_buttons_2_option_2" />
		                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center h-100" for="kt_radio_buttons_2_option_2">
		                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin009.svg-->
		                                                <span class="svg-icon svg-icon-3hx svg-icon-primary">
		                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                                        <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor" />
		                                                        <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor" />
		                                                        <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor" />
		                                                    </svg>
		                                                </span>
		                                                <!--end::Svg Icon-->
		                                                <span class="d-block fw-semibold text-start">
		                                                    <span class="text-dark fw-bold d-block fs-3">Wallet</span>
		                                                    <span class="text-muted fw-semibold fs-6">Settle convertion to Kotnova points wallet.</span>
		                                                </span>
		                                            </label>
		                                            <!--end::Option-->
		                                        </div>
		                                        <!--end::Col-->
		                                    </div>
		                                    <!--end::Row-->
		                                </div>
		                                <!--end::Input group-->
		                            </div>
		                            <!--end::Wrapper-->
		                        </div>
		                        <!--end::Step 1-->
		                        <!--begin::Actions-->
		                        <div class="d-flex flex-stack pt-10">
		                            <!--begin::Wrapper-->
		                            <div>
		                                <button type="submit" class="btn btn-lg btn-primary">
		                                    <span class="indicator-label">Submit
		                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
		                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
		                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
		                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
		                                            </svg>
		                                        </span>
		                                        <!--end::Svg Icon-->
		                                    </span>
		                                    <span class="indicator-progress">Please wait...
		                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
		                                </button>
		                            </div>
		                            <!--end::Wrapper-->
		                        </div>
		                        <!--end::Actions-->
		                    </form>
		                    <!--end::Form-->
		                </div>
		                <!--end::Stepper-->
		            </div>
		            <!--begin::Modal body-->
		        </div>
		    </div>
		</div>
		<!--end::Modal - Create Campaign-->