<?php
defined('BASEPATH') or exit('No direct script allowed');
class User_model extends CI_Model
{

    private $table = "users";

    public function get($email)
    {
        $this->db->where('email', $email);
        $this->db->from($this->table);
        return $this->db->get()->row();
    }

    public function save($usersdata)
    {
        $this->db->insert($this->table, $usersdata);
        return $this->db->insert_id();
    }

    public function get_all()
    {
        $this->db->select("name,email,id,role");
        $this->db->from($this->table);
        $this->db->where("role", 'User');
        return $this->db->get()->result();
    }

    public function get1($id)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("id", $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }


    public function search($type)
    {
      $this->db->select('name,id,email,role');
      $this->db->from($this->table);
      $this->db->like('role',$type);
      return $this->db->get()->result();
    }
   
}
