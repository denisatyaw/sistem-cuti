<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Page extends MY_Controller {
  public function __construct(){
    parent::__construct();

    $this->load->model('Pegawai_model');
    $this->load->model('Jabatan_model');
    $this->load->model('Cuti_model');
    $this->load->model('Golongan_model');
    
  }

  //Tampilan awal dashboard
  public function home(){
    $Cuti = $this->Cuti_model;
    $data['jenis'] = $this->Cuti_model->getCuti()->result_array();
    $nip = 	$this->session->userdata('nip');
    $data = array(
      'title' => 'Dashboard',
      'countPegawai' => $this->Pegawai_model->countPegawai(),//Hitung jumlah pegawai
      'countCuti' => $this->Cuti_model->countCuti(),//Hitung total cuti
      'countCutiM' => $this->Cuti_model->countCutiM(),//hitung cuti dengan status 
      'countCutiS' => $this->Cuti_model->countCutiM(),//hitung cuti setuju
      'profile' => $this->db->query("SELECT * FROM db_pegawai
                                    join db_user on db_pegawai.nip=db_user.nip
                                    join db_agama on db_pegawai.id_agama=db_agama.id_agama
                                    join db_golongan on db_pegawai.id_golongan=db_golongan.id_golongan
                                    join db_jabatan on db_pegawai.id_jabatan=db_jabatan.id_jabatan
                                    where db_pegawai.nip='$nip'")->result(),
      'cuti' => $this->db->query("SELECT * FROM db_data_cuti
                                  join db_cuti on db_data_cuti.id_cuti=db_cuti.id_cuti
                                  join db_jenis_cuti on db_cuti.id_jenis=db_jenis_cuti.id_jenis
                                  left join db_pegawai on db_data_cuti.nip=db_pegawai.nip
                                  where db_data_cuti.nip='$nip'
                                  ORDER BY db_data_cuti.id
                                  DESC")->result(),
      'cutiT' => $this->db->query("SELECT * From db_data_cuti 
                                  join db_cuti on db_cuti.id_cuti = db_data_cuti.id_cuti
                                  join db_pegawai on db_pegawai.nip = db_data_cuti.nip
                                  join db_jenis_cuti on db_jenis_cuti.id_jenis = db_cuti.id_jenis
                                  where db_cuti.status = 'Menunggu'
                                  ORDER BY tanggal_pengajuan
                                  DESC")->result(),

    ); 
    
    $this->template->set('title', 'Dasboard');
    $this->template->load('v_admin', 'contents' , 'admin/dashboard', $data);
  }

  // Pegawai
  public function data_pegawai(){//menampilkan data pegawai
    $Pegawai = $this->Pegawai_model;
    $data['title'] = 'Data Pegawai';
    $data['db_pegawai_data'] = $Pegawai->tampil_pegawai()->result();//mengambil data pegawai pada method tampil_pegawai di pegawai_model
    
    $this->template->set('title', 'Data Pegawai');
    $this->template->load('v_table', 'contents' , 'pegawai/data_pegawai', $data);
  }

  public function upload(){
         $config['upload_path']          = './upload/';  // folder upload 
         $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        //  $config['max_size']             = 3000;
        //  $config['max_width']            = 1024;
        //  $config['max_height']           = 768;

         $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('foto')) //sesuai dengan name pada form 
         {
                echo 'Upload Foto Gagal';
         }
         else
         {
          //  tampung data dari form
          $file = $this->upload->data();
          //  $gambar = $file['file_name'];

          //  $this->product_m->insert(array('gambar' => $gambar));
         }
 }

  public function create(){//method untuk menginputkan pegawai
    $data = array(
      'agama' => $this->Pegawai_model->getAgama()->result_array(),
      'jabatan' => $this->Pegawai_model->getJabatan()->result_array(),
      'golongan' => $this->Pegawai_model->getGolongan()->result_array(),
      'user' => $this->Pegawai_model->getUser()->result_array(),
      'kode' => $this->Pegawai_model->kode(),
      'title' => 'Input Pegawai',
      'button' => 'Create',
      'readonly' =>'',
      'action' => site_url('page/create_action'),
      'nip' => set_value('nip'),
      'nama' => set_value('nama'),
      'tempat_lahir' => set_value('tempat_lahir'),
      'tanggal_lahir' => set_value('tanggal_lahir'),
      'tmt' => set_value('tmt'),
      'foto' => set_value('foto'),
      'jenis_kelamin' => set_value('jenis_kelamin'),
      'no_telp' => set_value('no_telp'),
      //'foto' => set_value('foto'),
      'id_agama' => set_value('id_agama'),
      'id_jabatan' => set_value('id_jabatan'),
      'id_golongan' => set_value('id_golongan'),
      'id_user' => set_value('id_user'),
      );
  $this->template->set('title', 'Input Pegawai');
  $this->template->load('v_admin', 'contents' , 'pegawai/input_pegawai', $data);
  }
  
  public function create_action(){//method untuk memasukkan data ke database
      $this->_rules();
      $this-> upload();
      if ($this->form_validation->run() == FALSE) {
          $this->create();
      } else {
      $file = $this->upload->data();
      $foto = $file['file_name'];
      $data_user = array(
        'id_user' => $this->input->post('id_user',TRUE),
        'nip' => $this->input->post('nip',TRUE),
        'username' => $this->input->post('nip',TRUE),
        'password' => md5($this->input->post('nip',TRUE)),
        
      );
      
      
      $this->Pegawai_model->insert_user('db_user',$data_user);

      $data = array(
        'id_user' => $this->input->post('id_user',TRUE),
        'nip' => $this->input->post('nip',TRUE),
        'nama' => $this->input->post('nama',TRUE),
        'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
        'tmt' => $this->input->post('tmt',TRUE),
        'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
        'no_telp' => $this->input->post('no_telp',TRUE),
        'id_agama' => $this->input->post('id_agama',TRUE),
        'id_jabatan' => $this->input->post('id_jabatan',TRUE),
        'id_golongan' => $this->input->post('id_golongan',TRUE),
        'foto'=> $foto,
        //'id_bagian' => $this->input->post('id_bagian',TRUE),
        //'id_status' => $this->input->post('id_status',TRUE),
      );
      $this->Pegawai_model->insert($data);

      // $this->db->select('id_user');
      // $this->db->from('db_user');
      // $this->db->where('username', $this->input->post('nip',TRUE));
      // $id=$this->db->get();
      
      
      
      
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>Create Record Success</div>');
      redirect(site_url('page/data_pegawai'));
      }
  }

  public function edit_pegawai($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);

        if ($row) {
            $data = array(
              'agama' => $this->Pegawai_model->get_detail_agama($id)->result_array(),
              'agama1' => $this->Pegawai_model->getAgama()->result_array(),
              'jabatan' => $this->Pegawai_model->get_detail_jabatan($id)->result_array(),
              'jabatan1' => $this->Pegawai_model->getJabatan()->result_array(),
              'golongan' => $this->Pegawai_model->get_detail_golongan($id)->result_array(),
              'golongan1' => $this->Pegawai_model->getGolongan()->result_array(),
              'pegawai' => $this->Pegawai_model->getPegawai()->result_array(),
              //'status' => $this->Pegawai_model->getStatus()->result_array(),
              'button' => 'Update',
              'readonly' =>'readonly="readonly"',
              'action' => site_url('page/edit_action'),
              'nip' => set_value('nip', $row->nip),
              'nama' => set_value('nama', $row->nama),
              'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
              'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
              'tmt' => set_value('tmt', $row->tmt),
              'foto' => set_value('foto', $row->foto),
              'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
              'no_telp' => set_value('no_telp', $row->no_telp),
              'id_agama' => set_value('id_agama', $row->id_agama),
              'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
              'id_golongan' => set_value('id_golongan', $row->id_golongan),
              //'id_user' => set_value('id_user', $row->id_user),
	    );
          $this->template->set('title', 'Edit Data Pegawai');
          $this->template->load('v_admin', 'contents' , 'pegawai/update_pegawai', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Record Not Found</div>');
            redirect(site_url('page/data_pegawai'));
        }
    }
    
    public function edit_action() 
    {
        $this->_rules();
        $this-> upload();

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pegawai($this->input->post('nip', TRUE));
        } else {
            $file = $this->upload->data();
            $foto = $file['file_name'];
            $data = array(
              'nip' => $this->input->post('nip',TRUE),
              'nama' => $this->input->post('nama',TRUE),
              'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
              'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
              'tmt' => $this->input->post('tmt',TRUE),
              'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
              'no_telp' => $this->input->post('no_telp',TRUE),
              'id_agama' => $this->input->post('id_agama',TRUE),
              'id_jabatan' => $this->input->post('id_jabatan',TRUE),
              'id_golongan' => $this->input->post('id_golongan',TRUE),
              'foto'=> $foto,
      );
      //print_r($data);

            $this->Pegawai_model->update($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Update Record Success</div>');
            redirect(site_url('page/data_pegawai'));
      //echo $this->input->post('id_agama');
        }
    }

  public function detail_pegawai($nip) {
    $where = array('nip' => $nip);
    $data['pegawai'] = $this->Pegawai_model->get_detail($where,'db_pegawai')->result();
    $this->template->set('title', 'Detail Pegawai');
    $this->template->load('v_admin', 'contents' , 'pegawai/detail_pegawai', $data);
    }

  public function hapus_pegawai($id) {
        $row = $this->Pegawai_model->get_by_id($id);

        if ($row) {
            $this->Pegawai_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Delete Record Success</div>');
            redirect(site_url('page/data_pegawai'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Record Not Found</div>');
            redirect(site_url('pages/data_pegawai'));
        }
  }
  //End Pegawai

  //Jabatan
  public function data_jabatan(){
		$Jabatan = $this->Jabatan_model;
		$data['title'] = 'Data jabatan';
		$data['db_jabatan_data'] = $Jabatan->tampil_jabatan()->result();
		
		$this->template->set('title', 'Data Jabatan');
		$this->template->load('v_table', 'contents' , 'jabatan/data_jabatan', $data);
	  }
	
	  public function input_jabatan(){
		$data = array(
		  'title' => 'Input ',
		  'button' => 'Create',
		  'readonly' =>'',
      'action' => site_url('page/input_jabatan_action'),
      'id_jabatan' => set_value('id_jabatan'),
		  'nama_jabatan' => set_value('nama_jabatan'),
		);
	  $this->template->set('title', 'Input Jabatan');
	  $this->template->load('v_admin', 'contents' , 'jabatan/input_jabatan', $data);
	  }
	  
	  public function input_jabatan_action(){
		$this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'trim|required');
	
		  if ($this->form_validation->run() == FALSE) {
			  $this->input_jabatan();
		  } else {
		  $data = array(
			'id_jabatan' => $this->input->post('id_jabatan',TRUE),
			'nama_jabatan' => $this->input->post('nama_jabatan',TRUE),
			
		  );
		  $this->Jabatan_model->insert($data);
		  $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>Create Record Success</div>');
		  redirect(site_url('page/data_jabatan'));
		  }
	  }
	
	  public function edit_jabatan($id) 
		{
			$row = $this->Jabatan_model->get_by_id($id);
	
			if ($row) {
				$data = array(
				  'button' => 'Update',
				  'readonly' =>'readonly="readonly"',
				  'action' => site_url('page/edit_jabatan_action'),
				  'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
				  'nama_jabatan' => set_value('nama_jabatan', $row->nama_jabatan),

			);
			  $this->template->set('title', 'Edit Data Jabatan');
			  $this->template->load('v_admin', 'contents' , 'jabatan/input_jabatan', $data);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Record Not Found</div>');
				redirect(site_url('page/data_jabatan'));
			}
		}
		
		public function edit_jabatan_action() 
		{
			$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->edit_jabatan($this->input->post('id_jabatan', TRUE));
			} else {
				$data = array(
				  'nama_jabatan' => $this->input->post('nama_jabatan',TRUE),
			);
	
				$this->Jabatan_model->update($this->input->post('id_jabatan', TRUE), $data);
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Update Record Success</div>');
				redirect(site_url('page/data_jabatan'));
			}
		}
	
	  public function detail_jabatan($id_jabatan) {
		$where = array('id_jabatan' => $id_jabatan);
		$data['jabatan'] = $this->Jabatan_model->get_detail($where,'db_jabatan')->result();
		$this->template->set('title', 'Detail Jabatan');
		$this->template->load('v_admin', 'contents' , 'jabatan/detail_jabatan', $data);
		}
	
	  public function hapus_jabatan($id) {
			$row = $this->Jabatan_model->get_by_id($id);
	
			if ($row) {
				$this->Jabatan_model->delete($id);
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Delete Record Success</div>');
				redirect(site_url('page/data_jabatan'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Record Not Found</div>');
				redirect(site_url('page/data_jabatan'));
			}
    }
  //End Jabatan
    
  //Golongan
  public function data_golongan(){
		$Golongan = $this->Golongan_model;
		$data['title'] = 'Data Golongan';
		$data['db_golongan_data'] = $Golongan->tampil_golongan()->result();
		
		$this->template->set('title', 'Data Golongan');
		$this->template->load('v_table', 'contents' , 'golongan/data_golongan', $data);
	  }
	
	  public function input_golongan(){
		$data = array(
		  'title' => 'Input ',
		  'button' => 'Create',
		  'readonly' =>'',
		  'action' => site_url('page/input_golongan_action'),
		  'id_golongan' => set_value('id_golongan'),
		  'nama_golongan' => set_value('nama_golongan'),
		);
	  $this->template->set('title', 'Input Golongan');
	  $this->template->load('v_admin', 'contents' , 'golongan/input_golongan', $data);
	  }
	  
	  public function input_golongan_action(){
		$this->form_validation->set_rules('nama_golongan', 'nama_golongan', 'trim|required');
	
		  if ($this->form_validation->run() == FALSE) {
			  $this->input_golongan();
		  } else {
		  $data = array(
			'id_golongan' => $this->input->post('id_golongan',TRUE),
			'nama_golongan' => $this->input->post('nama_golongan',TRUE),
			
		  );
		  $this->Golongan_model->insert($data);
		  $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>Create Record Success</div>');
		  redirect(site_url('page/data_golongan'));
		  }
	  }
	
	  public function edit_golongan($id) 
		{
			$row = $this->Golongan_model->get_by_id($id);
	
			if ($row) {
				$data = array(
				  'button' => 'Update',
				  'readonly' =>'readonly="readonly"',
				  'action' => site_url('page/edit_golongan_action'),
				  'id_golongan' => set_value('id_golongan', $row->id_golongan),
				  'nama_golongan' => set_value('nama_golongan', $row->nama_golongan),

			);
			  $this->template->set('title', 'Edit Data Golongan');
			  $this->template->load('v_admin', 'contents' , 'golongan/input_golongan', $data);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Record Not Found</div>');
				redirect(site_url('page/data_golongan'));
			}
		}
		
		public function edit_golongan_action() 
		{
			$this->form_validation->set_rules('nama_golongan', 'Nama Golongan', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->edit_golongan($this->input->post('id_golongan', TRUE));
			} else {
				$data = array(
				  'id_golongan' => $this->input->post('id_golongan',TRUE),
				  'nama_golongan' => $this->input->post('nama_golongan',TRUE),
			);
	
				$this->Golongan_model->update($this->input->post('id_golongan', TRUE), $data);
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Create Record Success</div>');
				redirect(site_url('page/data_golongan'));
			}
		}
	
	  public function detail_golongan($id_golongan) {
		$where = array('id_golongan' => $id_golongan);
		$data['golongan'] = $this->Golongan_model->get_detail($where,'db_golongan')->result();
		$this->template->set('title', 'Detail Golongan');
		$this->template->load('v_admin', 'contents' , 'golongan/detail_golongan', $data);
		}
	
	  public function hapus_golongan($id) {
			$row = $this->Golongan_model->get_by_id($id);
	
			if ($row) {
				$this->Golongan_model->delete($id);
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Delete Record Success</div>');
				redirect(site_url('page/data_golongan'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Record Not Found</div>');
				redirect(site_url('page/data_golongan'));
			}
    }
  //End Golongan
  
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
    $this->form_validation->set_rules('nip', 'nip', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
    $this->form_validation->set_rules('tmt', 'tmt', 'trim|required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
    //$this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
    //$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
    //$this->form_validation->set_rules('id_golongan', 'id golongan', 'trim|required');
    //$this->form_validation->set_rules('id_bagian', 'id bagian', 'trim|required');
    //$this->form_validation->set_rules('id_status', 'id status', 'trim|required');
    
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function profile() 
  {
    $nip = 	$this->session->userdata('nip');
    $row = $this->Pegawai_model->get_by_id($nip);

      if ($row) {
          $data = array(
            'profile' => $this->db->query("SELECT * FROM db_pegawai
                                          join db_user on db_pegawai.nip=db_user.nip
                                          join db_agama on db_pegawai.id_agama=db_agama.id_agama
                                          join db_golongan on db_pegawai.id_golongan=db_golongan.id_golongan
                                          join db_jabatan on db_pegawai.id_jabatan=db_jabatan.id_jabatan
                                          where db_pegawai.nip='$nip'")->result(),
            'agama' => $this->Pegawai_model->getAgama()->result_array(),
            'user' => $this->Pegawai_model->getUser()->result_array(),
            'jabatan' => $this->Pegawai_model->getJabatan()->result_array(),
            'golongan' => $this->Pegawai_model->getGolongan()->result_array(),
            //'bagian' => $this->Pegawai_model->getBagian()->result_array(),
            //'status' => $this->Pegawai_model->getStatus()->result_array(),
            
            'button' => 'Update',
            'readonly' =>'readonly="readonly"',
            'action' => site_url('page/edit_action1'),
            'nip' => set_value('nip', $row->nip),
            'nama' => set_value('nama', $row->nama),
            'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
            'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
            'tmt' => set_value('tmt', $row->tmt),
            'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
            'no_telp' => set_value('no_telp', $row->no_telp),
            'id_agama' => set_value('id_agama', $row->id_agama),
            'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
            'id_golongan' => set_value('id_golongan', $row->id_golongan),
            //'id_user' => set_value('id_user', $row->id_user),
    );
        $this->template->set('title', 'Edit Data Pegawai');
        $this->template->load('v_admin', 'contents' , 'pegawai/profile', $data);
      } else {
          $this->session->set_flashdata('message', 'R<div class="alert alert-warning alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>Record Not Found</div>');
          redirect(site_url('db_pegawai'));
      }
  }
  
  public function profile_action() 
    {
      $this->form_validation->set_rules('nip', 'nip', 'trim|required');
      $this->form_validation->set_rules('nama', 'nama', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pegawai($this->input->post('nip', TRUE));
        } else {
            $data = array(
              'nip' => $this->input->post('nip',TRUE),
              'nama' => $this->input->post('nama',TRUE),
              'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
              'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
              'tmt' => $this->input->post('tmt',TRUE),
              'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
              'no_telp' => $this->input->post('no_telp',TRUE),
              'id_agama' => $this->input->post('id_agama',TRUE),
              'id_jabatan' => $this->input->post('id_jabatan',TRUE),
              'id_golongan' => $this->input->post('id_golongan',TRUE),
              
	    );

            $this->Pegawai_model->update($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Update Record Success</div>');
            redirect(site_url('page/profile'));
        }
    }
 
    public function error(){
      $data['title'] = 'Error 404';
      $this->template->set('title', 'Dasboard');
      $this->template->load('v_admin', 'contents' , 'errors/page_404', $data);
    }

    



}