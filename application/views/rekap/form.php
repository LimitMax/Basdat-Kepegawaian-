<form method="POST" action="<?=base_url('rekap')?>">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" id="dari">Dari :</label>
                <input type="date" class="form-control" name="dari" id="dari" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" id="dari">Sampai :</label>
                <input type="date" class="form-control" name="sampai" id="sampai" required>
            </div>
        </div>
    </div>
    <input type="submit" name="tampil" value="TAMPILKAN" class="btn btn-sm btn-info">
</form>
<br><br>