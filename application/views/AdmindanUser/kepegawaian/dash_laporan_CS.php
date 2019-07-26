        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=base_url('/assets/code/index.html/')?>">AMTBLK </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-envelope"></i></a></li>
                            <li><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-eye-open"></i></a></li>
                            <li><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Item No. 1</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=base_url('/assets/code/#/')?>">Support </a></li>
                            <li class="nav-user dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">
                                HI, <?php echo $this->session->userdata('identity');?>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Your Profile</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Edit Profile</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?=site_url('/c_kepegawaian/back/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                               <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages1/')?>"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Pantauan Petugas CS</a>
                                    <ul id="togglePages1" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_kepegawaian/list_ACC/')?>"><i class="icon-inbox"></i>Data Laporan Pantauan Petugas CS</a></li>
										<li><a href="<?=site_url('/c_kepegawaian/ACC/')?>"><i class="icon-inbox"></i>ACC Laporan Petugas CS</a></li>
                                        <li><a href="<?=base_url('/assets/code/other-user-profile.html/')?>"><i class="icon-inbox"></i>Pembagian Tugas </a></li>
                                        <li><a href="<?=base_url('/assets/code/other-user-profile.html/')?>"><i class="icon-inbox"></i>Tugas Tambahan </a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=site_url('/c_kepegawaian/laporan1/')?>"><i class="menu-icon icon-inbox"></i>Pantauan Petugas Kebun <b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="<?=site_url('/c_kepegawaian/laporan3/')?>"><i class="menu-icon icon-tasks"></i>Pantauan Petugas Security <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="<?=base_url('/assets/code/ui-typography.html/')?>"><i class="menu-icon icon-book"></i>Data User </a></li>
                                <li><a href="<?=base_url('/assets/code/form.html/')?>"><i class="menu-icon icon-paste"></i>Data Lokasi LK </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages/')?>"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Sistem Log </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="<?=base_url('/assets/code/other-login.html/')?>"><i class="icon-inbox"></i>Aktivitas Log </a></li>
                                        <li><a href="<?=base_url('/assets/code/other-user-profile.html/')?>"><i class="icon-inbox"></i>User Log </a></li>
                                    </ul>
                                </li>
								 <li><a href="<?=base_url('/assets/code/form.html/')?>"><i class="menu-icon icon-paste"></i>Notifikasi</a></li>
                                <li><a href="<?=base_url('/assets/code/#"><i class="menu-icon icon-signout/')?>"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            
                            <!--/#btn-controls-->
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Profit Chart</h3>
                                </div>
                                <div class="module-body">
                                   
								   
                                </div>
                            </div>
                            <!--/.module-->
                  
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->