<script>
  var currency;
  var time_zone;
  var language;
  var country;
  var formData;

  $(document).ready(function() {
    $("select[name='currency']").change(function() {
      currency = $(this).children("option:selected").val();
    });

    $("select[name='timezone']").change(function() {
      time_zone = $(this).children("option:selected").val();
    });

    $("select[name='language']").change(function() {
      language = $(this).children("option:selected").val();
    });

    $("select[name='country']").change(function() {
      country = $(this).children("option:selected").val();
    });






  });

  $(document).on('submit', '#kt_account_profile_details_form_fr', function(e) {
    e.preventDefault();

   // var company_site = $("input[name='website']").val();
   // var email_comm = $("input[name='email_comm']").val();
   // var phone_comm = $("input[name='phone_comm']").val();
   // var marketing = $("input[name='marketing']").val();
   // var firstname = $("input[name='fname']").val();
   // var lastname = $("input[name='lname']").val();
   // var contact_info = $("input[name='phone']").val();
   // var company = $("input[name='company']").val();
   // var photo = $("input[name='avatar']").val();
    //var edit = '';

    formData = new FormData(this);
    formData.append('avatar', $('#upload_file_fr').files);


    $.ajax({
      method: "POST",
      url: "../auth/profile/profile_edit.php",
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      enctype: 'multipart/form-data',

      success: function(data) {
        //  alert(data);
        console.log(data);

        window.location.reload();
      }
    });
  });
  //currency add attribute
  var curr_select = '<?php echo $user['currency'] ?>';

  // $("option").val();
  $("option[value='<?php echo $user['currency'] ?>']").prop('selected', true);
  $("option[value='<?php echo $user['language'] ?>']").prop('selected', true);
  $("option[value='<?php echo $user['time_zone'] ?>']").prop('selected', true);
  $("option[value='<?php echo $user['country'] ?>']").prop('selected', true);


  //email update ajax
  $(document).on('submit', '#kt_signin_change_email_em', function(e) {
    e.preventDefault();

    formData = new FormData(this);
    $.ajax({
      method: "POST",
      url: "../auth/profile/email_edit.php",
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      enctype: 'multipart/form-data',

      success: function(data) {
        window.location.reload();
      }
    });
  });

  $('#kt_changeMail').click(function(e) {
    $(this).text("Processing...");
    $(this).prepend('<span class="spinner-border spinner-border-sm" role="status"></span> ');
    e.preventDefault();
    var mail = $("input#emailaddress").val();
    $.ajax({
      method: "POST",
      url: "../auth/profile/email_edit_code.php",
      data: {
        mail: mail
      },

      success: function(data) {
        if (data == 'ERR') {
          window.location.reload();
        } else {
          $('#kt_changeMail').text("Send again");
          $("#kt_modal_1").modal('show');
        }

      }
    });
  });

////add app api
$(document).on('submit', '#kt_api_app', function(e) {
    $('#kt_addApp').text("Processing...");
    $('#kt_addApp').prepend('<span class="spinner-border spinner-border-sm" role="status"></span> ');

    e.preventDefault();

    formData = new FormData(this);

    $.ajax({
      method: "POST",
      url: "../auth/profile/api_app.php",
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      enctype: 'multipart/form-data',

      success: function(data) {
          window.location.reload();

      }
    });
  });


  //pass update ajax

  $(document).on('submit', '#kt_signin_change_password_psd', function(e) {
    e.preventDefault();

    formData = new FormData(this);
    //formData.append('avatar', $('#upload_file_fr').files);


    $.ajax({
      method: "POST",
      url: "../auth/profile/password_edit.php",
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      enctype: 'multipart/form-data',

      success: function(data) {
        //  alert(data);
        console.log(data);

        window.location.reload();
      }
    });
  });


  /////////////////////////////////////////two auth qr code ajax

  $(document).on('submit', '#two_auth_qr', function(e) {
    e.preventDefault();

    formData = new FormData(this);
    //formData.append('avatar', $('#upload_file_fr').files);


    $.ajax({
      method: "POST",
      url: "../auth/profile/two_auth.php",
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      enctype: 'multipart/form-data',

      success: function(data) {
        //  alert(data);
        console.log(data);

        window.location.reload();
      }
    });
  });

  /////////////////////////////////////////two auth sms ajax

  $(document).on('submit', '#two_auth_sms', function(e) {
    e.preventDefault();

    formData = new FormData(this);
    //formData.append('avatar', $('#upload_file_fr').files);


    $.ajax({
      method: "POST",
      url: "../auth/profile/two_auth.php",
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      enctype: 'multipart/form-data',

      success: function(data) {
        //  alert(data);
        console.log(data);

        window.location.reload();
      }
    });
  });




  $('button[type="submit"]').click(function() {
    $(this).text("Processing...");
    $(this).prepend('<span class="spinner-border spinner-border-sm" role="status"></span> ');
  });


  $('#smsCode').click(function(e) {
    e.preventDefault();
    var phoneNo = $("input#phoneNo").val();
    $.ajax({
      method: "POST",
      url: "../auth/profile/two_auth_sms.php",
      data: {
        phoneNo: phoneNo
      },
      beforeSend: function() {
        $(this).text("Sending...");
      },
      success: function(data) {
        $('#authSmsErr').text(data);
        $('#smsCode').prop('disabled', true);
        $('#smsCode').text("Code sent");
        $('#smsCode').addClass('btn-light');

        $("input#codeNo").prop('disabled', false);
        $("button#codeSubmit").prop('disabled', false);
      }
    });



  });

  ////////////////////////////////////////////disable 2-auth
  $('#authDisable').click(function(e) {
    e.preventDefault();
    $(this).text("Processing...");
    $(this).prepend('<span class="spinner-border spinner-border-sm" role="status"></span> ');

    var auth = '<?php echo $user['two_auth'] ?>';
    $.ajax({
      method: "POST",
      url: "../auth/profile/two_auth_disable.php",
      data: {
        auth: auth
      },
      success: function(data) {
        window.location.reload();
      }
    });



  });
  ////////////////////////////////////////////////////////////


  var pass_len = $('<?php echo $user['password'] ?>').length;
  if (pass_len == 0) {
    $("input#confirmemailpassword").prop('disabled', true);
    $("input#confirmemailpassword").attr("placeholder", "Your account is password free!");
    $("#rst_btn").prop('disabled', true);
  };

  ////////////////////////////////////////////disable connected accounts

  //Google
  $('#googleswitch').change(function(e) {

    e.preventDefault();
    var auth = '<?php echo $user['two_auth'] ?>';
    $.ajax({
      method: "POST",
      url: "../auth/profile/switch_google.php",
      data: {
        auth: auth
      },
      success: function(data) {
        window.location.reload();
      }
    });

  });


  //Facebook
  $('#facebookswitch').change(function(e) {

    e.preventDefault();
    var auth = '<?php echo $user['two_auth'] ?>';
    $.ajax({
      method: "POST",
      url: "../auth/profile/switch_facebook.php",
      data: {
        auth: auth
      },
      success: function(data) {
        window.location.reload();
      }
    });

  });


  //Twitter
  $('#twitterswitch').change(function(e) {

    e.preventDefault();
    var auth = '<?php echo $user['two_auth'] ?>';
    $.ajax({
      method: "POST",
      url: "../auth/profile/switch_twitter.php",
      data: {
        auth: auth
      },
      success: function(data) {
        window.location.reload();
      }
    });

  });
  ////////////////////////////////////////////////////////////      
</script>