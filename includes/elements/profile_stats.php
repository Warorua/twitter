<!--begin::Mixed Widget 3-->
<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Beader-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Profile Overview</span>
            <span class="text-muted fw-semibold fs-7">Recent profile statistics</span>
        </h3>

    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body p-0 d-flex flex-column">
        <!--begin::Stats-->
        <div class="card-p pt-5 bg-body flex-grow-1">
            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col mr-8">
                    <!--begin::Label-->
                    <div class="fs-7 text-muted fw-bold">Followers</div>
                    <!--end::Label-->
                    <!--begin::Stat-->
                    <div class="d-flex align-items-center">
                        <div class="fs-4 fw-bold"><?php echo number_format_short($profile_stats['data']['public_metrics']['followers_count']) ?></div>
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-10-06-120810/core/html/src/media/icons/duotune/communication/com014.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor" />
                                <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor" />
                                <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor" />
                                <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>

                    <!--end::Stat-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col">
                    <!--begin::Label-->
                    <div class="fs-7 text-muted fw-bold">Following</div>
                    <!--end::Label-->
                    <!--begin::Stat-->
                    <div class="d-flex align-items-center">
                        <div class="fs-4 fw-bold">
                            <div class="fs-4 fw-bold"><?php echo number_format_short($profile_stats['data']['public_metrics']['following_count']) ?></div>

                        </div>
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-10-06-120810/core/html/src/media/icons/duotune/communication/com014.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor" />
                                <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor" />
                                <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor" />
                                <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                    <!--end::Svg Icon-->
                    <!--end::Stat-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-0 mt-8">
                <!--begin::Col-->
                <div class="col mr-8">
                    <!--begin::Label-->
                    <div class="fs-7 text-muted fw-bold">Total tweet count</div>
                    <!--end::Label-->
                    <!--begin::Stat-->
                    <div class="d-flex align-items-center">
                        <div class="fs-4 fw-bold">
                            <div class="fs-4 fw-bold"><?php echo number_format_short($profile_stats['data']['public_metrics']['tweet_count']) ?></div>

                        </div>
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                    <!--end::Svg Icon-->
                    <!--end::Stat-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col">
                    <!--begin::Label-->
                    <div class="fs-7 text-muted fw-bold">Total listed count</div>
                    <!--end::Label-->
                    <!--begin::Stat-->
                    <div class="d-flex align-items-center">
                        <div class="fs-4 fw-bold">
                            <div class="fs-4 fw-bold"><?php echo number_format_short($profile_stats['data']['public_metrics']['listed_count']) ?></div>
                        </div>
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-danger ms-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Stat-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
        <!--begin::Chart-->
        <div class="profile_stats_chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 250px"></div>
        <!--end::Chart-->
    </div>
    <!--end::Body-->
</div>
<!--end::Mixed Widget 3-->
<?php
$profile_stats_graph_data = '['.$profile_stats['data']['public_metrics']['followers_count'].','.$profile_stats['data']['public_metrics']['following_count'].','.$profile_stats['data']['public_metrics']['tweet_count'].','.$profile_stats['data']['public_metrics']['listed_count'].',]';
?>