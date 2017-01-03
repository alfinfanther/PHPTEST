<!-- Navbar -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 style="text-align: center; font-size: 30px;">SISTEM INFORMASI PENGOLAHAN ADMINISTRASI KAS KECIL 
                        <br>PADA CV.JAYA ABADI FORKLIFT TANGERANG
                    
                    </h1>
                </div>
                <div class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"  href="<?php echo site_url('home');?>">Home</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if($_SESSION['jbt']=="JBT002"){
                                    ?>
                                    <li><a href="<?php echo site_url('home/data_akun');?>">Entri Data Akun</a></li>
                                    <?php } ?>
                                    <?php
                                    if($_SESSION['jbt']=="JBT001"){
                                    ?>
                                    <li><a href="<?php echo site_url('home/jabatan');?>">Entri Jabatan</a></li>
                                    <li><a href="<?php echo site_url('home/karyawan');?>">Entri Data Karyawan</a></li>
                                    <li><a href="<?php echo site_url('home/pengguna');?>">Entri Data Pengguna</a></li>
                                    <?php } ?>
<!--                                    <li class="divider"></li>
                                    <li class="dropdown-header">Dropdown header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>-->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if(($_SESSION['jbt']=="JBT001")|| ($_SESSION['jbt']=="JBT002") ){
                                    ?>
                                    <li><a href="<?php echo site_url('transaksi/cp_kas_kecil');?>">Cetak Permintaan Kas Kecil</a></li>
                                    <li><a href="<?php echo site_url('transaksi/pengisian_kas_kecil');?>">Entri Pengisian Kas Kecil</a></li>
                                    <?php } ?>
                                    <?php
                                    if(($_SESSION['jbt']=="JBT002")|| ($_SESSION['jbt']=="JBT003") ){
                                    ?>
                                    <li><a href="<?php echo site_url('transaksi/pengeluaran_kas_kecil');?>">Entri Pengeluaran Kas Kecil</a></li>
                                    <?php } ?>
                                    

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if(($_SESSION['jbt']=="JBT001")|| ($_SESSION['jbt']=="JBT002") ){
                                    ?>
                                    <li><a href="<?php echo site_url('laporan/l_pengisian_kas_kecil');?>">Cetak Laporan Pengisian Kas Kecil</a></li>
                                    <li><a href="<?php echo site_url('laporan/l_pengeluaran_kas_kecil');?>">Cetak Laporan Pengeluaran Kas Kecil</a></li>
                                    <li><a href="<?php echo site_url('laporan/l_j_umum');?>">Cetak Laporan Jurnal Umum</a></li>
                                    
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                       
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url();?>asset/manual_for_program.pdf" target="_blank">Bantuan</a></li>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Keluar <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('cl/logout');?>">Logout</a></li>
                                    
                                    

                                </ul>
                            </li>
                        </ul>
                       
                    </div>
                </div>
                
            </div>
        </div>

        
        <div class="row">
            <div class="col-lg-6">
               
               
            </div>
            
        </div>