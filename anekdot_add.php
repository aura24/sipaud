<div class="modal fade" id="addAnekdot">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Anekdot</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>
        
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/anekdotProses.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_anekdot">Kode <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="kode_anekdot" required="required" class="form-control col-md-7 col-xs-12" name="kode_anekdot">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="waktu">Waktu <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="time" id="waktu" name="waktu" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat">Tempat <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tempat" required="required" class="form-control col-md-7 col-xs-12" name="tempat">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peristiwa">Peristiwa <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" rows="3" required="required" name="peristiwa"></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <input hidden name="id_detail_penilaian" value="<?php echo $_GET['id'] ?>">
                <input type="submit" class="btn btn-success" name="anekdot_add" value="Submit">
            </div>
            </form>
        </div>
    </div>
</div>