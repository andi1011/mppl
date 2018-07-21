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

            <?php if ($this->session->userdata('role')=='Admin'): ?>
        <h2 style="margin-top:0px"><b><u>List Data Pengelola</u></b></h2><br/>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('user/create'),'Create', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama</th>
		<th>Alamat</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Role</th>
		<th>Kontak</th>
		<th>Username</th>
		<th>Password</th>
		<th>Action</th>
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $user->id_user ?></td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->alamat ?></td>
			<td><?php echo $user->tanggal_lahir ?></td>
			<td><?php echo $user->jenis_kelamin ?></td>
			<td><?php echo $user->role ?></td>
			<td><?php echo $user->kontak ?></td>
			<td><?php echo $user->username ?></td>
            <td><?php echo $user->password ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user/read/'.$user->id_user),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
				echo '  '; 
				echo anchor(site_url('user/update/'.$user->id_user),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				echo '  '; 
				echo anchor(site_url('user/delete/'.$user->id_user),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin ingin menghapus '.$user->nama.' dengan id user '.$user->id_user.' ?\')"'); 
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
		<?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('user/word'), 'Word', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <?php elseif ($this->session->userdata('role')=='Petugas Barang'||$this->session->userdata('role')=='Petugas Penjualan'): ?>
        <center><h2>Data Berhasil Disimpan</h2></center>
        <?php endif ?>
        </div>

        </div>
    </section>
    </div>
    </section>    
    
    </body>
</html>