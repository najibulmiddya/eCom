<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('MyLibrary');
        $this->load->model('order_model');
        // $this->ud = has_loggedIn_users();
    }


    public function index()
    {
        ecomview('users/checkout/index', [], 'Ecom Cart');
    }


    // product order
    public function order()
    {
        $this->ud = has_loggedIn_users();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->security->xss_clean($this->input->post('name'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $city = $this->security->xss_clean($this->input->post('city'));
            $state = $this->security->xss_clean($this->input->post('state'));
            $pincode = $this->security->xss_clean($this->input->post('pincode'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $paymet_type = $this->security->xss_clean($this->input->post('paymet_type'));
            $apartment = $this->security->xss_clean($this->input->post('apartment'));
            $user_id = $_SESSION['logged_in_users']['id'];
            $payment_status = "pending";
            if ($paymet_type == "COD") {
                $payment_status = "success";
            }
            
            // elseif ($paymet_type == "PAYU") {
            //     pp($_POST);
            // }
            $order_status = 1;

            $cart_total = 0;
            foreach ($_SESSION['cart'] as $key => $v) {
                $data = get_product(null, $key);
                $price = $data[0]->price;
                $qty = $v['qty'];
                $cart_total = $cart_total + ($price * $qty);
            }

            $data = [
                'user_id' => $user_id,
                'name' => $name,
                'address' => $address,
                'apartment' => $apartment,
                'city' => $city,
                'state' => $state,
                'pincode' => $pincode,
                'mobile' => $mobile,
                'email' => $email,
                'payment_type' => $paymet_type,
                'total_price' => $cart_total,
                'payment_status' => $payment_status,
                'order_status' => $order_status
            ];


            if ($order_id = $this->order_model->save($data)) {

                $cart_total = 0;
                foreach ($_SESSION['cart'] as $key => $v) {
                    $data = get_product(null, $key);
                    $price = $data[0]->price;
                    $qty = $v['qty'];
                    $cart_total = $cart_total + ($price * $qty);

                    $order_detail = [
                        'order_id' => $order_id,
                        'product_id' => $key,
                        'qty' => $qty,
                        'price' => $price
                    ];
                    if ($o_id = $this->order_model->save_order_detail($order_detail)) {
                    } else {
                        echo "order Faild";
                    }
                }

                unset($_SESSION['cart']);
                redirect('checkout/thank_you');
            } else {
                echo "order Faild";
            }
        }
    }
    public function thank_you(){
        ecomview('users/checkout/thank_you', [], 'Thank You');
    }

    public function myorder()  {
        $user_id = $_SESSION['logged_in_users']['id'];
        $data=$this->order_model->get_order($user_id);
        // pp($data);
        ecomview('users/myorder/index',compact('data'), 'My Order');
    }


    public function order_details($order_id=null)  {

        $data=$this->order_model->get_order_details($order_id);
        // pp($data);
        ecomview('users/myorder/order_details',compact('data'), 'Order Details');
    }

}
