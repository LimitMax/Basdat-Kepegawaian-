<div class="col-lg-6">
    <?php
        // jika session berisi error
        if($this->session->has_userdata('error'))
        {
    ?>
        <!-- tampilkan pesan error -->
        <div class="alert alert-danger alert-dismissable" role="alert">
            <a href="alert" class="close" data-dismiss="alert" aria-label="close">&times</a>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span><?= $this->session->error?></span>
        </div>

    <?php 
        }
        // jika session berisi success
        elseif ($this->session->has_userdata('success'))
        { 
    ?>
        <!-- tampilkan pesan success -->
        <div class="alert alert-success alert-dismissable" role="alert">
            <a href="alert" class="close" data-dismiss="alert" aria-label="close">&times</a>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span><?= $this->session->success?></span>
        </div>

    <?php } ?>
    <a href="<?=base_url('karyawan')?>" class="btn btn-sm btn-outline btn-info">
        <span class="fa fa-arrow-left"></span>
        <span> Kembali</span>
    </a>
    <br><br>
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- form tambah data kriteria -->
            <form method="POST" action="<?= base_url('karyawan/tambah_act'); ?>">
                    <!-- form input kode kriteria -->
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama Karyawan</label>
                        <input type="text" name="nama" id="nama" class="form-control" maxlength="30" required autofocus>
                    </div>
                    <!-- form input keterangan kriteria -->
                    <div class="form-group">
                        <label for="unit" class="control-label">Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control" maxlength="15" required>
                    </div>
                    <!-- tombol tambah kriteria -->
                    <button type="submit" name="tambah" class="btn btn-success">
                        <span class="fa fa-plus"></span>
                        <b> Tambah</b>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>