<div class="modal fade" id="addPenilaianDetail">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Aktivitas</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/penilaianDetailProses.php" method="POST">
            <div class="modal-body">
                <input hidden name="id_penilaian" value="<?php echo $_GET['id']?>">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_peserta_rombel">Peserta Didik <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <select id="id_peserta_rombel" name="id_peserta_rombel" required="required" class="form-control col-md-7 col-xs-12">
                           <?php

                           $sql_peserta = "select * FROM peserta_rombel 
                                           JOIN peserta_didik ON peserta_rombel.no_induk_peserta_didik  =peserta_didik.no_induk 
                                            WHERE id_detail_rombel = '".$id_detail_rombel."' AND  peserta_rombel.id_peserta_rombel NOT IN ( Select id_peserta_rombel FROM detail_penilaian where id_detail_rombel = '".$id_detail_rombel."')";
                           $pesertas = pg_query($konek,$sql_peserta);
                           while($subjek = pg_fetch_object($pesertas)){
                               ?>
                           <option value="<?php echo $subjek->id_peserta_rombel ?>"><?php echo $subjek->nama_lengkap ?></option>
                          <?php }
                           ?>
                       </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="agama_moral" class="form-control" required>
                            <option value="0">Belum Berkembang</option>
                            <option value="1">Mulai Berkembang</option>
                            <option value="2">Berkembang Sesuai Harapan</option>
                            <option value="3">Berkembang Sangat Baik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fisik_motorik">Fisik Motorik <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="fisik_motorik" id="fisik_motorik" class="form-control"  required>
                            <option value="0">Belum Berkembang</option>
                            <option value="1">Mulai Berkembang</option>
                            <option value="2">Berkembang Sesuai Harapan</option>
                            <option value="3">Berkembang Sangat Baik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kognitif">Kognitif <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="kognitif" id="kognitif" class="form-control"  required>
                            <option value="0">Belum Berkembang</option>
                            <option value="1">Mulai Berkembang</option>
                            <option value="2">Berkembang Sesuai Harapan</option>
                            <option value="3">Berkembang Sangat Baik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bahasa">Bahasa <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="bahasa" id="bahasa" class="form-control"  required>
                            <option value="0">Belum Berkembang</option>
                            <option value="1">Mulai Berkembang</option>
                            <option value="2">Berkembang Sesuai Harapan</option>
                            <option value="3">Berkembang Sangat Baik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sosial_emosional">Sosial Emosional <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="sosial_emosional" class="form-control"  required>
                            <option value="0">Belum Berkembang</option>
                            <option value="1">Mulai Berkembang</option>
                            <option value="2">Berkembang Sesuai Harapan</option>
                            <option value="3">Berkembang Sangat Baik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seni">Sosial Emosional <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="seni" class="form-control" required>
                            <option value="0">Belum Berkembang</option>
                            <option value="1">Mulai Berkembang</option>
                            <option value="2">Berkembang Sesuai Harapan</option>
                            <option value="3">Berkembang Sangat Baik</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success" name="nilai_add" value="Tambah">
            </div>
            </form>
        </div>
    </div>
</div>