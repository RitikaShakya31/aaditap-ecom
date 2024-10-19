<?php $this->load->view('includes/header'); ?>
<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-12 col-lg-12 col-xl-6">
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>Verify Account!</h2>
                        <!-- <p>Setup A New Account In A Minute</p> -->
                        <?php if ($this->session->userdata('reg_msg') != '') { ?>
                            <?= $this->session->userdata('reg_msg'); ?>
                        <?php  }
                        $this->session->unset_userdata('reg_msg'); ?>
                    </div>
                    <div class="user-form-group">

                        <form class="user-form" method="post">
                            <label>Enter OTP shared to your whatsapp no <b><?= sessionId('user_contact') ?></b></label>
                            <input type="hidden" id="contactno" value="<?= sessionId('user_contact') ?>">
                            <div class="form-group" id="otpbox">
                                <input type="text" class="form-control myinput custom-otpfeild" name="otp" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter OTP" id="otp" autocomplete="off">
                                <span id="response"></span>
                            </div>

                            <div class="form-button">
                                <div class="d-flex justify-content-center">
                                    <a href="javascript: void(0);" id="registerotpverify" class="btn w-50"> <span>Verify</span> </a>
                                    
                                   
                                </div>
                                <span  onclick="resend();" class="badge btn-primary resend mt-3" style="display: none;">Resend OTP</span>
                                <p id="countdownText" class="text-info p-2"></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
<script src="<?= base_url() ?>assets/js/myplugin.js"></script>
</body>
<script>
    function resend() {
        $('.resend').hide();
        $('#countdownText').show();
        var countdown = 20; // Countdown in seconds
        var countdownInterval = setInterval(function() {
            $('#countdownText').text('Resend in ' + countdown + ' seconds');
            countdown--;
            if (countdown < 0) {
                clearInterval(countdownInterval);
                $('.resend').show();
                $('#countdownText').hide();
            }
        }, 1000);
        phoneAuth();
    }
    $('#countdownText').show();
    var countdown = 20; // Countdown in seconds
    var countdownInterval = setInterval(function() {
        $('#countdownText').text('Resend in ' + countdown + ' seconds');
        countdown--;
        if (countdown < 0) {
            clearInterval(countdownInterval);
            $('.resend').show();
            $('#countdownText').hide();
        }
    }, 1000);

    function phoneAuth() {

        $.ajax({
            method: "POST",
            url: "<?= base_url('UserHome/resendotp') ?>",
            dataType: 'JSON',
            success: function(response) {
                if (response != '') {
                    var countdown = 20;
                    var countdownInterval = setInterval(function() {
                        $('#countdownText').text('Resend in ' + countdown + ' seconds');
                        countdown--;
                        if (countdown < 0) {
                            clearInterval(countdownInterval);
                            $('.resend').show();
                            $('#countdownText').hide();
                        }
                    }, 1000);
                    $('#response').html(response);
                }else{
                    $('#response').html('Server Error');
                }
            }
        });
    }
</script>

</html>