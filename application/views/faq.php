<?php $this->load->view('includes/header'); ?>



<section class="single-banner" style="background-color: #fff !important">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <!-- <p class="about-para"></p> -->
    </div>
</section>
<?php if ($this->session->userdata('msg') != '') { ?>
    <?= $this->session->userdata('msg'); ?>
<?php }
$this->session->unset_userdata('msg'); ?>
<section class="inner-section faq-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-parent">
                    <?php
                    if ($getFaqs):
                        foreach ($getFaqs as $row):
                            ?>
                            <div class="faq-child">
                                <div class="faq-que ">
                                    <button class="d-flex align-items-center justify-content-between"><?= $row['question'] ?>
                                        <div><i class="fa fa-plus"></i></div>
                                    </button>
                                </div>
                                <div class="faq-ans">
                                    <p><?= $row['answer'] ?></p>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper b-1 mb-4">
                <h3>Ask Query</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <textarea class="mt-2" name="question" cols="30" rows="1" placeholder="Enter Your Question"
                        required></textarea>
                    <div class="btn-group">
                        <button type="submit" class="btn submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>


</body>

</html>