<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Pembayaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pemesan</th>
		<th>Id Barang</th>
		<th>Jumlah</th>
		<th>Total Harga</th>
		
            </tr><?php
            foreach ($pembayaran_data as $pembayaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pembayaran->id_pemesan ?></td>
		      <td><?php echo $pembayaran->id_barang ?></td>
		      <td><?php echo $pembayaran->jumlah ?></td>
		      <td><?php echo $pembayaran->total_harga ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>