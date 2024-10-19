<?php $this->load->view('includes/header'); ?>

<section class="inner-section single-banner">
  <div class="container">
    <br />
    <h2>Return Policy</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Return Policy</li>
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
          <h5>Return Policy</h5>

          <p class="text-justify">Thank you for choosing <?= $setting[9]['content_value'] ?>. We strive to ensure your satisfaction with our products. Please review our return policy outlined below:</p>

          <br />
          <h6>Return Eligibility:</h6>
          <p class="text-justify">
            Products are eligible for return only if a damaged product is received.
            To initiate a return, customers must provide an unboxing video within 2 days of receiving the product. This video serves as evidence of any damages incurred during transit.
          </p>

          <br />
          <h6>Damaged Product Return or Replacement:</h6>
          <p class="text-justify">
            If the product is damaged upon arrival and the unboxing video is provided within the specified timeframe, customers are eligible for either a return or replacement, as per company policy.
          </p>

          <br />
          <h6> Return Process:</h6>
          <p class="text-justify">
            Please contact our customer service team via <a href="mailto:classyathome24@gmail.com">classyathome24@gmail.com</a> to initiate the return process.
            Upon verification of the unboxing video and confirmation of damage, we will provide further instructions on returning the product.
          </p>

          <br />
          <h6>Refund or Replacement:</h6>
          <p class="text-justify">
            Upon receipt and inspection of the damaged product, customers will be offered a refund or a replacement product, based on availability and customer preference.
          </p>
          <br />
          <h6> Exceptions:</h6>
          <p class="text-justify">
            Returns for reasons other than damage, such as change of mind or preference, are not accepted under this policy. Please ensure that you adhere to the specified guidelines for initiating a return, as failure to do so may result in the inability to process your request.
          </p>
          <br />
         
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>

</body>

</html>