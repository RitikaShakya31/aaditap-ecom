
<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'UserHome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/////////////////////     Admin     /////////////////

$route['admin'] = 'admin/AdminAuth/admin';
$route['adminLogout'] = 'admin/AdminAuth/adminLogout';
$route['dashboard'] = 'admin/AdminHome/dashboard';
$route['setting'] = 'admin/AdminHome/setting';
$route['banner'] = 'admin/AdminHome/banner';
$route['promoCode'] = 'admin/AdminHome/promoCode';
$route['category-featured/(:any)/(:any)'] = 'admin/AdminHome/categoryFeatured/$1/$2';
$route['setDeliveryCharges'] = 'admin/AdminHome/setDeliveryCharges';
$route['blogAdd'] = 'admin/AdminHome/blogAdd';
$route['blogAll'] = 'admin/AdminHome/blogAll';
$route['product-fields'] = 'admin/AdminHome/product_fields';

//  =>  User

$route['activeUser'] = 'admin/AdminHome/activeUser';
$route['inactiveUser'] = 'admin/AdminHome/inactiveUser';
$route['userAffiliateDetails/(:any)'] = 'admin/AdminHome/userAffiliateDetails/$1';
$route['userStatus/(:any)/(:any)'] = 'admin/AdminHome/userStatus/$1/$2';
$route['userDetails/(:any)'] = 'admin/AdminHome/userDetails/$1';

// => Orders

$route['recentOrders'] = 'admin/AdminHome/recentOrders';
$route['acceptOrder'] = 'admin/AdminHome/acceptOrder';
$route['cancelOrder'] = 'admin/AdminHome/cancelOrder';
$route['acceptedOrders'] = 'admin/AdminHome/acceptedOrders';
$route['dispatchOrder/(:any)/(:any)'] = 'admin/AdminHome/dispatchOrder/$1/$2';
$route['dispatchOrders'] = 'admin/AdminHome/dispatchOrders';
$route['completedOrders'] = 'admin/AdminHome/completedOrders';
$route['cancelOrders'] = 'admin/AdminHome/cancelOrders';
$route['allOrders'] = 'admin/AdminHome/allOrders';
$route['contact_query'] = 'admin/AdminHome/contact_query';
$route['addFaqs'] = 'admin/AdminHome/addFaqs';

// => Product

$route['categoryAll'] = 'admin/AdminProduct/categoryAll';
$route['categoryAdd'] = 'admin/AdminProduct/categoryAdd';
$route['subCategoryAll'] = 'admin/AdminProduct/subCategoryAll';
$route['subCategoryAdd'] = 'admin/AdminProduct/subCategoryAdd';
$route['getSubCategory'] = 'admin/AdminProduct/getSubCategory';
$route['productAll'] = 'admin/AdminProduct/productAll';
$route['productDetails'] = 'admin/AdminProduct/productDetails';
$route['productAdd'] = 'admin/AdminProduct/productAdd';
$route['productView'] = 'admin/AdminProduct/productView';
$route['getProductSubCategory'] = 'admin/AdminProduct/getProductSubCategory';
$route['subscribers'] = 'admin/AdminHome/subscribers';
$route['productImageD/(:any)/(:any)'] = 'admin/AdminProduct/productImageD/$1/$2';


///////////////////// website   ///////////////////////
$route['contact'] = 'UserHome/contact';
$route['login'] = 'UserHome/login';
$route['register'] = 'UserHome/register';
$route['checkout'] = 'UserHome/checkout';
$route['order-history'] = 'UserHome/order_history';
$route['profile'] = 'UserHome/profile';
$route['product'] = 'UserHome/product';
$route['product/(:any)'] = 'UserHome/product/$1';
$route['orderInvoice/(:any)'] = 'UserHome/orderInvoice/$1';
$route['orderDetails/(:any)'] = 'UserHome/orderDetails/$1';
$route['forgot-password'] = 'UserHome/forgot_password';
$route['search'] = 'UserHome/search';
$route['orders'] = 'UserHome/orders';
$route['shipping-policy'] = 'UserHome/shipping_policy';
$route['contact'] = 'UserHome/contact';
$route['about'] = 'UserHome/about';
$route['wishlist'] = 'UserHome/wishlist';
$route['blog'] = 'UserHome/blog';
$route['faq'] = 'UserHome/faq';
$route['term-condition'] = 'UserHome/term_condition';
$route['policy/(:any)'] = 'UserHome/policy/$1';
$route['privacy-policy'] = 'UserHome/privacy_policy';
$route['shipping-policy'] = 'UserHome/shipping_policy';
$route['return-policy'] = 'UserHome/return_policy';
$route['cancellation-policy'] = 'UserHome/cancellation_policy';
$route['verify-registration'] = 'UserHome/verify_registration';
$route['logout'] = 'UserHome/logout';
$route['razorpay_payment'] = 'UserHome/razorpay_payment';
$route['booking-status'] = 'UserHome/booking_status';
$route['payment_msg'] = 'UserHome/payment_msg';
$route['order_invoice/(:any)'] = 'UserHome/order_invoice/$1';
$route['genrateAffiliateLink'] = "UserHome/genrateAffiliateLink";
$route['getAffiliateLink'] = "UserHome/getAffiliateLink";
$route['affiliates'] = "UserHome/affiliates";
$route['reset_password'] = 'UserHome/reset_password';
$route['product-details/(:any)'] = 'UserHome/details/$1';
$route['product-details'] = 'UserHome/details';


$route['success'] = 'UserHome/success';
$route['failed'] = 'UserHome/failed';
$route['callback'] = 'UserHome/callback';
// => shiprocket


$route['policy'] = 'admin/AdminHome/policy';
$route['policyedit/(:any)'] = 'admin/AdminHome/policyedit/$1';
$route['shiprocket/(:any)'] = 'admin/AdminHome/shiprocket/$1';

/////////////////////  User API    ///////////////////////


$route['stateApi'] = 'UserApi/stateApi';
$route['cityApi/(:any)'] = 'UserApi/cityApi/$1';
$route['userSendOTP'] = 'UserApi/userSendOTP';
$route['userLogin'] = 'UserApi/userLogin';
$route['userProfileUpdate'] = 'UserApi/userProfileUpdate';
$route['userViewProfile'] = 'UserApi/userViewProfile';
$route['dashboardApi'] = 'UserApi/dashboardApi';
$route['brandList'] = 'UserApi/brandList';
$route['getSubCategory/(:any)'] = 'UserApi/getSubCategory/$1';
$route['getProduct/(:any)'] = 'UserApi/getProduct/$1';
$route['getBrandByProduct/(:any)'] = 'UserApi/getBrandByProduct/$1';
$route['searchProduct'] = 'UserApi/searchProduct';


$route['getDeliveryCharge'] = 'UserApi/getDeliveryCharge';
$route['getPromoCode'] = 'UserApi/getPromoCode';
$route['createOrder'] = 'UserApi/createOrder';
$route['orderTransactionStatus'] = 'UserApi/orderTransactionStatus';
$route['generatePaymentToken'] = 'UserApi/generatePaymentToken';
$route['orderHistory'] = 'UserApi/orderHistory';
$route['productReview'] = 'admin/AdminHome/productReview';
$route['reviewStatus/(:any)/(:any)'] = 'admin/AdminHome/reviewStatus/$1/$2';
$route['save_review'] = 'UserHome/save_review';
$route['subscribe'] = 'UserHome/subscribe';


$route['google-login'] = 'GoogleLogin';
$route['google-login/callback'] = 'GoogleLogin/callback';
$route['google-login/welcome'] = 'GoogleLogin/welcome';
$route['google-login/logout'] = 'GoogleLogin/logout';


// $route['(:any)'] = "UserHome/affiliate_bussiness/$1";

$route['(:any)-details'] = 'UserHome/blog/$1';
$route['(:any)'] = 'UserHome/product_details/$1';
