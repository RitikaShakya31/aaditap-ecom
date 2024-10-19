<ul class="cart-list">

	<?php foreach ($this->cart->contents() as $items) :
	?>
		<li class="cart-item">
			<div class="cart-media">
				<a href="<?= base_url('product-details/' . encryptId($items['id']) . '/' . url_title($items['name'])) ?>">
					<img src="<?= setImage($items['image'], 'upload/product/') ?>" alt="<?php echo $items['name']; ?>">
				</a>
				<button type="button" class="cart-delete removeCarthm remove" data-id="<?= $items['rowid'] ?>">
					<i class="far fa-trash-alt">

					</i>
				</button>
			</div>
			<div class="cart-info-group">
				<div class="cart-info">
					<h6>
						<a href="<?= base_url('product-details/' . encryptId($items['id']) . '/' . url_title($items['name'])) ?>">
							<?php echo $items['name']; ?>
						</a> &nbsp;<a href="javascript:void(0)" class="cart-delete removeCarthm remove" data-id="<?= $items['rowid'] ?>">
							<i class="far fa-trash-alt">

							</i>
						</a>
					</h6>
					Size: <?php echo $items['size']; ?>
					<p>Quantity - <?php echo $items['qty']; ?> X <?php echo $this->cart->format_number($items['price']); ?>
						</-< /p>
				</div>
				<div class="cart-action-group">

					<h6> ₹ <?php echo $items['price'] * $items['qty']; ?>
					</h6>
				</div>
			</div>
		</li>

	<?php endforeach; ?>
</ul>