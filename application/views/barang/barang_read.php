<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
    
    <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">
        <h2 style="margin-top:0px">Barang Read</h2>
        <table class="table">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Warna</td><td><?php echo $warna; ?></td></tr>
	    <tr><td>Bahan</td><td><?php echo $bahan; ?></td></tr>
	    <tr><td>M</td><td><?php echo $M; ?></td></tr>
	    <tr><td>L</td><td><?php echo $L; ?></td></tr>
	    <tr><td>XL</td><td><?php echo $XL; ?></td></tr>
	    <tr><td>XXL</td><td><?php echo $XXL; ?></td></tr>
	    <tr><td>XXXL</td><td><?php echo $XXXL; ?></td></tr>
	    <tr><td>Diskon</td><td><?php echo $diskon; ?>%</td></tr>
	    <tr><td>Harga</td><td>Rp. <?php echo $harga; ?></td></tr>
	    <tr><td>Foto</td><td><img src="<?php echo base_url('/temp/dist/img/'. $foto);?>" style="width: 150px; height:150px;">
</td></tr></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
    </div>
    </div>
    </section>
    </div>
    </section>
        </body>
</html>