
        <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Profile </h2>
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


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ubah Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Ubah Password</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <span class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        
                        <?php
                          foreach($profile as $row){ 
                        ?>

                            <div class="profile_img">
                              <div id="crop-avatar">
                               </div>
                            </div>
                            <h3> <?php echo $row->nama ?></h3>

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
                                <i class="fa fa-calendar-o user-profile-icon"></i> <?php echo $row->tmt ?>
                              </li>
                              <li>
                                <i class="fa fa-phone user-profile-icon"></i> <?php echo $row->no_telp ?>
                              </li>
                              <li>
                                <i class="fa fa-circle user-profile-icon"></i> <?php echo $row->nama_agama ?>
                              </li>
                              <li>
                                <i class="fa fa-pencil user-profile-icon"></i> <?php echo $row->nama_golongan ?>
                              </li>
                              <li>
                                <i class="fa fa-check-circle user-profile-icon"></i> <?php echo $row->nama_jabatan ?>
                              </li>

                              
                            </ul>
                            <div class="col-md-6 col-sm-3 col-xs-12">
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
                            <br />

                          <?php 
                            } 
                          ?>
                          </span>
                          </div>
                          
                          
                          
                          
                        

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <?php
                        foreach($profile as $row){ 
                        ?>
                        <form class="form-horizontal" action="<?php echo base_url('page/profile_action') ?>" method="POST" enctype="multipart/form-data">
                          
						  <div class="form-group">
                            <label class="col-sm-3 control-label">NIP</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" placeholder="NIP" <?php echo $readonly ?> id="nip" name="nip" value="<?php echo $this->session->userdata('nip'); ?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                            </div>
                          </div>

                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $this->session->userdata('username'); ?>" />
                            </div>
                          </div>
                          

                          <div class="form-group">
                            <label for="varchar" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-5">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="jenis_kelamin" value="Laki-laki"> &nbsp; Laki-laki &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                </label>
                              </div>
                            </div>
                            <?php echo form_error('jenis_kelamin') ?>
                          </div>

                          <div class="form-group">
                            <label for="varchar" class="col-sm-3 control-label">Tempat Lahir </label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                            </div>
                            <?php echo form_error('tempat_lahir') ?>
                          </div>

                          <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Tanggal Lahir </label>
                                <div class="col-sm-2">
                                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
                                </div>
                                <?php echo form_error('tanggal_lahir') ?>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">TMT</label>
                            <div class="col-sm-2">
                            <input type="date" class="form-control" name="tmt" id="tmt" placeholder="Tmt" value="<?php echo $tmt; ?>" />
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Jabatan</label>
                            <div class="col-sm-5">
                            <select class="form-control" name="id_jabatan" id="id_jabatan">
                                <?php foreach ($jabatan as $j) : ?>
                                  <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">No Telp</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomer Telepon" value="<?php echo $no_telp; ?>" />
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="varchar" class="col-sm-3 control-label">Agama </label>
                            <div class="col-sm-5">
                              <select class="form-control" name="id_agama" id="id_agama">
                                <?php foreach ($agama as $a) : ?>
                                  <option value="<?= $a['id_agama']; ?>"><?= $a['nama_agama']; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <?php echo form_error('id_agama') ?>
                          </div>

                          <div class="form-group">
                                <label for="int"  class="col-sm-3 control-label">Jabatan </label>
                                <div class="col-sm-5">
                                  <select class="form-control" name="id_jabatan" id="id_jabatan">
                                    <?php foreach ($jabatan as $j) : ?>
                                      <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <?php echo form_error('id_jabatan') ?>
                          </div>

                          <div class="form-group">
                                <label for="int" class="col-sm-3 control-label">Golongan </label>
                                <div class="col-sm-5">
                                  <select class="select2_single form-control" tabindex="-1" name="id_golongan" id="id_golongan">
                                    <?php foreach ($golongan as $g) : ?>
                                      <option value="<?= $g['id_golongan']; ?>"><?= $g['nama_golongan']; ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <?php echo form_error('id_golongan') ?>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Foto</label>
                            <div class="col-sm-5">
                              <input type="file" class="form-control" placeholder="Foto" name="photo">
                            </div>
                          </div>
                          
              
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Update</button>
                            </div>
                          </div>
                        </form>
                        <?php 
                          } 
                        ?>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="home-tab">
                        <form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
                          <div class="form-group">
                            <label for="passLama" class="col-sm-3 control-label">Password Lama</label>
                            <div class="col-sm-5">
                              <input type="password" class="form-control" placeholder="Password Lama" name="passLama">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="passBaru" class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-5">
                              <input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="passKonf" class="col-sm-3 control-label">Konfirmasi Password</label>
                            <div class="col-sm-5">
                              <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
                            </div>
                          </div>
              
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
                            </div>
                          </div>
                        </form>  
                        </div>
						</div>
						</div>
                    </div>
                    </div>

                  </div>
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
