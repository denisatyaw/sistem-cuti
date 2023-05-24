
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  
                          <a href="<?php echo base_url('cuti/pengajuan_cuti'); ?>" class="btn btn-primary">  Pengajuan Cuti</a>
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                          <a href="<?php echo base_url('report'); ?>" class="btn btn-success">  Laporan Cuti</a>
                          <?php } ?>
                  <div class="nav navbar-right panel_toolbox">
                    <!--
                      <form action="<?php echo site_url('cuti/show'); ?>" class="form-inline" method="get">
                        
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('cuti'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                ?>
                              <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                        -->
                    </form>
                    </div>
                    
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
                          <th width="7%">Tanggal Pengajuan</th>
                          <th width="7%">Lama Cuti</th>
                          <th width="7%">Sisa Cuti</th>
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
                        <?php foreach($cuti as $row): ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?php echo $row->nama?></td>
                          <td><?php echo $row->nama_cuti?></td>
                          <td><?php echo $row->tanggal_cuti?></td>
                          <td><?php echo $row->tanggal_selesai?></td>
                          <td><?php echo $row->tanggal_pengajuan?></td>
                          <td><?php echo $row->lama_cuti?> Hari</td>
                          <td><?php echo $row->sisa_cuti?> Hari</td>
                          <?php if($this->session->userdata('role') == 'pegawai'){ ?>
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
                              <?php } ?>
                          
                          <td>
                          <?php
                          if($this->session->userdata('role') == 'admin'){
                            if($row->cetak=='N'){
                              ?>
                                  <a class="btn btn-primary btn-xs" data-original-title="Delete" href="<?php echo base_url('admin/konfirmasi_cuti/'.$row->id); ?>"  onclick="return confirm('Konfirmasi Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Konfirmasi" ><i class="fa fa-print"></i></a>
                              <?php 
                            }
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
                          </td> 
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                          <td>
                          <?php 
                                if($row->status=='Menunggu'){
                                  ?>
                                      <a class="btn btn-primary btn-xs" data-original-title="Delete" href="<?php echo base_url('admin/cuti_success/'.$row->id); ?>"  onclick="return confirm('Konfirmasi Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Konfirmasi" >Konfirmasi</a>
                                            
                                      
                                      <a class="btn btn-danger btn-xs" data-original-title="Delete" href="<?php echo base_url('admin/cuti_failed/'.$row->id); ?>"  onclick="return confirm('Tolak Pengajuan Cuti?')" data-toggle="tooltip" data-placement="top" title="Tolak" >
                                            Tolak</a>
                                      
                                  <?php
                                }else{
                                  ?>                                
                                        <a class="btn btn-success btn-xs">Disetujui</a>
                                  <?php
                                }
                               ?>
                          </td>
                          <?php } ?>
                          <td>
                                <?php
                                
                                if($row->cetak=='Y'){
                                ?>
                                <a class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cetak" href="<?php echo base_url('cetak/cetak_pengajuan/'.$row->id); ?>"><i class="fa fa-print"></i> Cetak</a>
                                <?php
                                }else{
                                        ?>
                                          <button class="btn btn-default btn-xs" disabled><i class="fa fa-print" disabled></i> Cetak </button>
                                <?php } ?>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                    <!--
                    <div class="row">
                      <div class="col-md-6">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	                    </div>
                      <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                      </div>
                    </div>
                     -->

                    

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/vendors/jquery/dist/jquery.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/vendors/fastclick/lib/fastclick.js'?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assets/vendors/iCheck/icheck.min.js'?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url().'assets/vendors/datatables.net/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.'?>js"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-buttons/js/buttons.print.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/jszip/dist/jszip.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/pdfmake/build/pdfmake.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/pdfmake/build/vfs_fonts.js'?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url().'assets/build/js/custom.min.js'?>"></script>
