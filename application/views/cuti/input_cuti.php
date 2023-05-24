

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
      <?php if($this->session->userdata('role') == 'admin'){ ?>
        <a href="<?php echo base_url('cuti/data_cuti'); ?>" class="btn btn-primary">  Kembali</a>
      <?php }else { ?>
        <a href="<?php echo base_url('cuti/riwayat_cuti'); ?>" class="btn btn-primary">  Kembali</a>
      <?php } ?>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a></li>
              <li><a href="#">Settings 2</a></li>
              </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
        <div class="clearfix">
      </div>

                <div class="x_content">
                  <p class="text-muted font-13 m-b-30">
                    <div class="x_content">
                    
                    <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                    <!-- INPUT NIP BY ADMIN DROPDOWN -->
                    <?php if($this->session->userdata('role') == 'admin'){ ?>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="int"  class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="nip" id="nip">
                                <?php foreach ($pegawai as $p) : ?>
                                  <option value="<?= $p['nip']; ?>"><?= $p['nama']; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <?php echo form_error('nip') ?>
                      </div>

                      <input type="hidden" name="status" id="status" value="Menunggu" />
                      <input type="hidden" name="cetak" id="status" value="" />

                      <!-- INPUT NIP BY USER AUTO -->
                      <?php }else { ?>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-12 col-xs-12" for="nip">NIP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" <?php echo $readonly; ?> name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
                            </div>
                            <?php echo form_error('nip') ?>
                      </div>

                      
                      
                      <input type="hidden" name="status" id="status" value="Menunggu" /> 
                      <input type="hidden" name="cetak" id="status" value="N" />
                      <?php } ?> 


                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <label class="control-label col-md-3 col-sm-12 col-xs-12"  for="lama_cuti">Tanggal Mulai</label>
                      <div class="input-group date col-md-3 col-sm-12 col-xs-12"  id="tanggal_cuti">
                       <input type="text" class="form-control"  name="tanggal_cuti" id="tanggal_cuti" value="<?php echo $tanggal_cuti; ?>"/>	
                            <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                        </div>
                        <?php echo form_error('tanggal_cuti') ?>
                      </div>

                      
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-12 col-xs-12" for="id_cuti">Id Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" <?php echo $readonly; ?> name="id_cuti" id="id_cuti" placeholder="NIP" value="<?php echo $kode; ?>" />
                            </div>
                            <?php echo form_error('id_cuti') ?>
                      </div>
                 
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <label class="control-label col-md-3 col-sm-12 col-xs-12" for="lama_cuti">Tanggal Selesai</label>
                        <div class="input-group date col-md-3 col-sm-13 col-xs-12" id="tanggal_selesai">
                          <input type="text" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="<?php echo $tanggal_selesai; ?>"/>	
                            <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                        </div>
                        <?php echo form_error('tanggal_selesai') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_jenis" id="id_jenis" >
                                <?php foreach ($jenis as $j) : ?>
                                  <option value="<?= $j['id_jenis']; ?>"><?= $j['nama_cuti']; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <?php echo form_error('id_jenis') ?>
                      </div>
                      
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-12 col-xs-12" for="lama_cuti">Lama Cuti<span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" <?php echo $readonly; ?> name="lama_cuti" id="lama_cuti" placeholder="0 Hari" value="" />
                            </div>
                            <?php echo form_error('lama_cuti') ?>
                      </div>
 

                      
                      
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Alasan Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control col-md-7 col-xs-12" rows="3" name="alasan_cuti" id="alasan_cuti" placeholder="Alasan Cuti" value="<?php echo $alasan_cuti; ?>" #disable></textarea>
                            </div>
                            <?php echo form_error('alasan_cuti') ?>
                      </div>
                      
                      <!-- <script>
                          function manage(id_jenis) {
                              var al = document.getElementById('alasan_cuti');
                              if (id_jenis.value != '3') {
                                  al.disabled = false;
                              }
                              else {
                                  al.disabled = true;
                              }
                          }    
                      </script> -->
                      
                      
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label for="varchar" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Cuti</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control col-md-7 col-xs-12" rows="3" name="alamat_cuti" id="alamat_cuti" placeholder="Alamat Cuti" value="<?php echo $alamat_cuti; ?>"></textarea>
                            </div>
                            <?php echo form_error('alamat_cuti') ?>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-12 col-xs-12" for="lama_cuti">Sisa Cuti<span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="sisa_cuti" id="sisa_cuti" <?php if ($sisa_cuti == ""){ ?> value="12"  <?php  }else{ ?> value="<?php echo $sisa_cuti; ?>" <?php } ?> /> 
                            </div>
                            <?php echo form_error('sisa_cuti') ?>
                      </div>

                      


<script>
var $jnoc = jQuery.noConflict();
$jnoc(function() { 
  $jnoc('#tanggal_cuti').datetimepicker({
   locale:'id',
   format:'DD/MMMM/YYYY'
   });
   
  $jnoc('#tanggal_selesai').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'DD/MMMM/YYYY'
   });
   
   $jnoc('#tanggal_cuti').on("dp.change", function(e) {
    $jnoc('#tanggal_selesai').data("DateTimePicker").minDate(e.date);
  });
  
   $jnoc('#tanggal_selesai').on("dp.change", function(e) {
    $jnoc('#tanggal_cuti').data("DateTimePicker").maxDate(e.date);
      CalcDiff()
   });
  
});

function CalcDiff(){
var a=$jnoc('#tanggal_cuti').data("DateTimePicker").date();
var b=$jnoc('#tanggal_selesai').data("DateTimePicker").date();
    var timeDiff=0
     if (b) {
            timeDiff = (b - a) / 1000;
        }
	
	$jnoc('#lama_cuti').val(Math.floor(timeDiff/(86400)+1))   
}
</script>

                      

                      
                      
                      <input type="hidden" name="tanggal_pengajuan" id="tanggal_pengajuan" value="<?php  echo date("Y-m-d") ?>" /> 
                      
                    
                      <div class="ln_solid"></div>
                      <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <a href="<?php echo site_url('cuti/data_cuti') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                      </div>
                  </form>
                </div>
                  
	