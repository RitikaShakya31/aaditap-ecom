<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "third_party/vendor/autoload.php";

class GoogleLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->clientID = '1012220251635-77vtvsea4gk7jkpcoh4nh1k29r1qplba.apps.googleusercontent.com';
        $this->clientSecret = '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';
        $this->redirectUri = base_url() . 'GoogleLogin/callback';
    }

    public function index()
    {
        $client = new Google_Client();
        $client->setClientId($this->clientID);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($this->redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        $authUrl = $client->createAuthUrl();
        redirect($authUrl);
    }

    public function callback()
    {
        $client = new Google_Client();
        $client->setClientId($this->clientID);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($this->redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->name;

            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('name', $name);

            redirect('GoogleLogin/welcome');
        } else {
            redirect('GoogleLogin');
        }
    }

    public function welcome()
    {
        if ($this->session->userdata('name')) {
            // echo '<h1>Welcome, ' . $this->session->userdata('name') . '</h1>';
            // echo '<p>Email: ' . $this->session->userdata('email') . '</p>';
            // echo '<a href="' . base_url() . 'GoogleLogin/logout">Logout</a>';
            $email_id = $this->session->userdata('email');
            $name = $this->session->userdata('name');

            $emailcount = $this->CommonModel->getRowByIdInOrder('user_registration', array('email_id' => $email_id), 'email_id', 'DESC');
            if ($emailcount != '' && count($emailcount) >= 1) {
                $session = $this->session->set_userdata(array('login_user_id' => $emailcount[0]['user_id'], 'login_user_name' => $emailcount[0]['name'], 'login_user_emailid' => $emailcount[0]['email_id'], 'login_user_contact' => $emailcount[0]['contact_no']));
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
                $post['name'] = $name;
                $post['email_id'] = $email_id;
                $ins = $this->CommonModel->insertRowReturnId('user_registration', $post);
                $this->session->set_userdata('msg', '<h6 class="alert alert-warning">You are successfully registered. Please login to continue.</h6>');
                $session = $this->session->set_userdata(array('login_user_id' => $ins, 'login_user_name' => $name, 'login_user_emailid' => $email_id, 'login_user_contact' => 'XXXXXXXXXX'));
                redirect(base_url() . '/login');
                exit();
            }
        } else {
            redirect(base_url() . 'login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->sess_destroy();
        redirect('GoogleLogin');
    }
}
