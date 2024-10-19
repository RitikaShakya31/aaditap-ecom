<?php $this->load->view('includes/header'); ?>

<!-- <section class="inner-section single-banner">
    <div class="container">
        <h2><?= $pp[0]['title_policy'] ?></h2>
    </div>
</section> -->

<section class="inner-section privacy-part mt-8">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= $pp[0]['particulars'] ?>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>

</body>

</html>