<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model
{

    private $table          = 'tabel_pengguna';
    private $id             = 'id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getWhere($data) {
        $query = $this->db->where($data)->get($this->table);
        return $query->result();
    }

    public function add($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function edit($id, $data){
        //run Query to update data
        if(isset($data[$this->id]))unset($data[$this->id]);
        $query = $this->db->where('id', $id)->update(
          $this->table, $data
        );
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function delete($data){
        $this->db->delete($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get_total() {
        return $this->db->count_all($this->table);
    }	
    
    public function auth_login($username, $password) {
        $this->db->where("email = '$username' OR username = '$username'");
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);
        return $query->row();
    }

}

?>