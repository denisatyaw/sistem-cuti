<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
  

    /*
        Controller Report untuk laporan dengan filter hari/bulan/tahun/keseluruhan
    */
  public function __construct(){
    parent::__construct();
    $this->load->model('Report_model');
    
  }
  

  //Menampilkan tampilan data cuti dengan beberapa filter
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal_pengajuan = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('Y-m-d', strtotime($tanggal_pengajuan));
                $url_cetak = 'report/cetak?filter=1&tahun='.$tanggal_pengajuan;
                $transaksi = $this->Report_model->view_by_date($tanggal_pengajuan); // Panggil fungsi view_by_date yang ada di Report_model
                $count=$this->db->query("SELECT count(status) as stats,
                                        count(IF(status = 'Disetujui', status, null)) as statsS,
                                        count(IF(status = 'Ditolak', status, null)) as statsT,
                                        count(IF(status = 'Menunggu', status, null)) as statsM
                                        FROM db_data_cuti 
                                        JOIN db_cuti ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                                        WHERE tanggal_pengajuan='$tanggal_pengajuan'")->result();
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'report/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Report_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_model
                $count=$this->db->query("SELECT count(status) as stats,
                                        count(IF(status = 'Disetujui', status, null)) as statsS,
                                        count(IF(status = 'Ditolak', status, null)) as statsT,
                                        count(IF(status = 'Menunggu', status, null)) as statsM
                                        FROM db_data_cuti 
                                        JOIN db_cuti ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                                        WHERE MONTH(tanggal_pengajuan)='$bulan' 
                                        WHERE YEAR(tanggal_pengajuan)='$tahun'")->result();
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Report_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Report_model
                $count=$this->db->query("SELECT count(status) as stats,
                                        count(IF(status = 'Disetujui', status, null)) as statsS,
                                        count(IF(status = 'Ditolak', status, null)) as statsT,
                                        count(IF(status = 'Menunggu', status, null)) as statsM
                                        FROM db_data_cuti 
                                        JOIN db_cuti ON db_cuti.id_cuti = db_data_cuti.id_cuti 
                                        WHERE YEAR(tanggal_pengajuan)='$tahun'")->result();
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'report/cetak';
            $transaksi =  $this->Report_model->view_all(); // Panggil fungsi view_all yang ada di Report_model
            $count = $this->db->query("SELECT count(status) as stats,
            count(IF(status = 'Disetujui', status, null)) as statsS,
            count(IF(status = 'Ditolak', status, null)) as statsT,
            count(IF(status = 'Menunggu', status, null)) as statsM
            FROM db_data_cuti 
            JOIN db_cuti ON db_cuti.id_cuti = db_data_cuti.id_cuti")->result(); //Jumlah Status
            }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $transaksi;
    $data['count'] = $count;
    // $data['countS'] = $countS;
    // $data['countT'] = $countT;
    // $data['countM'] = $countM;
    $data['option_tahun'] = $this->Report_model->option_tahun();
    $this->load->view('report/view', $data);
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal_pengajuan = $_GET['tanggal'];
                
                $ket = 'Data cuti Tanggal '.date('d-m-y', strtotime($tanggal_pengajuan));
                $transaksi = $this->Report_model->view_by_date($tanggal_pengajuan); // Panggil fungsi view_by_date yang ada di Report_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Cuti Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Report_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_model
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data cuti Tahun '.$tahun;
                $transaksi = $this->Report_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Report_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Cuti';
            $transaksi = $this->Report_model->view_all(); // Panggil fungsi view_all yang ada di Report_model
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        
    ob_start();
    $this->load->view('report/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('L','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Transaksi.pdf', 'D');
  }
}