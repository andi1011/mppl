<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PT. ADRENALIN INDONESIA | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo" style="green">
                <a href="auth2"><b>PT. ADRENALIN INDONESIA</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
            <form action="<?php echo ('register/create_action'); ?>" method="post">
            <h3 class="text-center title-login">Registrasi</h3>
                
                <div class="form-group">
                <?php echo form_error('Nama') ?><input type="text" class="form-control" name="Nama" placeholder="Nama">
                </div>
				
				<div class="form-group">
				<h5>Jenis Kelamin : </h5><?php echo form_error('jenis_k') ?>
                    <input type="radio"  name="jenis_k" value="L"><label for="L"> Laki-laki</label>
                    <input type="radio"  name="jenis_k" value="P"><label for="P"> Perempuan</label>
                </div>
				
                <div class="form-group">
                <?php echo form_error('provinsi') ?><input type="text" class="form-control" name="provinsi" placeholder="Provinsi">
                </div>

				<div class="form-group">
                <?php echo form_error('kota') ?><input type="text" class="form-control" name="kota" placeholder="Kota">
                </div>
				
				<div class="form-group">
                <?php echo form_error('kode_pos') ?><input type="int" class="form-control" name="kode_pos" placeholder="Kode_pos">
                </div>
				
				<div class="form-group">
                <?php echo form_error('email') ?><input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                <?php echo form_error('telepon') ?><input type="int" class="form-control" name="telepon" placeholder="Telepon">
                </div>

                <div class="form-group">
                <?php echo form_error('password') ?><input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <input type="hidden" name="id_pemesan" value="<?php echo $id_pemesan; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                
                <div class="text-center forget">
                    <p>Back<a href="auth2"></a></p>
                </div>
                </form>

              
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>