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

                    $query_select ="SELECT *,rombel.nama as namar,pendidik.nama as namap, tahun_ajaran.tahun_ajaran as ta FROM detail_rombel JOIN tahun_ajaran ON detail_rombel.tahun_ajaran=tahun_ajaran.id_tahun_ajaran JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik WHERE id_detail_rombel='".$_GET['id']."'";
                    $detail_rombel = pg_query($konek, $query_select);
                    ?>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/detailRombelProses.php" method="POST">
                            <?php while($data = pg_fetch_object($detail_rombel)){?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_detail_rombel">Kode <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="id_detail_rombel" required="required" class="form-control col-md-7 col-xs-12" name="id_detail_rombel" value="<?php echo $data->id_detail_rombel ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_rombel">Nama Rombel<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="id_rombel" name="id_rombel" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->namar ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="tahun_ajaran" name="tahun_ajaran" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->ta ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="semester" name="semester" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->semester ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usia">Usia <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="usia" name="usia" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->usia ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidik_nik">Pendidik <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="pendidik_nik" name="pendidik_nik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->namap ?>">
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input hidden name="id_detail_rombel_awal" value="<?php echo $data->id_detail_rombel ?>">
                                     <a class="btn btn-primary" type="button" href="detail_rombel_table.php">Batal</a>
                                    <input type="submit" class="btn btn-success"  name="detail_rombel_edit" value="Update">
                                </div>
                            </div>

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

