<?php
include '../includes/head.php';
if (isset($_GET['app'])) {
    $stmt = $conn->prepare("SELECT *, api_shop.id AS shop_app_id FROM api_shop LEFT JOIN client_api ON api_shop.app_id=client_api.id WHERE client_api.id=:id");
    $stmt->execute(['id' => $_GET['app']]);
    $app = $stmt->fetch();
    if (count($app) > 0) {
        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id AND consumer_key=:consumer_key AND level=:level");
        $stmt->execute(['user_id' => $user['id'], 'consumer_key'=>$app['consumer_key'], 'level'=>1]);
        $verif_us = $stmt->fetch();
        if($verif_us['numrows'] > 0){
            $_SESSION['error'] = 'You are already subscribed to this app!';
            redirect($parent_url . '/account/user');
        }

        try {

            if ($app['user_id'] != $user['id']) {
                $st_pos = '
	          <span class="svg-icon svg-icon-5 svg-icon-success ms-1">
	         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
		        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
	         </svg>
             </span>
	          ';
                $st_neg = '
	            <span class="svg-icon svg-icon-5 svg-icon-danger ms-1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	          <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
	          <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
              </svg>
                </span>
	         ';

                if ($app['like_charge'] > $system_charge['like_charge']) {
                    $like_status = $st_neg;
                } else {
                    $like_status = $st_pos;
                }

                if ($app['follow_charge'] > $system_charge['follow_charge']) {
                    $follow_status = $st_neg;
                } else {
                    $follow_status = $st_pos;
                }

                if ($app['tweet_charge'] > $system_charge['tweet_charge']) {
                    $tweet_status = $st_neg;
                } else {
                    $tweet_status = $st_pos;
                }

                $subcriber_consumer_key = $app['consumer_key'];
                $subcriber_consumer_secret = $app['consumer_secret'];
                $tw_url = $parent_url . '/v3/subscribe?app=' . $_GET['app'];
                include '../auth/tww/tw_4.php';
            } else {
                $_SESSION['error'] = 'Forbidden action!';
                redirect($parent_url . '/account/user');
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'App has a technical error!';
            redirect($parent_url . '/account/user');
        }
    } else {
        $_SESSION['error'] = 'App not found';
        redirect($parent_url . '/account/user');
    }
} else {
    $_SESSION['error'] = 'Incomplete request';
    redirect($parent_url . '/account/user');
}

$page_title = 'App Shop';
$page_sub_1 = 'Apps';
$page_sub_2 = 'Subscribe';
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
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDKZXTL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-8">
                            <?php


                            ?>

                            <!--begin::Col-->
                            <div class="col-xxl-8">
                                <!--begin::Chart widget 22-->
                                <div class="card h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header position-relative py-0 border-bottom-2">
                                        <!--begin::Nav-->
                                        <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-3">
                                            <!--begin::Item-->
                                            <li class="nav-item p-0 ms-0 me-8">
                                                <!--begin::Link-->
                                                <a class="nav-link btn btn-color-muted active px-0" data-bs-toggle="tab" id="kt_chart_widgets_22_tab_1" href="#kt_chart_widgets_22_tab_content_1">
                                                    <!--begin::Subtitle-->
                                                    <span class="nav-text fw-semibold fs-4 mb-3"><?php echo $app['title'] ?></span>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Bullet-->
                                                    <span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                                                    <!--end::Bullet-->
                                                </a>
                                                <!--end::Link-->
                                            </li>
                                            <!--end::Item-->
                                        </ul>
                                        <!--end::Nav-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">


                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pb-3">
                                        <!--begin::Tab Content-->
                                        <div class="tab-content">
                                            <!--begin::Tap pane-->
                                            <div class="tab-pane fade show active" id="kt_chart_widgets_22_tab_content_1">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-wrap flex-md-nowrap">
                                                    <!--begin::Items-->
                                                    <div class="me-md-5 w-100">
                                                        <!--begin::Item-->
                                                        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                            <!--begin::Block-->
                                                            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-50px me-4">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                        <span class="svg-icon svg-icon-2qx svg-icon-primary">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="me-2">
                                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Like</a>
                                                                    <span class="text-gray-400 fw-bold d-block fs-7">Charge for a like</span>
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Block-->
                                                            <!--begin::Info-->
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-dark fw-bolder fs-2x"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($app['like_charge'])  ?></span>
                                                                <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($system_charge['like_charge'])  ?></span>
                                                                <span class="badge badge-lg badge-light-dark align-self-center px-2"><?php echo $like_status  ?></span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                            <!--begin::Block-->
                                                            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-50px me-4">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                                        <span class="svg-icon svg-icon-2qx svg-icon-primary">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor" />
                                                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor" />
                                                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="me-2">
                                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Tweet</a>
                                                                    <span class="text-gray-400 fw-bold d-block fs-7">Charge for a tweet</span>
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Block-->
                                                            <!--begin::Info-->
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-dark fw-bolder fs-2x"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($app['tweet_charge'])  ?></span>
                                                                <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($system_charge['tweet_charge'])  ?></span>
                                                                <span class="badge badge-lg badge-light-dark align-self-center px-2"><?php echo $tweet_status  ?></span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                            <!--begin::Block-->
                                                            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-50px me-4">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
                                                                        <span class="svg-icon svg-icon-2qx svg-icon-primary">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
                                                                                <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="me-2">
                                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Follow</a>
                                                                    <span class="text-gray-400 fw-bold d-block fs-7">Charge for a follow</span>
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Block-->
                                                            <!--begin::Info-->
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-dark fw-bolder fs-2x"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($app['follow_charge'])  ?></span>
                                                                <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($system_charge['follow_charge'])  ?></span>
                                                                <span class="badge badge-lg badge-light-dark align-self-center px-2"><?php echo $follow_status  ?></span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                    <!--begin::Container-->
                                                    <div class="d-flex justify-content-between flex-column w-225px w-md-600px mx-auto mx-md-0 pt-3 pb-10">
                                                        <!--begin::Title-->
                                                        <div class="fs-4 fw-bold text-gray-900 text-center mb-5">App charges
                                                            <br />graphical representation
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Chart-->
                                                        <div id="app_subscriber_graph" class="mx-auto mb-4"></div>
                                                        <!--end::Chart-->
                                                        <!--begin::Labels-->
                                                        <div class="mx-auto">
                                                            <!--begin::Label-->
                                                            <div class="d-flex align-items-center mb-2">
                                                                <!--begin::Bullet-->
                                                                <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                                                                <!--end::Bullet-->
                                                                <!--begin::Label-->
                                                                <div class="fs-8 fw-semibold text-muted">Follow Charge</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--begin::Label-->
                                                            <div class="d-flex align-items-center mb-2">
                                                                <!--begin::Bullet-->
                                                                <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                                                                <!--end::Bullet-->
                                                                <!--begin::Label-->
                                                                <div class="fs-8 fw-semibold text-muted">Tweet Charge</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--begin::Label-->
                                                            <div class="d-flex align-items-center mb-2">
                                                                <!--begin::Bullet-->
                                                                <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                                                                <!--end::Bullet-->
                                                                <!--begin::Label-->
                                                                <div class="fs-8 fw-semibold text-muted">Like Charge</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Labels-->
                                                    </div>
                                                    <!--end::Container-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Tap pane-->
                                        </div>
                                        <!--end::Tab Content-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end::Chart widget 22-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <!--begin::Mixed Widget 1-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Header-->
                                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-dark">
                                            <!--begin::Heading-->
                                            <div class="d-flex flex-stack">
                                                <h3 class="m-0 text-success fw-bold fs-3">Featured App</h3>
                                                <div class="ms-1">
                                                    <!--begin::Menu-->
                                                    <!--end::Menu-->
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Balance-->
                                            <div class="d-flex text-center flex-column text-info pt-8">
                                                <span class="fw-semibold fs-7 text-primary">App Source Label</span>
                                                <span class="fw-bold fs-2x pt-1"><?php echo $app['title'] ?></span>
                                            </div>
                                            <!--end::Balance-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Items-->
                                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-6">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45px w-40px me-5">
                                                    <span class="symbol-label bg-lighten">
                                                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center flex-wrap w-100">
                                                    <!--begin::Title-->
                                                    <div class="mb-1 pe-3 flex-grow-1">
                                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Like</a>
                                                        <div class="text-gray-400 fw-semibold fs-7">Like Charge</div>
                                                    </div>
                                                    <!--end::Title-->
                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-bold fs-5 text-gray-800 pe-1"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($app['like_charge'], 2)  ?></div>
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <?php echo $like_status  ?>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-6">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45px w-40px me-5">
                                                    <span class="symbol-label bg-lighten">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor" />
                                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor" />
                                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center flex-wrap w-100">
                                                    <!--begin::Title-->
                                                    <div class="mb-1 pe-3 flex-grow-1">
                                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Tweet</a>
                                                        <div class="text-gray-400 fw-semibold fs-7">Tweet Charge</div>
                                                    </div>
                                                    <!--end::Title-->
                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-bold fs-5 text-gray-800 pe-1"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($app['tweet_charge'], 2)  ?></div>
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                        <?php echo $tweet_status  ?>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-6">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45px w-40px me-5">
                                                    <span class="symbol-label bg-lighten">
                                                        <!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
                                                                <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center flex-wrap w-100">
                                                    <!--begin::Title-->
                                                    <div class="mb-1 pe-3 flex-grow-1">
                                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Follow</a>
                                                        <div class="text-gray-400 fw-semibold fs-7">Follow Charge</div>
                                                    </div>
                                                    <!--end::Title-->
                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-bold fs-5 text-gray-800 pe-1"><span class="fs-8 fw-light text-muted">PTS.</span><?php echo number_format($app['follow_charge'], 2)  ?></div>
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <?php echo $follow_status  ?>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Description-->
                                                <a href="<?php echo $sub_url ?>" class="btn btn-icon-primary btn-text-info w-100 btn-light-info">
                                                    <span class="svg-icon svg-icon-2x">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="currentColor" />
                                                            <path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="currentColor" />
                                                        </svg>
                                                    </span>Subscribe
                                                </a>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 1-->
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->

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
    <?php include '../includes/scripts.php';
    //$_SESSION['error'] = $fbemail;
    ?>

    <script>
        var KTChartsWidget22 = (function() {
            var e = function(e, t, a, l) {
                var r = document.querySelector(t);
                if (r) {
                    parseInt(KTUtil.css(r, "height"));
                    var o = {
                            series: a,
                            chart: {
                                fontFamily: "inherit",
                                type: "donut",
                                width: 250
                            },
                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: "50%",
                                        labels: {
                                            value: {
                                                fontSize: "10px"
                                            }
                                        }
                                    },
                                },
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--kt-info"),
                                KTUtil.getCssVariableValue("--kt-success"),
                                KTUtil.getCssVariableValue("--kt-primary"),
                                KTUtil.getCssVariableValue("--kt-danger"),
                            ],
                            stroke: {
                                width: 0
                            },
                            labels: ["Like Charge", "Follow Charge", "Tweet Charge"],
                            legend: {
                                show: !1
                            },
                            fill: {
                                type: "false"
                            },
                        },
                        i = new ApexCharts(r, o),
                        s = !1,
                        n = document.querySelector(e);
                    !0 === l && (i.render(), (s = !0)),
                        n.addEventListener("shown.bs.tab", function(e) {
                            0 == s && (i.render(), (s = !0));
                        });
                }
            };
            return {
                init: function() {
                    e(
                            "#kt_chart_widgets_22_tab_1",
                            "#app_subscriber_graph",
                            [<?php echo $app['like_charge'] ?>, <?php echo $app['follow_charge'] ?>, <?php echo $app['tweet_charge'] ?>],
                            !0
                        ),
                        e(
                            "#kt_chart_widgets_22_tab_2",
                            "#kt_chart_widgets_22_chart_2",
                            [70, 13, 11],
                            !1
                        );
                },
            };
        })();
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>