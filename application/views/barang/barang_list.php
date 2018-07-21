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
        <h2 style="margin-top:0px">Barang List</h2>
        <div class="row" style="margin-bottom: 10px">
        <?php if($this->session->userdata('role') == 'Petugas Barang'): ?>
            <div class="col-md-4">
                <?php echo anchor(site_url('barang/create'),'Create', 'class="btn btn-success"'); ?>
            </div>
<?php endif;?>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('barang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-success" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Foto</th>
		<th>Nama Barang</th>
		<th>Warna</th>
		<th>Bahan</th>
		<th>M</th>
		<th>L</th>
		<th>XL</th>
		<th>XXL</th>
		<th>XXXL</th>
		<th>Diskon</th>
		<th>Harga</th>
		<th>Action</th>
            </tr><?php
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $barang->id_user ?></td>
			<td><?php echo $barang->foto ?></td>
			<td><?php echo $barang->nama_barang ?></td>
			<td><?php echo $barang->warna ?></td>
			<td><?php echo $barang->bahan ?></td>
			<td><?php echo $barang->M ?></td>
			<td><?php echo $barang->L ?></td>
			<td><?php echo $barang->XL ?></td>
			<td><?php echo $barang->XXL ?></td>
			<td><?php echo $barang->XXXL ?></td>
			<td><?php echo $barang->diskon ?>%</td>
            <td>Rp. <?php echo $barang->harga ?></td>
            <?php if($this->session->userdata('role') == 'Petugas Barang'): ?>
          
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('barang/read/'.$barang->id_barang),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
				echo ' | '; 
				echo anchor(site_url('barang/update/'.$barang->id_barang),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				echo ' | '; 
				echo anchor(site_url('barang/delete/'.$barang->id_barang),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin ingin menghapus '.$barang->nama_barang.' dengan id user '.$barang->id_barang.' ?\')"'); 
				?>
            </td>
            <?php endif; ?>
            <?php if($this->session->userdata('role') == 'Petugas Penjualan'): ?>
          
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('barang/read/'.$barang->id_barang),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
					?>
            </td>
            <?php endif; ?>

		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
        <?php if($this->session->userdata('role') == 'Petugas Barang'): ?>
         
		<?php echo anchor(site_url('barang/excel'), 'Excel', 'class="btn btn-success"'); ?>
        <?php echo anchor(site_url('barang/word'), 'Word', 'class="btn btn-success"'); ?>
        <?php endif;?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
        </div>
        </section>
        </div>
        </section>
    </body>
</html>