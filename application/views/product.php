<?php $this->load->view('includes/header'); ?>
<style>
    .filterToggler {
        display: none;
    }

    @media (max-width:991px) {
        .mobileCloseFilter {
            display: none;
        }

        .mobileCloseFilter {
            display: block;
            position: absolute;
            right: 20px;
            top: 0;
        }

        .shop-widget.mobile_floating {
            display: none;
        }

        .shop-widget.mobile_floating.open {
            display: block;
        }

        .filterToggler {
            display: none;
        }
    }

    .filter-short .form-select {
        background: #ffffff;
        width: 100%;
    }

    .form-input-othr {
        background: #ffffff;
        padding: 0px 16px !important;
        border-radius: 12px;
        border: 1px solid #79767D;
        height: 47px;
    }
</style>

<section class="inner-section shop-part">
    <div class="container">
        <div class="row mobile-content-reverse">
            <div class="col-lg-3 custom-filterbar">
                <div class="shop-widget mobile_floating d-none ">
                    <div class="row position-relative">
                        <div class="col-lg-12">
                            <h6 class="shop-widget-title">Filter by Category</h6>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="mobileCloseFilter filterToggler"
                                onclick="toggleMobileFilter()">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <ul class="shop-widget-list">
                        <?php
                        if ($sidecategory) {
                            foreach ($sidecategory as $row) {
                                $count = getNumRows('product', array('category_id' => $row['category_id']));
                                $subcategory = getRowsByMoreIdWithOrder('sub_category', ['category_id' => $row['category_id'], 'is_delete' => '1'], 'sub_category_name', 'asc');
                                ?>
                                <li>
                                    <div class="shop-widget-content">
                                        <input type="checkbox" id="cate<?= $row['category_id'] ?>"
                                            class="common_selector category" value="<?php echo $row['category_id']; ?>"
                                            <?= (($row['category_id'] == $cateid) ? 'Checked' : '') ?>>
                                        <label for="cate<?= $row['category_id'] ?>"><?= $row['category_name'] ?></label>
                                    </div>
                                    <span class="shop-widget-number">(<?= $count ?? '0' ?>)</span>
                                    <!-- <span class="shop-widget-number">(<?= $subcategory ? count($subcategory) : 0 ?>)</span> -->
                                </li>

                                <?php
                                if (($subcategory)) {
                                    foreach ($subcategory as $row_subcat) {
                                        $counts = getNumRows('product', array('sub_category_id' => $row_subcat['sub_category_id']));
                                        ?>
                                        <li style="padding-left:25px;">
                                            <div class="shop-widget-content">
                                                <input type="checkbox" class="common_selector subcategory"
                                                    id="subcate<?= $row_subcat['sub_category_id'] ?>"
                                                    value="<?php echo $row_subcat['sub_category_id']; ?>"
                                                    <?= (($row_subcat['sub_category_id'] == $subcateid) ? 'Checked' : '') ?>>
                                                <label for="subcate<?= $row_subcat['sub_category_id'] ?>">
                                                    <?= $row_subcat['sub_category_name'] ?></label>
                                            </div>
                                            <span class="shop-widget-number">(<?= $counts ?? '0' ?>)</span>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row pb-4">
                    <div class="col-lg-12">
                        <div class="top-filter top-filter-2">

                            <h4 class="filter-heading">Filter: </h4>
                            <div class="d-flex top-filter-divs-2 align-items-baseline filter-box-gap">
                                <div class="filter-short">
                                    <select class="form-select filter-select filter-box" id="ec-price_hm">
                                        <option value="">Select Range</option>
                                        <option value="0">Price, low to high</option>
                                        <option value="1">Price, high to low</option>
                                    </select>
                                </div>
                                <div class="filter-short">
                                    <select class="form-select filter-select filter-box" id="ec-gender">
                                        <option value="">Select Gender</option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                        <option value="u">Unisex</option>
                                    </select>
                                </div>
                                <div class="filter-short">
                                    <form autocomplete="off">
                                        <input type="text" class="form-control form-input-othr"
                                            placeholder="Search keyword" value="<?= $search ?>" id="search"
                                            name="namekeywords" />
                                    </form>
                                </div>
                                <div class="filter-short">
                                    <select class="form-select filter-select common_selector filter-box" id="category">
                                        <option value="">Select Category</option>
                                        <?php
                                        if ($sidecategory) {
                                            foreach ($sidecategory as $row) {
                                                $count = getNumRows('product', array('category_id' => $row['category_id'], 'is_delete' => '1'));
                                                ?>
                                                <option value="<?php echo $row['category_id']; ?>"
                                                    <?= (($cateid == $row['category_id']) ? 'selected' : '') ?>>
                                                    <?= $row['category_name'] ?> (<?= $count ?? '0' ?> Products)
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <button type="button" class="filterToggler" onclick="toggleMobileFilter()">
                                <i class="fa fa-filter"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 justify-content-center"
                    id="filter_data">
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/footer-link'); ?>


</body>

</html>