<?php $this->load->view('includes/header'); ?>
<style>
    .banner-imgs {
        height: 567px !important;
        background-size: cover !important;
        margin-top: 35px;
    }
    .home-classic-slider {
        background: #FFFFFF;
    }
    .bnr-hdg {
        padding-top: 25px;
    }
    @media (max-width: 600px) {
        .banner-imgs {
            height: 752px !important;
            background-size: cover !important;
        }
        .banner-imgs {
            margin-top: 0px;
        }
        .banner-part {
            padding: 0px 0px 60px;
        }
        .bnr-hdg-h1 {
            font-size: 31px;
        }
        .bnr-para {
            font-size: 16px;
        }
        .col-xs-6 {
            width: 50%;
        }
        .image-container {
            right: 0px;
            top: 66px;
        }
    }
    .cat-contents {
        bottom: -9% !important;
    }
    .suggest-card::before {
        display: none;
    }
    .category-wrapper {
        position: relative;
    }
    .category-wrapper .categoryExploreBtn {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 999;
        background: white;
        padding: 2px 20px;
        border-radius: 15px;
        font-size: 15px;
        font-weight: bolder;
        opacity: 0;
        visibility: hidden;
        transition: all .3s ease-in-out;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
    }
    .category-wrapper .category-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 24%;
        background: rgba(0, 0, 0, 1);
        padding: 8px 0;
        margin-top: inherit;
        transition: all 0.3s ease-in;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .category-wrapper:hover .category-footer {
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
    }
    .category-wrapper:hover .categoryExploreBtn {
        opacity: 1;
        visibility: visible;
    }
    .category-wrapper:hover .category-footer h4 {
        margin-top: -65px !important;
    }
    @media (max-width: 991px) {
        .bnr-hdg {
            padding-top: 0px;
            top: 32px;
            text-align: center;
        }
        .bnr-para {
            border-left: none;
        }
        .bnr-hdg-h1 {
            padding-bottom: 5px;
        }
        .section-btn-25 {
            text-align: center;
            display: block;
            margin-top: 25px;
            justify-content: center;
        }
    }
</style>
<section class="inner-section single-banner shop-banner" style="<?php
echo 'background-image:url(' . base_url($setting[26]['content_value']) . ');';
?>background-position: left;background-size: cover;background-repeat: no-repeat;">
    <div class="container text-left">
        <h2 style="visibility: hidden;">Product List</h2>
    </div>
</section>
<section class="inner-section about-company">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-img mb-4">
                    <img src="<?= base_url() ?><?= $setting[24]['content_value'] ?>" alt="<?= $setting[15]['content_value'] ?>"
                        class="w-100 mission-img-1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-img mb-4">
                    <div class="about-content mb-4">
                        <img src="<?= base_url() ?><?= $setting[25]['content_value'] ?>" alt="<?= $setting[15]['content_value'] ?>"
                            class="w-100 mission-img-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section newitem-part">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading best-seller-hdn">
                    <h1>Best Seller</h1>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="top-m">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 justify-content-center">
                <?php
                if ($mproductdesc != '') {
                    foreach ($mproductdesc as $row) {
                        echo '<div class="col">';
                        product($row, 'new');
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="section suggest-part newpro">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex align-items-center">
                <div class="heading-content res-text-center pr-40">
                    <h1 class="new-hdg">About Us <span class="whats_new_line"></span>
                    </h1>
                    <h2 class="fallinlove-hdn">Aaditap Heavy Acrylic 1, 2, 3, 4 QR Digital Standee | Robust Google QR
                        Scanner & Social Media</h2>
                    <p class="new-para">Use our digital standee to increase consumer interaction—scan for social media,
                        reviews, and more!
                    </p>
                    <div class="mt-4 res-mb-35"><a href="<?= base_url('product') ?>" class="btn btn-new"><span>Explore
                                More</span></a></div>
                </div>
            </div>
            <!-- Right Side Product Cards -->
            <div class="col-lg-6 col-md-6 pt-5 ps-5">
                <div class="row d-flex justify-content-center">
                    <img class="about-img" src="<?= base_url('assets/images/banner.webp')?>" alt="<?= $setting[15]['content_value'] ?>">
                    <!-- <div class="embed-responsive embed-responsive-16by9"> -->
                        <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3hCAnVQg5Xk"
                            allowfullscreen></iframe> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section newitem-part">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading best-seller-hdn">
                    <h1>Feature Products</h1>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="top-m">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 justify-content-center">
                <?php
                if ($featurepro != '') {
                    foreach ($featurepro as $row) {
                        echo '<div class="col">';
                        product($row, 'new');
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
<script>
    $('.tabslick').click(function () {
        $('.new-slider').slick('setPosition');
        $('.new1-slider').slick('setPosition');
        $('.new2-slider').slick('setPosition');
    });
</script>
</body>
</html>