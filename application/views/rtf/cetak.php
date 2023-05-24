
<?php
//buka file rtf
$template = "rtf/template/cuti.rtf";
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
echo '<a href="'.$hasil.'">Hasil</a>'
?>