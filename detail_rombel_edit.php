<!DOCTYPE html>
<html lang="en">
<?php include "layout/head.php";
include "connect_db.php";
?>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <?php include "layout/sidebar.php" ?>
            </div>
        </div>
        <?php include "layout/top_navigation.php" ?>
        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Rombel</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php

                    $query_select ="SELECT *,rombel.nama as namar,pendidik.nama as namap, tahun_ajaran.tahun_ajaran as ta FROM detail_rombel JOIN tahun_ajaran ON detail_rombel.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik WHERE id_detail_rombel='".$_GET['id']."'";
                    $detail_rombel = pg_query($konek, $query_select);
                    $query1 ="SELECT * FROM rombel";
                    $rombel = pg_query($konek, $query1);
                    $query2 ="SELECT * FROM tahun_ajaran";
                    $tahun_ajaran = pg_query($konek, $query2);
                    $query3 ="SELECT * FROM pendidik";
                    $pendidik = pg_query($konek, $query3);
                    ?>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/detailRombelProses.php" method="POST">
                            <?php while($data = pg_fetch_object($detail_rombel)){?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_detail_rombel">Kode
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="id_detail_rombel" required="required"
                                           class="form-control col-md-7 col-xs-12" name="id_detail_rombel"
                                           value="<?php echo $data->id_detail_rombel ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namar">Nama Rombel <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select name="namar" class="form-control">
                                        <?php while ($rmbl = pg_fetch_object($rombel)) {
                                            if ($rmbl->id_rombel == $data->id_rombel) {
                                                ?>
                                                <option value="<?php echo $rmbl->id_rombel ?>"
                                                        selected><?php echo $rmbl->nama ?></  option>
                                            <?php } else { ?>
                                                <option value="<?php echo $rmbl->id_rombel ?>"><?php echo $rmbl->nama ?></  option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="tahun_ajaran" class="form-control">
                                        <?php while ($ta = pg_fetch_object($tahun_ajaran)) {
                                            if ($ta->id_tahun_ajaran == $data->id_tahun_ajaran) {
                                                ?>
                                                <option value="<?php echo $ta->id_tahun_ajaran ?>"
                                                        selected><?php echo $ta->tahun_ajaran ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $ta->id_tahun_ajaran ?>"><?php echo $ta->tahun_ajaran ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="semester" class="form-control">
                                        <?php
                                        if($data->semester == 1){
                                        ?>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                        <?php }else{ ?>
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usia">Usia <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="usia" name="usia" required="required" value="<?php echo $data->usia ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidik_nik">Pendidik <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="pendidik_nik" class="form-control">
                                        <?php while($pddk = pg_fetch_object($pendidik)){
                                        if($pddk->nik == $data->pendidik_nik){
                                        ?>
                                             <option value="<?php echo $pddk->nik?>" selected><?php echo $pddk->nama ?></  option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $pddk->nik?>"><?php echo $pddk->nama ?></option>
                                        <?php }
                                        }?>
                                    </select>
                                </div>
                            </div>
                                <a   class="btn btn-primary" href="detail_rombel_table.php">Batal</a>
                                <input type="submit" class="btn btn-success"  name="detail_rombel_edit" value="Update">
                            <?php } ?>
                        </form>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>

