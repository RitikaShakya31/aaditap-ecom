<?php $this->load->view('includes/header'); ?>
<section class="coming-part">
    <div class="container">
        <div class="row align-items-center justify-content-center  pt-5">
            <div class="col-lg-7">
                <div class="coming-content text-center p-5">
                <?php echo $message; ?>
                 
                    <div class="coming-social">
                    <a href="<?= base_url('product') ?>" class="btn btn-priamry" style="margin-bottom:12px">Continue Shopping</a>
                    <a href="<?= base_url('orders') ?>" class="btn btn-success bg-success" style="margin-bottom:12px">View Orders </a>
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