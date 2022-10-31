<form id="<?php echo $form_id ?>" class="ql-quil ql-quil-plain pb-3" method="POST" action="..<?php echo $form_action ?>" enctype="multipart/form-data">
    <!--begin::Main form-->
    <div class="card card-flush mb-10">
        <!--begin::Header-->
        <div class="card-header justify-content-start align-items-center pt-4">
            <!--begin::Photo-->
            <div class="symbol symbol-45px me-5">
                <img src="<?php echo pic_fix($t_user->getProfileImageUrl()) ?>" class="" alt="" />
            </div>
            <!--end::Photo-->
            <span class="text-gray-400 fw-semibold fs-6">What’s on your mind, <?php echo $t_user->getName() ?>?</span>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2 pb-0">
            <!--begin::Input-->
            <textarea class="form-control bg-transparent border-0 px-0 h-125px" id="kt_social_feeds_post_input" name="text" data-kt-autosize="true" rows="1" placeholder="Type your <?php echo $rep_text ?>..."></textarea>
            <!--end::Input-->

            
            <div class="row g-5 w-100">

            <select class="form-select form-select-sm form-select-solid mb-4" name="font" data-control="select2" data-placeholder="Choose tweet font">
                <option></option>
               <option value="NO" selected>Tweet font</option>
                <?php
                $str = "Tweet font";
                foreach($fontsMap as $id=>$rtf){
                    echo '<option value="'.$id.'">'.tweetfont($fontsMap[$id], $str).'</option>';
                }

                ?>
               
            </select>




                <?php echo $rep_status ?>



                <!--begin::Input group-->
                <div class="form-group row">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label text-lg-right">Attach media:</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-10">
                        <!--begin::Dropzone-->
                        <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs_example_3">
                            <!--begin::Controls-->
                            <div class="dropzone-panel mb-lg-0 mb-2">
                                <a class="dropzone-select btn btn-sm btn-primary me-2">Attach media</a>
                                <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a>
                            </div>
                            <!--end::Controls-->

                            <!--begin::Items-->
                            <div class="dropzone-items wm-200px">
                                <div class="dropzone-item" style="display:none">
                                    <!--begin::File-->
                                    <div class="dropzone-file">
                                        <div class="dropzone-filename" title="Tweet_media.jpg">
                                            <span data-dz-name>Tweet_media.jpg</span>
                                            <strong>(<span data-dz-size>340kb</span>)</strong>
                                        </div>

                                        <div class="dropzone-error" data-dz-errormessage></div>
                                    </div>
                                    <!--end::File-->

                                    <!--begin::Progress-->
                                    <div class="dropzone-progress">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Toolbar-->
                                    <div class="dropzone-toolbar">
                                        <span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Dropzone-->

                        <!--begin::Hint-->
                        <span class="form-text text-muted">Max media size is 15MB and max number of files is 4.</span>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->




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