<ul class="cart-list">
	<!-- <div class="text-right my-3">
		<a href="javascript: void(0);" class="text-right text-underline"> Clear all</a>
	</div> -->
	<?php
	if (count($this->cart->contents()) > 0) {
		foreach ($this->cart->contents() as $items):
			// echo '<pre>';
			// print_r($items);
			// exit();
			?>
			<li class="cart-item">
				<!-- <?php
				echo $items['id'] . '<br>';
				list($part1, $part2) = separateAndRemoveUnderscore($items['id']);
				echo $part1 . ' | ' . $part2;
				?> -->
				<div class="cart-media"><a href="<?= base_url($items['slug_title']) ?>">
						<img src="<?= setImage($items['image'], 'upload/product/') ?>" alt="<?php echo $items['name']; ?>">
					</a></div>
				<div class="cart-info-group">
					<div class="cart-info">
						<h6>
							<a href="<?= base_url($items['slug_title']) ?>">
								<?php echo $items['name']; ?>
							</a>
							<button class="cart-delete removeCarthm remove" data-id="<?= $items['rowid'] ?>"><i
									class="icofont-close"></i></button>
						</h6>
						<!-- Size: <?php echo $items['size']; ?> -->
						<!-- <p>Quantity - <?php echo $items['qty']; ?> X <?php echo $this->cart->format_number($items['price']); ?></-< /p> -->
					</div>
					<div class="cart-action-group">
						<div class="product-action othr-action">
							<button class="action-minus qty" title="Quantity Minus" data-rowid="<?= $items['rowid'] ?>"
								data-type="minus">
								<i class="icofont-minus">
								</i>
							</button>
							<input class="action-input" title="Quantity Number" id="qtysidecart<?= $items['rowid'] ?>"
								type="number" name="quantity" value="<?= $items['qty'] ?>">
							<button class="action-plus qty" title="Quantity Plus" data-rowid="<?= $items['rowid'] ?>"
								data-type="sidecart">
								<i class="icofont-plus">
								</i>
							</button>
						</div>
						<h6>₹ <?php echo number_format($items['base_price'] * $items['qty'], 2); ?></h6>
					</div>
				</div>
			</li>

		<?php endforeach;
	} else {
		?>
		<li>
			<div class="cart-empty">
				<h3>Your cart is empty</h3>
				<a href="<?= base_url() ?>" class="btn bg-dark text-white">Add Items</a>
			</div>
		</li>
		<?php
	} ?>

	<!-- <div class="side-cart-promo-wrapper my-4">
		<div>
			<input type="text" class="side-cart-promo-input" placeholder="Eg. Promo Code" id="side-cart-promofield">
			<button>Apply</button>
		</div>
	</div> -->
	<?php
	if (count($this->cart->contents()) > 0) {
		?>
		<div class="side-cart-FBT">
			<h5>Frequently Bought Together</h5>
			<?php
			if (count($product) > 0) {
				foreach ($product as $item):
					// echo '<pre>';
					// print_r($item);
					// exit();
					// $quantity = 1;
					$ss = 'new';
					$product_image = getSingleRowById('product_image', array('product_id' => $item['product_id']));
					?>
					<li class="cart-item">
						<div class="cart-media">
							<a href="<?= base_url($item['slug_title']) ?>">
								<img src="<?= setImage(@$product_image['image_path'], 'upload/product/') ?>"
									alt="<?php echo $item['product_name']; ?>">
							</a>
						</div>
						<div class="cart-info-group d-flex align-items-center justify-content-between">
							<div class="cart-info">
								<h6>
									<a href="<?= base_url($item['slug_title']) ?>"><?php echo $item['product_name']; ?>
									</a>
								</h6>
								<p>₹ <?php echo $item['market_price']; ?></p>
								<input class="action-input" title="Quantity Number" id="qtysidecart<?= $item['product_id'] ?>"
									type="hidden" name="quantity" value="1">
							</div>
							<!-- <input type="hidden" name="quantity" id=""> -->
							<button class="product-add w-50 addCart  crtbtn-<?= $item['product_id'] ?>"
								data-id="<?= $item['product_id'] ?>">Add</button>

						</div>
					</li>

				<?php endforeach;
			} else {
			} ?>

		</div>
	<?php } ?>
</ul>


<div class="cart-footer">
	<!-- <button class="coupon-btn">Do you have a coupon code?</button>
	<form class="coupon-form"><input type="text" placeholder="Enter your coupon code"><button type="submit"><span>apply</span></button></form> -->
	<?php
	if (count($this->cart->contents()) > 0) { ?>
		<div class="side-cart-subtotal">
			<h4>SUBTOTAL</h4>
			<h5>₹ <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
		</div>
		<!-- <a class="cart-checkout-btn" href="<?= base_url('checkout') ?>"><span class="checkout-label">Proceed to
				Checkout</span><span class="checkout-price">₹
				<?php echo $this->cart->format_number($this->cart->total()); ?></span></a> -->
		<a class="cart-checkout-btn mt-1" href="javascript: void(0);" onclick="openCheckoutModal()"><span
				class="checkout-label">Checkout</span>
		</a>
	<?php } ?>
	<!-- <a class="cart-checkout-btn mt-1" href="<?= base_url('checkout') ?>"><span class="checkout-label">Checkout</span> -->
</div>

<?php
if (count($this->cart->contents()) > 0) { ?>
	<div class="cartbar d-none">
		<button class="cart-btn" title="Cartlist"><i class="fas fa-shopping-basket"></i><span>cartlist</span><sup
				class="totalitem"><?= $this->cart->total_items(); ?>+</sup></button>
	</div>
<?php } ?>

<script>
	$(".cart-btn").on("click", function () {
		$("body").css("overflow", "hidden");
		$(".cart-sidebar").addClass("active");
	});
	$(".cart-close").on("click", (function () {
		$("body").css("overflow", "inherit"), $(".cart-sidebar").removeClass("active"), $(".backdrop").fadeOut()
	}));
</script>