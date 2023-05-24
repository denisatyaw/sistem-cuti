<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends MY_Controller {
  public function __construct(){
    parent::__construct();

    $this->load->model('Cuti_model');
    
  }

  
  public function home(){
    $data['title'] = 'Dashboard';
    $this->template->set('title', 'Dasboard');
    $this->template->load('v_admin', 'contents' , 'admin/dashboard', $data);
  }


  public function data_cuti(){
    $Cuti = $this->Cuti_model;
    $data['title'] = 'Data Cuti';
    $data['cuti'] = $Cuti->tampil_cuti()->result();
    $data['jenis'] = $this->Cuti_model->getCuti()->result_array();
    
    $this->template->set('title', 'Data Cuti');
    // Cek role user
    if($this->session->userdata('role') == 'admin'){ 
      $this->template->load('v_table', 'contents' , 'cuti/data_cuti', $data);
    }else
    $this->template->load('v_admin', 'contents' , 'errors/page_404', $data);
  }

  //Pengajuan Cuti Admin
  
  public function pengajuan_cuti(){
    
    
    //$row = $this->Cuti_model->get_by_id($nip);
    
    
      $nip = 	$this->session->userdata('nip');
      $sisa = $this->db->query("SELECT min(sisa_cuti) as sisa FROM db_data_cuti WHERE nip=$nip"); 
      foreach($sisa->result() as $a){
      echo $a->sisa;
    
      if ($a->sisa <= 12) {
        $data =array(
          'pegawai' => $this->Cuti_model->getPegawai()->result_array(),
          'cuti' => $this->Cuti_model->getCuti()->result_array(),
          'kode' => $this->Cuti_model->kode(),
          'jenis' => $this->Cuti_model->getJenisCuti()->result_array(),
          'jabatan' => $this->Cuti_model->getJabatan()->result_array(),
          //'user' => $this->Cuti_model->getUser()->result_array(),
          'title' => 'Pengajuan Cuti',
          'button' => 'Submit',
          'readonly' =>'readonly="readonly"',
          'action' => site_url('cuti/cuti_action'),
          'id' => set_value('id'),
          'id_cuti' => set_value('id_cuti'),
          'nip' => $this->session->userdata('nip'),
          //ucfirst($this->session->userdata('nip')),
          'id_jenis' => set_value('id_jenis'),
          'alasan_cuti' => set_value('alasan_cuti'),
          'lama_cuti' => set_value('lama_cuti'),  
          'tanggal_cuti' => set_value('tanggal_cuti'),
          'tanggal_selesai' => set_value('tanggal_selesai'),
          'alamat_cuti' => set_value('alamat_cuti'),
          'status' => set_value('status'),
          'cetak' => set_value('cetak'),
          'tanggal_pengajuan' => set_value('tanggal_pengajuan'), 
          );
        $data['sisa_cuti'] = $a->sisa;
      }else{
        $data =array(
          'pegawai' => $this->Cuti_model->getPegawai()->result_array(),
          'cuti' => $this->Cuti_model->getCuti()->result_array(),
          'kode' => $this->Cuti_model->kode(),
          'jenis' => $this->Cuti_model->getJenisCuti()->result_array(),
          'jabatan' => $this->Cuti_model->getJabatan()->result_array(),
          //'user' => $this->Cuti_model->getUser()->result_array(),
          'title' => 'Pengajuan Cuti',
          'button' => 'Submit',
          'readonly' =>'readonly="readonly"',
          'action' => site_url('cuti/cuti_action'),
          'id' => set_value('id'),
          'id_cuti' => set_value('id_cuti'),
          'nip' => $this->session->userdata('nip'),
          //ucfirst($this->session->userdata('nip')),
          'id_jenis' => set_value('id_jenis'),
          'alasan_cuti' => set_value('alasan_cuti'),
          'lama_cuti' => set_value('lama_cuti'),  
          'tanggal_cuti' => set_value('tanggal_cuti'),
          'tanggal_selesai' => set_value('tanggal_selesai'),
          'alamat_cuti' => set_value('alamat_cuti'),
          'status' => set_value('status'),
          'cetak' => set_value('cetak'),
          'tanggal_pengajuan' => set_value('tanggal_pengajuan'), 
          //'sisa_cuti' => set_value('sisa_cuti')
          );
        }
      }
      
      
      
  //     // if ($row) {
  //     //   $data = array(
  //     //     
  //     //   );
  //     // }else{}
  
  $this->template->set('title', 'Pengajuan Cuti');
  $this->template->load('v_admin', 'contents' , 'cuti/input_cuti', $data);
  
}
  
  public function cuti_action(){
      $this->_rules();
      
      $sisa_cuti = $this->input->post('sisa_cuti',TRUE);
      $lama_cuti = $this->input->post('lama_cuti');
      $hitsisa = $sisa_cuti-$lama_cuti;
    
      if ($this->form_validation->run() == FALSE) {
          $this->pengajuan_cuti();
      } else {
      $data = array(
        'id_cuti' => $this->input->post('id_cuti',TRUE),
        'id_jenis' => $this->input->post('id_jenis',TRUE),
        'alasan_cuti' => $this->input->post('alasan_cuti',TRUE),
        'lama_cuti' => $this->input->post('lama_cuti',TRUE),
        'tanggal_cuti' => $this->input->post('tanggal_cuti',TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
        'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan',TRUE),
        'alamat_cuti' => $this->input->post('alamat_cuti',TRUE),
        'status' => $this->input->post('status',TRUE),
        'cetak' => $this->input->post('cetak',TRUE),
        );

        $this->Cuti_model->insert_data('db_cuti',$data);

      
        $data_cuti = array(

        'nip' => $this->input->post('nip',TRUE),
        'id_cuti' => $this->input->post('id_cuti',TRUE),
        'sisa_cuti' => $this->input->post('sisa_cuti',TRUE),
      );

      $this->Cuti_model->insert_data('db_data_cuti',$data_cuti);
      if($this->session->userdata('role') == 'admin'){ 
        redirect(site_url('cuti/data_cuti'));
      }else{
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>Create Record Success</div>');
      redirect(site_url('cuti/riwayat_cuti'));
      }
    }
  }

  public function edit_cuti($id) 
    {
        $row = $this->Cuti_model->get_by_id($id);

        if ($row) {
            $data = array(
              'jenis' => $this->Cuti_model->getJenisCuti()->result_array(),
              'cuti' => $this->Cuti_model->getCuti()->result_array(),
              'pegawai' => $this->Cuti_model->getPegawai()->result_array(),
              'kode' => $this->Cuti_model->kode(),
              //'status' => $this->Cuti_model->getStatus()->result_array(),
              'button' => 'Update',
              'readonly' =>'readonly="readonly"',
              'action' => site_url('cuti/edit_action'),
              'id' => set_value('id', $row->id),
              'id_cuti' => set_value('id_cuti' ,$row->id_cuti),
              'nip' => set_value('nip', $row->nip),
              //'id_jenis' => set_value('id_jenis ' ,$row->id_jenis),
              //'alasan_cuti' => set_value('alasan_cuti' ,$row->alasan_cuti),
              //'lama_cuti' => set_value('lama_cuti' ,$row->lama_Cuti),  
              //'tanggal_cuti' => set_value('tanggal_cuti' ,$row->tanggal_cuti),
              //'tanggal_selesai' => set_value('tanggal_selesai' ,$row->tanggal_selesai),
              //'alamat_cuti' => set_value('alamat_cuti' ,$row->alamat_cuti),
              //'status' => set_value('status' ,$row->status),
              //'tanggal_pengajuan' => set_value('tanggal_pengajuan' ,$row->tanggal_pengajuan), 
	    );
          $this->template->set('title', 'Edit Data Pegawai');
          $this->template->load('v_admin', 'contents' , 'cuti/input_cuti', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Record Not Found</div>');
            redirect(site_url('cuti/data_cuti'));
        }
      }
    
    public function edit_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit_cuti($this->input->post('nip', TRUE));
        } else {
            $data = array(
              'nip' => $this->input->post('nip',TRUE),
              'id_jenis' => $this->input->post('id_jenis',TRUE),
              'alasan_cuti' => $this->input->post('alasan_cuti',TRUE),
              'lama_cuti' => $this->input->post('lama_cuti',TRUE),
              'tanggal_cuti' => $this->input->post('tanggal_cuti',TRUE),
              'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
              'alamat_cuti' => $this->input->post('alamat_cuti',TRUE),
              'status' => $this->input->post('status',TRUE),
              'id_jabatan' => $this->input->post('id_jabatan',TRUE),
              'id_golongan' => $this->input->post('id_golongan',TRUE),
	    );

            $this->Cuti_model->update($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Update Record Success</div>');
            redirect(site_url('page/data_pegawai'));
        }
    }

  public function detail_cuti($id) {
    $where = array('id' => $id);
    $data['data_cuti'] = $this->Cuti_model->get_detail($where,'db_cuti')->result();
    $this->template->set('title', 'Detail Cuti');
    $this->template->load('v_admin', 'contents' , 'cuti/detail_cuti', $data);
    }

  public function hapus_cuti($id) {
        $row = $this->Cuti_model->get_by_id($id);

        if ($row) {
            $this->Cuti_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Delete Record Success</div>');
            redirect(site_url('cuti/data_cuti'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Record Not Found</div>');
            redirect(site_url('cuti/data_cuti'));
        }
  }

  public function riwayat_cuti() {
    $nip = 	$this->session->userdata('nip');
    $data['cuti']	=	$this->db->query("SELECT * FROM db_data_cuti
                                      join db_cuti on db_data_cuti.id_cuti=db_cuti.id_cuti
                                      join db_jenis_cuti on db_cuti.id_jenis=db_jenis_cuti.id_jenis
													            left join db_pegawai on
                                      db_data_cuti.nip=db_pegawai.nip
                                      where db_data_cuti.nip='$nip'
                                      ORDER BY db_data_cuti.id
                                      DESC"
                                      )->result();
    
    $this->template->set('title', 'Riwayat Cuti');                                  
    $this->template->load('v_admin', 'contents' , 'cuti/data_cuti', $data);
  }

  public function daftar_cuti_tunggu() {
    $data['cuti'] = $this->db->query("SELECT * From db_data_cuti 
                                       join db_cuti on db_cuti.id_cuti = db_data_cuti.id_cuti
                                       join db_pegawai on db_pegawai.nip = db_data_cuti.nip
                                       join db_jenis_cuti on db_jenis_cuti.id_jenis = db_cuti.id_jenis
                                       where db_cuti.status = 'Menunggu'")->result();
    $this->template->set('title', 'Daftar Menunggu');                                  
    $this->template->load('v_admin', 'contents' , 'cuti/data_cuti', $data);
  }

  public function daftar_cuti_disetujui() {
    $data['cuti'] = $this->db->query("SELECT * From db_data_cuti 
                                       join db_cuti on db_cuti.id_cuti = db_data_cuti.id_cuti
                                       join db_pegawai on db_pegawai.nip = db_data_cuti.nip
                                       join db_jenis_cuti on db_jenis_cuti.id_jenis = db_cuti.id_jenis
                                       where db_cuti.status = 'Disetujui'")->result();
    $this->template->set('title', 'Daftar Menunggu');                                  
    $this->template->load('v_admin', 'contents' , 'cuti/data_cuti', $data);
  }

  public function sisa_cuti() {
    $jcuti2019 = 12;
    

  }
  


  public function pengguna(){
    $this->authenticated();

    if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
      show_404(); // Redirect ke halaman 404 Not found

    $this->render_backend('pengguna'); // load view pengguna.php
  }

  public function kontak(){
    $this->render_backend('kontak'); // load view kontak.php
  }

  public function _rules() {
    $this->form_validation->set_rules('id_cuti', 'id_cuti', 'trim|required');
    $this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim|required');
    $this->form_validation->set_rules('alasan_cuti', 'alasan cuti', 'trim|required');
    $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'trim|required');
    $this->form_validation->set_rules('tanggal_cuti', 'tanggal_cuti', 'trim|required');
    $this->form_validation->set_rules('tanggal_selesai', 'tanggal_selesai', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
 
  

}