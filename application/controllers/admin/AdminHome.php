<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminHome extends CI_Controller
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
	public function dashboard()
	{

		$getRows['active_user'] = $this->CommonModel->getNumRows("user_registration", "user_status = '1'");
		$getRows['inactive_user'] = $this->CommonModel->getNumRows("user_registration", "user_status = '0'");
		$getRows['product_category'] = $this->CommonModel->getNumRows("category", "is_delete = '1'");
		// $getRows['product_sub_category'] = $this->CommonModel->getNumRows("sub_category", "is_delete = '1'");
		$getRows['total_product'] = $this->CommonModel->getNumRows("product", "is_delete = '1'");
		$getRows['recent_orders'] = $this->CommonModel->getNumRows("book_product", "booking_status = '0' AND (payment_mode = '1' OR payment_mode = '2' )");
		$getRows['accepted_orders'] = $this->CommonModel->getNumRows("book_product", "booking_status = '1' AND (payment_mode = '1' OR payment_mode = '2' )");
		$getRows['dispatch_orders'] = $this->CommonModel->getNumRows("book_product"	, "booking_status = '3' AND (payment_mode = '1' OR payment_mode = '2' )");
		$getRows['completed_orders'] = $this->CommonModel->getNumRows("book_product", "booking_status = '4' AND (payment_mode = '1' OR payment_mode = '2' )");
		$getRows['canceled_orders'] = $this->CommonModel->getNumRows("book_product", "booking_status = '2' AND (payment_mode = '1' OR payment_mode = '2' )");
		$getRows['title'] = "Home";
		$getRows['setting'] = $this->setting;
		$getRows['recentOrderList'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_status = '0' AND (payment_mode = '1' OR payment_mode = '2' )", 'create_date', 'DESC');
		$this->load->view('admin/index', $getRows);
	}
	public function contact_query()
	{
		$data['contact'] = $this->CommonModel->getRowByIdInOrder('contact_query', [], 'cid', 'DESC');
		$data['setting'] = $this->setting;
		$data['title'] = 'Contact ';
		if (isset($_GET['BdID'])) {
			$BdID = $this->input->get('BdID');
			if (decryptId($BdID) != '') {
				$delete = $this->CommonModel->deleteRowById('contact_query', array('cid' => decryptId($BdID)));
				redirect('contact_query');
				exit;
			}
		}
		$this->load->view('admin/contact', $data);
	}
	public function banner()
	{
		$get = $this->CommonModel->getSingleRowById('banner', "banner_id = '8'");
		$data['image_path'] = set_value('image_path') == false ? @$get['image_path'] : set_value('image_path');
		$data['all_banner'] = $this->CommonModel->getAllRowsInOrder('banner', 'create_date', 'DESC');
		$data['setting'] = $this->setting;
		if (count($_POST) > 0) {
			if (!empty($_FILES['image_path']['name'])) {
				$p = fullImage('image_path', BANNER_IMAGE, @$get['image_path']);
				$post['image_path'] = $p;
				$update = $this->CommonModel->updateRowById('banner', 'banner_id', 8, $post);
				flashData('errors', 'Banner Update Successfully');
			}
			redirect('banner');
		}
		$this->load->view('admin/banner', $data);
	}

	public function promoCode()
	{
		if (isset($_GET['promo'])) {
			$id = $this->input->get('promo');
		} else {
			$id = 0;
		}
		if (isset($_GET['dID'])) {
			$dID = $this->input->get('dID');
		} else {
			$dID = '';
		}
		$sId = decryptId($id);
		$getPlans = getRowById('promocode', 'promocode_id', $sId);
		$data['promocode'] = set_value('promocode') == false ? @$getPlans[0]['promocode'] : set_value('promocode');
		$data['expiry_date'] = set_value('expiry_date') == false ? @$getPlans[0]['expiry_date'] : set_value('expiry_date');
		$data['minimum_order'] = set_value('minimum_order') == false ? @$getPlans[0]['minimum_order'] : set_value('minimum_order');
		$data['amount'] = set_value('amount') == false ? @$getPlans[0]['amount'] : set_value('amount');

		if (decryptId($dID) != '') {
			$delete = $this->CommonModel->deleteRowById('promocode', array('promocode_id' => decryptId($dID)));
		}

		if (isset($id)) {
			$data['title'] = 'Promo code Edit';
		} else {
			$data['title'] = 'Promo code add';
		}
		$data['setting'] = $this->setting;
		if (count($_POST) > 0) {
			extract($this->input->post());
			$post['promocode'] = strtoupper($promocode);
			$post['amount'] = $amount;
			$post['minimum_order'] = $minimum_order;
			$post['expiry_date'] = date('Y-m-d', strtotime($expiry_date));

			if ($id != 0) {

				$post['update_date'] = setDateTime();
				$update = updateRowById('promocode', 'promocode_id', $sId, $post);

				if ($update) {
					flashData('errors', 'Promo code Update Successfully');
				} else {
					flashData('errors', 'Promo code Not Update. please try again');
				}
			} else {

				$post['create_date'] = setDateTime();
				$insert = $this->CommonModel->insertRowReturnId('promocode', $post);

				if ($insert) {
					flashData('errors', 'Promo code Add Successfully');
				} else {
					flashData('errors', 'Promo code Not Add');
				}
			}

			redirect('promoCode');
		} else {
			$data['setting'] = $this->setting;
			$data['title'] = 'Promo Code';
			$this->load->view('admin/user_promo_code', $data);
		}
	}

	public function setDeliveryCharges()
	{
		extract($this->input->post());
		$get = $this->CommonModel->getSingleRowById('delivery_charge', "delivery_charge_id = '1'");
		$data['min_amount'] = set_value('min_amount') == false ? @$get['min_amount'] : set_value('min_amount');
		$data['amount'] = set_value('amount') == false ? @$get['amount'] : set_value('amount');
		$data['setting'] = $this->setting;
		$data['title'] = 'Delivery Charge';
		if (count($_POST) > 0) {
			$this->form_validation->set_rules('min_amount', 'minimum amount', 'trim|required');
			$this->form_validation->set_rules('amount', 'amount', 'trim|required');
			if ($this->form_validation->run()) {
				$getC = $this->CommonModel->getAllRows('delivery_charge');
				$post['min_amount'] = $min_amount;
				$post['amount'] = $amount;
				if ($getC > 0) {
					$updateRow = updateRowById('delivery_charge', 'delivery_charge_id', '1', $post);
					if ($updateRow) {
						flashData('errors', 'Delivery Charges Update Successfully');
					} else {
						flashData('errors', 'Delivery Charges Not Add.');
					}
				} else {
					$insert = $this->CommonModel->insertRow('delivery_charge', $post);
					if ($insert) {
						flashData('errors', 'Delivery Charges Add Successfully');
					} else {
						flashData('errors', 'Delivery Charges Not Add.');
					}
				}
				redirect('setDeliveryCharges');
			}
		}
		$this->load->view('admin/delivery_charges', $data);
	}

	public function activeUser()
	{
		$data['setting'] = $this->setting;
		$data['title'] = "All Active Users";
		$data['all_data'] = $this->CommonModel->getRowByIdInOrder('user_registration', "verify_status = '1' AND user_status = '1'", 'create_date', 'desc');
		$data['is_register'] = 0;
		$this->load->view('admin/users/user_all', $data);
	}

	public function inactiveUser()
	{
		$data['setting'] = $this->setting;
		$data['title'] = "All Inactive Users";
		$data['all_data'] = $this->CommonModel->getRowByIdInOrder('user_registration', "verify_status = '1' AND user_status = '0'", 'create_date', 'desc');
		$data['is_register'] = 0;
		$this->load->view('admin/users/user_all', $data);
	}
	public function userAffiliateDetails($id)
	{

		$data['all_data'] = $this->CommonModel->getSingleRowById('user_registration', ["user_id" => decryptId($id)]);
		$data['affiliates_transaction'] = $this->CommonModel->runQuery("SELECT `tbl_affiliate_link`.`aid`,`tbl_book_item`.`affiliate_amt`,`tbl_book_item`.`affiliate_status`,`tbl_product`.`product_name`,`tbl_product`.`product_id`,`tbl_book_item`.`base_price`,`tbl_book_item`.`user_price`,`tbl_book_product`.`create_date` FROM `tbl_book_product` JOIN `tbl_book_item` ON `tbl_book_product`.`order_id` = `tbl_book_item`.`order_id` JOIN `tbl_product` ON `tbl_book_item`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_affiliate_link` ON `affiliate` = `tbl_affiliate_link`.`aid` AND `tbl_affiliate_link`.`user`=" . decryptId($id) . " WHERE `tbl_book_item`.`affiliate_status` = 'approved' ORDER BY `tbl_book_product`.`product_book_id` DESC;");
		$data['affiliateLinkList'] = $this->CommonModel->getRowByIdInOrder('affiliate_link', ['user' => decryptId($id)], 'create_date', 'desc');
		$data['affiliateCount'] = $this->CommonModel->getNumRows('affiliate_link', ['user' => decryptId($id)]);
		$data['total_points'] = $this->CommonModel->runQuery("SELECT SUM(`tbl_book_item`.`affiliate_amt`) as `points` FROM `tbl_book_product` JOIN `tbl_book_item` ON `tbl_book_product`.`order_id` = `tbl_book_item`.`order_id` JOIN `tbl_product` ON `tbl_book_item`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_affiliate_link` ON `affiliate` = `tbl_affiliate_link`.`aid` AND `tbl_affiliate_link`.`user`=" . decryptId($id) . " WHERE `tbl_book_item`.`affiliate_status` = 'approved' ORDER BY `tbl_book_product`.`product_book_id` DESC;");
		$data['total_debit'] = $this->CommonModel->getSumById('points_used', "book_product", ['booking_status' => '4', 'user_id' => decryptId($id)]);
		$data['setting'] = $this->setting;
		$data['title'] = "Affiliate info | " . $data['all_data']['name'];
		$this->load->view('admin/users/userAffiliateDetails', $data);
	}

	public function userStatus($user_id, $status)
	{
		if ($status == 1) {
			$post = array('user_status' => '0');
			$msg = 'User inactive successfully';
		} else {
			$post = array('user_status' => '1');
			$msg = 'User active successfully';
		}
		$update = $this->CommonModel->updateRowById('user_registration', 'user_id', decryptId($user_id), $post);
		if ($update) {
			flashData('errors', $msg);
		} else {
			flashData('errors', 'Something went wrong. Please try again');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function userDetails($id)
	{
		$data['setting'] = $this->setting;
		$data['title'] = "User Details";
		$data['all_data'] = $this->CommonModel->getSingleRowById('user_registration', "user_id = '" . decryptId($id) . "'");
		$this->load->view('admin/users/user_details', $data);
	}

	public function recentOrders()
	{
		$data['setting'] = $this->setting;
		$data['title'] = 'Recent Orders';
		$data['allOrders'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_status = '0' AND (payment_mode = '1' OR payment_mode = '2' )", 'create_date', 'DESC');
		$this->load->view('admin/orders', $data);
	}

	public function acceptOrder()
	{
		$estimated_time = $this->input->post('estimated_time');
		$estimated_date = $this->input->post('estimated_date');
		$id = $this->input->post('id');
		if ($estimated_time != '' and $id != '') {
			$update = $this->CommonModel->updateRowById('book_product', 'product_book_id', decryptId($id), array('booking_status' => '1', 'estimated_time' => $estimated_date . ' ' . date('h:i A', strtotime($estimated_time))));
			flashData('errors', 'Order accept successfully');
		} else {
			flashData('errors', 'Something went wrong.');
		}
		redirect('recentOrders');
	}

	public function cancelOrder()
	{
		$cancel_msg = $this->input->post('cancel_msg');
		$id = $this->input->post('id');
		if ($cancel_msg != '' and $id != '') {
			$update = $this->CommonModel->updateRowById('book_product', 'product_book_id', decryptId($id), array('booking_status' => '2', 'cancel_message' => $cancel_msg, 'cancel_by' => 'Admin', 'cancel_date' => date('d.m.Y')));
			flashData('errors', 'Order Cancel successfully');
		} else {
			flashData('errors', 'Something went wrong.');
		}
		redirect('recentOrders');
	}

	public function acceptedOrders()
	{
		$data['allOrders'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_status = '1' AND (payment_mode = '1' OR payment_mode = '2' )", 'create_date', 'DESC');
		$data['title'] = 'All Accepted Orders';
		$data['setting'] = $this->setting;
		$this->load->view('admin/orders', $data);
	}

	public function dispatchOrder($id, $type)
	{
		if ($type == '3') {
			$post['booking_status'] = '3';
			$message = "Order Dispatch successfully";
		} else {
			$post['booking_status'] = '4';
			$post['order_complete_date'] = setDateTime();
			$message = "Order Complete successfully";
		}
		$update = $this->CommonModel->updateRowById('book_product', 'product_book_id', decryptId($id), $post);
		$productorder = $this->CommonModel->getSingleRowById('book_product', ['product_book_id' => decryptId($id)]);
		$update_items = $this->CommonModel->updateRowById('tbl_book_item', 'order_id', $productorder['order_id'], ['affiliate_status' => 'approved']);
		flashData('errors', $message);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function dispatchOrders()
	{
		$data['allOrders'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_status = '3' AND (payment_mode = '1' OR payment_mode = '2' )", 'create_date', 'DESC');
		$data['title'] = 'All Dispatch Orders';
		$data['setting'] = $this->setting;
		$this->load->view('admin/orders', $data);
	}

	public function completedOrders()
	{
		$data['allOrders'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_status = '4' AND (payment_mode = '1' OR payment_mode = '2' )", 'create_date', 'DESC');
		$data['title'] = 'All Completed Orders';
		$data['setting'] = $this->setting;
		$this->load->view('admin/orders', $data);
	}

	public function cancelOrders()
	{
		$data['allOrders'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_status = '2' AND (payment_mode = '1' OR payment_mode = '2')", 'create_date', 'DESC');
		$data['title'] = 'All Cancel Orders';
		$data['setting'] = $this->setting;
		$this->load->view('admin/orders', $data);
	}

	public function allOrders()
	{
		$date = $this->input->get('date');
		if ($date != "") {
			$data['allOrders'] = $this->CommonModel->getRowByIdInOrder('book_product', "booking_date = '" . date('Y-m-d', strtotime($date)) . "'", 'create_date', 'DESC');
		} else {
			$data['allOrders'] = false;
		}
		$data['title'] = 'All Orders';
		$data['setting'] = $this->setting;
		$this->load->view('admin/all_orders', $data);
	}
	public function shiprocket($id)
	{
		$data['favicon'] = base_url() . 'assets/images/favicon.png';
		$data['title'] = "Shiprocket Status";
		$data['setting'] = $this->setting;
		$data['checkout'] = $this->CommonModel->getSingleRowById('book_product', ['product_book_id' => $id]);
		$data['checkoutProduct'] = $this->CommonModel->getRowById('book_item', 'order_id', $data['checkout']['order_id']);
		if (count($_POST) > 0) {
			$post = $this->input->post();
			$token = generateToken();
			$ship_product = array();
			if (!empty($data['checkoutProduct'])) {
				foreach ($data['checkoutProduct'] as $row) {
					$product = $this->CommonModel->getSingleRowById('product', ['product_id' => $row['product_id']]);
					$prod = array(
						"name" => $product['product_name'],
						"sku" => $product['product_id'],
						"units" => (int) $row['no_of_items'],
						"selling_price" => (int) $row['booking_price'],
						"discount" => "",
						"tax" => "",
						"hsn" => ""
					);
					array_push($ship_product, $prod);
				}
			}
			// step 2 - create order
			$shiprocket = createOrder($id, setDateOnly(), $data['checkout']['name'], $data['checkout']['address'], $data['checkout']['city'], $data['checkout']['postal_code'], $data['checkout']['state'], 'India', $data['checkout']['email'], $data['checkout']['contact_no'], (($data['checkout']['payment_mode'] == '0') ? 'COD' : 'Prepaid'), $data['checkout']['final_amount'], $post['length'], $post['breadth'], $post['height'], $post['weight'], ($ship_product), $token);
			$sh = json_decode($shiprocket);
			print_r($sh);
			exit();
			if ($sh->shipment_id != '') {
				$this->CommonModel->updateRowById('book_product', 'product_book_id', $id, array('status' => '1', 'shipment_id' => $sh->shipment_id));
				$this->session->set_userdata('msg', '<div class="alert alert-danger">Shipment ID is generated and is been saved in shiprocket with id no. ' . $sh->shipment_id . '</div>');
			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-danger">Shipment Id is not created , kindly refer SHiprocket panel for this query.</div>');
			}
			// => step 3 - get recommended courier company
			// $shipping = shipping_charges('123401', $data['checkout']['pincode'], $data['checkout']['weight'], '0', $token, '0');
			// $arr = json_decode($shipping);

			// print_r($arr);
			// if ($arr->status_code != '') {
			//     $arrs = [];
			// } else {
			//     foreach ($arr->data->available_courier_companies as $company) {
			//         if ($company->courier_company_id == $arr->data->recommended_courier_company_id) {
			//             $arrs = array('rate' => $company->rate, 'courier_id' => $company->courier_company_id);
			//         }
			//     }
			// }

			// => assign awb(air way bill)
			// $awb = generateAwb_ship($sh->shipment_id, (($arrs['courier_id'] != '') ? $arrs['courier_id'] : $data['checkout']['courier_id']), $token);
			// $awb_data = json_decode($awb);

			// $post['shiprocket_order_id'] = $sh->order_id;
			// $post['shipment_id'] = $sh->shipment_id;

			// if ($awb_data->awb_assign_status == 1) {
			//     $post['awb_code'] = $awb_data->response->data->awb_code;
			//     $post['awb_assign_status'] = $awb_data->awb_assign_status;
			//     $post['awb_pickup'] = $awb_data->response->data->pickup_scheduled_date;
			//     $post['awb_response'] = $awb;
			//     $post['order_response'] = $shiprocket;
			//     $post['status'] = '5';
			// 	echo 'aws';
			// 	print_r($post);
			//     $insert = $this->CommonModel->updateRowById('book_product', 'product_book_id', $id, $post);
			//     if ($insert) {
			//         $this->session->set_userdata('msg', '<div class="alert alert-success">Order is ready  for shipment.Pickup is scheduled on ' . $awb_data->response->data->pickup_scheduled_date . ' by ' . $awb_data->response->data->courier_name . '</div>');
			//         // redirect(base_url('shiprocket_track/' . $id));
			//     } else {
			//         $this->session->set_userdata('msg', '<div class="alert alert-danger">Order is now Initiated via shiprocket. Contact Shiprocket for any assistance. </div>');
			//         // redirect(base_url('shiprocket/' . $id));
			//     }
			// } else {
			// 	echo 'non aws';
			// 	print_r($post);
			//     $insert = $this->CommonModel->updateRowById('book_product', 'product_book_id', $id, $post);
			//     if ($awb_data->message != '') {
			//         $this->session->set_userdata('msg', '<div class="alert alert-danger">' . $awb_data->message . '</div>');
			//     } else {

			//         if ($awb_data->response->data->awb_assign_error != '') {
			//             // echo $awb_data->response->data->awb_assign_error;
			//             $this->session->set_userdata('msg', '<div class="alert alert-danger">' . $awb_data->response->data->awb_assign_error . '</div>');
			//         } else {
			//             $this->session->set_userdata('msg', '<div class="alert alert-danger">AWB Not generated , kindly refer SHiprocket panel for this query.</div>');
			//         }
			//     }
			//     // exit();
			//     // redirect(base_url('shiprocket/' . $id));
			// }
			// print_r($_SESSION);
			// exit;
		} else {
		}
		$this->load->view('admin/shiprocket_order', $data);
	}
	public function categoryFeatured($id, $featured)
	{

		$categoryData = ['featured' => $featured];
		$update = $this->CommonModel->updateRowById('category', 'category_id', decryptId($id), $categoryData);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function setting()
	{
		$data['setting_data'] = $this->CommonModel->getAllRowsInOrder('settings', 'id', 'DESC');
		$data['title'] = 'Setting info';
		$data['setting'] = $this->setting;
		if (count($_POST) > 0) {
			$post = $this->input->post();

			if ($post['value_type'] == 'file') {
				$post['content_value'] = fullImage('record_value', 'upload/setting');
				$post['content_value'] = 'upload/setting/' . $post['content_value'];
			} else {
				$post['content_value'] = $post['record_value'];
			}
			$id = $post['record'];
			unset($post['record']);
			unset($post['record_value']);
			$update = $this->CommonModel->updateRowById('settings', 'id', $id, $post);
			flashData('errors', 'Banner Update Successfully');
			redirect('setting');
		}
		$this->load->view('admin/settings', $data);
	}
	public function policy()
	{
		$data['all_data'] = $this->CommonModel->getRowByIdInOrder('policy', [], 'create_date', 'DESC');
		$data['title'] = 'All Policy';
		$data['setting'] = $this->setting;
		$this->load->view('admin/policy', $data);
	}
	public function policyedit($id)
	{
		// 		$id = $this->input->get('id');
		$decrypt_id = decryptId($id);

		if (isset($id)) {
			$data['title'] = 'Edit Policy';
			$getProduct = $this->CommonModel->getSingleRowById('policy', "ppid = '$decrypt_id'");
		} else {
			$data['title'] = 'Add Policy';
			$getProduct = false;
		}
		$data['setting'] = $this->setting;
		$data['particulars'] = set_value('particulars') == false ? @$getProduct['particulars'] : set_value('particulars');
		$data['title_policy'] = set_value('title_policy') == false ? @$getProduct['title_policy'] : set_value('title_policy');

		if (count($_POST) > 0) {
			$post = ($this->input->post());
			if (isset($id)) {
				$update = $this->CommonModel->updateRowById('policy', 'ppid', $decrypt_id, $post);
				flashData('errors', 'Policy update successfully');
			}
			// 			else {
			// 				$p_id = $this->CommonModel->insertRowReturnIdWithClean('policy', $post);
			// 			}
			redirect('policy');
		}
		$this->load->view('admin/policyedit', $data);
	}
	public function productReview()
	{
		$data['title'] = "Product review";
		$data['setting'] = $this->setting;
		$data['all_data'] = $this->CommonModel->getRowByIdInOrder('product_review', [], 'create_date', 'desc');
		$data['is_register'] = 0;
		$this->load->view('admin/review', $data);
	}

	public function subscribers()
	{
		$data['title'] = "Newsletter Subscribers";
		$data['setting'] = $this->setting;
		$data['all_data'] = $this->CommonModel->getRowByIdInOrder('subscribe', [], 'id', 'desc');
		$this->load->view('admin/subscribers', $data);
	}

	public function reviewStatus($user_id, $status)
	{
		if ($status == 1) {
			$post = array('status' => 'accepted');
			$msg = 'User inactive successfully';
		} else {
			$post = array('status' => 'rejected');
			$msg = 'User active successfully';
		}
		$update = $this->CommonModel->updateRowById('product_review', 'rid', decryptId($user_id), $post);
		if ($update) {
			flashData('errors', $msg);
		} else {
			flashData('errors', 'Something went wrong. Please try again');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function blogAll()
	{
		$dID = $this->input->get('dID');
		if (isset($dID)) {
			$update = $this->CommonModel->deleteRowById('blogs', ['blog_id' => decryptId($dID)]);
			redirect('blogAll');
			exit;
		}
		$get['all_blogs'] = $this->CommonModel->getRowByIdInOrder('blogs', [], 'blog_id', 'DESC');
		$get['title'] = 'All blogs';
		$get['setting'] = $this->setting;
		$this->load->view('admin/blogs/blogs_all', $get);
	}
	public function blogAdd()
	{
		$id = $this->input->get('id');
		if (isset($id)) {
			$data['title'] = 'Edit blogs';
			$decrypt_id = decryptId($id);
			$getblogs = $this->CommonModel->getSingleRowById('blogs', "blog_id = '$decrypt_id'");
		} else {
			$data['title'] = 'Add blogs';
			$getblogs = false;
		}
		$data['setting'] = $this->setting;
		$data['title'] = set_value('title') == false ? @$getblogs['title'] : set_value('title');
		$data['content'] = set_value('content') == false ? @$getblogs['content'] : set_value('content');
		$data['tags'] = set_value('tags') == false ? @$getblogs['tags'] : set_value('tags');
		$data['picture'] = set_value('picture') == false ? @$getblogs['picture'] : set_value('picture');

		if (count($_POST) > 0) {
			extract($this->input->post());
			$post['title'] = $title;
			$post['tags'] = $tags;
			$post['content'] = $content;
			$post['slug_title'] = url_title($title, '-', true);
			if ($_FILES['image']['name'] != '') {
				$post['picture'] = imageUploadWithRatio('image', 'upload/blog/', 600, 400, "");
			}
			if (isset($id)) {
				$update = $this->CommonModel->updateRowById('blogs', 'blog_id', $decrypt_id, $post);
				flashData('errors', 'Produce update successfully');
			} else {
				$p_id = $this->CommonModel->insertRowReturnIdWithClean('blogs', $post);
				flashData('errors', 'blogs   added');
			}
			redirect('blogAll');
		}
		$this->load->view('admin/blogs/blogs_add', $data);
	}

	public function addFaqs()
	{
		if (isset($_GET['faq'])) {
			$id = $this->input->get('faq');
		} else {
			$id = 0;
		}
		if (isset($_GET['dID'])) {
			$dID = $this->input->get('dID');
		} else {
			$dID = '';
		}
		$sId = decryptId($id);
		$getPlans = getRowById('faqs', 'fid', $sId);
		$data['question'] = set_value('question') == false ? @$getPlans[0]['question'] : set_value('question');
		$data['answer'] = set_value('answer') == false ? @$getPlans[0]['answer'] : set_value('answer');
		if (decryptId($dID) != '') {
			$delete = $this->CommonModel->deleteRowById('faqs', array('fid' => decryptId($dID)));
			redirect(base_url('addFaqs'));
		}
		if (isset($id)) {
			$data['title'] = 'FAQ Edit';
		} else {
			$data['title'] = 'FAQ\'s';
		}
		if (count($_POST) > 0) {
			extract($this->input->post());
			$post['question'] = $question;
			$post['answer'] = $answer;
			if ($id != 0) {
				$post['update_date'] = setDateTime();
				$update = updateRowById('faqs', 'fid', $sId, $post);

				if ($update) {
					flashData('errors', 'FAQ Update Successfully');
				} else {
					flashData('errors', 'Promo code Not Update. please try again');
				}
			} else {
				$post['create_date'] = setDateTime();
				$insert = $this->CommonModel->insertRowReturnId('faqs', $post);
				if ($insert) {
					flashData('errors', 'FAQ Add Successfully');
				} else {
					flashData('errors', 'FAQ Not Add');
				}
			}
			redirect('addFaqs');
		} else {
			$data['setting'] = $this->setting;
			$data['title'] = 'FAQ\'s';
			$this->load->view('admin/faqs', $data);
		}
	}
	public function product_fields()
	{
		if (isset($_GET['faq'])) {
			$id = $this->input->get('faq');
		} else {
			$id = 0;
		}
		if (isset($_GET['dID'])) {
			$dID = $this->input->get('dID');
		} else {
			$dID = '';
		}
		$sId = decryptId($id);
		$getPlans = getRowById('form_field', 'id', $sId);
		$data['question'] = set_value('question') == false ? @$getPlans[0]['question'] : set_value('question');
		$data['answer'] = set_value('answer') == false ? @$getPlans[0]['answer'] : set_value('answer');
		if (decryptId($dID) != '') {
			$delete = $this->CommonModel->deleteRowById('faqs', array('fid' => decryptId($dID)));
			redirect(base_url('addFaqs'));
		}
		if (isset($id)) {
			$data['title'] = 'Form Field Edit';
		} else {
			$data['title'] = 'Form Field Add';
		}
		if (count($_POST) > 0) {
			extract($this->input->post());
			$post['product_name'] = $product_name;
			$post['fields'] = $fields;
			if ($id != 0) {
				$post['update_date'] = setDateTime();
				$update = updateRowById('faqs', 'fid', $sId, $post);

				if ($update) {
					flashData('errors', 'FAQ Update Successfully');
				} else {
					flashData('errors', 'Promo code Not Update. please try again');
				}
			} else {
				$post['create_date'] = setDateTime();
				$insert = $this->CommonModel->insertRowReturnId('faqs', $post);
				if ($insert) {
					flashData('errors', 'FAQ Add Successfully');
				} else {
					flashData('errors', 'FAQ Not Add');
				}
			}
			redirect('addFaqs');
		} else {
			$data['setting'] = $this->setting;
			$data['title'] = 'Product Form Fields';
			$this->load->view('admin/product_fields', $data);
		}
	}
}
