<?php $this->load->view('includes/header'); ?>

<section class="inner-section single-banner">
  <div class="container">
    <br />
    <h2>Return / Refund / Cancellation Policy</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Return / Refund / Cancellation Policy</li>
    </ol>
  </div>
</section>


<section class="inner-section privacy-part">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div data-bs-spy="scroll" data-bs-target="#scrollspy" data-bs-offset="0" tabindex="0">

          <?php

          if (!empty($pp)) {
            foreach ($pp as $row) {
              // echo $row['particulars'];  
            }
          }
          ?>
          <h5>Shipping Policy</h5>

          <p class="text-justify">Thank you for shopping at <?= $setting[9]['content_value'] ?>! We are committed to providing you with a delightful online shopping experience for all your home decor, accessories, dining, and kitchen essentials. Please take a moment to review our shipping policy to understand how we handle the delivery of your cherished purchases.</p>

          <br />
          <h6>Processing Time:</h6>
          <p class="text-justify">
            Orders are processed and dispatched within 1-3 business days after payment confirmation.
            During peak seasons or promotions, processing times may be slightly extended.
          </p>

          <br />
          <h6>Shipping Methods:</h6>
          <p class="text-justify">
            We offer standard and expedited shipping options to meet your delivery needs. Shipping costs are calculated based on the weight & dimention of your order and the destination.
          </p>

          <br />
          <h6>Shipping Destinations:</h6>
          <p class="text-justify">
          <?= $setting[9]['content_value'] ?> currently ships to addresses within India. We are continuously working to expand our shipping destinations to serve you better.
          </p>

          <br />
          <h6>Estimated Delivery Times:</h6>
          <p class="text-justify">
            Please note that these are estimated delivery times, and actual delivery may vary depending on the shipping address and other external factors.
          </p>

          <br />
          <h6>Order Tracking:</h6>
          <p class="text-justify">
            Once your order is shipped, you will receive a confirmation email with a tracking number.
            You can track your order in real-time through our website using the provided tracking information.
          </p>

          <br />
          <h6>Shipping Partners:</h6>
          <p class="text-justify">
          <?= $setting[9]['content_value'] ?> partners with reputable shipping carriers to ensure the safe and timely delivery of your orders.
          </p>

          <br />
          <h6>International Shipping:</h6>
          <p class="text-justify">
            For international orders, please be aware that customs duties and taxes may apply. These charges are the responsibility of the customer.
          </p>

          <br />
          <h6>Shipping Delays:</h6>
          <p class="text-justify">
            While we strive to meet the specified delivery times, unforeseen circumstances such as customs delays, extreme weather conditions, or other external factors may cause delays. We appreciate your understanding in such situations.
          </p>

          <br />
          <h6>Multiple Shipments:</h6>
          <p class="text-justify">
            If your order includes multiple items, it may be shipped in separate packages to expedite delivery.
          </p>

          <br />
          <h6>Shipping Notifications:</h6>
          <p class="text-justify">
            We will keep you informed about the status of your order through email notifications. Please ensure your provided email address is accurate.

          </p>

          <br />
          <h6>Address Accuracy:</h6>
          <p class="text-justify">
            It is the responsibility of the customer to provide accurate shipping information. Please double-check your shipping address during checkout to avoid delivery issues.
            If you have any questions or concerns regarding our shipping policy, feel free to contact our customer service team at classyathome24@gmail.com. Thank you for choosing <?= $setting[9]['content_value'] ?> for your home decor and essentials. We appreciate your trust in us. Happy shopping!
          </p>

        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>

</body>

</html>