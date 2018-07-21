<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('temp/dist/img/account.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p> <?= $this->session->userdata('nama'); ?></p>

                <a href="<?= site_url('User/read/'.$this->session->userdata('id_user')) ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
 <?php /*       <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
*/?>        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                <?php /*    <li><a href="<?php echo site_url('dashboard2') ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
               */?> </ul>
            </li>
        <?php if ($this->session->userdata('role') == 'Admin'): ?>
           <li class="treeview ">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Pengelolaan Data</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
               
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('user') ?>"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
                   </ul>
             </li>
             <?php elseif ($this->session->userdata('role') == 'Petugas Barang'||$this->session->userdata('role')=='Petugas Penjualan'): ?>
             <li class="treeview ">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Pengelolaan Data</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
               
                <ul class="treeview-menu">
                    <li><a href='<?= site_url('barang') ?>'><i class="fa fa-circle-o"></i> Data Jaket</a></li>
             </ul>
             </li>
            <?php endif ?>
          
          <?php if($this->session->userdata('role') == 'Petugas Penjualan'): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Pesan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('#') ?>"><i class="fa fa-circle-o"></i> Pesan</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-book"></i><span>Documentation</span>
                            <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('pembayaran') ?>"><i class="fa fa-circle-o"></i>Laporan Penjualan</a></li>
                </ul>
            </li>
            <?php endif ?>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">