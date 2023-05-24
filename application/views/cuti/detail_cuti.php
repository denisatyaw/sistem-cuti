
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url('cuti/data_cuti'); ?>" class="btn btn-primary">  Kembali</a>
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
                    <p class="text-muted font-13 m-b-30">
                    <div class="x_content">
                    <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    <?php
                        foreach($data_cuti as $row){ 
                        ?>

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="nip" id="nip" placeholder="NIP" readonly="readonly" value="<?php echo $row->nip; ?>" />
                            </div>
                      </div>
                      
                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="nama" id="nama" placeholder="Nama" readonly="readonly" value="<?php echo $row->nama; ?>" />
                            </div>
                            <?php echo form_error('nama') ?>
                      </div>

                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="id_jenis" id="id_jenis" placeholder="Tempat Lahir" readonly="readonly" value="<?php echo $row->nama_cuti; ?>" />
                            </div>
                            <?php echo form_error('id_jenis') ?>
                      </div>

                      <div class="form-group">
                            <label for="date" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="tanggal_cuti" id="tanggal_cuti" placeholder="Tanggal Cuti" readonly="readonly" value="<?php echo $row->tanggal_cuti; ?>" />
                            </div>
                            <?php echo form_error('tanggal_cuti') ?>
                      </div>

                      <div class="form-group">
                            <label for="date" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Selesai</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" readonly="readonly" value="<?php echo $row->tanggal_selesai; ?>" />
                            </div>
                            <?php echo form_error('tanggal_selesai') ?>
                      </div>

                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Lama Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="lama_cuti" id="lama_cuti" placeholder="Lama Cuti" readonly="readonly" value="<?php echo $row->lama_cuti; ?> Hari" />
                            </div>
                            <?php echo form_error('lama_cuti') ?>
                      </div>


                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Alasan Cuti </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="alasan_cuti" id="alasan_cuti" placeholder="Alasan" readonly="readonly" value="<?php echo $row->alasan_cuti; ?>" />
                            </div>
                            <?php echo form_error('alasan_cuti') ?>
                      </div>

                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Cuti </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="alamat_cuti" id="alamat_cuti" placeholder="Alamat" readonly="readonly" value="<?php echo $row->alamat_cuti; ?>" />
                            </div>
                            <?php echo form_error('alamat_cuti') ?>
                      </div>

                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Sisa Cuti Tahunan </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="sisa_cuti" id="sisa_cuti" placeholder="Sisa Cuti" readonly="readonly" value="<?php echo $row->sisa_cuti; ?>" />
                            </div>
                            <?php echo form_error('sisa_cuti') ?>
                      </div>

                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="status" id="status" placeholder="Status" readonly="readonly" value="<?php echo $row->status; ?>" />
                            </div>
                            <?php echo form_error('status') ?>
                      </div>

                  
                    
                          <?php 
                          } 
                        ?>
                        </form>
                  </div>

                    
                  
    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/vendors/jquery/dist/jquery.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/vendors/fastclick/lib/fastclick.js'?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assets/vendors/iCheck/icheck.min.js'?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url().'assets/vendors/moment/min/moment.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url().'assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/jquery.hotkeys/jquery.hotkeys.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/google-code-prettify/src/prettify.js'?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url().'assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js'?>"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url().'assets/vendors/switchery/dist/switchery.min.js'?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url().'assets/vendors/select2/dist/js/select2.full.min.js'?>"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url().'assets/vendors/parsleyjs/dist/parsley.min.js'?>"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url().'assets/vendors/autosize/dist/autosize.min.js'?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url().'assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js'?>"></script>
    <!-- starrr -->
    <script src="<?php echo base_url().'assets/vendors/starrr/dist/starrr.js'?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url().'assets/build/js/custom.min.js'?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url().'assets/build/js/custom.min.js'?>"></script>
