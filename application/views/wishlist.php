<?php $this->load->view('includes/header'); ?>
<style>
    p {
        text-align: justify;
    }
</style>

<section class="mt-5">
    <div class="container pt-5">
        <h2 class="about-hdg pt-4">My Wishlist </h2>
    </div>
</section>
<section class="inner-section wishlist-part pt-5 mt-5">
    <div class="container">
        <div class="row res-justify-content-center">
            <div class="col-lg-12 row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 justify-content-center"
                id="wishtlistProducts">

            </div>
        </div>
    </div>
</section>



<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>

<script>
    function fetchWishlistProducts() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('UserHome/get_whishlistproducts') ?>",
            success: function (response) {
                document.querySelector('#wishtlistProducts').innerHTML = response;
            }
        });
    }
    fetchWishlistProducts();
</script>
</body>

</html>