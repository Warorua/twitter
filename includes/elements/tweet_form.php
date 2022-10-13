<form id="<?php echo $form_id ?>" class="ql-quil ql-quil-plain pb-3" method="POST">
    <!--begin::Main form-->
    <div class="card card-flush mb-10">
        <!--begin::Header-->
        <div class="card-header justify-content-start align-items-center pt-4">
            <!--begin::Photo-->
            <div class="symbol symbol-45px me-5">
                <img src="<?php echo $t_user->getProfileImageUrl() ?>" class="" alt="" />
            </div>
            <!--end::Photo-->
            <span class="text-gray-400 fw-semibold fs-6">What’s on your mind, <?php echo $t_user->getName() ?>?</span>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2 pb-0">
            <!--begin::Input-->
            <textarea class="form-control bg-transparent border-0 px-0 h-125px" id="kt_social_feeds_post_input" name="text" data-kt-autosize="true" rows="1" placeholder="Type your message..."></textarea>
            <!--end::Input-->
            <div class="row g-5 w-100">
                <!--begin::Image input-->
                <div class="image-input image-input-outline col-md-5 mb-5" data-kt-image-input="true" style="background-image: url(../assets/media/stock/1600x800/img-3.jpg)">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-100 h-125px" style="background-image: url(../assets/media/stock/1600x800/img-3.jpg)"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>

                        <!--begin::Inputs-->
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->

                    <!--begin::Cancel button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel button-->

                    <!--begin::Remove button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove button-->
                </div>
                <!--end::Image input-->

                <!--begin::Image input-->
                <div class="image-input image-input-outline ms-5 col-md-5" data-kt-image-input="true" style="background-image: url(../assets/media/stock/1600x800/img-3.jpg)">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-100 h-125px" style="background-image: url(../assets/media/stock/1600x800/img-3.jpg)"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>

                        <!--begin::Inputs-->
                        <input type="file" name="image_2" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->

                    <!--begin::Cancel button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel button-->

                    <!--begin::Remove button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove button-->
                </div>
                <!--end::Image input-->
            </div>

            <!--begin::Option-->
            <label class="form-check form-check-inline form-check-solid mt-4">
                <input class="form-check-input" name="t_topic" type="checkbox" value="1" />
                <span class="fw-semibold ps-2 fs-6">Embed trending topics</span>
            </label>
            <!--end::Option-->


            <input type="hidden" name="logo" value="" />

            <div class="separator mt-5 mb-5"></div>


        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer d-flex justify-content-end pt-0">

            <!--begin::Post action-->
            <button class="btn btn-sm btn-primary" type="submit">
                <!--begin::Indicator label-->
                <span class="indicator-label">Post</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
            <!--end::Post action-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Main form-->
</form>