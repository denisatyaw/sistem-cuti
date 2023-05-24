<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_model extends CI_Model{
    public function view_by_date($date){
        $this->db->select('*');
        $this->db->from('db_cuti');
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        $this->db->where('DATE(tanggal_pengajuan)', $date); // Tambahkan where tanggal nya
        $query = $this->db->get()->result();
        return $query;
    //return $this->db->get('db_cuti')->result();// Tampilkan data db_cuti sesuai tanggal yang diinput oleh user pada filter
    }
    
    public function view_by_month($month, $year){
        $this->db->select('*');
        $this->db->from('db_cuti');
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        $this->db->where('MONTH(tanggal_pengajuan)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_pengajuan)', $year); // Tambahkan where tahun
        $query = $this->db->get()->result();
        return $query;
    //return $this->db->get('db_cuti')->result(); // Tampilkan data db_cuti sesuai bulan dan tahun yang diinput oleh user pada filter
    }
    
    public function view_by_year($year){
        $this->db->select('*');
        $this->db->from('db_cuti');
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        $this->db->where('YEAR(tanggal_pengajuan)', $year); // Tambahkan where tahun
        $query = $this->db->get()->result();
        return $query;
    //return $this->db->get('db_cuti')->result(); // Tampilkan data db_cuti sesuai tahun yang diinput oleh user pada filter
    }
    
    public function view_all(){
        $this->db->select('*');
        $this->db->from('db_cuti');
        $this->db->join('db_data_cuti','db_cuti.id_cuti=db_data_cuti.id_cuti');
        $this->db->join('db_jenis_cuti','db_cuti.id_jenis=db_jenis_cuti.id_jenis');
        $this->db->join('db_pegawai','db_data_cuti.nip=db_pegawai.nip');
        $this->db->order_by('tanggal_pengajuan desc');
        $query = $this->db->get()->result();
        return $query;
    //return $this->db->get('db_cuti')->result(); // Tampilkan semua data db_cuti
    }
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_pengajuan) AS tahun'); // Ambil Tahun dari field tanggal_pengajuan
        $this->db->from('db_cuti'); // select ke tabel db_cuti
        $this->db->order_by('YEAR(tanggal_pengajuan)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal_pengajuan)'); // Group berdasarkan tahun pada field tanggal_pengajuan
        
        return $this->db->get()->result(); // Ambil data pada tabel db_cuti sesuai kondisi diatas
    }

    public function countCuti(){   
        $query = $this->db->get('db_data_cuti');
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return 0;
            }
    }
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
}