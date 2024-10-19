<?php
if (count($this->cart->contents()) > 0) {
    foreach ($this->cart->contents() as $items):
        ?>
        <li class="cart-item">
            <div class="cart-media">
                <a href="<?= base_url($items['slug_title']) ?>">
                    <img src="<?= setImage($items['image'], 'upload/product/') ?>" alt="<?php echo $items['name']; ?>">
                </a>
            </div>
            <div class="cart-info-group">
                <div class="cart-info">
                    <h6>
                        <a href="<?= base_url($items['slug_title']) ?>">
                            <?php echo $items['name']; ?>
                        </a>
                    </h6>
                    <p>Price: Rs. <?php echo $this->cart->format_number($items['base_price']); ?>
                    </p>
                    <p>Quantity: <?php echo $items['qty']; ?>
                    </p>
                </div>
                <div class="cart-action-group">
                    <!-- <h6>₹ <?php echo $items['price'] * $items['qty']; ?>
                </h6> -->
                </div>
            </div>
        </li>
    <?php endforeach;
} else {
    echo 'Cart is empty';
} ?>
