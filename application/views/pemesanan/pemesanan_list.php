<!doctype html>
<html>
    <head>
        <title>DATA Pemesanan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
       
    </head>
    <body>
    <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">

        <h2 style="margin-top:0px"><b><u>List Data Pemesanan</u></b></h2><br/>
        <div class="row" style="margin-bottom: 10px">
            <!--<div class="col-md-4">
                <?php echo anchor(site_url('pemesanan/create'),'Create', 'class="btn btn-success"'); ?>
            </div>-->
            <div class="col-md-8 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pemesanan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pemesanan'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Barang</th>
		<th>Kuantitas</th>		
		<th>Harga</th>
		<th>Jumlah</th>
            </tr><?php
            foreach ($pemesanan_data as $pemesanan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pemesanan->nama_barang ?></td>
			<td><?php echo number_format($pemesanan->quantity) ?></td>
			<td><?php echo number_format($pemesanan->harga) ?></td>
			<td><?php echo number_format($pemesanan->quantity * $pemesanan->harga) ?></td>            
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pemesanan/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('pemesanan/word'), 'Word', 'class="btn btn-success"'); ?>
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