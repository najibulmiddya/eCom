<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_master extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->ud = has_loggedIn();
    }

    public function index()
    {
        $order = $this->order_model->get_order();
        // pp($order);
        view('admin/order/index', compact('order'), 'Ecom Order');
    }

    public function order_details($order_id)
    {
        $data = $this->order_model->get_order_details($order_id);
        $status_data = $this->order_model->getall_status();
        //    pp($data);
        view('admin/order/details', compact('data', 'status_data'), 'Ecom Order Detalis');
    }

    public function order_status_update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = $this->security->xss_clean($this->input->post('order_status_update'));
            if ($id) {
                $data = [
                    "order_status" => $status,
                    'id'=>$id
                ];

                // pp($data);
                if ($this->order_model->status_update($id, $data)) {
                    alert("success", "Order Status Updated Successfully");
                }else{
                    alert("warning", "Order Status update Failed");
                }
                redirect(base_url("order_master"));
            }
        }
    }
}
