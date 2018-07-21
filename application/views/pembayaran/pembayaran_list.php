<!doctype html>
<html>
    <head>
        <title>PT. Adrenaline Indonesia</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        
    </head>
    <body class="container">

    <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">
        <h2 style="margin-top:0px">Pembayaran List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pembayaran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pembayaran'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Pemesan</th>
		<th>Id Barang</th>
		<th>Jumlah</th>
		<th>Total Harga</th>
		<th>Action</th>
            </tr><?php
            foreach ($pembayaran_data as $pembayaran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pembayaran->id_pemesan ?></td>
			<td><?php echo $pembayaran->id_barang ?></td>
			<td><?php echo $pembayaran->jumlah ?></td>
			<td><?php echo $pembayaran->total_harga ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pembayaran/read/'.$pembayaran->id_pembayaran),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
				echo ' | '; 
				echo anchor(site_url('pembayaran/update/'.$pembayaran->id_pembayaran),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				echo ' | '; 
				echo anchor(site_url('pembayaran/delete/'.$pembayaran->id_pembayaran),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin ingin menghapus ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pembayaran/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('pembayaran/word'), 'Word', 'class="btn btn-success"'); ?>
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