<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();

        $this->load->model(['users_model', 'category_model', 'product_model']);
    }



    // use for admin plane
    public function user()
    {
        $this->ud = has_loggedIn();
        $users = $this->users_model->get_all();
        view('admin/users/index', compact('users'), 'Users');
    }

    // ecom Home page
    public function index()
    {
        $cat = $this->category_model->get_all($status = 1);
        $this->session->set_userdata('CATEGORY', $cat);
        ecomview('users/index', [], "HOME");
    }



    //  Category by Products
    public function product_category($cat_id = null)
    {
        if ($cat_id > 0 && $cat_id != '') {
            if ($data = $this->product_model->get_all($cat_id)) {
                $title = $data[0]->categorys;
            } else {
                $title = 'Portal';
            }
        } else {

            redirect('users');
        }
        ecomview('users/product_category/index', compact('data'), $title);
    }

    // Product Details
    public function product_details($product_id = null)
    {
        if ($product_id > 0 && $product_id != '') {
            if ($product = $this->product_model->get_singal_product($product_id)) {
            } else {
                redirect('users');
            }
        } else {
            redirect('users');
        }
        ecomview('users/product-details/index', compact('product'), 'Product Details');
    }
}
