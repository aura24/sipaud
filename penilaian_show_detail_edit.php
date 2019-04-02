<div class="modal fade" id="editPenilaianDetail-<?php echo $subjek->id_detail_penilaian; ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Nilai</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/penilaianDetailProses.php" method="POST">
            <div class="modal-body">
                <input hidden name="id_penilaian" value="<?php echo $_GET['id']?>">
                <input hidden name="id_detail_penilaian" value="<?php echo $subjek->id_detail_penilaian ?>">
                <input hidden name="id_peserta_rombel" value="<?php echo $subjek->id_peserta_rombel?>">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_peserta_rombel">Peserta Didik <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <input class="form-control" value="<?php echo $subjek->nama_lengkap?>" disabled>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="agama_moral" class="form-control" required>
                            <?php if($subjek->agama_moral == 0){
                            ?>
                                <option value="0" selected>Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                            <?php
                            } elseif($subjek->agama_moral ==1 ){
                                ?>
                                <option value="0" >Belum Berkembang</option>
                                <option value="1" selected >Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>

                            <?php
                            }elseif($subjek->agama_moral==2){
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2" selected >Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            }else{
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2"  >Berkembang Sesuai Harapan</option>
                                <option value="3" selected>Berkembang Sangat Baik</option>
                                <?php
                            }?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fisik_motorik">Fisik Motorik <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="fisik_motorik" id="fisik_motorik" class="form-control"  required>
                            <?php if($subjek->fisik_motorik == 0){
                                ?>
                                <option value="0" selected>Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            } elseif($subjek->fisik_motorik ==1 ){
                                ?>
                                <option value="0" >Belum Berkembang</option>
                                <option value="1" selected >Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>

                                <?php
                            }elseif($subjek->fisik_motorik==2){
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2" selected >Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            }else{
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2"  >Berkembang Sesuai Harapan</option>
                                <option value="3" selected>Berkembang Sangat Baik</option>
                                <?php
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kognitif">Kognitif <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="kognitif" id="kognitif" class="form-control"  required>
                            <?php if($subjek->kognitif == 0){
                                ?>
                                <option value="0" selected>Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            } elseif($subjek->kognitif ==1 ){
                                ?>
                                <option value="0" >Belum Berkembang</option>
                                <option value="1" selected >Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>

                                <?php
                            }elseif($subjek->kognitif==2){
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2" selected >Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            }else{
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2"  >Berkembang Sesuai Harapan</option>
                                <option value="3" selected>Berkembang Sangat Baik</option>
                                <?php
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bahasa">Bahasa <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="bahasa" id="bahasa" class="form-control"  required>
                            <?php if($subjek->bahasa == 0){
                                ?>
                                <option value="0" selected>Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            } elseif($subjek->bahasa ==1 ){
                                ?>
                                <option value="0" >Belum Berkembang</option>
                                <option value="1" selected >Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>

                                <?php
                            }elseif($subjek->bahasa==2){
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2" selected >Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            }else{
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2"  >Berkembang Sesuai Harapan</option>
                                <option value="3" selected>Berkembang Sangat Baik</option>
                                <?php
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sosial_emosional">Sosial Emosional <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="sosial_emosional" class="form-control"  required>
                            <?php if($subjek->sosial_emosional == 0){
                                ?>
                                <option value="0" selected>Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            } elseif($subjek->sosial_emosional ==1 ){
                                ?>
                                <option value="0" >Belum Berkembang</option>
                                <option value="1" selected >Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>

                                <?php
                            }elseif($subjek->sosial_emosional==2){
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2" selected >Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            }else{
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2"  >Berkembang Sesuai Harapan</option>
                                <option value="3" selected>Berkembang Sangat Baik</option>
                                <?php
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seni">Sosial Emosional <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="seni" class="form-control" required>
                            <?php if($subjek->seni == 0){
                                ?>
                                <option value="0" selected>Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            } elseif($subjek->seni ==1 ){
                                ?>
                                <option value="0" >Belum Berkembang</option>
                                <option value="1" selected >Mulai Berkembang</option>
                                <option value="2">Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>

                                <?php
                            }elseif($subjek->seni==2){
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2" selected >Berkembang Sesuai Harapan</option>
                                <option value="3">Berkembang Sangat Baik</option>
                                <?php
                            }else{
                                ?>
                                <option value="0">Belum Berkembang</option>
                                <option value="1">Mulai Berkembang</option>
                                <option value="2"  >Berkembang Sesuai Harapan</option>
                                <option value="3" selected>Berkembang Sangat Baik</option>
                                <?php
                            }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success" name="nilai_edit" value="Ubah">
            </div>
            </form>
        </div>
    </div>
</div>