<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Cuti_model');
  }

  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
    
    $data['title'] = 'Data Pegawai';

    $this->template->set('title', 'Dasboard');
    $this->template->load('v_admin', 'contents' , 'pages/data_pegawai', $data);
  }

    
  	/*Konfirmasi Admin data cuty*/
	public function konfirmasi_cuti($id){
    $this->db->query("UPDATE db_cuti JOIN db_data_cuti 
                      ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                      SET CETAK='Y' where id=$id");
    
		redirect('cuti/data_cuti');
	}

	/*Konfirmasi Admin data cuty*/
	public function konfirmasi_cuti_tolak($id){
		$this->db->query("UPDATE db_cuti JOIN db_data_cuti 
                      ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                      SET CETAK='N' where id=$id");
                      
		redirect('cuti/data_cuti');
  } 
  
  
  public function cuti_success($id){
    $this->db->query("UPDATE db_cuti JOIN db_data_cuti 
                      ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                      SET STATUS='Disetujui' where id=$id");
    $lama=$this->db->query("SELECT lama_cuti as lama FROM db_data_cuti JOIN db_cuti ON db_cuti.id_cuti = db_data_cuti.id_cuti WHERE id='$id'")->result();
    $sisa=$this->db->query("SELECT sisa_cuti as sisa FROM db_data_cuti WHERE id='$id'")->result();
    
    foreach($lama as $l){
      foreach($sisa as $s){}
       $l->lama; 
       $s->sisa;
       $hit=$s->sisa - $l->lama;      
  }
    
    $this->db->query("UPDATE db_data_cuti set sisa_cuti='$hit' WHERE id='$id'"); 
		redirect('cuti/data_cuti');
	}

	/*Konfirmasi Admin data cuty*/
	public function cuti_failed($id){
		$this->db->query("UPDATE db_cuti JOIN db_data_cuti 
                      ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                      SET STATUS='Ditolak' where id=$id");
   
		redirect('cuti/data_cuti');
  } 
  

}
