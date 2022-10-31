<?php
include '../includes/head.php';
// include '../includes/conn.php';
// include '../includes/session.php';
if (isset($_POST['search'])) {
    if(isset($_POST['query'])){
   $full_query = $_POST['query'];
    }else{
           $query_inc = $_POST['query_inc'];
    $query_exc = $_POST['query_exc'];
    $reply_to = $_POST['reply_to'];
    if(isset($_POST['from'])){
        $from = $_POST['from'];
    }else{
        $from = '';
    }
    
    if(isset($_POST['filter_out'])){
        $filter_out = $_POST['filter_out'];
    }else{
        $filter_out = '';
    }

    if(isset($_POST['attitude'])){
        $attitude = $_POST['attitude'];
    }else{
        $attitude = '';
    }
    
    if(isset($_POST['sensitivity'])){
        $sensitivity = $_POST['sensitivity'];
    }else{
        $sensitivity = '';
    }
   
    $url = $_POST['url'];
    $date_range = $_POST['date_range'];

    $full_query = '';

    if ($query_inc != '') {
        $full_query  .= $query_inc . ' ';
    }
    if ($query_exc != '') {
        $full_query  .= '-' . $query_exc . ' ';
    }
    if ($reply_to != '') {
        $full_query  .= 'to:' . $reply_to . ' ';
    }
    if ($from != '') {
        $full_query  .= 'from:' . $from . ' ';
    }
 
    if ($filter_out != '') {
        $f_out = count($filter_out);
        if ($f_out > 1) {
            foreach ($filter_out as $f_out) {
                $full_query  .= '-filter:' . $f_out . ' ';
            }
        } else {
            $full_query  .= '-filter:' . $filter_out[0] . ' ';
        }
    }
    if ($attitude != '') {
        if ($attitude == '1') {
            $full_query  .= ':) ';
        } else {
            $full_query  .= ':( ';
        }
    }
    if ($url != '') {
        $full_query  .= 'url:' . $url . ' ';
    }
    if ($sensitivity != '') {
        if ($sensitivity == '1') {
            $full_query  .= 'filter:safe ';
        } else {
            $full_query  .= 'filter:unsafe ';
        }
    }
    if ($date_range != '') {
        $str_arr3 = explode("-", $date_range);

        $since = date("Y-m-d", strtotime($str_arr3[0]));
        $until = date("Y-m-d", strtotime($str_arr3[1]));

        $full_query  .= 'since:' . $since . ' ';
        $full_query  .= 'until:' . $until . ' ';
    } 
    }


   // echo json_encode($_POST).'<br/><br/><br/><br/>';

   // echo $full_query.'<br/><br/><br/><br/>';
    
    $full_1 = urlencode($full_query);
    $search_data = $abraham_client->get('search/tweets', [
        "q"=>$full_query,
         "count" => 3200,
        // 'id' => $user['t_id'],
       
       ]);
    
  //  echo json_encode($search_data);
  //  echo $full_1;


} else {
    $_SESSION['error'] = 'Empty search query';
    redirect($parent_url.'/account/user');
}
$page_sub_1 = 'Advanced';
$page_sub_2 = 'Search';
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
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVW2LQ2" height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
                            <div class="card-header">
                                <h2 class="card-title fw-bold">Max search results (100 max)</h2>
                                <div class="card-toolbar">
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Calendar-->
                                <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th>Tweed ID</th>
                                            <th>Tweet</th>
                                            <th>From:</th>
                                            <th>Date</th>

                                            <th>Source label</th>
                                            <th>Retweets</th>

                                            <th>Likes</th>
                                            <th>Have you retweeted?</th>

                                            <th>Have you liked?</th>

                                            
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //*
                                        $yes_icon = '
                                           <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-5">
                                                    <span class="symbol-label bg-light-success">
                                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                        <span class="svg-icon svg-icon-2x svg-icon-success">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                                                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                              ';
                                        $no_icon = '
                                               <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-5">
                                                    <span class="symbol-label bg-light-danger">
                                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                        <span class="svg-icon svg-icon-2x svg-icon-danger">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                                                                <rect x="9" y="13.0283" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(-45 9 13.0283)" fill="currentColor" />
                                                                <rect x="9.86664" y="7.93359" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(45 9.86664 7.93359)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                  ';
                                         $data1 = array_convert($search_data);
                                        foreach ($data1['statuses'] as $row) {
                                            $source_label = '<span class="badge badge-light-info">' . $row['source'] . '</span>';
                                            $tweet_id = '<span class="badge badge-light-success">' . $row['id'] . '</span>';
                                            $arr = array("a" => "info", "b" => "danger", "c" => "success", "d" => "warning", "e" => "primary", "f" => "dark");
                                            $key = array_rand($arr);
                                            if ($row['favorited']) {
                                                $like_status = $yes_icon;
                                            } else {
                                                $like_status = $no_icon;
                                            }

                                            if ($row['retweeted']) {
                                                $retweet_status = $yes_icon;
                                            } else {
                                                $retweet_status = $no_icon;
                                            }

                                            if ($row['is_quote_status']) {
                                                $quoted_status = $yes_icon;
                                            } else {
                                                $quoted_status = $no_icon;
                                            }
                                            echo '
                                        <tr>
                                          <td>' . $tweet_id . '</td>

                                            <td>' . $row['text'] . '</td>
                                           
                                            
                                            <td>
														<div class="d-flex align-items-center">
															<!--begin::Avatar-->
															<div class="symbol symbol-45px me-5">
																<img alt="Pic" src="'.pic_fix($row['user']['profile_image_url']).'" />
															</div>
															<!--end::Avatar-->
															<!--begin::Name-->
															<div class="d-flex justify-content-start flex-column">
																<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">'.$row['user']['name'].'</a>
																<a href="#" class="text-muted text-hover-primary fw-semibold text-muted d-block fs-7">
																<span class="text-dark"></span>'.$row['user']['screen_name'].'</a>
															</div>
															<!--end::Name-->
														</div>
													</td>
                                            </td>
                                            <td>' . timeDiff($row['created_at'], date("c")) . '</td>

                                            <td>' . $source_label . '</td>
                                            <td>' . $row['retweet_count'] . '</td>

                                            <td>' . $row['favorite_count'] . '</td>
                                            <td>' . $retweet_status . '</td>

                                            <td>' . $like_status . '</td>
                                            

                                           
                                            <td><a href="../public/tweets.php?tweet=' . $row['id'] . '" target="_blank" class="btn btn-light-' . $arr[$key] . '">View 
                                            <span class="svg-icon svg-icon-' . $arr[$key] . '"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 4L18 12L10 20H14L21.3 12.7C21.7 12.3 21.7 11.7 21.3 11.3L14 4H10Z" fill="currentColor"/><path opacity="0.3" d="M3 4L11 12L3 20H7L14.3 12.7C14.7 12.3 14.7 11.7 14.3 11.3L7 4H3Z" fill="currentColor"/>
                                               </svg>
                                            </span>
                                            </a>
                                            </td>

                                        </tr>
                                             ';
                                        }
                                        //*/

                                        ?>

                                    </tbody>
                                </table>
                                <!--end::Calendar-->
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
