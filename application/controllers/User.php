<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(['user_model']);
    }


    public function index()
    {   
        ecomview('users/user-login/index', [], "Ecom User Login");
    }

    public function register()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $this->security->xss_clean($this->input->post('name'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $password = $this->security->xss_clean($this->input->post('password'));
                $hashed_password= password_hash($password,PASSWORD_DEFAULT);

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'password' => $hashed_password
                ];

                if ($this->user_model->get($email)) {
                    echo jresp(false, "$email This Already Register");
                    exit;
                } else {
                    if ($this->user_model->save($data)) {
                        echo jresp(true, "Thank You For Registration");
                        exit;
                    } else {
                        echo jresp(false, "Registration Failed");
                        exit;
                    }
                }
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    public function login()
    {

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));

                if ($data = $this->user_model->get($email)) {
                    if (password_verify($password, $data->password)) {
                        $userdata = array(
                            'id' => $data->id,
                            'name' => $data->name,
                            'email' => $data->email,
                            'logged_in' =>TRUE
                        );
                        $this->session->set_userdata("logged_in_users", $userdata);
                        echo jresp(true, "Logged In Successfully");
                        exit;
                    } else {
                        echo jresp(false, "Invalid Password.");
                        exit;
                    }
                } else {
                    echo jresp(false, "Please Enter Valid Email");
                    exit;
                }
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    public function logout(){
        if($_SESSION['logged_in_users']){
            unset($_SESSION['logged_in_users']);
            redirect('users');
        }
    }
}
