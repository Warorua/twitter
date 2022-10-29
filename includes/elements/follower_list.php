<!--begin::Tables widget 12-->
<div class="card card-flush mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800">Followers</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
        <?php
            if(isset($member_id)){
                $mb_lnk = $member_id;
            }else{
                $mb_lnk = $user['t_id'];
            }

            ?>
            <a href="../v1/followers?user=<?php echo $mb_lnk ?>" class="btn btn-sm btn-light">View more</a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                <!--begin::Table head-->
                <thead>
                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                        <th class="p-0 pb-3 min-w-175px text-start">USER</th>
                        <th class="p-0 pb-3 min-w-100px text-end">FOLLOWERS</th>
                        <th class="p-0 pb-3 min-w-100px text-end">FOLLOWING</th>
                        <th class="p-0 pb-3 w-80px text-end">VIEW</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>

                    <?php
                    if(count($follower_list_data['data']) == 0){
                        echo '
                        <tr>
                         <td>
                             <div class="d-flex align-items-center">
                                 <div class="symbol symbol-50px me-3">
                                     <img src="'.pic_fix($t_user->getProfileImageUrl()).'" class="" alt="" />
                                 </div>
                                 <div class="d-flex justify-content-start flex-column">
                                     <a href="#" class="text-gray-800 fw-bold  mb-1 fs-6">'.$t_user->getUsername().'</a>
                                     <span class="text-gray-400 fw-semibold d-block fs-7">'.$t_user->getName().'</span>
                                 </div>
                             </div>
                         </td>
                         <td class="text-end pe-0">
                             <span class="text-danger fw-bold fs-6">'.number_format($user_metrics['data']['public_metrics']['followers_count']).'</span>
                         </td>
                         <td class="text-end pe-0">
                             <span class="text-gray-600 fw-bold fs-6">'.number_format($user_metrics['data']['public_metrics']['following_count']).'</span>
                         </td>
                         <td class="text-end">
                             <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px disabled">
                                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                 <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
                                         <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </a>
                         </td>
                     </tr>
                     <tr>
                     <td><span class="text-danger fw-bold fs-6">YOU DON\'T HAVE FOLLOWERS!</span></td>

                     </tr>
                         ';

                    }elseif(count($follower_list_data['data']) < 10){
                        foreach($follower_list_data['data'] as $row){
                            if($row['verified']){
                                $verif_icon_following = 'svg-icon-primary';
                                $verif_info_following = 'Twitter Verified';
                            }else{
                                $verif_icon_following = 'svg-icon-warning';
                                $verif_info_following = 'KOT Verified';
                            }

                            echo '
                            <tr>
                             <td>
                                 <div class="d-flex align-items-center">
                                     <div class="symbol symbol-50px me-3">
                                         <img src="'.pic_fix($row['profile_image_url']).'" class="" alt="" />
                                     </div>
                                     <div class="d-flex justify-content-start flex-column">
                                         <div class="text-gray-800 fw-bold  mb-1 fs-6">'.$row['username'].'
                                              
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="'.$verif_info_following.'">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 '.$verif_icon_following.'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor" />
                                            <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
            
            
                                         </div>
                                         <span class="text-gray-400 fw-semibold d-block fs-7">'.$row['name'].'</span>
                                     </div>
                                 </div>
                             </td>
                             <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bold fs-6">'.number_format($row['public_metrics']['followers_count']).'</span>
                             </td>
                             <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bold fs-6">'.number_format($row['public_metrics']['following_count']).'</span>
                             </td>
                             <td class="text-end">
                                 <a href="../public/feeds.php?user='.$row['id'].'" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                     <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
                                             <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </a>
                             </td>
                         </tr>
                             ';
                        }

                    }else{
                         for($i = 0; $i<10; $i++){
                            if($follower_list_data['data'][$i]['verified']){
                                $verif_icon_following = 'svg-icon-primary';
                                $verif_info_following = 'Twitter Verified';
                            }else{
                                $verif_icon_following = 'svg-icon-warning';
                                $verif_info_following = 'KOT Verified';
                            }


                        echo '
                       <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <img src="'.pic_fix($follower_list_data['data'][$i]['profile_image_url']).'" class="" alt="" />
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-gray-800 fw-bold  mb-1 fs-6">'.$follower_list_data['data'][$i]['username'].'
                                         
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="'.$verif_info_following.'">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 '.$verif_icon_following.'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor" />
                                            <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
            
            
                                    </div>
                                    <span class="text-gray-400 fw-semibold d-block fs-7">'.$follower_list_data['data'][$i]['name'].'</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="text-gray-600 fw-bold fs-6">'.number_format($follower_list_data['data'][$i]['public_metrics']['followers_count']).'</span>
                        </td>
                        <td class="text-end pe-0">
                            <span class="text-gray-600 fw-bold fs-6">'.number_format($follower_list_data['data'][$i]['public_metrics']['following_count']).'</span>
                        </td>
                        <td class="text-end">
                            <a href="../public/feeds.php?user='.$follower_list_data['data'][$i]['id'].'" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
                                        <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </td>
                    </tr>
                        ';
                    }
                    }
                   

                    ?>
                </tbody>
                <!--end::Table body-->
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end: Card Body-->
</div>
<!--end::Tables widget 12-->