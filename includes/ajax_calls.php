<script>
    ///////////////////////////////////TWEET REPLY LIKER
    $(document).on("click", "div[kt_tweet_link=LR]", function() {
        $(this).parent().val(function() {

            var id = $(this).attr("kt_tweet_id");
            $("div[kt_tweet_link=LR]").css('display', 'none');
            Toast.fire({
                icon: 'success',
                title: 'Like engine activated: Please wait for the success confirmation message'
            })

            $.ajax({
                type: "POST",
                url: "../process/post/like_replies.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                    setTimeout(function() {
                        $('div[kt_tweet_link=LR]').css('display', '');
                        Toast.fire({
                            icon: 'info',
                            title: 'Liking engine reactivated!'
                        })
                    }, 30000);

                }
            });



        });
    });
    ///////////////////////////////////TWEET REPLY RETWEETER
    $(document).on("click", "div[kt_tweet_link=RR]", function() {
        $(this).parent().val(function() {

            var id = $(this).attr("kt_tweet_id");
            $("div[kt_tweet_link=RR]").css('display', 'none');
            Toast.fire({
                icon: 'success',
                title: 'Retweet engine activated: Please wait for the success confirmation message'
            })

            $.ajax({
                type: "POST",
                url: "../process/post/retweet_replies.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                    setTimeout(function() {
                        $('div[kt_tweet_link=RR]').css('display', '');
                        Toast.fire({
                            icon: 'info',
                            title: 'Retweeting engine reactivated!'
                        })
                    }, 30000);

                }
            });



        });
    });

    ///////////////////////////////////TWEET LIKER
    $(document).on("click", "li[kt_tweet_link=L]", function() {
        //  
        var id = $(this).parent().attr("kt_tweet_id");
        $(this).children(':first').removeClass('btn-color-gray-600');
        $(this).children(':first').addClass('btn-color-danger');
        $(this).children(':first').addClass('active');
        $(this).attr('kt_tweet_link', 'UL');
        $(this).attr('kt_tweet_id', id);

        $(this).parent().val(function() {




            $.ajax({
                type: "POST",
                url: "../process/post/like_tweet.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id,
                    action: '1'
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                }
            });



        });
    });

    ///////////////////////////////////TWEET UNLIKER
    $(document).on("click", "li[kt_tweet_link=UL]", function() {
        //  alert('Unliked');
        var id = $(this).parent().attr("kt_tweet_id");

        $(this).children(':first').removeClass('btn-color-danger');
        $(this).children(':first').removeClass('active');
        $(this).children(':first').addClass('btn-color-gray-600');

        $(this).attr('kt_tweet_link', 'L');

        $(this).parent().val(function() {



            $.ajax({
                type: "POST",
                url: "../process/post/like_tweet.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id,
                    action: '0'
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                }
            });



        });
    });

        ///////////////////////////////////FOLLOW LIKER
        $(document).on("click", "div[kt_tweet_link=FL]", function() {
        $(this).parent().val(function() {

            var id = $(this).attr("kt_tweet_id");
            $("div[kt_tweet_link=FL]").css('display', 'none');
            Toast.fire({
                icon: 'success',
                title: 'Follow engine activated: Please wait for the success confirmation message'
            })

            $.ajax({
                type: "POST",
                url: "../process/post/follow_likers.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                    setTimeout(function() {
                        $('div[kt_tweet_link=FL]').css('display', '');
                        Toast.fire({
                            icon: 'info',
                            title: 'Following engine reactivated!'
                        })
                    }, 30000);

                }
            });



        });
    });
///////////////////////////////////FOLLOW RETWEETER
         $(document).on("click", "div[kt_tweet_link=FR_2]", function() {
        $(this).parent().val(function() {

            var id = $(this).attr("kt_tweet_id");
            $("div[kt_tweet_link=FR_2]").css('display', 'none');
            Toast.fire({
                icon: 'success',
                title: 'Follow engine activated: Please wait for the success confirmation message'
            })

            $.ajax({
                type: "POST",
                url: "../process/post/follow_retweeters.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                    setTimeout(function() {
                        $('div[kt_tweet_link=FR_2]').css('display', '');
                        Toast.fire({
                            icon: 'info',
                            title: 'Following engine reactivated!'
                        })
                    }, 30000);

                }
            });



        });
    });
    ///////////////////////////////////FOLLOW REPLIER
    $(document).on("click", "div[kt_tweet_link=FR]", function() {
        $(this).parent().val(function() {

            var id = $(this).attr("kt_tweet_id");
            $("div[kt_tweet_link=FR]").css('display', 'none');
            Toast.fire({
                icon: 'success',
                title: 'Follow engine activated: Please wait for the success confirmation message'
            })

            $.ajax({
                type: "POST",
                url: "../process/post/follow_replier.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                    setTimeout(function() {
                        $('div[kt_tweet_link=FR]').css('display', '');
                        Toast.fire({
                            icon: 'info',
                            title: 'Following engine reactivated!'
                        })
                    }, 30000);

                }
            });



        });
    });
 ///////////////////////////////////SILECT RETWEET
        $(document).on("click", "div[kt_tweet_link=SR]", function() {
        $(this).parent().val(function() {

            var id = $(this).attr("kt_tweet_id");
            $("div[kt_tweet_link=SR]").css('display', 'none');
            Toast.fire({
                icon: 'success',
                title: 'Retweet engine activated: Please wait for the success confirmation message'
            })

            $.ajax({
                type: "POST",
                url: "../process/post/silent_retweet.php",
                data: {
                    user: '<?php echo $user['t_id'] ?>',
                    id: id,
                    logo: 0
                },
                success: function(data) {

                    Toast.fire({
                        icon: 'info',
                        title: data
                    })

                    setTimeout(function() {
                        $('div[kt_tweet_link=SR]').css('display', '');
                        Toast.fire({
                            icon: 'info',
                            title: 'Retweeting engine reactivated!'
                        })
                    }, 30000);

                }
            });



        });
    });
</script>