<script src="<?= base_url() ?>assets/vendor/bootstrap/jquery-1.12.4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/popper.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/countdown/countdown.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/niceselect/nice-select.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/slickslider/slick.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>assets/js/nice-select.js"></script>
<script src="<?= base_url() ?>assets/js/countdown.js"></script>
<script src="<?= base_url() ?>assets/js/accordion.js"></script>
<script src="<?= base_url() ?>assets/js/venobox.js"></script>
<script src="<?= base_url() ?>assets/js/slick.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Google tag (gtag.js) -->
<div id="snackbar">Item Added Successfully</div>
<!-- === Checkout Screens === -->
<div class="checkout-backdrop">
</div>
<div class="checkout-modal">
  <div class="checkout-left">
    <div class="wizard-head">
      <ul>
        <li class="mobiledetails active">
          <i class="fa fa-check">
          </i>Mobile
        </li>
        <li class="shippingdetails">Shipping Details</li>
        <li class="paymentdetails">Payment</li>
      </ul>
    </div>
    <div class="screen-body">
      <div class="mobile-details">
        <div class="mobile-screen-1 check-login">
          <h6>Enter Email</h6>
          <input class="checkout-input" type="email" id="getEmail" placeholder="Enter Email">
          <h6 class="mt-2"> Enter Password</h6>
          <input class="checkout-input" type="password" id="getPassword" placeholder="Enter Password"><br><br>
          <h6 class="text-center d-block"><a href="<?= base_url() ?>register">New user ? Register Now.</a></h6>
          <a href="<?php echo base_url('google-login'); ?>" class="text-center d-block mt-3 l-border-btn">Continue With
            Google</a>
          <!-- <input class="checkout-input text-center" type="number" id="getMobileNumber" placeholder="Enter Number"> -->
        </div>
        <!-- <div class="mobile-screen-2 text-center" style="display:none;">
          <h6>Verify Email</h6>
          <p class="my-1">99900024343</p>
          <input class="checkout-input text-center my-2" type="tel" id="getOtpInput" placeholder="Enter Code" value="1234">
          <a href="javascript: void(0);" class="d-block text-black text-underline">Resend OTP</a>
        </div> -->
        <div class="mobile-screen-3" style="display: none;">
          <form action="" method="post" id="checkoutFormContact">
            <h5>Contact Details</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">First Name</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="fname" required=""
                      value="<?= @$profile[0]['name'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">Last Name</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="lname" required=""
                      value="<?= @$profile[0]['lname'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">Email</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="email" required=""
                      value="<?= @$profile[0]['email_id'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">Contact Number</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="number" name="contact_no" required=""
                      value="<?= @$profile[0]['contact_no'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <h5>Shipping Details</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">Flat/House</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="area" required=""
                      value="<?= @$profile[0]['area'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">Address</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="address" required=""
                      value="<?= @$profile[0]['address'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">City</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="city" required="">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">State</h1>
                  <div class="form-input-group">
                    <select name="state" class="form-control form-input-othr required" id="">
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">PIN code</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr required" type="text" name="postal_code" required=""
                      value="<?= @$profile[0]['postal_code'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h1 class="contact-hdg-h1">Landmark</h1>
                  <div class="form-input-group">
                    <input class="form-control form-input-othr" type="text" name="landmark">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="mobile-screen-4" style="display: none;">
          <form action="" id="checkoutFormContact2">
            <!-- <h5>Payment Method</h5> -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input class="form-control form-input-othr paymentMethodRadio" type="radio" name="payment_mode"
                    id="cod" value="1" required="" checked>
                  <label class="contact-hdg-h1" for="cod">Cash on delivery
                  </label>
                </div>
              </div>
              <div class="account-content">
                <div class="chekout-coupon m-0">
                  <button type="button" class="coupon-btn">Do you have a coupon code?</button>
                  <div class="coupon-form">
                    <input type="text" id="promocode" name="promocode" placeholder="Enter your coupon code">
                    <input class="form-control form-control-md mr-1 mb-2" type="hidden"
                      placeholder="Enter Your Coupon Code" name="promocode_amt" id="promocode_amt" value="">
                    <input class="form-control" type="hidden" name="total_item_amount" id="totalamount"
                      value="<?php echo $this->cart->total(); ?>">
                    <input class="form-control" type="hidden" name="final_amount" id="grand_total"
                      value="<?php echo $this->cart->total(); ?>">
                    <input class="form-control" type="hidden" name="user_id"
                      value="<?= $this->session->userdata('login_user_id') ?>">
                    <input type="hidden" value="0" id="shipping_charges" name="delivery_charges">
                    <button type="button" id="promo"><span>apply</span></button>
                  </div>
                </div>
                <div class="faq-parent">
                  <div class="faq-child">
                    <div class="faq-que"><button type="button">Check coupon</button></div>
                    <div class="faq-ans">
                      <div class="wallet-card-group">
                        <?php
                        $promocode = $this->CommonModel->getAllRows('promocode');
                        if ($promocode) {
                          foreach ($promocode as $promo) {
                            if ($promo['minimum_order'] < $this->cart->total()) {
                              ?>
                                                                              <div class="wallet-card cborder">
                                                                                <!-- Input field with promo code -->
                                                                                <input class="coupon-code" id="coupon<?= $promo['promocode_id'] ?>"
                                                                                  value="<?= $promo['promocode'] ?>" readonly>
                                                                                <!-- Copy button -->
                                                                                <span class="copy-button" data-id="<?= $promo['promocode_id'] ?>"
                                                                                  onclick="promo('<?= $promo['promocode'] ?>')">Apply</span>
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
                <div id="promomsg"></div>
              </div>
              <div class="col-md-12">
                <div class="form-group mt-4">
                  <h5>Payment Method</h5>
                  <input class="form-control paymentMethodRadio p-0" type="radio" name="payment_mode" id="online"
                    value="2" required="">
                  <label class="contact-hdg-h1" for="online" style="height:40px;">Online Payment
                  </label>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="continue-button">
      <button class="btn text-white" id="continueBtn">Continue</button>
    </div>
  </div>
  <div class="checkout-right">
    <button class="checkoutCloseBtn" onclick="closeCheckoutModal();">
      <i class="icofont-close">
      </i>
    </button>
    <div class="order-summary-wrapper">
      <div>
        <i class="fa fa-shopping-cart"></i>&nbsp;Order Summary&nbsp;<i class="fa fa-angle-down"> </i>
      </div>
      <div class="checkout-cart-item-list" id="checkout_cart">
      </div>
      <div class="total-wrapper">
        <h6>Subtotal <span class="totalamount"></span>
        </h6>
        <h6>Coupon Discount ₹<span class="promocode_amt">0</span>
        </h6>
        <h6>Delivery Charges<span class="shippingamt">Free shipping</span>
        </h6>
        <hr>
        <h6 class="fw-600">To Pay <span class="grandtotal"></span>
        </h6>
      </div>
    </div>
  </div>
</div>
<!-- JavaScript function for copying text -->
<script>
  function myFunction(wrapper) {
    // Get the input field
    var copyText = document.getElementById(wrapper);
    // Check if the input field is correctly retrieved
    if (!copyText) {
      console.error("Input field not found");
      return;
    }
    // Select the text in the input field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    // Copy the selected text to the clipboard
    navigator.clipboard.writeText(copyText.value).then(function () {
      // Check if the promocode_amt element exists
      var promoCodeField = document.getElementById('promocode');
      if (promoCodeField) {
        promoCodeField.value = copyText.value;
        alert("Copied: " + copyText.value); // Optional: Show an alert on success
      } else {
        console.error('Element with id "promocode_amt" not found');
      }
    }).catch(function (err) {
      console.error('Failed to copy: ', err); // Log any errors
    });
  }
</script>
<script>
  const couponBtn = document.querySelector('.coupon-btn');
  const couponInput = document.querySelector('.coupon-form')
  couponBtn.addEventListener('click', () => {
    couponInput.style.display = 'flex';
  })
</script>
<script>
  // document.addEventListener('touchstart', handler, {
  //   passive: true
  // });
  window.addEventListener('scroll', function (event) {
    // Your scroll handling code
  }, {
    passive: true
  });
</script>
<!-- === Checkout Screens Script === -->
<script>
  const openCheckoutModal = () => {
    let checkoutModal = document.querySelector('.checkout-modal');
    let checkoutBackdrop = document.querySelector('.checkout-backdrop');
    if (checkoutModal) {
      checkoutModal.classList.toggle('open');
      checkoutBackdrop.classList.toggle('open');
      get_checkout();
      // alert('Checkout');
      load_product();
    }
  }
  const closeCheckoutModal = () => {
    let checkoutModal = document.querySelector('.checkout-modal');
    let checkoutBackdrop = document.querySelector('.checkout-backdrop');
    checkoutModal.classList.toggle('open');
    checkoutBackdrop.classList.toggle('open');
  }
</script>
<!-- === Checkout Function Script === -->
<script>
  function get_checkout() {
    $.ajax({
      url: '<?= base_url("UserHome/fetchloginuser") ?>',
      method: 'POST',
      success: function (response) {
        if (response == 0) {
          $('.mobile-screen-1').hide();
          $('.mobile-screen-3').show();
          $('.mobiledetails').addClass('fullfill');
          $('.shippingdetails').addClass('active');
          checkoutStep = 3;
        } else { }
      }
    });
  }
  var checkoutStep = 1;
  const continueBtn = document.querySelector('#continueBtn');
  if (continueBtn) {
    continueBtn.addEventListener('click', (e) => {
      // console.log('checkout step', checkoutStep);
      if (checkoutStep == 1) {
        const getNumber = document.querySelector('#getEmail').value;
        const getPassword = document.querySelector('#getPassword').value;
        $.ajax({
          url: '<?= base_url("UserHome/checklogin") ?>',
          data: {
            uname: getNumber,
            password: getPassword,
          },
          method: 'POST',
          success: function (response) {
            if (response == 0) {
              // console.log("number", getNumber);
              // $('.mobile-screen-1').hide();
              // $('.mobile-screen-2').show();
              // checkoutStep = 2;
              $('.mobile-screen-2').hide();
              $('.mobile-screen-3').show();
              $('.mobiledetails').addClass('fullfill');
              $('.shippingdetails').addClass('active');
              checkoutStep = 3;
              window.location.href = '<?= current_url() ?>' + '?tag=checkout';
            } else if (response == 1) {
              alert('login successfull');
              window.location.href = '<?= current_url() ?>' + '?tag=checkout';
            } else if (response == 2) {
              alert('Password doesnt match');
            } else {
              alert('Wrong credentials');
            }
          }
        });
      } else if (checkoutStep == 2) {
        const getOtp = document.querySelector('#getOtpInput').value;
        // console.log("otp", getOtp);
        $('.mobile-screen-2').hide();
        $('.mobile-screen-3').show();
        $('.mobiledetails').addClass('fullfill');
        $('.shippingdetails').addClass('active');
        checkoutStep = 3;
      } else if (checkoutStep == 3) {
        var isValid = true;
        $('#checkoutFormContact input.required').each(function () {
          if ($(this).val().trim() === '') {
            $(this).addClass('empty-field');
            isValid = false;
          } else {
            $(this).removeClass('empty-field');
          }
        });
        if (!isValid) {
          event.preventDefault(); // Prevent form submission if there are empty fields
        } else {
          $.ajax({
            url: '<?= base_url("UserHome/create_checkout_data") ?>',
            data: {
              formdata: $('#checkoutFormContact').serializeArray()
            },
            method: 'POST',
            success: function (response) {
              console.log(response);
              if (response == 0) {
                $('.mobile-screen-3').hide();
                $('.mobile-screen-4').show();
                $('.shippingdetails').addClass('fullfill');
                $('.paymentdetails').addClass('active');
                $('#continueBtn').text('Place order');
                checkoutStep = 4;
              } else { }
            }
          });
        }
      } else {
        var formData = $('#checkoutFormContact').serializeArray();
        var formpData = $('#checkoutFormContact2').serializeArray();
        // Object to store converted data
        var convertedData = {};
        // Iterate through serialized data and convert
        formData.forEach(function (item) {
          convertedData[item.name] = item.value;
        });
        formpData.forEach(function (item) {
          convertedData[item.name] = item.value;
        });
        // console.log('payment init');
        $.ajax({
          url: '<?= base_url("UserHome/create_checkout") ?>',
          data: {
            formdata: convertedData
          },
          method: 'POST',
          dataType: 'json',
          success: function (response) {
            alert(response.message);
            if (response.status == 0) {
              window.location.href = "<?= base_url('booking-status') ?>";
              alert(response.url);
            } else if (response.status == 1 || response.status == '1') {
              window.location.href = "<?= base_url('booking-status') ?>";
              // alert(response.url);
            } else if (response.status == 2 || response.status == '2') {

            } else {

            }
          }
        });
      }
    });
  }
</script>
<script>
  const desktopSearch = document.querySelector('#desktopSearch');
  const searchWRapper = document.querySelector('.header-form.desktop input');
  const desktopSerachBtn = document.querySelector('#desktopSerachBtn');
  desktopSearch.addEventListener('click', function (e) {
    e.preventDefault();
    searchWRapper.classList.toggle('open');
    desktopSerachBtn.classList.toggle('open')
  });
</script>
<script>
  const allStar = document.querySelectorAll('.rating .star')
  const ratingValue = document.querySelector('.rating input')
  allStar.forEach((item, idx) => {
    item.addEventListener('click', function () {
      let click = 0
      ratingValue.value = idx + 1
      allStar.forEach(i => {
        i.classList.replace('bxs-star', 'bx-star')
        i.classList.remove('active')
      })
      for (let i = 0; i < allStar.length; i++) {
        if (i <= idx) {
          allStar[i].classList.replace('bx-star', 'bxs-star')
          allStar[i].classList.add('active')
        } else {
          allStar[i].style.setProperty('--i', click)
          click++
        }
      }
    })
  })
</script>
<script>
  $(window).scroll(function () {
    if ($(this).scrollTop() > 120) {
      $('.navbar-part').addClass('fixed');
    } else {
      $('.navbar-part').removeClass('fixed');
    }
  });
</script>
<script>
  // function fetchaff() {
  //   var amt = $('#grand_total').val();
  //   $.ajax({
  //     url: '<?= base_url("UserHome/fetch_affiliate") ?>',
  //     data: {
  //       amt: amt
  //     },
  //     method: 'POST',
  //     success: function(response) {
  //       console.log(response);
  //       $('#myCheckbox').val(response);
  //       $('.points').text(response);
  //     }
  //   });
  // }
  // fetchaff();
  function fetchdata() {
    $.ajax({
      url: '<?= base_url("Shop/fetch_cart") ?>',
      success: function (response) {
        $('#cartlist').html(response);
        load_product();
        // load_cart_list();
        load_checkout_list();
      }
    });
  }
  fetchdata();
  function load_product() {
    $.ajax({
      url: '<?= base_url("Shop/fetch_data_cart") ?>',
      success: function (response) {
        $('#cart').html(response);
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/fetch_checkout_cart") ?>',
      success: function (response) {
        $('#checkout_cart').html(response);
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/fetch_totalitems") ?>',
      method: 'POST',
      success: function (response) {
        $('.totalitem').text(response);
        if (response == 0) {
          $("#checkoutFormContact :input").prop("disabled", true);
        } else {
          $("#checkoutFormContact :input").prop("disabled", false);
        }
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/fetch_totalamount") ?>',
      method: 'POST',
      success: function (response) {
        $('.totalamount').text(response);
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/fetch_shippingamt") ?>',
      method: 'POST',
      success: function (response) {
        // console.log(response);
        $('.shippingamt').text(response);
        $('#shipping_charges').val(response);
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/fetch_grandtotal") ?>',
      method: 'POST',
      success: function (response) {
        $('.grandtotal').html("₹" + response);
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/product_discount") ?>',
      method: 'POST',
      success: function (response) {
        $('#prodisount').text(response);
      }
    });
    load_checkoutbar();
    promo();
  }
  load_product();
  // load_cart_list();
  function mySanckbar() {
    x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function () {
      x.className = x.className.replace("show", "");
    }, 3000);
  }
  $(document).on('click', '.addCart', function () {
    console.log("click");
    var pid = $(this).data('id');
    console.log(pid);
    if ($('#qtysidecart' + pid)) {
      var qty = $('#qtysidecart' + pid).val();
      console.log(qty);
    } else {
      var qty = '1';
      console.log(qty);
    }

    var sizeElement = $('input[name="size' + pid + '"]:checked');
    // console.log(sizeElement);
    let size = sizeElement.val();
    // console.log(size);    

    $(".addCart").attr('disabled', true);
    if (!qty) {
      alert('Select Quantity');
      $(".addCart").attr('disabled', false);
    }
    else {
      var formData = new FormData($('#productForm')[0]); // Create FormData object using the form
$.ajax({
    url: "<?= base_url('Shop/save_temp_form_data') ?>",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      console.log("Response", response)
        try {
            var tempDate = JSON.parse(response); // Try parsing the JSON response
            if (tempDate.status == 'success') {
              console.log(tempDate.status);
                alert('Success to save form data.');
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Shop/addToCart') ?>",
                    data: {
                        pid: pid,
                        qty: qty,
                        affiliate: <?= (isset($affiliated_by)) ? $affiliated_by : 0 ?>,
                        options: formData
                    },
                    beforeSend: function() {
                        $('.cartbtn' + pid).html('<i class="fa fa-spinner fa-spin"> </i> Loading...');
                    },
                    success: function(response) {
                        console.log("cart data", response);
                        load_product(); // Refresh cart or product list
                        mySanckbar(); // Show a success snackbar/message
                        $(".addCart").attr('disabled', false); // Enable the button again
                        $('#cartbtn' + pid).html('Add'); // Reset button text
                        $(".header-cart").click(); // Update cart icon or view
                    }
                });
            } else {
                alert('Failed to save form data.');
            }
        } catch (error) {
            console.error('Error parsing JSON:', error);
            alert('Error in response format.');
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error:', status, error);
        alert('Error in submitting the form.');
    }
});
    }
  });
  $(document).ready(function () {
    $(document).on('click', '.sizedrop', function () {
      updatePrice($(this).data('id'));
    });
    $('.productid').each(function () {
      var product_id = $(this).data('product-id');
      updatePrice(product_id);
    });
  });
  function updatePrice(product_id) {
    // Check if no radio button is selected, then select the first one
    if (!$('input[name="size' + product_id + '"]:checked').length) {
      $('input[name="size' + product_id + '"]').first().prop('checked', true);
    }
    // Get the selected price
    var selectedPrice = $('input[name="size' + product_id + '"]:checked').data('price');
    // Update the price display
    $('.price_display' + product_id).text(' ' + selectedPrice);
  }
  var pathname = window.location.pathname; // Get the path (e.g., "/path/to/page")
  var search = window.location.search; // Get the query string (e.g., "?param1=value1&param2=value2")
  var hash = window.location.hash; // Get the hash (e.g., "#section")
  var fullUrlWithoutDomain = pathname + search + hash;
  $(document).on('click', '.addtowishlist', function () {
    var pid = $(this).data('id');
    $.ajax({
      method: "POST",
      url: "<?= base_url('Shop/addToWishlist') ?>",
      data: {
        pid: pid,
        base_url: '<?= getfullurl() ?>'
      },
      success: function (response) {
        if (response == 1) {
          // $(this).addClass('active');
          $('.wish' + pid).addClass('active');
          // alert('Added to wishlist');
        } else if (response == 3) {
          // $(this).removeClass('active');
          $('.wish' + pid).removeClass('active');
          fetchWishlistProducts();
          $('.wishlist' + pid).hide();
        } else {
          if (response == 2) {
            window.location.href = '<?= base_url() ?>login';
          } else {
            alert('Error in adding.');
          }
        }
      }
    });
  });
  $(document).on('click', '.buynow', function () {
    var pid = $(this).data('id');
    var qty = $('#qtysidecart' + pid).val();
    $.ajax({
      method: "POST",
      url: "<?= base_url('Shop/addToCart') ?>",
      data: {
        pid: pid,
        qty: qty,
        affiliate: <?= (isset($affiliated_by)) ? $affiliated_by : 0 ?>
      },
      success: function (response) {
        window.location = "<?= base_url('checkout') ?>";
      }
    });
  });
  // $(document).on('click', '.removeCarthm', function() {
  // var pid = $(this).data('id');
  // // console.log(pid);
  // $.ajax({
  // method: "POST",
  // url: "<?= base_url('Shop/delete_item') ?>",
  // data: {
  // pid: pid
  // },
  // success: function(response) {
  // load_product();
  // alert('Item has been removed into your cart')
  // <?php
  //       if (strtolower($title) == 'my cart') {
  //       
  ?>
  // load_cart_list();
  // <?php
  //       } else {
  //       
  ?>
  // // $("#cart").click();
  // <?php
  //       }
  //       
  ?>
  // }
  // });
  // });
  $(document).on('click', '.qty', function () {
    var numberField = jQuery(this).parent().find('[type="number"]');
    var type = $(this).data('type');
    var currentVal = numberField.val();
    var sign = jQuery(this).val();
    if (sign === '-') {
      if (currentVal > 1) {
        numberField.val(parseFloat(currentVal) - 1);
      }
    } else {
      if (type == 'minus') {
        numberField.val(parseFloat(currentVal) - 1);
      } else {
        numberField.val(parseFloat(currentVal) + 1);
      }
    }
    var rowid = jQuery(this).data('rowid');
    var price = jQuery(this).data('price');
    var qty = numberField.val();
    $.ajax({
      method: "POST",
      url: "<?= base_url("Shop/update_qty") ?>",
      data: {
        rowid: rowid,
        qty: qty
      },
      success: function (response) {
        load_product();
        $('#item_total' + rowid).text((qty * price));
      }
    });
  });
  $(document).on('change', '#state', function () {
    var state = $(this).val();
    $.ajax({
      method: "POST",
      url: "<?= base_url('UserHome/getcity') ?>",
      data: {
        state: state
      },
      success: function (response) {
        $('#city').html(response);
      }
    });
  });
  $(document).on('click', '#promo', function () {
    promo();
  });
  function load_checkoutbar() {
    // var referalpoint = $('#referalpointcheck').data('point');
    var shipping = $('#shipping_charges').val();
    var tamt = $('#totalamount').val();
    var promocode_amt = $('#promocode_amt').val();
    // var affiliate = getCheckboxValue('#myCheckbox');
    if (promocode_amt == '') {
      var amt = (parseInt(tamt) + parseInt(shipping));
      $('#cartgrandprice').text('₹ ' + amt);
      $('#grand_total').val(amt);
      $('.grandtotal').html('Rs. ' + amt);
      $('#cartprice').text('₹ ' + (amt) + '/-');
    } else {
      var amt = ((parseInt(tamt) - parseInt(promocode_amt)) + parseInt(shipping));
      $('#cartgrandprice').text('₹ ' + amt);
      $('#grand_total').val(amt);
      $('.grandtotal').html('Rs. ' + amt);
      $('#cartprice').text('₹ ' + (amt) + '/-');
    }
  }
  $('#myCheckbox').change(function () {
    load_checkoutbar();
  });
  function getCheckboxValue(checkboxId) {
    var checkbox = $(checkboxId);
    if (checkbox.is(":checked")) {
      return checkbox.val();
    } else {
      return 0;
    }
  }
  function promo(promo = '') {
    if (promo == '') {
      var promocode = $('#promocode').val();
    } else {
      var promocode = promo;
      $('#promocode').val(promocode);
    }
    $.ajax({
      method: "POST",
      url: "<?= base_url('UserHome/checkPromo') ?>",
      data: {
        promocode: promocode
      },
      success: function (response) {
        if (response == 'false') {
          $('#deducamt').text('');
          $('#promomsg').text('');
          $('#promocode_amt').val('0');
          $('.promocode_amt').html('0');
          var tamt = $('#totalamount').val();
          var referalpoint = $('#referalpoint').val();
          $('#cartprice').text('₹ ' + parseInt(tamt) + '/-');
          var sc = $('#shipping_charges').val();
          var ta = (((parseInt(tamt)) + parseFloat(sc))).toFixed(2);
          // console.log('shipping_charges ' + sc);
          $('#cartgrandprice').text('₹ ' + ta);
          $('#grand_total').val(ta);
          $('.grandtotal').html('Rs. ' + ta);
        } else {
          var obj = JSON.parse(response);
          // console.log("amount" + obj[0]['amount']);
          $('#promocode_amt').val(obj[0]['amount']);
          $('.promocode_amt').html('Rs. ' + obj[0]['amount']);
          var tamt = $('#totalamount').val();
          var lastamt = $('#grand_total').val();
          if (parseInt(lastamt) >= parseInt(obj[0]['minimum_order'])) {
            $('#promomsg').html('<span style="color:#28a745 "> <b> Applied!Promo code Offer amount - ₹' + obj[0]['amount'] + ' </b> </span> ');
            $('#cartprice').text('₹ ' + (tamt - obj[0]['amount']) + '/-');
            $('#deducamt').html('<h6>Coupon Discount</h6> <p for="free-shipping" class="color-dark free" > -₹' + obj[0]['amount'] + ' </p>');
            var sc = $('#shipping_charges').val();
            var ta = (((parseInt(tamt) - parseInt(obj[0]['amount']) + parseFloat(sc))).toFixed(2));
            // console.log('ta else ' + parseInt(tamt) + ' ' + parseInt(obj[0]['amount']) + ' ' + parseFloat(sc) + ' ' + parseInt(affiliate));
            $('#cartgrandprice').text('₹ ' + ta);
            $('#grand_total').val(ta);
            $('.grandtotal').html('Rs. ' + ta);
          } else {
            alert('This Promocode is applied for your order');
            // location.reload();
          }
        }
      }
    });
  }
  function load_cart_list() {
    $.ajax({
      url: '<?= base_url("Shop/fetch_data_cart") ?>',
      method: 'POST',
      success: function (response) {
        $('#cart_items_preview').html(response);
      }
    });
  }
  function load_checkout_list() {
    $.ajax({
      url: '<?= base_url("Shop/fetch_checkout_cart") ?>',
      method: 'POST',
      success: function (response) {
        $('#checkout_items_preview').html(response);
      }
    });
    $.ajax({
      url: '<?= base_url("Shop/fetch_totalamount") ?>',
      method: 'POST',
      success: function (response) {
        $('#totalamount').val(response);
        $('.totalamount').text("Rs. " + response);
        promo();
      }
    });
  }
  $(document).on('click', '.removeCarthm', function () {
    var pid = $(this).data('id');
    $.ajax({
      method: "POST",
      url: "<?= base_url('Shop/delete_item') ?>",
      data: {
        pid: pid
      },
      success: function (response) {
        load_product();
        // load_cart_list();
        fetchdata();
        load_checkout_list();
      }
    });
  });
  function load_cart_list() {
    $.ajax({
      url: '<?= base_url("Shop/cart") ?>',
      method: 'POST',
      success: function (response) {
        $('#cart_items_preview').html(response);
      }
    });
  }
  load_checkoutbar();
  $(document).ready(function () {
    setTimeout(function () {
      $('.alert').fadeTo(200, 0).slideUp(200, function () {
        $(this).remove();
      });
    }, 4000);
  });
</script>
<script>
  function toggleMobileFilter() {
    let filterWrapper = document.querySelector('.mobile_floating');
    if (filterWrapper) {
      filterWrapper.classList.toggle('open');
      // console.log("click");
    }
  }
  $(document).ready(function () {
    filter_data();
    function filter_data() {
      $('#filter_data').html('<div id="loading" style="" ></div>');
      var action = 'fetch_data';
      var price = $('#ec-price_hm').val();
      // console.log('price');
      var gender = $('#ec-gender').val();
      var search = $('#search').val();
      var category = $('#category').val();
      // var category = get_filter('category');
      // var subcategory = get_filter('subcategory');
      $.ajax({
        url: "<?= base_url('UserHome/filterData') ?>",
        method: "POST",
        data: {
          category: category,
          gender: gender,
          search: search,
          price: price
        },
        success: function (data) {
          // console.log(data);
          $('#filter_data').html(data);
          $('.productid').each(function () {
            var product_id = $(this).data('product-id');
            // console.log('--' + product_id);
            updatePrice(product_id);
          });
        }
      });
    }
    function get_filter(class_name) {
      var filter = [];
      $('.' + class_name + ':checked').each(function () {
        filter.push($(this).val());
      });
      return filter;
    }
    $('.common_selector').change(function () {
      filter_data();
    });
    $('#search').keyup(function () {
      filter_data();
    });
    $('#ec-price_hm').change(function () {
      var price = $('#ec-price_hm').val();
      filter_data();
    });
    $('#ec-gender').change(function () {
      var price = $('#ec-gender').val();
      filter_data();
    });
  });
  const shopFilterButton = document.querySelectorAll('.shop-filter-button');
  if (shopFilterButton) {
    shopFilterButton.forEach(element => {
      element.addEventListener('click', (e) => {
        e.preventDefault();
        const filterWrapper = element.nextElementSibling;
        filterWrapper?.classList.toggle('open');
      });
    });
  }
  <?php
  if (isset($_GET['tag'])) {
    if ($_GET['tag'] == 'checkout') {
      ?>
                                      openCheckoutModal();
                                      // load_product();
                                      <?php
    }
  }
  ?>
</script>
<script>
  <?php
  if (sessionId('msg_status') == 'success') {
    ?>
                    Swal.fire({
                      icon: "success",
                      title: "Thanks",
                      text: "<?php echo sessionId('msg') ?>"
                    });
                    <?php
                    unsetsessionData(['msg_status', 'msg']);
  } elseif (sessionId('msg_status') == 'error') {
    ?>
                    Swal.fire({
                      icon: "error",
                      title: "Thanks",
                      text: "<?php echo sessionId('msg') ?>"
                    });
                    <?php
                    unsetsessionData(['msg_status', 'msg']);
  } else {
  }
  ?>


  // $(document).ready(function () {
  //   $('#productForm').on('submit', function (e) {
  //     e.preventDefault(); // Prevent default form submission
     
  //   });
  // });

</script>
<!-- Right click block -->