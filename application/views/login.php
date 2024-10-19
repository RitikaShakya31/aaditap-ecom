<?php $this->load->view('includes/header'); ?>
<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-6 col-xl-6">
                <div class="user-form-card login-card">
                    <div class="user-form-title">
                        <?php if ($this->session->userdata('msg') != '') { ?>
                            <?= $this->session->userdata('msg'); ?>
                        <?php  }
                        $this->session->unset_userdata('msg'); ?>
                        <?php if ($this->session->userdata('loginmsg') != '') { ?>
                            <?= $this->session->userdata('loginmsg'); ?>
                        <?php  }
                        $this->session->unset_userdata('loginmsg'); ?>
                    </div>
                    <div class="l-group">
                        <img src="<?= base_url() ?>assets/img/logo.png" alt="logo" width="150px" class="l-logo">
                        <form class="user-form custom-login-form" method="post" action="">
                            <div class="form-group">
                                <label>Enter Email </label>
                                <input type="email" name="uname" placeholder="Enter Your email " class="form-control mt-1 l-input" required="">
                                <!-- <input type="email" name="uname" id="contactno" placeholder="Enter Your email *" class="form-control mt-1 l-input" required="" maxlength="10"> -->
                                <span id="contactErrMsg" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" class="form-control myinput mt-1 l-input" name="password" placeholder="****" autocomplete="off" required="">
                            </div>
                            <div class="text-center mt-3  ">

                                <a href="<?= base_url('forgot-password') ?>" style="color: #095edb; text-decoration: underline;">Forget Password</a>
                            </div>
                            <!-- <div class="form-group" style="display:none" id="otpbox">
                                <label>Enter OTP</label>
                                <input type="text" class="form-control myinput mt-1 l-input" name="otp" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="****" id="otp" autocomplete="off">
                            </div> -->
                            <!-- <div class="form-group">
                                <p id="otpmessage"></p>
                            </div> -->
                            <div class="form-button">
                                <div class="d-flex justify-content-center">
                                    <a href="javascript: void(0);" id="otpverify" class="btn btn-success w-50 l-btn" style="display:none;">
                                        <span>Continue</span>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="w-50 mt-3 l-btn">Login now</button>
                                    <!-- <button type="button" class="w-50 mt-3 l-btn" id="otpbtn">Continue</button> -->
                                </div>
                                <div class="resendOtpWrapper">
                                    <p id="resendmsg"></p>
                                </div>
                                <div class="or-div  ">
                                    <div class="line"></div>
                                    <div>or</div>
                                    <div class="line"></div>
                                </div>
                                <div class="d-flex justify-content-center  ">
                                    <a href="<?php echo base_url('google-login'); ?>" class="w-50 mt-3 l-border-btn">Continue With Google</a>
                                </div>
                                <div class="text-center mt-3  ">
                                    <p class="alredy-account">Don't have an account?</p>
                                    <a href="<?= base_url('register') ?>" style="color: #095edb; text-decoration: underline;">Sign up</a>
                                </div>
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

</html>