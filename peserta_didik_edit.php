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
                        <h2>Edit Peserta Didik</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php

                    $query_select ="select * from peserta_didik where no_induk = '".$_GET['no_induk']."'";
                    $peserta_didik = pg_query($konek, $query_select);
                    ?>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/pesertaDidikProses.php" method="POST">
                            <?php while($subjek = pg_fetch_object($peserta_didik)){?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Induk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="nik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $subjek->no_induk ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name" name="nama_l" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $subjek->nama_lengkap ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Panggilan<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="nama_p" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $subjek->nama_panggilan ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl">Tanggal Daftar <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="tgl" name="tanggal_d" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $subjek->tgl_daftar?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tempat Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name" name="tmp_lahir" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo  $subjek->tempat_lahir ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl">Tanggal Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="tgl" name="tanggal_l" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $subjek->tgl_lahir ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <?php if($subjek->jekel == 0) {?>
                                            <input type="radio" name="gender" value="0" checked="checked"> &nbsp; Laki-Laki &nbsp;
                                            <input type="radio" name="gender" value="1" >  &nbsp;  Perempuan
                                        <?php } else {?>
                                            <input type="radio" name="gender" value="0"> &nbsp; Laki-Laki &nbsp;
                                            <input type="radio" name="gender" value="1" checked="checked">  &nbsp;  Perempuan
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="form-control" rows="3" required="required" name="alamat"  value="<?php echo $subjek->alamat ?>"> <?php echo $subjek->alamat ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="agama" name="agama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $subjek->agama?>">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input hidden name="no_induk_awal" value="<?php echo $subjek->no_induk; ?>">
                                    <a class="btn btn-primary" type="button" href="peserta_didik_table.php">Batal</a>
                                    <button type="submit" class="btn btn-success" name="peserta_didik_edit">Submit</button>
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
