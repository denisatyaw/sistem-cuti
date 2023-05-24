
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url('page/home'); ?>" class="btn btn-primary">  Beranda</a>
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
                    <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                      
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" <?php echo $readonly; ?> name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
                            </div>
                            <?php echo form_error('nip') ?>
                      </div>
                      
                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="username" id="username" placeholder="Masukan Username" value="<?php echo $username; ?>" />
                            </div>
                            <?php echo form_error('username') ?>
                      </div>

                      <div class="form-group">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Nama </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                            </div>
                            <?php echo form_error('nama') ?>
                      </div>

                      <!--
                      <div class="form-group">
                        <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" type="file" name="image" />
                          <input type="hidden" name="old_image" value="" />
                        </div>
                        <?php echo form_error('foto') ?>
                      </div>
                      
                      <div class="form-group">
                            <label for="int"  class="control-label col-md-3 col-sm-3 col-xs-12">Id Jabatan </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_jabatan" id="id_jabatan">
                                <?php foreach ($jabatan as $j) : ?>
                                  <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <?php echo form_error('id_jabatan') ?>
                      </div>
                      -->

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <a href="<?php echo site_url('page/data_pegawai') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                      </div>
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
