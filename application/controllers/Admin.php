<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[4]|max_length[10]');

            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[10]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login');
            } else {
                $username = $this->security->xss_clean($this->input->post('user_name'));
                $password = $this->security->xss_clean($this->input->post('password'));
                if ($user = $this->admin_model->get($username)) {
                    if ($user->password === $password) {

                        $userdata = [
                            'id' => $user->id,
                            'username' => $user->username,
                            'ADMIN_LOGIN' => TRUE
                        ];
                        $this->session->set_userdata("loggedIn", $userdata);
                        alert("success", "Logged In Successfully");
                        redirect('category');
                    } else {
                        alert("danger", "Please Enter Valid Password");
                        $this->load->view('login');
                    }
                } else {
                    alert("danger", "Please Enter Valid Username");
                    $this->load->view('login');
                }
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout(){
        if($_SESSION['loggedIn']){
            unset($_SESSION['loggedIn']);
            redirect('admin');
        }
    }
}
