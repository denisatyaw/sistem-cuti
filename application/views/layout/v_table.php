<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url().'assets/logo.png'?>" type="image/ico" />

    <title><?php echo $title;?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/vendors/bootstrap/dist/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url().'assets/vendors/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url().'assets/vendors/nprogress/nprogress.css'?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url().'assets/vendors/iCheck/skins/flat/green.css'?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url().'assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url().'assets/build/css/custom.min.css'?>" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('page/home')?>" class="site_title"><i class="fa fa-paw"></i> <span>E-Cuti</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url().'upload/user.png'?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo ucfirst($this->session->userdata('username')); ?> | <?php echo ucfirst($this->session->userdata('role')); ?></h2>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('page/home')?>"><i class="fa fa-home"></i> Home </a>
                    
                  </li>
                  <?php
                    // Cek role user
                    if($this->session->userdata('role') == 'admin'){ 
                  ?>
                  <li><a><i class="fa fa-user"></i> Data Admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="<?php echo base_url('page/data_jabatan')?>">Data Jabatan</a></li>         
                      <li><a href="<?php echo base_url('page/data_golongan')?>">Data Golongan</a></li>
                      
                    </ul>
                  </li>
                  <?php
                    }
                  ?>
                  <?php
                    // Cek role user
                    if($this->session->userdata('role') == 'pegawai'){ 
                  ?>  
                  <li><a><i class="fa fa-users"></i> Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('page/data_pegawai')?>">Data Pegawai</a></li>
                      <li><a href="<?php echo base_url('page/profile')?>">Data Pribadi</a></li>
                      
                    </ul>
                  </li>
                  <?php
                    }
                  ?> 
                  <!--
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('tenagakerja/data_loker')?>">Table Info Loker</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  -->
                  <?php if($this->session->userdata('role') == 'admin'){ ?>
                  <li><a><i class="fa fa-user"></i>Data Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('page/data_pegawai')?>">Data Pegawai</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                  <li><a><i class="fa fa-edit"></i>Cuti <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                    <?php if($this->session->userdata('role') == 'admin'){ ?>
                      <li><a href="<?php echo base_url('cuti/data_cuti')?>">Manajemen Cuti</a></li>
                    <?php } ?>  
                      <li><a href="<?php echo base_url('cuti/pengajuan_cuti')?>">Pengajuan Cuti</a></li>
                    <?php if($this->session->userdata('role') != 'admin'){ ?>
                      <li><a href="<?php echo base_url('cuti/riwayat_cuti')?>">Riwayat Cuti</a></li>
                    <?php } ?>
                    </ul>
                  </li>
                </ul>
              </div>
              <!--
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>
              -->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('auth/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
    
    <!-- top navigation -->
      <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url().'upload/user.png'?>" alt="">
                    <?php 
                    echo ucfirst($this->session->userdata('username'));
                    ?> |
                    <?php
                    echo ucfirst($this->session->userdata('role'));
                     ?><span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('page/profile')?>"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="<?php echo base_url('auth/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a> -->
                  <!-- <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url().'assets/production/images/img.jpg'?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url().'assets/production/images/img.jpg'?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url().'assets/production/images/img.jpg'?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url().'assets/production/images/img.jpg'?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul> -->
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

      <!-- page content -->
              
      <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title;?></h3>
              </div>  
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
            </div>
              
          
            <?php echo $contents;?>  
            <br>  
            </div>
            </div>
            </div>
            </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/vendors/jquery/dist/jquery.min.js'?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url().'assets/vendors/bootstrap/dist/js/bootstrap.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/vendors/fastclick/lib/fastclick.js'?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url().'assets/vendors/nprogress/nprogress.js'?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assets/vendors/iCheck/icheck.min.js'?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url().'assets/vendors/datatables.net/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'?>"></script>
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

  </body>
</html>