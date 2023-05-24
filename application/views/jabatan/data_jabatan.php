

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php
                      // Cek role user
                      if($this->session->userdata('role') == 'admin'){ 
                        ?>
                          <a href="<?php echo base_url('page/input_jabatan'); ?>" class="btn btn-primary">  Tambah Jabatan</a>
                        <?php
                      }
                  ?>  
                  <div class="nav navbar-right panel_toolbox">
                    <!--
                      <form action="<?php echo site_url('page/show'); ?>" class="form-inline" method="get">
                        
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('page'); ?>" class="btn btn-default">Reset</a>
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
                      <div style="margin-top: 10px" id="notifications">
                        <?php echo $this->session->flashdata('message'); ?>
                      </div>
                  <div class="clearfix"></div>
                    <div class="col-md-15 text-center">
                    
                      <!-- <div style="margin-top: 10px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                      </div>
                      <script>   
                        $('#message').slideDown('slow').delay(3000).slideUp('slow');
                         -->
                    </script>
                   </div>

                    <table width="100%" id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th width="40%">Jabatan</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($db_jabatan_data as $row): ?>
                      
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?php echo $row->nama_jabatan?></td>
                          <td> 
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                            <a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('page/edit_jabatan/'.$row->id_jabatan); ?>"> <i class="fa fa-edit"></i></a>
                          <?php } ?>
                          
                          <?php if($this->session->userdata('role') == 'admin'){ ?>
                            <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo base_url('page/hapus_jabatan/'.$row->id_jabatan); ?>"><i class="fa fa-trash"></i></a>
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
