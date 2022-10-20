<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}

include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if(isset($_POST['search'])){
  
try{
    $user_msg_2 = $user_client->getUserByUsername($_POST['search']);
echo '
	          <!--begin::User-->
	              <div onclick="messenger(' . "'" . '' . $user_msg_2->getId() . '' . "'" . ', ' . "'" . '' . $user_msg_2->getName() . '' . "'" . ', ' . "'" . '' . pic_fix($user_msg_2->getProfileImageUrl()) . '' . "'" . ', ' . "'" . '' . $user_msg_2->getUsername() . '' . "'" . ')" class="d-flex flex-stack py-4 hover-scale">
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
}else{
    echo '403';
}




?>