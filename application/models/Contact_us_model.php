<?php
defined('BASEPATH') or exit('No direct script allowed');
class Contact_us_model extends CI_Model
{

    private $table = "contact_us";


    public function get_all()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->get()->result();
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


    public function get($id=null,$categorys=null)
    {
        if($id){
            $this->db->where("id", $id);
        }else{
            $this->db->where("categorys", $categorys);
        }
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get()->row();
    }




    public function search($type)
    {
        $this->db->select('name,id,email,role');
        $this->db->from($this->table);
        $this->db->like('role', $type);
        return $this->db->get()->result();
    }
}
