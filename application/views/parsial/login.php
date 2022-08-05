<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- judul halaman -->
    <title><?= isset($title)? $title : 'Blank'?></title>

    <!-- load css bootstrap -->
    <link href="<?=base_url('assets/sbadmin/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- load css font-awesome -->
    <link href="<?=base_url('assets/sbadmin/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <!-- load css sb-admin -->
    <link href="<?=base_url('assets/sbadmin/css/sb-admin.css" rel="stylesheet')?>">

    <!-- load library jquery -->
    <script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>

</head>

<body>
    <h3 align="center">Absensi Karyawan</h3>
    <br>
    <div class="col-md-4 col-md-offset-4">
        <?php
            if ($this->session->has_userdata('error'))
            {
        ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php
            }
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Login
            </div>
            <div class="panel-body">
                <form action="<?=base_url('auth/login')?>" method="POST">
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" id="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control" reqquired>
                    </div>
                    <input type="submit" name="masuk" class="btn btn-sm btn-primary" value="MASUK">
                </form>
            </div>
        </div>
    </div>
</body>

</html>