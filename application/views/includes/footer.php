<footer class="footer-part">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="footer-widget res-justify-content-center">
					<a class="footer-logo" href="<?= base_url() ?>"><img
							src="<?= base_url() ?><?= $setting[2]['content_value'] ?>" alt="Aaditap"></a>
							<ul class="footer-social mt-4">
						<?php if ($setting[12]['content_value'] != '') { ?>
							<li><a class="icofont-instagram" aria-label="Read more about Aaditap"
									href="<?= $setting[12]['content_value'] ?>"></a></li>
						<?php } ?>
						<?php if ($setting[11]['content_value'] != '') { ?>
							<li><a class="icofont-facebook" aria-label="Read more about Aaditap"
									href="<?= $setting[11]['content_value'] ?>"></a></li>
						<?php } ?>
						<?php if ($setting[13]['content_value'] != '') { ?>
							<li>
								<a aria-label="Read more about Aaditap" href="<?= $setting[13]['content_value'] ?>">
									<i class="fa-brands fa-youtube"></i></a>
							</li>
						<?php } ?>
						<?php if ($setting[14]['content_value'] != '') { ?>
							<li><a class="icofont-linkedin" aria-label="Read more about Aaditap"
									href="<?= $setting[14]['content_value'] ?>" target="_blank"></a></li>
						<?php } ?>
						
					</ul>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="footer-widget ">
					<div class="footer-links">
						<ul>
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
						</ul>

					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 ">
				<div class="footer-widget">
					<div class="footer-links">
						<ul>
						<li><a href="<?= base_url('contact') ?>">Contact</a></li>
							<?php
							if ($policy_list != '') {
								foreach ($policy_list as $list) {
									?>
									<li><a href="<?= base_url('policy/' . url_title($list['title_policy'], 'dash', TRUE)); ?>"
											class="textcap"><?= $list['title_policy'] ?></a></li>
									<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="footer-widget">
					<div class="footer-links">
						<ul>	
						<li><a href="tel:<?= $setting[3]['content_value'] ?>"><i class="icofont-phone"></i> <?= $setting[3]['content_value'] ?></a></li>
						<li><a href="mailto:<?= $setting[7]['content_value'] ?>"><i class="icofont-ui-email"></i> <?= $setting[7]['content_value'] ?></a></li>
						<li><a href=""><i class="icofont-location-pin"></i> <?= $setting[8]['content_value'] ?></a></li>
						</ul>
					</div>
					
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-12">
				<div class="footer-bottom">
					<p class="footer-copytext">&copy; 2024 All rights reserved by <a
							href="<?= base_url() ?>"><?= $setting[9]['content_value'] ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="d-none">
		<?php
		if ($mproductdesc != '') {
			foreach ($mproductdesc as $row) {
				echo '<div class="col">';
				product($row, 'new');
				echo '</div>';
			}
		}
		?>
	</div>
</footer>
<input type="hidden" value="<?= base_url() ?>" id="base">