
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url('page/data_pegawai'); ?>" class="btn btn-primary">  Kembali</a>
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
                    <p class="text-muted font-13 m-b-30"></p>
                    <div class="x_content">
                    <form  id="demo-form2" data-parsley-validate class="form-label-left input_mask" >
                    <?php
                        foreach($pegawai as $row){ 
                        ?>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="nip">NIP</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="nip" id="nip" placeholder="NIP" readonly="readonly" value="<?php echo $row->nip; ?>" />
                            </div>
                      </div>
                      
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Nama </label>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="nama" id="nama" placeholder="Nama" readonly="readonly" value="<?php echo $row->nama; ?>" />
                            </div>
                            <?php echo form_error('nama') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Tempat Lahir </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" readonly="readonly" value="<?php echo $row->tempat_lahir; ?>" />
                            </div>
                            <?php echo form_error('tempat_lahir') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="date" class="control-label col-md-1 col-sm-3 col-xs-12">Tanggal Lahir </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" readonly="readonly" value="<?php echo $row->tanggal_lahir; ?>" />
                            </div>
                            <?php echo form_error('tanggal_lahir') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="date" class="control-label col-md-1 col-sm-3 col-xs-12">Tmt </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="tmt" id="tmt" placeholder="Tmt" readonly="readonly" value="<?php echo $row->tmt; ?>" />
                            </div>
                            <?php echo form_error('tmt') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="date" class="control-label col-md-1 col-sm-3 col-xs-12">Masa Kerja </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja" readonly="readonly" value="<?php $diff = date_diff(date_create($row->tmt),date_create()); echo $diff->format('%Y Tahun %m Bulan'); ?>" />
                            </div>
                            <?php echo form_error('masa_kerja') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Jenis Kelamin </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" readonly="readonly" value="<?php echo $row->jenis_kelamin; ?>" />
                            </div>
                            <?php echo form_error('jenis_kelamin') ?>
                      </div>


                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">No Telp </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="no_telp" id="no_telp" placeholder="Nomer Telepon" readonly="readonly" value="<?php echo $row->no_telp; ?>" />
                            </div>
                            <?php echo form_error('no_telp') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Agama </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="agama" id="agama" placeholder="Agama" readonly="readonly" value="<?php echo $row->nama_agama; ?>" />
                            </div>
                            <?php echo form_error('agama') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Golongan </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="golongan" id="golongan" placeholder="Golongan" readonly="readonly" value="<?php echo $row->nama_golongan; ?>" />
                            </div>
                            <?php echo form_error('golongan') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Jabatan </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="jabatan" id="jabatan" placeholder="Jabatan" readonly="readonly" value="<?php echo $row->nama_jabatan; ?>" />
                            </div>
                            <?php echo form_error('jabatan') ?>
                      </div>
                      
                      <div class="col-md-12 col-sm-6  form-group has-feedback">
                      <label for="varchar" class="control-label col-md-1 col-sm-3 col-xs-12">Foto </label>
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img id="myImg" style="width: 50%; margin:auto; display: block;" src="<?php echo base_url('upload/'.$row->foto)?>" alt="image" />
                            
                          </div>
                          <div class="caption">
                            <p><strong><?php echo $row->nama; ?></strong>
                            </p>
                            <p><?php echo $row->nama_jabatan; ?></p>
                          </div>
                        </div>
                      </div>

                      <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                      </div>
                    

                      <?php 
                          } 
                        ?>
                      </form>
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
                  
                      <!--
                        <table class="table">
                              <tr><td>NIP</td><td><?php echo $row->nip; ?></td></tr>
                              <tr><td>Nama</td><td><?php echo $row->nama; ?></td></tr>
                              <tr><td>Tempat Lahir</td><td><?php echo $row->tempat_lahir; ?></td></tr>
                              <tr><td>Tanggal Lahir</td><td><?php echo $row->tanggal_lahir; ?></td></tr>
                              <tr><td>TMT</td><td><?php echo $row->tmt; ?></td></tr>
                              <tr><td>Jenis Kelamin</td><td><?php echo $row->jenis_kelamin; ?></td></tr>
                              <tr><td>No Telp</td><td><?php echo $row->no_telp; ?></td></tr>
                              <tr><td>Agama</td><td><?php echo $row->nama_agama; ?></td></tr>
                              <tr><td>Golongan</td><td><?php echo $row->nama_golongan; ?></td></tr>
                              <tr><td>Jabatan</td><td><?php echo $row->nama_jabatan; ?></td></tr>
                              <td></td><td><a href="<?php echo site_url('page/data_pegawai') ?>" class="btn btn-primary">Back</a></td></tr>
                          </table>
                        -->
                  </div>
                  </div>        
                  </div>

                    
    <!-- Photo  -->
    <link href="<?php echo base_url().'assets/build/css/photo.css'?>" rel="stylesheet">
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
    