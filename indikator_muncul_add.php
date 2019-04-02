<div class="modal fade" id="addIndiMuncul">
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
                        <label class="col-md-12 col-sm-12 col-xs-12 pull-left" for="kode_anekdot">Indikator yang muncul <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="kode_tpp" class="form-control" required>
                            <?php
                            $selectIndi ="SELECT * FROM indikator_tpp";
                            $indiTpp = pg_query($konek,$selectIndi);
                            while($indi = pg_fetch_object($indiTpp)){
                                ?>
                                <option value="<?php echo $indi->kode_tpp?>"> <?php echo $indi->nama?></option>
                                <?php
                            }
                            ?></select>

                            <input hidden name="kode_anekdot" value="<?php echo $subjek->kode_anekdot?>">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <input hidden name="id_detail_penilaian" value="<?php echo $_GET['id_detail_penilaian'] ?>">
                    <input type="submit" class="btn btn-success" name="indi_muncul_add" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>