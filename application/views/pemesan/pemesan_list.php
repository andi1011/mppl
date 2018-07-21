<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pemesan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pemesan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pemesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pemesan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($pemesan_data as $pemesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pemesan->Nama ?></td>
			<td><?php echo $pemesan->jenis_k ?></td>
			<td><?php echo $pemesan->alamat ?></td>
			<td><?php echo $pemesan->provinsi ?></td>
			<td><?php echo $pemesan->kota ?></td>
			<td><?php echo $pemesan->kode_pos ?></td>
			<td><?php echo $pemesan->email ?></td>
			<td><?php echo $pemesan->password ?></td>
			<td><?php echo $pemesan->telepon ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pemesan/read/'.$pemesan->id_pemesan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pemesan/update/'.$pemesan->id_pemesan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pemesan/delete/'.$pemesan->id_pemesan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pemesan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pemesan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>