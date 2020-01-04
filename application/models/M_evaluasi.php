<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_evaluasi extends CI_Model{
  private $table          = 'tabel_evaluasi';
  private $id             = 'id';

  public function __construct(){
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getData(){
    $query = $this->db->get($this->table);
    return $query->result();
  }

  public function addData($data){
    $this->db->insert($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function selectOne($data){
    $query = $this->db->where($data)->get($this->table);
    return $query->result();
  }

  public function updateData($id, $data){
    if(isset($data['id']))unset($data['id']);
    $query = $this->db->where('id', $id)->update(
      $this->table, $data
    );
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function removeData($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

}
