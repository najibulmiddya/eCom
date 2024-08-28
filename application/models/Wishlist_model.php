<?php
defined('BASEPATH') or exit('No direct script allowed');
class Wishlist_model extends CI_Model
{

    private $table = "wishlist";
    private $product = "product";

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


    public function get($uid, $product_id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("user_id", $uid);
        $this->db->where("product_id", $product_id);
        return $this->db->get()->row();
    }

    public function get_all($uid)
    {
        $this->db->select("wis.*,pro.name, pro.price,pro.image,pro.mrp");
        $this->db->from("{$this->table} wis");
        $this->db->join("{$this->product} pro", 'pro.id = wis.product_id', 'left');
        $this->db->where('wis.user_id', $uid);
        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }
}
