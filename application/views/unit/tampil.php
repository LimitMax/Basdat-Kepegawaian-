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

<table class="table table-bordered" id="datatables">
    <thead>
        <th>No.</th>
        <th>Nama</th>
        <th>Unit Lama</th>
        <th>Unit Baru</th>
        <th>Waktu Ganti</th>
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
            <td><?= $k->unit_lama?></td>
            <td><?= $k->unit_baru?></td>
            <td><?= $k->waktu?></td>
        </tr>
        <?php
        }
    ?>
    </tbody>
</table>