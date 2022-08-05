<h4 align="center">Rekap Absensi Karyawan Tanggal <?=date('d-m-Y', strtotime($dari))?> s/d <?=date('d-m-Y', strtotime($sampai))?></h4>
<br>
<form action="<?=base_url('rekap/cetak')?>" method="POST">
    <input type="hidden" name="dari" value="<?=$dari?>">
    <input type="hidden" name="sampai" value="<?=$sampai?>">
    <button type="submit" name="cetak" value="CETAK" class="btn btn-sm btn-danger">
        <span class="fa fa-print"></span>
        <span> Export PDF</span>
    </button>
</form>
<br><br>
<table class="table table-bordered table-striped">
    <thead>
        <th>Nama Karyawan</th>
        <th>Hadir (H)</th>
        <th>Ijin (I)</th>
        <th>Alfa (A)</th>
    </thead>
    <tbody>
    <?php
        foreach ($rekap->result() as $r)
        {
    ?>
        <tr>
            <td><?= $r->nama ?></td>
            <td><?= $r->H ?></td>
            <td><?= $r->I ?></td>
            <td><?= $r->A ?></td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>