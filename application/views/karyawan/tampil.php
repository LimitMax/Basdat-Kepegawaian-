<div class="row">
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
    </div>
</div>
<div>
    <a href="<?=base_url('karyawan/tambah')?>" class="btn btn-sm btn-info">
        <span class="fa fa-plus"></span>
        <span> Tambah</span>
    </a>
</div>
<br><br>
<table class="table table-bordered" id="datatables">
    <thead>
        <th>No.</th>
        <th>Nama</th>
        <th>Unit</th>
        <th>Aksi</th>
    </thead>
    <tbody>

        <?php
        $no = 1;
        foreach ($karyawan as $k)
        {    
    ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $k->nama?></td>
            <td><?= $k->unit?></td>
            <td>
                <a href="<?=base_url('karyawan/hapus/'.$k->id_karyawan)?>" class="btn btn-danger btn-outline"
                    onclick="return confirm('Hapus data ?')">
                    <span class="fa fa-trash-o"></span>
                    <span> Hapus</span>
                </a>
                <a href="<?=base_url('karyawan/edit/'.$k->id_karyawan)?>" class="btn btn-info btn-outline">
                    <span class="fa fa-edit"></span>
                    <span> Edit</span>
                </a>
            </td>
        </tr>
        <?php
        }
    ?>
    </tbody>
</table>