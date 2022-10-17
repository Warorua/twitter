<?php
if ( $_SERVER['REQUEST_METHOD']!='POST' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die( header( 'location: /index.php' ) );
}
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

//include '../twi';

									//*
                                     $css = "
                                      <style>
                                     .vjs-theme-city .vjs-big-play-button {
                                        font-size: 3em;
                                        line-height: 1.5em;
                                        height: 1.5em;
                                        width: 3em;
                                        border: 0.06666em solid #fff;
                                        border-radius: 0.3em;
                                        left: 50%;
                                        top: 50%;
                                        margin-left: -1.5em;
                                        margin-top: -0.75em;
                                      }
                                     </style>
                                     ";
									 $dt = $user_client->getUserById($_POST['user']);
									// $tweets = user_tweets($dt->getUsername(), 7);
									 $tweet_img = '';
									 $tweet_row = array();
                                     $output = '';
									 $data = $abraham_client->get('statuses/user_timeline', [
										"count" => 7,
										'id' => $dt->getId(),
									   
									  ]);
									  if ($api_app['numrows'] < 1) {
										$app_auth_tweet_id = 'kt_tweet_id_disabled';
										$app_auth_tweet_link = 'kt_tweet_link_disabled';
										$app_auth_tweet_status = 'disabled';
										$app_auth_tweet_tooltip = 'data-bs-toggle="tooltip" data-bs-placement="right" title="Add app to use this feature"';
										}else{
											$app_auth_tweet_id = 'kt_tweet_id';
										$app_auth_tweet_link = 'kt_tweet_link';
										$app_auth_tweet_status = '';
										$app_auth_tweet_tooltip = '';
									
										}
									  $tweets= array_convert($data);
									 if(isset($tweets[0])){
										foreach ($tweets as $row) {
								  
									  array_push($tweet_row, 'row_Img' . $row['id']);
								  
									  $metr_1 = $tweet_client->getTweet($row['id']);
									  $metr_2 = json_encode($metr_1, TRUE);
									  $data2 = json_decode($metr_2, TRUE);
								  
									  $data = tweet($row['id']);
									  if (!isset($data['includes'])) {
										  $card_h = 'overflow-visible h-250px';
									  } else {
										  $card_h = 'overflow-visible h-600px';
									  }
								  
									  $output .= '
									  <div class="card card-flush shadow-sm mb-10 h-auto overflow-visible">
									  <!--begin::Card header-->
									  <div class="card-header pt-9">
										  <!--begin::Author-->
										  <div class="d-flex align-items-center">
											  <!--begin::Avatar-->
											  <div class="symbol symbol-50px me-5">
												  <img src="' . pic_fix($dt->getProfileImageUrl()) . '" class="" alt="" />
											  </div>
											  <!--end::Avatar-->
											  <!--begin::Info-->
											  <div class="flex-grow-1">
												  <!--begin::Name-->
												  <a class="text-gray-800 text-hover-primary fs-4 fw-bold">' . $dt->getName() . '</a>
												  <!--end::Name-->
												  <!--begin::Date-->
												  <span class="text-gray-400 fw-semibold d-block">
												  ' . timeDiff($data2['data']['created_at'], date("c")) . '
												  <span class="badge badge-light-info">' . $data2['data']['source'] . '</span>
												  </span>
												  <!--end::Date-->
												  <!--begin::Date-->
												  
												  <!--end::Date-->
											  </div>
											  <!--end::Info-->
										  </div>
										  <!--end::Author-->
										  <!--begin::Card toolbar-->
										  <div class="card-toolbar">
											  <!--begin::Menu wrapper-->
											  <div class="m-0">
												  <!--begin::Menu toggle-->
												  <button id="trigger_' . $row['id'] . '" class="btn btn-icon btn-color-gray-400 btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
													  <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
													  <span class="svg-icon svg-icon-1">
														  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															  <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
															  <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
															  <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
															  <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
														  </svg>
													  </span>
													  <!--end::Svg Icon-->
												  </button>
												  <!--end::Menu toggle-->
												  <!--begin::Menu 2-->
												  <div '.$app_auth_tweet_id.'="' . $row['id'] . '" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
													  <!--begin::Menu item-->
													  <div class="menu-item px-3">
														  <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
													  </div>
													  <!--end::Menu item-->
													  <!--begin::Menu separator-->
													  <div class="separator mb-3 opacity-75"></div>
													  <!--end::Menu separator-->
													  <!--begin::Menu item-->
													  <div '.$app_auth_tweet_link.'="LR" class="menu-item px-3" '.$app_auth_tweet_tooltip.'>
														  <a class="menu-link px-3 '.$app_auth_tweet_status.'">Like replies</a>
													  </div>
													  <!--end::Menu item-->
													  <!--begin::Menu item-->
													  <div '.$app_auth_tweet_link.'="RR" class="menu-item px-3" '.$app_auth_tweet_tooltip.'>
														  <a class="menu-link px-3 '.$app_auth_tweet_status.'">Retweet replies</a>
													  </div>
													  <!--end::Menu item-->
													  <!--begin::Menu item-->
													  <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
														  <!--begin::Menu item-->
														  <a class="menu-link px-3">
															  <span class="menu-title">Follow</span>
															  <span class="menu-arrow"></span>
														  </a>
														  <!--end::Menu item-->
														  <!--begin::Menu sub-->
														  <div kt_tweet_id="' . $row['id'] . '" class="menu-sub menu-sub-dropdown w-175px py-4">
															  <!--begin::Menu item-->
															  <div '.$app_auth_tweet_link.'="FL" class="menu-item px-3" '.$app_auth_tweet_tooltip.'>
																  <a class="menu-link px-3 '.$app_auth_tweet_status.'">Follow likers</a>
															  </div>
															  <!--end::Menu item-->
															  <!--begin::Menu item-->
															  <div '.$app_auth_tweet_link.'="FR" class="menu-item px-3" '.$app_auth_tweet_tooltip.'>
																  <a class="menu-link px-3 '.$app_auth_tweet_status.'">Follow repliers</a>
															  </div>
															  <!--end::Menu item-->
															  <!--begin::Menu item-->
															  <div '.$app_auth_tweet_link.'="FR_2" class="menu-item px-3" '.$app_auth_tweet_tooltip.'>
																  <a class="menu-link px-3 '.$app_auth_tweet_status.'">Follow retweeters</a>
															  </div>
															  <!--end::Menu item-->
														  </div>
														  <!--end::Menu sub-->
													  </div>
													  <!--end::Menu item-->
													  <!--begin::Menu item-->
													  <div '.$app_auth_tweet_link.'="SR" class="menu-item px-3" '.$app_auth_tweet_tooltip.'>
														  <a class="menu-link px-3 '.$app_auth_tweet_status.'">Silent Retweet</a>
													  </div>
													  <!--end::Menu item-->
													  <!--begin::Menu separator-->
													  <div class="separator mt-3 opacity-75"></div>
													  <!--end::Menu separator-->
													  <!--begin::Menu item-->
													  <div '.$app_auth_tweet_link.'="D" class="menu-item px-3">
														  <div class="menu-content px-3 py-3">
															  <a href="https://tweetbot.site/public/tweets.php?tweet='.$row['id'].'" target="_blank" class="btn btn-success btn-sm px-4">View Tweet</a>
														  </div>
													  </div>
													  <!--end::Menu item-->
												  </div>
												  <!--end::Menu 2-->
											  </div>
											  <!--end::Menu wrapper-->
										  </div>
										  <!--end::Card toolbar-->
									  </div>
									  <!--end::Card header-->
											  <!--begin::Card body-->
									  <div class="card-body ' . $card_h . '">
										  <!--begin::Post content-->
									  ';
									  foreach ($data['data'] as $row_2) {
										  $tweet_text = $row_2['text'];
										  $tweet_id = $row_2['id'];
										  $output .= '
										  <div kt_tweet_text="row_Img' . $row['id'] . '" class="card-text fs-6 fw-normal text-gray-700 mb-5">' . $tweet_text . '</div>
										  <!--end::Post content-->
										  ';
									  }
									  $output .= '
									  <!--begin::Post media-->
										  <div id="row_Img' . $row['id'] . '" class="row g-7 h-225px">
									  ';
								  
									  if (isset($data['includes'])) {
										  foreach ($data['includes']['media'] as $row_3) {
											  $tweet_type = $row_3['type'];
											  $tweet_media_key = $row_3['media_key'];
											  if ($row_3['type'] != 'photo') {
												if(!isset($photo_key)){  $data_2 = tweet_video($row['id']);
												  foreach ($data_2['includes']['media'] as $id=>$row_4) {
													  $video = $row_4['variants'][0]['url'];
													  $output .= '
													  <video
													  id="my-video"
												  class="video-js vjs-theme-city rounded"
												  controls
												  preload="auto"
												  width="100%"
												  height="400px"
												  poster="https://w0.peakpx.com/wallpaper/525/853/HD-wallpaper-plain-black-marble-textures-marble.jpg"
												  data-setup="{}"
												  >
													  <source class="rounded" src="' . $video . '" type="video/mp4">
													  <p class="vjs-no-js">
													To view this video please enable JavaScript, and consider upgrading to a
													web browser that
													<a href="https://videojs.com/html5-video-support/" target="_blank"
													  >supports HTML5 video</a
													>
												  </p>
													</video>
													  ';
													  if($id == 0){
														break;

													  }
												  }
												  $video_key = 1;}
											  } else {
												if(!isset($video_key)){
												$photo_key = 1;
												  $tweet_img = $row_3['url'];
												  $img = "'" . $tweet_img . "'";
												  $output .= '
												  <!--begin::Col-->
											  <div kt_img_type="tweetImg" class="col-6">
												  <!--begin::Item-->
												  <a class="d-block card-rounded overlay h-100" data-fslightbox="lightbox-projects' . $row['id'] . '" href="' . $tweet_img . '">
													  <!--begin::Image-->
													  <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100" style="background-image:url(' . $img . ')"></div>
													  <!--end::Image-->
													  <!--begin::Action-->
													  <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														  <i class="bi bi-eye-fill fs-3x text-white"></i>
													  </div>
													  <!--end::Action-->
												  </a>
												  <!--end::Item-->
											  </div>
											  <!--end::Col-->
												  ';}
											  }
										  }
									  }
								  
									  $output .= '
									  <!--end::Col-->
										  </div>
										  <script>
										  $("#trigger_' . $row['id'] . '").trigger("click");
										  </script>
									  ';
								  if($row['favorited']){
									$kt_like = 'UL';
									$kt_btn_like = 'btn-color-danger active';

								  }else{
									$kt_like = 'L';
									$kt_btn_like = 'btn-color-gray-600';
								  }
									  $output .= '
									  <!--end::Post media-->
									  </div>
											  <!--begin::Card footer-->
									  <div class="card-footer pt-0">
										  <!--begin::Info-->
										  <div class="mb-6">
											  <!--begin::Separator-->
											  <div class="separator separator-solid"></div>
											  <!--end::Separator-->
											  <!--begin::Nav-->
											  <ul kt_tweet_id="' . $row['id'] . '" class="nav py-3">
												  <!--begin::Item-->
												  <li class="nav-item" kt_tweet_link="R">
													  <a  class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1">
														  <i class="bi bi-chat-square fs-2 me-1"></i>' . number_format_short($data2['data']['public_metrics']['reply_count']) . ' Replies</a>
												  </li>
												  <!--end::Item-->
												  <!--begin::Item-->
												  <li class="nav-item" kt_tweet_link="'.$kt_like.'">
													  <a class="btn btn-sm '.$kt_btn_like.' btn-active-color-danger btn-active-light-danger fw-bold px-4 me-1">
														  <i class="bi bi-heart fs-2 me-1"></i>' . number_format_short($row['favorite_count']) . ' Likes</a>
												  </li>
												  <!--end::Item-->
												  <!--begin::Item-->
												  <li class="nav-item" kt_tweet_link="R2">
													  <a  class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
														  <i class="bi bi-arrow-repeat fs-2 me-1"></i>' . number_format_short($data2['data']['public_metrics']['retweet_count']) . ' Retweets</a>
												  </li>
												  <!--end::Item-->
												  <!--begin::Item-->
												  <li class="nav-item">
													  <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
														  <i class="bi bi-chat-quote fs-2 me-1"></i>' . number_format_short($data2['data']['public_metrics']['quote_count']) . ' Quotes</a>
												  </li>
												  <!--end::Item-->
											  </ul>
											  <!--end::Nav-->
											  <!--begin::Separator-->
											  <div class="separator separator-solid mb-1"></div>
											  <!--end::Separator-->
										  
										  </div>
										  <!--end::Info-->
									  </div>
									  <!--end::Card footer-->
								   </div>
								   <!--end::Card-->
								   <!--end::Post 1-->
									  ';
								  
									  $output .= '
										  <script>
										  KTMenu.createInstances();
										  var menuElement = document.querySelector("#trigger_' . $row['id'] . '");
										  var menu = KTMenu.getInstance(menuElement);
										  $("[data-bs-toggle='."'".'tooltip'."'".']").tooltip();
										   
										 
										  </script>
									  ';
								  
									  
								  }
								  }else{
									  $tweet_img = 'https://w0.peakpx.com/wallpaper/105/455/HD-wallpaper-twitter-logo-tropical-island-creative-art-emblem-social-network-twitter.jpg';
									  $img = "'" . $tweet_img . "'";
									  $output .= '
									   <div class="card card-flush shadow-sm mb-10 h-auto overflow-visible">
									   <!--begin::Card header-->
									   <div class="card-header pt-9">
										  <!--begin::Author-->
										  <div class="d-flex align-items-center">
											  <!--begin::Avatar-->
											  <div class="symbol symbol-50px me-5">
												  <img src="' . pic_fix($t_user->getProfileImageUrl()) . '" class="" alt="" />
											  </div>
											  <!--end::Avatar-->
											  <!--begin::Info-->
											  <div class="flex-grow-1">
												  <!--begin::Name-->
												  <a class="text-gray-800 text-hover-primary fs-4 fw-bold">' . $t_user->getName() . '</a>
												  <!--end::Name-->
												  <!--begin::Date-->
												  <span class="text-gray-400 fw-semibold d-block">
												  1 min ago
												  <span class="badge badge-light-info">Kenyan on Twitter</span>
												  </span>
												  <!--end::Date-->
												  <!--begin::Date-->
												  
												  <!--end::Date-->
											  </div>
											  <!--end::Info-->
										  </div>
										  <!--end::Author-->
									   </div>
									   <!--end::Card header-->
											  <!--begin::Card body-->
									   <div class="card-body overflow-visible h-400px">
										  <!--begin::Post content-->
									
										  <div class="card-text fs-6 fw-normal text-danger mb-5">Well, this user had nothing to say to Twitter. Not even a smiley!</div>
										  <!--end::Post content-->
										  
									   <!--begin::Post media-->
										  <div id="row_Img" class="row g-7 h-275px">
									 
												  <!--begin::Col-->
											  <div kt_img_type="tweetImg" class="col-12">
												  <!--begin::Item-->
												  <a class="d-block card-rounded overlay h-100" data-fslightbox="lightbox-projects" href="https://w0.peakpx.com/wallpaper/105/455/HD-wallpaper-twitter-logo-tropical-island-creative-art-emblem-social-network-twitter.jpg">
													  <!--begin::Image-->
													  <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100" style="background-image:url(' . $img . ')"></div>
													  <!--end::Image-->
													  <!--begin::Action-->
													  <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														  <i class="bi bi-eye-fill fs-3x text-white"></i>
													  </div>
													  <!--end::Action-->
												  </a>
												  <!--end::Item-->
											  </div>
											  <!--end::Col-->
											  
									   <!--end::Col-->
										  </div>
								   
									   <!--end::Post media-->
									   </div>
											  <!--begin::Card footer-->
									   <div class="card-footer pt-0">
										  <!--begin::Info-->
										  <div class="mb-6">
											  <!--begin::Separator-->
											  <div class="separator separator-solid"></div>
											  <!--end::Separator-->
											  <!--begin::Nav-->
											  <ul class="nav py-3">
												  <!--begin::Item-->
												  <li class="nav-item">
													  <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active" data-bs-toggle="collapse" href="#kt_social_feeds_comments_1">
														  <i class="bi bi-chat-square fs-2 me-1"></i>0 Replies</a>
												  </li>
												  <!--end::Item-->
												  <!--begin::Item-->
												  <li class="nav-item">
													  <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-danger fw-bold px-4 me-1">
														  <i class="bi bi-heart fs-2 me-1"></i>0 Likes</a>
												  </li>
												  <!--end::Item-->
												  <!--begin::Item-->
												  <li class="nav-item">
													  <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
														  <i class="bi bi-arrow-repeat fs-2 me-1"></i>0 Retweets</a>
												  </li>
												  <!--end::Item-->
												  <!--begin::Item-->
												  <li class="nav-item">
													  <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
														  <i class="bi bi-chat-quote fs-2 me-1"></i>0 Quotes</a>
												  </li>
												  <!--end::Item-->
											  </ul>
											  <!--end::Nav-->
											  <!--begin::Separator-->
											  <div class="separator separator-solid mb-1"></div>
											  <!--end::Separator-->
										  
										  </div>
										  <!--end::Info-->
									  </div>
									  <!--end::Card footer-->
								   </div>
								   <!--end::Card-->
								   <!--end::Post 1-->
									  ';
								  
									  
								  }
								  
                                    foreach($tweet_row as $row){
                                        $output .= '  

                                        <script> 
                                      var searchText_2 = $("div[kt_tweet_text='.$row.']").text(),
                             
                            
                             hashtags = searchText_2.match(/#[a-zA-Z0-9_]+/g);
                             
                             if(hashtags != null){
                                
                             for (var i = 0, il = hashtags.length; i < il; i++) {
                             $("div[kt_tweet_text='.$row.']").text($("div[kt_tweet_text='.$row.']").text().replace(hashtags[i], ""));
                             }

                             $( "div[kt_tweet_text='.$row.']" ).append( "</br>" );
                            
                             for (var i = 0, il = hashtags.length; i < il; i++) {
                                var originalString = hashtags[i];
                               var newString = originalString.replace("#", "");
                             $( "div[kt_tweet_text='.$row.']" ).append( "<a href='."'https://twitter.com/hashtag/".'"+newString+ "'."?src=hashtag_click'".' class='."'".'btn btn-link btn-color-info btn-active-color-primary me-5 mb-2'."'".' target='."'".'_blank'."'".'>"+hashtags[i]+ "</a>&nbsp;" );
                             } 
                             }
                               </script>

                               <script> 
                               var searchText_3 = $("div[kt_tweet_text='.$row.']").text(),
                      
                     
                      at_link = searchText_3.match(/@[a-zA-Z0-9_]+/g);
                      
                      if(at_link != null){
                         
                      for (var i = 0, il = at_link.length; i < il; i++) {
                      $("div[kt_tweet_text='.$row.']").text($("div[kt_tweet_text='.$row.']").text().replace(at_link[i], ""));
                      }

                      $( "div[kt_tweet_text='.$row.']" ).append( "</br>" );

                      
                     
                      for (var i = 0, il = at_link.length; i < il; i++) {
                        var originalString = at_link[i];
                      var newString = originalString.replace("@", "");
                      $( "div[kt_tweet_text='.$row.']" ).append( "<a href='."'https://twitter.com/".'"+newString+ "'."'".' class='."'".'btn btn-link btn-color-primary btn-active-color-danger me-5 mb-2'."'".' target='."'".'_blank'."'".'>"+at_link[i]+ "</a>&nbsp;" );
                      } 
                      }
                        </script>


                                        <script> 
                                             var searchText = $("div[kt_tweet_text='.$row.']").text(),
                                    
                                    // urls will be an array of URL matches
                                    urls = searchText.match(/(((ftp|https?):\/\/)[\-\w@:%_\+.~#?,&\/\/=]+)|((mailto:)?[_.\w-]+@([\w][\w\-]+\.)+[a-zA-Z]{2,3})/g);
                                    
                                    if(urls != null){
                                        // you can then iterate through urls
                                    for (var i = 0, il = urls.length; i < il; i++) {
                                    $("div[kt_tweet_text='.$row.']").text($("div[kt_tweet_text='.$row.']").text().replace(urls[i], ""));
                                    }
                                    
                                    for (var i = 0, il = urls.length; i < il; i++) {
                                    $( "div[kt_tweet_text='.$row.']" ).append( "<a href='."'".'"+urls[i]+ "'."'".' class='."'".'btn btn-sm btn-primary btn-hover-rise me-5'."'".' target='."'".'_blank'."'".'><i class='."'".'bi bi-twitter fs-4 me-2'."'".'></i>Embed Link</a>" );
                                    } 
                                    }
                                      </script>


                                      
                                         ';

                                         $output .= '
                                         <script> 

    
                                         var count'.$row.' = $("#'.$row.' div[kt_img_type=tweetImg]").length;
                                           if(count'.$row.' == "1"){
                                             $("#'.$row.' div[kt_img_type=tweetImg]:first-child").removeClass("col-6");
                                             $("#'.$row.' div[kt_img_type=tweetImg]:first-child").addClass("col-12");
                                     
                                             $("#'.$row.' a").removeClass("h-100");
                                             $("#'.$row.' a").addClass("h-auto");
                                     
                                             $("#'.$row.'").parent().removeClass("h-600px");
                                             $("#'.$row.'").parent().addClass("h-350px");
                                     
                                          }
                                          if(count'.$row.' == "2"){
                                             $("#'.$row.' div[kt_img_type=tweetImg]:first-child").removeClass("col-6");
                                             $("#'.$row.' div[kt_img_type=tweetImg]:nth-child(2)").removeClass("col-6");
                                     
                                             $("#'.$row.' div[kt_img_type=tweetImg]:first-child").addClass("col-12");
                                             $("#'.$row.' div[kt_img_type=tweetImg]:nth-child(2)").addClass("col-12");
                                     
                                          }
                                          if(count'.$row.' == "3"){
                                             $("#'.$row.' div[kt_img_type=tweetImg]:nth-child(3)").removeClass("col-6");
                                     
                                             $("#'.$row.' div[kt_img_type=tweetImg]:nth-child(3)").addClass("col-12");
                                          };
                                          </script>
                                            <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
											<script src="../assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
                              
                                          ';
                                     }
                                     //*/
                                    
                                     $output .= $css;

                                    echo $output;
//*/
									?>