<?php $this->load->view('admin/template/header', $title); ?>
<?php $id = $this->input->get('id'); ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h2 class="mb-sm-0 "><?= $title ?></h2>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Product
                                                Name</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="product_name"
                                                    id="product-name" required value="<?= $product_name ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Slug
                                                Title</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="slug_title"
                                                    id="slug-title" required value="<?= $slug_title ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="row">
                                            <label class="col-sm-3 control-label">Category</label>
                                            <div class="col-sm-12">
                                                <select class="form-control select2" name="category_id" required
                                                    onchange="getCategory(this.value)">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    $c = getRowsByMoreIdWithOrder('tbl_category', "is_delete = '1' AND category_type = '0'", "category_name", 'ASC');
                                                    foreach ($c as $cate) {
                                                        ?>
                                                        <option value="<?= $cate['category_id'] ?>" <?php if ($category_id == $cate['category_id']) {
                                                              echo 'selected';
                                                          } ?>><?= ucwords($cate['category_name']) ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="row">
                                            <label for="example-text-input"
                                                class="col-md-4 col-form-label">Price</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="number" name="market_price" required
                                                    value="<?= $market_price ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                    <div class="row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Feature
                                            </label>
                                            <div class="col-md-8">
                                                <select class="select2 form-control" name="product_type">
                                                    <option value="1" <?= $product_type == '1' ? 'selected' : '' ?>>Normal</option>
                                                    <option value="2" <?= $product_type == '2' ? 'selected' : '' ?>>Feature
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Short
                                                Description</label>
                                            <div class="col-md-12">
                                                <textarea name="short_description" style="width: 100%;" class="editor"
                                                    rows="2"><?= $short_description ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input"
                                                class="col-md-2 col-form-label">Specification</label>
                                            <div class="col-md-12">
                                                <textarea name="specification" style="width: 100%;" class="editor"
                                                    rows="10"><?= $specification ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">About this
                                                item</label>
                                            <div class="col-md-12">
                                                <textarea name="about_item" style="width: 100%;" class="editor"
                                                    rows="10"><?= $about_item ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input"
                                                class="col-md-2 col-form-label">Shipping</label>
                                            <div class="col-md-12">
                                                <textarea name="shipping" style="width: 100%;" class="editor"
                                                    rows="10"><?= $shipping ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Additional
                                                Infomation</label>
                                            <div class="col-md-12">
                                                <textarea name="description" style="width: 100%;" class="editor"
                                                    rows="10"><?= $description ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <h4>Customise Form Details (Select form fields)</h4>
                                            <div class="col-md-12">
                                                <?php
                                                if ($alldata) {
                                                    foreach ($alldata as $all) {
                                                        $id = encryptId($all['id']);
                                                        $optionName = $all['name'];
                                                        $optionType = $all['type'];  // Assuming you have a 'type' column in your 'form_field' table
                                                        ?>
                                                        <label for="option<?= $id ?>" style="margin-left:20px; font-size:15px;">
                                                            <!-- Storing the type in a hidden field next to each checkbox -->
                                                            <input type="hidden" name="types[]" value="<?= $optionType ?>">
                                                            <input type="checkbox" name="fields[]" value="<?= $optionName ?>"
                                                                <?= (isset($name) && in_array($optionName, $name)) ? 'checked' : '' ?>> <?= $optionName ?>
                                                        </label>
                                                    <?php }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <!-- <label style="color: gray">Note:- Image Size 600X400</label> -->
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Product
                                                Image</label>
                                            <div class="col-md-12">
                                                <input type="file" class="form-control image" multiple <?= isset($id) ? '' : 'required' ?> name="image[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-42 mb-3">
                                        <div class="gallery"></div>
                                    </div>
                                    <div class="col-lg-42 mt-2">
                                        <div class="row">
                                            <?php
                                            if (isset($id)) {
                                                $numImage = getNumRows('product_image', "product_id = '" . decryptId($id) . "'");
                                                if ($image_all) {
                                                    foreach ($image_all as $img) {
                                                        $imgId = encryptId($img['product_image_id']);
                                                        $imgData = $img['image_path'];
                                                        ?>
                                                        <div class="col-lg-4 mb-2">
                                                            <div style="width: 100%; border: 1px solid #aeaeae; border-radius: 5px">
                                                                <img src="<?= base_url("upload/product/") . $imgData ?>"
                                                                    style="width: 100%;height: 180px; margin-top: 10px">
                                                                <div style="margin-top: 10px; text-align: center">
                                                                    <?php
                                                                    if ($numImage != 1) {
                                                                        ?>
                                                                        <a class="btn btn-danger" style="margin-right: 5px"
                                                                            onclick="return confirm('Are you sure to delete this image?')"
                                                                            href="<?= base_url("productImageD/$imgId/$imgData") ?>">
                                                                            <i class="fa fa-trash"></i> Delete
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                               
                                <hr />
                                <div class="row">
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-1 col-form-label">Tab
                                                Title</label>
                                            <div class="col-md-12">
                                                <textarea name="tab_title" style="width: 100%;"
                                                    rows="2"><?= $tab_title ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Meta
                                                Title</label>
                                            <div class="col-md-12">
                                                <textarea name="meta_title" style="width: 100%;"
                                                    rows="2"><?= $meta_title ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Meta
                                                Description</label>
                                            <div class="col-md-12">
                                                <textarea name="meta_description" style="width: 100%;"
                                                    rows="4"><?= $meta_description ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-42 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Meta
                                                Keywords</label>
                                            <div class="col-md-12">
                                                <textarea name="meta_keywords" style="width: 100%;"
                                                    rows="2"><?= $meta_keywords ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="save" class="btn btn-primary w-md">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php $this->load->view('admin/template/footer'); ?>
<script>
    $(document).ready(function () {
        initSample();
    });


    $(document).on('click', '.delete_button', function () {
        var variant_id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url("delete_variant") ?>",
            data: 'variant_id=' + variant_id,
            beforeSend: function () {
                $(".loader").show();
            },
            success: function (data) {
                $("#variant" + variant_id).hide();
                $(".loader").hide();
            }
        });
    });

    var imagesPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            // if (filesAmount <= 5) {
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<img style="width:200px; height:150px; margin-left:15px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('.image').on('change', function () {
        $('.gallery').html('');
        imagesPreview(this, 'div.gallery');
    });
</script>
<script>
    const getProductName = document.querySelector('#product-name'),
        getSlugTitle = document.querySelector('#slug-title');

    const generateSlug = (input) => input.toLowerCase().split(' ').join('-');

    getProductName?.addEventListener('keyup', (e) => {
        let {
            value: productName
        } = e.target
        getSlugTitle.value = generateSlug(productName);
    });
    getSlugTitle?.addEventListener('keyup', (e) => {
        let {
            value: productName
        } = e.target
        getSlugTitle.value = generateSlug(productName);
    });
    $(document).ready(function () {
        var maxField = 10;
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row field_wrapper_item"><div class="col-lg-4 mb-3"><div class="row"><label for="example-text-input" class="col-md-4 col-form-label">Size</label><div class="col-md-8"><input class="form-control" type="number" name="size[]" required value=""></div></div></div><div class="col-lg-4 mb-3"><div class="row"><label for="example-text-input" class="col-md-4 col-form-label">Price</label><div class="col-md-8"><input class="form-control" type="number" name="price[]" required value="<?= $sale_price ?>"></div></div></div><div class="col-lg-4 mb-3"><div class="row"> <input class="form-control" type="hidden" name="varid[]" required value=""><a href="javascript:void(0);" class="remove_button">Remove</a></div></div></div> ';
        var x = 1;

        // Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            } else {
                alert('A maximum of ' + maxField + ' fields are allowed to be added. ');
            }
        });

        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).closest('.field_wrapper_item').remove(); // Remove the entire field wrapper item
            x--; // Decrease field counter
        });
    });
</script>