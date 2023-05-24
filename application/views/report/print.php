<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
            
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="8">
	<tr>
        <th>Tanggal</th>
        <th>Kode Cuti</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Jenis Cuti</th>
        <th>lama Cuti</th>
        <th>Sisa Cuti</th>
        <th>Alasan Cuti</th>
        <th>Alamat Cuti</th>
	</tr>

    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tanggal_pengajuan));

    		echo "<tr>";
    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->id_cuti."</td>";
    		echo "<td>".$data->nama."</td>";
    		echo "<td>".$data->nip."</td>";
            echo "<td>".$data->nama_cuti."</td>";
            echo "<td>".$data->lama_cuti."</td>";
            echo "<td>".$data->sisa_cuti."</td>";
            echo "<td>".$data->alasan_cuti."</td>";
            echo "<td>".$data->alamat_cuti."</td>";
            echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
