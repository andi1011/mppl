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
        <h2>Barang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		<th>Harga</th>
		<th>Diskon</th>
		
            </tr><?php
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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
		      <td><?php echo $barang->harga ?></td>	
		      <td><?php echo $barang->Diskon ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>