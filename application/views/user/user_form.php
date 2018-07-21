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

        <h2 style="margin-top:0px"><b><u>Tambah Data Pengelola </u></b><sub><i>(<?php echo $button ?>)</i></sub></h2><br/>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Anda" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
        <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required oninvalid="this.setCustomValidity('Field ini belum diisi')" oninput="setCustomValidity('')">
            <?php if ($jenis_kelamin != ""): ?>
                <option value="<?= $jenis_kelamin ?>" selected><?= $jenis_kelamin ?></option>
            <?php endif ?>
            <option value="">--Pilih Jenis Kelamin--</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    
        <div class="form-group" >
        <label for="enum">Bagian <?php echo form_error('role') ?></label>
        <select class="form-control" name="role" id="role" required oninvalid="this.setCustomValidity('Field ini belum diisi')" oninput="setCustomValidity('')">
            <?php if ($role != ""): ?>
                <option value="<?= $role ?>" selected><?= $role ?></option>
            <?php endif ?>
            <option value="">--Pilih Bagian--</option>
            <option value="Admin">Admin</option>
            <option value="Petugas Barang">Petugas Barang</option>
            <option value="Petugas Penjualan ">Petugas Penjualan</option>
        </select>
    </div>
	    <div class="form-group">
            <label for="varchar">Kontak <?php echo form_error('kontak') ?></label>
            <input type="number" min-length="9" max-length="11" class="form-control" name="kontak" id="kontak" placeholder="Kontak" value="<?php echo $kontak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" required oninvalid="this.setCustomValidity('Field ini belum diisi')" oninput="setCustomValidity('')" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required oninvalid="this.setCustomValidity('Field ini belum diisi')" oninput="setCustomValidity('')" />
        </div>  
        <?php 
            $status ='';
            if ($this->session->userdata('role') != 'Admin') {
                $status = 'Hidden=""';
            }
        ?>
	 
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </div>

        </div>
    </section>
    </div>
    </section>    
    
    </body>
</html>