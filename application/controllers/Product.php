<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['product_model', 'category_model']);
        $this->load->library('session');
    }

    private function view($id = null)
    {
        if ($product = $this->product_model->get($id)) {
            $categorys = $this->category_model->get_all();
            view('admin/product/Edit', compact('product', 'categorys'), 'Product Edit');
        } else {
            $categorys = $this->category_model->get_all();
            view('admin/product/create', compact('categorys'), 'Product Create');
        }
    }

    public function index()
    {
        $this->ud = has_loggedIn();

        // Product Status operation Active/Deactive
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
                $this->product_model->status_operation($id, $status);
            }

            // Product Delete operation 

            if ($type == 'delete') {
                $id = $_GET['id'];

                if ($product = $this->product_model->get($id)) {
                    if ($img_path = $product->image) {
                        if (file_exists(PRODUCT_IMAGE_SERVER_PATH . $img_path)) {
                            unlink(PRODUCT_IMAGE_SERVER_PATH . $img_path);
                        }
                    }
                }

                if ($this->product_model->delete($id)) {
                    alert("success", "Product Delete Successfully");
                } else {
                    alert("danger", "Product Delete Failed");
                }
            }
        }

        
        $categorys = $this->category_model->get_all();
        $product = $this->product_model->get_all();
        view('admin/product/index', compact('product','categorys'), 'Product');
    }

   

    // Product Add & Updated
    public function save($id = null)
    {
        $this->ud = has_loggedIn();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('category_id', 'Categorys', 'trim|required');
            $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('product_info', 'Product info', 'trim|required');
            $this->form_validation->set_rules('mrp', 'MRP', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
            $this->form_validation->set_rules('qty', 'Qty', 'trim|required');
            $this->form_validation->set_rules('best_seller', 'Best Seller', 'trim|required');
            $this->form_validation->set_rules('short_desc', 'Short Desc', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
            $this->form_validation->set_rules('meta_desc', 'Meta Desc', 'trim|required');
            $this->form_validation->set_rules('meta_keyword', 'Meta Keywprd', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

                $config['upload_path']   = PRODUCT_IMAGE_SERVER_PATH;
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 100;
                $config['max_width']     = 1024;
                $config['max_height']    = 768;

                $this->load->library('upload', $config);

                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);

                $product_name = $this->security->xss_clean($this->input->post('name'));

                $data = [
                    "categories_id" => $this->security->xss_clean($this->input->post('category_id')),
                    "name" => $product_name,
                    "product_info" => $this->security->xss_clean($this->input->post('product_info')),
                    "mrp" => $this->security->xss_clean($this->input->post('mrp')),
                    "price" => $this->security->xss_clean($this->input->post('price')),
                    "qty" => $this->security->xss_clean($this->input->post('qty')),
                    "best_seller" => $this->security->xss_clean($this->input->post('best_seller')),
                    "image" => $image,
                    "short_desc" => $this->security->xss_clean($this->input->post('short_desc')),
                    "description" => $this->security->xss_clean($this->input->post('description')),
                    "meta_title" => $this->security->xss_clean($this->input->post('meta_title')),
                    "meta_desc" => $this->security->xss_clean($this->input->post('meta_desc')),
                    "meta_keyword" => $this->security->xss_clean($this->input->post('meta_keyword')),
                    "status" => 1
                ];

                if ($id) {

                    if ($_FILES['image']['name'] != '') {

                        if ($product = $this->product_model->get($id)) {
                            if ($img_path = $product->image) {
                                if (file_exists(PRODUCT_IMAGE_SERVER_PATH . $img_path)) {
                                    unlink(PRODUCT_IMAGE_SERVER_PATH . $img_path);
                                }
                            }
                        }

                        $updated_image = $image;
                    } else {
                        $updated_image = $this->security->xss_clean($this->input->post('old_image'));
                    }

                    $updated_data = [
                        "id" => $this->security->xss_clean($this->input->post('id')),
                        "status" => $this->security->xss_clean($this->input->post('status')),
                        "categories_id" => $this->security->xss_clean($this->input->post('category_id')),
                        "name" => $product_name,
                        "product_info" => $this->security->xss_clean($this->input->post('product_info')),
                        "mrp" => $this->security->xss_clean($this->input->post('mrp')),
                        "price" => $this->security->xss_clean($this->input->post('price')),
                        "qty" => $this->security->xss_clean($this->input->post('qty')),
                        "best_seller" => $this->security->xss_clean($this->input->post('best_seller')),
                        "short_desc" => $this->security->xss_clean($this->input->post('short_desc')),
                        "description" => $this->security->xss_clean($this->input->post('description')),
                        "meta_title" => $this->security->xss_clean($this->input->post('meta_title')),
                        "meta_desc" => $this->security->xss_clean($this->input->post('meta_desc')),
                        "meta_keyword" => $this->security->xss_clean($this->input->post('meta_keyword')),
                        "image" => $updated_image
                    ];

                    if ($this->product_model->update($id, $updated_data)) {
                        alert("success", "Product Updated Successfully");
                    } else {
                        alert("warning", "Product Details No Changes");
                    }
                } else {
                    if ($this->product_model->get($id = null, $product_name)) {
                        alert("warning", "Product Name Already Exists");
                    } else {
                        if ($this->product_model->save($data)) {
                            alert("success", "Product Created Successfully");
                        } else {
                            alert("danger", "Product Create Failed");
                        }
                    }
                }
                redirect(base_url("Product"));
            } else {
                $this->view($id);
            }
        } else {
            $this->view($id);
        }
    }

    public function search(){
        $str=$_GET['str'];
        if($str!=''){
            $data=$this->product_model->search_product($str);
            ecomview('users/search', compact('data','str'), "Search");
        }
    }
}
