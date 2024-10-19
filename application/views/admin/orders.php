<?php $this->load->view('admin/template/header', $title); ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h2 class="mb-sm-0 ">
                            <?= $title ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 8%">S.n.</th>
                                        <th style="width: 10%">Date</th>
                                        <th style="width: 15%">Order ID</th>
                                        <th style="width: 12%">User Name</th>
                                        <th style="width: 12%">Order Details</th>

                                        <th style="width: 15%">Action</th>
                                        <th style="width: 12%">Transaction Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($allOrders) {
                                        $i = 0;
                                        foreach ($allOrders as $all) {
                                            $id = encryptId($all['product_book_id']);
                                            $order_id = $all['order_id'];
                                    ?>
                                            <tr>
                                                <td>
                                                    <?= ++$i; ?>
                                                </td>
                                                <td>
                                                    <?= wordwrap(date('d-M-Y h:i A', strtotime($all['create_date'])), 10, "<br />\n"); ?>
                                                </td>
                                                <td>
                                                    <?= $all['order_id'] ?><br>
                                                    <?php 
                                                    if ($setting[32]['content_value'] == '1') {
                                                        if ($all['booking_status'] == '1') {
                                                    ?>
                                                        <?= ($all['shipment_id'] == '0') ? '<a href="' . base_url('shiprocket/' . $all['product_book_id']) . '"><span class="badge badge-pill badge-soft-primary font-size-14">Initiate Shiprocket</span></a>' : '<a href="#" class="badge badge-pill badge-soft-primary font-size-14">Shipment ID: ' . $all['shipment_id'] . '</a>' ?>
                                                    <?php }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?= $all['name'] ?>
                                                </td>

                                                <td>
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#itemDetails<?= $i ?>">
                                                        <i class="fa fa-eye"></i>
                                                        View
                                                    </button>


                                                    <div class="modal fade bs-example-modal-lg" id="itemDetails<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background: #eff2f7;">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        <?= $all['order_id'] ?>
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h4><strong>Basic details</strong></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>Name</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['name'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>Phone</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['contact_no'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>Email</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['email'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h4><strong>Billing Address</strong></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>Address</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= str_replace("/", "'", $all['address']) ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row  d-none">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>Area</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['area'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>City</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['city'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>State</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['state'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <h5><strong>Pin Code</strong></h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['postal_code'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        if ($all['same_as_billing'] == '0') {
                                                                        ?>

                                                                            <div class="col-lg-4">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h4><strong>Shipping Address</strong></h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Address</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <?= str_replace("/", "'", $all['shipping_address']) ?>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>City</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <?= $all['shipping_city'] ?>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>State</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <?= $all['shipping_state'] ?>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Pin Code</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <?= $all['shipping_zip'] ?>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <div class="col-lg-4">
                                                                                <div class="row">

                                                                                    <div class="col-lg-4">
                                                                                        <h4><strong>Shipping Address</strong></h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <h5><strong>Address</strong></h5>
                                                                                        </div>
                                                                                        <div class="col-lg-6" style="text-wrap: balance;">
                                                                                            <h5>
                                                                                                <?= str_replace("/", "'", $all['address']) ?>
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row  d-none">
                                                                                        <div class="col-lg-4">
                                                                                            <h5><strong>Area</strong></h5>
                                                                                        </div>
                                                                                        <div class="col-lg-6" style="text-wrap: balance;">
                                                                                            <h5>
                                                                                                <?= $all['area'] ?>
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <h5><strong>City</strong></h5>
                                                                                        </div>
                                                                                        <div class="col-lg-6" style="text-wrap: balance;">
                                                                                            <h5>
                                                                                                <?= $all['city'] ?>
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <h5><strong>State</strong></h5>
                                                                                        </div>
                                                                                        <div class="col-lg-6" style="text-wrap: balance;">
                                                                                            <h5>
                                                                                                <?= $all['state'] ?>
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <h5><strong>Pin Code</strong></h5>
                                                                                        </div>
                                                                                        <div class="col-lg-6" style="text-wrap: balance;">
                                                                                            <h5>
                                                                                                <?= $all['postal_code'] ?>
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-header" style="background: #eff2f7;border-top: 1px solid #eff2f7;">
                                                                    <h5 class="modal-title">
                                                                        Transaction Details
                                                                    </h5>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <h5><strong>Payment Mode</strong>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['payment_mode'] == '1' ? 'COD' : 'ONLINE' ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <h5><strong>Promo Code</strong>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <b>
                                                                                            <?= $all['promocode_status'] == '0' ? ' ---- ' : $all['promocode'] ?>
                                                                                        </b>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            if ($all['payment_mode'] == '2') {
                                                                            ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Transaction status</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <?php
                                                                                        if ($all['transaction_status'] == '0') {
                                                                                            echo '<h5><span class="badge badge-pill badge-soft-warning font-size-14">Pending</span></h5>';
                                                                                        } else if ($all['transaction_status'] == '1') {
                                                                                            echo '<h5><span class="badge badge-pill badge-soft-success font-size-14">Success</span></h5>';
                                                                                        } else {
                                                                                            echo '<h5><span class="badge badge-pill badge-soft-danger font-size-14">Cancel</span></h5>';
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Transaction
                                                                                                amount</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <?= $all['final_amount'] ?>
                                                                                            &#8377;
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Payment ID</strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <?= $all['payment_id'] ?>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <h5><strong>Total Amount</strong>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['total_item_amount'] ?>
                                                                                        &#8377;
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <h5><strong>Delivery
                                                                                            Charges</strong>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <b>+</b>
                                                                                        <?= $all['delivery_charges'] ?>
                                                                                        &#8377;
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            if ($all['promocode_status'] == '1') { ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Promo Code
                                                                                                Amount</strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <b>-</b>
                                                                                            <?= $all['promocode_amount'] ?>
                                                                                            &#8377;
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php
                                                                            if ($all['points_used'] != 0) { ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Aff. Points</strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6" style="text-wrap: balance;">
                                                                                        <h5>
                                                                                            <b>-</b>
                                                                                            <?= $all['points_used'] ?>

                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <div class="row">
                                                                                <hr>
                                                                                <div class="col-lg-6">
                                                                                    <h5><strong>Final Amount</strong>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-lg-6" style="text-wrap: balance;">
                                                                                    <h5>
                                                                                        <?= $all['final_amount'] ?>
                                                                                        &#8377;
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-header" style="background: #eff2f7;border-top: 1px solid #eff2f7;">
                                                                    <h5 class="modal-title">
                                                                        Order Details
                                                                    </h5>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <table class="table table-bordered">
                                                                                <tr>
                                                                                    <th>Sr. no.</th>
                                                                                    <th>Product Name</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Base Price</th>
                                                                                    <th>User Price</th>
                                                                                    <th>Price</th>
                                                                                </tr>
                                                                                <?php
                                                                                $final_amount = 0;
                                                                                $itemDetails = getRowById('book_item', 'order_id', $all['order_id']);
                                                                                if ($itemDetails) {
                                                                                    $j = 0;
                                                                                    foreach ($itemDetails as $item) {
                                                                                        $final_amount += $item['booking_price'];
                                                                                        $product = getSingleRowById('product', "product_id = '{$item['product_id']}'");
                                                                                ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <?= ++$j; ?>
                                                                                            </td>
                                                                                            <td style="text-wrap: balance;">
                                                                                                <?= $product ? $product['product_name'] : '-----' ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?= $item['no_of_items'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?= $item['base_price'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?= $item['user_price'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?= $item['booking_price'] ?>&#8377;
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td colspan="5"></td>
                                                                                        <td><strong>Total Amount
                                                                                                : </strong>
                                                                                            <?= $final_amount ?>
                                                                                            &#8377;
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if ($all['booking_status'] == '0') {
                                                    ?>
                                                        <button type="button" id="<?= $id ?>" datafld="<?= $order_id ?>" class="btn btn-success accept">
                                                            Accept
                                                        </button>
                                                        <button class="btn btn-danger cancel" onclick="checkCancel(this);" id="<?= $id ?>" datafld="<?= $order_id ?>">
                                                            Cancel
                                                        </button>
                                                    <?php
                                                    } else if ($all['booking_status'] == '1') {
                                                    ?>
                                                        <a class="btn btn-success" href="<?= base_url("dispatchOrder/$id/3") ?>">
                                                            Dispatch
                                                        </a>
                                                    <?php
                                                    } else if ($all['booking_status'] == '2') {
                                                    ?>
                                                        <span class="badge badge-pill badge-soft-danger font-size-14">Cancel by
                                                            <?= $all['cancel_by'] ?>
                                                        </span> <br />
                                                        <a href="javascript: void(0);" class="text-warning mt-2" type="button" data-bs-toggle="modal" data-bs-target="#cancelDetails<?= $i ?>">
                                                            <i class="fa fa-eye"></i>
                                                            Cancel Message
                                                        </a>
                                                        <div class="modal fade" id="cancelDetails<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myLargeModalLabel">
                                                                            <?= $all['order_id'] ?>
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <?php if ($all['cancel_by'] == '1') { ?>
                                                                                <div class="col-md-6">
                                                                                    Canceled by: Pratibimb
                                                                                </div>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="col-md-6">
                                                                                    Cancel By: <?= $all['cancel_by'] ?> <br />
                                                                                    Cancel date: <?= $all['cancel_date'] ?> <br />
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <h5 class="mt-2">Cancel Reason:</h2>
                                                                            <p><?= $all['cancel_message'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($all['booking_status'] == '3') {
                                                    ?>
                                                        <a class="btn btn-success" href="<?= base_url("dispatchOrder/$id/4") ?>">
                                                            Complete
                                                        </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge badge-pill badge-soft-success font-size-14">Complete</span>
                                                    <?php
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($all['payment_mode'] == '1') {
                                                        echo '<span class="badge badge-pill badge-soft-primary font-size-14">COD</span>';
                                                    } else {
                                                        echo '<span class="badge badge-pill badge-soft-primary font-size-14 mb-2">ONLINE</span><br>';
                                                        if ($all['transaction_status'] == '0') {
                                                            echo '<span class="badge badge-pill badge-soft-warning font-size-14">Pending</span>';
                                                        } else if ($all['transaction_status'] == '1') {
                                                            echo '<span class="badge badge-pill badge-soft-success font-size-14">Success</span>';
                                                        } else {
                                                            echo '<span class="badge badge-pill badge-soft-danger font-size-14">Cancel</span>';
                                                        }
                                                    }

                                                    ?>
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
    </div>
</div>


<div class="modal fade acceptModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" onclick="hideAccpecModal();" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title acceptHead"></h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url("acceptOrder") ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Estimated Time</label>
                                    <div class="col-sm-12">
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" class="form-control" data-date-format="dd-mm-yyyy" readonly data-date-container='#datepicker1' data-provide="datepicker" name="estimated_date" value="<?= date('d-m-Y') ?>">
                                            <input type="time" class="form-control" name="estimated_time" required>
                                            <input name="id" type="hidden" class="booking_id">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center; margin-top: 30px">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade cancelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" onclick="hideCancelModal();" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title acceptHead"></h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url("cancelOrder") ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Cancel
                                        Message</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="cancel_msg" rows="5" required></textarea>
                                        <input name="id" type="hidden" class="booking_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center; margin-top: 30px">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/template/footer'); ?>
<script>
    $('.accept').click(function() {
        let id = $(this).attr('id');
        let order_id = $(this).attr('datafld');
        $('.booking_id').val(id);
        $('.acceptHead').text(order_id);
        $('.acceptModal').modal('show');
    });

    function checkCancel(button) {
        // console.log('click', button);
        let cancelBtn = button;
        let id = cancelBtn.getAttribute('id');
        let order_id = cancelBtn.getAttribute('datafld');
        $('.booking_id').val(id);
        $('.acceptHead').text(order_id);
        $('.cancelModal').modal('show');
    }

    function hideCancelModal() {
        $('.cancelModal').modal('hide');
    }
    function hideAccpecModal() {
        $('.acceptModal').modal('hide');
    }

    // $('.cancel').click(function () {
    //     let id = $(this).attr('id');
    //     let order_id = $(this).attr('datafld');

    // });
</script>