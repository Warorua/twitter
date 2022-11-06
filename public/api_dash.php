<?php
include '../includes/head.php';
if (isset($_GET['app_id'])) {
    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE id=:id AND user_id=:user_id AND level=:level");
    $stmt->execute(['id' => $_GET['app_id'], 'user_id' => $user['id'], 'level' => 0]);
    $app_data = $stmt->fetch();
    if ($app_data['numrows'] > 0) {
        $app_id = $_GET['app_id'];

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM api_shop WHERE app_id=:id");
        $stmt->execute(['id' => $app_id]);
        $my_app = $stmt->fetch();
        if ($my_app['numrows'] < 1) {
            $_SESSION['error'] = 'This App has not been listed for sale!';
            redirect($parent_url . '/account/user');
        } else {
            $stmt = $conn->prepare("SELECT * FROM api_shop WHERE app_id=:id");
            $stmt->execute(['id' => $app_id]);
            $my_app = $stmt->fetch();

            $stmt = $conn->prepare("SELECT * FROM client_api WHERE id=:id");
            $stmt->execute(['id' => $app_id]);
            $my_title = $stmt->fetch();
        }
    } else {
        $_SESSION['error'] = 'Forbidden request!';
        redirect($parent_url . '/account/user');
    }
} else {
    $_SESSION['error'] = 'Incomplete request!';
    redirect($parent_url . '/account/user');
}



$page_title = $my_title['title'];
$page_sub_1 = 'App shop';
$page_sub_2 = 'View';

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
                        <div class="row g-5 g-xl-10 mb-xl-10">
                            <!--begin::Tables Widget 11-->
                            <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">App Users</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">Users who have purchased the App</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bold text-muted bg-light">
                                                    <th class="ps-4 rounded-start">User</th>
                                                    <th class="">Net Usage</th>
                                                    <th class="">Status</th>
                                                    <th class=""></th>
                                                    <th class=" text-end rounded-end"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <?php
                                                $stmt = $conn->prepare("SELECT *, client_api.status AS act_status, client_api.user_id AS c_api_id FROM client_api LEFT JOIN users ON client_api.user_id=users.id WHERE client_api.consumer_key=:consumer_key");
                                                $stmt->execute(['consumer_key' => $my_title['consumer_key']]);
                                                $app_user = $stmt->fetchAll();
                                                $agg_net_usage = 0;
                                                foreach ($app_user as $row) {
                                                    $stmt = $conn->prepare("SELECT * FROM usage_track WHERE user_id=:user_id AND consumer_key=:consumer_key");
                                                    $stmt->execute(['user_id' => $row['user_id'], 'consumer_key' => $row['consumer_key']]);
                                                    $app_user_usage = $stmt->fetchAll();
                                                    $app_user_net_usage = 0;
                                                    foreach ($app_user_usage as $row_2) {
                                                        $app_user_net_usage += $row_2['points'];
                                                    }
                                                    if ($row['t_id'] == $user['t_id']) {
                                                        $app_user_badge = '<span class="badge badge-light-info fs-7 fw-bold">App Owner</span>';
                                                        $app_user_control_function = 'deactivateUser';
                                                        $app_user_title = 'Deactivate';
                                                    } elseif ($row['act_status'] == 1) {
                                                        $app_user_badge = '<span class="badge badge-light-primary fs-7 fw-bold">Active</span>';
                                                        $app_user_control_function = 'deactivateUser';
                                                        $app_user_title = 'Deactivate';
                                                    } else {
                                                        $app_user_badge = '<span class="badge badge-light-danger fs-7 fw-bold">Inactive</span>';
                                                        $app_user_control_function = 'activateUser';
                                                        $app_user_title = 'Activate';
                                                    }
                                                    $agg_net_usage += $app_user_net_usage;
                                                    $con_key = "'" . $row['consumer_key'] . "'";
                                                    echo '
                                                   <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
                                                            <img src="' . pic_fix($row['photo']) . '" class="" alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">' . $row['username'] . '</a>
                                                            <span class="text-muted fw-semibold text-muted d-block fs-7">' . $row['t_id'] . '</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">PTS. ' . $app_user_net_usage . '</a>
                                                    <span class="text-muted fw-semibold text-muted d-block fs-7">Aggregate points used</span>
                                                </td>
                                                <td>
                                                   ' . $app_user_badge . '
                                                </td>
                                                <td>
                                                   <a onclick="' . $app_user_control_function . '(' . $con_key . ', ' . $row['c_api_id'] . ')" class="btn btn-bg-light btn-active-color-primary btn-sm">
                                                   ' . $app_user_title . '
                                                  </a>
                                                </td>
                                                <td class="text-end">
                                             
                                                    <a onclick="removeUser(' . $con_key . ', ' . $row['c_api_id'] . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
                                                        </svg>
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
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 11-->
                            <!--begin::Col-->
                            <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                                <!--begin::Chart widget 3-->
                                <div class="card card-flush overflow-hidden h-md-100">
                                    <!--begin::Header-->
                                    <div class="card-header py-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-dark">App charges</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Update App charges</span>
                                        </h3>
                                        <!--end::Title-->
                                        <div class="card-toolbar">
                                            <a class="btn btn-flex btn-danger px-6" data-bs-toggle="modal" data-bs-target="#sys_listing_remove">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M5 22H19C19.6 22 20 21.6 20 21V8L14 2H5C4.4 2 4 2.4 4 3V21C4 21.6 4.4 22 5 22Z" fill="currentColor" />
                                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                                                        <rect x="7.55518" y="16.7585" width="10.144" height="2" rx="1" transform="rotate(-45 7.55518 16.7585)" fill="currentColor" />
                                                        <rect x="9.0174" y="9.60327" width="10.0952" height="2" rx="1" transform="rotate(45 9.0174 9.60327)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <span class="d-flex flex-column align-items-start ms-2">
                                                    <span class="fs-3 fw-bold">Unlist</span>
                                                    <span class="fs-7">Remove from catalog</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                        <!--begin::Statistics-->
                                        <div class="ps-4 pe-6">
                                            <!--begin::Statistics-->
                                            <div class="d-flex mb-2">
                                                <span class="fs-4 fw-semibold text-gray-400 me-1">PTS</span>
                                                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2"><?php echo number_format($agg_net_usage, 2) ?></span>
                                            </div>
                                            <!--end::Statistics-->
                                            <!--begin::Description-->
                                            <span class="fs-6 fw-semibold text-gray-400">Aggregate Points usage</span>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Statistics-->
                                        <!--begin::form-->
                                        <form class="ps-4 pe-6" id="appChargeUpdate">
                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7">
                                                <input type="number" class="form-control" id="floatingInput" name="like_charge" placeholder="Your App like charge" min="0" value="<?php echo (int)$my_app['like_charge'] ?>" />
                                                <label for="floatingInput">Like Charge</label>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7">
                                                <input type="number" class="form-control" id="floatingPassword" name="follow_charge" placeholder="Your App follow charge" min="0" value="<?php echo (int)$my_app['follow_charge'] ?>" />
                                                <label for="floatingPassword">Follow Charge</label>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7">
                                                <input type="number" class="form-control" id="floatingInputValue" name="tweet_charge" placeholder="Your App tweet charge" min="0" value="<?php echo (int)$my_app['tweet_charge'] ?>" />
                                                <label for="floatingInputValue">Tweet Charge</label>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingInputValue" name="max_user" placeholder="Maximum users who can purchase the app" min="0" value="<?php echo (int)$my_app['max_user'] ?>" />
                                                <label for="floatingInputValue">Max App Users</label>
                                            </div>
                                            <!--end::Input group-->

                                            <input type="hidden" name="id" value="<?php echo $app_id ?>" />
                                            <input type="hidden" name="user" value="<?php echo $user['id'] ?>" />

                                            <button type="button" class="btn btn-primary hover-elevate-up mt-7" data-bs-toggle="modal" data-bs-target="#sys_listing_update">Update listing</button>


                                            <div class="modal fade" tabindex="-1" id="sys_listing_update">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Update Listing</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <span class="svg-icon svg-icon-1"></span>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="rounded w-100 bg-light-danger p-4">
                                                                <p class="fs-4 text-danger fw-bold text-center">Are you sure you want to update the listing charges? All subscribed users will be unsubscribed automatically after this action!</p>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="modal fade" tabindex="-1" id="sys_listing_remove">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Delete Listing</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <span class="svg-icon svg-icon-1"></span>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="rounded w-100 bg-light-danger p-4">
                                                            <p class="fs-4 text-danger fw-bold text-center">Are you sure you want to unlist this app? All subscribed users will be unsubscribed automatically after this action!</p>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <a href="../process/post/api_unlisting.php?id=<?php echo $app_id ?>&user=<?php echo $user['id'] ?>" class="btn btn-primary">Unlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--end::form-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Chart widget 3-->
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
        var table = $("#kt_datatable_dom_positioning").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            'order': [],
            'pageLength': 10,
            "scrollCollapse": true,
            "search": {
                "smart": false,
                "select": 'single',
                "info": false,
                "keys": true
            },
            "lengthChange": true,
            "autoWidth": false,
            "stateSave": true,
            buttons: [
                'copy',
                'excel',
                {
                    extend: 'pdf',
                    text: 'Export PDF',
                    title: 'Twitter data'
                },
                'csv',
                'print'
            ],
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
        const documentTitle = 'Customer Orders Report';
        table.buttons({
            buttons: [{
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('.card-toolbar'));
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->
<?php include '../includes/alert.php';
//session_destroy();

?>
<!-- apps/calendar.html 23:02:17 GMT -->

</html>