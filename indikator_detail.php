<div class="modal fade" id="indikator_detail-<?php echo  $sub->id_sub_tema ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><?php echo $sub->nama?></h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <form action="proses/temaProses.php" method="POST">
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="id_sub_tema">ID sub Tema <span class="required">*</span>
                                                                                    </label>
                                                                                    <input type="number" class="form-control" name="id_sub_tema" value="<?php echo $sub->id_sub_tema ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="nama">Nama sub Tema <span class="required">*</span>
                                                                                    </label>
                                                                                    <input class="form-control" name="nama" value="<?php echo $sub->nama ?>">
                                                                                </div>
<!--                                                                                <input hidden name="id_tema" value="--><?php //echo $_GET['id'] ?><!--">-->
                                                                                <input hidden name="tema_id" value="<?php echo $_GET['id'] ?>">
                                                                                <input hidden name="id_sub_tema_awal" value="<?php echo $sub->id_sub_tema ?>">
                                                                            </div>
                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                                                <input type="submit" class="btn btn-success"  name="sub_tema_edit" value="Update">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>