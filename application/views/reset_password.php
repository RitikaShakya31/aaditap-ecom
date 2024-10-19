<?php $this->load->view('includes/header'); ?>


<section class="user-form-part p-5">
    <div class="container ">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 mt-5">
                <div class="user-form-card">

                    <?php
                    if ($reset_valid) {
                    ?>
                        <div class="user-form-title">
                            <h2>Reset Password ?</h2>
                            <p><?= $reset_message ?></p>
                            <?php if ($this->session->userdata('msg') != '') { ?>
                            <?= $this->session->userdata('msg'); ?>
                        <?php  }
                        $this->session->unset_userdata('msg'); ?>
                        </div>
                        <form class="user-form" method="post" action="">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control w-100" placeholder="Enter your   password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirmpassword" class="form-control w-100" placeholder="Enter your confirm password">
                            </div>
                            <div class="form-button">
                                <button type="submit">Reset Password</button>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <div class="user-form-title">
                            <h2><?= $reset_message ?></h2>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="user-form-remind">
                    <p>Go Back To<a href="<?= base_url('login') ?>">login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>


</body>

</html>