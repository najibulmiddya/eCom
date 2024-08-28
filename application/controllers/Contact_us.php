<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        // $this->ud = has_loggedIn();
        $this->load->model('contact_us_model');
    }

    private function view($id = null)
    {
        if ($category = $this->category_model->get($id)) {
            // pp($category);
            view('admin/category/Edit', compact('category'), 'Category Edit');
        } else {
            view('admin/category/create', [], 'Category Create');
        }
    }


    // onley for admin 

    public function contact()
    {
        $this->ud = has_loggedIn();
        $contact = $this->contact_us_model->get_all();
        view('admin/contact_us/index', compact('contact'), 'Contact us');
    }
    public function index()
    {
        ecomview('users/contact/index', [], 'Ecom Contact us');
    }

    public function save()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'subject' => $subject,
                    'message' => $message
                ];
                if ($this->contact_us_model->save($data)) {
                    echo jresp(true, "Email Send Successfully");
                    exit;
                } else {
                    echo jresp(false, "Email Send Failed");
                    exit;
                }
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }
}
