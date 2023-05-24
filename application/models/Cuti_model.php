<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cuti_model extends CI_Model
{
    public $table = 'db_data_cuti';
    public $id = 'id';
    public $order = 'DESC';
    public $nip ='nip';

    function __construct()
    {
        parent::__construct();
    }

    public function tampil_cuti() {
        $this->db->select('*');
        $this->db->from('db_cuti');
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        $this->db->order_by('tanggal_pengajuan desc');
        $query = $this->db->get();
        return $query;
       }

    public function getAll()
    {
        return $this->db->get('db_cuti')->result();
    }

    public function get($username){        
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'        
        $result = $this->db->get('db_user')->row(); // Untuk mengeksekusi dan mengambil data hasil query        
        return $result;   
    }

    function get_detail($where,$table){
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        return $this->db->get_where($table, $where);;
    }

    public function kode(){
        $this->db->select('RIGHT(db_cuti.id_cuti,2) as id_cuti', FALSE);
        $this->db->order_by('id_cuti','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('db_cuti');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
                 //cek kode jika telah tersedia    
                 $data = $query->row();      
                 $kode = intval($data->id_cuti) + 1; 
        }
        else{      
                 $kode = 1;  //cek jika kode belum terdapat pada table
        }
                //$tgl=date('dmY'); 
                $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
                $kodetampil = "C".$batas;  //format kode
                return $kodetampil;  
       }

    public function getPegawai()
    {
        $query = $this->db->get('db_pegawai');
        return $query;
    }

    public function getCuti()
    {
        $query = $this->db->get('db_cuti');
        return $query;
    }

   

    public function getJenisCuti()
    {
        $query = $this->db->get('db_jenis_cuti');
        return $query;
    }

    public function getJabatan(){
        $query = $this->db->get('db_jabatan');
        return $query;
    }

    public function getKetua($where,$table){
        $this->db->join('db_jabatan','db_pegawai.id_jabatan = db_jabatan.id_jabatan');
        return $this->db->get_where($table,$where);
    }

  
   
    // insert data
    function insert_cuti($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert_data($table,$data)
    {
            $this->db->insert($table, $data);
    }

    // update data
    function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_cuti($nip)
    {
        $this->db->where($this->id, $nip);
        return $this->db->get($this->table)->row();
    }

    public function getId($id)
    {
        $this->db->select('db_user.*, db_cuti.nip, db_cuti.name,');
        $this->db->join('db_cuti', 'db_user.nip = db_cuti.nim');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getjoin($id) {
        $this->db->select('*');
        $this->db->from('db_data_cuti');
        $this->db->join('db_pegawai', 'db_pegawai.nip = db_data_cuti.nip');
        $this->db->join('db_cuti', 'db_cuti.id_cuti = db_data_cuti.id_cuti');
        $this->db->where('db_data_cuti.id', $id);
        return $this->db->get()->result();
      }

    public function userjoin($id) {
        $this->db->select('*');
        $this->db->from('db_cuti');
        $this->db->join('db_user', 'db_user.nip = db_cuti.nip');
        $this->db->where('db_user.nip', $id);
        return $this->db->get()->result();
      }
    
    // delete data
    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //Hitung Total Cuti
    public function countCuti(){   
        $query = $this->db->get('db_data_cuti');
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return 0;
            }
    }

    //Hitung Cuti Menunggu
    public function countCutiM(){   
        $query = $this->db->query("SELECT * From db_data_cuti inner join 
                                  db_cuti on db_cuti.id_cuti = db_data_cuti.id_cuti 
                                  where db_cuti.status = 'Menunggu'");
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return 0;
            }
    }

    //Hitung Cuti Disetujui
    public function countCutiS(){   
        $query = $this->db->query("SELECT * From db_data_cuti inner join 
                                   db_cuti on db_cuti.id_cuti = db_data_cuti.id_cuti 
                                   where db_cuti.status = 'Disetujui'");
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return 0;
            }
    }

    public function get_my_pengajuan_cetak($where,$table){
        
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        $this->db->join('db_golongan','db_pegawai.id_golongan=db_golongan.id_golongan');
        $this->db->join('db_jabatan','db_pegawai.id_jabatan=db_jabatan.id_jabatan');
        //$this->db->join('db_agama')
        return $this->db->get_where($table, $where);;
    }

}