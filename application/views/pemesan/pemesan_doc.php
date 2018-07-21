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
        <h2>Pemesan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Jenis K</th>
		<th>Alamat</th>
		<th>Provinsi</th>
		<th>Kota</th>
		<th>Kode Pos</th>
		<th>Email</th>
		<th>Password</th>
		<th>Telepon</th>
		
            </tr><?php
            foreach ($pemesan_data as $pemesan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pemesan->Nama ?></td>
		      <td><?php echo $pemesan->jenis_k ?></td>
		      <td><?php echo $pemesan->alamat ?></td>
		      <td><?php echo $pemesan->provinsi ?></td>
		      <td><?php echo $pemesan->kota ?></td>
		      <td><?php echo $pemesan->kode_pos ?></td>
		      <td><?php echo $pemesan->email ?></td>
		      <td><?php echo $pemesan->password ?></td>
		      <td><?php echo $pemesan->telepon ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>