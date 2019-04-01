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
<<<<<<< HEAD
                        <h2>Edit Indikator</h2>
=======
                        <h2>Status Inovasi</h2>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        <div class="clearfix"></div>
                    </div>
                    <?php

                    $query_select ="select * from indikator where kode_indikator = '".$_GET['id']."'";
<<<<<<< HEAD
                    $indikator = mysqli_query($konek, $query_select);
=======
                    $indikator = pg_query($konek, $query_select);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                    ?>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/indikatorProses.php" method="POST">
<<<<<<< HEAD
                            <?php while($data = mysqli_fetch_object($indikator)){?>
=======
                            <?php while($data = pg_fetch_object($indikator)){?>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                               <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_indikator">Kode Indikator <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="kode_indikator" required="required" class="form-control col-md-7 col-xs-12" name="kode_indikator" value="<?php echo $data->kode_indikator ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->nama ?>">
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input hidden name="kode_indikator_awal" value="<?php echo $data->kode_indikator ?>">
<<<<<<< HEAD
                                     <a class="btn btn-primary" type="button" href="indikator_table.php">Batal</a>
                                    <input type="submit" class="btn btn-success"  name="indikator_edit" value="Update">
=======
                                    <a type="button" class="btn btn-default" href="indikator_table.php">Kembali</a>
                                    <input type="submit" class="btn btn-primary"  name="indikator_edit" value="Ubah">
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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

