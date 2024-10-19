<?php $this->load->view('includes/header'); ?>
<style>
    .hidden {
        display: none;
    }
</style>
<section class="inner-section single-banner" style="background: url(assets/images/single-banner.jpg) no-repeat center">
    <div class="container">
        <h2>Checkout</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </div>
</section>
<section class="inner-section checkout-part">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>User Info</h4>
                        </div>
                        <input class="form-control" type="hidden" name="total_item_amount" id="totalamount"
                            value="<?php echo $this->cart->total(); ?>">
                        <input class="form-control" type="hidden" name="final_amount" id="grand_total"
                            value="<?php echo $this->cart->total(); ?>">
                        <input class="form-control" type="hidden" name="user_id"
                            value="<?= $this->session->userdata('login_user_id') ?>">
                        <div class="ec-check-bill-form login-card">
                            <div class="form-outline">
                                <label>Full name</label>
                                <input type="text" class="form-control mt-1 l-input" name="name" placeholder="Name:"
                                    value="<?= $login[0]['name'] ?>" required>
                            </div>
                            <div class="form-outline ">
                                <label>Contact No.</label>
                                <input type="text" class="form-control mt-1 l-input" name="contact_no"
                                    placeholder="Phone No:" value="<?= $login[0]['contact_no'] ?>" maxlength="10"
                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            </div>
                            <div class="form-outline ">
                                <label>Email</label>
                                <input type="text" class="form-control mt-1 l-input" name="email"
                                    placeholder="Email Id:" value="<?= $login[0]['email_id'] ?>" maxlength="10"
                                    required>
                            </div>
                            <div class="form-outline">
                                <label>State</label>
                                <select class="form-control mt-1 l-input" name="state" required id="state">
                                    <option value="">Select state </option>
                                    <?php
                                    if ($state_list) {
                                        foreach ($state_list as $state) {
                                            ?>
                                            <option value="<?= $state['state_name'] ?>"
                                                <?= (($state['state_name'] == $login[0]['state']) ? 'Selected' : '') ?>>
                                                <?= $state['state_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-outline ">
                                <label>City</label>
                                <select name="city" class="form-control mt-1 l-input" id="city">
                                    <?php
                                    if ($login[0]['city'] != '') {
                                        ?>
                                        }
                                        <option value="<?= $login[0]['city'] ?>" selected> <?= $login[0]['city'] ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="">Select city</option>
                                </select>
                            </div>
                            <div class="form-outline ">
                                <label>Pincode</label>
                                <input type="text" class="form-control mt-1 l-input" name="postal_code"
                                    placeholder="Pincode*" value="<?= $login[0]['postal_code'] ?>" maxlength="6"
                                    required>
                            </div>
                            <div class="form-outline">
                                <label>Address</label>
                                <input type="text" class="form-control mt-1 l-input" name="address"
                                    placeholder="Address*" value="<?= $login[0]['address'] ?>" required>
                            </div>
                            <div class="account-title">
                                <h4>Shipping address</h4>
                            </div>
                            <div>
                                <label for="same_as_billing">Same as Billing Address:</label>
                                <input type="checkbox" id="same_as_billing" name="same_as_billing" checked>
                            </div>
                            <div id="shipping_address_fields" class="hidden">
                                <div class="form-outline">
                                    <label for="shipping_address">Shipping Address:</label><br>
                                    <input type="text" id="shipping_address" name="shipping_address"
                                        id="shipping_address" class="form-control mt-1 l-input"><br>
                                </div>
                                <div class="form-outline">
                                    <label for="shipping_city">City:</label><br>
                                    <input type="text" id="shipping_city" name="shipping_city" id="shipping_city"
                                        class="form-control mt-1 l-input"><br>
                                </div>
                                <div class="form-outline">
                                    <label for="shipping_state">State:</label><br>
                                    <input type="text" id="shipping_state" name="shipping_state" id="shipping_state"
                                        class="form-control mt-1 l-input"><br>
                                </div>
                                <div class="form-outline">
                                    <label for="shipping_zip">ZIP Code:</label><br>
                                    <input type="text" id="shipping_zip" name="shipping_zip" id="shipping_zip"
                                        class="form-control mt-1 l-input"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Amount Details</h4>
                        </div>
                        <div id="cartlist" class="bottom-border"></div>
                        <div class="account-content">
                            <div class="faq-parent">
                                <div class="faq-child">
                                    <div class="faq-que"><button type="button">Check coupon</button></div>
                                    <div class="faq-ans">
                                        <div class="wallet-card-group">
                                            <?php
                                            if (!empty($promocode)) {
                                                foreach ($promocode as $promo) {
                                                    if ($promo['minimum_order'] < $this->cart->total()) {
                                                        ?>
                                                        <div class="wallet-card cborder">
                                                            <input class="coupon-code" id="coupon<?= $promo['promocode_id'] ?>"
                                                                value="<?= $promo['promocode'] ?>" readonly>
                                                            <span class="copy-button" data-id="<?= $promo['promocode_id'] ?>"
                                                                onclick="myFunction('coupon<?= $promo['promocode_id'] ?>')">Copy</span>
                                                            <h6 class="pl-12">You Get Flat - <?= $promo['amount'] ?> Off </h6>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chekout-coupon">
                                <button type="button" class="coupon-btn">Do you have a coupon code?</button>
                                <div class="coupon-form">
                                    <input type="text" id="promocode" name="promocode"
                                        placeholder="Enter your coupon code">
                                    <input class="form-control form-control-md mr-1 mb-2" type="hidden"
                                        placeholder="Enter Your Coupon Code" name="promocode_amount" id="promocode_amt"
                                        value="">
                                    <button type="button" id="promo"><span>apply</span></button>
                                </div>
                            </div>
                            <ul class="invoice-details">
                                <li>
                                    <h6>Sub Total</h6>
                                    <p><span class="totalamount"></span></p>
                                </li>
                                <li>
                                    <h6>Delivery Charges</h6>
                                    <p> <?php
                                    if ($delivery['min_amount'] >= $this->cart->total()) { ?>
                                            ₹ <?= $delivery['amount']; ?>
                                            <input type="hidden" value="<?= $delivery['amount']; ?>" id="shipping_charges"
                                                name="delivery_charges">
                                        <?php } else { ?>
                                            Free
                                            <input type="hidden" value="0" id="shipping_charges" name="delivery_charges">
                                        <?php } ?>
                                    </p>
                                </li>
                                <li>
                                    <h6>Product Discount</h6>
                                    <p class="free" id="prodisount"></p>
                                </li>
                                <li <?php
                                if ($login[0]['is_affiliate'] == 0) {
                                    echo 'style="display:none"';
                                }
                                ?>>
                                    <h6><input type="checkbox" name="paypoints" id="myCheckbox" value="0" /> Use your
                                        <b><span class="points">0</span> Affiliates Points </b></h6>
                                </li>
                                <li id="deducamt"></li>
                                <hr>
                                <li>
                                    <h6>Total</h6>
                                    <p><span id="cartgrandprice"> ₹
                                            <?php echo $this->cart->format_number($this->cart->total()); ?> /- </span>
                                    </p>
                                </li>
                                <li>
                                    <h6>Payment Method</h6>
                                    <p><input type="radio" name="payment_mode" value="1" checked> &nbsp;Cash On Delivery
                                    </p>
                                    <!-- <p><input type="radio" checked name="payment_mode" value="2"> &nbsp;Online Payment</p> -->
                                </li>
                            </ul>
                            <div class="checkout-check"><input type="checkbox" id="checkout-check" checked
                                    required><label for="checkout-check">By making this purchase you agree to our <a
                                        href="#">Terms and
                                        Conditions</a>.</label></div>
                            <div class="checkout-proced"><button type="submit" class="btn btn-inline">proceed to
                                    checkout</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
<!-- <script>
     
    function myFunction(wrapper) {
        var copyText = document.getElementById(wrapper);
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(copyText.value);
    }
</script> -->
<script>
    document.getElementById('same_as_billing').addEventListener('change', function () {
        var shippingFields = document.getElementById('shipping_address_fields');
        if (this.checked) {
            shippingFields.classList.add('hidden');
        } else {
            shippingFields.classList.remove('hidden');
        }
    });
</script>
</body>
</html>