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
                        <h2>Edit Tema</h2>
=======
                        <h2>Status Inovasi</h2>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php

                        $query_select ="select * from tema where id_tema = '".$_GET['id']."'";
<<<<<<< HEAD
                        $tema = mysqli_query($konek, $query_select);
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/temaProses.php" method="POST">
                            <?php while($data = mysqli_fetch_object($tema)){?>
=======
                        $tema =pg_query($konek, $query_select);
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/temaProses.php" method="POST">
                            <?php while($data = pg_fetch_object($tema)){?>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode-name">Kode Tema <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
<<<<<<< HEAD
                                    <input type="text" id="kode-name" name="id_tema" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->id_tema?>">
=======
                                    <input type="text" id="kode-name" name="kode" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->id_tema?>">
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Tema <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->nama?>">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<<<<<<< HEAD
                                    <input hidden name="id_tema_awal" value="<?php echo $data->id_tema; ?>">
                                    <a class="btn btn-primary" type="button" href="tema_table.php">Batal</a>
=======
                                    <input hidden name="kode_awal" value="<?php echo $data->id_tema; ?>">
                                    <a class="btn btn-primary" type="button" href="tema_table.php">Kembali</a>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                    <button type="submit" class="btn btn-success" name="tema_edit">Submit</button>
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
