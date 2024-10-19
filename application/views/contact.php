<?php $this->load->view('includes/header'); ?>
<section class="inner-section contact-part mt-8">
    <div class="container">
        <?php
        if ($this->session->has_userdata('msg')) {
            echo $this->session->userdata('msg');
            $this->session->unset_userdata('msg');
        }
        ?>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="row">
                    <div class="contact-card active">
                        <h4><i class="icofont-location-pin"></i>Address</h4>
                        <p>HIG-B-89, H.B ROAD, SECTOR-A, Vidya Nagar, <br> Bhopal, Madhya Pradesh 462026</p>
                        <!-- <p><?= $setting[8]['content_value'] ?></p> -->
                    </div>
                    <div class="contact-card active">
                        <h4><i class="icofont-phone"></i>phone number</h4>
                        <p><a href="tel:<?= $setting[3]['content_value'] ?>" class="pe-5"><?= $setting[3]['content_value'] ?></a></p>
                        <p><a href="tel:<?= $setting[4]['content_value'] ?>"><?= $setting[4]['content_value'] ?></a></p>
                    </div>
                    <div class="contact-card active">
                        <h4><i class="icofont-ui-email"></i>Email</h4>
                        <p><a href="mailto:<?= $setting[7]['content_value'] ?>"><?= $setting[7]['content_value'] ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="pl-2">Connect with Us</h3>
                <form method="post" class="contact-form">
                    <!-- <div class="form-group">
                        <h1 class="contact-hdg-h1 mb-0">Your Name</h1>
                        <div class="form-input-group"><input class="form-control form-input-othr contact-bordr"
                                type="text" name="name" placeholder="Your Name" required></div>
                    </div> -->
                    <div class="form-group">
                        <!-- <h1 class="contact-hdg-h1 mb-0">Your Name</h1> -->
                        <div class="form-input-group"><input class="form-control form-input-othr contact-bordr"
                                type="text" name="name" placeholder="Your Name" required></div>
                    </div>
                    <div class="form-group">
                        <!-- <h1 class="contact-hdg-h1 mb-0">Email address</h1> -->
                        <div class="form-input-group">
                            <input class="form-control form-input-othr contact-bordr" name="email" type="text"
                                placeholder="Your Email" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <h1 class="contact-hdg-h1 mb-0">Contact no.</h1> -->
                        <div class="form-input-group"><input class="form-control form-input-othr contact-bordr"
                                type="text" placeholder="Your Phone" maxlength="10"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone"></div>
                    </div>
                    <div class="form-group">
                        <!-- <h1 class="contact-hdg-h1 mb-0">Message</h1> -->
                        <div class="form-input-group"><textarea name="message"
                                class="form-control form-input-othr contact-bordr"
                                placeholder="Your Message"></textarea></div>
                    </div>
                    <button type="submit" class="form-btn-group contact-submit"><span>Submit Your
                            Request</span></button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
</body>

</html>