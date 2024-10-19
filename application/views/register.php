<?php $this->load->view('includes/header'); ?>
<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-6 col-xl-6">
                <div class="user-form-card login-card">
                    <div class="user-form-title">
                        <h2>Join Now!</h2>
                        <p>Setup Your New Account In A Minute</p>
                        <?php if ($this->session->userdata('msg') != '') { ?>
                            <?= $this->session->userdata('msg'); ?>
                        <?php  }
                        $this->session->unset_userdata('msg'); ?>
                    </div>
                    <div class="l-group">
                        <img src="<?= base_url() ?>assets/img/logo.png" alt="logo" width="170px" class="l-logo">
                        <form class="user-form custom-login-form" method="post" action="">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control mt-1 l-input" name="name" placeholder="Enter name" required />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control mt-1 l-input" name="contact_no" id="contact_no" placeholder="Enter Contact Number" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  required/>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control mt-1 l-input" name="email_id" id="email_id" placeholder="Enter email" required />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control mt-1 l-input" minlength="8" name="password" id="password" placeholder="Enter Password" required />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control mt-1 l-input" name="confirm_password" id="password" placeholder="Enter Confirm Password" required />
                            </div>
                           
                            <!-- <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="address" placeholder="Address*" required>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="area" placeholder="Area*" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="postal_code" placeholder="Pincode*" value="" maxlength="6" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="state" required id="state">
                                    <option value="">Select state </option>
                                    <?php
                                    if ($state_list) {
                                        foreach ($state_list as $state) {
                                    ?>
                                            <option value="<?= $state['state_name'] ?>"><?= $state['state_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="city" class="form-control" id="city" required>
                                    <option value="">Select city</option>
                                </select>
                            </div> -->
                            <div class="form-button">
                                <span class="text-danger" id="registerlogin"></span>
                                <button type="submit" id="register">register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="user-form-remind mb-10">
                    <p>Already Have An Account?<a href="<?= base_url('login') ?>">login here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
</body>
<script>
    $(document).ready(function() {
        $('#email_id, #contact_no').on('blur', function() {
            var email = $('#email_id').val();
            var contactNo = $('#contact_no').val();

            $.ajax({
                url: "<?= base_url('UserHome/checkaccount') ?>",
                method: 'POST',
                data: {
                    email: email,
                    contact_no: contactNo
                },
                success: function(response) {
                    if (response == '') {
                        $('#registerlogin').html('');
                        // $('#register').prop('disabled', false);
                    } else {
                        $('#registerlogin').html(response);
                        // $('#register').prop('disabled', true);
                    }

                }
            });
        });
    });
</script>

</html>