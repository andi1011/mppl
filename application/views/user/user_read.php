<!doctype html>
<html>
    <head>
        <title>DATA USER</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
       
    </head>
    <body>
	<section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">
        
        <h2 style="margin-top:0px"><b><u>Data Pengelola</u></b> (<?php echo $nama; ?>) </h2><br/>
        <table class="table">
	    <tr><td>ID User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Role</td><td><?php echo $role; ?></td></tr>
	    <tr><td>Kontak</td><td><?php echo $kontak; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
        <tr><td>Password</td><td><?php echo $password; ?></td></tr>
        <?php if ($this->session->userdata('role')=='Admin'): ?>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-danger">Cancel</a></td></tr>
	        <?php elseif ($this->session->userdata('role')=='Petugas Barang'||$this->session->userdata('role')=='Petugas Penjualan'):?>
            <tr><td></td><td><a href="<?php echo site_url('Dashboard1') ?>" class="btn btn-danger">Cancel</a></td></tr>
        <?php endif ?>
	</table>
	</div>

        </div>
    </section>
    </div>
    </section>    
    
        </body>
</html>