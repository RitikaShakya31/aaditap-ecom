<?php $this->load->view('includes/header'); ?>


<section class="user-form-part p-5">
    <div class="container ">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 mt-5">
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>Forget Password ?</h2>
                        <p>No problem! Just enter email id here.</p>
                        <?php if ($this->session->userdata('forget') != '') { ?>
                            <?= $this->session->userdata('forget'); ?>
                        <?php  }
                        $this->session->unset_userdata('forget'); ?>
                    </div>
                    <form class="user-form" method="post" action="">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control w-100" placeholder="Enter your email" >
                        </div>
                        <div class="form-button">
                            <button type="submit">Reset Password</button>
                        </div>
                    </form>
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