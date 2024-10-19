    <?php $this->load->view('admin/template/header', $title); ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <h4>Products</h4>
                            <div class="col-md-4">
                                <a href="<?= base_url('categoryAll') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">Total Category</p>
                                                    <h4 class="mb-0"><?= $product_category ?></h4>
                                                </div>

                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-archive-in font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                          
                            <div class="col-md-4">
                                <a href="<?= base_url('productAll') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">Total Product</p>
                                                    <h4 class="mb-0"><?= $total_product ?></h4>
                                                </div>
                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Orders</h4>
                            <div class="col-md-4">
                                <a href="<?= base_url('recentOrders') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">New Orders</p>
                                                    <h4 class="mb-0"><?= $recent_orders ?></h4>
                                                </div>

                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-archive-in font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?= base_url('acceptedOrders') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">Accepted Orders</p>
                                                    <h4 class="mb-0"><?= $accepted_orders ?></h4>
                                                </div>

                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?= base_url('dispatchOrders') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">Dispatch Orders</p>
                                                    <h4 class="mb-0"><?= $dispatch_orders ?></h4>
                                                </div>
                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= base_url('completedOrders') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">Completed Orders</p>
                                                    <h4 class="mb-0"><?= $completed_orders ?></h4>
                                                </div>
                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?= base_url('cancelOrders') ?>">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted fw-medium">Canceled Orders</p>
                                                    <h4 class="mb-0"><?= $canceled_orders ?></h4>
                                                </div>
                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0,0,0,0.1);">
                                <h4>Recent Orders</h4>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">Sr no.</th>
                                            <th style="width: 10%">Date</th>
                                            <th style="width: 15%">Order ID</th>
                                            <th style="width: 12%">User Name</th>
                                            <th style="width: 12%">Order Details</th>
                                            <th style="width: 12%">Booking Items</th>
                                            <th style="width: 15%">Action</th>
                                            <th style="width: 12%">Transaction Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($recentOrderList) {
                                            $i = 0;
                                            foreach ($recentOrderList as $all) {
                                                $id = encryptId($all['product_book_id']);
                                                $order_id = $all['order_id'];
                                        ?>
                                                <tr>
                                                    <td><?= ++$i; ?></td>
                                                    <td><?= date('d-M-Y h:i A', strtotime($all['create_date'])) ?></td>
                                                    <td><?= $all['order_id'] ?></td>
                                                    <td><?= $all['name'] ?></td>
                                                    <td>
                                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $i ?>">
                                                            <i class="fa fa-eye loader<?= $all['user_id'] ?>"></i>
                                                            View
                                                        </button>

                                                        <div class="modal fade bs-example-modal-lg" id="modal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myLargeModalLabel">Order details</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Name</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['name'] ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Phone</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['contact_no'] ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Address</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= str_replace("/", "'", $all['address']) ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Area</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['area'] ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>Pin Code</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['postal_code'] ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>State</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['state'] ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <h5><strong>City</strong></h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['city'] ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <hr style="border: 1px solid #9c9c9c;">
                                                                                <h4 style="text-align: center">
                                                                                    <b>Transaction Details</b>
                                                                                </h4>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Payment Mode</strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['payment_mode'] == '1' ? 'COD' : 'ONLINE' ?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Promo Code</strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5>
                                                                                            <b><?= $all['promocode_status'] == '0' ? ' ---- ' : $all['promocode'] ?>
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
                                                                                        <div class="col-lg-6">
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
                                                                                        <div class="col-lg-6">
                                                                                            <h5><?= $all['final_amount'] ?>
                                                                                                &#8377;</h5>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                            <h5><strong>Payment ID</strong>
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <h5><?= $all['payment_id'] ?></h5>
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
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['total_item_amount'] ?>
                                                                                            &#8377;</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong>Delivery
                                                                                                Charges</strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h5>
                                                                                            <b>+</b> <?= $all['delivery_charges'] ?>
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
                                                                                        <div class="col-lg-6">
                                                                                            <h5>
                                                                                                <b>-</b> <?= $all['promocode_amount'] ?>
                                                                                                &#8377;
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
                                                                                    <div class="col-lg-6">
                                                                                        <h5><?= $all['final_amount'] ?>
                                                                                            &#8377;</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <hr>
                                                                                    <div class="col-lg-6">
                                                                                        <h5><strong> </strong>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <h6 <?= (($all['booking_status'] == '1' || $all['booking_status'] == '2' || $all['booking_status'] == '3' || $all['booking_status'] == '5' || $all['booking_status'] == '6') ? '' :  'style="display:none"') ?>>
                                                                                            <a href="<?= base_url() ?>order_invoice/<?= $all['product_book_id'] ?>" class="badge btn-info" target="_blank"> View invoice</a>
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#itemDetails<?= $i ?>">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </button>


                                                        <div class="modal fade bs-example-modal-lg" id="itemDetails<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myLargeModalLabel"><?= $all['order_id'] ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                                                                <td><?= ++$j; ?></td>
                                                                                                <td><?= $product ? $product['product_name'] : '-----' ?></td>
                                                                                                <td><?= $item['no_of_items'] ?></td>
                                                                                                <td><?= $item['base_price'] ?></td>
                                                                                                <td><?= $item['user_price'] ?></td>
                                                                                                <td><?= $item['booking_price'] ?>&#8377;</td>
                                                                                            </tr>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td colspan="5"></td>
                                                                                            <td><strong>Total Amount
                                                                                                    : </strong> <?= $final_amount ?>
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
                                                            <span class="badge bg-red">Cancel</span>
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
                                                            echo '<span class="badge badge-pill badge-soft-primary font-size-14 mb-2">ONLINE - </span>';
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

    </div>
    <?php $this->load->view('admin/template/footer'); ?>

    <!-- <span class="badge badge-pill badge-soft-success font-size-11">Paid</span> -->
    <script>
        $('.accept').click(function() {
            let id = $(this).attr('id');
            let order_id = $(this).attr('datafld');
            $('.booking_id').val(id);
            $('.acceptHead').text(order_id);
            $('.acceptModal').modal('show');
        });

        $('.cancel').click(function() {
            let id = $(this).attr('id');
            let order_id = $(this).attr('datafld');
            $('.booking_id').val(id);
            $('.acceptHead').text(order_id);
            $('.cancelModal').modal('show');
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
    </script>