<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends MY_Controller {

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

    
  function cetak_cuti(){
    $pdf = new FPDF('p','mm','letter');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',12);
    // mencetak string 
    $pdf->Cell(350,40,'FORMULIR PERMINTAAN DAN PEMBERIAN CUTI',0,1);
    $pdf->Cell(0,0,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1);
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'NIM',1,0);
    $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
    $pdf->Cell(27,6,'NO HP',1,0);
    $pdf->Cell(25,6,'TANGGAL LHR',1,1);
    $pdf->SetFont('Arial','',10);
    $cuti = $this->db->get('db_cuti')->result();
    foreach ($cuti as $row){
        $pdf->Cell(20,6,$row->alasan_cuti,1,0);
        $pdf->Cell(85,6,$row->lama_cuti,1,0);
        $pdf->Cell(27,6,$row->sisa_cuti,1,0);
        $pdf->Cell(25,6,$row->tanggal_cuti,1,1); 
    }
    $pdf->Output();
    }

    function cetak(){
     //buka file rtf
      $template = "template/cuti.rtf";
      $handle = fopen($template, "r+");
      $hasilbaca = fread($handle, filesize($template));
      fclose($handle);
      //nilai yang akan dituliskan dalam template
      //pada praktek sebenarnya anda bisa mengambil data dari database
      $nama_pegawai = 'Hari Prasetyo';
      $nip_pegawai = '12-12-2012';
      $jabatan_pegawai = 'Jakarta, Indonesia';
      $masa_kerja = date('d-m-Y H:i:s');
      //tuliskan data dalam template
      $hasilbaca = str_replace('data_nama', $nama_pegawai, $hasilbaca);
      $hasilbaca = str_replace('data_dob', $nip_pegawai, $hasilbaca);
      $hasilbaca = str_replace('data_alamat', $jabatan_pegawai, $hasilbaca);
      $hasilbaca = str_replace('data_tgl_cetak', $masa_kerja, $hasilbaca);
      //membuat file baru dari hasil baca
      $hasil = "../hasil/hasil_laporan.rtf";
      $handle = fopen($hasil, "w+");
      fwrite($handle, $hasilbaca);
      fclose($handle);
      //membuka file hasil secara langsung
      //header('Location:'.$hasil);
      //atau membuka file melalui link
      echo '<a href="'.$hasil.'">Hasil</a>';
    }

    public function cetak_pengajuan($id){
	
      $where = array('id' => $id);
      $where2 = array('db_jabatan.id_jabatan' => '1');
      $where3 = array('db_jabatan.id_jabatan' => '9');
      $where4 = array('db_jabatan.id_jabatan' => '11');
      $where5 = array('db_jabatan.id_jabatan' => '8');
      $where6 = array('db_jabatan.id_jabatan' => '7');
      $where7 = array('db_jabatan.id_jabatan' => '6');
      $where8 = array('db_jabatan.id_jabatan' => '5');
      $data['cuti'] = $this->Cuti_model->get_my_pengajuan_cetak($where,'db_cuti')->result();
      $data['ketua'] = $this->Cuti_model->getKetua($where2,'db_pegawai')->result();
      $data['atasan'] = $this->Cuti_model->getKetua($where3,'db_pegawai')->result();
      $data['atasan1'] = $this->Cuti_model->getKetua($where4,'db_pegawai')->result();
      $data['atasan2'] = $this->Cuti_model->getKetua($where5,'db_pegawai')->result();
      $data['atasan3'] = $this->Cuti_model->getKetua($where6,'db_pegawai')->result();
      $data['atasan4'] = $this->Cuti_model->getKetua($where7,'db_pegawai')->result();
      $data['atasan5'] = $this->Cuti_model->getKetua($where8,'db_pegawai')->result();
      $this->load->library('Pdfcon');
      $this->pdfcon->generate('cuti/surat', $data);
      }
}
