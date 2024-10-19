<?php
class UserHome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->profile = $this->CommonModel->getRowById('user_registration', 'user_id', sessionId('login_user_id'));
        $this->setting = $this->CommonModel->getAllRows('settings');
    }
    public function index()
    {
        $data['banner'] = $this->CommonModel->getAllRowsInOrder('banner', 'banner_id', 'desc');
        $data['category'] = $this->CommonModel->getRowByOrderWithLimit('category', ['is_delete' => '1'], 'category_id', 'ASC', '6');
        $data['product'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '10');
        $data['productdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['fproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1', 'gender' => 'f'), 'product_id', 'DESC', '20');
        $data['uproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1', 'gender' => 'u'), 'product_id', 'DESC', '20');
        $data['featurepro'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1', 'product_type' => '2'), 'product_id', 'DESC', '20');
        $data['cate'] = $this->CommonModel->getRowByOrderWithLimit('category', ['category_type' => '0'], 'category_id', 'ASC', '25');
        $data['setting'] = $this->setting;
        // echo '<pre>';
        // print_r($data['setting']);
        // exit();
        $data['title'] = '';
        $data['product_latest'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '2');
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['all_blogs'] = $this->CommonModel->getRowByIdInOrder('blogs', [], 'blog_id', 'DESC');
        $data['profile'] = $this->profile;
        $this->load->view('home', $data);
    }
    public function delete_wishproduct()
    {
        $product_id = $this->input->post('pid');
        $data = array(
            'rowid' => $product_id,
            'qty' => 0
        );
        $this->cart->update($data);
    }
    public function product()
    {
        $cateSlugName = $this->uri->segment(2);
        $search = $this->input->get('searchbox');
        // $cateid = $this->input->get('category');
        $getCateQuery = $this->CommonModel->getSingleRowById('category', ['slug_title' => $cateSlugName]);
        if ($getCateQuery) {
            $cateid = encryptId($getCateQuery['category_id']);
        }
        if (isset($cateid)) {
            $data['cateid'] = decryptId($cateid);
            $data['category_info'] = $this->CommonModel->getSingleRowById('category', ['category_id' => $data['cateid']]);
        } else {
            $data['cateid'] = '';
            $data['category_info'] = false;
        }
        // $data['sidecategory'] = $this->CommonModel->getAllRowsInOrder('category', 'category_name', 'ASC');
        $data['sidecategory'] = $this->CommonModel->getRowByOrderWithLimit('category', array('is_delete' => '1'), 'category_id', 'DESC', '20');
        if ($search != '') {
            $data['search'] = $search;
        } else {
            $data['search'] = '';
        }
        $subcate = $this->input->get('subcate');
        if (isset($subcate)) {
            $data['subcateid'] = decryptId($subcate);
        } else {
            $data['subcateid'] = '';
        }
        $data['title'] = ' Our product ';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('product', $data);
    }
    // public function filterData()
    // {
    //     $price = isset($_POST['price']) ? $_POST['price'] : '';
    //     $search = isset($_POST['search']) ? $_POST['search'] : '';
    //     $category = isset($_POST['category']) ? $_POST['category'] : '';
    //     $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    //     $query = "SELECT tbl_product.*, tbl_sub_category.sub_category_name, tbl_product_variant.price 
    //               FROM `tbl_product` 
    //               LEFT JOIN `tbl_sub_category` ON tbl_product.sub_category_id = tbl_sub_category.sub_category_id
    //               LEFT JOIN `tbl_product_variant` ON tbl_product.product_id = tbl_product_variant.product_id
    //               WHERE tbl_product.`status` = '1' AND tbl_product.`is_delete` = '1'";
    //     if ($search != '') {
    //         $query .= " AND (tbl_product.`product_name` LIKE '%" . trim($search) . "%' 
    //                OR FIND_IN_SET('" . trim($search) . "', tbl_product.`meta_keywords`) 
    //                OR tbl_product.`description` LIKE '%" . trim($search) . "%' 
    //                OR tbl_product.`meta_title` LIKE '%" . trim($search) . "%' 
    //                OR tbl_product.`meta_keywords` LIKE '%" . trim($search) . "%' 
    //                OR tbl_product.`meta_description` LIKE '%" . trim($search) . "%' 
    //                OR tbl_sub_category.`sub_category_name` LIKE '%" . trim($search) . "%' )";
    //     }
    //     if ($category != '') {
    //         $query .= " AND tbl_product.category_id = $category";
    //     }
    //     if ($gender != '') {
    //         $query .= " AND tbl_product.gender = '" . $gender . "'";
    //     }
    //     if ($price !== '') {
    //         if ($price == 0) {
    //             $query .= " GROUP BY tbl_product.product_id ORDER BY `tbl_product_variant`.`price` ASC";
    //         } elseif ($price == 1) {
    //             $query .= " GROUP BY tbl_product.product_id ORDER BY `tbl_product_variant`.`price` DESC";
    //         }
    //     } else {
    //         $query .= " GROUP BY tbl_product.product_id";
    //     }
    //     $data['all_data'] = $this->CommonModel->runQuery($query);
    //     $data['setting'] = $this->setting;
    //     $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
    //     $data['profile'] = $this->profile;
    //     $this->load->view('get_product', $data);
    // }
    public function details($id)
    {
        $data['details'] = $this->CommonModel->getRowById('product', "category_id", $id)[0];
        if (empty($data['details'])) {
            redirect(base_url());
            return;
        }
        $prod_id = $data['details']['product_id'];
        $data['products_image'] = $this->CommonModel->getRowById('product_image', 'product_id', $prod_id);
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['form_fields'] = $this->CommonModel->getRowById('product_form_fields', 'product_name_id', $prod_id);
        $data['getFaqs'] = $this->CommonModel->getAllRowsInOrder('faqs', 'fid', 'ASC');
        $data['category'] = $this->CommonModel->getRowByOrderWithLimit('category', ['is_delete' => '1'], 'category_id', 'ASC', '6');
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['title'] = "Product Details";
        $this->load->view('product-details', $data);
    }
    public function contact()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModel->insertRowReturnId('contact_query', $post);
            if ($insert) {
                // setsessionData('msg_status', 'success');
                $this->session->set_userdata('msg', '<div style="background: #0c840c; color: white; padding: 18px;">Your query is successfully submitted. We will contact you as soon as possible.</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing a technical error, please try again later or get in touch via the Email ID provided in the contact section.</div>');
            }
        }
        $data['title'] = 'Contact Us ';
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['setting'] = $this->setting;
        $data['category'] = $this->CommonModel->getRowByOrderWithLimit('category', ['is_delete' => '1'], 'category_id', 'ASC', '6');
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('contact', $data);
    }

    public function register()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('profile'));
        }
        $data['title'] = 'Register';
        $data['state_list'] = $this->CommonModel->getAllRows('state');
        if (count($_POST) > 0) {
            $mobilecount = $this->CommonModel->getRowByIdInOrder('user_registration', array('contact_no' => $this->input->post('contact_no')), 'contact_no', 'DESC');
            $emailcount = $this->CommonModel->getRowByIdInOrder('user_registration', array('email_id' => $this->input->post('email_id')), 'email_id', 'DESC');
            // echo count($count);
            if ($emailcount != '' && count($emailcount) > 0) {
                $this->session->set_userdata('msg', '<h6 class="alert alert-warning">You have already registered with this email id.</h6>');
            } elseif ($mobilecount != '' && count($mobilecount) > 0) {
                $this->session->set_userdata('msg', '<h6 class="alert alert-warning">You have already registered with this  contact no.</h6>');
            } else {
                $post = $this->input->post();
                if ($post['password'] == $post['confirm_password']) {
                    unset($post['confirm_password']);
                    $ins = $this->CommonModel->insertRowReturnId('user_registration', $post);
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">You are successfully registered. Please login to continue.</h6>');
                    redirect(base_url() . '/login');
                    exit();
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Password and confirm password doesnt match.</h6>');
                    redirect(base_url() . '/register');
                    exit();
                }
            }
        }
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('register', $data);
    }
    public function checkaccount()
    {
        $msg = [];
        // $count = $this->CommonModel->getNumRows('user_registration', array('contact_no' => $_POST['contact_no']));
        // if ($count > 0) {
        //     $msg[] = 'Contact no. already registered';
        // } else {
        $counts = $this->CommonModel->getNumRows('user_registration', array('email_id' => $_POST['email']));
        if ($counts > 0) {
            $msg[] = 'Email Id already registered';
        } else {
        }
        // }
        echo implode(', ', $msg);
    }
    public function verify_registration()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('profile'));
        }
        $data['title'] = 'Register';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('check-otp', $data);
    }
    public function check_verification()
    {
        $responce = [];
        $otp = $this->input->post('otp');
        if ($this->session->userdata('user_otp') == $otp) {
            $ins = $this->CommonModel->insertRow('user_registration', array('name' => sessionId('user_name'), 'email_id' => sessionId('user_emailid'), 'contact_no' => sessionId('user_contact'), 'address' => sessionId('user_address'), 'area' => sessionId('user_area'), 'postal_code' => sessionId('user_postal_code'), 'state' => sessionId('user_state'), 'city' => sessionId('user_city')));
            $login_data = $this->CommonModel->getSingleRowById('user_registration', array('contact_no' => sessionId('user_contact')));
            $session = $this->session->set_userdata(array('login_user_id' => $login_data['user_id'], 'login_user_name' => $login_data['name'], 'login_user_emailid' => $login_data['email_id'], 'login_user_contact' => $login_data['contact_no']));
            $responce['reg_msg'] = 'OTP verified';
            if (count($this->cart->contents()) > 0) {
                $responce['status'] = '3';
            } else {
                $responce['status'] = '1';
            }
        } else {
            // $responce['reg_msg'] = 'Wrong OTP';
            $responce['reg_msg'] = 'Wrong OTP' . $otp;
            $responce['status'] = '2';
        }
        echo json_encode($responce);
    }
    public function login()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('profile'));
        }
        $data['category'] = $this->CommonModel->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['title'] = 'Login';
        $data['subtitle'] = 'Welcome Please Continue!';
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "user_registration";
            $login_data = $this->CommonModel->getSingleRowById($table, ['email_id' => $uname]);
            // $login_data = $this->CommonModel->getRowByOr($table, array('email_id' => $uname), array('contact_no' => $uname));
            if (!empty($login_data)) {
                if ($login_data['password'] == $password) {
                    $session = $this->session->set_userdata(array('login_user_id' => $login_data['user_id'], 'login_user_name' => $login_data['name'], 'login_user_emailid' => $login_data['email_id'], 'login_user_contact' => $login_data['contact_no']));
                    if (count($this->cart->contents()) > 0) {
                        redirect(base_url('?tag=checkout'));
                    } else {
                        if ($this->session->has_userdata('redirect_url')) {
                            $url = $this->session->userdata('redirect_url');
                            $this->session->unset_userdata('redirect_url');
                            redirect($url);
                        } else {
                            redirect(base_url('profile'));
                        }
                    }
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Wrong Password.</h6>');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('msg', '<h6 class="alert alert-warning">Username or Password not match.</h6>');
                redirect(base_url('login'));
            }
        }
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('login', $data);
    }
    public function orders()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect();
        }
        $data['login_user'] = $this->session->userdata();
        $data['orderDetails'] = $this->CommonModel->getRowByIdInOrder('book_product', array('user_id' => sessionId('login_user_id')), 'product_book_id', 'DESC');
        $data['cancelOrderDetails'] = $this->CommonModel->getRowByIdInOrder('book_product', 'user_id = ' . sessionId('login_user_id') . ' AND booking_status = "2" ', 'product_book_id', 'DESC');
        $data['checkoutnum'] = $this->CommonModel->getNumRows('book_product', array('user_id' => sessionId('login_user_id')));
        $data['title'] = ' Order history';
        $data['subtitle'] = 'My Order History ';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('order-history', $data);
    }
    public function order_invoice($oid)
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect();
        }
        $data['login_user'] = $this->session->userdata();
        $data['orderDetails'] = $this->CommonModel->getSingleRowById('book_product', array('order_id' => $oid));
        // echo '<pre>';
        // print_r($data['orderDetails']);
        // exit();
        $data['orderProduct'] = $this->CommonModel->getRowById('book_item', 'order_id', $data['orderDetails']['order_id']);
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('gst_mail', $data);
    }
    public function profile()
    {
        // echo '<pre>';
        // print_r($this->profile);
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url());
        }
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModel->getRowById('user_registration', 'user_id', sessionId('login_user_id'))[0];
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $savedata = $this->CommonModel->updateRowById('user_registration', 'user_id', sessionId('login_user_id'), $post);
            if ($savedata) {
                $this->session->set_flashdata('msg', 'Profile Updated Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_userdata('msg', 'Profile Updated Sucessfully ');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('profile'));
        } else {
            $data['title'] = 'Profile';
            $data['subtitle'] = 'My Profile ';
            $data['setting'] = $this->setting;
            $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
            $data['profile'] = $this->profile;
            $this->load->view('profile', $data);
        }
    }
    public function affiliates()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url());
        }
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModel->getSingleRowById('user_registration', ['user_id', sessionId('login_user_id')]);
        $data['title'] = 'Affiliates';
        $data['affiliates'] = $this->CommonModel->getRowByIdInOrder('affiliate_link', ['user' => sessionId('login_user_id')], 'create_date', 'desc');
        $data['affiliates_transaction'] = $this->CommonModel->runQuery("SELECT `tbl_affiliate_link`.`aid`,`tbl_book_item`.`affiliate_amt`,`tbl_book_item`.`affiliate_status`,`tbl_product`.`product_name`,`tbl_product`.`product_id`,`tbl_book_item`.`base_price`,`tbl_book_product`.`create_date` FROM `tbl_book_product` JOIN `tbl_book_item` ON `tbl_book_product`.`order_id` = `tbl_book_item`.`order_id` JOIN `tbl_product` ON `tbl_book_item`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_affiliate_link` ON `affiliate` = `tbl_affiliate_link`.`aid` AND `tbl_affiliate_link`.`user`=" . sessionId('login_user_id') . " WHERE `tbl_book_item`.`affiliate_status` = 'approved' ORDER BY `tbl_book_product`.`product_book_id` DESC;");
        $data['total_points'] = $this->CommonModel->runQuery("SELECT SUM(`tbl_book_item`.`affiliate_amt`) as `points` FROM `tbl_book_product` JOIN `tbl_book_item` ON `tbl_book_product`.`order_id` = `tbl_book_item`.`order_id` JOIN `tbl_product` ON `tbl_book_item`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_affiliate_link` ON `affiliate` = `tbl_affiliate_link`.`aid` AND `tbl_affiliate_link`.`user`=" . sessionId('login_user_id') . " WHERE `tbl_book_item`.`affiliate_status` = 'approved' ORDER BY `tbl_book_product`.`product_book_id` DESC;");
        $data['total_debit'] = $this->CommonModel->getSumById('points_used', "book_product", ['booking_status' => '4']);
        $data['subtitle'] = 'My Affiliates Details ';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('affiliates', $data);
    }
    public function cancelorder()
    {
        $id = $this->input->post('id');
        $upd = $this->CommonModel->updateRowById('checkout', 'id', $id, array('status' => '2'));
        if ($upd) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function returnorder()
    {
        $id = $this->input->post('id');
        $upd = $this->CommonModel->updateRowById('checkout', 'id', $id, array('status' => '5'));
        if ($upd) {
            return '0';
        } else {
            return '1';
        }
    }
    public function checkPromo()
    {
        $promocode = $this->input->post('promocode');
        // echo '<pre>';
        // print_r($promocode);
        // exit();
        echo json_encode($this->CommonModel->getRowById('promocode', 'promocode', $promocode));
    }
    public function invoice($id)
    {
        $data['all_data'] = $this->CommonModal->getSingleRowById('invoice', "invoice_id = '" . decryptId($id) . "'");
        $data['item_data'] = $this->CommonModal->getRowByMoreId('invoice_items', "invoice_id = '" . decryptId($id) . "'");
        $data['profile'] = $this->profile;
        $this->load->view('invoice_view', $data);
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', true);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        // 'compress' => 1 or 0 – enable content stream compression.
        // 'Attachment' => 1 = download or 0 = preview
        $this->dompdf->stream(date('d-m-Y'), array("Attachment" => 0));
        // $filePath = "./upload/122.pdf";
        // $output = $this->dompdf->output();
        // file_put_contents($filePath, $output);
    }
    public function logout()
    {
        $this->session->unset_userdata('login_user_id');
        $this->session->unset_userdata('login_user_name');
        $this->session->unset_userdata('login_user_emailid');
        $this->session->unset_userdata('login_user_contact');
        $this->session->unset_userdata('login_user_type');
        redirect(base_url());
    }
    public function checkout()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('login');
        }
        $data['login'] = $this->CommonModel->getRowById('user_registration', 'user_id', sessionId('login_user_id'));
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['state_list'] = $this->CommonModel->getAllRows('state');
        $data['promocode'] = $this->CommonModel->getAllRows('promocode');
        $data['delivery'] = $this->CommonModel->getAllRows('delivery_charge')[0];
        $data['title'] = 'Checkout';
        $is_payment = 0;
        if (count($_POST) > 0) {
            if ($this->input->post('final_amount') > 0) {
                $ga = 0;
                $productInfo = [];
                $postdata = $this->input->post();
                $user_id = $this->input->post('user_id');
                $state = $this->input->post('state');
                $city = $this->input->post('city');
                $postal_code = $this->input->post('postal_code');
                $address = $this->input->post('address');
                $data = array('state' => $state, 'city' => $city, 'postal_code' => $postal_code, 'address' => $address);
                // $this->CommonModel->updateRowById('user_registration', 'user_id', $user_id, $data);
                $orderId = orderIdGenerateUser();
                $postdata['order_id'] = $orderId;
                $postdata['points_used'] = ((isset($postdata['paypoints'])) ? $postdata['paypoints'] : 0);
                $postdata['booking_date'] = setDateOnly();
                $postdata['same_as_billing'] = ((isset($_POST['same_as_billing'])) ? '1' : '0');
                $affiliate = $this->CommonModel->getSingleRowById('settings', ['id' => 1]);
                foreach ($this->cart->contents() as $items):
                    $subtotal = ($items['price'] * $items['qty']);
                    $mydata[] = array(
                        'create_date' => setDateTime(),
                        'order_id' => $orderId,
                        'no_of_items' => $items['qty'],
                        'base_price' => $items['base_price'],
                        'user_price' => $items['price'],
                        'booking_price' => $subtotal,
                        'product_id' => $items['id'],
                        'affiliate' => $items['affiliate'],
                        'affiliate_percentage' => $affiliate['content_value'],
                        'affiliate_amt' => ($subtotal * ($affiliate['content_value'] / 100))
                    );
                    $inv_product = array(
                        'create_date' => setDateTime(),
                        'order_id' => $orderId,
                        'product_img' => $items['image'],
                        'no_of_items' => $items['qty'],
                        'product_name' => clean($items['name']),
                        'product_price' => $items['price'],
                        'affiliate' => $items['affiliate'],
                        'affiliate_percentage' => $affiliate['content_value'],
                        'affiliate_amt' => ($subtotal * ($affiliate['content_value'] / 100))
                    );
                    $ga += $subtotal;
                    array_push($productInfo, $inv_product);
                endforeach;
                unset($postdata['paypoints']);
                $delivery = $this->CommonModel->getSingleRowById('tbl_delivery_charge', ['delivery_charge_id' => 1]);
                $postdata['total_item_amount'] = $ga;
                if ($ga < $delivery['min_amount']) {
                    $postdata['delivery_charges'] = $delivery['amount'];
                } else {
                    $postdata['delivery_charges'] = 0;
                }
                $promo = $this->CommonModel->getSingleRowById('promocode', ['promocode' => $postdata['promocode']]);
                if ($promo != '') {
                    if ($ga > $promo['minimum_order']) {
                        $postdata['promocode'] = $promo['promocode'];
                        $postdata['promocode_amount'] = $promo['amount'];
                        $postdata['promocode_status'] = 1;
                    } else {
                        unset($postdata['promocode']);
                        unset($postdata['promocode_amt']);
                    }
                } else {
                    unset($postdata['promocode']);
                    unset($postdata['promocode_amt']);
                }
                $post = $this->CommonModel->insertRowReturnId('book_product', $postdata);
                $invoice['orderlist'] = array('orderDate' => date('d-m-y'), 'order_id' => $postdata['order_id'], 'name' => $postdata['name'], 'number' => $postdata['contact_no'], 'email' => $postdata['email'], 'grand_total' => $ga);
                $invoice['order'] = $postdata;
                $invoice['products'] = $productInfo;
                $invoice['contact'] = $this->setting;
                $insert2 = $this->CommonModel->insertRowInBatch('book_item', $mydata);
                $amount = ($ga - $this->input->post('promocode_amount')) - $postdata['delivery_charges'];
                if ($post != '') {
                    $is_payment = 1;
                    if ($this->input->post('payment_mode') == '1') {
                        // mailmsg($postdata['email'], 'Order Confirm -' . $this->setting[9]['content_value'],  $this->load->view('invoice-mail-template', $invoice, true));
                        redirect(base_url('booking-status'));
                        exit();
                    } else {
                        if ($this->setting[33]['content_value'] == 1) {
                            $curl = curl_init();
                            $data = base64_encode(json_encode([
                                "merchantId" => $this->setting[34]['content_value'],
                                "merchantTransactionId" => $postdata['order_id'],
                                "merchantUserId" => "CAH" . $user_id,
                                "amount" => $amount * 100,
                                "redirectUrl" => base_url() . "payment_msg",
                                "redirectMode" => "POST",
                                "callbackUrl" => base_url() . "payment_msg",
                                "mobileNumber" => "9999999999",
                                "paymentInstrument" => [
                                    "type" => "PAY_PAGE"
                                ]
                            ]));
                            $request = hash('sha256', $data . '/pg/v1/pay' . $this->setting[35]['content_value']) . '###1';
                            curl_setopt_array($curl, [
                                CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => json_encode([
                                    'request' => $data
                                ]),
                                CURLOPT_HTTPHEADER => [
                                    "Content-Type: application/json",
                                    "X-VERIFY: {$request}",
                                    "accept: application/json"
                                ],
                            ]);
                            $response = curl_exec($curl);
                            $err = curl_error($curl);
                            curl_close($curl);
                            if ($err) {
                                echo "cURL Error #:" . $err;
                            } else {
                                $responces = json_decode($response, true);
                                if ($responces['success'] == true || $responces['success'] == 'true') {
                                    redirect($responces['data']['instrumentResponse']['redirectInfo']['url']);
                                    exit();
                                } else {
                                    $msg = '<h2><i class="fa fa-times-circle true-icon" aria-hidden="true"></i> Payment error !<br></h2>
                                        <div class="checkbox-form">
                                            <div class="row">
                                                <div class="col-md-12 thankyou-boxes">
                                                    <h3>Phone pay is been broken.We are working on it.</h3>
                                                    <p>Reason: ' . $responces['message'] . '</p>
                                                </div>
                                        </div>';
                                    $data['message'] = $msg;
                                    $data['profile'] = $this->profile;
                                    $this->load->view('payment_msg', $data);
                                    exit;
                                }
                            }
                        } else {
                            $msg = '<h2><i class="fa fa-times-circle true-icon" aria-hidden="true"></i> Payment error !<br></h2>
                                        <div class="checkbox-form">
                                            <div class="row">
                                                <div class="col-md-12 thankyou-boxes">
                                                    <h3>Payment gateway is broken.We are working on it.</h3>
                                                    <p>Reason: Not enabled from administrator </p>
                                                </div>
                                        </div>';
                            $data['message'] = $msg;
                            $data['setting'] = $this->setting;
                            $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
                            $data['title'] = 'Payment';
                            $data['profile'] = $this->profile;
                            $this->load->view('payment_msg', $data);
                            // exit;
                        }
                    }
                } else {
                    echo 'Check Form Data';
                }
            }
        }
        if ($is_payment == 0) {
            $data['profile'] = $this->profile;
            $this->load->view('checkout', $data);
        }
    }

    private function curl_handler($payment_id, $amount)
    {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = RAZOR_PAY_KEY;
        $key_secret = RAZOR_PAY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }
    public function callback()
    {
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $this->session->set_flashdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_flashdata('merchant_order_id', $this->input->post('merchant_order_id'));
            $this->session->set_flashdata('merchant_amount', $this->input->post('merchant_amount'));
            $this->session->set_flashdata('merchant_actual_amount', ($this->input->post('merchant_amount') / 100));
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_amount');
            $success = false;
            $error = '';
            try {
                $ch = $this->curl_handler($razorpay_payment_id, ($amount * 100));
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }
            // echo '<pre>';
            // print_r($result);
            // exit();
            if ($success === true) {
                if (!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                $updateData = array('razorpay_payment_id' => $this->input->post('razorpay_payment_id'), 'merchant_order_id' => $this->input->post('merchant_order_id'), 'merchant_amount' => $this->input->post('merchant_amount'));
                $this->CommonModal->updateRowById('checkout', 'order_id', $response_array['notes']['soolegal_order_id'], $updateData);
                // if (!$order_info['order_status_id']) {
                // redirect($this->input->post('merchant_surl_id'));
                // } else {
                redirect($this->input->post('merchant_surl_id'));
                // }
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }
    public function success()
    {
        if ($this->session->flashdata('razorpay_payment_id')) {
            $this->cart->destroy();
            $this->CommonModal->updateRowById('checkout', 'id', sessionId('checkoutid'), array('status' => '1', 'payment_status' => 'PAYMENT_SUCCESS', 'receipt_status' => '1'));
            $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
            $data['logo'] = 'assets/logo.png';
            $data['company'] = " Mielo food products private limited";
            $data['title'] = 'Payment Successfull';
            $msg = '';
            $msg .= ' <h2><i class="fa fa-check-circle-o true-icon" aria-hidden="true"></i> Thank You !</h2>
                                <div class="checkbox-form">
                                    <div class="row">
                                        <div class="col-md-12 thankyou-boxes">
                                            <h3>Your order is confirmed</h3>
                                            <p>You will receive an email when your order is ready.</p>
                                        </div>
                                       ';
            $msg .= '<div class="col-md-12 thankyou-boxes">Transaction ID: ' . $this->session->flashdata('razorpay_payment_id') . '</div>';
            $msg .= '  <div class="col-md-12 thankyou-boxes"> Order ID: ' . $this->session->flashdata('merchant_order_id') . '</div>';
            $msg .= ' <div class="col-md-12 thankyou-boxes">
                                            <h3>Order updates</h3>
                                            <p>You will get shipping and delivery updates by email.</p>
                                        </div>
                                        <div class="col-md-12 thankyou-boxes">
                                            <p>COD available for a cart value of Rs 500 and above</p>
                                        </div>
                             </div>';
            $data['message'] = $msg;
            // $mailmessage = checkoutmail(sessionId('login_user_name'));
            // send_email(sessionId('login_user_emailid'), 'Mielo food products private limited | Order Details', $mailmessage);
            // send_email('info@mielo.in', 'Mielo food products private limited | Order Details', $mailmessage);
            // sendWhatsapp('7089592767', $mailmessage);
            $this->load->view('payment_msg', $data);
        } else {
            redirect(base_url('orders'));
        }
    }
    public function failed()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        // $this->cart->destroy();
        // $this->cart->destroy();
        $data['logo'] = 'assets/logo.png';
        $data['company'] = " Mielo food products private limited";
        $data['title'] = 'Payment Failed ';
        $msg = '';
        $msg .= ' <h2 class="mt-5 p-5"><i class="fa fa-check-circle-o true-icon" aria-hidden="true"></i> Our Apologies!</h2>
                                <div class="checkbox-form">
                                    <div class="row">
                                        <div class="col-md-12 thankyou-boxes">
                                            <h3>Your transaction is on Proccess</h3>
                                            <p>We value your trust and confidence in us and sincerely appreciate you! Your commitment as a customer is much appreciated</p>
                                        </div>
                                      ';
        $msg .= '<div class="col-md-12 thankyou-boxes">Transaction ID: ' . $this->session->flashdata('razorpay_payment_id') . '</div>';
        $msg .= '  <div class="col-md-12 thankyou-boxes"> Order ID: ' . $this->session->flashdata('merchant_order_id') . '</div>';
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }
    public function fetch_affiliate()
    {
        $pointspercentage = $this->CommonModel->getSingleRowById('settings', ['id' => 2]);
        $total_points = $this->CommonModel->runQuery("SELECT SUM(`tbl_book_item`.`affiliate_amt`) as `points` FROM `tbl_book_product` JOIN `tbl_book_item` ON `tbl_book_product`.`order_id` = `tbl_book_item`.`order_id` JOIN `tbl_product` ON `tbl_book_item`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_affiliate_link` ON `affiliate` = `tbl_affiliate_link`.`aid` AND `tbl_affiliate_link`.`user`=" . sessionId('login_user_id') . " WHERE `tbl_book_item`.`affiliate_status` = 'approved' ORDER BY `tbl_book_product`.`product_book_id` DESC;");
        $total_debit = $this->CommonModel->getSumById('points_used', "book_product", ['booking_status' => '4']);
        echo (int) (@$_POST['amt'] * ($pointspercentage['content_value'] / 100));
    }
    public function payment_msg()
    {
        if ($_POST['code'] == 'PAYMENT_SUCCESS') {
            $this->cart->destroy();
        }
        $this->CommonModel->updateRowById('book_product', 'order_id', $_POST['transactionId'], array('transaction_mode' => $_POST['code'], 'transaction_status' => ($_POST['code'] == 'PAYMENT_SUCCESS') ? '1' : '2'));
        $checkoutdata = $this->CommonModel->getSingleRowById('book_product', ['order_id' => $_POST['transactionId']]);
        $data['category'] = $this->CommonModel->getAllRowsInOrder('category', 'category_id', 'desc');
        $checkout = $this->CommonModel->getSingleRowById('book_product', array('order_id' => $_POST['transactionId']));
        if ($checkout) {
            $login_data = $this->CommonModel->getSingleRowById('user_registration', array('user_id' => $checkout['user_id']));
            $session = $this->session->set_userdata(array('login_user_id' => $login_data['user_id'], 'login_user_name' => $login_data['name'], 'login_user_emailid' => $login_data['email_id'], 'login_user_contact' => $login_data['contact_no']));
        }
        $data['company'] = $this->setting[9]['content_value'];
        if ($_POST['code'] == 'PAYMENT_SUCCESS') {
            $data['title'] = 'Payment Successfull';
        } else {
            $data['title'] = 'Payment Failed';
        }
        $msg = '<h2><i class="fa fa-check-circle-o true-icon" aria-hidden="true"></i> ' . (($_POST['code'] == 'PAYMENT_SUCCESS') ? 'Payment success' : 'Payment Failed') . ' !<br>
		<i class="fa fa-' . (($_POST['code'] == 'PAYMENT_SUCCESS') ? 'check' : 'times') . '-circle" aria-hidden="true"></i>
		</h2>
            <div class="checkbox-form">
                <div class="row">
                    <div class="col-md-12 thankyou-boxes">
                        <h3>Your order is ' . (($_POST['code'] == 'PAYMENT_SUCCESS') ? 'Confirmed' : 'Failed') . '</h3>
                        <p>' . (($_POST['code'] == 'PAYMENT_SUCCESS') ? 'You will receive an email when your order is ready.' : '') . '</p>
                    </div>
                   
                   <div class="col-md-12 thankyou-boxes">Transaction ID: ' . $_POST['transactionId'] . '</div>
                   <div class="col-md-12 thankyou-boxes"> Order ID: ' . $_POST['merchantOrderId'] . '</div>
                   <div class="col-md-12 thankyou-boxes ' . (($_POST['code'] == 'PAYMENT_SUCCESS') ? '' : 'd-none') . '">
                        <h3>Order updates</h3>
                        <p>You will get shipping and delivery updates by email.</p>
                    </div>
         </div>';
        $invoice['orderlist'] = array('orderDate' => $checkoutdata['create_date'], 'order_id' => $checkoutdata['order_id'], 'name' => $checkoutdata['name'], 'number' => $checkoutdata['contact_no'], 'email' => $checkoutdata['email'], 'grand_total' => $checkoutdata['final_amount']);
        $invoice['order'] = $checkoutdata;
        $post = $this->CommonModel->getRowById('book_item', 'order_id', $_POST['transactionId']);
        $productInfo = [];
        foreach ($post as $items):
            $product = $this->CommonModel->getRowByIdfield('product', 'product_id', $items['product_id'], array('product_id', 'market_price', 'sale_price', 'product_name', 'quantity_type'));
            $imgdata = getSingleRowById('product_image', array('product_id' => $items['product_id']));
            $mydata[] = array(
                'create_date' => setDateTime(),
                'order_id' => $checkoutdata['order_id'],
                'no_of_items' => @$items['qty'],
                'base_price' => $items['base_price'],
                'user_price' => $items['user_price'],
                'booking_price' => ($items['booking_price'] * $items['no_of_items']),
                'product_id' => $items['product_id'],
            );
            $inv_product = array(
                'create_date' => setDateTime(),
                'order_id' => $checkoutdata['order_id'],
                'product_img' => $imgdata['image_path'],
                'no_of_items' => $items['no_of_items'],
                'product_name' => clean($product[0]['product_name']),
                'product_size' => $items['size'],
                'product_price' => $items['user_price'],
            );
            array_push($productInfo, $inv_product);
        endforeach;
        $invoice['products'] = $productInfo;
        $invoice['contact'] = $this->setting;
        if ($_POST['code'] == 'PAYMENT_SUCCESS') {
            mailmsg($checkoutdata['email'], 'Order Confirm - ' . $this->setting[9]['content_value'], $this->load->view('invoice-mail-template', $invoice, true));
        }
        $data['message'] = $msg;
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('payment_msg', $data);
    }
    public function booking_status()
    {
        if (count($this->cart->contents()) > 0) {
            $data['title'] = 'Payment Status';
            $msg = '';
            $msg .= '<img src="assets/img/order.png" alt="Booking" style="max-width: 250px;"/>';
            $msg .= "<p>We're prepping your order.You will be notified regarding the order shipment shortly .<br/>
        Till then happy shopping</p>";
            $msg .= "<br/>";
            $data['message'] = $msg;
            $data['setting'] = $this->setting;
            $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
            $data['profile'] = $this->profile;
            $this->load->view('payment_msg', $data);
            $this->cart->destroy();
        } else {
            redirect(base_url());
        }
    }
    public function getcity()
    {
        $state = $this->input->post('state');
        $state_list = $this->CommonModel->getRowById('state', 'state_name', $state)[0];
        $data['city'] = $this->CommonModel->getRowByIdInOrder('city', array('state_id' => $state_list['state_id']), 'city_name', 'asc');
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('dropdown', $data);
    }
    public function policy($title)
    {
        $data['category'] = $this->CommonModel->getRowByOrderWithLimit('category', ['is_delete' => '1'], 'category_id', 'ASC', '6');
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['pp'] = $this->CommonModel->getRowById('policy', 'title_policy_url', $title);
        $data['title'] = $data['pp'][0]['title_policy'];
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('policy', $data);
    }
    public function privacy_policy()
    {
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['pp'] = $this->CommonModel->getRowById('policy', 'ppid', '1');
        $data['title'] = 'Privacy Policy';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('privacy-policy', $data);
    }
    public function shipping_policy()
    {
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['pp'] = $this->CommonModel->getRowById('policy', 'ppid', '3');
        $data['title'] = 'Shipping Policy';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('shipping-policy', $data);
    }
    public function cancellation_policy()
    {
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['title'] = 'Cancellation Policy';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('cancellation-policy', $data);
    }
    // public function refund_policy()
    // {
    //     $data['pp'] = $this->CommonModel->getRowById('policy', 'ppid', '3');
    //     $data['title'] = 'Shipping Policy';
    //     settingcy_list']=$this->setting;
    // $data['policy_list']= $this->CommonModel->getAllRows('tbl_policy');
    //  $this->load->view('refund-policy', $data);
    // }
    public function return_policy()
    {
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['pp'] = $this->CommonModel->getRowById('policy', 'ppid', '4');
        $data['title'] = 'Return Policy';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('return-policy', $data);
    }
    public function term_condition()
    {
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['pp'] = $this->CommonModel->getRowById('policy', 'ppid', '5');
        $data['title'] = 'Terms & Condition';
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('term-condition', $data);
    }
    public function about()
    {
        $data['title'] = 'About Us';
        $data['setting'] = $this->setting;
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('about', $data);
    }
    public function get_otp()
    {
        $responce = [];
        $contactno = $this->input->post('contactno');
        $otp = rand(1000, 10000);
        $data = $this->CommonModel->getNumRows('user_registration', array('contact_no' => $contactno));
        $user = $this->CommonModel->getSingleRowById('user_registration', array('contact_no' => $contactno));
        if ($data == 1) {
            if ($user['user_status'] == 0) {
                $responce['status'] = '200';
                $responce['login_msg'] = 'Your account is been disabled.Please contact admin for enabling of the account';
            } else {
                $this->session->set_userdata('otp', $otp);
                $responce['login_msg'] = 'Enter OTP send to your given to contact no.';
                $msg = "" . $otp . " is the verification code to log in to your " . $this->setting[9]['content_value'] . " account number.";
                sendOTP($contactno, $msg);
                $responce['otp'] = $otp;
                $responce['status'] = '1';
            }
        } else {
            $ins = $this->CommonModel->insertRowReturnId('user_registration', array('contact_no' => $contactno));
            $this->session->set_userdata('otp', $otp);
            $responce['login_msg'] = 'Enter OTP send to your given to contact no.';
            $msg = "" . $otp . " is the verification code to log in to your " . $this->setting[9]['content_value'] . " account number.";
            sendOTP($contactno, $msg);
            $responce['otp'] = $otp;
            $responce['status'] = '1';
        }
        echo json_encode($responce);
    }
    public function verify_otp()
    {
        $responce = [];
        $contactno = $this->input->post('contactno');
        $otp = $this->input->post('otp');
        $data = $this->CommonModel->getNumRows('user_registration', array('contact_no' => $contactno));
        if ($data == 0) {
            $responce['status'] = 'Breach identified';
        } elseif ($data == 1) {
            if ($this->session->userdata('otp') == $otp) {
                $login_data = $this->CommonModel->getSingleRowById('user_registration', array('contact_no' => $contactno));
                $session = $this->session->set_userdata(array('login_user_id' => $login_data['user_id'], 'login_user_name' => $login_data['name'], 'login_user_emailid' => $login_data['email_id'], 'login_user_contact' => $login_data['contact_no']));
                $savedata = $this->CommonModel->updateRowById('user_registration', 'user_id', sessionId('login_user_id'), ['otp_verified' => '1']);
                $this->session->unset_userdata('otp');
                $responce['login_msg'] = 'OTP verified';
                if (count($this->cart->contents()) > 0) {
                    $responce['status'] = '3';
                } else {
                    $responce['status'] = '1';
                }
            } else {
                // $responce['login_msg'] = 'Wrong OTP';
                $responce['login_msg'] = 'Wrong OTP';
                $responce['status'] = '2';
            }
        } else {
            $responce['login_msg'] = 'Account Not found with this contact no.';
            $responce['status'] = '0';
        }
        echo json_encode($responce);
    }
    public function deleteUser()
    {
        echo json_encode(['status' => false, 'message' => 'Enter valid user id']);
    }
    public function genrateAffiliateLink()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $getExisting = $this->CommonModel->getNumRows('affiliate_link', array('user' => $post['user'], 'product' => $post['product']));
            if ($getExisting > 0) {
                echo 0;
            } else {
                $insert = $this->CommonModel->insertRowReturnId('affiliate_link', $post);
                echo 1;
            }
        }
    }
    public function getAffiliateLink()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $getAffiliateLink = $this->CommonModel->getRowByMoreId('affiliate_link', ['user' => $post['user'], 'product' => $post['product']])[0];
            echo base_url() . encryptId($getAffiliateLink['aid']);
        }
    }
    public function affiliate_bussiness($id)
    {
        $affiliate_id = decryptId($id);
        $getAffiliate = $this->CommonModel->getRowById('affiliate_link', 'aid', $affiliate_id)[0];
        $data['affiliated_by'] = $affiliate_id;
        $data['products_image'] = $this->CommonModel->getRowById('product_image', 'product_id', $getAffiliate['product']);
        $data['details'] = $this->CommonModel->getRowById('product', 'product_id', $getAffiliate['product'])[0];
        $data['title'] = $data['details']['product_name'];
        $data['setting'] = $this->setting;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['profile'] = $this->profile;
        $this->load->view('product-details', $data);
    }
    public function fetchloginuser()
    {
        if ($this->session->has_userdata('login_user_id')) {
            echo 0;
        } else {
            echo 1;
        }
    }
    public function create_checkout_data()
    {
        $this->session->set_userdata('checkout_data', json_encode($_REQUEST));
        echo 0;
    }
    public function create_checkout()
    {
        if (count($_POST) > 0) {
            if (count($this->cart->contents()) > 0) {
                $ga = 0;
                $productInfo = [];
                $postdata = $this->input->post()['formdata'];
                $orderId = orderIdGenerateUser();
                $postdata['order_id'] = $orderId;
                $affiliate = $this->CommonModel->getSingleRowById('settings', ['id' => 1]);

                foreach ($this->cart->contents() as $items):
                    $subtotal = ($items['price'] * $items['qty']);
                    list($part1, $part2) = separateAndRemoveUnderscore($items['id']);
                    $mydata[] = array(
                        'create_date' => setDateTime(),
                        'order_id' => $orderId,
                        'no_of_items' => $items['qty'],
                        'base_price' => $items['base_price'],
                        'user_price' => $items['price'],
                        // 'size' => $items['size'],
                        'booking_price' => $subtotal,
                        'product_id' => $part1,
                        'affiliate' => $items['affiliate'],
                        'affiliate_percentage' => $affiliate['content_value'],
                        'affiliate_amt' => ($subtotal * ($affiliate['content_value'] / 100))
                    );
                    $inv_product = array(
                        'create_date' => setDateTime(),
                        'order_id' => $orderId,
                        'product_img' => $items['image'],
                        // 'size' => $items['size'],
                        'no_of_items' => $items['qty'],
                        'product_name' => clean($items['name']),
                        'product_price' => $items['price'],
                        'affiliate' => $items['affiliate'],
                        'affiliate_percentage' => $affiliate['content_value'],
                        'affiliate_amt' => ($subtotal * ($affiliate['content_value'] / 100))
                    );
                    $ga += $subtotal;
                    array_push($productInfo, $inv_product);
                endforeach;
                $postdata['delivery_charges'] = (int) $this->setting[27]['content_value'];

                $promo = $this->CommonModel->getSingleRowById('promocode', ['promocode' => $postdata['promocode']]);
                echo json_encode($promo);
                if ($promo != '') {
                    if ($ga > $promo['minimum_order']) {
                        $postdata['promocode'] = $promo['promocode'];
                        $postdata['promocode_amount'] = $promo['amount'];
                        $postdata['promocode_status'] = 1;
                    } else {
                        unset($postdata['promocode']);
                        unset($postdata['promocode_amt']);
                    }
                } else {
                    unset($postdata['promocode']);
                    unset($postdata['promocode_amt']);
                }

                $finalpostdata = array(
                    'order_id' => $orderId,
                    'user_id' => $this->session->userdata('login_user_id'),
                    'name' => $postdata['fname'] . ' ' . $postdata['lname'],
                    'email' => $postdata['email'],
                    'contact_no' => $postdata['contact_no'],
                    'address' => $postdata['address'],
                    'landmark' => $postdata['landmark'],
                    'area' => $postdata['area'],
                    'postal_code' => $postdata['postal_code'],
                    'state' => $postdata['state'],
                    'city' => $postdata['city'],
                    'same_as_billing' => ((isset($_POST['same_as_billing'])) ? '1' : '0'),
                    'total_item_amount' => $ga,
                    'final_amount' => (($ga + $this->setting[27]['content_value']) - (isset($postdata['promocode_amount']) ? $postdata['promocode_amount'] : 0)),
                    'payment_mode' => isset($postdata['payment_mode']) ? $postdata['payment_mode'] : '',

                    // 'final_amount' => (($ga + $this->setting[27]['content_value']) - $postdata['promocode_amount']),
                    // 'payment_mode' => $postdata['payment_mode'],
                    'shipping_charges' => $this->setting[27]['content_value'],
                    'delivery_charges' => $postdata['delivery_charges'],
                    // 'promocode' => $postdata['promocode'],
                    // 'promocode_amount' => $postdata['promocode_amount'],
                );
                $post = $this->CommonModel->insertRowReturnId('book_product', $finalpostdata);
                unset($postdata);
                $invoice['orderlist'] = array('orderDate' => date('d-m-y'), 'order_id' => $finalpostdata['order_id'], 'name' => $finalpostdata['name'], 'email' => $finalpostdata['email'], 'grand_total' => $ga);
                $invoice['order'] = $finalpostdata;
                $invoice['products'] = $productInfo;
                $invoice['contact'] = $this->setting;
                $insert2 = $this->CommonModel->insertRowInBatch('book_item', $mydata);
                // $amount = ($ga) + $finalpostdata['delivery_charges'];
                // $amount = $ga;
                $amount = $finalpostdata['final_amount'];
                if ($post != '') {
                    // Set payment flag
                    $is_payment = 1;
                    if ((int) $finalpostdata['payment_mode'] == 1) {
                        echo json_encode(['status' => 1, 'message' => 'Order is placed', 'url' => base_url() . 'booking-status']);
                        exit;

                        // Case 2: Payment Mode is Razorpay or other Online Payments
                    } else if ($finalpostdata['payment_mode'] == 2) { 
                        $data['title'] = 'Checkout payment';
                        $data['callback_url'] = base_url() . 'callback';
                        $data['surl'] = base_url() . 'success';
                        $data['furl'] = base_url() . 'failed';
                        $data['currency_code'] = 'INR';
                        $data['merchant_order_id'] = $finalpostdata['order_id'];
                        $data['description'] = 'Aadi Enterprises';
                        $data['txnid'] = date("YmdHis");
                        $data['order_id'] = $finalpostdata['order_id'];
                        $data['key_id'] = RAZOR_PAY_KEY;
                        $data['total'] = ($amount * 100); // 100 = 1 Indian rupee
                        $data['amount'] = $amount;
                        $data['card_holder_name'] = $finalpostdata['name'];
                        $data['email'] = $finalpostdata['email'];
                        $data['phone'] = $finalpostdata['contact_no'];
                        $data['name'] = $finalpostdata['name'];
                        echo json_encode(['status' => 2, 'message' => 'Online Order']);
                        exit;
                        // $this->load->view('razorpay_payment', $data);
                       
                        // Case 3: Payment Gateway Disabled or Error
                    } else {
                        $msg = '<h2><i class="fa fa-times-circle true-icon" aria-hidden="true"></i> Payment error!<br></h2>
                                <div class="checkbox-form">
                                    <div class="row">
                                        <div class="col-md-12 thankyou-boxes">
                                            <h3>Payment gateway is broken. We are working on it.</h3>
                                            <p>Reason: Not enabled from administrator</p>
                                        </div>
                                    </div>
                                </div>';
                        $data['message'] = $msg;
                        $data['setting'] = $this->setting;
                        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
                        $data['promocode'] = $this->CommonModel->getAllRows('promocode');
                        $data['title'] = 'Payment';
                        $this->load->view('payment_msg', $data);
                        echo json_encode(['status' => 0, 'message' => 'Payment gateway is broken. We are working on it.']);
                        exit;
                    }
                } else {
                    echo 'Check Form Data';
                }
            } else {
                echo json_encode(['status' => 0, 'message' => 'Cart is empty']);
            }
        } else {
            echo json_encode(['status' => 0, 'message' => 'Invalid request']);
        }
    }
    public function razorpay_payment(){
        $this->load->view('razorpay_payment');
    }
    public function checklogin()
    {
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "user_registration";
            $login_data = $this->CommonModel->getSingleRowById($table, ['email_id' => $uname]);
            if (!empty($login_data)) {
                if ($login_data['password'] == $password) {
                    $session = $this->session->set_userdata(array('login_user_id' => $login_data['user_id'], 'login_user_name' => $login_data['name'], 'login_user_emailid' => $login_data['email_id'], 'login_user_contact' => $login_data['contact_no']));
                    if (count($this->cart->contents()) > 0) {
                        echo 0;
                    } else {
                        echo 1;
                    }
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Wrong Password.</h6>');
                    echo 2;
                }
            } else {
                $this->session->set_flashdata('msg', '<h6 class="alert alert-warning">Username or Password not match.</h6>');
                echo 3;
            }
        }
    }
    public function subscribe()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $checkifExists = $this->CommonModel->getRowById('subscribe', 'email', $post['email']);
            if ($checkifExists) {
                $this->session->set_userdata('subs_msg', '<div class="alert alert-danger">You have already subscribed.</div>');
            } else {
                $insert = $this->CommonModel->insertRowReturnId('subscribe', $post);
                if ($insert) {
                    // setsessionData('msg_status', 'success');
                    $this->session->set_userdata('subs_msg', '<div class="alert alert-success">You have subscribed successfully.</div>');
                } else {
                    // setsessionData('msg_status', 'error');
                    $this->session->set_userdata('subs_msg', '<div class="alert alert-danger">We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.</div>');
                }
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function faq()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModel->insertRow('faqs', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div style="background: #0c840c; color: white; padding: 18px;">Your FAQ is successfully submit. </div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing technical error ,please try again later.</div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['mproductdesc'] = $this->CommonModel->getRowByOrderWithLimit('product', array('status' => '1', 'is_delete' => '1'), 'product_id', 'DESC', '20');
        $data['title'] = 'FAQ';
        $data['setting'] = $this->setting;
        $data['profile'] = $this->profile;
        $data['policy_list'] = $this->CommonModel->getAllRows('tbl_policy');
        $data['getFaqs'] = $this->CommonModel->getAllRowsInOrder('faqs', 'fid', 'ASC');
        $this->load->view('faq', $data);
    }
    public function get_whishlistproducts()
    {
        $data['wishlist'] = $this->CommonModel->getRowById('user_wishlist', 'user_id', sessionId('login_user_id'));
        $this->load->view('fetch_wishlistproducts', $data);
    }
}
