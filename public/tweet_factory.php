<?php
include '../includes/head.php';
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
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDKZXTL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
                    <a href="https://preview.Kotnova.com/html/metronic/docs/getting-started" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
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
                        <!--begin::Block-->
                        <div class="py-5">
                            <div class="d-flex flex-column flex-md-row rounded border p-10">
                                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-200px">
                                    <li class="nav-item w-100 me-0 mb-md-2">
                                        <a class="nav-link w-100 active btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                            <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M18 10V20C18 20.6 18.4 21 19 21C19.6 21 20 20.6 20 20V10H18Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M11 10V17H6V10H4V20C4 20.6 4.4 21 5 21H12C12.6 21 13 20.6 13 20V10H11Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M10 10C10 11.1 9.1 12 8 12C6.9 12 6 11.1 6 10H10Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M18 10C18 11.1 17.1 12 16 12C14.9 12 14 11.1 14 10H18Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M14 4H10V10H14V4Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M17 4H20L22 10H18L17 4Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M7 4H4L2 10H6L7 4Z" fill="currentColor" />
                                                    <path d="M6 10C6 11.1 5.1 12 4 12C2.9 12 2 11.1 2 10H6ZM10 10C10 11.1 10.9 12 12 12C13.1 12 14 11.1 14 10H10ZM18 10C18 11.1 18.9 12 20 12C21.1 12 22 11.1 22 10H18ZM19 2H5C4.4 2 4 2.4 4 3V4H20V3C20 2.4 19.6 2 19 2ZM12 17C12 16.4 11.6 16 11 16H6C5.4 16 5 16.4 5 17C5 17.6 5.4 18 6 18H11C11.6 18 12 17.6 12 17Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <span class="d-flex flex-column align-items-start">
                                                <span class="fs-4 fw-bold">Tweet Shop</span>
                                                <span class="fs-7">New Subscription</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item w-100 me-0 mb-md-2">
                                        <a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_5">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen003.svg-->
                                            <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 11.3V11C5 9.9 5.9 9 7 9H17C18.1 9 19 9.9 19 11V11.3C18.7 11.1 18.4 11 18 11H6C5.6 11 5.3 11.1 5 11.3ZM4 13H3C2.4 13 2 13.4 2 14V18C2 18.6 2.4 19 3 19H4V13ZM22 18V14C22 13.4 21.6 13 21 13H20V19H21C21.6 19 22 18.6 22 18Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M18 21H6C4.9 21 4 20.1 4 19V13C4 11.9 4.9 11 6 11H18C19.1 11 20 11.9 20 13V19C20 20.1 19.1 21 18 21ZM14 3C14 2.4 13.6 2 13 2H11C10.4 2 10 2.4 10 3V9H14V3ZM6 12C5.4 12 5 12.4 5 13C5 13.6 5.4 14 6 14C6.6 14 7 13.6 7 13C7 12.4 6.6 12 6 12ZM18 12C17.4 12 17 12.4 17 13C17 13.6 17.4 14 18 14C18.6 14 19 13.6 19 13C19 12.4 18.6 12 18 12ZM6 18C5.4 18 5 18.4 5 19C5 19.6 5.4 20 6 20C6.6 20 7 19.6 7 19C7 18.4 6.6 18 6 18ZM18 18C17.4 18 17 18.4 17 19C17 19.6 17.4 20 18 20C18.6 20 19 19.6 19 19C19 18.4 18.6 18 18 18Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <span class="d-flex flex-column align-items-start">
                                                <span class="fs-4 fw-bold">Industry</span>
                                                <span class="fs-7">Active Subscriptions</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link w-100 btn btn-flex btn-active-light-danger" data-bs-toggle="tab" href="#kt_vtab_pane_6">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen017.svg-->
                                            <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 15.9C9.5 13 6.5 11 3 11C3 15.6 6.5 19.4 11 19.9V15.9Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M21 11C17.5 11 14.5 13 13 15.9V11C13 10.4 12.6 10 12 10C11.4 10 11 10.4 11 11V21C11 21.6 11.4 22 12 22C12.6 22 13 21.6 13 21V19.9C17.5 19.4 21 15.6 21 11Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M12 9C13.933 9 15.5 7.433 15.5 5.5C15.5 3.567 13.933 2 12 2C10.067 2 8.5 3.567 8.5 5.5C8.5 7.433 10.067 9 12 9Z" fill="currentColor" />
                                                    <path d="M14 11L12 12L10 11V8.40002H14V11Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <span class="d-flex flex-column align-items-start">
                                                <span class="fs-4 fw-bold">Custom</span>
                                                <span class="fs-7">Genchi genbutsu</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kt_vtab_pane_4" role="tabpanel">
                                        <div class="row">
                                            <?php
                                            $stmt = $conn->prepare("SELECT DISTINCT category FROM automation_scripts");
                                            $stmt->execute();
                                            $data_1 = $stmt->fetchAll();

                                            foreach ($data_1 as $row_1) {
                                                $stmt = $conn->prepare("SELECT * FROM automation_scripts WHERE category=:category");
                                                $stmt->execute(['category' => $row_1['category']]);
                                                $data_2 = $stmt->fetchAll();
                                                echo '
                                             <div class="col-md-12">
                                                <!--begin::List Widget 9-->
                                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                                    <!--begin::Header-->
                                                    <div class="card-header align-items-center border-0 mt-3">
                                                        <h3 class="card-title align-items-start flex-column">
                                                            <span class="fw-bold text-dark fs-3">' . ucfirst($row_1['category']) . '</span>
                                                            <span class="text-gray-400 mt-2 fw-semibold fs-6">Active ' . $row_1['category'] . ' tweet sources</span>
                                                        </h3>
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Body-->
                                                    <div class="card-body pt-5">
                                                ';
                                                foreach ($data_2 as $row_2) {
                                                    echo  ' <!--begin::Item-->
                                                        <div class="d-flex mb-7" onclick="tweetFactory(' . $row_2['id'] . ')">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                                <img src="' . $row_2['logo'] . '" class="mw-100" alt="" />
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                                    <a class="fs-5 text-gray-800 text-hover-primary fw-bold">' . $row_2['title'] . '</a>
                                                                    <span class="text-gray-400 fw-semibold fs-7 my-1">' . $row_2['description'] . '</span>
                                                                    <span class="text-gray-400 fw-semibold fs-7">By:
                                                                        <a class="text-primary fw-bold">' . $row_2['author'] . '</a></span>
                                                                </div>
                                                                <!--end::Title-->
                                                                <!--begin::Info-->
                                                                <div class="text-end py-lg-0 py-2">
                                                                    <span class="text-gray-800 fw-bolder fs-3">' . $row_2['execution'] . '</span>
                                                                    <span class="text-gray-400 fs-7 fw-semibold d-block">Ms</span>
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        ';
                                                }


                                                echo '
                                                          </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::List Widget 9-->
                                             </div>
                                                ';
                                            }

                                            ?>




                                            <div class="col-md-12">
                                                <!--begin::List Widget 9-->
                                                <div class="card card-xl-stretch mb-5 mb-xl-8">

                                                    <!--begin::Body-->
                                                    <div class="card-body pt-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex mb-7">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                                <img src="../assets/media/logos/icon_b.png" class="mw-100" alt="" />
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Tweet Automation</a>
                                                                    <span class="text-gray-400 fw-semibold fs-7 my-1">Engine Active</span>

                                                                </div>
                                                                <!--end::Title-->
                                                                <!--begin::Info-->
                                                                <div class="text-end py-lg-0 py-2">
                                                                    <span class="text-gray-800 fw-bolder fs-3">0.00</span>
                                                                    <span class="text-gray-400 fs-7 fw-semibold d-block">Ms</span>
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::List Widget 9-->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade w-100" id="kt_vtab_pane_5" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 w-100">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fw-bold text-muted">
                                                        <th class="w-25px">
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-200px">Source</th>
                                                        <th class="min-w-150px">Category</th>
                                                        <th class="min-w-150px">Tweet Rate</th>
                                                        <th class="min-w-100px text-end">Actions</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody id="activefactBody">


                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <div class="tab-pane fade col-12" id="kt_vtab_pane_6" role="tabpanel">
                                        <div class="fw-bold fs-3 mb-4">Custom Tweet factory</div>
                                        <form id="tweetFactory" class="ql-quil ql-quil-plain pb-3" method="POST" action="../process/post/tweet_factory_custom.php" enctype="multipart/form-data">
                                            <div class="form-group row mb-5 w-100">
                                                <!--begin::Input group-->
                                                <div class="form-floating mb-7 col-md-4">
                                                    <input type="text" class="form-control" id="floatingTitle" name="title" placeholder="Automation Title" />
                                                    <label for="floatingTitle">Title</label>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="form-floating mb-7 col-md-4">
                                                    <input type="text" class="form-control" id="floatingDescription" name="desc" placeholder="Automation Description" />
                                                    <label for="floatingDescription">Description</label>
                                                </div>
                                                <!--end::Input group-->
                                                <?php
                                                $stmt = $conn->prepare("SELECT * FROM tweet_factory WHERE user_id=:user_id ORDER BY id ASC LIMIT 1");
                                                $stmt->execute(['user_id' => $user['id']]);
                                                $fact_cont = $stmt->fetch();

                                                if (is_array($fact_cont)) {
                                                    if (count($fact_cont) > 0) {
                                                        $fact_cont_time = number_format(($fact_cont['execution'] / 60) + 10, 0);
                                                    } else {
                                                        $fact_cont_time = 10;
                                                    }
                                                } else {
                                                    $fact_cont_time = 10;
                                                }


                                                ?>
                                                <!--begin::Input group-->
                                                <div class="form-floating col-md-4">
                                                    <input type="number" class="form-control" id="floatingDuration" name="duration" placeholder="Tweet duration" min="<?php echo $fact_cont_time ?>" value="<?php echo $fact_cont_time ?>" />
                                                    <label for="floatingDuration">Tweet every(minutes)</label>
                                                </div>
                                                <!--end::Input group-->
                                            </div>


                                            <!--begin::Repeater-->
                                            <div id="kt_docs_repeater_advanced">
                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <div data-repeater-list="kt_docs_repeater_advanced">
                                                        <div data-repeater-item>
                                                            <div class="form-group row mb-5 w-100">
                                                                <div class="col-md-10">
                                                                    <label class="form-label">Grammar Rule:</label>
                                                                    <input class="form-control" name="rule" data-kt-repeater="tagify" value="part 1(a), part 1(b), part 1(c)" required />
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-9">
                                                                        <i class="bi bi-trash3-fill fs-3"></i>Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Form group-->

                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                        <i class="bi bi-plus-circle-fill fs-3"></i>Add Grammar Rule
                                                    </a>
                                                    <button type="submit" id="factoryPreview" class="btn btn-light-info mt-3">
                                                        <i class="bi bi-binoculars-fill fs-3"></i>Preview Result
                                                    </button>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->

                                            <!--begin::Input group-->
                                            <div class="form-group row mt-7">
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
                                                    <span class="form-text text-muted">Max media size is 15MB and max number of files is 50.</span>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <button type="submit" id="factorySubmit" class="btn btn-primary mt-7">Create Automation</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Block-->
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
        ////custom api
        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();

                // Re-init tagify
                new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            },

            ready: function() {

                // Init Tagify
                new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
            }
        });
    </script>

    <script>
        // set the dropzone container id
        const id = "#tweetFactory";
        const dropzone = document.querySelector(id);

        // set the preview element template
        var previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            //url: "", // Set the url for your upload script location
            //method: "post",
            parallelUploads: 50,
            paramName: "file",
            maxFiles: 50,
            maxFilesize: 15, // Max filesize in MB
            acceptedFiles: ".jpeg,.png,.gif,.mp4,.jpg",
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
            maxfilesexceeded: function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Maximum files allowed is 20.'
                })
            },
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.width = progress + "%";
            });
        });

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.opacity = "1";
            });
        });

        // Hide the total progress bar when nothing"s uploading anymore
        myDropzone.on("complete", function(progress) {
            const progressBars = dropzone.querySelectorAll('.dz-complete');

            setTimeout(function() {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                });
            }, 300);
        });




        $('#factorySubmit').on('click', function(e) {
            btnCheck = 'submit';
            return btnCheck;
        });

        $('#factoryPreview').on('click', function(e) {
            btnCheck = 'preview';
            return btnCheck;
        });


        /////////////////////////final form process
        $(document).on('submit', '#tweetFactory', function(e) {
            e.preventDefault();

            formData = new FormData(this);
            myForm = this;
            //formData.append('avatar', $('#upload_file_fr').files);
            //  alert(e.type);
            // alert(btnCheck);
            if (btnCheck == 'submit') {
                //*
                $.ajax({
                    method: "POST",
                    url: "../process/post/tweet_factory_custom.php",
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    enctype: 'multipart/form-data',

                    success: function(data) {
                        // alert(data);
                        //console.log(data); 

                        window.location.reload();
                    }
                }); //*/
            } else if (btnCheck == 'preview') {
                $.ajax({
                    method: "POST",
                    url: "../process/post/factory_preview.php",
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    enctype: 'multipart/form-data',

                    success: function(arr) {
                        // var status;
                        data = $.parseJSON(arr);

                        Swal.fire(data[1], '', data[0]);
                        $(myForm).children('button[type="submit"]').text("Create Automation");
                    }
                });
            }

        });


        $(document).ready(activeIndustry());

        function activeIndustry() {
            //*
            $.ajax({
                method: "POST",
                url: "../process/get/active_factory.php",
                success: function(data) {

                    $('#activefactBody').html(data);

                }
            }); //*/
        }
    </script>


    <!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php';
//session_destroy();

?>
<!-- apps/chat/private.html 23:02:14 GMT -->

</html>