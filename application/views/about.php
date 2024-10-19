<?php $this->load->view('includes/header'); ?>
<section class="inner-section single-banner shop-banner" style="<?php
echo 'background-image:url(' . base_url($setting[39]['content_value']) . ');';
?>background-position: left;background-size: cover;background-repeat: no-repeat;">
    <div class="container text-left">
        <h2 style="visibility: hidden;">Product List</h2>
        <!-- <h2 class="text-white">Product List: <?= $category_info['category_name'] ?></h2> -->
    </div>
</section>
<section class="inner-section about-company">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img position-relative animate fadeInLeft two">
                    <img src="<?= base_url() ?>assets/images/about/kritosh.png" alt="about" class="about">
                </div>
            </div>
            <div class="col-lg-6 animate fadeInRight two">
                <h2 class="text-start mb-4 res-mt-60 our-story">Our History</h2>
                <div class="">
                    <p class="text-start text-justify story-para">
                        With a heritage steeped in the refined elegance of Bhopal, our fragrance house has thrived for
                        over a century, captivating discerning patrons with unparalleled artistry. For 45 years and
                        across three generations, we’ve dedicated ourselves to the craft of hand-blending, driven by
                        passion rather than commercial interests. Our unique formulas are a closely guarded secret, but
                        they embody a legacy of excellence and a dream fulfilled.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="inner-section about-company">
    <div class="container">
        <h2 class="main-hdg-about mb-5 ">Our Mission and Promise</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="about-img mb-4">
                    <img src="<?= base_url() ?><?= $setting[36]['content_value'] ?>" alt="about"
                        class="w-100 mission-img-1">
                    <!-- <img src="<?= base_url() ?>assets/images/about/Rectangle 7.png" alt="about" class="w-100 about-img-1"> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-content mb-4">
                    <h2 class="about-content-hdg">Our Mission</h2>
                    <p class="para-about-mission"> We believe that each fragrance is the extension to our personality
                        and with that we
                        are more confident in expressing ourselves. Our mission is to make unique appearance in the
                        market
                        and provide the great quality of products and services to our customers by which they can
                        fearlessly express their own personality.</p>
                </div>
            </div>
            <div class="col-md-6 promise-box">
                <div class="about-content mb-4 res-mb-0 ">
                    <h2 class="about-content-hdg res-pt-0">Promise</h2>
                    <p class="para-about-mission"> Our promise to you is a commitment to “lifetime of satisfaction”. If
                        you ever
                        at anytime felt not completely satisfied with your purchase, we will take the necessary steps to
                        rectify the situation by any means to ensure the customer's happiness and loyalty.</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-img mb-4">
                    <img src="<?= base_url() ?><?= $setting[37]['content_value'] ?>" alt="about"
                        class="w-100 promise-img">
                    <!-- <img src="<?= base_url() ?>assets/images/about/Rectangle 9.png" alt="about" class="w-100 "> -->
                </div>
            </div>

        </div>
    </div>
</section>



<section class="inner-section about-company">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="main-hdg-about text-start mb-1 shubhangi-name">“Our Founder and Grandfather " Mr. Shrikrishna
                    “</h2>
                <div class="">
                    <h5>नमस्ते और कृतोष में आपका स्वागत है!</h5>
                    <p class="text-start text-justify shubhangi-des mt-3">I’m delighted to share with you the story of
                        our
                        beloved fragrance house. Since 1978, “Kritosh” has been more than just a name in the world of
                        attars and perfume oils—it’s been a journey through scent, tradition, and artistry. Our story
                        began with a passion for creating exquisite fragrances that not only captivate the senses but
                        also tell a story of elegance and heritage.

                        For 45 years, we’ve dedicated ourselves to the craft of hand-blending, driven by a love for
                        perfection rather than commercial trends. From our roots in the culturally rich city of Bhopal,
                        we’ve built a legacy across three generations, blending timeless techniques with a keenly
                        inherited sense of smell.

                        What we create at “ Kritosh ” is truly special, and while our exact formulas remain a cherished
                        secret, what we can share is our deep commitment to making every fragrance a masterpiece. We
                        invite you to experience the artistry and tradition that define Kritosh and discover the unique
                        scents that have enchanted so many over the years.</p>
                    <p class="text-start text-justify shubhangi-des mt-3">Thank you for being a part of our journey.</p>
                    <p class="text-start text-justify shubhangi-des">-my last words</p>
                </div>
            </div>

            <div class="col-lg-4 about-logo">
                <div class="about-img">
                    <img src="<?= base_url() ?><?= $setting[2]['content_value'] ?>" alt="about" class="w-100">
                    <!-- <img src="<?= base_url() ?>assets/images/about/about_kritosh.png" alt="about" class="shubhangi-img"> -->

                </div>
            </div>

        </div>
    </div>
</section>




<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>

</body>

</html>