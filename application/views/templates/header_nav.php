<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="<?php echo $this->config->item('link_home'); ?>" class="logo">
                    <img src="<?php echo base_url('assets/images').'/logo.png'; ?>" height="35" alt="<?php echo $this->config->item('title'); ?>" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
        
            <!-- start: search & user box -->
            <div class="header-right">
                <span class="separator"></span>
                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <?php
                            echo '<img src="'.base_url('assets/images').'/user_default.png" alt="'.$this->session->userdata('nama').'" class="img-circle" data-lock-picture="'.base_url('assets/images').'/user_default.png" />';
                            if ($this->session->userdata('photo') != '') {
                                echo '<img src="'.$this->session->userdata('foto').'" alt="'.$this->session->userdata('nama').'" class="img-circle" data-lock-picture="'.$this->session->userdata('foto').'" />';
                            } ?>
                        </figure>
                        <div class="profile-info" data-lock-nama="<?php echo $this->session->userdata('nama'); ?>" data-lock-email="<?php echo $this->session->userdata('email'); ?>">
                            <span class="name"><?php echo $this->session->userdata('nama'); ?></span>
                            <span class="role"><?php echo $this->session->userdata('admin_tipe'); ?></span>
                        </div>
        
                        <i class="fa custom-caret"></i>
                    </a>
        
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('link_akun_saya'); ?>"><i class="fa fa-user"></i> Akun Saya</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('link_logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->
        
        <div class="inner-wrapper">