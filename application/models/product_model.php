<?php
defined('BASEPATH') or exit('No direct script allowed');
class product_model extends CI_Model
{

    private $table = "product";
    private $categories_table = "categories";


    public function get_all($cat_id = null)
    {
        $this->db->select("pro.*, cat.categorys");
        $this->db->from("{$this->table} pro");
        $this->db->order_by("pro.id", "DESC");
        $this->db->join("{$this->categories_table} cat", 'cat.id = pro.categories_id', 'left');
        if ($cat_id != "") {
            $this->db->where('pro.categories_id', $cat_id);
            $this->db->where("pro.status", 1);
        }
        return $this->db->get()->result();
    }

    public function status_operation($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function get($id = null, $product_name = null)
    {

        $this->db->select('*');
        $this->db->from($this->table);

        if ($id) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("name", $product_name);
        }
        return $this->db->get()->row();
    }

    public function get_product($limit = null, $pid = null)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit);
        if ($pid) {
            $this->db->where("id", $pid);
        }
        $this->db->where("status", 1);
        return $this->db->get()->result();
    }

    public function get_singal_product($product_id)
    {

        $this->db->select("pro.*, cat.categorys");
        $this->db->from("{$this->table} pro");
        $this->db->join("{$this->categories_table} cat", 'cat.id = pro.categories_id', 'left');
        $this->db->where("pro.status", 1);
        $this->db->where("pro.id", $product_id);
        return $this->db->get()->row();
    }

    public function search_product($search)
    {

        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->like('name', $search);
        $this->db->or_like('description', $search);
        return $this->db->get()->result();
    }
}
