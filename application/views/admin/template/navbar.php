<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$page = $components[1];
$page_id = $this->input->get('page_id');
?>pl-2
<div class="vertical-menu">
	<div data-simplebar class="h-100">
		<div id="sidebar-menu">
			<ul class="metismenu list-unstyled" id="side-menu">
				<li class="menu-title" key="t-menu">Menu</li>
				<li>
					<a href="<?= base_url('dashboard') ?>" class="waves-effect">
						<i class="bx bx-home-circle"></i>
						<span key="t-dashboards">Dashboards</span>
					</a>
				</li>
				<li class="menu-title" key="t-apps">Management</li>
				<li class="<?php if ($page == "company" || $page == "categoryAll" || $page == 'categoryAdd' || $page == 'subCategoryAdd' || $page == 'subCategoryAll' || $page == 'productAll' || $page == 'productAdd' || $page == 'productDetails') {
					echo "mm-active";
				} ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="fab fa-product-hunt"></i>
						<span key="t-ecommerce">Product</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
						<li><a href="<?= base_url('categoryAll') ?>" class="<?php if ($page == "categoryAll" || $page == 'categoryAdd') {
							  echo 'active';
						  } ?>" key="t-category">Category</a></li>
						<!-- <li><a href="<?= base_url('subCategoryAll') ?>" class="<?php if ($page == "subCategoryAll" || $page == 'subCategoryAdd') {
							  echo 'active';
						  } ?>" key="t-sub-category">Sub Category</a></li> -->
						<li><a href="<?= base_url('productAll') ?>" class="<?php if ($page == "productAll" || $page == 'productAdd' || $page == 'productDetails') {
							  echo 'active';
						  } ?>" key="t-product">Product</a></li>
					</ul>
				</li>
				<li class="<?php if ($page == "recentOrders" || $page == 'acceptedOrders' || $page == 'dispatchOrders' || $page == 'completedOrders' || $page == 'allOrders') {
					echo "mm-active";
				} ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="fab fa-product-hunt"></i>
						<span key="t-ecommerce">Orders</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
						<li>
							<a href="<?= base_url('recentOrders') ?>" class="<?php if ($page == "recentOrders") {
								  echo 'active';
							  } ?>" key="t-category">Recent Orders
							</a>
						</li>
						<li>
							<a href="<?= base_url('acceptedOrders') ?>" class="<?php if ($page == "acceptedOrders") {
								  echo 'active';
							  } ?>" key="t-category">Accepted Orders
							</a>
						</li>
						<li>
							<a href="<?= base_url('dispatchOrders') ?>" class="<?php if ($page == "dispatchOrders") {
								  echo 'active';
							  } ?>" key="t-category">Dispatch Orders
							</a>
						</li>
						<li>
							<a href="<?= base_url('completedOrders') ?>" class="<?php if ($page == "completedOrders") {
								  echo 'active';
							  } ?>" key="t-category">Completed Orders
							</a>
						</li>
						<li>
							<a href="<?= base_url('allOrders') ?>" class="<?php if ($page == "allOrders") {
								  echo 'active';
							  } ?>" key="t-category">All Orders
							</a>
						</li>
					</ul>
				</li>
				<li class="menu-title" key="t-apps">Settings</li>
				<li>
					<a href="<?= base_url('setting') ?>" class="waves-effect">
						<i class="bx bx-file"></i>
						<span key="t-file-manager">Setting</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('promoCode') ?>" class="waves-effect">
						<i class="bx bx-file"></i>
						<span key="t-file-manager">Promo Code</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('addFaqs') ?>" class="waves-effect">
						<i class="bx bx-file"></i>
						<span key="t-file-manager">Faq's</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('policy') ?>" class="waves-effect">
						<i class="bx bx-file"></i>
						<span key="t-file-manager">Policy</span>
					</a>
				</li>
				<li class="menu-title" key="t-apps">Queries</li>
				<li>
					<a href="<?= base_url('contact_query') ?>" class="waves-effect">
						<i class="bx bx-file"></i>
						<span key="t-file-manager">Contact</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>