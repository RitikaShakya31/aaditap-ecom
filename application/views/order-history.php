<?php $this->load->view('includes/header'); ?>
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }
    .reviewsave{
    color: #fff;
    background-color: #212529;
    border-color: #212529;
    }

    .rate:not(:checked)>label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 25px;
    color: #ccc;
    margin-top: 11px;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>
<?php $this->load->view('includes/user-header'); ?>

<section class="inner-section orderlist-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"></div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    echo "<h4 class='heading text-dark'>My Orders</h4>";
                    $i = 0;
                    if (!empty($orderDetails)) {
                        foreach ($orderDetails as $row) {
                            if ($row['booking_status'] != 2) {
                                $i = $i + 1;
                                $getnum = getNumRows('tbl_book_item', array('order_id' => $row['order_id']));
                    ?>
                                <div class="orderlist">
                                    <div class="orderlist-head">
                                        <h5>order#<?= $i ?></h5>
                                        <h5>order
                                            <?= ($row['booking_status'] == '0' ? 'Placed' : ($row['booking_status'] == '1' ? 'Accepted' : ($row['booking_status'] == '3' ? 'Dispatch' : ($row['booking_status'] == '4' ? 'Complete' : '<span class="text-danger">Cancel</span>')))) ?>
                                        </h5>

                                    </div>
                                    <div class="orderlist-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="order-track">
                                                    <ul class="order-track-list">
                                                        <li class="order-track-item placed active"><i class="icofont-check"></i><span>order
                                                                Placed</span></li>
                                                        <li class="order-track-item accept  <?php if (($row['booking_status'] == '1') ||  ($row['booking_status'] == '3') || ($row['booking_status'] == '4')) {
                                                                                                echo 'active';
                                                                                            } else {
                                                                                            } ?>">
                                                            <?php if (($row['booking_status'] == '1') ||  ($row['booking_status'] == '3') || ($row['booking_status'] == '4')) {
                                                                echo '<i class="icofont-check"></i>';
                                                            } else {
                                                                echo '<i class="icofont-close"></i>';
                                                            } ?>
                                                            <span>order
                                                                Accepted</span>
                                                        </li>

                                                        <li class="order-track-item dispatch  <?php if (($row['booking_status'] == '4') ||  ($row['booking_status'] == '3')) {
                                                                                                    echo 'active';
                                                                                                } else {
                                                                                                } ?>">
                                                            <?php if (($row['booking_status'] == '4') ||  ($row['booking_status'] == '3')) {
                                                                echo '<i class="icofont-check"></i>';
                                                            } else {
                                                                echo '<i class="icofont-close"></i>';
                                                            } ?> <span>order Dispatch</span></li>



                                                        <li class="order-track-item   <?= ($row['booking_status'] == '4' ? 'active' :  '') ?>"> <?= ($row['booking_status'] == '4' ? '<i class="icofont-check"></i>' :  '<i class="icofont-close"></i>') ?><span>order
                                                                delivered</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <ul class="orderlist-details">
                                                    <li>
                                                        <h6>order id</h6>
                                                        <p><?= $row['order_id'] ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Total Item</h6>
                                                        <p><?= $getnum ?> Items</p>
                                                    </li>
                                                    <li>
                                                        <h6>Order Time</h6>
                                                        <p><?= $row['booking_date'] ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Delivery Time</h6>
                                                        <p><?= ($row['estimated_time'] != '' ? $row['estimated_time'] : 'Updated Soon...') ?></p>
                                                    </li>
                                                    <li <?= (($row['booking_status'] == '1' || $row['booking_status'] == '2' || $row['booking_status'] == '3' || $row['booking_status'] == '5' || $row['booking_status'] == '6') ? '' :  'style="display:none"') ?>>
                                                        <a href="<?= base_url() ?>order_invoice/<?= $row['order_id'] ?>" class="badge btn-info" target="_blank"> View invoice</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="orderlist-details">
                                                    <li>
                                                        <h6>Sub Total</h6>
                                                        <p>₹ <?= $row['total_item_amount'] ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Coupon discount</h6>
                                                        <p><?= ($row['promocode_amount'] > '0' ? '₹     ' . $row['promocode_amount'] : '...') ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>delivery fee</h6>
                                                        <p><?= ($row['delivery_charges'] > '0' ? '₹' . $row['delivery_charges'] : 'Free') ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Total</h6>
                                                        <p>₹ <?= $row['final_amount'] ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Payment Mode</h6>
                                                        <p><?= ($row['payment_mode'] == '1' ? 'COD' : 'Online Payment') ?></p>
                                                    </li>
                                                    <?php
                                                    if ($row['payment_mode'] == '2') {
                                                    ?>
                                                        <li>
                                                            <h6>Payment Status</h6>
                                                            <p><?= ($row['transaction_status'] == '1' ? 'Payment Successfull' : 'Payment Failed') ?></p>
                                                        </li>
                                                        <li>
                                                            <h6>Transaction ID</h6>
                                                            <p><?= ($row['transaction_status'] == '1' ? $row['order_id'] : 'NA') ?></p>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="orderlist-deliver">
                                                    <h6>Delivery location</h6>
                                                    <p><?= $row['address'] ?></p>
                                                    <hr>
                                                    <h6>Pin Code
                                                        : <?= $row['postal_code'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="table-scroll">
                                                    <table class="table-list">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Product</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $j = 0;
                                                            $checkoutProduct = getRowById('tbl_book_item', 'order_id', $row['order_id']);
                                                            if (!empty($checkoutProduct)) {
                                                                foreach ($checkoutProduct as $productRow) {
                                                                    // $products = getRowById('product', 'product_id', $productRow['product_id'])[0];
                                                                    $products = getSingleRowById('product', ['product_id' => $productRow['product_id']]);
                                                                    $data = getSingleRowById('product_image', array('product_id' => $products['product_id']));
                                                                    $j = $j + 1;
                                                            ?>
                                                                    <tr>
                                                                        <td class="table-serial">
                                                                            <h6><?= $j ?></h6>
                                                                        </td>
                                                                        <td class="table-image"><img src="<?= setImage($data['image_path'], 'upload/product/') ?>" alt="<?= $products['product_name'] ?>"></td>
                                                                        <td class="table-name">
                                                                            <h6 style="text-wrap:balance"><?= $products['product_name'] ?></h6>
                                                                            <?php

                                                                            if ($row['booking_status'] >= 3) {
                                                                            ?>

                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="badge btn-info" data-toggle="modal" data-target="#exampleModalCenter<?= $row['product_book_id'] ?><?= $productRow['book_item_id'] ?>">
                                                                                    Share any rating
                                                                                </button>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="exampleModalCenter<?= $row['product_book_id'] ?><?= $productRow['book_item_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index:9999">
                                                                                    <div class="modal-dialog modal-dialog-centered  bg-white" role="document" style="min-height: 60%;">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Rate here</h5>
                                                                                                <button type="button" class="close<?= $row['product_book_id'] ?><?= $productRow['book_item_id'] ?>" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <form action="<?= base_url('save_review') ?>" method="post" id="myForm<?= $row['product_book_id'] ?><?= $productRow['book_item_id'] ?>">
                                                                                                <div class="modal-body" style="text-align:left">
                                                                                                    <div class="form-group">
                                                                                                        <!-- <label for="exampleFormControlInput1">Enter name</label> -->
                                                                                                        <input type="text" class="form-control" name="name" placeholder=" Enter name">
                                                                                                    </div>
                                                                                                    <div class="form-group mt-3">
                                                                                                        <!-- <label for="exampleFormControlInput1">Email -->
                                                                                                            <!-- address</label> -->
                                                                                                        <input type="email" class="form-control" name="email_id" placeholder=" Enter Email">
                                                                                                    </div>

                                                                                                    <div class="form-group mt-3">
                                                                                                        <!-- <label for="exampleFormControlTextarea1">Review</label> -->
                                                                                                        <textarea class="form-control" name="review_text" rows="3" placeholder="Enter your Review"></textarea>
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleFormControlInput1"> Star Rating</label>

                                                                                                        <div class="rate">
                                                                                                            <input type="radio" id="star5" name="rate" value="5" />
                                                                                                            <label for="star5" title="text"> </label>
                                                                                                            <input type="radio" id="star4" name="rate" value="4" />
                                                                                                            <label for="star4" title="text"></label>
                                                                                                            <input type="radio" id="star3" name="rate" value="3" />
                                                                                                            <label for="star3" title="text"></label>
                                                                                                            <input type="radio" id="star2" name="rate" value="2" />
                                                                                                            <label for="star2" title="text"></label>
                                                                                                            <input type="radio" id="star1" name="rate" value="1" />
                                                                                                            <label for="star1" title="text"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="product_id" value="<?= $productRow['product_id'] ?>" />
                                                                                                    <div class="d-flex justify-content-center"><button type="button" class="btn btn-primary reviewsave" data-order="<?= $row['product_book_id'] ?>" data-product="<?= $productRow['book_item_id'] ?>">Save changes</button></div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="table-price">
                                                                            <h6>₹ <?= $products['sale_price'] ?></h6>
                                                                        </td>
                                                                        <td class="table-quantity">
                                                                            <h6><?= $productRow['no_of_items'] ?></h6>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php }
                            unset($row);
                        }
                    } else {
                        echo '<h3 class="text-center">No Order History Found</h3>';
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $i = 0;
                    if (!empty($cancelOrderDetails)) {

                        echo "<h4 class='heading'>Cancelled orders</h4>";
                        foreach ($cancelOrderDetails as $row) {
                            $i = $i + 1;
                            $getnum = getNumRows('tbl_book_item', array('order_id' => $row['order_id']));
                    ?>
                            <div class="orderlist">
                                <div class="orderlist-head">
                                    <h5>order#<?= $i ?></h5>
                                    <?php
                                    if ($row['cancel_date']) {
                                    ?>
                                        <h5 class="text-secondary">Cancelled on: <?= $row['cancel_date'] ?></h5>
                                    <?php }
                                    ?>
                                    <h5>
                                        <span class="text-danger"> Order Cancel</span>
                                    </h5>
                                </div>
                                <div class="orderlist-body">
                                    <p class="my-2"><span class="text-danger"><strong>Cancellation Reason:</strong></span> <?= $row['cancel_message'] ?></p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="order-track">
                                                <ul class="order-track-list">
                                                    <li class="order-track-item placed active"><i class="icofont-check"></i><span>order
                                                            Placed</span></li>


                                                    <li class="order-track-item cancelled  <?= ($row['booking_status'] == '2' ? 'active' :  '') ?>"> <?= ($row['booking_status'] == '4' ? '<i class="icofont-check"></i>' :  '<i class="icofont-close"></i>') ?><span>order
                                                            Cancelled</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <ul class="orderlist-details">
                                                <li>
                                                    <h6>order id</h6>
                                                    <p><?= $row['order_id'] ?></p>
                                                </li>
                                                <li>
                                                    <h6>Total Item</h6>
                                                    <p><?= $getnum ?> Items</p>
                                                </li>
                                                <li>
                                                    <h6>Order Time</h6>
                                                    <p><?= $row['booking_date'] ?></p>
                                                </li>
                                                <li>
                                                    <h6>Delivery Time</h6>
                                                    <p><?= ($row['estimated_time'] != '' ? $row['estimated_time'] : 'Updated Soon...') ?></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="orderlist-details">
                                                <li>
                                                    <h6>Sub Total</h6>
                                                    <p>₹ <?= $row['total_item_amount'] ?></p>
                                                </li>
                                                <li>
                                                    <h6>discount</h6>
                                                    <p><?= ($row['promocode_amount'] > '0' ? '₹     ' . $row['promocode_amount'] : '...') ?></p>
                                                </li>
                                                <li>
                                                    <h6>delivery fee</h6>
                                                    <p><?= ($row['delivery_charges'] > '0' ? '₹' . $row['delivery_charges'] : 'Free') ?></p>
                                                </li>
                                                <li>
                                                    <h6>Total</h6>
                                                    <p>₹ <?= $row['final_amount'] ?></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="orderlist-deliver">
                                                <h6>Delivery location</h6>
                                                <p><?= $row['address'] ?></p>
                                                <hr>
                                                <h6>Pin Code
                                                    : <?= $row['postal_code'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="table-scroll">
                                                <table class="table-list">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Serial</th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $j = 0;
                                                        $checkoutProduct = getRowById('tbl_book_item', 'order_id', $row['order_id']);
                                                        if (!empty($checkoutProduct)) {
                                                            foreach ($checkoutProduct as $productRow) {
                                                                $products = getRowById('product', 'product_id', $productRow['product_id'])[0];
                                                                $data = getSingleRowById('product_image', array('product_id' => $products['product_id']));
                                                                $j = $j + 1;
                                                        ?>
                                                                <tr>
                                                                    <td class="table-serial">
                                                                        <h6><?= $j ?></h6>
                                                                    </td>
                                                                    <td class="table-image"><img src="<?= setImage($data['image_path'], 'upload/product/') ?>" alt="<?= $products['product_name'] ?>"></td>
                                                                    <td class="table-name">
                                                                        <h6><?= $products['product_name'] ?></h6>

                                                                    </td>
                                                                    <td class="table-price">
                                                                        <h6>₹ <?= $products['sale_price'] ?><small>/<?= $products['quantity'] ?><?= $products['quantity_type'] ?></small></h6>
                                                                    </td>
                                                                    <td class="table-quantity">
                                                                        <h6><?= $productRow['no_of_items'] ?></h6>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.reviewsave').click(function(e) {
            e.preventDefault();
            var order = $(this).data('order');
            var product = $(this).data('product');
            $.ajax({
                url: $('#myForm' + order + product).attr('action'),
                type: 'post',
                data: $('#myForm' + order + product).serialize(),
                success: function(response) {
                    // Handle success response
                    // console.log(response);
                    if (response == 1) {
                        alert('Your review is added successfully');
                        $('.close' + order + product).click();
                    } else {
                        alert('We are facing server issue.Please try again later');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>

</html>