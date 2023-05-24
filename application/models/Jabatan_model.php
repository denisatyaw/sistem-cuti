<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    public $table = 'db_jabatan';
    public $id = 'id_jabatan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get('db_jabatan')->result();
    }

    
    public function tampil_jabatan() {
        $this->db->select('*');
        $this->db->from('db_jabatan');
        $query = $this->db->get();
        return $query;
       }
   
    
    
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function profile($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // delete data
    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}