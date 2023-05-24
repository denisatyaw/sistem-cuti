<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    

class Pegawai_model extends CI_Model
{
    public $table = 'db_pegawai';
    public $id = 'nip';
    public $order = 'DESC';
    public $image = "user.png";

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get('db_pegawai')->result();
    }

    public function get($username){        
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'        
        $result = $this->db->get('db_user')->row(); // Untuk mengeksekusi dan mengambil data hasil query        
        return $result;   
    }

    function get_detail($where,$table){
        $this->db->join('db_agama','db_pegawai.id_agama=db_agama.id_agama');
        $this->db->join('db_jabatan','db_pegawai.id_jabatan=db_jabatan.id_jabatan');
        $this->db->join('db_golongan','db_pegawai.id_golongan=db_golongan.id_golongan');
        return $this->db->get_where($table, $where);
    }

    function total_rows($q = NULL){
        $this->db->like('nip', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tanggal_lahir', $q);
        $this->db->or_like('tmt', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('id_agama', $q);
        $this->db->or_like('id_jabatan', $q);
        $this->db->or_like('no_telp', $q);
        $this->db->or_like('foto', $q);
        $this->db->or_like('id_golongan', $q);
        $this->db->or_like('id_bagian', $q);
        $this->db->or_like('id_status', $q);
        $this->db->or_like('id_user', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _uploadImage(){
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']			= true;
        $config['max_size']             = 2042; // 1MB
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL){
        
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nip', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tanggal_lahir', $q);
        $this->db->or_like('tmt', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('id_agama', $q);
        $this->db->or_like('id_jabatan', $q);
        $this->db->or_like('id_golongan', $q);
        $this->db->or_like('id_bagian', $q);
        $this->db->or_like('id_status', $q);
        $this->db->or_like('id_user', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    public function tampil_pegawai() {
        $this->db->select('*');
        $this->db->from('db_pegawai');
        $this->db->join('db_agama','db_pegawai.id_agama=db_agama.id_agama');
        $this->db->join('db_jabatan','db_pegawai.id_jabatan=db_jabatan.id_jabatan');
        $this->db->join('db_golongan','db_pegawai.id_golongan=db_golongan.id_golongan');
        $this->db->order_by('nama asc');
        $query = $this->db->get();
        return $query;
       }

    /*
    public function input_pegawai(){
        $data = [
            'nama'=>$this->input->post('nama'),
            'tempat_lahir'=>$this->input->post('tempat_lahir'),
            'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
            'tmt'=>$this->input->post('tmt'),
            'id_agama'=>$this->input->post('agama'),
            'id_jabatan'=>$this->input->post('jabatan'),
            'id_golongan'=>$this->input->post('golongan'),
            'id_status'=>$this->input->post('status'),
        ];
        $this->db->insert('db_pegawai', $data);
    }
    */

    public function kode(){
        $this->db->select('RIGHT(db_user.id_user,2) as id_user', FALSE);
        $this->db->order_by('id_user','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('db_user');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
                 //cek kode jika telah tersedia    
                 $data = $query->row();      
                 $kode = intval($data->id_user) + 1; 
        }
        else{      
                 $kode = 1;  //cek jika kode belum terdapat pada table
        }
                //$tgl=date('dmY'); 
                $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
                $kodetampil = "U".$batas;  //format kode
                return $kodetampil;  
       }

    public function getPegawai()
    {
        $query = $this->db->get('db_pegawai');
        return $query;
    }

    public function get_detail_jabatan($id)
        {
            $this->db->select('*');
            $this->db->from('db_jabatan');
            $this->db->join('db_pegawai', 'db_pegawai.id_jabatan = db_jabatan.id_jabatan');
            $query = $this->db->get_where('', array('nip' => $id));
            return $query;
        }

    public function get_detail_golongan($id)
        {
            $this->db->select('*');
            $this->db->from('db_golongan');
            $this->db->join('db_pegawai', 'db_pegawai.id_golongan = db_golongan.id_golongan');
            $query = $this->db->get_where('', array('nip' => $id));
            return $query;
        }

    public function get_detail_agama($id)
        {
            $this->db->select('*');
            $this->db->from('db_agama');
            $this->db->join('db_pegawai', 'db_agama.id_agama = db_pegawai.id_agama');
            $query = $this->db->get_where('', array('nip' => $id));
            return $query;
        }

    public function getAgama(){
        //$this->db->select()
        $query = $this->db->get('db_agama');
        return $query;
    }
    public function getJabatan(){
        $query = $this->db->get('db_jabatan');
        return $query;
    }
    public function getGolongan(){
        $query = $this->db->get('db_golongan');
        return $query;
    }
    public function getBagian(){
        $query = $this->db->get('db_bagian');
        return $query;
    }
    public function getUser(){
        $query = $this->db->get('db_user');
        return $query;
    }
   
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        //$this->db->join('db_user','db_pegawai.nip=db_user.nip',$data);
    
    }

    function insert_user($table,$data)
    {
        return $this->db->insert($table, $data);
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

    public function getId($id)
    {
        $this->db->select('db_user.*, db_pegawai.nip, db_pegawai.name,');
        $this->db->join('db_pegawai', 'db_user.nip = db_pegawai.nim');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function userjoin($id) {
        $this->db->select('*');
        $this->db->from('db_pegawai');
        $this->db->join('db_user', 'db_user.nip = db_pegawai.nip');
        $this->db->where('db_user.nip', $id);
        return $this->db->get()->result();
      }
    
    // delete data
    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }


    //Hitung Total Data
    public function countPegawai(){   
        $query = $this->db->get('db_pegawai');
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return 0;
            }
    }
}