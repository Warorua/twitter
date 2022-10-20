<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}

include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';


$abraham_client->setApiVersion('1.1');
$data = $abraham_client->get('direct_messages/events/list', [
    "count" => 50,
    //'id' => '1581999085875331076'
]);

$dt1 = array_convert($data);

$msnger_id = $_POST['msg_id'];
$msnger_name = $_POST['msg_name'];
$msnger_prof = $_POST['msg_prof'];
$msnger_username = $_POST['msg_username'];



sort($dt1['events']);
$output = '';
foreach ($dt1['events'] as $id=>$row) {
	if ($row['message_create']['sender_id'] == $msnger_id) {

	//	echo $row['message_create']['message_data']['text'].' ---SENDER '.$id.'<br/>';
        $time_now = date('Y-m-d H:i:s');
        $time_then = date("Y-m-d H:i:s", $row['created_timestamp'] / 1000);
        if(isset($row['message_create']['message_data']['attachment'])){
            $pic_attachment = '<img class="rounded w-100" src="'.$row['message_create']['message_data']['attachment']['media']['media_url_https'].'" />';
            $text_full = str_replace($row['message_create']['message_data']['attachment']['media']['url'], '', $row['message_create']['message_data']['text']);
            $disp_obj = $text_full.$pic_attachment;

        }else{
            $disp_obj = $row['message_create']['message_data']['text'];
        }
       
                $output .= '
        <!--begin::Message(in)-->
											<div class="d-flex justify-content-start mb-10">
												<!--begin::Wrapper-->
												<div class="d-flex flex-column align-items-start">
													<!--begin::User-->
													<div class="d-flex align-items-center mb-2">
														<!--begin::Avatar-->
														<div class="symbol symbol-35px symbol-circle">
															<img alt="Pic" src="'.$msnger_prof.'" />
														</div>
														<!--end::Avatar-->
														<!--begin::Details-->
														<div class="ms-3">
															<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">'.$msnger_name.'</a>
															<span class="text-muted fs-7 mb-1">' . timeDiff($time_then, $time_now) . '</span>
														</div>
														<!--end::Details-->
													</div>
													<!--end::User-->
													<!--begin::Text-->
													<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">
                                                    '.$disp_obj.'
													</div>
													<!--end::Text-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Message(in)-->
        ';
	} elseif($row['message_create']['target']['recipient_id']  == $msnger_id) {
		
       // echo $row['message_create']['message_data']['text'].' ---RECIP '.$id.'<br/>';
        $time_now = date('Y-m-d H:i:s');
        $time_then = date("Y-m-d H:i:s", $row['created_timestamp'] / 1000);
        if(isset($row['message_create']['message_data']['attachment'])){
            $pic_attachment = '<img class="rounded w-100" src="'.$row['message_create']['message_data']['attachment']['media']['media_url_https'].'" />';
            $text_full = str_replace($row['message_create']['message_data']['attachment']['media']['url'], '', $row['message_create']['message_data']['text']);
            $disp_obj = $text_full.$pic_attachment;

        }else{
            $disp_obj = $row['message_create']['message_data']['text'];
        }
 $output .= '
        <!--begin::Message(out)-->
        <div class="d-flex justify-content-end mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column align-items-end">
                <!--begin::User-->
                <div class="d-flex align-items-center mb-2">
                    <!--begin::Details-->
                    <div class="me-3">
                        <span class="text-muted fs-7 mb-1">' . timeDiff($time_then, $time_now) . '</span>
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                    </div>
                    <!--end::Details-->
                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                        <img alt="Pic" src="'.pic_fix($t_user->getProfileImageUrl()).'" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::User-->
                <!--begin::Text-->
                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">
                '.$disp_obj.'
                </div>
                <!--end::Text-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Message(out)-->
        ';

	}
}

$_SESSION['activeChat'] = $output;
$_SESSION['activeMessenger'] = $msnger_id;
echo $output;
//echo json_encode($dt1);