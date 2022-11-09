<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($user)) {
  $_SESSION['error'] = 'Invalid request';
  $output = $_SESSION['error'];
  die($_SESSION['error']);
 // header('location: ../logo_view.php');
}

$output = '';
$stmt = $conn->prepare("SELECT * FROM tweet_factory WHERE user_id=:user_id");
$stmt->execute(['user_id' => $user['id']]);
$data_33 = $stmt->fetchAll();

$stmt = $conn->prepare("SELECT * FROM automation_subs WHERE user_id=:user_id");
$stmt->execute(['user_id' => $user['id']]);
$data_3 = $stmt->fetchAll();
if (count($data_3) >= 1) {

    foreach ($data_3 as $row_3) {
        $stmt = $conn->prepare("SELECT * FROM automation_scripts WHERE id=:id");
        $stmt->execute(['id' => $row_3['script_id']]);
        $data_4 = $stmt->fetch();
        $tweet_rate = 10800 / intval($data_4['execution']);
        $arr = array("a" => "info", "b" => "danger", "c" => "success", "d" => "warning", "e" => "primary", "f" => "dark");
        $key = array_rand($arr);

        $output .= '
   <tr>
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input widget-9-check" type="checkbox" value="1" />
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <img src="' . $data_4['logo'] . '" alt="" />
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">' . $data_4['title'] . '</a>
                <span class="text-muted fw-semibold text-muted d-block fs-7">' . $data_4['description'] . '</span>
            </div>
        </div>
    </td>
    <td>
        <a href="#" class="text-dark fw-bold text-hover-primary d-block fs-6">' . ucfirst($data_4['category']) . '</a>
        <span class="text-muted fw-semibold text-muted d-block fs-7">By ' . $data_4['author'] . '</span>
    </td>
    <td class="text-end">
        <div class="d-flex flex-column w-100 me-2">
            <div class="d-flex flex-stack mb-2">
                <span class="text-muted me-2 fs-7 fw-bold">' . $tweet_rate . '%</span>
            </div>
            <div class="progress h-6px w-100">
                <div class="progress-bar bg-' . $arr[$key] . '" role="progressbar" style="width: ' . $tweet_rate . '%" aria-valuenow="' . $tweet_rate . '" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex justify-content-end flex-shrink-0">
            <a onclick="tweetFactoryDelete(' . $row_3['id'] . ', 1)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
        </div>
    </td>
   </tr>
    ';
    }
}
if (count($data_33) >= 1) {

    foreach ($data_33 as $row_33) {
        $tweet_rate = 10800 / intval($row_33['execution']);
        $arr = array("a" => "info", "b" => "danger", "c" => "success", "d" => "warning", "e" => "primary", "f" => "dark");
        $key = array_rand($arr);

        $output .= '
   <tr>
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input widget-9-check" type="checkbox" value="1" />
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <img src="'.$parent_url.'/assets/media/logos/icon_b.png" alt="" />
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">' . $row_33['title'] . '</a>
                <span class="text-muted fw-semibold text-muted d-block fs-7">' . $row_33['description'] . '</span>
            </div>
        </div>
    </td>
    <td>
        <a href="#" class="text-dark fw-bold text-hover-primary d-block fs-6">Custom</a>
        <span class="text-muted fw-semibold text-muted d-block fs-7">By ' . $t_user->getUsername() . '</span>
    </td>
    <td class="text-end">
        <div class="d-flex flex-column w-100 me-2">
            <div class="d-flex flex-stack mb-2">
                <span class="text-muted me-2 fs-7 fw-bold">' . $tweet_rate . '%</span>
            </div>
            <div class="progress h-6px w-100">
                <div class="progress-bar bg-' . $arr[$key] . '" role="progressbar" style="width: ' . $tweet_rate . '%" aria-valuenow="' . $tweet_rate . '" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex justify-content-end flex-shrink-0">
            <a onclick="tweetFactoryDelete(' . $row_33['id'] . ', 0)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
        </div>
    </td>
   </tr>
    ';
    }
} if(count($data_33) == 0 && count($data_3) == 0) {
    $output .= '
        <tr>
         <td></td>
          <td></td>
          <td>You do not have active tweet automations</td>
          <td></td>
          <td></td>
        </tr>
    ';
}


echo $output;



