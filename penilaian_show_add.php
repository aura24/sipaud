<div class="modal fade" id="addPenilaianShow">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Aktivitas</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>
            <?php
                $query ="SELECT * FROM sub_tema";
                $sub_tema = mysqli_query($konek, $query);
            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/penilaianProses.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_penilaian">Kode <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="id_penilaian" required="required" class="form-control col-md-7 col-xs-12" name="id_penilaian">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="tanggal" name="tanggal" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_sub_tema">Sub-Tema <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="id_sub_tema" class="form-control">
                            <?php while($data = mysqli_fetch_object($sub_tema)){?>
                                <option value="<?php echo $data->id_sub_tema?>"><?php echo $data->nama ?></  option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <input hidden name="id_detail_rombel" value="<?php echo $_GET['id'] ?>">
                <input type="submit" class="btn btn-success" name="penilaian_show_add" value="Submit">
            </div>
            </form>
        </div>
    </div>
</div>