  <?php if($this->session->userdata('hak_akses')==='Staff' ):?> 
      <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="<?php echo base_url('Admin/Homepage') ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Data Issue (Laporan)</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('Admin/Laporan/Create') ?>">Buat Baru</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('Admin/Laporan/View') ?>">List Issue (Laporan</a>
                    </li>     
                </ul>
            </li>

            <li class="sidebar-item  ">
                <a href="<?php echo base_url('Admin/Laporan/View_cetak') ?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="<?php echo base_url('Admin/User') ?>" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Data User</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('Login/Logout') ?>" class='sidebar-link'>
                    <i class="bi bi-power"></i>
                    <span>Logout</span>
                </a>
            </li>


        </ul>
    </div>
    <?php elseif($this->session->userdata('hak_akses')==='Inspektor'):?> 
      <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="<?php echo base_url('Admin/Homepage') ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Data Issue (Laporan)</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('Admin/Laporan/Create') ?>">Buat Baru</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('Admin/Laporan/View') ?>">List Issue (Laporan</a>
                    </li>     
                </ul>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('Login/Logout') ?>" class='sidebar-link'>
                    <i class="bi bi-power"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <?php elseif($this->session->userdata('hak_akses')==='Manager'):?> 
      <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="<?php echo base_url('Admin/Homepage') ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="<?php echo base_url('Admin/Laporan/View_cetak') ?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('Login/Logout') ?>" class='sidebar-link'>
                    <i class="bi bi-power"></i>
                    <span>Logout</span>
                </a>
            </li>


        </ul>
    </div>
    <?php endif;?>