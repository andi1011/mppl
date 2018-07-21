<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <script type=”text/javascript”>

</script>
    </head>
    <body>
    <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">
        <h2 style="margin-top:0px">Barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
             <input type="hidden"class="form-control" name="id_user" id="id_user" value="<?php echo $this->session->userdata('id_user'); ?>"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="file" name="foto" id="foto" value="<?php echo $foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warna <?php echo form_error('warna') ?></label>
            <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" value="<?php echo $warna; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bahan <?php echo form_error('bahan') ?></label>
            <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Bahan" value="<?php echo $bahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">M <?php echo form_error('M') ?></label>
            <input type="number" min='0' class="form-control" value='0' name="M" id="M"  value="<?php echo $M; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">L <?php echo form_error('L') ?></label>
            <input type="number" min='0'class="form-control" value='0' name="L" id="L" value="<?php echo $L; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">XL <?php echo form_error('XL') ?></label>
            <input type="number" min='0' class="form-control" value='0' name="XL" id="XL" value="<?php echo $XL; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">XXL <?php echo form_error('XXL') ?></label>
            <input type="number" min='0' class="form-control" value='0' name="XXL" id="XXL" value="<?php echo $XXL; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">XXXL <?php echo form_error('XXXL') ?></label>
            <input type="number" min='0' class="form-control" value='0' name="XXXL" id="XXXL" placeholder="XXXL" value="<?php echo $XXXL; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Diskon <?php echo form_error('diskon') ?></label>
            <input type="number" max='100' class="form-control" name="diskon" id="diskon" placeholder="diskon" value="<?php echo $diskon; ?>" />
        </div>
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
    </div>
    </section>
    </div>
    </section>
    </body>
</html>