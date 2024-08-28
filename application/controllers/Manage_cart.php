<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_cart extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('MyLibrary');
        // $this->ud = has_loggedIn_users();
        $this->load->model('wishlist_model');
    }


    public function index()
    {
        // ajax REQUEST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pid = $this->security->xss_clean($this->input->post('pid'));
            $qty = $this->security->xss_clean($this->input->post('qty'));
            $qty = $this->input->post('qty');
            $type = $this->security->xss_clean($this->input->post('type'));

            $obj = new MyLibrary();
            if ($type == 'add') {
                $obj->add_product($pid, $qty);
            }

            if ($type == 'remove') {
                $obj->remove_product($pid, $qty);
            }

            if ($type == 'update') {
                $obj->update_product($pid, $qty);
            }
            echo $obj->total_product();
        }
    }

    public function cart()
    {
        ecomview('users/cart/index', [], 'Ecom Cart');
    }
    // wishlist Manage
    public function wishlist()
    {
        $product_id = $this->input->post('product_id');
        $type = $this->input->post('type');

        if (isset($_SESSION['logged_in_users'])) {
            $uid = $_SESSION['logged_in_users']['id'];
            if ($type == 'remove') {
                if ($d = $this->wishlist_model->delete($product_id)) {
                    $data = $this->wishlist_model->get_all($uid);
                    $_SESSION['wishlist_qty'] = count($data);
                    echo jresp(true, "data Delete Successfully");
                    exit;
                } else {
                    echo jresp(false, "data delete Failed");
                    exit;
                }
            } else {
                $data = [
                    'user_id' => $uid,
                    'product_id' => $product_id,
                ];
                if (!$this->wishlist_model->get($uid, $product_id)) {
                    if ($d = $this->wishlist_model->save($data)) {
                        $data = $this->wishlist_model->get_all($uid);
                        $_SESSION['wishlist_qty'] = count($data);
                        echo jresp(true, "data add Successfully");
                        exit;
                    } else {
                        echo jresp(false, "Failed");
                        exit;
                    }
                } else {
                    echo jresp(false, "Product Already added");
                    exit;
                }
            }
        } else {
            echo jresp(false, "NOT_LOGIN");
            exit;
        }
    }

    public function wishlist_view()
    {
        if (isset($_SESSION['logged_in_users'])) {
            $uid = $_SESSION['logged_in_users']['id'];
            if ($uid) {
                $data = $this->wishlist_model->get_all($uid);
                // pp($data);
                $_SESSION['wishlist_qty'] = count($data);
                // redirect('Manage_cart/wishlist_view');
            }

            // pp($data);
        } else {
            redirect('user');
        }
        ecomview('users/wishlist/index', compact('data'), 'Ecom Wishlist');
    }
}
