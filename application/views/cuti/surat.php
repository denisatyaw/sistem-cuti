<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">-->
<style type="text/css">
div {
    margin: 8px;
	font-face:Arial;
}
table {
    margin: 8px;
	font-face:Arial;
}
</style>
<!-- <?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}?> -->



<?php
	foreach($cuti as $row){
?>

<div style='text-align:left; text-indent: 120px; font-size:8; line-height: 5px;'>
LAMPIRAN II : SURAT EDARAN SEKRETARIS MAHKAMAH AGUNG</div>
<div style='text-align:left; text-indent: 195px; font-size:8; line-height: 5px;' >
REPUBLIK INDONESIA</div>
<div style='text-align:left; text-indent: 195px; font-size:8; line-height: 5px;' >
NOMOR 13 TAHUN 2019</div>
<br>

<div style='text-align:left; text-indent: 460px; font-size:8; line-height: 5px;' >

<?php setlocale(LC_TIME, 'id_ID.UTF8', 'Indonesian_indonesia', 'Indonesian');
$value =  $row->tanggal_pengajuan;
$value = strtotime($value);
$tanggal =strftime("%d %B %Y", date($value));
?>

Karanganyar, <?php echo $tanggal;?>
</div>
<div style='text-align:left; text-indent: 440px; font-size:8; line-height: 5px;' >
Yth. Ketua Pengadilan Negeri Karanganyar</div>
<div style='text-align:left; text-indent: 460px; font-size:8; line-height: 5px;' >
Kelas II</div>
<div style='text-align:left; text-indent: 460px; font-size:8; line-height: 5px;' >
di</div>
<div style='text-align:left; text-indent: 460px; font-size:8; line-height: 5px;' >
KARANGANYAR</div>

<br>
<div style='text-align:center;  font-size:9;'>
FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</div>

<style type="text/css">
    thead
    {
        background-color:#D3D3D3;
		font-size:9;
    }
	td{
		font-size:9;
	}
	tr{
		font-size:9;
	}
	</style>
	<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="7">I. DATA PEGAWAI</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>NAMA</td>
        <td colspan="3"><?php echo $row->nama ?></td>
        <td>NIP</td>
        <td colspan="2"><?php echo $row->nip ?></td>
    </tr>
    <tr>
        <td width='20%'>JABATAN</td>
        <td colspan="3"><?php echo $row->nama_jabatan ?></td>
		<td >GOL. RUANG</td>
        <td colspan="2"><?php echo $row->nama_golongan ?></td>
        
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>UNIT KERJA</td>
        <td colspan="3" >PENGADILAN NEGERI KARANGANYAR</td>
		<td>MASA KERJA</td>
        <td colspan="2"><?php 
				$diff  = date_diff( date_create($row->tmt), date_create() );
				echo $diff->format('%Y tahun %m bulan'); ?></td>
    </tr>
    </tfoot>
</table>

<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="4">II. JENIS CUTI YANG DIAMBIL **</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1. CUTI TAHUNAN</td>
        <td style='text-align:center;'><?php if($row->id_jenis == "1"){
			$hasil ="v";
			echo $hasil;
		}?></td>
        <td>2. CUTI BESAR</td>
        <td style='text-align:center;'><?php if($row->id_jenis == "2"){
			$hasil ="v";
			echo $hasil;
		}?></td>
    </tr>
    <tr>
        <td>3. CUTI SAKIT</td>
        <td style='text-align:center;'><?php if($row->id_jenis == "3"){
			$hasil ="v";
			echo $hasil;
		}?></td>
        <td>4. CUTI MELAHIRKAN</td>
        <td style='text-align:center;'><?php if($row->id_jenis == "4"){
			$hasil ="v";
			echo $hasil;
		}?></td>
    </tr>
	<tr>
        <td>5. CUTI ALASAN PENTING</td>
        <td style='text-align:center;'><?php if($row->id_jenis == "5"){
			$hasil ="v";
			echo $hasil;
		}?></td>
        <td>6. CUTI DILUAR TANGGUNGAN NEGARA</td>
        <td style='text-align:center;'><?php if($row->id_jenis == "6"){
			$hasil ="v";
			echo $hasil;
		}?></td>
    </tr>
    </tbody>
</table>

<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th >III. ALASAN CUTI </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $row->alasan_cuti;?></td>
    </tr>
    </tbody>
</table>

<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="6">IV. LAMANYA CUTI </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Selama</td>
		<td><?php echo $row->lama_cuti;?> (hari/<strike>bulan/tahun</strike>)*</td>
		<td>Mulai Tanggal</td>
		<td><?php echo $row->tanggal_cuti;?></td>
		<td>s/d</td>
		<td><?php echo $row->tanggal_selesai;?></td>
    </tr>
    </tbody>
</table>

<?php $sisa2 = "";?>
<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="7">V. CATATAN CUTI ***</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style='text-align:left;' colspan="3" width='30%' style='font-size:10;'>1. CUTI TAHUNAN</td>
		<td style='text-align:center;' 'font-size:8;' rowspan="2">PARAF<br>PETUGAS CUTI</td>
		<td style='font-size:9;'colspan="2">2. CUTI BESAR</td>
		<td style='text-align:center;'><?php if($row->id_jenis == "2"){
			$hasil =$row->sisa_cuti;
			echo $hasil;
		}?>
    </tr>
	<tr>
        <td>Tahun</td>
		<td>Sisa</td>
		<td>Keterangan</td>
		<td style='font-size:9;' colspan="2">3. CUTI SAKIT</td>
		<td style='text-align:center;' ><?php if($row->id_jenis == "3"){
			$hasil =$row->sisa_cuti;
			echo $hasil;
		}?>
    </tr>
	<tr>
        <td>20..</td>
		<td style='text-align:center;'><?php
		$var = "";
		$sisa2 = "";
		$sisa3 = "";
		$var= floatval('$row->sisa_cuti');
		if($row->id_jenis == "1"){
			if(floatval('$row->sisa_cuti') > 18){
				$sisa2=floatval('$row->sisa_cuti') - 18;
			}else{
				$var=floatval('$row->sisa_cuti');
			}
			echo $sisa2;
			$sisa3=floatval('$var-$sisa2');
		}?></td>
		<td> </td>
		
		<td style='font-size:8;' rowspan="3" 'text-align:center;'></td>
		<td style='font-size:9;' colspan="2">4. CUTI MELAHIRKAN</td>
		<td style='text-align:center;'><?php if($row->id_jenis == "4"){
			$hasil =$row->sisa_cuti;
			echo $hasil;
		}?>
    </tr>
	
	<tr>
        <td>20..</td>
		<td style='text-align:center;'><?php if($row->id_jenis == "1"){
			$hasil =$row->sisa_cuti;
			if($row->sisa_cuti > 18){
				$sisa4=$sisa3-12;
				echo $sisa4;
				$sisa5=$var-$sisa2-$sisa4;
			}else if($row->sisa_cuti <= 18 && $row->sisa_cuti > 12){
				$sisa4=$row->sisa_cuti - 12;
				echo $sisa4;
				$sisa5=$var-$sisa4;
			}else{
				$sisa5=$row->sisa_cuti;
			}
		}?></td>
		<td> </td>
		<td style='font-size:9;' colspan="2">5. CUTI KARENA ALASAN PENTING</td>
		<td style='text-align:center;'><?php if($row->id_jenis == "5"){
			$hasil =$row->sisa_cuti;
			echo $hasil;
		}?>
    </tr>
	
	<tr>
        <td>20..</td>
		<td style='text-align:center;'><?php if($row->id_jenis == "1"){
			$hasil =$row->sisa_cuti;
			if($row->sisa_cuti >= 12){
				echo $sisa5;
			}else{
				$sisa5=$row->sisa_cuti;
				echo $sisa5;
			}
		}?></td>
		<td> </td>
		<td style='font-size:9;' colspan="2">6. CUTI DILUAR TANGGUNGAN NEGARA</td>
		<td style='text-align:center;'><?php if($row->id_jenis == "6"){
			$hasil =$row->sisa_cuti;
			echo $hasil;
		}?>
    </tr>
    </tbody>
</table>

<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="3">VI. ALAMAT SELAMA MENJALANKAN CUTI </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td width="60%" rowspan="2"><?php echo $row->alamat_cuti;?></td>
		<td width=20p>telp. </td>
		<td><?php echo $row->no_telp?></td>
    </tr>
	<tr>
	<td style='text-align:center;' style='font-size:8;' colspan="2">Hormat Saya
		<br>
		<br><?php echo $row->nama?>
		<br>NIP. <?php echo $row->nip?>
		</td></tr>
    </tbody>
</table>

<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG**</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style='font-size:8;'>DISETUJUI</td>
		<td style='font-size:8;'>PERUBAHAN****</td>
		<td style='font-size:8;'>DITANGGUHKAN****</td>
		<td style='font-size:8;'>TIDAK DISETUJUI****</td>
    </tr>
	<tr >
		<td height="3%"></td>
		<td height="3%"></td>
		<td height="3%"></td>
		<td height="3%"></td>
	</tr>
	<tr>
		<td colspan="3"></td>
		<td style='text-align:center; font-size:8;'><br><br>
		<?php if($row->id_jabatan == "8"){
		foreach($atasan as $row){ 
			echo $row->nama ?>
		<br>NIP. 
		<?php echo $row->nip?>
		<?php }}else if($row->id_jabatan == "10"){
		foreach($atasan1 as $row1){ 
			echo $row1->nama ?>
		<br>NIP. 
		<?php echo $row1->nip?>
		<?php }}else if($row->id_jabatan == "15"){
		foreach($atasan2 as $row2){ 
			echo $row2->nama ?>
		<br>NIP. 
		<?php echo $row2->nip?>
		<?php }}else if($row->id_jabatan == "14"){
		foreach($atasan3 as $row3){ 
			echo $row3->nama ?>
		<br>NIP. 
		<?php echo $row3->nip?>
		<?php }}else if($row->id_jabatan == "18"){
		foreach($atasan4 as $row4){ 
			echo $row4->nama ?>
		<br>NIP. 
		<?php echo $row4->nip?>
		<?php }}else if($row->id_jabatan == "18"){
		foreach($atasan4 as $row4){ 
			echo $row4->nama ?>
		<br>NIP. 
		<?php echo $row4->nip?>
		<?php }}
		else if($row->id_jabatan == "13" || $row->id_jabatan == "11" || $row->id_jabatan == "12"){
		foreach($atasan5 as $row5){ 
			echo $row5->nama ?>
		<br>NIP. 
		<?php echo $row5->nip?>
		<?php }}else{
			foreach($ketua as $row){ echo $row->nama?>
		<br>NIP. <?php echo $row->nip?></td><?php }}?></td>
	</tr>
    </tbody>
</table>

<table width="100%" rules="all" border="1">
    <thead>
    <tr>
        <th colspan="4">VII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style='font-size:8;'>DISETUJUI</td>
		<td style='font-size:8;'>PERUBAHAN****</td>
		<td style='font-size:8;'>DITANGGUHKAN****</td>
		<td style='font-size:8;'>TIDAK DISETUJUI****</td>
    </tr>
	<tr >
		<td height="3%"></td>
		<td height="3%"></td>
		<td height="3%"></td>
		<td height="3%"></td>
	</tr>
	<tr>
		<td colspan="3"></td>
		<td style='text-align:center; font-size:8;'><br>
		<br><br>
	<?php
	foreach($ketua as $row){ echo $row->nama?>
	<br>NIP. <?php echo $row->nip?></td><?php }?>
	</tr>
    </tbody>
</table>
<br>
<div style='text-align:left; font-size:6; line-height: 2px;'>
Catatan    :</div>
<div style='text-align:left;  font-size:6; line-height: 2px;' >
*    Coret yang tidak perlu</div>
<div style='text-align:left; font-size:6; line-height: 2px;' >
**   Pilih satu dengan memberi tanda v</div>
<div style='text-align:left;  font-size:6; line-height: 2px;' >
***  Diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti</div>
<div style='text-align:left;  font-size:6; line-height: 2px;' >
**** Diberi tanda centang dan alasannya</div>
<?php } ?>