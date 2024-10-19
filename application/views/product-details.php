<?php $this->load->view('includes/header'); ?>
<?php $server_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<style>
    .popup {
        transition: transform .2s ease-in-out, top .2s ease-in-out;
        transition-delay: .3s;
        position: absolute;
        z-index: 20;

        &:active,
        &.open {
            top: 0;

            &:after {
                top: 0;
            }

            +.popup-content {
                top: 75px;
                opacity: 1;
                max-height: "calc(100vh - 100px)";
                transition-delay: .5s;
            }
        }

        & &-text {
            cursor: pointer;
            display: block;
            padding: 1em 4em;
            position: relative;
            z-index: 10;
            -webkit-user-select: none;
        }
    }

    .popup-content {
        background: #f1f1f1;
        box-shadow: 0px 3px 20px fade(black, 40%);
        box-sizing: border-box;
        opacity: 0;
        overflow-y: scroll;
        padding: 10px;
        position: relative;
        /* min-height: 50vh; */
        text-align: justify;
        top: 0;
        /* max-height: 0vh; */
        transition: top .2s ease, opacity .2s ease, max-height .15s ease;
        transition-delay: 0s;
    }

    body {
        background: white;
    }

    input[type=radio] {
        display: none;
    }

    input[type="radio"]:checked+label {
        background-color: #1e1e1e !important;
        color: white;
    }

    .custom-radio-button-label {
        transition: all 0.3s linear;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        float: left;
        display: block;
        /* -webkit-appearance: button; */
        -moz-appearance: button;
        -ms-appearance: button;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        background: #ffffff;
        font-size: 1.0rem;
        color: #111111;
        /* border: 2px solid #AAAAAA; */
        padding: 10px;
        width: 40px;
        height: 20px;
        margin: 0 auto;
        text-align: center;
        cursor: pointer
    }

    .tab-pane.active {
        padding: 0px 204px !important;
    }
</style>
<section class="inner-section pt-md-4 mt-5 mt-md-5 inner-section-1">
    <div class="container">
        <?php if ($this->session->userdata('msg') != '') { ?>
            <?= $this->session->userdata('msg'); ?>
        <?php }
        $this->session->unset_userdata('msg'); ?>
        <div class="row">
            <div class="col-lg-6 desktop-off">
                <div class="details-content">
                    <h3 class="details-name  ">
                        <a href="#"><?= $details['product_name']; ?></a>
                    </h3>
                    <div class="text-left">
                        <i class="fa fa-star">
                        </i>
                        <i class=" fa fa-star">
                        </i>
                        <i class=" fa fa-star">
                        </i>
                        <i class="fa fa-star">
                        </i>
                        <i class="fa fa-star">
                        </i>
                        <!-- <a href="#" class="fs-12">(<?= $review_count ?> reviews)</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="details-gallery">
                    <ul class="details-preview">
                        <?php
                        $i = 0;
                        if ($products_image) {
                            foreach ($products_image as $img) {
                                $i = $i + 1;
                                ?>
                                <li>
                                    <img src="<?= setImage($img['image_path'], 'upload/product/') ?>"
                                        alt="<?= $details['product_name']; ?>">
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <ul class="details-thumb">
                        <?php
                        $i = 0;
                        if ($products_image) {
                            foreach ($products_image as $img) {
                                $i = $i + 1;
                                ?>
                                <li>
                                    <img src="<?= setImage($img['image_path'], 'upload/product/') ?>"
                                        alt="<?= $details['product_name']; ?>">
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="details-content">
                    <div class="d-flex product-name-wishlist">
                        <h3 class="details-name mobile-off ">
                            <a href="#"><?= $details['product_name']; ?></a>
                        </h3>
                        <!-- <div class=" mobile-off text-left margin-minus">
                            <i class="fa fa-star">
                            </i>
                            <i class=" fa fa-star">
                            </i>
                            <i class=" fa fa-star">
                            </i>
                            <i class="fa fa-star">
                            </i>
                            <i class="fa fa-star">
                            </i>
                                <a href="#">(<?= $review_count ?> reviews)</a>
                            </div> -->
                    </div>
                    <div class="details-price-container">
                        <span class="details-price">
                            ₹<?= $details['market_price']; ?>
                        </span>
                        <h2 class="product-othr-h2-hdg">Price inclusive of all taxes</h2>
                    </div>
                    <?php if ($details['short_description']) {
                        ?>
                        <h2 class="main-hdg-prdct-datail">Product Description</h2>
                        <p class="prdct-para-details">
                            <?= getExcerpt($details['short_description']); ?> <br /><a href="#description"
                                class="prdct-para-details">More details</a>
                        </p>
                        <?php
                    } ?>
                    <?php
                    if ($form_fields && is_array($form_fields)) {
                        ?>
                        <form method="post" id="productForm" class="contact-form-prod" enctype="multipart/form-data">
                            <h4>Ready to Customize</h4>
                            <?php foreach ($form_fields as $field) { ?>
                                <div class="form-group">
                                    <div class="form-input-group">
                                        <input type="hidden" name="product_id" value="<?= $details['product_id'] ?>">
                                        <?php if ($field['field_type'] == 'text') { ?>
                                            <input class="form-control form-input-othr contact-bordr" type="text"
                                                name="custom_name[]" placeholder="<?php echo $field['form_fields']; ?>">
                                        <?php } elseif ($field['field_type'] == 'file') { ?>
                                            <input class="form-control form-input-othr contact-bordr" type="file"
                                                name="custom_files[]">
                                        <?php } elseif ($field['field_type'] == 'number') { ?>
                                            <input class="form-control form-input-othr contact-bordr" type="number"
                                                name="custom_numbers[]" placeholder="<?php echo $field['form_fields']; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- <button type="submit" id="saveFormData" class="btn btn-primary">Save & Continue to Order</button> -->
                            <div class="details-add-group">
                                <div class="product-action othr-action">
                                    <button class="action-minus" title="Quantity Minus"
                                        data-rowid="<?= $details['product_id'] ?>" data-type="sidecart">
                                        <i class="icofont-minus">
                                        </i>
                                    </button>
                                    <input class="action-input" title="Quantity Number"
                                        id="qtysidecart<?= $details['product_id'] ?>" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="Quantity Plus"
                                        data-rowid="<?= $details['product_id'] ?>" data-type="sidecart">
                                        <i class="icofont-plus">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                    ?>

                    <div class="details-action-group">
                        <button class="product-add  addCart  crtbtn-<?= $details['product_id'] ?>"
                            data-id="<?= $details['product_id'] ?>" title="Add to Cart">
                            <img src="<?= base_url() ?>assets/images/website Icons/icon.png" alt="Kritosh"
                                class="mr-10">
                            <span>Add to Cart</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="inner-section" id="description">
    <div class="container custom-product-desbox">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs res-flex-wrap">
                    <li>
                        <a href="#tab-instruction" class="tab-link active" data-bs-toggle="tab">Specification</a>
                    </li>
                    <li>
                        <a href="#tab-feature" class="tab-link " data-bs-toggle="tab">About this item</a>
                    </li>
                    <li>
                        <a href="#tab-reve" class="tab-link" data-bs-toggle="tab">Shipping</a>
                    </li>
                    <li>
                        <a href="#tab-return" class="tab-link" data-bs-toggle="tab">Additional Information</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-feature">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-container mt-5">
                        <?= $details['specification'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade  show active" id="tab-instruction">
            <div class="row">
                <div class="col-md-12 productDescription">
                    <?= $details['about_item'] ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-reve">
            <div class="row">
                <?= $details['shipping'] ?>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-return">
            <div class="row">
                <div class="col-lg-12">
                    <?= $details['description'] ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="inner-section faq-part">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading text-left res-text-center">
                    <h2 class="similar-product-hdn">Frequently Asked Questions</h2>
                </div>
            </div>
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

<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
</body>
<script>
    (function () {
        document.querySelectorAll(".popup")
            .forEach(popup => {
                popup.addEventListener('click', () => {
                    popup.classList.toggle('open');
                })
            })
    })();
    $(document).ready(function () {
        $("#copyTextBtn").click(function () {
            var text1 = $("#affiliateLinkInput").val();
            var tempInput = $("<input>");
            $("body").append(tempInput);
            // console.log(text1);
            tempInput.val(text1).select();
            document.execCommand("copy");
            tempInput.remove();
            alert("Link copied successfully!");
        });
    });

    function getAffiliateLink() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('getAffiliateLink') ?>",
            data: {
                user: "<?= sessionId('login_user_id') ?>",
                product: "<?= $details['product_id'] ?>"
            },
            success: function (response) {
                $('#affiliateLinkInput').val(response)
                // $('.linkCopyBtn').html(`<i class="fa fa-clone"></i>`);
                $('.linkCopyBtn').html('Copy Link');
                $('#affiliateLinkInput').attr('placeholder', 'Affiliate Link');
            }
        });
    }

    let affiliateLinkBtn = document.querySelector('#affiliateLinkBtn');
    if (affiliateLinkBtn) {
        affiliateLinkBtn.addEventListener('click', function () {
            $('#affiliateLinkInput').attr('placeholder', 'Generating Link...');
            $('.linkCopyBtn').html(`<div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
                </div>`);
            $.ajax({
                type: "POST",
                url: "<?= base_url('genrateAffiliateLink') ?>",
                data: {
                    user: "<?= sessionId('login_user_id') ?>",
                    product: "<?= $details['product_id'] ?>"
                },
                success: function (response) {
                    setTimeout(() => {
                        getAffiliateLink();
                    }, 1000);
                }
            });
        });
    }
    $('input[name^="size<?= $details['product_id'] ?>"]').first().prop('checked', true);
    updatePrice(<?= $details['product_id'] ?>);
</script>
<script>
    $(document).ready(function () {
        // When the reviews link is clicked
        $('#open-reviews').click(function (e) {
            e.preventDefault(); // Prevent default anchor click behavior

            // Trigger the tab switch to #tab-reve
            $('.nav-tabs a[href="#tab-reve"]').tab('show');

            // Listen for when the tab is fully shown
            $('.nav-tabs a[href="#tab-reve"]').on('shown.bs.tab', function () {
                // Smoothly scroll to the review section after the tab is fully shown
                $('html, body').animate({
                    scrollTop: $('#tab-reve').offset().top
                }, 400); // Scroll duration (400ms)
            });
        });
    });
    $(document).ready(function () {
        // When the reviews link is clicked
        $('#open-review').click(function (e) {
            e.preventDefault(); // Prevent default anchor click behavior

            // Trigger the tab switch to #tab-reve
            $('.nav-tabs a[href="#tab-reve"]').tab('show');

            // Listen for when the tab is fully shown
            $('.nav-tabs a[href="#tab-reve"]').on('shown.bs.tab', function () {
                // Smoothly scroll to the review section after the tab is fully shown
                $('html, body').animate({
                    scrollTop: $('#tab-reve').offset().top
                }, 400); // Scroll duration (400ms)
            });
        });
    });
</script>


</html>