<?php
defined('BASEPATH') or exit('No direct script allowed');
class Order_model extends CI_Model
{
    private $table = "order";
    private $order_detail_table = "order_detail";
    private $product_table = "product";
    private $order_status = "order_status";

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function save_order_detail($data)
    {
        $this->db->insert($this->order_detail_table, $data);
        return $this->db->insert_id();
    }

    public function get_order($uid=null)
    {
        $this->db->select("ord.*, osta.name,pro.image");
        $this->db->from("{$this->table} ord");
        $this->db->join("{$this->order_status} osta", 'osta.id = ord.order_status', 'left');
        $this->db->join("{$this->order_detail_table} odet", 'odet.order_id = ord.id', 'left');
        $this->db->join("{$this->product_table} pro", 'pro.id= odet.product_id', 'left');
        $this->db->order_by("ord.id", "DESC");
        if($uid!=''){
            $this->db->where("ord.user_id", $uid);
        }
        return $this->db->get()->result();
    }

    public function get_order_details($order_id)
    {
        $this->db->select("odet.*,pro.name as product_name,pro.image,ord.address,ord.city,ord.pincode,ord.state,ord.order_status,osta.name as status,ord.id as order_tabil_id");
        $this->db->from("{$this->order_detail_table} odet");
        $this->db->join("{$this->product_table} pro", 'pro.id=odet.product_id', 'left');

        $this->db->join("{$this->table} ord", 'ord.id=odet.order_id', 'left');
        $this->db->join("{$this->order_status} osta", 'osta.id=ord.order_status', 'left');

        $this->db->where("odet.order_id", $order_id);
        return $this->db->get()->result();
    }

    public function getall_status(){
        $this->db->select("*");
        $this->db->from($this->order_status);
        return $this->db->get()->result();
    }

    public function status_update($id,$data){
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
       
    }
}
