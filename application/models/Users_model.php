<?php
defined('BASEPATH') or exit('No direct script allowed');
class Users_model extends CI_Model
{

    private $table = "users";

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

    public function get($id = null, $email = null)
    {

        $this->db->select('*');
        $this->db->from($this->table);

        if ($id) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("email", $email);
        }
        return $this->db->get()->row();
    }
}
