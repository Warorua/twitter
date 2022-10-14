<?php
//*
include '../includes/conn.php';

include '../includes/session.php';

require '../vendor/autoload.php';

include '../includes/api_config.php';

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *, users.id AS usid FROM users LEFT JOIN client_api ON users.id = client_api.user_id");
$stmt->execute();
$data = $stmt->fetchAll();

//echo json_encode($data);

echo json_encode($_GET);
//*/

//echo 'Yuuup';

?>


<!--begin::Body-->
<div class="pt-1">
    <!--begin::Item-->
    <div class="d-flex align-items-center mb-7">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Follow tweet repliers</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center mb-7">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Mass tweet deleting</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center mb-7">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Automated tweeting</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center mb-7">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Silent retweeting</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center mb-7">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Follow likers, repliers & retweeters</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center mb-7">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Customised source label</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center">
        <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Twitter bot summoning</span>
        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Item-->
</div>
<!--end::Body-->
















<!--begin::Heading-->
<div class="pb-5">
    <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
    <div class="text-muted fw-semibold">Optimal for new startup users on a low budget
    </div>
</div>
<!--end::Heading-->










<!--begin::Heading-->
<div class="pb-5">
    <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
    <div class="text-muted fw-semibold">Optimal for recurrent users on a simple budget
    </div>
</div>
<!--end::Heading-->










<!--begin::Heading-->
<div class="pb-5">
    <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
    <div class="text-muted fw-semibold">Optimal for active users on an optimal budget
    </div>
</div>
<!--end::Heading-->







<!--begin::Heading-->
<div class="pb-5">
    <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
    <div class="text-muted fw-semibold">Optimal for cooporates and high profile individuals</div>
</div>
<!--end::Heading-->