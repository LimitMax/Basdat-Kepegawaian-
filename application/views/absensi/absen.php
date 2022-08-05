<div class="row">
    <div class="col-lg-6">
        <?php
            // jika session berisi error
            if($this->session->has_userdata('success'))
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
<form action="<?=base_url('absensi/absen_act')?>" method="POST">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label" id="tanggal">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?=date('Y-m-d', time())?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label" id="waktu">Waktu :</label>
            <select class="form-control" name="waktu" id="waktu">
                <option value="P">Pagi</option>
                <option value="S">Sore</option>
                <option value="M">Malam</option>
            </select>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <th>Nama</th>
            <th>Hadir (H)</th>
            <th>Ijin (I)</th>
            <th>Alfa (A)</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $k)
            {
        ?>
            <tr>
                <td align="center">
                    <?=$k->nama?>
                    <input type="hidden" name="id[]" value="<?=$k->id_karyawan?>">
                </td>
                <td align="center">
                    <input type="radio" name="ket<?=$no?>" value="H">
                </td>
                <td align="center">
                    <input type="radio" name="ket<?=$no?>" value="I">
                </td>
                <td align="center">
                    <input type="radio" name="ket<?=$no?>" value="A">
                </td>
            </tr>
            <?php
            $no++;
            }
        ?>
        </tbody>
    </table>
    <input type="submit" name="submit" class="btn btn-sm btn-success" value="SUBMIT">
    <input type="reset" class="btn btn-sm btn-info" value="RESET">
</form>