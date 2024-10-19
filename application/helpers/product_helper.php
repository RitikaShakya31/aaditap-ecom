<?php
function product($row, $ss)
{
    $ci = &get_instance();
    $data = getSingleRowById('product_image', array('product_id' => $row['product_id']));
    ?>
    <div class="product-card productid" data-product-id="<?= $row['product_id'] ?>">
        <div class="product-media">
            <div class="product-label">
                <?php if ($ss == 'new') { ?>
                    <label class="label-text new">new</label>
                <?php } else if ($ss == 'rate') { ?>
                        <label class="label-text rate">4.8</label>
                <?php } else if ($ss == 'discount') { ?>
                            <label class="label-text off">-10%</label>
                <?php } else { ?>
                <?php } ?>
            </div>
            <a class="product-image" href="<?= base_url('product-details/') . $row['category_id'] ?>">
                <img src="<?= setImage(@$data['image_path'], 'upload/product/') ?>" alt="product"
                    class="p-images new-product-img">
            </a>
        </div>
        <div class="product-content">
            <h6 class="product-name">
                <a class="sagar-ellipse" href="<?= base_url('product-details/') . $row['category_id'] ?>">
                    <?= $row['product_name'] ?>
                </a>
            </h6>
            <h6><?= $row['market_price'] ?></h6>

            <div class="product-action d-none">
                <button class="action-minus" title="Quantity Minus" data-rowid="<?= $row['product_id'] ?>"
                    data-type="sidecart">
                    <i class="icofont-minus">
                    </i>
                </button>
                <input class="action-input" title="Quantity Number" id="qtysidecart<?= $row['product_id'] ?>" type="text"
                    name="quantity" value="1">
                <button class="action-plus" title="Quantity Plus" data-rowid="<?= $row['product_id'] ?>"
                    data-type="sidecart">
                    <i class="icofont-plus">
                    </i>
                </button>
            </div>
            <button class="product-add  addCart  crtbtn-<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>"
                title="Order Now">
                <i class="fas fa-shopping-cart"></i>
                <span>Add to Cart</span>
            </button>
        </div>
    </div>
    <?php
}

function feature_product($row)
{
    $ci = &get_instance();
    $data = getSingleRowById('product_image', array('product_id' => $row['product_id']));
    $wishlist = getNumRows('user_wishlist', ['product_id' => $row['product_id'], 'user_id' => ($ci->session->userdata('login_user_id'))]);
    ?>
    <div class="col">
        <div class="feature-card">
            <div class="feature-media">
                <div class="feature-label">
                    <label class="label-text feat">feature</label>
                </div>
                <button
                    class="feature-wish wish wish<?= $row['product_id'] ?> addtowishlist <?= (($wishlist > 0) ? 'active' : '') ?> "
                    data-id="<?= $row['product_id'] ?>" type="button">
                    <i class="fas fa-heart"></i>
                </button>
                <a class="feature-image" href="<?= viewProduct2($row['slug_title']) ?>">
                    <img src="<?= setImage($data['image_path'], 'upload/product/') ?>" alt="product">
                </a>
            </div>
            <div class="feature-content">
                <h6 class="feature-name">
                    <a class="sagar-ellipse" href="<?= viewProduct2($row['slug_title']) ?>">
                        <?= $row['product_name']; ?>
                    </a>
                </h6>
                <h6 class="feature-price">
                    <del>&#8377; <?= $row['market_price']; ?>
                    </del>
                    <span>&#8377; <?= $row['sale_price']; ?>
                        <small>/piece</small>
                    </span>
                </h6>
                <p class="feature-desc">
                    <?= getExcerpt($row['description'], 10) ?>
                </p>
                <div class="product-action d-none">
                    <button class="action-minus" title="Quantity Minus" data-rowid="<?= $row['product_id'] ?>"
                        data-type="sidecart">
                        <i class="icofont-minus">
                        </i>
                    </button>
                    <input class="action-input" title="Quantity Number" id="qtysidecart<?= $row['product_id'] ?>"
                        type="text" name="quantity" value="1">
                    <button class="action-plus" title="Quantity Plus" data-rowid="<?= $row['product_id'] ?>"
                        data-type="sidecart">
                        <i class="icofont-plus">

                        </i>
                    </button>
                </div>
                <button class="product-add  addCart  crtbtn-<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>"
                    title="Order Now">
                    <img src="assets/images/icon/Group.png" alt="Aaditap">
                    </i>
                    <span>Order Now</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}

?>