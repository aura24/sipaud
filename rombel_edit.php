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
                        <h2>Edit Kelompok</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php

                    $query_select ="select * from rombel where id_rombel = '".$_GET['id']."'";
                    $rombel = mysqli_query($konek, $query_select);
                    ?>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/rombelProses.php" method="POST">
                            <?php while($data = mysqli_fetch_object($rombel)){?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_rombel">Kode Kelompok <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
<<<<<<< HEAD
                                        <input type="text" id="id_rombel" required="required" class="form-control col-md-7 col-xs-12" name="id_rombel" value="<?php echo $data->id_rombel ?>">
=======
                                        <input type="text" id="id_rombel" required="required" class="form-control col-md-7 col-xs-12" name="id_rombel" readonly="readonly"      value="<?php echo $data->id_rombel ?>">
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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
                                    <input hidden name="id_rombel_awal" value="<?php echo $data->id_rombel ?>">
                                     <a class="btn btn-primary" type="button" href="detail_rombel_table.php">Batal</a>
                                    <input type="submit" class="btn btn-success"  name="rombel_edit" value="Update">
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

