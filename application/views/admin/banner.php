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
                <div class="col-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-3 col-form-label">Banner Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control category_image" type="file" name="image_path"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <img class="temp_image" src="<?= base_url('upload/banner') . '/' . $image_path ?>"
                                        style=" height: 300px;">
                                    <input type="hidden" value="<?= $image_path ?>" name="temp_image">
                                    <div id="image_preview">                                   
                                </div>
                                </div>
                                <!-- Container to display the images below the input field -->
                               
                                <div class="col-lg-12 mt-2">
                                    <span id="uploadImageError"></span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="save" class="btn btn-primary w-md">Update</button>
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
