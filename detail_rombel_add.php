<div class="modal fade" id="addDetailRombel">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Rombel</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>
            <?php
                $query1 ="SELECT * FROM rombel";
                $rombel = mysqli_query($konek, $query1);
                $query2 ="SELECT * FROM tahun_ajaran";
                $tahun_ajaran = mysqli_query($konek, $query2);
                $query3 ="SELECT * FROM pendidik";
                $pendidik = mysqli_query($konek, $query3);
            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/detailRombelProses.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_detail_rombel">Kode <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="id_detail_rombel" required="required" class="form-control col-md-7 col-xs-12" name="id_detail_rombel">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namar">Nama Rombel <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="namar" class="form-control">
                            <?php while($data = mysqli_fetch_object($rombel)){?>
                                <option value="<?php echo $data->id_rombel?>"><?php echo $data->nama ?></  option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tahun_ajaran" class="form-control">
                            <?php while($data = mysqli_fetch_object($tahun_ajaran)){?>
                                <option value="<?php echo $data->id_tahun_ajaran?>"><?php echo $data->tahun_ajaran ?></  option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="semester" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usia">Usia <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="usia" name="usia" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidik_nik">Pendidik <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="pendidik_nik" class="form-control">
                            <?php while($data = mysqli_fetch_object($pendidik)){?>
                                <option value="<?php echo $data->nik?>"><?php echo $data->nama ?></  option>
                            <?php }?>
                        </select>
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success"  name="detail_rombel_add" value="Submit">
            </div>
            </form>
        </div>
    </div>
</div>