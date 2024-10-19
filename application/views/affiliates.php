<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/user-header'); ?>


<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="account-card">
                    <h3 class="account-title">My Wallet</h3>
                    <div class="my-wallet">
                        <p>Current balance</p>
                        <h3><?= (($total_points[0]['points'] != '') && ($total_points[0]['points'] != 0)) ? $total_points[0]['points'] : 00 ?> </h3>
                    </div>
                    <div class="wallet-card-group">
                        <div class="wallet-card">
                            <p>total credit</p>
                            <h3><?= ($total_points[0]['points'] - $total_debit['points_used']) ?></h3>
                        </div>
                        <div class="wallet-card">
                            <p>total debit</p>
                            <h3><?= ($total_debit['points_used']) ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <h3 class="account-title">Affiliates Transaction</h3>
                    <div class="table-scroll">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">transaction date</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <h3 class="account-title">Affiliates Links Generated</h3>
                    <div class="table-scroll">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($affiliates) {
                                    $i = 0;
                                    foreach ($affiliates as $all) {
                                        $product = getSingleRowById('product', ['product_id' => @$all['product']]);
                                ?>
                                        <tr scope="row">
                                            <td><?= ++$i; ?></td>
                                            <td>
                                                <?= $all['create_date'] ?>
                                            </td>
                                            <td>
                                                <?= @$product['product_name'] ?>
                                            </td>
                                            <td>

                                                <div class="form-group mb-0 d-none">
                                                    <label>Copy your affiliate link: </label>
                                                    <input type="text" id="affiliateLinkInput<?= $all['aid'] ?>" class="form-control" value="<?= base_url() . encryptId($all['aid']); ?>">
                                                </div>
                                                <button type="button" id="copyTextBtn<?= $all['aid'] ?>" data-id="<?= $all['aid'] ?>" onclick="copy(<?= $all['aid'] ?>)" class="linkCopyBtn badge btn-primary">Copy Link</button>
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
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>


<script>
    function copy(id) {
        var text1 = $("#affiliateLinkInput" + id).val();
        var tempInput = $("<input>");
        $("body").append(tempInput);
        // console.log(text1);
        tempInput.val(text1).select();
        document.execCommand("copy");
        tempInput.remove();
        alert("Link copied successfully!");
    }
</script>
</body>

</html>