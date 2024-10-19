<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->profile = $this->CommonModel->getRowById('user_registration', 'user_id', sessionId('login_user_id'));
        $this->setting = $this->CommonModel->getAllRows('settings');
    }
    // public function fetch_shippingamt()
    // {
    //     echo (($this->CommonModel->getSingleRowById('delivery_charge', array('delivery_charge_id' == '1')) == 0) ? 'Free shipping' : $this->CommonModel->getSingleRowById('delivery_charge' , array('delivery_charge_id' == '1')));
    //     echo (($this->setting[38]['content_value'] == 0) ? 'Free shipping' : $this->setting[38]['content_value'])
    // }
    public function fetch_shippingamt()
    {
        $deliveryCharge = $this->CommonModel->getSingleRowById('delivery_charge', array('delivery_charge_id' => '1'));
        echo ($deliveryCharge['amount'] == 0 ? 'Free shipping' : $deliveryCharge['amount']);
    }

    public function fetch_grandtotal()
    {
        $deliveryCharge = $this->CommonModel->getSingleRowById('delivery_charge', array('delivery_charge_id' => '1'));

        echo ((int) $this->cart->total() + $deliveryCharge['amount']);
        // echo ((int)$this->cart->total() + (int)$this->setting[38]['content_value']);
    }
    public function fetch_totalitems()
    {
        echo (int) $this->cart->total_items();
    }
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $qty = $this->input->post('qty');
        $affiliate = $this->input->post('affiliate');
        print_r($_POST);
        exit();

        // Fetch the product details
        $product = $this->CommonModel->getRowByIdfield('tbl_product', 'product_id', $product_id, array('product_id', 'slug_title', 'sale_price', 'market_price', 'product_name', 'quantity_type'));
        // Get the product image
        $imgdata = getSingleRowById('tbl_product_image', array('product_id' => $product_id));

        // Prepare data for the cart without the size
        $data = array(
            'id' => $product[0]['product_id'], // You can keep or change how you want to handle ID
            'slug_title' => $product[0]['slug_title'],
            'qty' => $qty,
            'quantity_type' => $product[0]['quantity_type'],
            'base_price' => $product[0]['market_price'], // or use variant price if needed
            'price' => $product[0]['sale_price'], // or use variant price if needed
            'name' => clean($product[0]['product_name']),
            'image' => $imgdata['image_path'],
            'affiliate' => $affiliate
        );
        // Insert the data into the cart
        $this->cart->insert($data);
    }

    public function save_temp_form_data()
    {
        $postData = $this->input->post();
        
        // Handle file uploads
        if (!empty($_FILES['custom_files'])) {
            $files = $_FILES['custom_files'];
            $uploaded_files = [];
    
            for ($i = 0; $i < count($files['name']); $i++) {
                if ($files['error'][$i] == 0) {
                    // You may want to rename the file or add extra validation
                    $file_name = $files['name'][$i];
                    $file_tmp = $files['tmp_name'][$i];
                    
                    // Move the uploaded file to a directory (e.g., 'uploads/')
                    if (move_uploaded_file($file_tmp, './uploads/' . $file_name)) {
                        $uploaded_files[] = $file_name;
                    }
                }
            }
    
            // Save file names in session or database as needed
            $postData['uploaded_files'] = $uploaded_files;
        }
    
        // Save the rest of the form data in session
        $this->session->set_userdata('order_form_data', $postData);
    
        // Send success response
        echo json_encode(['status' => 'success']);
    }
    

    // public function addToCart()
    // {
    //     $product_id = $this->input->post('pid');
    //     $qty = $this->input->post('qty');
    //     $size = $this->input->post('size');
    //     $affiliate = $this->input->post('affiliate');
    //     $product = $this->CommonModel->getRowByIdfield('tbl_product', 'product_id', $product_id, array('product_id', 'slug_title', 'sale_price', 'market_price', 'product_name', 'quantity_type'));
    //     $imgdata = getSingleRowById('tbl_product_image', array('product_id' => $product_id));
    //     $variant = getSingleRowById('tbl_product_variant', array('id' => $size));
    //     $data = array(
    //         'id'      => $product[0]['product_id'] . '_'.$variant['id'],
    //         'slug_title' => $product[0]['slug_title'],
    //         'qty'     => $qty,
    //         'size'     => $variant['size'].' ml',
    //         'quantity_type' => $product[0]['quantity_type'],
    //         'base_price'   => $variant['price'],
    //         'price'   => $variant['price'],
    //         'name'    => clean($product[0]['product_name']) . '-' . $variant['size'].'ml',
    //         'image'    => $imgdata['image_path'],
    //         'affiliate'    => $affiliate
    //     );
    //     $this->cart->insert($data);
    // }
    public function addToWishlist()
    {
        if ($this->input->post('base_url')) {
            $this->session->set_userdata('redirect_url', $this->input->post('base_url'));
        }
        if (!$this->session->has_userdata('login_user_id')) {
            echo 2;
        } else {
            $imgdata = getSingleRowById('user_wishlist', array('product_id' => $this->input->post('pid'), 'user_id' => $this->session->userdata('login_user_id')));
            if ($imgdata != '') {
                $update = $this->CommonModel->deleteRowById('user_wishlist', ['id' => $imgdata['id']]);
                echo 3;
            } else {
                $postdata['product_id'] = $this->input->post('pid');
                $postdata['user_id'] = $this->session->userdata('login_user_id');
                $post = $this->CommonModel->insertRowReturnId('user_wishlist', $postdata);
                if ($post) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }

    public function fetch_data_cart()
    {
        $data['product'] = $this->CommonModel->getSingleRowByIdrand('tbl_product', array('status' => '1', 'is_delete' => '1'));
        $this->load->view('cart-list', $data);
    }

    public function fetch_checkout_cart()
    {
        // $data['product'] = $this->CommonModel->getSingleRowByIdrand('tbl_product', array('status' => '1', 'is_delete' => '1'));
        $this->load->view('checkout_cart-list');
    }
    public function fetch_cart()
    {
        $this->load->view('cart-product');
    }
    public function delete_item()
    {
        $product_id = $this->input->post('pid');
        $data = array(
            'rowid' => $product_id,
            'qty' => 0
        );
        $this->cart->update($data);
    }
    public function update_qty()
    {
        extract($this->input->post());
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
    }

    public function fetch_totalamount()
    {
        echo $this->cart->total();
    }

    public function product_discount()
    {
        $totalDiscount = 0;

        foreach ($this->cart->contents() as $items) {
            $data = getSingleRowById('product', array('product_id' => $items['id']));

            $oldPrice = +$data['market_price'];
            $newPrice = +$data['sale_price'];
            $oldPrice = bcmul($oldPrice, $items['qty']);
            $newPrice = bcmul($newPrice, $items['qty']);


            $itemDiscount = $oldPrice - $newPrice;
            $totalDiscount += $itemDiscount;
        }

        echo '' . $totalDiscount . '/- (You Saved)';
    }

    function test()
    {

        $invoice[] = "";
        $this->load->view('invoice-mail-template', $invoice);
    }
}
