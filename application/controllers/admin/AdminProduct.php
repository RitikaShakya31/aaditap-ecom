<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminProduct extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (sessionId('admin_id') == "") {
			redirect("admin");
		}
		date_default_timezone_set("Asia/Kolkata");
		$this->setting = $this->CommonModel->getAllRows('settings');
	}

	//   category

	public function categoryAll()
	{
		$get['category_all'] = $this->CommonModel->getRowByIdInOrder('category', "is_delete = '1'", 'category_name', 'ASC');
		$get['title'] = 'All Category';
		$dID = $this->input->get('dID');
		if (isset($dID)) {
			$update = $this->CommonModel->updateRowById('category', 'category_id', decryptId($dID), array('is_delete' => '0'));
			redirect('categoryAll');
			exit;
		}
		$get['setting'] = $this->setting;
		$this->load->view('admin/product/category_all', $get);
	}

	public function categoryAdd()
	{
		extract($this->input->post());
		$id = $this->input->get('id');
		$dID = $this->input->get('dID');
		if (isset($id)) {
			$decrypt_id = decryptId($this->input->get('id'));
		} else {
			$decrypt_id = 0;
		}
		$get = $this->CommonModel->getSingleRowById('category', "category_id = '$decrypt_id'");
		$data['category_name'] = set_value('category_name') == false ? @$get['category_name'] : set_value('category_name');
		// $data['slug_title'] = set_value('slug_title') == false ? @$getProduct['slug_title'] : set_value('slug_title');
		// $data['category_type'] = set_value('category_type') == false ? @$get['category_type'] : set_value('category_type');
		// $data['image'] = set_value('image') == false ? @$get['image'] : set_value('image');
		// $data['banner_image'] = set_value('banner_image') == false ? @$get['banner_image'] : set_value('banner_image');
		if (isset($id)) {
			$data['title'] = 'Edit Category';
		} else {
			$data['title'] = 'Add Category';
		}
		$data['setting'] = $this->setting;
		if (isset($dID)) {
			$update = $this->CommonModel->updateRowById('category', 'category_id', decryptId($dID), array('is_delete' => '0'));
			redirect('categoryAll');
			exit;
		}
		if (count($_POST) > 0) {
			$this->form_validation->set_rules('category_name', 'category name', 'required');
			if ($this->form_validation->run()) {
				$post['category_name'] = trim($category_name);
				// $post['category_type'] = trim($category_type);
				$post['slug_title'] = $slug_title;

				// if (!empty($_FILES['image']['name'])) {
				// 	$picture = imageUploadWithRatio('image', CATEGORY_IMAGE, 600, 400, $data['image']);
				// 	$post['image'] = $picture;
				// }
				// if (!empty($_FILES['banner_image']['name'])) {
				// 	$picture = imageUploadWithRatio('banner_image', CATEGORY_IMAGE, 600, 400, $data['banner_image']);
				// 	$post['banner_image'] = $picture;
				// }
				if (isset($id)) {
					$update = $this->CommonModel->updateRowById('category', 'category_id', $decrypt_id, $post);
					flashData('errors', 'Category Update Successfully');
				} else {
					$insert = $this->CommonModel->insertRow('category', $post);
					flashData('errors', 'Category Add Successfully');
				}
				redirect('categoryAll');
			}
		}
		$this->load->view('admin/product/category_add', $data);
	}

	//   sub category

	// public function subCategoryAll()
	// {
	// 	$data['sub_category'] = $this->CommonModel->getRowByIdInOrder('sub_category', "is_delete = '1'", 'sub_category_name', 'ASC');
	// 	$data['title'] = "All Sub Category";
	// 	$data['setting'] = $this->setting;
	// 	$this->load->view('admin/product/sub_category_all', $data);
	// }

	// public function subCategoryAdd()
	// {
	// 	$dID = $this->input->get('dID');
	// 	$id = $this->input->get('id');
	// 	extract($this->input->post());
	// 	$decrypt_id = decryptId($this->input->get('id'));

	// 	$get = $this->CommonModel->getSingleRowById('tbl_sub_category', "sub_category_id = '$decrypt_id'");
	// 	$data['sub_category_name'] = set_value('sub_category_name') == false ? @$get['sub_category_name'] : set_value('sub_category_name');
	// 	$data['category_id'] = set_value('category_id') == false ? @$get['category_id'] : set_value('category_id');
	// 	$data['sub_category_image'] = set_value('category_image2') == false ? @$get['sub_category_image'] : set_value('category_image2');
	// 	if (isset($id)) {
	// 		$data['title'] = 'Edit Sub Category';
	// 	} else {
	// 		$data['title'] = 'Add Sub Category';
	// 	}
	// 	$data['setting'] = $this->setting;
	// 	if (isset($dID)) {
	// 		$update = $this->CommonModel->updateRowById('sub_category', 'sub_category_id', decryptId($dID), array('is_delete' => '0'));
	// 		redirect('subCategoryAll');
	// 		exit;
	// 	}

	// 	if (count($_POST) > 0) {
	// 		$this->form_validation->set_rules('sub_category_name', 'sub category name', 'trim|required');
	// 		$this->form_validation->set_rules('category_id', 'category', 'required');
	// 		if ($this->form_validation->run()) {

	// 			$post['sub_category_name'] = $sub_category_name;
	// 			$post['category_id'] = $category_id;

	// 			if (!empty($_FILES['sub_category_image']['name'])) {
	// 				$picture = imageUploadWithRatio('sub_category_image', CATEGORY_IMAGE, 600, 400, $data['sub_category_image']);
	// 				$post['sub_category_image'] = $picture;
	// 			}

	// 			if (isset($id)) {
	// 				$update = $this->CommonModel->updateRowById('tbl_sub_category', 'sub_category_id', $decrypt_id, $post);
	// 				flashData('errors', 'Sub Category Update Successfully');
	// 			} else {
	// 				$insert = $this->CommonModel->insertRow('tbl_sub_category', $post);
	// 				flashData('errors', 'Sub Category Add Successfully');
	// 			}
	// 			redirect('subCategoryAll');
	// 		}
	// 	}
	// 	$this->load->view('admin/product/sub_category_add', $data);
	// }

	//  Product 
	public function productAll()
	{
		$dID = $this->input->get('dID');
		if (isset($dID)) {
			$update = $this->CommonModel->updateRowById('product', 'product_id', decryptId($dID), array('is_delete' => '0'));
			redirect('productAll');
			exit;
		}
		$select = "product.*, category.category_name";
		$join = [
			['category', 'category.category_id = product.category_id', 'LEFT'],
		];
		$get['all_product'] = $this->CommonModel->getRowWithMultiJoin($select, 'product', "product.is_delete = '1'", $join, 'product_name', 'DESC', 1);

		$get['title'] = 'All Product';
		$get['setting'] = $this->setting;
		$this->load->view('admin/product/product_all', $get);
	}


	// function getSubCategory()
	// {
	// 	$category_id = $this->input->post('category_id');
	// 	$data['type'] = 1;
	// 	$data['all_data'] = $this->CommonModel->getRowByIdInOrder('tbl_sub_category', "category_id = '$category_id' AND is_delete = '1'", 'sub_category_name', 'ASC');
	// 	$this->load->view('admin/product/sub_category_list', $data);
	// }

	// function getProductSubCategory()
	// {
	// 	$category_id = $this->input->post('category_id');
	// 	$data['all_data'] = $this->CommonModel->getRowByIdInOrder('tbl_sub_category', "category_id = '$category_id' AND is_delete = '1'", 'sub_category_name', 'ASC');
	// 	$data['type'] = 2;
	// 	$this->load->view('admin/product/sub_category_list', $data);
	// }

	public function productAdd()
	{
		$id = $this->input->get('id');

		if (isset($id)) {
			$data['title'] = 'Edit Product';
			$decrypt_id = decryptId($id);
			$getProduct = $this->CommonModel->getSingleRowById('product', "product_id = '$decrypt_id'");
			$data['image_all'] = $this->CommonModel->getRowById('product_image', "product_id", $decrypt_id);
			// $data['variant'] = $this->CommonModel->getRowById('product_variant', "product_id", $decrypt_id);
		} else {
			$data['title'] = 'Add Product';
			$getProduct = false;
		}
		$data['setting'] = $this->setting;
		$data['alldata'] = getAllRowInOrder('form_field', 'id', 'ASC');
		$data['product_name'] = set_value('product_name') == false ? @$getProduct['product_name'] : set_value('product_name');
		$data['slug_title'] = set_value('slug_title') == false ? @$getProduct['slug_title'] : set_value('slug_title');
		$data['category_id'] = set_value('category_id') == false ? @$getProduct['category_id'] : set_value('category_id');
		$data['fields'] = set_value('fields') == false ? @$getProduct['fields'] : set_value('fields');
		$data['short_description'] = set_value('short_description') == false ? @$getProduct['short_description'] : set_value('short_description');
		$data['description'] = set_value('description') == false ? @$getProduct['description'] : set_value('description');
		$data['specification'] = set_value('specification') == false ? @$getProduct['specification'] : set_value('specification');
		$data['about_item'] = set_value('about_item') == false ? @$getProduct['about_item'] : set_value('about_item');
		$data['shipping'] = set_value('shipping') == false ? @$getProduct['shipping'] : set_value('shipping');
		$data['tab_title'] = set_value('tab_title') == false ? @$getProduct['tab_title'] : set_value('tab_title');
		$data['meta_title'] = set_value('meta_title') == false ? @$getProduct['meta_title'] : set_value('meta_title');
		$data['meta_description'] = set_value('meta_description') == false ? @$getProduct['meta_description'] : set_value('meta_description');
		$data['meta_keywords'] = set_value('meta_keywords') == false ? @$getProduct['meta_keywords'] : set_value('meta_keywords');
		$data['market_price'] = set_value('market_price') == false ? @$getProduct['market_price'] : set_value('market_price');
		// $data['sale_price'] = set_value('sale_price') == false ? @$getProduct['sale_price'] : set_value('sale_price');
		// $data['quantity'] = set_value('quantity') == false ? @$getProduct['quantity'] : set_value('quantity');
		$data['quantity_type'] = set_value('quantity_type') == false ? @$getProduct['quantity_type'] : set_value('quantity_type');
		$data['product_type'] = set_value('product_type') == false ? @$getProduct['product_type'] : set_value('product_type');

		if (count($_POST) > 0) {
			// echo '<pre>';
			// print_r($_POST);
			// exit();
			extract($this->input->post());
			$post['product_name'] = $product_name;
			$post['slug_title'] = url_title($slug_title, 'dash', true);
			$post['category_id'] = $category_id;
			$post['short_description'] = $short_description;
			$post['description'] = $description;
			$post['specification'] = $specification;
			$post['about_item'] = $about_item;
			$post['product_type'] = $product_type;
			$post['shipping'] = $shipping;
			$post['meta_title'] = $meta_title;
			$post['meta_description'] = $meta_description;
			$post['meta_keywords'] = $meta_keywords;
			$post['tab_title'] = $tab_title;
			// $post['product_type'] = '1';
			$post['market_price'] = $market_price;
			if (isset($id)) {
				$filesCount = count($_FILES['image']['name']);
				if ($filesCount > 0) {
					for ($i = 0; $i < $filesCount; $i++) {
						$extension = pathinfo($_FILES["image"]["name"][$i], PATHINFO_EXTENSION);
						$newFilename = round(microtime(true) * 1000);
						$_FILES['files']['name'] = $newFilename . '.' . $extension;
						$_FILES['files']['type'] = $_FILES['image']['type'][$i];
						$_FILES['files']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
						$_FILES['files']['error'] = $_FILES['image']['error'][$i];
						$_FILES['files']['size'] = $_FILES['image']['size'][$i];
						$picture = imageUpload('files', PRODUCT_IMAGE);
						if ($picture) {
							$post2['image_path'] = $picture;
							$post2['product_id'] = $decrypt_id;
							$insert = $this->CommonModel->insertRow('product_image', $post2);
						}
					}
				}
				$update = $this->CommonModel->updateRowById('product', 'product_id', $decrypt_id, $post);
				if (!empty($fields) && !empty($types)) {
					// Delete existing fields for the product
					$this->db->delete('product_form_fields', ['product_name_id' => $decrypt_id]);

					// Insert new fields
					foreach ($fields as $index => $field) {
						$type = $types[$index];  // Get the corresponding type
						$post3['product_name_id'] = $decrypt_id;  // Use $decrypt_id as the product name ID
						$post3['form_fields'] = $field;
						$post3['field_type'] = $type;

						// Insert into product_form_fields table
						$this->CommonModel->insertRow('product_form_fields', $post3);
					}
				}

				flashData('errors', 'Produce update successfully');
			} else {
				$p_id = $this->CommonModel->insertRowReturnIdWithClean('product', $post);
				if ($p_id > 0) {
					$filesCount = count($_FILES['image']['name']);
					if ($filesCount > 0) {
						for ($i = 0; $i < $filesCount; $i++) {
							$extension = pathinfo($_FILES["image"]["name"][$i], PATHINFO_EXTENSION);
							$newFilename = round(microtime(true) * 1000);
							$_FILES['files']['name'] = $newFilename . '.' . $extension;
							$_FILES['files']['type'] = $_FILES['image']['type'][$i];
							$_FILES['files']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
							$_FILES['files']['error'] = $_FILES['image']['error'][$i];
							$_FILES['files']['size'] = $_FILES['image']['size'][$i];

							$picture = imageUpload('files', PRODUCT_IMAGE);
							if ($picture) {
								$post2['image_path'] = $picture;
								$post2['product_id'] = $p_id;
								$insert = $this->CommonModel->insertRow('product_image', $post2);
							}
						}
					}
					if (!empty($fields) && !empty($types)) {
						foreach ($fields as $index => $field) {
							$type = $types[$index];  // Get the corresponding type from the types array
							$post3['product_name_id'] = $p_id;
							$post3['form_fields'] = $field;
							$post3['field_type'] = $type;
							$insert = $this->CommonModel->insertRow('product_form_fields', $post3);
						}
					}

					flashData('errors', 'Produce add successfully');
				} else {
					flashData('errors', 'Product not add');
				}
			}
			redirect('productAll');
		}
		$this->load->view('admin/product/product_add', $data);
	}

	public function productImageD($id, $img)
	{
		$delete = $this->CommonModel->deleteRowById('product_image', "product_image_id = '" . decryptId($id) . "'");
		$filePath = PRODUCT_IMAGE . $img;
		if (file_exists($filePath)) {
			unlink($filePath);
		} else {
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_variant()
	{
		$delete = $this->CommonModel->deleteRowById('product_variant', "id = '" . $_POST['variant_id'] . "'");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function productDetails()
	{
		$id = $this->input->get('id');
		$decrypt_id = decryptId($id);
		$getProduct = $this->CommonModel->getSingleRowById('product', "product_id = '$decrypt_id'");
		$data['product_name'] = set_value('product_name') == false ? @$getProduct['product_name'] : set_value('product_name');
		$data['company_id'] = set_value('company_id') == false ? @$getProduct['company_id'] : set_value('company_id');
		$data['category_id'] = set_value('category_id') == false ? @$getProduct['category_id'] : set_value('category_id');
		// $data['sub_category_id'] = set_value('sub_category_id') == false ? @$getProduct['sub_category_id'] : set_value('sub_category_id');
		$data['product_type'] = set_value('product_type') == false ? @$getProduct['product_type'] : set_value('product_type');
		$data['description'] = set_value('description') == false ? @$getProduct['description'] : set_value('description');
		$data['product_type'] = set_value('product_type') == false ? @$getProduct['product_type'] : set_value('product_type');
		$data['market_price'] = set_value('market_price') == false ? @$getProduct['market_price'] : set_value('market_price');
		$data['sale_price'] = set_value('sale_price') == false ? @$getProduct['sale_price'] : set_value('sale_price');
		$data['quantity'] = set_value('quantity') == false ? @$getProduct['quantity'] : set_value('quantity');
		$data['quantity_type'] = set_value('quantity_type') == false ? @$getProduct['quantity_type'] : set_value('quantity_type');
		$data['image_all'] = $this->CommonModel->getRowById('product_image', "product_id", $decrypt_id);
		$data['title'] = 'Product Details';
		$data['setting'] = $this->setting;
		$this->load->view('admin/product/view_product_details', $data);
	}
}
