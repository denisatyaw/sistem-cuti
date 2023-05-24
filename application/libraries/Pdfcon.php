<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
class pdfcon{
	protected $ci;
	
	public function __construct(){
		$this->ci =& get_instance();
	}
	public function generate($view, $data = array(), $filename = 'SuratCuti_', 
	$paper = 'Legal', $orientation = 'portait'){
		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		
		$dompdf->stream($filename.date('Y-m-d H:i:s').".pdf", array("Attachment" => FALSE));
	}
}
?>