<div class="modal fade" id="addIndikator">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Indikator</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/indikatorProses.php" method="POST">

            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_indikator">Kode Indikator <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="kode_indikator" required="required" class="form-control col-md-7 col-xs-12" name="kode_indikator">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary"  name="indikator_add" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>