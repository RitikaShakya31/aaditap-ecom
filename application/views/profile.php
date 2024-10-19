<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/user-header'); ?>
<section class="inner-section profile-part">
    <div class="container">
        <?php if ($msg = $this->session->flashdata('msg')) :
            $msg_class = $this->session->flashdata('msg_class') ?>
            <div class='row'>
                <div class='col-lg-12' style="margin-bottom: 5px;">
                    <div class='alert  <?= $msg_class; ?>' style="padding:12px">
                        <?= $msg; ?>
                    </div>
                </div>
            </div>
        <?php $this->session->unset_userdata('msg');
        endif; ?>
        <div class="row">


            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Update Profile</h4>
                            <a href="<?= base_url('logout') ?>" class="logout bg-btn-dark">
                                Logout
                            </a>

                        </div>
                        <div class="account-content custom-profile-form">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">name</label>
                                            <input class="form-control profile-feild" type="text" name="name" value="<?= $profiledata['name'] ?>" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">Last name</label>
                                            <input class="form-control profile-feild" type="text" name="lname" value="<?= $profiledata['lname'] ?>" />
                                        </div>
                                    </div> -->
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">Email</label>
                                            <input class="form-control profile-feild" name="email_id" type="email" value="<?= $profiledata['email_id'] ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">Mobile</label>
                                            <p class="form-control d-flex align-items-center profile-feild" name="email_id" type="email" value="<?= $profiledata['contact_no'] ?>" />
                                            <?= $profiledata['contact_no'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">Address</label>
                                            <input class="form-control profile-feild" type="text" name="address" value="<?= $profiledata['address'] ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">Postal Code</label>
                                            <input class="form-control profile-feild" type="text" name="postal_code" value="<?= $profiledata['postal_code'] ?>" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label profile-label">Take part on Affiliate program ?</label>
                                            <select name="is_affiliate" class="form-control profile-feild">
                                                <option value="1" <?= (($profiledata['is_affiliate'] == 1) ? 'selected' : '') ?>>Yes</option>
                                                <option value="0" <?= (($profiledata['is_affiliate'] == 0) ? 'selected' : '') ?>>No</option>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-2">
                                        <div class="profile-btn">
                                            <button type="submit" class="my-button" style="width: 100%;">Update</button>
                                        </div>
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


</body>

</html>