<!-- Photo  -->
<link href="<?php echo base_url().'assets/build/css/photo.css'?>" rel="stylesheet">
<?php if($this->session->userdata('role') == 'admin'){ ?>
<div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a style="background-color: #6495ED" class="tile-stats" href="<?php echo base_url('cuti/data_cuti/'); ?>">
                  <div style="color: #fff"class="icon"><i class="fa fa-flag-o"></i></div>
                  <div style="color: #fff" class="count"><?php echo $countCuti ;?></div>
                  <h3 style="color: #fff">Total Cuti</h3>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a style="background-color: #FF1493" class="tile-stats" href="<?php echo base_url('cuti/daftar_cuti_disetujui/'); ?>">
                  <div style="color: #fff" class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div style="color: #fff" class="count"><?php echo $countCutiS ;?></div>
                  <h3 style="color: #fff;">Total Disetujui</h3>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a style="background-color: #FF8C00" class="tile-stats" href="<?php echo base_url('cuti/daftar_cuti_tunggu/'); ?>">
                  <div style="color: #fff" class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div style="color: #fff" class="count"><?php echo $countCutiM ;?></div>
                  <h3 style="color: #fff">Total Menunggu</h3>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a style="background-color: #32CD32" class="tile-stats" href="<?php echo base_url('page/data_pegawai/'); ?>">
                  <div style="color: #fff" class="icon"><i class="fa fa-users"></i></div>
                  <div style="color: #fff" class="count"><?php echo $countPegawai ;?></div>
                  <h3 style="color: #fff">Total Pegawai</h3>
                </a>
              </div>
			  
            </div>
<?php } ?>
            <div class="row">
			
              <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Selamat Datang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				                <?php
                          foreach($profile as $row){ 
                        ?>
                    <h3> <?php echo $row->nama ?></h3>
						<span class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <ul class="list-unstyled user_data">
                              <li>
                                <i class="fa fa-key user-profile-icon"></i> <?php echo $row->nip ?>
                              </li>
                              <li>
                                <i class="fa fa-user user-profile-icon"></i> <?php echo $row->jenis_kelamin ?>
                              </li>
                              <li>
                                <i class="fa fa-calendar user-profile-icon"></i> <?php echo $row->tempat_lahir ?>,</i> <?php echo $row->tanggal_lahir ?>
                              </li>
                              <li>
                                <i class="fa fa-circle user-profile-icon"></i> <?php echo $row->nama_agama ?>
                              </li>
                              <li>
                                <i class="fa fa-phone user-profile-icon"></i> <?php echo $row->no_telp ?>
                              </li>
                              <li>
                                <i class="fa fa-circle user-profile-icon"></i> <?php echo $row->nama_golongan ?>
                              </li>
                              <a class="btn btn-success" href="<?php echo base_url('page/detail_pegawai/'.$row->nip); ?>"><i class="fa fa-user m-right-xs"></i> Lihat Profile</a>
                            </ul>
						</span>
						
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img id="myImg" style="width: 60%; margin:auto; display: block;" src="<?php echo base_url('upload/'.$row->foto)?>" alt="image" />
                          </div>
                          <div class="caption">
                            <center><p><strong><?php echo $row->nama; ?></strong></p>
                            <p><?php echo $row->nama_jabatan; ?></p></center>
                          </div>
                        </div>
                      </div>

                      <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                      </div>
                            
							<?php } ?>
                  </div>
				 </div>
				</div>

                     <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                      </div>

                      <script>
                      // Get the modal
                      var modal = document.getElementById("myModal");

                      // Get the image and insert it inside the modal - use its "alt" text as a caption
                      var img = document.getElementById("myImg");
                      var modalImg = document.getElementById("img01");
                      var captionText = document.getElementById("caption");
                      img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                      }

                      // Get the <span> element that closes the modal
                      var span = document.getElementsByClassName("close")[0];

                      // When the user clicks on <span> (x), close the modal
                      span.onclick = function() { 
                        modal.style.display = "none";
                      }
                      </script>
				
					<style>
						h1,h2,p,a{
							font-family: sans-serif;
							font-weight: normal;
						}
					 
						.jam-digital{
							overflow: hidden;
							width: 60%;
							margin: 0% auto;
							border: 2% solid #efefef;
						}
						.kotak{
							float: left;
							width: 33%;
							height: 60px;
							background-color: #189fff;
						}
						.jam-digital p {
							color: #fff;
							font-size: 3em;
							text-align: center;
							margin-top: 5%;
						}
					 
					 
					</style>

				<div class="col-md-3 col-sm-4 col-xs-6">
				  <div class="x_panel tile fixed_height_320">
					<div class="x_title">
					  <h2>Quick Settings</h2>
					  <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						  </ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					  </ul>
					  <div class="clearfix"></div>
					</div>
					<div class="x_content">
					  <div class="jam-digital" >
						<div class="kotak">
							<p id="jam"></p>
						</div>
						<div class="kotak">
							<p id="menit"></p>
						</div>
						<div class="kotak">
							<p id="detik"></p>
						</div>
						</div>
					 
					 
					<script>
						window.setTimeout("waktu()", 1000);
					 
						function waktu() {
							var waktu = new Date();
							setTimeout("waktu()", 1000);
							document.getElementById("jam").innerHTML = waktu.getHours();
							document.getElementById("menit").innerHTML = waktu.getMinutes();
							document.getElementById("detik").innerHTML = waktu.getSeconds();
						}
					</script>

          
          
					</div>
					</div>
          </div>
          
          <!-- Riwayat Cuti -->
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                  <?php if($this->session->userdata('role') == 'admin'){ ?>
                    <h2>Data Cuti <small></small></h2>
                  <?php }else{ ?>
                    <h2>Riwayat Cuti <small></small></h2>
                  <?php } ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="clearfix"></div>
                    <div class="col-md-15 text-center">
                      <div style="margin-top: 10px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                      </div>
                   </div>


                    <table width="100%" id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th width="18%">Nama</th>
                          <th width="7%">Jenis Cuti</th>
                          <th width="7%">Tanggal Mulai</th>
                          <th width="7%">Tanggal Selesai</th>
                          <th width="7%">Lama Cuti</th>
                          <th width="6%">Sisa Cuti</th>
                          <?php if($this->session->userdata('role') == 'pegawai'){ ?>
                          <th width="6%">Status</th>
                          <?php } ?>
                          <th width="8%">Aksi</th>
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                          <th width="10%">Konfirmasi</th>
                          <?php } ?>
                          <th width="">Form</th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php $i = 1; ?>
                        <?php if($this->session->userdata('role') == 'admin'){ 
                         foreach($cutiT as $row): ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?php echo $row->nama?></td>
                          <td><?php echo $row->nama_cuti?></td>
                          <td><?php echo $row->tanggal_cuti?></td>
                          <td><?php echo $row->tanggal_selesai?></td>
                          <td><?php echo $row->lama_cuti?> Hari</td>
                          <td><?php echo $row->sisa_cuti?> Hari</td>
                          <td>
                          <?php
                          if($row->cetak=='N'){
                            ?>
                                <a class="btn btn-primary btn-xs" data-original-title="Delete" href="<?php echo base_url('admin/konfirmasi_cuti/'.$row->id); ?>"  onclick="return confirm('Konfirmasi Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Konfirmasi" ><i class="fa fa-print"></i></a>
                            <?php 
                          }
                          if($row->status=='Menunggu'){
                          ?>
                          <a class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Detail" href="<?php echo base_url('cuti/detail_cuti/'.$row->id); ?>"> <i class="fa fa-info-circle"></i></a>
                          <!-- <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('cuti/edit_cuti/'.$row->id); ?>"> <i class="fa fa-edit"></i></a> -->
                          <a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo base_url('cuti/hapus_cuti/'.$row->id); ?>"><i class="fa fa-trash"></i></a>
                          
                          <?php
                          }else{
                          ?>
                          <a class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Detail" href="<?php echo base_url('cuti/detail_cuti/'.$row->id); ?>"> <i class="fa fa-info-circle"></i></a>
                          <?php } ?> 
                          <td>
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                          <?php 
                                if($row->status=='Menunggu'){
                                  ?>
                                      <a class="delete-row" data-original-title="Delete" href="<?php echo base_url('admin/konfirmasi_cuti/'.$row->id); ?>"  onclick="return confirm('Konfirmasi Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Konfirmasi" >
                                            <i class="btn btn-primary btn-xs">Konfirmasi</i>
                                      </a>
                                      <a class="delete-row" data-original-title="Delete" href="<?php echo base_url('admin/konfirmasi_cuti_tolak/'.$row->id); ?>"  onclick="return confirm('Tolak Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Tolak" >
                                            <i class="btn btn-danger btn-xs">Tolak</i>
                                      </a>

                                  <?php
                                }else{
                                  ?>                                
                                        <i class="btn btn-dark btn-xs">Telah-Dikonfirmasi</i>
                                  <?php
                                }
                               ?>
                              <?php } ?>
                          </td>
                          <td>
                                <?php
                                if($row->status=='Disetujui'){
                                ?>
                                <a class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cetak" href="<?php echo base_url('cetak/cetak_cuti/'.$row->id); ?>"><i class="fa fa-print"></i> Cetak</a>
                                <?php
                                }else{
                                        ?>
                                          <button class="btn btn-default btn-xs" disabled><i class="fa fa-print" disabled></i> Cetak </button>
                                <?php } ?>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; }else{ 
                        foreach($cuti as $row): ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?php echo $row->nama?></td>
                          <td><?php echo $row->nama_cuti?></td>
                          <td><?php echo $row->tanggal_cuti?></td>
                          <td><?php echo $row->tanggal_selesai?></td>
                          <td><?php echo $row->lama_cuti?> Hari</td>
                          <td><?php echo $row->sisa_cuti?> Hari</td>
                          <td>
                                <?php 
                                if($row->status=='Menunggu'){
                                  ?>
                                     <btn class="btn-xs btn-warning">Menunggu</btn>

                                  <?php
                                }else{
                                  if($row->status=='Disetujui'){
                                    ?>                                
                                      <btn class="btn-xs btn-success btn-icon-pg">Disetujui</btn>
                                    <?php
                                  }else{
                                      ?>
                                        <btn class="btn-xs btn-danger btn-icon-pg">Ditolak</btn>
                                      <?php
                                  }
                                }
                               ?>      
                          </td>
                          
                          <td>
                          <?php
                          if($row->status=='Menunggu'){
                          ?>
                          <a class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Detail" href="<?php echo base_url('cuti/detail_cuti/'.$row->id); ?>"> <i class="fa fa-info-circle"></i></a>
                          <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('cuti/edit_cuti/'.$row->id); ?>"> <i class="fa fa-edit"></i></a>
                          <a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo base_url('cuti/hapus_cuti/'.$row->id); ?>"><i class="fa fa-trash"></i></a>
                          
                          <?php
                          }else{
                          ?>
                          <a class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Detail" href="<?php echo base_url('cuti/detail_cuti/'.$row->id); ?>"> <i class="fa fa-info-circle"></i></a>
                          <?php } ?> 
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                          <td>
                          <?php 
                                if($row->status=='Menunggu'){
                                  ?>
                                      <a class="delete-row" data-original-title="Delete" href="<?php echo base_url('admin/konfirmasi_cuti/'.$row->id); ?>"  onclick="return confirm('Konfirmasi Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Konfirmasi" >
                                            <i class="btn btn-primary btn-xs">Konfirmasi</i>
                                      </a>
                                      <a class="delete-row" data-original-title="Delete" href="<?php echo base_url('admin/konfirmasi_cuti_tolak/'.$row->id); ?>"  onclick="return confirm('Tolak Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Tolak" >
                                            <i class="btn btn-danger btn-xs">Tolak</i>
                                      </a>

                                  <?php
                                }else{
                                  ?>                                
                                        <i class="btn btn-dark btn-xs">Telah-Dikonfirmasi</i>
                                  <?php
                                }
                               ?>
                             </td>
                          <?php } ?>
                          <td>
                                <?php
                                if($row->status=='Disetujui'){
                                ?>
                                <a class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cetak" href="<?php echo base_url('cetak/cetak_cuti/'.$row->id); ?>"><i class="fa fa-print"></i> Cetak</a>
                                <?php
                                }else{
                                        ?>
                                          <button class="btn btn-default btn-xs" disabled><i class="fa fa-print" disabled></i> Cetak </button>
                                <?php } ?>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- Riwayat Cuti -->    
	
