$('#otpbtn').click(function (e) {
    e.preventDefault();
    var secondsLeft = 30;
    var base_url = $('#base').val();
    var contactno = $('#contactno').val();
    if (contactno != '') {
        $('#contactErrMsg').text('');
        $.ajax({
            type: "json",
            method: "POST",
            url: base_url + "UserHome/get_otp",
            data: { contactno: contactno },
            beforeSend: function () {
                $('#otpbtn').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            },
            success: function (response) {
                console.log(response);
                var json = $.parseJSON(response);
                if (json.status == 1) {

                    var countdownv = 20;
                    $('#resend').hide();
                    var refreshId = setInterval(function () {
                        if (countdownv > 1) {
                            $('#resendmsg').text('Resend in ' + countdownv + ' sec');
                            countdownv--;
                        } else {
                            $('#resendmsg').text('');
                            clearInterval(refreshId);
                        }
                    }, 1000);
                    setTimeout(function () {
                        $('#otpbtn').text('Resend OTP');
                        $('#otpbtn').show();
                    }, 20000);

                    $('#otpbtn').hide();
                    $('#verifybtn').show();
                    $('#otpbox').show();
                    $('#otpverify').show();

                    // setTimeout(function () {
                    // 	$('#otpbtn').text('Resend OTP');
                    // 	$('#otpbtn').show();
                    // }, 30000);
                }
                $('#otpmessage').html('<p class="text-success">Your OTP is ' + json.otp + '</p><br/>');
                // $('#otpmessage').html('<p class="text-danger">' + json.login_msg + '</p><br/>');
                $('#otpbtn').text('Request OTP');
            }
        });
    } else {
        $('#contactErrMsg').text('Please enter contact no.');
    }
});

$('#otpverify').click(function (e) {
    e.preventDefault();
    var base_url = $('#base').val();
    var contactno = $('#contactno').val();
    var otp = $('#otp').val();
    $.ajax({
        type: "json",
        method: "POST",
        url: base_url + "UserHome/verify_otp",
        data: {
            contactno: contactno,
            otp: otp
        },
        success: function (response) {

            var json = $.parseJSON(response);
            $('#otpmessage').html('<span class="text-danger">' + json.login_msg + '</span><br/>');
            if (json.status == 1) {
                window.location.href = base_url + 'orders';
            }
            else if (json.status == 3) {
                window.location.href = base_url + 'checkout';
            }
            else {
                window.location.href = base_url;
            }
        }
    });
});


$('#registerotpverify').click(function (e) {
    e.preventDefault();
    var base_url = $('#base').val();
    var contactno = $('#contactno').val();
    var otp = $('#otp').val();
    $.ajax({
        type: "json",
        method: "POST",
        url: base_url + "UserHome/check_verification",
        data: {
            contactno: contactno,
            otp: otp
        },
        success: function (response) {

            var json = $.parseJSON(response);
            $('#otpmessage').html('<span class="text-danger">' + json.reg_msg + '</span><br/>');
            if (json.status == 1) {
                window.location.href = base_url;
            }
            else if (json.status == 3) {
                window.location.href = base_url + 'checkout';
            }
            else {
                window.location.href = base_url;
            }
        }
    });
});