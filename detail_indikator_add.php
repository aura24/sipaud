<div class="modal fade" id="addDetail-<?php echo $sub->id_sub_tema?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Indikator Sub tema - <?php echo $sub->nama  ?></h4>
            </div>
            <form action="proses/indikatorDetailProses.php" method="POST">
                <!-- Modal body -->
                <div class="modal-body">
                 <?php
                 $indikators = pg_query($konek, "SELECT * FROM indikator");
                 while($indikator = pg_fetch_object($indikators)){
                     ?>
                     <label>
<!--                         <div class="icheckbox_flat-green" style="position: relative;">-->
                             <input type="checkbox" name="kode_indikator[]" value=" <?php echo $indikator->kode_indikator ?>" >
<!--                             <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                            <?php echo $indikator->nama ?>
                     </label>
                     <br>
                     <?php
                 }
                 ?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input hidden name="id_sub_tema" value="<?php echo $sub->id_sub_tema ?>">
                    <input hidden name="tema_id" value="<?php echo $sub->tema_id ?>">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-success"  name="indikator_detail_add" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>