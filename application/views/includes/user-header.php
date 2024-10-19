<section class="inner-section single-banner">
    <div class="container">
        <h2><?= $subtitle ?></h2>
        <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol> -->
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn bg-btn-dark text-white" href="<?= base_url('profile') ?>">Profile</a>
            <a class="btn bg-btn-dark text-white" href="<?= base_url('orders') ?>">My Orders</a>
            <?php
            if ($this->profile[0]['is_affiliate'] != 0) {
            ?>
                <a class="btn bg-btn-dark text-white" href="<?= base_url('affiliates') ?>">Affiliates</a>
            <?php
            }

            ?>

            <a class="btn bg-btn-dark text-white" href="<?= base_url('logout') ?>">Logout</a>
        </div>
    </div>
</section>