<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php $this->load->view('includes/header-link'); ?>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3SM743X" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="backdrop">
	</div>
	<a class="backtop fas fa-arrow-up" href="#"></a>
	<!-- <a class="whatsapp-floating" aria-label="click for whatsapp"
		href="https://api.whatsapp.com/send?phone=919179311505&text=I'm%20interested%20in%20your%20product"
		target="_blank"><i class="fa fa-whatsapp"></i></a> -->
	<div class="newsletter-Alert">
		<?php
		if ($this->session->has_userdata('subs_msg')) {
			echo $this->session->userdata('subs_msg');
			$this->session->unset_userdata('subs_msg');
		}
		?>
	</div>
	<header class="header-part d-sm-none">
		<div class="container">
			<div class="header-content">
				<div class="header-media-group">
					<button class="header-user" title="humburger">
						<i class="fas fa-bars"></i>
					</button>
					<a href="<?= base_url() ?>">
						<img src="<?= base_url() ?>
						<?= $setting[2]['content_value'] ?>" alt="<?= $setting[24]['content_value'] ?>">
					</a>
					<button class="header-src" title="header-search">
						<i class="fas fa-search">
						</i>
					</button>
				</div>
				<a href="<?= base_url() ?>" class="header-logo">
					<img src="<?= base_url() ?>
				<?= $setting[2]['content_value'] ?>" alt="<?= $setting[24]['content_value'] ?>">
				</a>
				<?php
				if ($this->session->has_userdata('login_user_id')):
					?>
					<a href="<?= base_url('orders') ?>" class="header-widget" title="My Account">
						<img src="<?= base_url() ?>assets/images/user.png" alt="user">
						<span>
							<?= $this->profile[0]['name'] ?>
						</span>
					</a>
					<?php
				else:
					?>
					<a href="<?= base_url('login') ?>" class="header-widget" title="My Account">
						<img src="<?= base_url() ?>assets/images/user.png" alt="user">
						<span>Account</span>
					</a>
					<?php
				endif;
				?>
				<form action="<?= base_url('product') ?>" method="GET" class="header-form">
					<input placeholder="Enter Product Name..." type="text" name="searchbox"
						value="<?= @$_GET['searchbox'] ?>" list="browser" id="browser">
					<datalist id="browser">
						<?php
						$products = $this->CommonModel->runQuery("SELECT product_name, is_delete FROM `tbl_product` WHERE is_delete = '1'");
						if (!empty($products)) {
							foreach ($products as $products_row) {
								?>
								<option value="<?= strtoupper($products_row['product_name']); ?>">
									<?= strtoupper($products_row['product_name']); ?>
								</option>
								<?php
							}
						}
						?>
					</datalist>
					<button type="submit">
						<i class="fas fa-search"></i>
					</button>
				</form>

				<div class="header-widget-group">
					<button class="header-widget header-cart" title="Cartlist">
						<i class="fas fa-shopping-basket">
						</i>
						<sup>
							<p class="totalitem text-center">
								<?= $this->cart->total_items(); ?>
							</p>
						</sup>
						<span>total price<small
								class="totalamount">₹<?php echo $this->cart->format_number($this->cart->total()); ?>
							</small>
						</span>
					</button>
				</div>
			</div>
		</div>
	</header>


	<!-- ------------------main header----------------------- -->
	<nav class="navbar-part fixed">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-2 col-md-3 col-4">
					<a href="<?= base_url() ?>" class="header-logo">
						<img src="<?= base_url() ?><?= $setting[2]['content_value'] ?>"
							alt="<?= $setting[24]['content_value'] ?>">
					</a>
				</div>

				<div class="col-lg-7 col-md-6 col-12">
					<div class="navbar-content text-center">
						<ul class="navbar-list">
							<li class="navbar-item dropdown"><a class="navbar-link <?= isActive('') ?>"
									href="<?= base_url() ?>">Home</a>
							</li>
							<?php
							if (!empty($category)) {
								foreach ($category as $category_row) {
									?>
									<li class="navbar-item dropdown"><a class="navbar-link <?= isActive('') ?>"
											href="<?= base_url('product-details/') . $category_row['category_id'] ?>"><?= $category_row['category_name']; ?></a>
									</li>
									<?php
								}
							} ?>
							<li class="navbar-item dropdown"><a class="navbar-link <?= isActive('') ?>"
									href="<?= base_url('contact') ?>">Contact</a>
							</li>
							<!-- <li class="navbar-item dropdown"><a class="navbar-link <?= isActive('') ?>"
									href="<?= base_url() ?>">Home</a>
							</li>
							<li class="navbar-item dropdown"><a class="navbar-link <?= isActive('product') ?>"
									href="<?= base_url() ?>product">Shop</a>
							</li>
							<li class="navbar-item dropdown"><a class="navbar-link <?= isActive('about') ?>"
									href="<?= base_url() ?>about">About</a>
							</li>
							<li class="navbar-item dropdown"><a class="navbar-link <?= isActive('contact') ?>"
									href="<?= base_url() ?>contact">Contact</a>
							</li> -->

						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-8">
					<div class="header-widget-group d-flex justify-content-end align-items-center">
						<form action="<?= base_url('product') ?>" class="header-form me-3 desktop">
							<input placeholder="Search" type="text" name="searchbox" value="<?= @$_GET['searchbox'] ?>"
								list="browsers" id="browsers">
							<button type="submit" id="desktopSerachBtn">
								Search
							</button>
							<datalist id="browsers">
								<?php
								$products = getAllRow('product');
								if (!empty($products)) {
									foreach ($products as $products_row) {
										?>
										<option value="<?= strtoupper($products_row['product_name']); ?>">
											<?= strtoupper($products_row['product_name']); ?>
										</option>
										<?php
									}
								}
								?>
							</datalist>
							<button type="button" id="desktopSearch">
								<img src="<?= base_url() ?>assets/images/Icon/Vector.png" alt="Kritosh"
									class="header-heart">
							</button>
						</form>
						<!-- <a href="<?= base_url() ?>wishlist">
							<img src="<?= base_url() ?>assets/images/Icon/Icon/Heart-1.png" alt="Kritosh"
								class="header-heart">
						</a> -->
						<button class="header-widget header-cart" title="Cartlist">
							<img src="<?= base_url() ?>assets/images/Icon/Group.png" alt="Kritosh">
							<sup>
								<p class="totalitem text-center">
									<?= $this->cart->total_items(); ?>
								</p>
							</sup>
							<span><small
									class="totalamount">₹<?php echo $this->cart->format_number($this->cart->total()); ?>
								</small></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<aside class="cart-sidebar">
		<div class="cart-header">
			<div class="cart-total">
				</i> Your Cart &nbsp;(<span class="totalitem"> <?= $this->cart->total_items(); ?></span>)
			</div>
			<button class="cart-close">
				<i class="icofont-close">
				</i>
			</button>
		</div>
		<div id="cart">
		</div>
	</aside>
	<aside class="nav-sidebar">
		<div class="nav-header">
			<a href="#">
				<img src="<?= base_url() ?>
		<?= $setting[2]['content_value'] ?>" alt="logo">
			</a>
			<button class="nav-close" title="nav close">
				<i class="icofont-close">
				</i>
			</button>
		</div>
		<div class="nav-content">
			<ul class="nav-list">
				 
				<li><a class="navbar-link" href="<?= base_url() ?>">Home</a>
				</li>
				<li><a class="navbar-link" href="<?= base_url() ?>product">Shop</a>
				</li>
				<li><a class="navbar-link" href="<?= base_url() ?>about">About</a>
				</li>
				<li><a class="navbar-link" href="<?= base_url() ?>contact">Contact</a>
				</li>
				<li>
					<a class="nav-link" href="<?= base_url('wishlist') ?>">
						<i class="icofont-heart">
						</i>Wishlist</a>
				</li>
				<!-- <li>
					<a class="nav-link" href="<?= base_url('logout') ?>">
						<i class="icofont-logout">
						</i>logout</a>
				</li> -->
			</ul>
			<div class="nav-info-group">
				<div class="nav-info">
					<i class="icofont-ui-touch-phone">
					</i>
					<p>
						<small>call us</small>
						<span>
							<a href="tel:<?= $setting[3]['content_value'] ?>" class="text-success">
								<?= $setting[3]['content_value'] ?>
							</a>
						</span>
					</p>
				</div>
				<div class="nav-info">
					<i class="icofont-ui-email">
					</i>
					<p>
						<small>email us</small>
						<span>
							<a href="mailto:<?= $setting[3]['content_value'] ?>"
								class="text-success"><?= $setting[7]['content_value'] ?></a>
						</span>
					</p>
				</div>
			</div>
			<div class="nav-footer">
				<p>All Rights Reserved by <a href="<?= base_url() ?>">
						<?= $setting[9]['content_value'] ?>
					</a>
				</p>
			</div>
		</div>
	</aside>
	<div class="mobile-menu">
		<a href="<?= base_url() ?>" title="Home Page">
			<i class="fas fa-home">
			</i>
			<span>Home</span>
		</a>
		<a href="<?= base_url('product') ?>" class="cate-btn" title="Category List">
			<i class="fas fa-list">
			</i>
			<span>All Products</span>
		</a>
		<button class="cart-btn" title="Cartlist">
			<i class="fas fa-shopping-basket">
			</i>
			<span>cartlist</span>
			<sup class="totalitem">
				<?= $this->cart->total_items(); ?>+</sup>
		</button>
		<?php
		if ($this->session->has_userdata('login_user_id')) {
			?>
			<a href="<?= base_url('orders'); ?>">
				<i class="fas fa-shopping-bag">
				</i>
				<span>Orders</span>
			</a>
			<a href="<?= base_url('profile') ?>">
				<i class="fas fa-user">
				</i>
				<span>My Account</span>
			</a>
			<?php
		} else {
			?>
			<a href="<?= base_url('login') ?>">
				<i class="fas fa-sign-out-alt">
				</i>
				<span>Account</span>
			</a>
			<!-- <a href="<?= base_url('register') ?>"> <i class="fas fa-user">
				
			</i>
			<span>Register </span>
		</a> -->
			<?php
		}
		?>
	</div>