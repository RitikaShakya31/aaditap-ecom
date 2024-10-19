<?php $this->load->view('admin/template/header', $title); ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h2 class="mb-sm-0 "><?= $title ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Analytics</button>

                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Engagement</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Affiliate link generated</button>
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <h5> Analytics</h5>
                                        <table class="table table-bordered dt-responsive  w-100">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%">Affiliated Link</th>
                                                    <th style="width: 30%">Total Earning</th>
                                                    <th style="width: 30%">Total Points used</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th style="width: 20%"><?= $affiliateCount ?></th>
                                                    <th style="width: 30%"><?php echo (($total_points[0]['points'])? $total_points[0]['points']:0)  ?></th>
                                                    <th style="width: 30%"><?php echo (($total_debit['points_used'])? $total_debit['points_used']:0) ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <h5>Accounting</h5>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">SL.</th>
                                                    <th scope="col">transaction date</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Market Price</th>
                                                    <th scope="col">Sale Price</th>
                                                    <th scope="col">Recieved amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($affiliates_transaction) {
                                                    $i = 0;
                                                    foreach ($affiliates_transaction as $all) {
                                                ?>
                                                        <tr scope="row">
                                                            <td><?= ++$i; ?></td>
                                                            <td>
                                                                <?= $all['create_date'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $all['product_name'] ?>
                                                            </td>
                                                            <td>

                                                                <?= $all['base_price'] ?>
                                                            </td>
                                                            <td>

                                                                <?= $all['user_price'] ?>
                                                            </td>
                                                            <td>

                                                                <?= $all['affiliate_amt'] ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" style="text-align: center">No affiliate link available</td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <h5>Affiliated link sgenerated</h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table table-bordered dt-responsive  w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 20%">Sr no.</th>
                                                                    <th style="width: 30%">Created date</th>
                                                                    <th style="width: 30%">Product</th>
                                                                    <th style="width: 30%">Sale Price</th>
                                                                    <th style="width: 30%">Link</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                if ($affiliateLinkList) {
                                                                    $i = 0;
                                                                    foreach ($affiliateLinkList as $all) {
                                                                        $product = getSingleRowById('product', ['product_id' => @$all['product']]);

                                                                ?>
                                                                        <tr>
                                                                            <td><?= ++$i; ?></td>
                                                                            <td>
                                                                                <?= $all['create_date'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= @$product['product_name'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= @$product['sale_price'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= base_url() . encryptId($all['aid']); ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="6" style="text-align: center">No Banner Available</td>
                                                                    </tr>
                                                                <?php
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/template/footer'); ?>