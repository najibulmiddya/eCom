<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->ud = has_loggedIn();
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

    public function index()
    {
        // Category Status operation Active/Deactive
        if (isset($_GET['type']) && $_GET['type'] != '') {
            $type = $_GET['type'];
            if ($type == 'status') {
                $operation = $_GET['operation'];
                $id = $_GET['id'];
                if ($operation == 'active') {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $this->category_model->status_operation($id, $status);
            }
            // Category Delete operation 
            if ($type == 'delete') {
                $id = $_GET['id'];
                if ($this->category_model->delete($id)) {
                    alert("success", "Categorys Delete Successfully");
                } else {
                    alert("danger", "Categorys Delete Failed");
                }
            }
        }
        $categorys = $this->category_model->get_all();
        view('admin/category/index', compact('categorys'), 'Category');
    }

    public function save($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('categorys', 'Categorys', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $categorys = $this->security->xss_clean($this->input->post('categorys'));
                $data = [
                    "categorys" => $categorys,
                    "status" => 1
                ];
                if ($id) {
                    $data = [
                        "id" => $this->security->xss_clean($this->input->post('id')),
                        "categorys" => $categorys,
                        "status" => $this->security->xss_clean($this->input->post('status'))
                    ];
                    if ($d = $this->category_model->get($id = null, $categorys)) {
                        alert("warning", "Categorys Already Exists");
                    } else {
                        if ($this->category_model->update($id, $data)) {
                            alert("success", "Categorys Updated Successfully");
                        } else {
                            alert("warning", "Categorys Details No Changes");
                        }
                    }
                } else {
                    if ($this->category_model->get($id = null, $categorys)) {
                        alert("warning", "Categorys Already Exists");
                    } else {
                        if ($this->category_model->save($data)) {
                            alert("success", "Categorys Created Successfully");
                        } else {
                            alert("danger", "Categorys Create Failed");
                        }
                    }
                }
                redirect(base_url("category"));
            } else {
                $this->view($id);
            }
        } else {
            $this->view($id);
        }
    }
}
