<?php
require '../vendor/autoload.php';
include '../includes/conn.php';
include '../includes/session.php';
include '../includes/api_config.php';


try{
    $user_msg_2 = $user_client->getUserByUsername('kot__agent');
echo '
	          <!--begin::User-->
	              <div onclick="messenger(' . "'" . '' . $messager_id . '' . "'" . ', ' . "'" . '' . $user_msg_2->getName() . '' . "'" . ', ' . "'" . '' . pic_fix($user_msg_2->getProfileImageUrl()) . '' . "'" . ', ' . "'" . '' . $user_msg_2->getUsername() . '' . "'" . ')" class="d-flex flex-stack py-4 hover-scale">
	             	 <!--begin::Details-->
	                	<div class="d-flex align-items-center">
		             	<!--begin::Avatar-->
			           <div class="symbol symbol-45px symbol-circle">
			        	<img alt="Pic" src="' . pic_fix($user_msg_2->getProfileImageUrl()) . '" />
			         </div>
			         <!--end::Avatar-->
			         <!--begin::Details-->
			         <div class="ms-5">
			        	<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">' . $user_msg_2->getName() . '</a>
				    <div class="fw-semibold text-muted">' . $user_msg_2->getUsername() . '</div>
			     </div>
			     <!--end::Details-->
		          </div>
		                <!--end::Details-->
		          <!--begin::Lat seen-->
		                <div class="d-flex flex-column align-items-end ms-2">
			             <span class="text-muted fs-7 mb-1">New DM</span>
	 	           </div>
	          	<!--end::Lat seen-->
	            </div>
	            <!--end::User-->
				<!--begin::Separator-->
				<div class="separator separator-dashed d-none"></div>
				<!--end::Separator-->
	        ';
}
catch(Exception $e){
    echo '404';
}


//echo json_encode($user);
//echo $data .'<br/><br/><br/>';

//echo $_SESSION['mypic'].'<br/><br/><br/>';

//echo $good_pic  .'<br/><br/><br/>';

//echo $good_pic2  .'<br/><br/><br/>';
//$myfile = base64_to_jpeg($base_file, 'tmp.jpg');
