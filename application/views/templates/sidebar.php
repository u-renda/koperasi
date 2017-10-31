<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="list-dashboard">
                        <a href="<?php echo $this->config->item('link_home'); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-parent list-parent" id="master_data">
                        <a>
                            <i class="fa fa-th-list" aria-hidden="true"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_admin_tipe_lists'); ?>">
                                     Tipe Petugas
                                </a>
                            </li>
                            <li class="list-child" id="provinsi">
                                <a href="<?php echo $this->config->item('link_provinsi_lists'); ?>">
                                     Provinsi & Kota
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_simpanan_tipe_lists'); ?>">
                                     Tipe Simpanan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent list-parent">
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>User</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_anggota_lists'); ?>">
                                     Daftar Anggota
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_admin_lists'); ?>">
                                     Daftar Petugas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent list-parent">
                        <a>
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span>Pinjaman</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_pinjaman_lists'); ?>">
                                     Daftar Pinjaman
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_angsuran_lists'); ?>">
                                     Daftar Angsuran
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent list-parent">
                        <a>
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                            <span>Simpanan</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_simpanan_lists'); ?>">
                                     Daftar Simpanan
                                </a>
                            </li>
                            <!--<li class="list-child">
                                <a href="<?php //echo $this->config->item('link_setor_ambil_lists'); ?>">
                                     Setoran & Pengambilan
                                </a>
                            </li>-->
                        </ul>
                    </li>
                    <li class="nav-parent list-parent">
                        <a>
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>Deposito</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_deposito_lists'); ?>">
                                     Daftar Deposito
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent list-parent">
                        <a>
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_laporan_pinjaman'); ?>">
                                     Laporan Pinjaman
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_laporan_angsuran'); ?>">
                                     Laporan Angsuran
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_laporan_setoran'); ?>">
                                     Laporan Setoran
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_laporan_tunggakan'); ?>">
                                     Laporan Tunggakan
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_laporan_bunga_tabungan'); ?>">
                                     Laporan Bunga Tabungan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent list-parent">
                        <a>
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span>Lainnya</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_akun_saya'); ?>">
                                     Akun Saya
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <hr class="separator" />
        </div>

    </div>

</aside>
<!-- end: sidebar -->
