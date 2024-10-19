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
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Category Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="category_name" id="category-name" required value="<?= $category_name ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3 d-none">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Slug Title</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="slug_title" id="slug-title" required value="<?= $slug_title ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Category Image</label>
                                            <div class="col-md-9">
                                                <input class="form-control category_image" type="file" name="image" <?= $image == "" ? 'required' : '' ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Category Banner Image</label>
                                            <div class="col-md-9">
                                                <input class="form-control category_image" type="file" name="banner_image" <?= $banner_image == "" ? 'required' : '' ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <label for="example-text-input" class="col-md-3 col-form-label">Category Type</label>
                                            <div class="col-md-9">
                                                <select name="category_type" class="form-control">
                                                    <option value="0" <?= (($category_type == 0) ? 'selected' : '') ?>>Main Category</option>
                                                    <option value="1" <?= (($category_type == 1) ? 'selected' : '') ?>>Scent Category</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <?php
                                        if ($image) {
                                        ?>
                                            <img class="temp_image" src="<?= base_url('upload/category') . '/' . $image ?>" style=" height: 300px;">
                                        <?php
                                        }
                                        ?>

                                        <input type="hidden" value="<?= $image ?>" name="temp_image">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <span id="uploadImageError"></span>
                                    </div>
                                </div> -->

                                <div class="text-center">
                                    <button type="submit" id="save" class="btn btn-primary w-md">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/template/footer'); ?>
<script>
    const getProductName = document.querySelector('#category-name'),
        getSlugTitle = document.querySelector('#slug-title');

    const generateSlug = (input) => input.toLowerCase().split(' ').join('-');
    getSlugTitle.value = generateSlug(getProductName.value);
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
</script>