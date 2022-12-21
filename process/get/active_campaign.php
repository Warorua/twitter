<?php
include '../../includes/conn.php';
include '../../includes/session.php';


if (isset($_POST['t_id'])) {
    if (isset($user['t_id'])) {
        $stmt = $conn->prepare("SELECT * FROM campaign_engine WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user['id']]);
        $data = $stmt->fetchAll();
        $output = '';
        foreach ($data as $row) {
            if ($row['campaign'] == 1) {
                $camp_title = 'Auto Follower';
                $camp_desc = 'Follows back your followers';
                $camp_image = '../assets/media/icons/followers.png';
            } elseif ($row['campaign'] == 2) {
                $camp_title = 'Auto Liker';
                $camp_desc = 'Auto-likes tweets on your home timeline';
                $camp_image = '../assets/media/icons/like.png';
            } elseif ($row['campaign'] == 3) {
                $camp_title = 'Auto Deleter';
                $camp_desc = 'Deletes your tweets from time of campaign activation';
                $camp_image = '../assets/media/icons/deleter.png';
            } else {
                $camp_title = 'Auto Unfollow';
                $camp_desc = 'Unfollows accounts that are not following you back';
                $camp_image = '../assets/media/icons/unfollow.png';
            }
            $camp_exec = (int)$row['execution'];
            if ($row['spent_budget'] == '') {
                $spent_budget = 0;
            } else {
                $spent_budget = (int)$row['spent_budget'];
            }
            $secs = number_format(($camp_exec - time()), 0);
            if ($secs == 0) {
                $secs = '';
            } elseif ($secs == 1) {
                $secs = $secs . " sec";
            } else {
                $secs = $secs . " secs";
            }
            $output .= '
        <tr>
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-50px me-5">
                <img src="' . $camp_image . '" class="" alt="" />
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">' . $camp_title . '</a>
                <span class="text-muted fw-semibold text-muted d-block fs-7">' . $camp_desc . '</span>
            </div>
        </div>
    </td>
    <td>
        <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">' . number_format($row['budget']) . '</a>
        <span class="text-muted fw-semibold text-muted d-block fs-7">Points</span>
    </td>
    <td>
        <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">' . number_format($spent_budget) . '</a>
        <span class="text-muted fw-semibold text-muted d-block fs-7">Points</span>
    </td>
    <td>
        <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">' . $secs . '</a>
        <span class="text-muted fw-semibold text-muted d-block fs-7">' . $row['frequency'] . 's</span>
    </td>
    <td>
        <span class="badge badge-light-success fs-7 fw-bold">Running...</span>
    </td>
    <td class="text-end">
        <a onclick="campaignDelete(' . $row['id'] . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                        fill="currentColor" />
                    <path opacity="0.5"
                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                        fill="currentColor" />
                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </td>
</tr>
    ';
        }
    } else {
        $output = 'Error processing this request!';
    }
}
echo $output;