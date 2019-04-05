<div class="modal fade" id="addTahun">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tahun Ajaran</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/tahunProses.php" method="POST">

            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_tahun_ajaran">Kode <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="id_tahun_ajaran" required="required" class="form-control col-md-7 col-xs-12" name="id_tahun_ajaran">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tahun_ajaran" name="tahun_ajaran" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success"  name="tahun_add" value="Submit">
            </div>
            </form>
        </div>
    </div>
</div>